<?php
    // $con = mysqli_connect("localhost","root","","exam_sitting");
    session_start();
    if (!isset($_SESSION['loggedin'])) {
      header('Location: login.php');
      exit();
    }
    include_once('connection.php');

    $sql = "SELECT * FROM `department` WHERE 1";
    $result = $link->query($sql);

    $sqlb = "SELECT * FROM `batch` WHERE 1";
    $resultb = $link->query($sqlb);

    $sqld = "SELECT * FROM `student_details` WHERE 1";
    $resultd = $link->query($sqld);

    
    $sqlr = "SELECT * FROM `room` WHERE 1";
    $resultr = $link->query($sqlr);

    // session_start();
    //if($_SESSION['val']!=-88){
    //  header("location:login.php");
    //}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>AdminPanel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
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





.colu {
  float: left;
  padding: 40px;
  height:300px;
  
}

/* Left and right column */
.colu.side {
  width: 25%;
   background-color: white;

  margin-left:175px;
  box-shadow: 0 4px 8px 0 rgba(247, 242, 242, 0.2), 0 6px 20px 0 rgba(248, 246, 246, 0.19);


}
.colu.side1 {
  width: 25%;
 margin-right:30px;
 box-shadow: 0 4px 8px 0 rgba(245, 241, 241, 0.2), 0 6px 20px 0 rgba(248, 245, 245, 0.19);
 margin-left:55px;
 background-color: white;



}

/* Middle column */
.colu.middle {
  width: 25%;
  background-color: white;

  box-shadow: 0 4px 8px 0 rgba(240, 236, 236, 0.2), 0 6px 20px 0 rgba(243, 240, 240, 0.19);
  margin-left:55px;

}

/* Clear floats after the columns */
.r:after {
  content: "";
  display: table;
  clear: both;
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
border: 3px solid rgb(117, 216, 117);
  width:270px;
  height: 160px;
  margin-left:10px;
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

.badge {
  position: absolute;
  top:-1px;
left: 1310px ;
  padding: 6px 6px;
  border-radius: 50%;
  background-color: red;
  color: white;
}


.badge1 {
  position: absolute;
  top:13px;
left: 1360px ;
padding: 10px 10px;

  border-radius: 50% 50%;
  background-color:rgb(120, 241, 120);
  color: white;
}

@media screen and (max-width: 700px) {
  .column.side,.column.middle{  
    width:100%; 
    flex-direction: column;
  }
}


.foote {
  border-top: 3px solid skyblue;
  border-bottom: 3px solid skyblue;
  border-radius: 15px;
  margin-top: 50px;
  margin-left: 220px;
  position: relative;
  background-color: rgb(236,243,247);
  width: 1210px;
  height:300px;

}

.box{
  margin-left: 20px;
  padding-top: 30px; 
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

              <a href="departmentview.php" class="w3-bar-item w3-button">View</a>

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
                    

                     <!-- <div class="w3-button w3-block w3-left-align" onclick="myAccFunc5()">

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

<?php 
  // $uname = "admin";
  // $pwd = "admin";
  
  // session_start();
  
  // if(isset($_SESSION['name'])){
  //   echo"hello";
  // }
  // else{
  //   if($_POSt['name'] == $uname && $_POST['psw'] == $pwd){
  //     header("location:dashboard.php");

  //   }
  //   else{
  //     echo"<script>alert('pi pi pi ')</script>";
  //     header("location:login.php");

  //   }
  // }
  
  
?>

<div class="header">
  <div class="hea">


    <div class="text-block" style="font-size: 25px;"><b>Admin</b>panel</div>
    <a href="logout.php" ><p style=" position:absolute; padding-left:1400px;"><b> LOGOUT</b></p></a>

  </div>
  

</div>

  
  

      
<br><br><br>

<h2 style="margin-left: 220px;color: #FF7F50;margin-top: -30px;">Dashboard</h2>

<div class="foote">  

  <div class="box">
        <div  class="border1" style="text-align:left; color:skyblue; padding-top: 18px; font-size:40px; padding-left: 30px; background-color: rgb(46, 106, 236);"><?php echo $result->num_rows; ?></div>
        <p style="position: absolute; margin-top: 80px; margin-left: 30px; font-size: 20px; color: white;"><b>Total department</b></p>
        <i class="fa fa-fw fa-user-o" style="color:white; font-size: 60px; margin-left:190px; padding-top:30px; position:absolute; height:150px;"></i>
        <div  class="border1" style="text-align:left; color:skyblue; padding-top: 18px; font-size:40px; padding-left: 30px; margin-left:320px;  background-color: rgb(201, 100, 64);"><?php echo $resultb->num_rows; ?></div>
        <p style="position: absolute; margin-top: 80px; margin-left: 330px; font-size: 20px; color: white;"><b>Total Batch</b></p>
        <i class="fa fa-fw fa-object-group" style="color:white; font-size: 60px; margin-left:490px; padding-top:30px; position:absolute; height:150px;"></i>

        <div  class="border1" style="text-align:left; color:skyblue; padding-top: 18px; font-size:40px; padding-left: 30px; margin-left:610px; background-color: rgb(139, 231, 139);" ><?php echo $resultd->num_rows; ?></div>
        <p style="position: absolute; margin-top: 80px; margin-left: 620px; font-size: 20px; color: white;"><b>Total Student</b></p>
        <i class="fa fa-fw fa-user-plus" style="color:white; font-size: 60px; margin-left:760px; padding-top:30px; position:absolute; height:150px;"></i>

        <div  class="border1" style="text-align:left; color:skyblue; padding-top: 18px; font-size:40px; padding-left: 30px; margin-left:900px; background-color: rgb(231, 69, 69);"><?php echo $resultr->num_rows; ?></div>          
        <p style="position: absolute; margin-top: 80px; margin-left: 920px; font-size: 20px; color: white;"><b>Total room</b></p>
        <i class="fa fa-fw fa-pie-chart" style="color:white; font-size: 60px; margin-left:1070px; padding-top:30px; position:absolute; height:150px;"></i>

      
  
  </div>

</div>


</body>
</html>
