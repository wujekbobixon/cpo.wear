<?php
 $query_items="SELECT * FROM ubrania ";
  $sth=$connect->query($query_items);
  $sth->execute();
  $results_items=$sth->fetchAll(PDO::FETCH_ASSOC);

?>