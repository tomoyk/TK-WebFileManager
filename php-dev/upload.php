<?php

/*
1. 既存のファイルの有無の確認
2. ファイルがアップロードされたものか確認
3. パーミッションの確認
*/

echo $_FILES['fname']['name']."\n";

var_dump( $_FILES['fname']['name'] );

$path = realpath(null);

for($i=0;$i<count($_FILES['fname']['name']);$i++) {

  $crt_name = basename($_FILES['fname']['name'][$i])."\n";
  $tmp_name = $_FILES['fname']['tmp_name'][$i]."\n";

  echo $tmp_name. "\n" .$path."/test-files/".$crt_name;
  move_uploaded_file($tmp_name, $path."/test-files/".$crt_name);

  if( is_uploaded_file($path."/test-files/".$crt_name) ) {
    echo 'アップロードに成功しました.';
  } else {
    echo 'アップロードに失敗しました.';
  }
}

/*
$fname = $_FILES['fname']['name'];
$tmp_name = $_FILES['fname']['tmp_name'];
$fname = basename($fname);


if( move_uploaded_file($tmp_fname, "test-files/$fname") ){

  echo "TRUE\n";

}
*/



?>
