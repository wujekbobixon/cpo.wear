<?php

require_once BASE_URL.'php/request/select_from_category.php';
//require_once BASE_URL.'php/request/select_from_ubrania.php';
foreach($results_category as $result_category):?>

    <li value="<?php echo $result_category['id_category']?>"    >

    <label><?php echo $result_category['category'];?></label>
        <?php 
        $query_ubrania_where_category="SELECT 
        *,category.category  
        FROM ubrania
        INNER JOIN category
        ON
        ubrania.category_id=category.id_category 
        WHERE category_id =".$result_category['id_category'];
        $sth=$connect->query($query_ubrania_where_category);
        $sth->execute();
        $results_ubrania_where_category=$sth->fetchAll(PDO::FETCH_ASSOC);
        $rand_img=rand(0,count($results_ubrania_where_category));
        if(count($results_ubrania_where_category)==$rand_img){
            $rand_img--;
        }
        ?> 
         <img src="<?php echo $app_url.PIC_URL.$results_ubrania_where_category[$rand_img]['category']."/".$results_ubrania_where_category[$rand_img]['title_link']."/".$results_ubrania_where_category[$rand_img]['title_link'].".jpg";?>" >  
                
    </li>  
<?php endforeach;?>