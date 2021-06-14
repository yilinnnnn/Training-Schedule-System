<?php
session_start();

if(isset($_POST['submit'])){
   $db=mysqli_connect('localhost','root',NULL,'training_system');
   $username=$_POST['username'];
   $_SESSION['username']=$username; 

   
   $password=$_POST['password'];
   $password=md5($password);
   
   $query="SELECT * FROM users WHERE username='$username'AND password='$password'";
   $result=mysqli_query($db,$query);
  
   if (mysqli_num_rows($result) == 1) { // user found
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_type'] = $row['user_type'];
        $_SESSION['isLoggedIn']=true;
          if($_SESSION['user_type']=='admin'){
          header("location:admin/adminHomepage.php");
        }
          
          if($_SESSION['user_type']=='manager'){
            header("location:manager/managerHomepage.php");
          }

          if($_SESSION['user_type']=='trainer'){
            header("location:trainer/trainerHomepage.php");
          }
   }

    else {
        echo "<script type='text/javascript'>alert('Wrong username/password combination!')</script>"; //show error msg if user not exist
    }
 
}

?>

<html>
<style>

.main{
  align:center;
  margin-top:200px;
  border:1px solid;
  margin-left:100px;
  margin-right:100px;
}

td{
font-size:20px;
font-family:times new roman;
text-align:center;
height:20px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
}

.header{
    padding-left:50px;
    padding-right:50px;
    padding-top:20px;
}

input[type=text],[type=password]{
  width:300px;
  height:30px;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.button{
    cursor:pointer;
    background-color:#EDEAEA;
    color:black;
    border: none;
    border-radius: 4px;
    width:300px;
    height:40px;
}

h2{
    color:#761717;
}
</style>

<body>
<center>
<div class="main">
   <div class="header">
     <ul>
       <li><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSW9kt9F8ZV2tn-YtBnBXp6ItHSKEPi6vMjlqSfUxDJ1nPjZtFy" align="left" width="370px" height="65px"></li>
       <li><img src="http://2.bp.blogspot.com/-qHgYmpS1Px8/Tc3Y4ivplQI/AAAAAAAAAHQ/spDfeWT9vIM/s640/NewSolidWorksLogoMedium.jpg" align="right" width="350px" height="90px"></li>
     </ul>
   </div>

<form method="POST" action="">
 <h1><font face="times new roman">CAD Vision Training System</h1>
 <br>
 <h2>Username:&nbsp&nbsp<input type="text" name="username"></h2>
 <h2>Password: &nbsp <input type="password" name="password"></h2>
 <br>
 <h3><button class="button" type="submit" name="submit">Login</button><h3>
 <br><br>
</form>

</div>
</center>
</body>
</html>    