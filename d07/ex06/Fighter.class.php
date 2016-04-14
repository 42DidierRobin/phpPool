<?php

    abstract class Fighter
    {
        private $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

        public abstract function fight($target);

        public function getName()
        {
            return $this->name;
        }
        
        public function __toString()
        {
            return ($this->name);
        }
    }