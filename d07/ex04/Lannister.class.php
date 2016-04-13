<?php

    Class Lannister
    {
        public function sleepWith($o)
        {
            if (get_parent_class($this) != get_parent_class($o))
                printf("Let's do this.\n");
            else
                printf("Not even if I'm drunk !\n");
        }
    }

?>