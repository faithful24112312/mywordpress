<?php
$action="registration";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case 'registration':
        include "View/registration.php";
        break;
    case "registration_action":
        $tenkh=$_POST['txttenkh'];
        $username=$_POST['txtusername'];
        $password=$_POST['txtpass'];
        $cryt=md5($password);
        $email=$_POST['txtemail'];
        $diachi=$_POST['txtdiachi'];
        $dthoai=$_POST['txtsodt'];
        $dt=new User();
        $dt->insertUser1($tenkh,$username,$cryt,$email,$diachi,$dthoai);
        echo '<script> alert("Đăng ký thành công");</script>';
        include "View/home.php";
        break;
}
?>