<html>
<body>

<form action="" method="post">
id: <input type="text" name="htmlid"><br>
name: <input type="text" name="htmlname"><br>
<input type="submit">
</form>

<?php
if(!empty($_POST))
{
	echo "Processing input";

	$pid= $_POST["htmlid"];
	$pname=$_POST["htmlname"];

	echo $pid;
	echo $pname;

	$servername="localhost";
	$username="sz";
	$password="700511";
	$dbname="sz";

	$conn=new mysqli($servername, $username, $password, $dbname);
	if($conn->connect_error){
		die("connction failed");
	}

	$sql= "update topics set name='$pname' where id=$pid";
	if ($conn->query($sql)===TRUE)
	{
		echo "updated successfully";
	}
	else
	{
		echo "wroong";
	}

	$conn->close();
}
else
{
	echo "Go to this branch the fist time the page is loaded, because no input has been provided yet.";

} ?> </body> </html>
