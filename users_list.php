<?php
session_start();
$db=mysqli_connect('localhost','root',null,'training_system');
$query="SELECT * FROM users";
$result=mysqli_query($db,$query);

if(isset($_POST['submit'])){
  if ($_POST['submit']=='Add'){
    header("location:addUser.php");
  }

  else if($_POST['submit']=='Back to home'){
    header("location:adminHomepage.php");
  }
}

//the edit button 
if(isset($_POST['edit'])){
$id=$_POST['edit'];
header("location:editUser.php?id=".$id);
}

else if(isset($_POST['delete'])){
  $id=$_POST['delete'];
  header("location:deleteUser.php?id=".$id);
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

table,th, td {
    border: 1px solid black;
    border-collapse: collapse;
    margin-left:auto;
    margin-right:auto;
}

th {
    padding:15px;
    text-align: center;    
    font-size:18px;
}


td {
    padding: 15px;
    text-align: left;    
    font-size:18px;
}

input[type=submit]{
    margin-left:auto;
    margin-right:auto;
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

button{
    cursor:pointer;
    background-color:#EDEAEA;
    color:black;
    border: none;
    border-radius: 4px;
    font-size:18px;
}

.editUser,.deleteUser{
    width:100%;
    height:40px;
    font-size:15px;
    margin-top:5px;
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Users List</center></h2>
<form action='' method='post'>
<table style="width:60%", "">
  <tr> 
      <th>Username</th>   
      <th>Password</th>
      <th>User type</th> 
      <th></th>
  </tr>

<?php   
$query="SELECT * FROM users";
$result2=mysqli_query($db,$query);
    
    while($row=mysqli_fetch_array($result2)){
     echo '
    <tr>
          <td>'.$row['username'].' </td>
          <td>'.$row['password'].'</td> 
          <td>'.$row['user_type'].'</td>
          <td><button type="submit" name="edit" class="editUser" value='.$row['id'].'>Edit</button><br>
          <button type="submit" name="delete" class="deleteUser" value='.$row['id'].'>Delete</button></td>
    </tr>
';
   } 
   echo"</table>";
   echo"</form>";

 ?>
      <div class="button">
      <form action="" method="post">
        <input type="submit" name="submit" value="Add">
        <input type="submit" name="submit" value="Back to home">
       </div>
       </form>

</div>
</body>
</html>