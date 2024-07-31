<?php
require 'dbcon.php';
if (isset($_POST['save_student'])) {
    $username = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $address = mysqli_escape_string($conn, $_POST['address']);

    $sql = "INSERT into students (username,email,phone,address) value ('$username','$email','$phone','$address')";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['message'] = "Student Create Sucessfully";
        header('location:frontend/components/index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Student not Inserted Successfully";
        header('location:index.php');
        exit(0);
    }
}

if (isset($_POST['update_student'])) {
    $student_id=mysqli_escape_string($conn,$_POST['student_id']);
    $username = mysqli_escape_string($conn, $_POST['name']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $phone = mysqli_escape_string($conn, $_POST['phone']);
    $address = mysqli_escape_string($conn, $_POST['address']);

    $sql = "UPDATE students set username='$username', email='$email', phone='$phone', address='$address' where id='$student_id'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['message'] = "Student Updated Sucessfully";
        header('location:frontend/components/index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "Student not Updated";
        header('location:edit_student.php');
        exit(0);
    }
}

if(isset($_POST['delete_student'])){
    $student_id=mysqli_real_escape_string($conn,$_POST['delete_student']);
    $sql="DELETE from students where id='$student_id'";
    $res=mysqli_query($conn,$sql);

    if($res){
        $_SESSION['messsage']="Student is Deleted Successfully";
        header('location:frontend/components/index.php');
        exit(0);

    }
    else{
        $_SESSION['messsage']="Student is Not Deleted Successfully";
        header('location:frontend/components/index.php');
        exit(0);

    }

}
