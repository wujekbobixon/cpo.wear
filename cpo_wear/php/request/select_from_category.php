<?php
 $query_category="SELECT * FROM category";
  $sth=$connect->query($query_category);
  $sth->execute();
  $results_category=$sth->fetchAll(PDO::FETCH_ASSOC);

?>