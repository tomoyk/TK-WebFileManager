<?php

echo "<HTML><HEAD><META CHARSET=\"UTF-8\"></HEAD><BODY>";
echo "<h1>Debug HTTP POST</h1>\n<BR><BR>";

var_dump($_POST);

echo "<BR><BR><h3>MODE: ".$_POST["mode"]."</h3>";
echo "<h3>PATH: ".$_POST["path"]."</h3>";

foreach($_POST as $key => &$val){

  echo "<BR>$key<BR>\n => $val<BR>\n";

}

echo "</BODY></HTML>";
