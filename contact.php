
<!-- insert_contact.php
   A PHP script to insert a new course into a configured database
  -->
  <?php

require('info.inc');

//This file contains php code that will be executed after the
//insert operation is done.
//require('info.inc');

// Main control logic
insert_contact();

//-------------------------------------------------------------
function insert_contact()
{

	// Connect to the configured database 
        // The parameters are defined in the info.inc file
        // These are global constants
	$con = connect_and_select_db(DB_SERVER, DB_UN, DB_PWD,DB_NAME);
    if (mysqli_connect_errno()) {
        echo "failed to connect to database";
        exit();
    }

	// Get the information entered into the webpage by the user
        // These are available in the super global variable $_POST
	// This is actually an associative array, indexed by a string
	$firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
	$email = $_POST['email'];
    $phone = $_POST['phone'];
	$message = $_POST['message'];

        
	// Create a String consisting of the SQL command. Remember that
        // . is the concatenation operator. $varname within double quotes
 	// will be evaluated by PHP
	$insertStmt = "insert Contact (firstName, lastName, email, phone, message) values ( '$firstName', '$lastName','$email', '$phone',
                      '$message')";

	//Execute the query. The result will just be true or false
	$result = mysqli_query($con, $insertStmt);

	$mess = "";

	if (!$result) 
	{
  	  $mess = "Error in receiving message.". mysqli_error($con);
	  echo $mess;
	}
	else
	{
	  $mess = "Message sent successfully.";
	  echo $mess;
	  
	}
			   
}

function connect_and_select_db($server, $username, $pwd, $dbname)
{
	// Connect to db server
	$con = mysqli_connect($server,$username,$pwd,$dbname);

// Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
}

	// Select the database	(may have already selected)
	 $dbh = mysqli_select_db($con,$dbname);
	 if (!$dbh){
     		echo "Unable to select ".$dbname.": " . mysqli_error($con);
	 	exit;
	 }
    return $con;
}


?>

