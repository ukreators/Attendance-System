<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="gencyolcu" />

	<title>Student Registeration</title>
</head>

<body style="margin-top: 50px;">
<a href="index.html"><img src="hlogo.png"height="70" width="70" style="position: fixed;" /></a>
<div style="width: 640px; padding: 5px;height: auto;margin-left: auto;margin-right: auto;border-radius: 20px;background: #E9E8E8;text-align: center;">
<center>
<form><fieldset>
<legend>Registration</legend>
<table>


<tr><td>Roll No.</td><td><input type="number" name="rno"/></td></tr>
<tr><td>Name</td><td><input type="text" name="name"/></td></tr>

<tr><td></td><td><input type="submit" name="sub1" value="Register"/></td></tr></table>
</fieldset>
</form>

<?php

if(isset($_REQUEST['sub1'])){
    require_once('connect.php');
    
    $name=$_REQUEST['name'];
    $rno=$_REQUEST['rno'];
    
    $query="INSERT INTO Students VALUES  ($rno,'$name');";
    $query2="INSERT INTO Attendance (roll) VALUES ($rno);";
    
    if(mysqli_query($conn,$query2)){
        if(mysqli_query($conn,$query)){echo '<script>alert("Registeration Successful")</script>';} 
    }
    else{
        echo mysqli_error($conn);
        
    }
    
    
    
    mysqli_close($conn);

}
?>
</div>

</body>
</html>