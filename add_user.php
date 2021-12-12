<?php
require_once 'db.php';
if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$phone = $_POST['phone'];
	if($fname == ''  || $phone ==''  ){
		echo '<p class="addusererror">Fields marked with * are required</p>';
	} else {
		$sql = "INSERT INTO contactdetails(contact_name,phone) VALUES ('$fname','$phone')";

$result= mysqli_query($dbcon,$sql);
		if($result){
	   echo '<p class="addsucces">Record added successfully</p><br> ';
   }else {
	 echo '<p class="aderrorMsg">There was error while adding record</p>';  
   
	}	
}
}
?>


<html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id= "main">
 
  <h1> Phone Book</h1>
<?php  include_once 'menu-main.php';?></div>
  <form class="addusrbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <h1> Add User</h1>
 <label>Name<span style="color:red;">*</span></label> <input type="text" name ="fname" ><br>
 <label>Phone<span style="color:red;">*</span></label> <input type="text" name="phone" ><br>
 
 
  <input type="submit" value ="Add" name="submit">
  
  

  </form>

</body>
</html>