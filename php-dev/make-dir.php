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
$dir_name = "aaa";

if( file_exists($dir_name) ) {
	echo "既に同名のディレクトリ,ファイルが存在しています.\n";
} else if( !is_writable($home_path) ) {
	echo "ディレクトリへ書き込みが出来ません.\n";
} else if( mkdir($dir_name,0755) ) {
	echo "ディレクトリの作成に成功しました.\n";
} else {
	echo "ディレクトリの作成に失敗しました.\n";
}

?>
