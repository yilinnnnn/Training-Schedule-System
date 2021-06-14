<?php
session_start();
//connect to database
$db=mysqli_connect('localhost','root',null,'training_system');
$query="SELECT * FROM schedule"; //retrieve data from database
$result=mysqli_query($db,$query);

//if edit button is clicked
if(isset($_POST['submit'])){
    $selected=$_POST['radio_id'];
    $_SESSION['radio_id']=$selected;
    if($_POST['submit']=='Select'){
        header("location:editPage.php");
    }   

    else if($_POST['submit']=='Back'){
    header("location:showSchedule.php");
    }
}
echo mysqli_error($db);
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

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
    text-align: left;    
}

input[type=submit]{
    margin-left:auto;
    margin-right:auto;
    top:50%;
    cursor:pointer;
    background-color:#EDEAEA;
    color:black;
    border: none;
    border-radius: 4px;
    width:300px;
    height:40px;
    font-family:times new roman;
    font-size:20px;
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
<h3><font size="5">Please select a schedule below to edit</h3>
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
    if(!$result){
        die('Could not get data'.mysql_error());
    }
   
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
        </tr>';
   }
   echo "<table>";  
   
?>
   <br>
      <div class="button">
        <input type="submit" name="submit" value="Select">
        <input type="submit" name="submit" value="Back">
       </div>
       </form>

</body>
</html>