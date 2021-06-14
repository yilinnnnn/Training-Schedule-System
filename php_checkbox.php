<?php
session_start();

if(isset($_POST['check_list'])){
    $_SESSION['check_list'] = $_POST['check_list'];
    
}


if(isset($_POST['back'])){
header("location:inventory.php");
}

    if(isset($_POST['add'])){
        if($_POST['add']){
            $add=$_POST['quantity'];
            $db=mysqli_connect("localhost","root",null,"training_system");
            foreach($_SESSION['check_list'] as $selected){
                $query="SELECT quantity FROM inventory WHERE id='$selected'";
                $result=mysqli_query($db,$query);
                $row=mysqli_fetch_array($result);
                $prev_quantity=$row['quantity'];
                $quantity=$add+$prev_quantity;
                $query="UPDATE inventory SET quantity='$quantity' WHERE id='$selected'";
                $result=mysqli_query($db,$query);
                }
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Update Inventory</h2></font>

<table style="width:80%">
<tr>
            <th>Book title</th>
            <th>Quantity</th>
            <th>Stock Status</th>
</tr>           

<?php
            if(isset($_SESSION['check_list'])){
                // Loop to store and display values of individual checked checkbox.
                foreach($_SESSION['check_list'] as $selected) {
                    $db=mysqli_connect("localhost","root",null,"training_system");
                    $query="SELECT * FROM inventory WHERE id='$selected'";
                    $result=mysqli_query($db,$query);
                        while($row=mysqli_fetch_array($result)){
                        echo'
                        <tr>
                        <td>'.$row['book_title'].'</td>
                        <td>'.$row['quantity'].'</td>
                        <td>'.$row['stock_status'].'</td>
                        </tr>';
                        }
                    }
                echo"</table>";
            }
        
   


?>
<form action="" method="post">
<h2>Please enter quantity to repurchase:&nbsp&nbsp<input type="number" name="quantity">
<input type="submit" name="add" value="Add" >
<button type="submit" name="submit" value="back">Back</button>
</form>


</body>
</html>