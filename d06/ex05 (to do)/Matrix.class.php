<?php

    require_once('Vector.class.php');

    Class Matrix
    {
        const   IDENTITY = 'IDENTITY',
            SCALE = 'SCALE',
            RX = 'Ox ROTATION',
            RY = 'Oy ROTATION',
            RZ = 'Oz ROTATION',
            TRANSLATION = 'TRANSLATION',
            PROJECTION = 'PROJECTION';

        public static $verbose = false;
        protected $matrix;

        private function setNullMatrix()
        {
            $this->matrix = array(
                'x' => array('vtcX' => 0, 'vtcY' => 0, 'vtcZ' => 0, 'vtc0' => 0,),
                'y' => array('vtcX' => 0, 'vtcY' => 0, 'vtcZ' => 0, 'vtc0' => 0,),
                'z' => array('vtcX' => 0, 'vtcY' => 0, 'vtcZ' => 0, 'vtc0' => 0,),
                'w' => array('vtcX' => 0, 'vtcY' => 0, 'vtcZ' => 0, 'vtc0' => 0,));
        }

        public function __construct($kwargs)
        {
            $this->setNullMatrix();
            switch ($kwargs['preset'])
            {
                case 'IDENTITY':
                    $this->setIdentityMatrix();
                    break;
                case 'SCALE':
                    $this->setScaleMatrix($kwargs['scale']);
                    break;
                case 'Ox ROTATION':
                    $this->setRxMatrix($kwargs['angle']);
                    break;
                case 'Oy ROTATION':
                    $this->setRyMatrix($kwargs['angle']);
                    break;
                case 'Oz ROTATION':
                    $this->setRzMatrix($kwargs['angle']);
                    break;
                case 'TRANSLATION':
                    $this->setTranslationMatrix($kwargs['vtc']);
                    break;
                case 'PROJECTION':
                    $this->setProjectionMatrix($kwargs['fov'], $kwargs['ratio'], $kwargs['near'], $kwargs['far']);
                    break;
                Default:
                    break;
            }
            if (self::$verbose)
                echo 'Matrix '.$kwargs['preset'].($kwargs['preset'] == 'IDENTITY' ? '' : ' preset').' instance constructed'."\n";
        }

        public function getMatrix()
        {
            return $this->matrix;
        }

        public function __destruct()
        {
            if (self::$verbose)
                echo "Matrix instance destructed\n";
        }

        public function __toString()
        {
            return (sprintf("M | vtcX | vtcY | vtcZ | vtxO\n-----------------------------\nx | %0.2f | %0.2f | %0.2f | %0.2f\ny | %0.2f | %0.2f | %0.2f | %0.2f\nz | %0.2f | %0.2f | %0.2f | %0.2f\nw | %0.2f | %0.2f | %0.2f | %0.2f",
                $this->matrix['x']['vtcX'], $this->matrix['x']['vtcY'], $this->matrix['x']['vtcZ'], $this->matrix['x']['vtc0'],
                $this->matrix['y']['vtcX'], $this->matrix['y']['vtcY'], $this->matrix['y']['vtcZ'], $this->matrix['y']['vtc0'],
                $this->matrix['z']['vtcX'], $this->matrix['z']['vtcY'], $this->matrix['z']['vtcZ'], $this->matrix['z']['vtc0'],
                $this->matrix['w']['vtcX'], $this->matrix['w']['vtcY'], $this->matrix['w']['vtcZ'], $this->matrix['w']['vtc0']));
        }

        public static function doc()
        {
            return (file_get_contents('./Matrix.doc.txt'));
        }

        private function setIdentityMatrix()
        {
            $this->matrix['x']['vtcX'] = 1;
            $this->matrix['y']['vtcY'] = 1;
            $this->matrix['z']['vtcZ'] = 1;
            $this->matrix['w']['vtc0'] = 1;
        }

        private function setScaleMatrix($s)
        {
            $this->matrix['x']['vtcX'] = $s;
            $this->matrix['y']['vtcY'] = $s;
            $this->matrix['z']['vtcZ'] = $s;
            $this->matrix['w']['vtc0'] = 1;
        }

        private function setRxMatrix($a)
        {
            $this->matrix['x']['vtcX'] = 1;
            $this->matrix['y']['vtcY'] = cos($a);
            $this->matrix['y']['vtcZ'] = -sin($a);
            $this->matrix['z']['vtcY'] = sin($a);
            $this->matrix['z']['vtcZ'] = cos($a);
            $this->matrix['w']['vtc0'] = 1;
        }

        private function setRyMatrix($a)
        {
            $this->matrix['x']['vtcX'] = cos($a);
            $this->matrix['x']['vtcZ'] = sin($a);
            $this->matrix['y']['vtcY'] = 1;
            $this->matrix['z']['vtcX'] = -sin($a);
            $this->matrix['z']['vtcZ'] = cos($a);
            $this->matrix['w']['vtc0'] = 1;
        }

        private function setRzMatrix($a)
        {
            $this->matrix['x']['vtcX'] = cos($a);
            $this->matrix['x']['vtcY'] = -sin($a);
            $this->matrix['y']['vtcX'] = sin($a);
            $this->matrix['y']['vtcY'] = cos($a);
            $this->matrix['z']['vtcZ'] = 1;
            $this->matrix['w']['vtc0'] = 1;
        }

        private function setTranslationMatrix(Vector $v)
        {
            $this->setIdentityMatrix();
            $this->matrix['x']['vtc0'] = $v->getX();
            $this->matrix['y']['vtc0'] = $v->getY();
            $this->matrix['z']['vtc0'] = $v->getZ();
        }

        private function setProjectionMatrix($fov, $ratio, $near, $far)
        {
            $e = 1 / tan(deg2rad($fov) / 2);
            $this->matrix['x']['vtcX'] = $e / $ratio;
            $this->matrix['y']['vtcY'] = $e;
            $this->matrix['z']['vtcZ'] = -1 * (-$near - $far) / ($near - $far);
            $this->matrix['z']['vtc0'] = (2 * $far * $near) / ($near - $far);
            $this->matrix['w']['vtcZ'] = -1;
            $this->matrix['w']['vtc0'] = 0;
        }

        public function mult(Matrix $m)
        {
            $oldVerbose = self::$verbose;
            self::$verbose = false;
            $temp = new Matrix(array('preset' => Matrix::IDENTITY));
            foreach (array_keys($this->matrix) as $i)
                foreach (array_keys($this->matrix['x']) as $j)
                    $temp->matrix[$i][$j] = $this->matrix[$i]['vtcX'] * $m->getMatrix()['x'][$j]
                        + $this->matrix[$i]['vtcY'] * $m->getMatrix()['y'][$j]
                        + $this->matrix[$i]['vtcZ'] * $m->getMatrix()['z'][$j]
                        + $this->matrix[$i]['vtc0'] * $m->getMatrix()['w'][$j];

            self::$verbose = $oldVerbose;
            return ($temp);
        }

        public function transformVertex(Vertex $v)
        {
            return (new Vertex(array(
                'x' => $this->matrix['x']['vtcX'] * $v->getX()
                    + $this->matrix['x']['vtcY'] * $v->getY()
                    + $this->matrix['x']['vtcZ'] * $v->getZ()
                    + $this->matrix['x']['vtc0'] * $v->getW(),
                'y' => $this->matrix['y']['vtcX'] * $v->getX()
                    + $this->matrix['y']['vtcY'] * $v->getY()
                    + $this->matrix['y']['vtcZ'] * $v->getZ()
                    + $this->matrix['y']['vtc0'] * $v->getW(),
                'z' => $this->matrix['z']['vtcX'] * $v->getX()
                    + $this->matrix['z']['vtcY'] * $v->getY()
                    + $this->matrix['z']['vtcZ'] * $v->getZ()
                    + $this->matrix['z']['vtc0'] * $v->getW(),
                'w' => $this->matrix['w']['vtcX'] * $v->getX()
                    + $this->matrix['w']['vtcY'] * $v->getY()
                    + $this->matrix['w']['vtcZ'] * $v->getZ()
                    + $this->matrix['w']['vtc0'] * $v->getW())));
        }

        public function copyMatrix()
        {
            $oldVerbose = self::$verbose;
            self::$verbose = false;
            $temp = new Matrix(array('preset' => Matrix::IDENTITY));
            foreach (array_keys($this->matrix) as $i)
                foreach (array_keys($this->matrix['x']) as $j)
                    $temp->matrix[$i][$j] = $this->matrix[$i][$j];
            self::$verbose = $oldVerbose;
            return ($temp);
        }

        public function symetryMatrix()
        {
            $oldVerbose = self::$verbose;
            self::$verbose = false;
            $temp = new Matrix(array('preset' => Matrix::IDENTITY));
            $swap_tab = array('x' => 'vtcX', 'y' => 'vtcY', 'z' => 'vtcZ', 'w' => 'vtc0',
                              'vtcX' => 'x', 'vtcY' => 'y', 'vtcZ' => 'z', 'vtc0' => 'w');
            foreach (array_keys($this->matrix) as $i)
                foreach (array_keys($this->matrix['x']) as $j)
                    $temp->matrix[$i][$j] = $this->matrix[$swap_tab[$j]][$swap_tab[$i]];
            self::$verbose = $oldVerbose;
            return ($temp);
        }
    }

?>