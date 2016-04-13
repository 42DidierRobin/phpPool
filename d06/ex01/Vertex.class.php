<?php 
    
    require_once('Color.class.php');
    
    Class Vertex {

        public static $verbose = false;
        private $_x;
        private $_y;
        private $_z;
        private $_w = 1.00;
        private $_color;

        public function __construct($kwargs)
        {
            $this->_x = $kwargs['x'];
            $this->_y = $kwargs['y'];
            $this->_z = $kwargs['z'];
            if (array_key_exists('w', $kwargs))
                $this->_w = $kwargs['w'];
            if (array_key_exists('color', $kwargs))
                $this->_color = $kwargs['color'];
            else
                $this->_color = new Color(array('rgb' => 0xFFFFFF));
            if (self::$verbose)
                echo $this.' constructed'."\n";
        }

        public function __destruct()
        {
            if (self::$verbose)
                echo $this.' destructed'."\n";
        }

        public function __toString()
        {
            $ret = sprintf('Vertex( x: %0.2f, y: %0.2f, z:%0.2f, w:%0.2f',
                        $this->_x, $this->_y, $this->_z, $this->_w);
            if (self::$verbose)
                return ($ret.', '.$this->_color.' )');
            else
                return ($ret.' )');
        }

        public static function doc()
        {
            return (file_get_contents('./Vertex.doc.txt'));    
        }
        
        public function getX()
        {
            return $this->_x;
        }

        public function setX($x)
        {
            $this->_x = $x;
        }

        public function getY()
        {
            return $this->_y;
        }

        public function setY($y)
        {
            $this->_y = $y;
        }

        public function getZ()
        {
            return $this->_z;
        }

        public function setZ($z)
        {
            $this->_z = $z;
        }

        public function getW()
        {
            return $this->_w;
        }

        public function setW($w)
        {
            $this->_w = $w;
        }

        public function getColor()
        {
            return $this->_color;
        }

        public function setColor($color)
        {
            $this->_color = $color;
        }

        

    }
?>