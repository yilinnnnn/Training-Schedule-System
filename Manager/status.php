<?php
session_start();
if(!isset($_SESSION['isLoggedIn'])){
  header("location:index.php");
}

if(isset($_POST['submit'])){
header("location:/training_system/logout.php");
}

$db=mysqli_connect("localhost","root",null,"training_system");
    
//update the status of approval
    if(isset($_POST['approve'])){
      $id=$_POST['approve'];
      $query="UPDATE schedule SET status='Approved' WHERE id='$id'";
      $result2=mysqli_query($db,$query);
      echo "<script type='text/javascript'>alert('Status approved!')</script>";
    }

    else if(isset($_POST['reject'])){
        $id=$_POST['reject'];
        $query="UPDATE schedule SET status='Rejected' WHERE id='$id'";
        $result2=mysqli_query($db,$query);
        echo "<script type='text/javascript'>alert('Status rejected!')</script>";
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
    color: white;
    text-align: center;
    padding: 20px;
    text-decoration: none;
    font-family:times new roman;
    font-size:
}

li h2{
    text-align:right;
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
}
th, td {
    padding: 15px;
    text-align: left;    
    font-size:18px;
}

button{
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
    font-size:20px;
    font-family:times new roman;
}

.button{
    text-align:center;
}

.approve{
    width:80px;
    height:40px;
    font-size:15px;
    margin-top:10px;
    background-color:#09D120;
}

.reject{
    width:80px;
    height:40px;
    font-size:15px;
    margin-top:10px;
    background-color:#F24E3D;
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Schedule Approval</h2></font>
<br>
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
      <th>Approval</th>
  </tr>

<?php   
echo "<form action='' method='post'>";
$query="SELECT * FROM schedule";
$result=mysqli_query($db,$query);
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
          <td><button type="submit" name="approve" class="approve" value='.$row['id'].'>Approve</button><br>
          <button type="submit" name="reject" class="reject" value='.$row['id'].'>Reject</button></td>
    </tr> ';} 
echo"</form>";
echo"</table>"; 
?>
<br>
    <center><a href="managerHomepage.php"><button type="submit" name="back">Back to home</button></a></center>
</div>
</body>
</html>
