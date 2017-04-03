<?php
$path = getcwd().'/';
$old_name = $path."bbb";
$new_name = $path."aaa";

/*
1.元のファイルが存在するか
2.新しい名前のファイルがすでに存在しないか
2.ファイルに移動する権限があるか(writable)
3.名前の変更
*/

// 正規表現で名称チェック

if( !file_exists($old_name) ) {
	echo "変更元のファイルが見つかりません.\n";
} else if( $new_name == $old_name ) {
	echo "同名への変更は出来ません";
} else if( file_exists($new_name) ) {
	echo "既に同名のファイル,ディレクトリが存在しています.\n";
} else if( !is_writable($old_name) ) {
	echo "名前を変更する権限がありません.\n";
} else if( rename($old_name,$new_name) ){
	echo "ファイル名,ディレクトリ名の変更に成功しました.\n";
} else {
	echo "ファイル名,ディレクトリ名の変更に失敗しました.\n";
}

?>
