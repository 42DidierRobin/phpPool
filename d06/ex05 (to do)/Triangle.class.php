<?php

    require_once('./Camera.class.php');

    Class Triangle
    {

        public static $verbose = false;
        private $A;
        private $B;
        private $C;

        public function __construct($kwargs)
        {
            $this->A = $kwargs['A'];
            $this->B = $kwargs['B'];
            $this->C = $kwargs['C'];
            if (self::$verbose)
                echo "Class ".$this." constructed\n";
        }

        public function __destruct()
        {
            if (self::$verbose)
                echo "Class triangle destructed\n";
        }

        public function __toString()
        {
            return (sprintf("Triangle (%s,%s,%s)", $this->A, $this->B, $this->C));
        }

        public static function doc()
        {
            return (file_get_contents('./Triangle.doc.txt'));
        }

        public function getA()
        {
            return $this->A;
        }

        public function setA($A)
        {
            $this->A = $A;
        }

        public function getB()
        {
            return $this->B;
        }

        public function setB($B)
        {
            $this->B = $B;
        }

        public function getC()
        {
            return $this->C;
        }

        public function setC($C)
        {
            $this->C = $C;
        }


    }