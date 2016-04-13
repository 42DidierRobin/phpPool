<?php

    class NightsWatch {
        private $fighters;

        public function __construct()
        {
            $this->fighters = array();
        }

        public function recruit($s)
        {
            array_push($this->fighters, $s);
        }

        public function fight()
        {
            foreach ($this->fighters as $k => $v)
            {
                if (array_key_exists('IFighter', class_implements($v)))
                    $v->fight();
            }
        }
    }