<?php
    // $con = mysqli_connect("localhost","root","","exam_sitting");

    session_start();
    if (!isset($_SESSION['loggedin'])) {
      header('Location: login.php');
      exit();
    }

    include_once("db.php");
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
  height:400px;
}

.box{
  margin-left: 100px;
  padding-top: 40px; 
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
    


<form action="durationadd.php" method = "post">

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

  

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

$id1  = $_POST['id_du'];
$dp = $_POST['dep'];
$exam_dur = $_POST['exam_dur'];
$exam_dat = $_POST['exam_dat'];
$year = $_POST['ye'];



  // if($Name=='' || $roll=='' || $dep==''){
  //   echo "empty";
  // }

    $query="insert into duration(id_du,exam_date,exam_duration,department_name,year) 
    values('$id1','$exam_dat','$exam_dur','$dp','$year')";
    $result=$link->query($query);
}

?>           
            
<br><br><br>

<h2 style="margin-left: 220px;color: #FF7F50;margin-top: -30px;">Add Duration</h2>

<div class="foote">  

  <div class="box">

  Course Id  <input type="text" placeholder="Course Id" name="id_du" id = "id_du" required style="font-size: 15px;border-radius: 5px; margin-left: 80px; width: 300px;">

  <br><br>

  Exam Duration  <input type="text" placeholder="Strating Time  - end Time" name="exam_dur" id = "exam_dur" required style="font-size: 15px;border-radius: 5px; margin-left: 48px; width: 300px;">
  
  <br><br>

  Exam Date  <input type="date" placeholder="Enter Date" name="exam_dat" id = "exam_dat" required style="font-size: 15px;border-radius: 5px; margin-left: 69px; width: 300px;">

<br><br>
  
  Department-name  <input type="text" placeholder="Department-name" name="dep" id="dep" required style="font-size: 15px;border-radius: 5px; margin-left: 25px; width: 300px;">
  <br><br>

Year <select name="ye" id="ye" style="font-size: 15px;border-radius: 5px; margin-left: 45px; width: 70px; ">
  <option value="0" ></option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
</select>
  <!-- Status
  <input type="radio" name="rad" value="Active" style="margin-left: 105px; margin-right: 10px;">Active
  <input type="radio" name="rad" value="Inactive" style="margin-left: 60px;margin-right: 10px;">Inactive
  <br><br><br> -->
  <br><br><br>
  <button class="btn" type="submit" style="margin-left: 130px;">Add Duration</button>
  
  </div>

</div>

    </form>
</body>
</html>
