<?php 
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
$date=date("Y/m/d H:i:s");
$db=mysqli_connect('localhost','root',null,'training_system');
    if(isset($_POST['submit'])) { 
        if($_POST['submit']=='Add schedule'){
            //prevent sql injection
            $username=htmlspecialchars($_SESSION['username'], ENT_NOQUOTES, 'UTF-8');
            $trainer_name=htmlspecialchars($_POST['name'], ENT_NOQUOTES, 'UTF-8');
            $startDate=htmlspecialchars($_POST['start_date'], ENT_NOQUOTES, 'UTF-8');
            $endDate=htmlspecialchars($_POST['end_date'], ENT_NOQUOTES, 'UTF-8');
            $start_time=htmlspecialchars($_POST['start_time'], ENT_NOQUOTES, 'UTF-8');
            $end_time=htmlspecialchars($_POST['end_time'], ENT_NOQUOTES, 'UTF-8');
            $course=htmlspecialchars($_POST['course'], ENT_NOQUOTES, 'UTF-8');
            $room=htmlspecialchars($_POST['room'], ENT_NOQUOTES, 'UTF-8');
            $totalpax=htmlspecialchars($_POST['totalpax'], ENT_NOQUOTES, 'UTF-8');
            $status=htmlspecialchars("Approved", ENT_NOQUOTES, 'UTF-8');
            
            //escape special character in string 
            $username=mysqli_real_escape_string($db,$username);
            $trainer_name=mysqli_real_escape_string($db,$trainer_name);
            $startDate=mysqli_real_escape_string($db,$startDate);
            $endDate=mysqli_real_escape_string($db,$endDate);
            $start_time=mysqli_real_escape_string($db,$start_time);
            $end_time=mysqli_real_escape_string($db,$end_time);
            $course=mysqli_real_escape_string($db,$course);
            $room=mysqli_real_escape_string($db,$room);
            $totalpax=mysqli_real_escape_string($db,$totalpax);
            $status=mysqli_real_escape_string($db,$status);
            $query="INSERT into schedule(username,trainer,start_date,end_date,start_time,end_time,course,room,totalpax,status,lastChangedOn,lastChangedBy) VALUES ('$username','$trainer_name','$startDate','$endDate','$start_time','$end_time','$course','$room','$totalpax','$status','$date','$username')";
            $result=mysqli_query($db,$query);
            header("location:viewSchedule.php");
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

input[type=text],[type=date],[type=time],[type=number],select{
    width:300px;
    height:30px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
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

<h2 style="text-align:center"><font face="times new roman" size="8" color="#841A1A">Add Schedule</h2></font>
<br>

<div class="main">
    <form method="post" action=""> 
        <table width:80%>
            <div class="inputTitle">
            <tr><th>Trainer Name: <th><input type="text" name="name"></th></tr>
            <tr><th>Training Start Date: <th><input type="date" name="start_date" min=<?php echo date('Y-m-d');?>></th></tr>
            <tr><th>Training End Date:<th><input type="date" name="end_date"> </th></tr>
            <tr><th>Training Start Time:<th><input type="time" name="start_time"></th></tr>
            <tr><th>Training End Time:<th><input type="time" name="end_time"></th></tr>
            <tr><th>Course:<th><select id="course" onclick="myFunction()" required>
            <option value="">Select Course</option>
            <option value="solidworks training">SOLIDWORKS Training</option>
            <option value="Other training">Other training (Please specify here)</option>
            </select>
            <p id="select_course"></p>
            <script>
            function myFunction() {
            var x = document.getElementById("course").value;

            if(x=="solidworks training"){
            document.getElementById("select_course").innerHTML = 
            "<select name='course'><?php 
                        
                $query="SELECT category FROM course_category"; 
                $result=mysqli_query($db,$query);
        
                while($row=mysqli_fetch_array($result)){
                $category=$row['category'];
                $query2="SELECT * FROM course WHERE category='$category'";
                $result2=mysqli_query($db,$query2);
                echo "<optgroup label='$category'>";

                    while($row2=mysqli_fetch_array($result2)){
                    $course_title=$row2['course_title'];
                    echo "<option value='$course_title'>$course_title</option>";
                    }
                echo"</optgroup>";
                } ?>
                </select>";
            }

            else if(x=="Other training"){
            document.getElementById("select_course").innerHTML = "<input type='text' name='course' placeholder='Please Enter Course'>";
            }
            else{
            document.getElementById("select_course").innerHTML = "";
            }

        }
        </script></th></tr>            

            <tr><th>Room:<th> <select name="room"> 
                            <option value="room1">Training Room 1</option>
                            <option value="room2">Training Room 2</option>
                    </select></th></tr>
            <tr><th>Total Pax:<th> <input type="number" name="totalpax"></th></tr> 
            </div>
        </table>
        
        <h2><input type="submit" name="submit" value="Add schedule"> &nbsp&nbsp
            <input type="submit" name="submit" value="Back to home"></h2>

    </form>
</div>
</body>
</html>
