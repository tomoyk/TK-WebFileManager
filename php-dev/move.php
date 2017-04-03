<?php

$src = "eee";
$dest = "qqq";

echo "Edit this code on CUI";
die();

move( $src, $dest );

function move( $from, $to ){
	$current = getcwd()."/";
	$from = $current.$from;
	$to = $current.$to;

	echo "From: $from \n<br>To: $to\n<br>";

    if ( copy($from, $to) ){
        unlink($from);
		echo "success";
        return TRUE;
    }
    else{
		echo "failed";
        return FALSE;
    }
}

?>
