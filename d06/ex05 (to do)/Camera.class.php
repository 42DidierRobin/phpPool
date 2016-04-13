<?php

    require_once('./Matrix.class.php');

    Class Camera
    {
        public static $verbose = false;
        private $_origin;
        private $_orientation;
        private $_ratio;
        private $_fov;
        private $_near;
        private $_far;
        private $_tT;
        private $_tR;
        private $_view;
        private $_project;

        public function __construct($kwargs)
        {
            if (array_key_exists('ratio', $kwargs))
                $this->_ratio = $kwargs['ratio'];
            else
                $this->_ratio = $kwargs['width'] / $kwargs['height'];
            $this->_origin = $kwargs['origin'];
            $this->_orientation = $kwargs['orientation'];
            $this->_fov = $kwargs['fov'];
            $this->_near = $kwargs['near'];
            $this->_far = $kwargs['far'];
            $this->createMatrix();
            if(self::$verbose)
                echo "Camera instance constructed\n";
        }
        
        private function createMatrix()
        {
            $this->_tT = new Matrix(array('preset' => Matrix::TRANSLATION,
                                          'vtc' => (new Vector(array (
                                              'dest' => $this->_origin)))->opposite()));
            $this->_tR = $this->_orientation->symetryMatrix();
            $this->_view = $this->_tR->mult($this->_tT);
            $this->_project = new Matrix(array('preset' => Matrix::PROJECTION,
                                               'fov' => $this->_fov, 'ratio' => $this->_ratio,
                                               'near' => $this->_near, 'far' => $this->_far));
        }
        
        public static function doc()
        {
            return (file_get_contents('./Camera.doc.txt'));
        }

        public function __toString()
        {
            return (sprintf("Camera( \n+ Origine: ".$this->_origin."\n"."+ tT:\n".$this->_tT."\n".
                            "+ tR:\n".$this->_tR."\n"."+ tR->mult( tT ):\n".$this->_view."\n".
                            "+ Proj:\n".$this->_project."\n".")"));
        }

        public function __destruct()
        {
            if(self::$verbose)
                echo "Camera instance destructed\n";
        }
        
        public function getOrigin()
        {
            return $this->_origin;
        }

        public function setOrigin($origin)
        {
            $this->_origin = $origin;
        }

        public function getOrientation()
        {
            return $this->_orientation;
        }

        public function setOrientation($orientation)
        {
            $this->_orientation = $orientation;
        }

        public function getRatio()
        {
            return $this->_ratio;
        }

        public function setRatio($ratio)
        {
            $this->_ratio = $ratio;
        }

        public function getFov()
        {
            return $this->_fov;
        }

        public function setFov($fov)
        {
            $this->_fov = $fov;
        }

        public function getNear()
        {
            return $this->_near;
        }

        public function setNear($near)
        {
            $this->_near = $near;
        }

        public function getFar()
        {
            return $this->_far;
        }

        public function setFar($far)
        {
            $this->_far = $far;
        }

        public function watchVertex(Vertex $v)
        {
            $positif_m = new Matrix(array('preset' => Matrix::TRANSLATION,
                                          'vtc' => new Vector( new Vertex(array(
                                              'x' => -1, 'y' => -1, 'z' => 1)))));
            $scale_m = new Matrix(array('preset' => Matrix::SCALE, 'scale' => $this->_ratio));
            $final = $this->_view->mult($this->_project)->mult($positif_m)->mult($scale_m);
            return ($final->transformVertex($v));
        }
    }