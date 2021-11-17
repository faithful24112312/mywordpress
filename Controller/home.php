<?php
$action="home";
if(isset($_GET['act']))
{
    $action=$_GET['act'];//khuyenmai
}
switch($action)
{
    case "home":
        include 'View/home.php';
        break;
    case "sanpham":
        include 'View/sanpham.php';
        break;
    case "khuyenmai":
        // vì trang sản phẩm all và trang sản phẩm khuyến mãi all giống nhau về 
        // template(mẫu)
        include 'View/sanpham.php';
        break;
    case "detail":
        // truyền qua $_GET['id']; tức là mã hh nào mà người dùng chọn
        include 'View/sanphamchitiet.php';
        break;
    case "comment":
        // khi nhấn nút submit nó gửi dữ liệu qua đây $_POST=array['txtmahh'='24','comment'='đẹp quá']
        $masp=$_POST['txtmasp'];
        $noidung=$_POST['comment'];
        $makh=$_SESSION['makh'];
        // sau đó mới đem những nội dung gửi qua insert vào trong database,ai sẽ viết câu lệnh này
        //model
        $u=new User();
        $u->insertComment($masp,$makh,$noidung);
        include "View/sanphamchitiet.php";
        break;
    case 'timkiem':
        // $_POST['txtsearch'];
        include "View/sanpham.php";
        break;
}
?>