<?php
 $query_category_ubrania="SELECT 
 *,category.category
 FROM ubrania
 INNER JOIN category
 ON
 ubrania.category_id=category.id_category
 ";
  $sth=$connect->query($query_category_ubrania);
  $sth->execute();
  $results_category_ubrania=$sth->fetchAll(PDO::FETCH_ASSOC);
?>
