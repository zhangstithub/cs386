<html>
<body>

<form action="" method="post">
id: <input type="text" name="htmlid"><br>
<input type="submit">
</form>

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

	$id=$_POST["htmlid"];
	$query="select id, name from topics where id=$id";
	
	$result = $conn->query($query);
	echo $result->num_rows;

	if ($result->num_rows===1) {
 		// output data of each row
    		$row = $result->fetch_assoc(); 
        	echo  "Name: " . $row["name"]."<br>";
	} else 
	{
    		echo "Either No (0) results or something wrong!";
	}
	$conn->close();
}
else
{
echo "need to input first in order to delete!";
} 
?> 

</body> </html>
