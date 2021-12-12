<?php
session_start();
//echo $_SESSION['username'];
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, 'phonebook');
	
	if(isset($_POST['search']))
	{
		$contact_name = $_POST['contact_name'];
		
		$query = "SELECT * FROM contactdetails where contact_name='$contact_name'";
		$query_run = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_array($query_run))
		{
			?>
<?php
		}
	}
?>

<html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
<script>
   function ConfirmDelete() {
  return confirm("Do you want to delete?");
}
</script>
</head>
<body>
	<div class="topnav">
  <div class="search-container">
    <form method ="POST" action="">
      <input type="text" placeholder="Search By Name" name="contact_name">
      <input type="submit" name="search" value="Search">
    </form>
  </div>
</div>
	
	<?php
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, 'phonebook');
	
	if(isset($_POST['search']))
	{
		$contact_name = $_POST['contact_name'];
		
		$query = "SELECT * FROM contactdetails where contact_name='$contact_name'";
		$query_run = mysqli_query($connection, $query);
		
		while($row = mysqli_fetch_array($query_run))
		{
			?>
		<form action="search.php" method="POST">
			<input type="text" name="contact_name" value="<?php echo $row['contact_name']?>"/>
			<input type="text" name="phone" value="<?php echo $row['phone']?>"/>
		</form>
	<?php
		}
	}
	?>
												   
<div id = "main">
  <h1> Phone Book</h1>
  
  <?php  include_once 'menu-main.php';?><br><br>
  
   <table class=" viewtabl" >
  <th>
  <tr>
  <td> <strong>No.</strong></td>
  <td><strong>Name</strong></td>
  <td><strong>Phone</strong></td>
  <td><strong>Action</strong></td>
  </tr>
  </th>
  <?php  //https://www.formget.com/update-data-in-database-using-php/  to display table in echo https://stackoverflow.com/questions/35944425/displaying-a-user-profile-page-php
   require_once 'db.php';
   $count= 1;
   $query = "SELECT * FROM contactdetails ORDER BY contact_id";
    $result = mysqli_query($dbcon,$query);
	 while($row = @mysqli_fetch_assoc($result)){?>
  
  
  <tr>
  <td id="od"> <?php echo $count;?></td>
  <td class="ev"> <?php echo $row["contact_name"];?></td>
  <td class="ev"><?php echo $row["phone"];?></td>
  <td class="ev">
  <a href="delete.php?deleteid=<?php echo $row["contact_id"]; ?> "id="del" Onclick="return ConfirmDelete()">Delete</a>
 <a href="edit.php?editid=<?php echo $row["contact_id"]; ?>"id="edt" >Edit</a>
  </td>
  </tr>
 <?php $count++;}?>
	 </table>
	   
</div>
</body>
</html>

