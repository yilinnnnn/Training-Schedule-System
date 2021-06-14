<?php
session_start();
  
$selected=$_SESSION['check_list'];
$db=mysqli_connect("localhost","root",null,"training_system");
$query="SELECT * FROM inventory WHERE id='$selected'";
$result=mysqli_query($db,$query);
$row=mysqli_fetch_array($result);
$id=$row['id'];
$book_title=$row['book_title'];
$quantity=$row['quantity'];
$stock_status="$row['Stock_status"];

foreach($selected as $check_list){
    echo "hello";
}
        else{
    echo "<b>Please Select Atleast One Option.</b>";
    }
}
}
?>