<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y/m/d H:i:s");
$db=mysqli_connect("localhost","root",null,"training_system");
//If update button is clicked 
if(isset($_POST['update'])){
    //prevent sql injection
    $id=htmlspecialchars($_POST['update'], ENT_NOQUOTES, 'UTF-8');
    $trainer=htmlspecialchars($_POST['trainer'], ENT_NOQUOTES, 'UTF-8');
    $startDate=htmlspecialchars($_POST['start_date'], ENT_NOQUOTES, 'UTF-8');
    $endDate=htmlspecialchars($_POST['end_date'], ENT_NOQUOTES, 'UTF-8');
    $start_time=htmlspecialchars($_POST['start_time'], ENT_NOQUOTES, 'UTF-8');
    $end_time=htmlspecialchars($_POST['end_time'], ENT_NOQUOTES, 'UTF-8');
    $course=htmlspecialchars($_POST['course'], ENT_NOQUOTES, 'UTF-8');
    $room=htmlspecialchars($_POST['room'], ENT_NOQUOTES, 'UTF-8');
    $totalpax=htmlspecialchars($_POST['totalpax'], ENT_NOQUOTES, 'UTF-8');
    $status=htmlspecialchars("Pending for approval", ENT_NOQUOTES, 'UTF-8');

    //escape special character in String
    $id=mysqli_real_escape_string($db,$id);
    $trainer=mysqli_real_escape_string($db,$trainer);
    $startDate=mysqli_real_escape_string($db,$startDate);
    $endDate=mysqli_real_escape_string($db,$endDate);
    $startTime=mysqli_real_escape_string($db,$start_time);
    $endTime=mysqli_real_escape_string($db,$end_time);
    $course=mysqli_real_escape_string($db,$course);
    $room=mysqli_real_escape_string($db,$room);
    $totalpax=mysqli_real_escape_string($db,$totalpax);
    $status=mysqli_real_escape_string($db,$status);
    
    //connect to database
    $query="UPDATE schedule SET trainer='$trainer',start_date='$startDate', end_date='$endDate',start_time='$startTime',end_time='$endTime',course='$course',room='$room',totalpax='$totalpax' WHERE id='$id' ";
    echo "<script type='text/javascript'>alert('Schedule updated!')</script>";
    $result2=mysqli_query($db,$query);
    $query="UPDATE schedule SET status='Pending for approval', lastChangedOn='$date', lastChangedBy='$_SESSION[username]'WHERE id='$id'";
    $result3=mysqli_query($db,$query);

}

else if(isset($_POST['back'])){
    header("location: showSchedule.php");}
?>


<html>
<style>
.header{
    padding-left:50px;
    padding-right:50px;
    padding-top:20px;
}

body{
    padding-left:50px;
    padding-right:50px;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    }

li {
    float:left;
}

li a {
    display: block;
    color:white;
    text-align: center;
    padding: 20px;
    text-decoration: none;
  
}

.logout{
    width:120px;
    height:50px;  
    cursor:pointer;
    background-color:#950F0F;
    font-size:16px;
    font-family:arial;
    text-transform: uppercase;
    margin-left:0px;;
    margin-right:50px;
    border-radius: 4px;
    border:none;
}

table.table1, table.table1 th, table.table1 td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
    text-align: left;    
}

input[type=text],[type=date],[type=time],[type=number],select{
    width:300px;
    height:30px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

table.table2{
    margin-left:50px;
    margin-right:50px;
    font-size:20px;
    padding-bottom:20px;
    text-align:center;
}

table.table2 th,table.table2 td{
    padding-top:20px;
    padding-left:50px;
    padding-right:40px;
    text-align:left;
}

button{
    margin-left:150px;;
    margin-right:50px;
    top:50%;
    cursor:pointer;
    background-color:#EDEAEA;
    color:black;
    border: none;
    border-radius: 4px;
    width:300px;
    height:40px;
    font-size:20px;
    font-family:times new roman;
}

</style>
<body>
<div class="header">
<ul>
     <li><a href="trainerHomepage.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSW9kt9F8ZV2tn-YtBnBXp6ItHSKEPi6vMjlqSfUxDJ1nPjZtFy" align="left" width="370px" height="65px"></a></li>
     <li><img src="http://2.bp.blogspot.com/-qHgYmpS1Px8/Tc3Y4ivplQI/AAAAAAAAAHQ/spDfeWT9vIM/s640/NewSolidWorksLogoMedium.jpg" width="350px" height="90px"></li> 
     <li style="float:right"><h2><font face="times new roman" size="6">Welcome,
         
         <?php 
       // display username 
          if(isset($_SESSION['isLoggedIn'])){ 
          echo $_SESSION['username'] ;}
         ?>
         
       !&nbsp&nbsp<button class="logout"><a href="logout.php">Logout</a></button></font></h2></li> 
</ul>
</div>

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Edit Schedule</h2></font>
<br>

<table class="table1" style="width:100%">
  <tr> 
        <th>Trainer Name</th>   
        <th>Start Date</th>
        <th>End Date</th> 
        <th>Start Time</th>
        <th>End Time</th>
        <th>Course Name</th>
        <th>Room</th>
        <th>Total Pax</th>
        <th>Status</th>
        <th>Last Changed On</th>
        <th>Last Changed By</th>
  </tr>
  
  <?php 
    $selected=$_SESSION['radio_id'];
    $db=mysqli_connect("localhost","root",null,"training_system");  
    $query=" SELECT* FROM schedule WHERE id='$selected'";
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    //to get selected data
    $id=$row['id'];
    $trainer=$row['trainer'];
    $startDate=$row['start_date']; 
    $endDate=$row['end_date'];
    $startTime=$row['start_time'];
    $endTime=$row['end_time'];
    $course=$row['course'];
    $room=$row['room'];
    $totalpax=$row['totalpax'];
    $status=$row['status'];
    $lastChangedOn=$row['lastChangedOn'];
    $lastChangedBy=$row['lastChangedBy'];

    echo'
     <tr>
     <td>'.$trainer.' </td>
     <td>'.$startDate.'</td> 
     <td>'.$endDate.'</td>
     <td>'.$startTime.'</td>
     <td>'.$endTime.'</td>
     <td>'.$course.'</td>
     <td>'.$room.'</td>
     <td>'.$totalpax.'</td>
     <td>'.$status.'</td>
     <td>'.$lastChangedOn.'</td>
     <td>'.$lastChangedBy.'</td>
    </tr>';

    echo mysqli_error($db);
?>
</table>
<br><br>

<h3><font size="5" face="times new roman" color="#841A1A">Please edit the information below and click submit button</h3>
<div class="main">
    <form method="post" action=""> 
    <table style="width:100%" class="table2">
            <tr><th>Trainer Name: <th><input type="text" name="trainer" value="<?php echo $trainer;?>"></th></tr>
            <tr><th>Training Start Date: <th><input type="date" name="start_date"value=<?php echo $startDate;?> min=<?php echo date('Y-m-d'); ?>></th></tr>
            <tr><th>Training End Date:<th><input type="date" name="end_date"value=<?php echo $endDate;?> min=<?php echo date('Y-m-d'); ?>> </th></tr>
            <tr><th>Training Start Time:<th><input type="time" name="start_time"value=<?php echo $startTime;?>></th></tr>
            <tr><th>Training End Time:<th><input type="time" name="end_time"value=<?php echo $endTime;?>></th></tr>
            <tr><th>Course:<th><input type="text" name="course"value="<?php echo $course;?>"></th></tr>
            <tr><th>Room:<th> <select name="room" value=<?php echo $room ?>> 
                           <?php 
                            if($room=="room1"){
                                echo '<option selected value="room1">Training Room 1</option>';
                                echo '<option value="room2">Training Room 2</option>';
                            }
                            else{
                                echo '<option value="room1">Training Room 1</option>';
                                echo '<option selected value="room2">Training Room 2</option>';
                            }
                            ?>
                            </select></tr></tr>
            <tr><th>Total Pax:<th> <input type="number" name="totalpax" value=<?php echo $totalpax;?>></th></tr> 
        </table>
        
        <h2><button type="submit" name="update" value=<?php echo $id;?>>Update</button> &nbsp&nbsp
        <button type="submit" name="back" value="Back to home">Back </button></h2>
    </form>
</div>

</body>
</html>