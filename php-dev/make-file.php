<?php

/*
1.すでに存在していないのか
file_exists
2.書き込みできるか
is_writable
3.書き込み
mkdir
4.書き込みができているか（存在しているか)
mdkir -> else
*/

// カレントディレクトリ
$home_path = getcwd();

// ファイル名
$file_name = "aaa";

if( file_exists($file_name) ) {
	echo "既に同名のファイル,ディレクトリが存在しています.\n";
} else if( !is_writable($home_path) ) {
	echo "ディレクトリへ書き込みが出来ません.\n";
} else if( FALSE!==file_put_contents($file_name, '', FILE_APPEND) ){
	chmod($file_name, 0755);
	echo "ファイルの作成に成功しました.\n";
} else {
	echo "ファイルの作成に失敗しました.\n";
}

?>
