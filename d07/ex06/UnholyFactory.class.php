<?php

    class UnholyFactory
    {

        private $list_fighter;

        public function __construct()
        {
            $this->list_fighter = array();
        }

        public function absorb($a)
        {
            if ($a instanceof Fighter)
            {
                $add = true;
                foreach ($this->list_fighter as $k => $v)
                    if ($v == $a)
                        $add = false;
                if ($add)
                {
                    array_push($this->list_fighter, $a);
                    echo "(Factory absorbed a fighter of type ".$a.")\n";
                } else
                    echo "(Factory already absorbed a fighter of type ".$a.")\n";
            } else
                echo "(Factory can't absorb this, it's not a fighter)\n";
        }

        public function fabricate($requested)
        {
            foreach ($this->list_fighter as $k => $v)
            {
                if ($v->getName() == $requested)
                {
                    echo "(Factory fabricates a fighter of type ".$v."\n";
                    return clone $v;
                }
            }
            echo "(Factory hasn't absorbed any fighter of type ".$requested."\n";
            return (null);
        }

    }