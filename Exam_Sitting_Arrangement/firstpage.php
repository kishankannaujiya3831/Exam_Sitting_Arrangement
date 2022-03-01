

<!DOCTYPE php>
<html>
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
  margin-top: 120px;
  margin-left: 180px;
  position: relative;
  background-color: rgb(236,243,247);
  width: 1210px;
  height:300px;
}

.box{
  margin-left: 100px;
  padding-top: 30px; 
}

.btn{
  background-color: #93ca3a;
  color: #fff;
  font-size: 13px;
  width: 250px;
  border-radius: 0;
  margin-top: 60px;
  margin-left:100px;

}
.btn:hover{
  background-color: #fff;
  color: #93ca3a;
}


</style>
</head>
<body>
    





       



<div class="header">
  <div class="hea">


    <div class="text-block" style="font-size: 25px;"><b>first</b>page</div>

  </div>
</div>


<h1 style="margin-top:50px; margin-left:400px; color:red; font-size:60px;"><b>Exam Seating Arrangement</b></h1>
  

      


<div class="foote">  

  <div class="box">
   <!-- <button class="btn" type="submit" value = "submit" style="margin-left: 70px; height:60px; margin-top:80px; font-size:25px"><h3><a href="studentlogin.php">Student Login<a></h3></button>
   <button class="btn" type="submit" value = "submit" style="margin-left: 70px; height:60px; margin-top:-50px; font-size:25px"><h3><a href="login.php">Admin Login</a></h3></button> -->

<button class="btn" type="submit" value = "submit" style=""><a href="studentlogin.php" style="text-decoration:none;"><h3>Student Login</h3></a></button>
<button class="btn" type="submit" value = "submit" style="margin-left:200px;"><a href="login.php" style="text-decoration:none;"><h3>Admin Login</h3></a></button>


</div>

</div>
</body>
</html>