<?php

require_once './connect.php';
require_once './init.php';
if(isset($_GET['category_id'])&& isset($_GET['search_text']))
{
    $category_id=$_GET['category_id'];
    $search_text=$_GET['search_text'];
    $page=isset($_GET['page_now']) ? $_GET['page_now'] : 1  ;
	echo json_encode(array(
				'status'=>'success',
				'data'=>"php/render_items.php?category_id=".$category_id."&search_text=".$search_text."&page_now=".$page,
            ));

}
?>