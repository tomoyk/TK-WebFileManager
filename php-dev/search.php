<?php
/*
照合（名前が含んでいるか）
再起処理
1.検索対象が存在する場合
2.検索対象が存在しない場合
*/

$flag=true;
$counter = 0;
$path = getcwd();

$name = "1212";

$pattern = '/^[^\/]*$/';
if( !preg_match($pattern,$name) ){
	echo "不正なファイル名です.";
	die(); 
}

$result = search($name,$path);
echo $result;

function search($target_name,$target_path){
	global $counter,$flag;

	// ディレクトリ内のファイル一覧の取得
	$dir_items = array_diff( scandir($target_path) , array('..', '.') );
	// var_dump($dir_items);

	// ディレクトリ内の探索ループ
	foreach($dir_items as &$items){
		
		//echo "[dbg] ${target_path}/${items}を調査中...\n<br>";
	
		// 文字列が一致しているかチェック.
		$pos=strpos($items, $target_name);
		if($pos!==false){
			echo "発見: ".( $flag ? $items : "$target_path/$items")."\n<br>";
			$counter++;
		}
		
		// ディレクトリかつ、ディレクトリ内にファイルが存在する
		if( is_dir("$target_path/$items") && count( scandir("$target_path/$items") )>0 ){
			if($flag==true){
				$flag=false;
				search($target_name, $items);
			}else{
				search($target_name, "$target_path/$items");
			}
		}
	}
	
	if($counter==0){
		return "文字列[$target_name]を含むディレクトリ,ファイルが見つかりません.\n<br>";
	}else{
		return "文字列[$target_name]を含む${counter}件のディレクトリ,ファイルが見つかりました.\n<br>";
	}
}

?>
