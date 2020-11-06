<?php
	include('lib/simple_html_dom.php');
	
	$html = file_get_html("https://olimp-cars.ru/auto");

	foreach ($html->find('.item') as $key => $value) {
		$cars['name'] = trim($html->find('.item_name',$key)->plaintext);
		$cars['prise'] = intval(preg_replace("/[^,.0-9]/", '', $html->find('.item_new_price ',$key)->plaintext)) ;
		$cars['img']= $html->find('.item_image img',$key)->src;

		echo json_encode($cars);
	}

