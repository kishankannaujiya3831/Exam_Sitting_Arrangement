<?php
    // mysql_connect('localhost','root','');
    // mysql_select_dp('student_view');
 $host="localhost";
$dbName="student_view";
$user="root";
$pass="";

    // $con = mysqli_connect("localhost","root","","exam_sitting");
$link=new mysqli($host,$user,$pass,$dbName);

?>