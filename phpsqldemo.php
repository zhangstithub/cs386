<?php
if(!empty($_POST))
{

	$servername="localhost";
	$username="sz";
	$password="700511";
	$dbname="sz";
	
	$conn=new mysqli($servername, $username, $password, $dbname);

	if($conn->connect_error){
		die("connction failed");
	}

	$id=$_POST["username"];
	$password=$_POST["password"];
	$query="select count(*) c from users where id='$id' and password='$password'"; 
	
	$result = $conn->query($query);

	echo $result->num_rows;

    	$row = $result->fetch_assoc(); 
	$numofrecord=$row["c"];
        echo  "number " . $numofrecord."<br>";
	if ($numofrecord==0)
	{
		session_start();
		$_SESSION["flag"]=-1;	
		header("Location: phpdemo.html");
		die();
	}	
	{
		session_start();
		$_SESSION["flag"]=100;
				
		header("Location: phpsqldemo.html");
		
		die();
	}				
	$conn->close();
}
else
{
echo "need to input first in order to delete!";
} 
?> 
