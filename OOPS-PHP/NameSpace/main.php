<?php

require 'first.php';
require 'second.php';

$obj = new sir\Vishal();
$obj2 = new last\Vishal();

$obj->show();
echo "<br>";
$obj2->show();

?>