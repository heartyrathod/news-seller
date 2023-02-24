<?php

global $wpdb;
$tablename = $wpdb->prefix."newrr";


if(isset($_GET['delid'])){
  $delid = $_GET['delid'];
  $wpdb->query("DELETE FROM ".$tablename." WHERE id=".$delid);
}
?>
<h1>All Entries</h1>
<form action="<?php echo admin_url( 'admin-post.php' ); ?>">
	<input type="hidden" name="action" value="generate_csv" />
	<input type="submit" name="submit" class="button button-primary" value="Generate & Download CSV File" />
</form>
<table class="t-r">
  <tr>
   <th>No</th>
   <th>Email</th>
   <th>&nbsp;</th>
  </tr>



<?php

// Select records
global $wpdb;
$tablename = $wpdb->prefix."newrr";

$entriesList = $wpdb->get_results("SELECT * FROM ".$tablename." order by id desc");
if(count($entriesList) > 0){
  $count = 1;
  foreach($entriesList as $entry){
    $id = $entry->id;
    $email = $entry->email;

    echo "<tr>
    <td>".$count."</td>
    <td>".$email."</td>
    <td><a href='?page=allentries&delid=".$id."'>Delete</a></td>
    </tr>
    ";
    $count++;
 }
}
else{
 echo "<tr><td colspan='5'>No record found</td></tr>";
}
?>
</table>






<style>
  table{
    width:60%;
  }
    th, td{        
        padding-top: 12px;
        padding-bottom: 12px;
        text-align:center;        
        background-color: #1E2422;
        color: white;    
    }
    td a{        
        padding-top: 12px;
        padding-bottom: 12px;
        text-align:center;        
        background-color: #1E2422;
        color: white;    
    }
    td a:hover{                        
        background-color: #1E2422;
        color: #f0889a;    
    }

</style>