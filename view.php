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
    th{
        background:#989898;
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
<body>

<center>
<!--Home Button-->
<a href="index.html"><img src="hlogo.png"height="70" width="70"  style="position: fixed;"/></a><br /><br /><br /><br />


<div style="padding: 5px;height: auto;margin-left: auto;margin-right: auto;border-radius: 20px;background: #E9E8E8;">

<h2>Attendance of all Student's</h2></center>


<?php

    //connect to database
    require_once('connect.php');
    
    //To print all student's names
    $query="SELECT * FROM Students ORDER BY roll;";
    $res1=mysqli_query($conn,$query);
    
    echo'<table style="float:left;" ><tr><th class="name">Name</th></tr>';
    
    $var1=2;//used for different colored rows
    
    while($row1=mysqli_fetch_assoc($res1)){
        
        //used for different colored rows
        if($var1%2){
            $style="color2";
            }
            else{
            $style="white";
             }
             $var1++;
           
           //Printing Student's Name
        echo "<tr class=".$style."><td>$row1[name]</td></tr>";
        }
    echo"</table>";    
    

    $query="SELECT cdate from class";
    $res2=mysqli_query($conn,$query);
      
 
  while($row1=mysqli_fetch_assoc($res2)){
    //Prints date as table header
    $cdate=$row1['cdate' ];
    echo'<table style="float:left;"><tr><th>'.$cdate.'</th></tr>';
    
    //retrieve student'sname'
    $query2="SELECT $cdate from attendance;";
    $res1=mysqli_query($conn,$query2);
    
    $var1=2;//for different colored rows
    $var='A';
    while($row2=mysqli_fetch_assoc($res1)){
        
        $row2date=$row2["$cdate"];
        
        //for Present 'P' for 1 value and absent  'A' for 0'
        if($row2date==1){
                $var='P';}else{$var='A';}
        
        //for differnt colored rows
        if($var1%2){
        $style="color2";
        }
        else{
        $style="white";
         }
         $var1++;
         
            echo "<tr class=".$style."><td>$var</td></tr>";
        }
        
        
        
    
           
          
    echo "</table>";
  }
  
  


mysqli_close($conn);
?>


</table>

</div>
</body>
</html>


