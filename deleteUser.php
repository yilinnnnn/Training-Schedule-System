<?php
session_start();

if(isset($_POST['back'])){
    header("location:users_list.php");
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
    margin-left:auto;
    margin-right:auto;
}

input[type=text],select{
    width:300px;
    height:30px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

table.table2,table.table2 th,table.table2 td{
    margin-left:auto;
    margin-right:auto;
    font-size:20px;
    padding-bottom:20px;
    padding-top:20px;
}

button{
    margin-left:10px;
    margin-right:100px;
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
     <li><a href="adminHomepage.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSW9kt9F8ZV2tn-YtBnBXp6ItHSKEPi6vMjlqSfUxDJ1nPjZtFy" align="left" width="370px" height="65px"></a></li>
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Users List</h2></font>
<br>

<table class="table1" style="width:50%">
  <tr> 
        <th>Username</th>   
        <th>Password</th>
        <th>User Type</th> 
  </tr>
  
  <?php 
  $selected=$_GET['id'];
  $db=mysqli_connect("localhost","root",null,"training_system");
  $query="DELETE FROM users WHERE id='$selected'";
  echo "<script type='text/javascript'>alert('User deleted!')</script>";
  $result=mysqli_query($db,$query);
  
$query="SELECT * FROM users";
$result2=mysqli_query($db,$query);
    
    while($row=mysqli_fetch_array($result2)){
     echo '
    <tr>
          <td>'.$row['username'].' </td>
          <td>'.$row['password'].'</td> 
          <td>'.$row['user_type'].'</td>
    </tr>
';
   } 
   echo"</table>";
   echo"</form>";

 echo mysqli_error($db);
?>
</table>
<br><br>
    <form action="" method="post">
    <h2><center><button type="submit" name="back" value="Back">Back</button></center></h2>
    </form>
</div>

</body>
</html>