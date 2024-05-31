<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $room_no = $_POST['room_no'];
    $entry_date = $_POST['entry_date'];
    $Stay_days = $_POST['Stay_days'];
   //$id= $_POST['id'];
   // $gender = $_POST['gender'];
   // $address = $_POST['address'];
   // $pincode = $_POST['pincode'];
   // $card_type = $_POST['card_type'];
    //$pay = $_POST['pay'];

    //Database connection

    $conn = new mysqli('localhost', 'root', '','hotels');
    if($conn->connect_error){
        die('connection failed : ' .$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into rooms(name,email,mobile,room_no,entry_date,Stay_days) values(?,?,?,?,?,?)");
        $stmt->bind_param("ssissi", $name,$email,$mobile,$room_no,$entry_date,$Stay_days);
        $stmt->execute();
        echo "registration successful...";
        $stmt->close();
        $conn->close();
    }
?>