<?php

/*
1. 既存のファイルの有無の確認
2. ファイルがアップロードされたものか確認
3. パーミッションの確認
*/

echo $_FILES['fname']['name'];
// echo ($_FILES['userfile']['tmp_name']);

// ファイルがアップロードされたものかチェック
if( is_uploaded_file($_FILES['fname']['tmp_name']) ) {
  echo 'ファイル'.$FILES['userfile']['name'].'をアップロードしました.';
} else {
  echo '失敗しました.';
}


?>
