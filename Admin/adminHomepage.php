<?php
session_start();
if(!isset($_SESSION['isLoggedIn'])){
  header("location:/training_system/index.php");
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
}

li h2{
    text-align:right;
}

.grid-container {
    display: grid;
    justify-content: space-around;
    grid-template-columns: 400px 400px ;
    grid-template-rows:270px 270px ; 
    grid-gap: 50px;
    background-color:#E7E3E4;
    padding-top: 100px;
    padding-left:50px;
    padding-right:50px;
    padding-bottom:100px;
    width:90%;
    margin-left:auto;
    margin-right:auto;
}

.grid-container > div {
    background-color: #F5F5F5;
    text-align: center;
    padding-top:30px;
    padding-left:0px;
    padding-right:10px;
    font-size: 30px;
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

div{
    font-family:times new roman;
}

.btn{
    border: none;
    background-color: inherit;
    padding-top: 35px;
    padding-bottom: 10px;
    font-size: 20px;
    cursor: pointer;
    display: inline-block;
    color:black;
}

.addUser,.routine,.check{
    padding-top:10px;
}

.editUser,.approve,.alert{
    padding-top:20px;
}

.schedule,.add,.update{
    padding-top:10px;
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Training Schedule System</h2></font>
<br>
<div class="grid-container">

  <div>Admin Panel <br><br>
      <button class="btn addUser"><a href=addUser.php style="text-decoration: none">* Add user</a></button><br>
      <button class="btn editUser"><a href=users_list.php style="text-decoration: none">* Edit user</a></button>
  </div>
  <div>Schedule <br><br>
       <button class="btn schedule"><a href=viewSchedule.php style="text-decoration: none">* View Schedule </a></button><br>
       <button class="btn add"><a href=addSchedule.php style="text-decoration: none">* Create schedule</a></button><br>
       <button class="btn update"><a href=showSchedule.php style="text-decoration: none">* Update schedule</a></button>
  </div>
  <div>Task<br><br>
       <button class="btn approve"><a href=status.php style="text-decoration: none">* Schedule approval </a></button><br>
  </div>
  <div>Inventory<br><br>
       <button class="btn check"><a href=inventory.php style="text-decoration: none">* Check inventory</a></button><br>
       <button class="btn alert"><a href=# style="text-decoration: none">* Low stock alert</a></button><br>
  </div>
</div>
</body>
</html>
