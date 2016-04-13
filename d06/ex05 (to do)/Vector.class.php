<?php

    require_once 'Vertex.class.php';

    Class Vector
    {

        public static $verbose = false;
        private $_x = 0;
        private $_y = 0;
        private $_z = 0;
        private $_w = 0.0;

        public function __construct($kwargs)
        {
            if (!array_key_exists('orig', $kwargs))
                $ori = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0));
            else
                $ori = $kwargs['orig'];
            $this->_x = $kwargs['dest']->getX() -
                $ori->getX();
            $this->_y = $kwargs['dest']->getY() -
                $ori->getY();
            $this->_z = $kwargs['dest']->getZ() -
                $ori->getZ();
            if (self::$verbose)
                echo $this." constructed\n";
        }

        public function __destruct()
        {
            if (self::$verbose)
                echo $this." destructed\n";
        }

        public function __toString()
        {
            return (sprintf('Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )',
                $this->_x, $this->_y, $this->_z, $this->_w));
        }

        public static function doc()
        {
            return (file_get_contents('./Vector.doc.txt'));
        }

        public function getX()
        {
            return $this->_x;
        }

        public function getY()
        {
            return $this->_y;
        }

        public function getZ()
        {
            return $this->_z;
        }

        public function getW()
        {
            return $this->_w;
        }

        public function magnitude()
        {
            return (sqrt($this->_x * $this->_x
                + $this->_y * $this->_y + $this->_z * $this->_z));
        }

        public function normalize()
        {
            $m = $this->magnitude();
            return (new Vector(
                array('dest' => new Vertex(
                    array('x' => ($this->_x / $m),
                          'y' => ($this->_y / $m),
                          'z' => ($this->_z / $m))))));
        }

        public function add(Vector $v)
        {
            return (new Vector(
                array('dest' => new Vertex(
                    array('x' => $this->_x + $v->getX(),
                          'y' => $this->_y + $v->getY(),
                          'z' => $this->_z + $v->getZ())))));
        }

        public function sub(Vector $v)
        {
            return (new Vector(
                array('dest' => new Vertex(
                    array('x' => $this->_x - $v->getX(),
                          'y' => $this->_y - $v->getY(),
                          'z' => $this->_z - $v->getZ())))));
        }

        public function opposite()
        {
            return (new Vector(
                array('dest' => new Vertex(
                    array('x' => -$this->_x,
                          'y' => -$this->_y,
                          'z' => -$this->_z)))));
        }

        public function scalarProduct($k)
        {
            return (new Vector(
                array('dest' => new Vertex(
                    array('x' => $k * $this->_x,
                          'y' => $k * $this->_y,
                          'z' => $k * $this->_z)))));
        }

        function dotProduct(Vector $v)
        {
            return ($this->_x * $v->getX()
                + $this->_y * $v->getY()
                + $this->_z * $v->getZ());
        }

        public function cos(Vector $v)
        {
            return ($this->dotProduct($v) /
                (($this->magnitude()) * ($v->magnitude())));
        }

        public function crossProduct(Vector $v)
        {
            return (new Vector(
                array('dest' => new Vertex(
                    array('x' => $this->_y * $v->getZ() - $this->_z * $v->getY(),
                          'y' => $this->_z * $v->getX() - $this->_x * $v->getZ(),
                          'z' => $this->_x * $v->getY() - $this->_y * $v->getX())))));
        }

    }

?>