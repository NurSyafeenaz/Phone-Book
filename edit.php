<?php
 ob_start();
  require_once 'db.php';
   // $getid = $_GET['editid'];
   // update
   if(isset($_POST['update1'])){
	    $getid = $_POST['contact_id'];
	   $fname = $_POST['fname'];
	   $phone = $_POST['phone'];
   $qu = ("UPDATE contactdetails SET contact_name='$fname',phone= '$phone'
   WHERE contact_id ='$getid'");
    $run_query =@mysqli_query($dbcon,$qu);
	if($run_query){
	header("Location:view_user.php");	
  
   }else  {
	 echo '<p class="errorMsg">There was error while updating record</p>';  
   
	}
   }
   $getid = $_GET['editid']; // GETTING ID FROM URL
   $query = "SELECT * FROM contactdetails WHERE contact_id ='$getid' ";
    $result = mysqli_query($dbcon,$query);
	 $drow = @mysqli_fetch_assoc($result);
?>
  <html>
<head>
<title>Phone Book</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

 
  
  <div id="main">
  <h1> Phone Book</h1>
 <?php  include_once 'menu-main.php';?></div>
 <form class="addusrbox" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
  <h1> Update User</h1>
  <input type="hidden" name ="contact_id" value= "<?php echo isset($drow['contact_id']) ? $drow['contact_id'] : '';?>"><br>
 <label>Name</label> <input type="text" name ="fname" value= "<?php echo isset($drow['contact_name']) ? $drow['contact_name'] : '';?>"><br>
 <label>Phone</label> <input type="text" name="phone" value="<?php echo isset($drow['phone']) ? $drow['phone'] : '';?>"><br>
 
 
  <input type="submit" value ="Update" name="update1">
  
  

  </form>
  
  </body>
  </html>
  