<?php 
session_start();
$db=mysqli_connect("localhost","root",null,"training_system");
$selected=$_SESSION['radio_id'];
$query="SELECT* FROM schedule WHERE id='$selected'";
$result2=mysqli_query($db,$query);

$row=mysqli_fetch_array($result2);
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

    if(isset($_POST['delete'])){
     $id=$_POST['delete'];
     $query="DELETE FROM schedule WHERE id='$id' ";
     echo "<script type='text/javascript'>alert('Schedule deleted!')</script>";
     $result3=mysqli_query($db,$query);
    }

    else if (isset($_POST['back'])){
        header("location:showSchedule.php");
    }
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
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
    text-align: left;    
}


button{
    margin-left:50px;
    cursor:pointer;
    background-color:#EDEAEA;
    color:black;
    border: none;
    border-radius: 4px;
    width:300px;
    height:40px;
    align:center;
}

.button{
    text-align:center;
}
</style>

<body>
<div class="header">
  <ul>
    <li><a href="managerHomepage.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSW9kt9F8ZV2tn-YtBnBXp6ItHSKEPi6vMjlqSfUxDJ1nPjZtFy" align="left" width="370px" height="65px"></a></li>
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Schedule</center></h2>
<h3><font size="5">Please select a schedule below to delete</h3>
<table style="width:100%">
  <tr> 
        <th></th>
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
   $db=mysqli_connect("localhost","root",null,"training_system");
   $query="SELECT * FROM schedule";
   $result=mysqli_query($db,$query);
    while($row=mysqli_fetch_array($result)){ //retrieve data from database
    echo '
        <tr>
          <form action="" method="post">
            <td><input type="radio" name="radio_id" value='.$row['id'].'></td>
            <td>'.$row['trainer'].' </td>
            <td>'.$row['start_date'].'</td> 
            <td>'.$row['end_date'].'</td>
            <td>'.$row['start_time'].'</td>
            <td>'.$row['end_time'].'</td>
            <td>'.$row['course'].'</td>
            <td>'.$row['room'].'</td>
            <td>'.$row['totalpax'].'</td>
            <td>'.$row['status'].'</td>
            <td>'.$row['lastChangedOn'].'</td>
            <td>'.$row['lastChangedBy'].'</td>
        </tr>'
   ;}
   echo "</table>";                     
   
?>
   <br>
    <div class="button">
       <h2><button type="submit" name="delete" value=<?php echo $id; ?>>Delete</button>
        <button type="submit" name="back" value="Back">Back</button></h2>  
    </div>
</form>
</body>
</html>