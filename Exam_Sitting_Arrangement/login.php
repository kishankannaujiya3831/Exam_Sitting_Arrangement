
<?php 
session_start();

include_once('connection.php');

$username = filter_input(INPUT_POST, 'name');
$password = filter_input(INPUT_POST, 'psw');

if ( mysqli_connect_errno() ) {
  // If there is an error with the connection, stop the script and display the error.
  die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $sql = "SELECT * from register where username = '$username' AND password = '$password'";
  $result = $link->query($sql);
  if($result->num_rows >0){
    header("location:dashboard.php");
    $_SESSION['username'] = $username;
    $_SESSION['loggedin'] = TRUE;
    echo $_SESSION['username'];
  }
  else{
    echo "<script>alert('Invalid UserId/Password'); window.location = './login.php';</script>";
  }
  $link->close();
}




// if($_SERVER['REQUEST_METHOD']=='POST'){
//   $username=$_POST['name'];
//   $password=$_POST['psw'];

//   $query="select * from register where username='$username' and password='$password'";
//   $result=$link->query($query);
//   if($rows=$result->fetch_assoc())
//   if($username==$rows['username'] && $password==$rows['password']){
//           header("location:dashboard.php");
//           exit();
//   }
//   else{

//       echo"_Invalid u";
//   }
// }


?>      


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
	font-family: Arial, Helvetica, sans-serif;
	padding: 0px;
	margin: 0px;
}
form {border: 3px solid #f1f1f1;}

h4{
	margin: 0;
	background-color: #4CAF50;
	color: white; 
	text-align: center;
	font-size: 25px; 
	padding-top: 25px;
	padding-bottom: 10px;
	margin-bottom: 60px;
	height: 50px;
}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  margin-left: 24%;
  margin-top: 50px;
  font-size: 18px;
  border-radius: 18px;

}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.newf {
	width: 40%;
	margin-left: 400px;
	border-radius: 3%;
}

.newf h3{
	background-color: grey;
	color: white;
	text-align: center;
	padding-top: 20px;
	margin: 0;
	border-radius: 10px 10px 0 0 ;
	height: 50px;

}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>


<?php







?>

<h4>Seat Plan Management System</h4>

<form action="login.php" method="post" class="newf">
	<h3>Admin Login</h3>
  <div class="imgcontainer">
    <img src="ghj.jpg" alt="Avatar" class="avatar">
  </div>



  <div class="container">
    <label for="uname"><b>UserID</b></label>
    <input type="text" placeholder="Enter UserID" name="name"  id="name" required style="font-size: 15px;border-radius: 15px;">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required style="font-size: 15px;border-radius: 15px;">
        
    <button type="submit" name="submit" value="submit">Login</button>
  </div>

</form>

</body>
</html>


