<?php

    class Color
    {
        public static $verbose = false;
        public $red = 0;
        public $green = 0;
        public $blue = 0;
        private $rgb = 0;
        
        public function __construct(array $kwargs)
        {
            foreach ($kwargs as $k => $v)
                $v = (int)$v;
            if (!array_key_exists('rgb', $kwargs))
            {
                $this->red = $kwargs['red'];
                $this->green = $kwargs['green'];
                $this->blue = $kwargs['blue'];
            } else
            {
                $this->red = ($kwargs['rgb'] >> 16) & 0xFF;
                $this->green = ($kwargs['rgb'] >> 8) & 0xFF;
                $this->blue = ($kwargs['rgb']) & 0xFF;
            }
            if (self::$verbose)
                echo $this.' constructed.'."\n";
        }

        public function __destruct()
        {
            if (self::$verbose)
                echo rtrim($this, "\n").' destructed.'."\n";
        }

        public function __toString()
        {
            return ('Color( red:'.str_pad($this->red, 4, " ", STR_PAD_LEFT).
                ', green: '.str_pad($this->green, 4, " ", STR_PAD_LEFT).
                ', blue: '.str_pad($this->blue, 4, " ", STR_PAD_LEFT)." )");
        }

        public static function doc()
        {
            return file_get_contents('./Color.doc.txt');
        }

        public function add(Color $c)
        {
            $n_red = $this->red + $c->red;
            $n_green = $this->green + $c->green;
            $n_blue = $this->blue + $c->blue;
            return (new Color(array ('red'=> $n_red, 'green'=> $n_green, 'blue'=> $n_blue)));
        }

        public function sub(Color $c)
        {
            $n_red = $this->red - $c->red;
            $n_green = $this->green - $c->green;
            $n_blue = $this->blue - $c->blue;
            return (new Color(array ('red'=> $n_red, 'green'=> $n_green, 'blue'=> $n_blue)));
        }

        public function mult($f)
        {
            $n_red = $this->red * $f;
            $n_green = $this->green * $f;
            $n_blue = $this->blue * $f;
            return (new Color(array ('red'=> $n_red, 'green'=> $n_green, 'blue'=> $n_blue)));
        }
    }
?>