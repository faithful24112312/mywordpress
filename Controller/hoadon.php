<?php
$action="hoadon";
switch($action){
    case "hoadon":
        $hd=new HoaDon();
        $makhang= $_SESSION['makh'];
        $sohdid=$hd->insertOrder($makhang);
        $_SESSION['sohd']=$sohdid;
        $total=0;
        foreach($_SESSION['cart'] as $key=>$item)
        {
            $hd->insertOrderDetail($sohdid,$item['masp'],$item['qty'],$item['size'],$item['total']);
            $total+=$item['total'];
        }
        $hd->updateOrderTotal($sohdid,$total);
        include 'View/order.php';
        break;
}
?>