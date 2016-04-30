<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="gencyolcu" />
    <style>
    table{
        padding: 5px;
        border-spacing: 5px;
    }
    td,th{
        text-align:center;
    }
    th.name{
        width: 140px;
        text-align: center;
    }
    
    tr.color2{
    background:#DBDBDB;
    }
    tr.white{
    background:#FFFFFF;
    }
    </style>
	<title>Student's List</title>
</head>

<body style="margin-top: 50px;">

<!--Home Button-->
<a href="index.html"><img src="hlogo.png"height="70" width="70" style="position: fixed;" /></a>


<div style="width: 640px; padding: 5px;height: auto;margin-left: auto;margin-right: auto;border-radius: 20px;background: #E9E8E8;">

<center><h2>List of all Student's</h2></center>

<table align="center">

<tr style="background:#A0A0A0;">
<th>Roll No.</th>
<th class="name">Name</th>
</tr>

<?php
    //connect to database
    require_once('connect.php');
    
    //All registered student's name'
    $query="SELECT * FROM Students ORDER BY roll;";
    
    if($res=mysqli_query($conn,$query)){
    
        $var1=2;//used for different colored rows
        while($row=mysqli_fetch_assoc($res)){
           
            //for different colored rows
            if($var1%2){
            $style="color2";
            }
            else{
            $style="white";
             }
             $var1++;
             
            echo"<tr class=".$style.">
                 <td>$row[roll]</td>
                 <td>$row[name]</td>
                 </tr>";
                 
        }
    
    
    }else{echo "Data not retrieved:".mysqli_error($conn);}
    
    mysqli_close($conn);
?>


</table>

</div>
</body>
</html>


