<?php
/*
1.削除対象はディレクトリ、ファイルの２通り
2.再帰的にディレクトリは削除
*/

delete("aaa");

function delete($name){
	$pattern = '/^[^\/]+$/';
	if( !file_exists($name) ){
		echo "削除するディレクトリ,ファイルが存在しません.\n<br>";
		die();
	}else if( !is_writable($name) ){
		echo "削除する権限がありません.\n<br>";
		die();
	}/*else if( !preg_match($pattern,$name) ){
		echo "不正なファイル名です.";
		die();
	}*/

	if( is_dir($name) ){
		$dir_items = array_diff( scandir($name) , array('..', '.') );
		// var_dump($dir_items);
		// echo($dir_items);

		if( count($dir_items)>0 ){
			// echo "[dbg] ディレクトリ[$name]はファイル,ディレクトリを含みます.\n<br>";
			foreach($dir_items as &$value){
				// echo ("[dbg] ループ: ".$name."/".$value."\n<br>");
				delete($name."/".$value);
			}
			delete_dir($name);
		}else{
			delete_dir($name);
		}

	}else if( is_file($name) ){
		// echo "[dbg] file: $name を削除.\n<br>";

    if( unlink($name) ) {
      echo "ファイル[$name]を削除しました.\n<br>";
    } else {
		  echo "ファイル[$name]の削除に失敗しました.\n<br>";
    }

	}
}

function delete_dir($delete_dir_name){
	// echo "[dbg] ディレクトリ[$delete_dir_name]はファイル,ディレクトリを含みません.\n<br>";
	// echo "[dbg] dir: $delete_dir_name を削除.\n<br>";

  if(rmdir($delete_dir_name) ){
    echo "ディレクトリ[$delete_dir_name]を削除しました.\n<br>";
  } else {
    echo "ディレクトリ[$delete_dir_name]の削除に失敗しました.\n<br>";
  }
 )
}

function h($str){
  return htmlspecialchars($str, ENT_QUOTES);
}

?>
