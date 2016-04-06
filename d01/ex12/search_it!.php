#!/usr/bin/php
<?php

if ($argc > 3)
{
   foreach($argv as $k => $v) {
       echo $k." -> ".$v."\n";
   }
}
?>