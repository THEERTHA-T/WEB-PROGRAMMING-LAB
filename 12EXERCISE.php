<html>
<head>
	<title>exercise 11</title>
	<style>
		#table1
		{
			background-color:white;
			padding: 30px;
			border-spacing: 15px;
	        box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
		}
		#btn1
		{
			padding: 5px 22px;
			background-color: red;
		}
		.btn2
		{
			padding: 5px 22px;
			background-color: green;
		}
		#table2
		{
					background-color:white;
					padding: 30px;
					width:44%;
					text-align: center;
					border-collapse: collapse;
		}

	</style>
</head>
<body bgcolor=#b1aed1>
<form name="form" action="" method="POST">
	<br>
	<h2 align="center"><mark>STUDENT REGISTRATION</mark></h2><br>
	<table align="center" id="table1">
		<tr>
			<td>Student Name</td>
			<td><input type="text" name="name"  size="25" required=""></td>
		</tr>
		<tr>
			<td>Roll No</td>
			<td><input type="text" name="rollno" size="25" required=""></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td><select name="gender" required="">
				<option selected>--select gender--</option>
				<option>male</option>
				<option>female</option>
			</select></td>
		</tr>
		<tr>
			<td>Subject</td>
			<td><input type="text" name="sub"  size="25" required=""></td>
		</tr>
		<tr>
			<td>Mark</td>
			<td><input type="text" name="mark" size="25" required=""></td>
		</tr>
		<tr><td></td></tr>
		<tr>
			<td><input type="reset" name="reset" value="CLEAR" id="btn1"></td>
			<td align="center"><input type="submit" name="submit"  class="btn2"></td>
		</tr>
	</table>	
</form>	
</body>
</html>

<?php 

$servername="localhost";
$username="root";
$password="";
$dbname="webb_db";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{

	echo "Connection Failed.!";
}
else
{
	if(isset($_POST['submit']))
    {
    	$rollno = $_POST['rollno'];
    	$name = $_POST['name'];  
    	$gender = $_POST['gender'];  
   		$sub = $_POST['sub'];  
   		$mark = $_POST['mark'];
   	
   	$sql="insert into student values($rollno,'$name','$gender','$sub',$mark)";
   	if(mysqli_query($conn,$sql))
   	{
   		echo '<script>alert("SUCCESSFULLY RECORDED");</script>';
   	}
   	else
   	{
   		$sql="select * from student where rollno=$rollno";
   		$result = $conn->query($sql);

   		if ($result->num_rows > 0) 
   		{
   			   		echo '<script>alert("RECORD ALREADY EXIST ");</script>';
   			   		return;

   		}
   		echo "error";
   	}

   	$sql="select * from student"; 
   	$result=mysqli_query($conn,$sql);
   	if(mysqli_num_rows($result))
   	{

   		echo '<center><h2><u>STUDENT DETAILS</u></h2>
   		<table border="1" id="table2" cellpadding="4" cellspacing="5">
   		<tr><th>RollNo</th><th>Name</th><th>Gender</th><th>Subject</th><th>Mark</th></tr>';
   		while($row=mysqli_fetch_assoc($result))
   		{
   			echo '<tr><td>' .$row["rollno"].'</td><td>'.$row["name"].'</td><td>'.$row["gender"].'</td><td>'.$row["sub"].'</td><td>'.$row["mark"].'</td></tr>';
   		}
   		echo '</table></center><br><br>';
   	}
   	else
   	{
   		echo '<script>alert("table empty");</script>';
   		
   	}
   	mysqli_close($conn);
}
}
?>
