<?php 
include_once('connection.php');

if(isset($_GET['del'])){


    $id = $_GET['del'];
   // mysqli->query("DELETE FROM duration where id_du = $id") or die($mysqli->error());


    $query="DELETE FROM duration where id_du = $id";
    $result=$link->query($query);

    header('location:durationview.php');
  } 

  if(isset($_GET['delse'])){

    $id = $_GET['delse']; 
    $query="DELETE FROM seatplan where sno = $id";
    $result=$link->query($query);
    header('location:seatplanview.php');
  }

  if(isset($_GET['delro'])){

    $id = $_GET['delro']; 
    $query="DELETE FROM room where name = '$id'";
    $result=$link->query($query);
    header('location:roomview.php');
  }

  if(isset($_GET['delst'])){

    $id = $_GET['delst']; 
    $query="DELETE FROM student_details where id = '$id'";
    $result=$link->query($query);
    header('location:studentview.php');
  }

  if(isset($_GET['delbt'])){

    $id = $_GET['delbt']; 
    $query="DELETE FROM batch where sno = $id";
    $result=$link->query($query);
    header('location:batchview.php');
  }

  if(isset($_GET['delst2'])){

    $id = $_GET['delst2']; 
    $query="DELETE FROM allocation where id = '$id'";
    $result=$link->query($query);
    header('location:allocation.php');
  }

  
  if(isset($_GET['delst3'])==5){

    $query="TRUNCATE TABLE allocation";
    $result=$link->query($query);

    $sql = "SELECT * FROM `room` WHERE 1";
    $r = $link->query($sql);
    $i = 1;
    while($i <= $r->num_rows){
      $data = $r->fetch_assoc();
      $capacity = $data['capacity'];
      $name = $data['name'];

      $q = "UPDATE `room` SET `seats_available`= '".$capacity."' WHERE name = '".$name."' ";
      echo "<br>".$q;
      $update = $link->query($q);

      $i += 1;
    }
    
    header('location:allocation.php');
  }


  if(isset($_GET['delde'])){

    $id = $_GET['delde']; 
    $query="DELETE FROM department where sno = $id";
    $result=$link->query($query);
    header('location:departmentview.php');
  }

?>