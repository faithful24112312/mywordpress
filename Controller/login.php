<?php
$action="login";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "login":
        include "View/login.php";
        break;
    case "login_action":
        $username=$_POST['txtusername'];
        $pass=$_POST['txtpassword'];
        $cryt=md5($pass);
        $dt=new User();
        $result=$dt->loginUser($username,$cryt);
        if($result !='false')
        {
            $_SESSION['makh']=$result[0];
            $_SESSION['tenkh']=$result[1];
            $_SESSION['username']=$result[2];
            $_SESSION['matkhau']=$result[3];
            $_SESSION['email']=$result[4];
            $_SESSION['diachi']=$result[5];
            $_SESSION['sodienthoai']=$result[6];
            echo '<script> alert("Đăng nhập thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=home"/>';

        }
        break;
        case "log_out":
            if(isset($_SESSION['makh']))
            {
                unset($_SESSION['makh']);
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=home"/>';
            break;
    
}
?>