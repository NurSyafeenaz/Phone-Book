<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		$conn = mysqli_connect("localhost", "root", "", "phonebook");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$getid = $_POST['contact_id'];
	    $fname = $_POST['fname'];
	    $phone = $_POST['phone'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO contactdetails WHERE contact_id = '$getid' ";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully.";

			echo nl2br("\n$getid\n $fname\n "
				. "$phone");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
