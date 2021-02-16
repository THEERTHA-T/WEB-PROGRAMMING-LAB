<html>
<head>
	<title>exercise 11</title>
	<style>
		table
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

	</style>
</head>
<body bgcolor=#b1aed1>
<form name="form" action="" method="POST">
	<br>
	<h2 align="center"><mark>FORM VALIDATION</mark></h2><br>
	<table align="center">
		<tr>
			<td>Full Name</td>
			<td><input type="text" name="fname" placeholder="enter your full name" size="25"></td>
		</tr>
		<tr>
			<td>Email ID</td>
			<td><input type="email" name="email" placeholder="enter email ID" size="25"></td>
		</tr>
		<tr>
			<td>Phone Number</td>
			<td><input type="text" name="phn" placeholder="enter phone Number" size="25"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="Password" name="pswd" placeholder="minimum 8 digits" size="25"></td>
		</tr>
		<tr>
			<td>Confirm Password</td>
			<td><input type="Password" name="cpswd" placeholder="Re-type Password" size="25"></td>
		</tr>
		<tr><td></td></tr>
		<tr>
			<td><input type="reset" name="reset" id="btn1"></td>
			<td align="center"><input type="submit" name="submit"  class="btn2"></td>
		</tr>
	</table>	
</form>	

<?php 

    if(isset($_POST['submit']))
    {
    	$fname = $_POST['fname'];  
    	$email = $_POST['email'];  
    	$phn = $_POST['phn'];  
   		$pswd = $_POST['pswd'];  
   		$cpswd = $_POST['cpswd']; 
        if($fname == ""||$email == ""||$phn==""||$pswd == ""||$cpswd == "")
        {
            echo "<script>alert('Mandatory Fields Missing !!');</script>";
        }
        else if(!ctype_alpha($fname))
        {
 	            echo "<script>alert('Enter valid name..!!');</script>";

        }
        else if(!ctype_digit($phn)||strlen($phn)!=10)
      	{
            echo "<script>alert('Enter 10 digit Phone Number..!!');</script>";
        }

        else if (strlen($pswd)<8)
        {
            echo "<script>alert('Password should contain atleast 8 characters.!');</script>";
        }
        else if($pswd!=$cpswd)
        {
        	echo "<script>alert('Password Missmatch.!')</script>";
        }    
        else
        {
            echo "<script>alert('Successfully Done..!')</script>";
        } 
    }
?>
</body>
</html>
