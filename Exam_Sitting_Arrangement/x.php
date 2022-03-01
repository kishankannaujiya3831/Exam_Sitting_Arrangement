<?php
//  header('Location: login.php');



//..................................................



if($_SERVER['REQUEST_METHOD']=='POST'){
    // eecho $_POST['room'];
    // $year = $_POST['year'];
    // $room = $_POST['room'];
    // $dept = $_POST['dept'];
    // $cid = $_POST['cor'];

    include_once('connection.php');

    $sql = "SELECT * FROM `department` WHERE 1";
    $result = $link->query($sql);

    $yearid = array();
    $x = array();
    $i = 1;
    while($i <= $result->num_rows){
        $data = $result->fetch_assoc();
        $deptname = $data['department_name'];
        array_push($x, $_POST[$deptname]);
        array_push($yearid, $deptname);
        // $x[$deptname] = $_POST[$deptname];
        $i = $i + 1;
    }

    $temp = " ";

    $i = 0;
    while( $i < count($x) and $x[$i][0] == 0){
        $i += 1;
    }

    if($i == count($x)){
        // myecho "Invalid Entry";
        echo "<script>alert('Invalid Entry'); window.location = './studentadd.php';</script>";
    }else{

        $array = $x[$i];
        $temp .= " ( `dept` = '".$yearid[$i]."' and ";
        $temp .= " `year` =  ".$array[0]." )";

        $j = 1;
        while($j < count($array)){
            $temp .= " or ( `dept` = '".$yearid[$i]."' and ";
            $temp .= " `year` =  ".$array[$j]." )";

            $j += 1;
        }

        $i +=1;

        while( $i < count($x) ){

            $array = $x[$i];
            if($array[0] != 0){
                $temp .= " or";
                $temp .= " ( `dept` = '".$yearid[$i]."' and ";
                $temp .= " `year` =  ".$array[0]." )";

                $j = 1;
                while($j < count($array)){
                    $temp .= " or ( `dept` = '".$yearid[$i]."' and ";
                    $temp .= " `year` =  ".$array[$j]." )";

                    $j += 1;
                }    
            }

            $i += 1;
        }

        $sql = "SELECT * FROM `student_details` WHERE ";
        $sql .= $temp;
        $result = $link->query($sql);

        // myecho $sql;

        $c = 1;
        $total_students = $result->num_rows;
        // eecho $total_students;
        // eecho $result->num_rows;
        // while($c <= $result->num_rows){
        //     $data = $result->fetch_assoc();
        //     echo '<p> '.$data['id']."</p>";
        //     $c = $c + 1;
        // }
        if($result->num_rows == 0){
            // myecho "<p>No Students</p>";
            echo "<script>alert('No Students Selected'); window.location = './studentadd.php';</script>";
        }else{
            $rooms = $_POST['room'];
            if(count($rooms)==0){
                // myecho "<p>Please Select Rooms</p>";
                echo "<script>alert('Please Select Rooms'); window.location = './studentadd.php';</script>";
            }else{
                $temp = " ";
                $temp .= "name = '".$rooms[0]."' ";
                $count = 1;
                while($count < count($rooms)){
                    $temp .= "or name = '".$rooms[$count]."' ";
                    $count += 1;
                }
                $sqlroom = "SELECT * from `room` where ".$temp;
                // myecho $sqlroom;

                //code goes here..........
                $r = $link->query($sqlroom);
                $i = 1;
                $availability = 0;
                $avail_array = array();
                $rooms = array();

                while($i <= $r->num_rows){
                    $data = $r->fetch_assoc();
                    // eecho $data['seats_available'];
                    array_push($rooms, $data['name']);
                    array_push($avail_array,$data['seats_available']);
                    $availability += $data['seats_available'];
                    $i += 1;
                }
                // print_r($avail_array);
                // eecho $availability;

                if($availability >= $total_students){
                    ///then do something
                    $s = 1;
                    $i = 0;

                    $insertQ = "INSERT INTO `allocation`(`id`, `room`) VALUES ";
                    
                    $new_avail = array();
                    while($i < count($avail_array)){
                        $j = $avail_array[$i];
                        while($s <= $total_students and $j){
                            $data = $result->fetch_assoc();
                            
                            if($s == 1){
                                $insertQ .= " ( '".$data['id']."' , '".$rooms[$i]."' ) ";
                            }else{
                                $insertQ .= ", ( '".$data['id']."' , '".$rooms[$i]."' ) ";
                            }

                            $j -= 1;
                            $s += 1;
                        }

                        array_push($new_avail, $j);
                        $i += 1;
                    }

                    // myecho "<br>".$insertQ;

                    //..............insertion
                    $insertResult = $link->query($insertQ);
                    //.....................................

                    // print_r($rooms);
                    print_r($new_avail);
                    $f1 = 0;
                    while($f1 < count($rooms)){
                        $updateQ = "UPDATE `room` SET `seats_available`= '".$new_avail[$f1]."' WHERE name = '".$rooms[$f1]."'";
                        
                        //.................................updation
                        $updateResult = $link->query($updateQ);
                        //........................................
                        $f1 += 1;
                    }

                    // header('location:allocation.php');
                    
                    echo "<script>alert('Added Successfully'); window.location = './allocation.php';</script>";
                }else{
                    // myecho "<p>Room(s) not Sufficient</p>";
                    echo "<script>alert('Room(s) not Sufficient'); window.location = './studentadd.php';</script>";
                }


                //  
                //code end..........


            }
        }
    }

    // foreach ($x as $key => $value){
        
    // }
    // $temp = "year = ". $year[0]." ";
    // $sql = "SELECT * FROM `student_details` WHERE ";
    // if(count($year)>1){
    //     $i = 2;
    //     while($i <= count($year)){
    //         $temp .= "OR year = ".$year[$i-1] ;
    //         $i = $i + 1; 
    //     }
    // }
    // $sql .= $temp;
    // $result = $link->query($sql);

    // eecho $sql;

    // $i = 1;
    // eecho $result->num_rows;
    // while($i <= $result->num_rows){
    //     $data = $result->fetch_assoc();
    //     echo '<p> '.$data['id']."</p>";
    //     $i = $i + 1;
    // }
    // year = 1 or year = 2";
}
//...................................................................


// ............................don't run..........................
if($_SERVER['REQUEST_METHOD']=='POST'){
    // $sql = "INSERT INTO `student_details`(`id`, `year`, `name`, `dept`, `batch`) VALUES (\"2018kucp0001\",\"2\",\"x\",\"CSE\",\"A3\")";
    
    include_once('connection.php');
    
    $i = 1;
    $branch = "CSE";
    $year = 2;
    $temp = "2018kucp";
    $name = 'A';
    $sql = "INSERT INTO `student_details`(`id`, `year`, `name`, `dept`, `batch`) VALUES ";

    $arr = array("A1","A2","A3","A4");

    while($i <= 10){
        $i += 2000;
        // if($i > 2250){
        //     $branch = "ECE";
        //     $year = 3;
        //     $temp = "2017kuec";
        // }
        $rend = array_rand($arr, 1);

        if($i == 2001){
            $sql .= " ('".$temp.$i."', '".$year."','".$name."', '".$branch."' , '".$rend."') ";
        }else{
            $sql .= ", ('".$temp.$i."', '".$year."','".$name."', '".$branch."' , '".$rend."') ";
        }
        
        $name += 1; 
        $i += 1;
        $i -= 2000;
    }

    $result = $link->query($sql);
    echo "done!";


}
// ...............................................................

// $roll=$_POST['roll'];
// $Name=$_POST['Name'];
// $dep=$_POST['dep'];
// $year = $_POST['year'];
// $room = $_POST['room_no'];
// $seat = $_POST['seat_no'];
// $batch = $_POST['batch_no'];
// $cor = $_POST['cor'];
//   // if($Name=='' || $roll=='' || $dep==''){
//   //   echo "empty";
//   // }

//     $query="insert into student_details(Roll_No,year,name_student,department_name,room_no,seat_no,batch_no,cours_code) 
//     values('$roll','$year','$Name','$dep','$room','$seat','$batch','$cor')";
//     $result=$link->query($query);


?>