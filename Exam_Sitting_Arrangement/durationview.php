<?php 

session_start();
    if (!isset($_SESSION['loggedin'])) {
      header('Location: login.php');
      exit();
    }
    global $g;
include_once('connection.php');

?>         
    

<!DOCTYPE html>
<html lang="en">
<head>
<title>AdminPanel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link rel="icon" type="image/png" href="https://static.invisionapp-cdn.com/spa/cfprojects/common/img/favicon-16x16.2648d8282b.png" sizes="16x16" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<style>
* {
  box-sizing: border-box;

}

body {
  font-family: Arial, Helvetica, sans-serif;
  background-color:rgb(250, 246, 246);
  

  
}



.header {
    margin-left: 0px;
  margin-right: 50px;
    width:1700px;
  color:white;
  background:rgb(54, 133, 54);
  height: 50px;
  box-shadow: 0 4px 8px 0 rgba(236, 234, 234, 0.2), 0 6px 20px 0 rgba(187, 184, 184, 0.19);

}


.header1 {
    position: absolute;
    width:210px;
  color:black;
  background:black;
  height: 2200px;
  margin-top: 50px;
  box-shadow: 0 4px 8px 0 rgba(236, 234, 234, 0.2), 0 6px 20px 0 rgba(187, 184, 184, 0.19);

}




.content {
  background-color: #ddd;
  padding: 10px;
  height: 200px; 
}












.container {
  position: relative;
  font-family: Arial;
}

.text-block {
  position: absolute;
  top:10px;
  left: 5px;
  color:white;
  padding-left: 20px;
  padding-right: 20px;
}

.border1{
position: absolute;
border: 3px solid skyblue;
  width:180px;
  height: 40px;
  margin-left:30px;
  background-color: white;
  border-radius: 8px;
  




}


.text-block1 {
  position: absolute;
  top:2080px;
  left: 50px;
  border-radius: 50px;
  background-color:white;
  color:rgb(125, 125, 175);
  height: 50px;
  padding-left: 20px;
  padding-right: 20px;
  box-shadow: 0 4px 8px 0 rgba(187, 180, 180, 0.2), 0 6px 20px 0 rgba(187, 184, 184, 0.19);

}

.border{
position: absolute;
border: 3px solid skyblue;
  width:150px;
  height: 40px;
  margin-left:7px;
  margin: -3px;

}
.container1{
position: relative;
font-family: Arial, Helvetica, sans-serif;
margin-left:200px;
background-color:rgb(236, 243, 247);
margin-top: 40px;
height:240px;
width: 80%;
}


@media screen and (max-width: 700px) {
  .column.side,.column.middle{  
    width:100%; 
    flex-direction: column;
  }
}


.foote {

  margin-top: 50px;
  margin-left: 230px;
}

.btn{
  background-color: #93ca3a;
  color: #fff;
  font-size: 13px;
  width: 250px;
  border-radius: 0;
}
.btn:hover{
  background-color: #fff;
  color: #93ca3a;
}


tr,td{
  padding: 10px;
  border-collapse: collapse;
  border:1px;
  width: 500px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
  border-style: outset;
}

th{
  color: white;
  background-color: black;
  font-size: 17px;
}


</style>
</head>
<body>
    





<div class="header1">

       

        <div class="w3-bar-block w3-black" style="width:210px; background-color: yellow;">

        <a href="dashboard.php"  class="w3-bar-item w3-button" ><h2 style="font-size: 30px; margin: 12px;" >Dashboard</h2></a>
 

            <div class="w3-button w3-block w3-left-align" onclick="myAccFunc()">

            Department <i class="fa fa-caret-down"></i>

            </div>

            <div id="demoAcc" class="w3-hide w3-white w3-card">

              <a href="Departmentadd.php" class="w3-bar-item w3-button">Edit</a>

              <a href="Departmentview.php" class="w3-bar-item w3-button">View</a>

            </div>

          

            <div class="w3-button w3-block w3-left-align" onclick="myAccFunc1()">

              Batch <i class="fa fa-caret-down"></i>

              </div>

              <div id="demoAcc1" class="w3-hide w3-white w3-card">

                <a href="batchadd.php" class="w3-bar-item w3-button">Edit</a>

                <a href="batchview.php" class="w3-bar-item w3-button">View</a>

              </div>

            

              <div class="w3-button w3-block w3-left-align" onclick="myAccFunc2()">

            
                Allocation <i class="fa fa-caret-down"></i>

                </div>

                <div id="demoAcc2" class="w3-hide w3-white w3-card">

                  <a href="studentadd.php" class="w3-bar-item w3-button">Edit</a>

                  <a href="allocation.php" class="w3-bar-item w3-button">View</a>

                </div>

 

                <div class="w3-button w3-block w3-left-align" onclick="myAccFunc3()">

                  Room <i class="fa fa-caret-down"></i>

                  </div>

                  <div id="demoAcc3" class="w3-hide w3-white w3-card">

                    <a href="roomadd.php" class="w3-bar-item w3-button">Edit</a>

                    <a href="roomview.php" class="w3-bar-item w3-button">View</a>

                  </div>

 

                  <div class="w3-button w3-block w3-left-align" onclick="myAccFunc4()">

                    Duration <i class="fa fa-caret-down"></i>

                    </div>

                    <div id="demoAcc4" class="w3-hide w3-white w3-card">

                      <a href="durationadd.php" class="w3-bar-item w3-button">Edit</a>

                      <a href="durationview.php" class="w3-bar-item w3-button">View</a>

                    </div>


                    
                    <div class="w3-button w3-block w3-left-align" onclick="myAccFunc6()">

                    Student <i class="fa fa-caret-down"></i>

                    </div>

                    <div id="demoAcc6" class="w3-hide w3-white w3-card">

                      <a href="studentadd1.php" class="w3-bar-item w3-button">Edit</a>

                      <a href="studentview.php" class="w3-bar-item w3-button">View</a>

                      </div>
<!-- 
                     <div class="w3-button w3-block w3-left-align" onclick="myAccFunc5()">

                    Seat Plan <i class="fa fa-caret-down"></i>

                    </div>

                    <div id="demoAcc5" class="w3-hide w3-white w3-card">

                      <a href="seatplanadd.php" class="w3-bar-item w3-button">Edit</a>

                      <a href="seatplanview.php" class="w3-bar-item w3-button">View</a>

                    </div> -->

          </div>

          

 

    </div>

 

    

<script>

 

    

    function myAccFunc() {

 

      var x = document.getElementById("demoAcc");

      if (x.className.indexOf("w3-show") == -1) {

        x.className += " w3-show";

        x.previousElementSibling.className += " w3-green";

      } else { 

        x.className = x.className.replace(" w3-show", "");

        x.previousElementSibling.className = 

        x.previousElementSibling.className.replace(" w3-green", "");

      }

    }


    function myAccFunc6() {
        var x = document.getElementById("demoAcc6");

        if (x.className.indexOf("w3-show") == -1) {

          x.className += " w3-show";

          x.previousElementSibling.className += " w3-green";

        } else { 

          x.className = x.className.replace(" w3-show", "");

          x.previousElementSibling.className = 

          x.previousElementSibling.className.replace(" w3-green", "");

        }

}
    

    function myAccFunc1() {

      var x = document.getElementById("demoAcc1");

      if (x.className.indexOf("w3-show") == -1) {

        x.className += " w3-show";

        x.previousElementSibling.className += " w3-green";

      } else { 

        x.className = x.className.replace(" w3-show", "");

        x.previousElementSibling.className = 

        x.previousElementSibling.className.replace(" w3-green", "");

      }

    }

 

    function myAccFunc2() {

      var x = document.getElementById("demoAcc2");

      if (x.className.indexOf("w3-show") == -1) {

        x.className += " w3-show";

        x.previousElementSibling.className += " w3-green";

      } else { 

        x.className = x.className.replace(" w3-show", "");

        x.previousElementSibling.className = 

        x.previousElementSibling.className.replace(" w3-green", "");

      }

    }

    

    function myAccFunc3() {

      var x = document.getElementById("demoAcc3");

      if (x.className.indexOf("w3-show") == -1) {

        x.className += " w3-show";

        x.previousElementSibling.className += " w3-green";

      } else { 

        x.className = x.className.replace(" w3-show", "");

        x.previousElementSibling.className = 

        x.previousElementSibling.className.replace(" w3-green", "");

      }

    }

    

    

    function myAccFunc4() {

      var x = document.getElementById("demoAcc4");

      if (x.className.indexOf("w3-show") == -1) {

        x.className += " w3-show";

        x.previousElementSibling.className += " w3-green";

      } else { 

        x.className = x.className.replace(" w3-show", "");

        x.previousElementSibling.className = 

        x.previousElementSibling.className.replace(" w3-green", "");

      }

    }

        // function myAccFunc5() {

        //   var x = document.getElementById("demoAcc5");

        //   if (x.className.indexOf("w3-show") == -1) {

        //     x.className += " w3-show";

        //     x.previousElementSibling.className += " w3-green";

        //   } else { 

        //     x.className = x.className.replace(" w3-show", "");

        //     x.previousElementSibling.className = 

        //     x.previousElementSibling.className.replace(" w3-green", "");

        //   }

        // }

    </script>


<div class="header">
  <div class="hea">


    <div class="text-block" style="font-size: 25px;"><b>Admin</b>panel</div>
    <a href="logout.php" ><p style=" position:absolute; padding-left:1400px;"><b> LOGOUT</b></p></a>


  </div>
</div>
      
<br><br><br>

<h2 style="margin-left: 220px;color: #FF7F50;margin-top: -30px;">Duration View</h2>

<div class="foote">  

  <div class="box">

  <table style="width:100%;">
    

    <tr>
      <th>Course ID</th>
      <th>Exam Duration</th>
      <th>Exam Date</th>
      <th>Department Name</th>
      <th>year</th>

      <th>update</th>
      <th>Delete</th>
    </tr>
<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $cid = $_POST['cid'];
    $exd = $_POST['exd'];
    $dat = $_POST['dat'];
    $dn = $_POST['dn'];
    $ye = $_POST['ye'];

    $query="UPDATE duration SET id_du= '$cid' ,exam_date = '$dat', exam_duration = '$exd', department_name = '$dn',year = '$ye' WHERE id_du = '$cid'";
    $result=$link->query($query);
}

if(isset($_GET['upd'])){

  
  $g = $_GET['upd'];
  //echo $g; 
  ?>
  
  <form action="durationview.php" method="post">
   <tr>
        <td align = "center">
        <input type="text" placeholder="Course Id" name="cid"  id="cid" required style="font-size: 15px;">
        </td>

        <td align = "center"><input type="text" placeholder="Exam Duration" name="exd"  id="exd" required style="font-size: 15px;">
        </td>
        <td align = "center"><input type="date" placeholder="date" name="dat"  id="dat" required style="font-size: 15px;">
        </td>

        <td align = "center"><input type="text" placeholder="Department name" name="dn"  id="dn" required style="font-size: 15px;">
        </td>      

        <td align = "center"><input type="text" placeholder="year" name="ye"  id="ye" required style="font-size: 15px;">
        </td> 
              

        <td colspan="2" align="center"><button class="btn success" onclick="confirm('Are you sure!')">Update</button></td>
      </tr>
   </form>
      <?php 
}
$query="select * from duration";
$result=$link->query($query);

    while ($rows=$result->fetch_assoc()) 
    {
  ?>    <tr>
        <td align = "center"><?php echo $rows['id_du']; ?></td>
        <td align = "center"><?php echo $rows['exam_duration']; ?></td>
        <td align = "center"><?php echo $rows['exam_date']; ?></td>
        <td align = "center"><?php echo $rows['department_name']; ?></td>
        <td align = "center"><?php echo $rows['year']; ?></td>

        <td align = "center">
        <a href="durationview.php?upd=<?php echo $rows['id_du']; ?>"><i class="fa fas fa-edit" style="color:gray; font-size: 40px; " ></i>
        </td></a>
        <!-- <button class="btn" type="submit" name ="Edit" style="margin-left: 130px;">
        <i class="fa fas fa-edit" style="color:gray; font-size: 40px; " ></i>
        </button> -->
        <td  align= "center">
        <a href="delete.php?del=<?php echo $rows['id_du']; ?>"><i class="fa fas fa-trash" style="color:gray; font-size: 40px; " ></i>
        </td></a>
      </tr>
      <?php
    }
  ?>

  </table>
  
  </div>

</div>

</div>

</body>
</html>
