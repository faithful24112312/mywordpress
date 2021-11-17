<?php
$action="giohang";
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart']=array();
}
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action){
    case "giohang":
        include "View/cart.php";
        break;
        //them
    case "add_cart":
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $masp=$_POST['masp'];
            $soluong=$_POST['soluong'];
            $size=$_POST['size'];
            add_item($masp,$soluong,$size);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';
            }
        break;
        //xoa
    case "delete_item":
        $keymasp=$_GET['id'];
        unset($_SESSION['cart'][$keymasp]);
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';
        break;
    case "update_cart":
        $newsl=$_POST['newqty'];

        foreach($newsl as $key=>$qty)
        {
            if($_SESSION['cart'][$key]['qty']!=$qty)
            {
                update_item($key,$qty);
            }
        }
        include 'View/cart.php';
        break;


}
?>
