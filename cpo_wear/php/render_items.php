     <?php
     function drawPagination($total_pages, $page_no) {
    $output = "";
    if($total_pages>4){
        $output.="<div class='page prev' id='prev'><</div> ";
        for($i = -2; $i <= 2; $i++)  
        {
            $i==0 ? $style ='active' : $style='';
            $page_now=$page_no+$i;
            if($page_now<1){
                $page_now==0? $page_now=$total_pages : $page_now=$total_pages-1;
            }
            else if($page_now>$total_pages){
                $page_now=($page_now-$total_pages);
            }
                $output .= "<div  class='page ".$style."' id='".$page_now."' value='".$page_now."'>".$page_now."</div>";
        }
        $output.="<div class='page next' id='next'>></div> ";
    }
        else{
            for($i = 1; $i <= $total_pages; $i++){
                $page_now=$i;
                $i==intval($page_no) ? $style ='active' : $style='';
                $output .= "<div  class='page ".$style."' id='".$page_now."'>".$page_now."</div>";
            }
        }
          
            
        return $output;
      }
    $numberpage =8;
    $page = isset($_GET['page_now']) ? $_GET['page_now'] : 1;
    $start = ($page * $numberpage) - $numberpage;
    $limit=" limit ".$start.",".$numberpage;
    if(isset($_GET['search-text']) || isset($_GET['category_id'] ))
    {
        require_once './connect.php';
        require_once './init.php';
        require_once './check_url.php';
        $app_url=$app_url."../";
         $category_id=$_GET['category_id'];
         $search_text=$_GET['search_text'];
         if(empty($search_text) && $category_id==0){
             $query_ubrania_where_category="SELECT 
             *,category.category 
             FROM ubrania 
             INNER JOIN 
             category
            ON
            ubrania.category_id=category.id_category";
     }
            else if(empty($search_text)){
                $query_ubrania_where_category="SELECT 
                *,category.category 
                FROM ubrania 
                INNER JOIN 
                category
                ON
                ubrania.category_id=category.id_category
                WHERE ubrania.category_id=$category_id";
            }
            else if($category_id==0){
                $query_ubrania_where_category="SELECT 
                *,category.category 
                FROM ubrania 
                INNER JOIN 
                category
                ON
                ubrania.category_id=category.id_category
                WHERE ubrania.title_link like '%".toFolderName($search_text)."%'";
            }
         else{
            $query_ubrania_where_category="SELECT 
                *,category.category 
                FROM ubrania 
                INNER JOIN 
                category
                ON
                ubrania.category_id=category.id_category
                WHERE 
                ubrania.category_id=$category_id
                AND
                ubrania.title_link like '%".toFolderName($search_text)."%'";
            
         }

    }
    else{
        $query_ubrania_where_category="SELECT 
        *,category.category 
        FROM ubrania 
        INNER JOIN 
        category
       ON
       ubrania.category_id=category.id_category"; 
    }
            // echo $query_ubrania_where_category.$limit;
             $sth=$connect->query($query_ubrania_where_category.$limit);
             $sth->execute();
             $results_ubrania_where_category=$sth->fetchAll(PDO::FETCH_ASSOC);
             $sth=$connect->query($query_ubrania_where_category);
             $sth->execute();
             $count_ubrania_where_category=$sth->fetchAll(PDO::FETCH_ASSOC);
             $numrecords = count($count_ubrania_where_category);
            //  echo count($results_ubrania_where_category);
             $numlinks = ceil($numrecords / $numberpage);
             
            //  echo "<br>Liczba zakładek:".$numlinks;
            //  echo "<br>Liczba wyświetlanych itemków:".$numberpage;
            //  echo "<br>Ilosc wszystkich results:".$numrecords;
            echo "<ul>";
            if(count($count_ubrania_where_category)==0){
                echo "Jeszcze nie ma takiego produktu... ;( ";
            }
        foreach($results_ubrania_where_category as $result_ubrania_where_category):
        ?> 
        <li>
            <div class="box" id="<?php echo $result_ubrania_where_category['id'];?>">
                <p class="title-items"><?php echo $result_ubrania_where_category['title_items'];?></p>
                <img src="<?php echo $app_url.PIC_URL.$result_ubrania_where_category['category']."/".$result_ubrania_where_category['title_link']."/".$result_ubrania_where_category['title_link'].".jpg";?>" class="model">
                <div class="details">
                    <p><?php echo $result_ubrania_where_category['category'] ?></p>
                    <button><i class="fas fa-arrow-circle-right"></i></button>
                </div> 
            </div>
        </li>       
        <?php endforeach;?>
        </ul>
      <div id="pages">    
      <?php echo drawPagination($numlinks, $page) ?>
      </div>     