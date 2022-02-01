<?php 
include('dbconnection.php');
  


  $data = stripslashes(file_get_contents("php://input"));
  $mydata = json_decode($data, true);
  $sno = $mydata["sno"];
  $name = $mydata["name"];
  $email = $mydata["email"];
  $age = $mydata["age"];
  $mobile = $mydata["mobile"];

    // for only Insert Data
  //  if(!empty($name) && !empty($email) && !empty($password)){
  //   $sql = "INSERT INTO student(name, email, password) VALUES('$name', '$email', '$password')";
  //   if($conn->query($sql) == TRUE){
  //     echo "Student Saved Successfully";
  //   } else {
  //     echo "Unable to Save Student";
  //   }
  // } else {
  //   echo "Fill All Fields";
  // }

  //INSERT INTO validcontacts(sno,name,email,age,mobile) VALUES('','22th','22th@gmail.com','22','2222222222') ON DUPLICATE KEY UPDATE name='22th', email='2th@gmail.com', age='22', mobile = '2222222222';

  //  Insert or Update Data both
   if(!empty($name) && !empty($email) && !empty($age)&& !empty($mobile)){
    if($sno){

      $sql = "UPDATE `validcontacts` SET `name` = '$name', `email` = '$email', `age` = '$age', `mobile` = '$mobile' WHERE `validcontacts`.`sno` = '$sno'";
    } else{
      $sql = "INSERT INTO validcontacts(name,email,age,mobile) VALUES('$name','$email','$age','$mobile')";
      }

    //$sql = "INSERT INTO student(id, name, email, password) VALUES('$id', '$name', '$email', '$password') ON DUPLICATE KEY UPDATE name='$name', email='$email', password='$password'";
    if($conn->query($sql) == TRUE){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your contact details has been inserted successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    } else {
      echo "<div class='alert alert-dange alert-dismissible fade show' role='alert'>
      <strong>Opps!</strong> Something is wrong!!!!! 
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
  } else {
    echo "Fill All Fields";
  }
?>  