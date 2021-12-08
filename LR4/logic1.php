<?php 
$html = '';
if(isset($_GET['preset'])){
	if($_GET['preset'] == 1){
		$text = "./html/wikipedia.html";
		$html = file_get_contents($text);
		$prevData = $html;
	}
	if($_GET['preset'] == 2){
		$text = "./html/echo.html";
		$html = file_get_contents($text);
		$prevData = $html;
	}
	if($_GET['preset'] == 3){
		$text = "./html/mishka.html";
		$html = file_get_contents($text);
		$prevData = $html;
	}
} 
else{
	$text = "./html/example.html";
	$html = file_get_contents($text);
} 
if(array_key_exists("text", $_POST) && ($_POST['text']) != null){
	 $html = $_POST['text'];
	 //print_r($_POST);
	// echo $prevData;
}
$prevData = $html;
$dom = new DomDocument();
$dom->loadHTML($html);
$html = str_replace("\"", '\'', $html);
$images = getImages($html, $dom);
$html = dotesComma($html);
$content = structure($html);
$html = style($html);







function getImages($html, $dom){
	$result = array();
	$images = $dom->getElementsByTagName('img');
	$i = 0;
	foreach ($images as $image) {
	    $src = $image->getAttribute('src');
	    $result[$i] = '<img style = "border: 3px solid #00a8e1;"  src = "' . $src . '"><br>';
	    $i ++;
	}
	return $result;
}


function dotesComma($html){
	$str = $html;
	$str = str_replace("...", '&hellip;', $str);
	$str = preg_replace('/[\s,:;]*?но /', ', но ', $str);
	$str = preg_replace('/[\s,:;]*? а /', ', а ', $str);
	return $str;
}
function structure(&$html){

	preg_match_all("/<[hH]([1-3]).*?>(.*?)<\/[hH]([1-3])>/", $html, $items);
	$content = "<ul class = 'H1'>";
	$quantityanchor = 0;
	for ($i = 0; $i < count($items[0]); $i++) {
		if($i > 0 && $items[1][$i] > $items[1][$i - 1])
			$content .= "<ul class = 'H{$items[1][$i]}'>";
		else if($i > 0 && $items[1][$i] < $items[1][$i - 1]){
			$n = $items[1][$i - 1] - $items[1][$i];
			for($j = 1;$j <= $n; $j++) 
				$content .="</ul>";
		}
		$quantityanchor ++;
		$str = 1;
		if(strlen($items[2][$i]) > 50){
			$str = mb_substr($items[2][$i], 0, 50, 'UTF-8');
			$str .= '&hellip;';
			
		}
		
  		$content .= "<li><a href='#HAnch{$quantityanchor}'>{$items[2][$i]}</a></li>";
		$html=str_replace($items[0][$i],"<h{$items[1][$i]} id='HAnch{$quantityanchor}'>{$items[0][$i]}</h{$items[1][$i]}>", $html);
	}
	$content .= "</ul></ul>";
	return $content;
}

function style(&$html){
	$html = str_replace("\"", "'", $html);
	//убрать одинаковые элементы
	preg_match_all('/\sstyle\s=\s*?\s\'.*\;\'.*?/i', $html, $elements);
	for($i = 0; $i < count($elements[0]); $i ++){
	  for($j = $i + 1; $j < count($elements[0]); $j ++){
	    if(strcmp($elements[0][$i], $elements[0][$j]) === 0)
	       $elements[0][$j] = "";
	  }
	}
	//var_dump($elements[0]);
	//убираем атрибут
	for($i = 0; $i < count($elements[0]); $i ++){
	    $elements[0][$i] = str_replace("\"", "'", $elements[0][$i]);
	    $html = str_replace($elements[0][$i], '"STYLE '.$i.'"', $html);
	}
	//создаем css
	$css = [];
	for($i = 0; $i < count($elements[0]); $i ++){
	  $elements[0][$i] = str_replace('style = ', '', $elements[0][$i]);
	  $elements[0][$i] = str_replace('\'', '', $elements[0][$i]);
	  $css[$i] = $elements[0][$i];
	}
	//убираем знаки препинания, создаем названия
	  $elements[0] = preg_replace('/\pP/', '', $elements[0]);
	  $elements[0] = preg_replace('/\s/', '', $elements[0]);
	for($i = 0; $i < count($css); $i ++){
	  if(!empty($css[$i]))
	    $css[$i] = ".".$elements[0][$i]."{".$css[$i]."}";
	} 
	//создаем классы
	for($i = 0; $i < count($css); $i ++){    
	      $html = str_replace('"STYLE '.$i.'"', ' class = \' '.$elements[0][$i].' \'', $html);
	      if(preg_match("#\s(class = '(.*?)')\s(class\s?=\s?'(.*?)')\s?.*?>#siu", $html)){
	        $html = preg_replace("#\s(class = '(.*?)')\s(class\s?=\s?'(.*?)')\s?.*?#siu", " class = '$2 $4'", $html); 
	        $html = preg_replace('#(<head.*>)#isU', '$1<style>'.implode($css).'</style>', $html);
	      }
	}
	return $html;
}