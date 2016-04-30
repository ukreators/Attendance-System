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
<body style="margin-top: 50px;" >

<!--Home Button-->
<a href="index.html"><img src="hlogo.png"height="70" width="70" style="position: fixed;" /></a>

<center>
<div style="width: 640px; padding: 5px;height: auto;margin-left: auto;margin-right: auto;border-radius: 20px;background: #E9E8E8;">
<h2>Today's Attendance</h2>


<?php
ECHO "Today is ".date('d F Y');
?>

<form><table align="center">
    <tr style="background:#A0A0A0;">
    <th>Roll No.</th>
    <th class="name">Name</th>
    <th> Present</th>
    </tr>


<?php
    require_once('connect.php');//Database conncetion
    
    //1->Student's name from Student table
    $query="SELECT * FROM Students order by roll;";
          
        
    if($res=mysqli_query($conn,$query)){
        
        $var1=2;//for row color styling
        
        while($row=mysqli_fetch_assoc($res)){
            
            //for row color styling
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
                 <td>".'<Input type="checkbox" name="'.$row['roll'].'" value=1>
                 </tr>';
                 
                 //In above the inout has same name(to refer)) as name of student
        }
    
    
    }else{echo "Data not retrieved:".mysqli_error($conn);}
    
    
    
    echo'</table><br /><input type="submit" name="enter" value="Mark"></form>';
    
    
    //Save attendance in database
    
    if(isset($_REQUEST['enter'])){
    
    $GLOBALS['flag']=1;//Variable flag used to help avoid duplicate attendance
    
    
    
    $today="_".date("dmy");
    
    $query3="INSERT INTO class (cdate) Values ('$today');";
    if(!mysqli_query($conn,$query3)){print "Today's attendance has been taken already";$GLOBALS['flag']=0;}
    else{
        mysqli_query($conn,"Alter table Attendance ADD COLUMN $today int(1) DEFAULT 0;");
    }
    
    
    if($GLOBALS['flag']!=0){
    
    //To update attendance in recently created class
    

    
    
    
    //Listing Student's Name
    $query="SELECT * FROM Students;";
    
    $names="";
    if($res=mysqli_query($conn,$query)){
        
        while($row=mysqli_fetch_assoc($res)){
            
            $r=$row["roll"];//Student's name'
            
            @$r2=$_REQUEST["$r"]; //Value of Attendance
            if($r2==1){
                $names.="roll='"."$r"."' OR ";
                
            }   //Present=1 absent =0
            
        } 
           
           $names=strrev($names);
           $names=strstr($names,"'");
           $names=strrev($names);
           
          
            //$q="UPDATE attendance SET $today=1 WHERE (;";
            
        $query="Update  attendance SET $today='1' where $names;" ; 
        
        if(!mysqli_query($conn,$query)){echo "Error";}      
                 
        }
    
    
    
    
    
    
    
    
    }
    }
    
    mysqli_close($conn);
?>


</div>

</body>
</html>