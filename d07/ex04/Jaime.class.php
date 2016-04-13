<?php
    
    Class Jaime extends Lannister {
        public function sleepWith($o)
        {
            if (get_class($o) == 'Cersei')
                printf("With pleasure, but only in a tower in Winterfell, then.\n");
            else
                parent::sleepWith($o);
        }
    }