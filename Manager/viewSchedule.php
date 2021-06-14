<?php
session_start();
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

input[type=date]{
    width:250px;
    height:38px;
    font-size:20px;
    font-family:times new roman;
    margin-left:100px;
    margin-top:70px;
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
    width:100px;
    height:40px;
    font-size:18px;
    font-family:times new roman;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px;
    text-align: left;    
    font-size:18px;
}

h4{
    font-size:35px;
    margin-left:100px;
    color:black;
}

.back{
    text-align:center;
    top:50%;
    cursor:pointer;
    background-color:#EDEAEA;
    color:black;
    border: none;
    border-radius: 4px;
    width:300px;
    height:40px;
    margin-top:100px;
    margin-bottom:100px;
    font-size:20px;
    font-family:times new roman;
}

a{
    text-decoration-line:none;
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
    &nbsp&nbsp<button class="logout"><a href="logout.php">Logout</a></button></font></h2></li>
  </ul>
</div>

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Schedule</center></h2>
<form method="post" action="">
<input type="date" name="date">
<input type="submit" name="submit" value="Search">
</form>

<?php
if(isset($_POST['submit'])=='Search') {
  $date = $_POST['date'];
  $db = mysqli_connect('localhost', 'root', null, 'training_system');
  $query = "SELECT * FROM schedule WHERE start_date='$date'";
  $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result)==false){
    echo "<h4>Result not found</h4>";
  }

  else{
    echo '
    <table style="width:100%">
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
    </tr>' ;

    while($row=mysqli_fetch_array($result)){
     echo '
      <tr>
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
      </tr>';}
      echo "</table>";
    }
}

else {
echo'
<br>
<hr>
<h2 style="text-align:center"><font face="times new roman" size="7" color="#841A1A">All Schedule</center></h2>
<table style="width:100%">
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
  </tr>';       
  $db=mysqli_connect("localhost","root",null,"training_system");
  $query="SELECT * FROM schedule";
  $result2=mysqli_query($db,$query);
    while($row=mysqli_fetch_array($result2)){
     echo '
    <tr>
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
    </tr>
'; } 
}
   echo"</table>"
?>

<center><button class="back"><a href="managerHomepage.php">Back to home</a></button></center>
</table>
</body>
</html>