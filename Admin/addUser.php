<?php 
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y/m/d H:i:s");
$db=mysqli_connect('localhost','root',null,'training_system');
if(isset($_POST['submit'])) { 
    if($_POST['submit']=='Add user'){
        //prevent sql injection
        $username=htmlspecialchars($_POST['username'],ENT_NOQUOTES,'UTF-8');
        $password=htmlspecialchars($_POST['password'],ENT_NOQUOTES,'UTF-8');
        $userType=htmlspecialchars($_POST['user_type'],ENT_NOQUOTES,'UTF-8');
         
        //escape special character in String
        $username=mysqli_real_escape_string($db,$username);
        $password=mysqli_real_escape_string($db,$password);
        $userType=mysqli_real_escape_string($db,$userType);

        //password encryption 
        $password = md5($password);

        $query="INSERT into users(username,password,user_type) VALUES ('$username','$password','$userType')";
        $result=mysqli_query($db,$query);
        header("location:users_list.php");
        echo mysqli_error($db); 
    }
    
    else if($_POST['submit']=='Back to home'){
     header("location:adminHomepage.php");
    }
}   
?>

<html>
<style>
.header{
    padding-left:50px;
    padding-right:50px;
    padding-top:20px;
}

.main{
    align:center;
    border:1px solid;
    margin-left:100px;
    margin-right:100px;
}

form{
    text-align:center;
} 

input[type=text],input[type=password],select{
    width:300px;
    height:30px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size:20px;
    font-family:times new roman;
}

table{
   margin-left:auto;
   margin-right:auto;
   font-size:20px;
   padding-bottom:20px;
}

th{
    padding-top:20px;
    padding-left:50px;
    padding-right:40px;
    text-align:left;
    font-size:25px;
}

input[type=submit]{
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
body{
    padding-left:50px;
    padding-right:50px;
    padding-bottom:50px;
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Add User</h2></font>
<br>

<div class="main">
    <form method="post" action=""> 
        <table width:80%>
            <div class="inputTitle">
            <tr><th>Username: <th><input type="text" name="username"></th></tr>
            <tr><th>Password: <th><input type="password" name="password"> </th></tr>
            <tr><th>User type<th><select name="user_type"> 
            <option value="admin">Admin</option>
            <option value="manager">Manager</option>
            <option value="trainer">Trainer</option>
            </select></th></tr>
          
        </table>
        
        <h2><input type="submit" name="submit" value="Add user"> &nbsp&nbsp
            <input type="submit" name="submit" value="Back to home"></h2>

    </form>
</div>
</body>
</html>
