
<?php 
session_start();
if (!isset($_SESSION['loggedin'])) {
  header('Location: firstpage.php');
  exit();
}include_once('connection.php')

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>StudentPanel</title>
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
  margin-left: 20px;
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
    




<div class="header">
  <div class="hea">


    <div class="text-block" style="font-size: 25px;"><b>Student</b>panel</div>
    <a href="logout.php" ><p style=" position:absolute; padding-left:1400px;"><b> LOGOUT</b></p></a>


  </div>
</div>

      

      
<br><br><br>

<h1 style="margin-left: 20px;color: #FF7F50;margin-top: -30px;">Student Profile</h1>

<?php

  
$id = $_SESSION['id'];

$query="select id,name,dept from student_details where id = '$id'";
// $q="select * from allocation where id = '$id'";

$result=$link->query($query);

$rows=$result->fetch_assoc();

?>

<center>
<form style="width:20%;">
 <fieldset>
  <legend style="font-size:25px;"><b>Student Details</b></legend>
  <div style="text-align:center;color:red;font-size:20px">
  <strong>
  <div style="margin-left:-20px;">
  Id:&nbsp &nbsp <?php echo $rows['id']; ?>
  <br>
  </div>
  <div style="margin-left:-55px;">
  Name:&nbsp &nbsp <?php echo $rows['name']; ?>
  <br>
  </div>
  <div style="margin-left:-70px;">
  Dept:&nbsp &nbsp <?php echo $rows['dept']; ?>
  <br>
  </div>
  </strong>
  </div>

 </fieldset>
</form>
</center>

<div class="foote">  

  <div class="box">

  <table style="margin-left:-10px; width:100%;">
    

    <tr>

      <th>Room</th>
      <th>Seat</th>
      <th>Exam Date</th>
      <th>Duration</th>
      <th>Course Id</th>


      <!-- <th>Duration</th> -->


    </tr>

    <?php
    
    $id = $_SESSION['id'];

    $query="SELECT * FROM student_details JOIN duration ON student_details.dept = duration.department_name AND student_details.year = duration.year where student_details.id = '$id'";
    $q="select * from allocation where id = '$id'";

    $result=$link->query($query);
    $r=$link->query($q);
    // $r1=$link->query($q1);


    //$room = $r1->fetch_assoc();
  // $room1=$room1['room1'];
    // $room1 = $room['room'];

    if($room = $r->fetch_assoc()){
//echo "hello";
    while($rows=$result->fetch_assoc() )
    { 
      //echo "hello";
      // $q1="select * from duration where department_name = '".$rows['dept']."' and year = '".$rows['year']."'";
      // $r1=$link->query($q1);
      // while($data = $r1->fetch_assoc()){
    ?>
      <tr align="center">

        <td><?php echo $room['room']?></td>
        <td><?php echo $room['sno']?></td>
        <td><?php echo $rows['exam_date']; ?></td>
        <td> <?php echo $rows['exam_duration']; ?></td>
        <td><?php echo $rows['id_du']; ?></td>


        <!-- <td>php echo $rows['exam_duration']; ?></td> -->
      </tr>
<?php
    }
    }

    ?>


 
  </table>
  
  </div>

</div>

  







</body>
</html>
