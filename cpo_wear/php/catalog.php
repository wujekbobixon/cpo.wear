<?php
$query_catalogs="SELECT * FROM category";
$sth=$connect->query($query_catalogs);
$sth->execute();
$results_catalogs=$sth->fetchAll(PDO::FETCH_ASSOC);
foreach($results_catalogs as $result_catalogs):?>
<option value="<?php echo $result_catalogs['id_category'];?>" text="<?php echo $result_catalogs['category'];?>"><?php echo $result_catalogs['category'];?></option>

<?php endforeach;?>
