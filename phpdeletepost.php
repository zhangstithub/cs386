<html>
<body>

<form action="" method="post">
id: <input type="text" name="htmlid"><br>
<input type="submit">
</form>

<?php
if(!empty($_POST))
{
	echo "Processing input";

	$pid= $_POST["htmlid"];

	echo $pid;

	$servername="localhost";
	$username="sz";
	$password="700511";
	$dbname="sz";

	$conn=new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("connction failed");
	}

	$sql= "delete from topics where id=$pid";
	if ($conn->query($sql)===TRUE)
	{
		echo "deleted successfully";
	}
	else
	{
		echo "wrong with deletion";
	}

	$conn->close();
}
else
{
	echo "Go to this branch the fist time the page is loaded, because no input has been provided yet.";

} ?> </body> </html>
