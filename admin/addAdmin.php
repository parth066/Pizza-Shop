<?php

if(!isset($_SESSION)) {
    session_start();
}

include_once("../config.php");


if(!isset($_SESSION['is_admin'])){
    if(isset($_POST['admin_name'])  &&  isset($_POST['admin_password'])) {
        $admin_name = $_POST['admin_name'];
        $admin_password = $_POST['admin_password'];

        $sql = "SELECT admin_name, admin_password FROM admin WHERE admin_name='$admin_name' AND admin_password='$admin_password'";

        $result = $conn->query($sql);
        $row = $result->num_rows;
        if($row === 1){
            $_SESSION['is_admin'] = true;
            $_SESSION['admin_name'] = $admin_name;
            echo json_encode($row);
        }
        else if($row === 0) {
            echo json_encode($row);
        }
    }

}
?>