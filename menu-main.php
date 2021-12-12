<?php
require_once 'db.php';
$query = "SELECT contact_id FROM contactdetails ";
    $result = mysqli_query($dbcon,$query);
	$row = @mysqli_num_rows($result);
?>
<div class="menu">  
   <ul>
      <li><a href="add_user.php">Add New</a></li>
      <li><a href="view_user.php">View All</a><?php echo '<p class= "count">'.$row.'</p>';?> </li>
   </ul>
</div>  