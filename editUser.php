<?php
session_start();
$db=mysqli_connect("localhost","root",null,"training_system");

if(isset($_POST['update'])){
    $id=$_POST['update'];

    //prevent sql injection
    $username=htmlspecialchars($_POST['username'],ENT_NOQUOTES,'UTF-8');
    $password=htmlspecialchars($_POST['password'],ENT_NOQUOTES,'UTF-8');
    $user_Type=htmlspecialchars($_POST['user_type'],ENT_NOQUOTES,'UTF-8');

    //escape special characters in String
    $username=mysqli_real_escape_string($db,$username);
    $password=mysqli_real_escape_string($db,$password);
    $user_Type=mysqli_real_escape_string($db,$user_Type);
 
    //password encryption
    $password=md5($password);

    $query="UPDATE users SET username='$username',password='$password',user_type='$user_Type'WHERE id='$id'";
    echo "<script type='text/javascript'>alert('User Info updated!')</script>";
    $result2=mysqli_query($db,$query);
}

if(isset($_POST['back'])){
    header("location:adminHomepage.php");
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
    margin-left:0px;
}

table.table1, table.table1 th, table.table1 td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
    text-align: left;    
    margin-left:auto;
    margin-right:auto;
}

input[type=text],input[type=password],select{
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

h3{
margin-left:100px;
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Edit User Infomation</h2></font>
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
  $query="SELECT* FROM users WHERE id='$selected'";
  $result=mysqli_query($db,$query);
  $row=mysqli_fetch_array($result);

  $id=$row['id'];
  $username=$row['username'];
  $password=$row['password'];
  $user_type=$row['user_type'];
    
    echo'
     <tr>
        <th>'.$row['username'].'</th>
        <th>'.$row['password'].'</th>
        <th>'.$row['user_type'].'</th>
    </tr>';
    
    echo mysqli_error($db);
?>
</table>
<br><br>

<h3><font size="5" face="times new roman" color="#841A1A">Please edit the information below and click update button</h3>
<div class="main">
    <form method="post" action=""> 
    <table style="width:50%" class="table2">
            <tr><th>Username: <th><input type="text" name="username" value=<?php echo $username;?>></th></tr>
            <tr><th>Password: <th><input type="password" name="password"value=<?php echo $password;?>></th></tr>
            <tr><th>User Type:<th><select name="user_type" value=<?php echo $user_type ?>>
            <?php 
                    if($user_type=="admin"){
                    echo '<option selected value="admin">Admin</option>';
                    echo '<option value="manager">Manager</option>';
                    echo '<option value="trainer">Trainer</option>';
                }
                else if($user_type=="manager"){
                    echo '<option value="admin">Admin</option>';
                    echo '<option selected value="manager">Manager</option>';
                    echo '<option value="trainer">Trainer</option>';
                }

                else {
                    echo '<option value="admin">Admin</option>';
                    echo '<option value="manager">Manager</option>';
                    echo '<option selected value="trainer">Trainer</option>';
                }
            ?>
                </select></th></tr>
      </table>
        
        <h2><center><button type="submit" name="update" value=<?php echo $id;?>>Update</button>
        <button type="submit" name="back" value="Back to home">Back </button></center></h2>
    </form>
</div>

</body>
</html>