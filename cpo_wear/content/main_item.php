
<?php

    if(isset($_GET['item'])){
     $item=$_GET['item'];
     require_once '../php/init.php';
     require_once '../php/check_url.php';
     require_once '../php/connect.php';
     require_once '../php/request/ubrania_inner_join_category.php';
     foreach($results_category_ubrania as $result_items){
         if($item==$result_items['id']):?>
        <div class="dane-ubranie">
        <div id="content_text">
            <h1><?php echo $result_items['title_items'];?></h1>
            <article><?php echo $result_items['description'];?></article>
        </div>
         <?php 
             $path="items/".toFolderName($result_items['category'])."/".$result_items['title_link']."/*.jpg";
             $filecount = 0;
             $counter = 0;
             $files = glob($path);
            //  print_r($files);
             if ($files){
              $filecount = count($files);
             }
            foreach($files as $img){    
                $counter++;     
                if($counter%2==0):?>
                    <img src="content/<?php echo $img?>" style="align-self: flex-start;">
                <?php else: ?>
                    <img src="content/<?php echo $img?>" style="align-self: flex-end;">
                <?php endif;}?>
            </div>
        
        <?php endif;
     }
    }else{
        require_once '../php/init.php';
        header('location:'.BASE_URL.'index.php');
    }

?>