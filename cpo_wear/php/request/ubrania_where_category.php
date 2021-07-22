<?php
 $query_ubrania_where_category="SELECT 
 *, category.category
 FROM ubrania
 INNER JOIN category
 ON
 ubrania.category_id=category.id_category
  WHERE category_id =".$result_category['id_category'];
  $sth=$connect->query($query_ubrania_where_category);
  $sth->execute();
  $results_ubrania_where_category=$sth->fetchAll(PDO::FETCH_ASSOC);

?>