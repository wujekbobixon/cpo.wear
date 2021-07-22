<?php

require_once './connect.php';
require_once './init.php';
if(isset($_GET['ubranie_id']))
{
    $ubranie_id = $_GET['ubranie_id'];
	require_once './request/select_from_ubrania.php';
	foreach ($results_items as $result_items)
	{
		if($ubranie_id == $result_items['id'])
		{
			echo json_encode(array(
				'status'=>'success',
				'title'=> $result_items['title_items'],
				'description' => $result_items['description'],
				'url' => "?game=".$result_items['title_items'],
				'data'=>"content/main_item.php?item=".$ubranie_id,
			));
		break;
			
		}
	}
}
?>