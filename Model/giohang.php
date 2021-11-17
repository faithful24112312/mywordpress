<?php
function add_item($mah,$quantity,$size)
{
    // kiểm tra xem mã hàng này nó có tồn tại trong giỏ hàng hay không
    if(isset($_SESSION['cart'][$mah]))
    {
        $quantity+=$_SESSION['cart'][$mah]['qty'];//$quantity=2+1=3
        update_item($mah, $quantity);
        return;
    }
    // tiến hàng lấy những cái còn lại hinh,ten,dongia của 1 sp đc mua
    $pros=new HangHoa();
    $pro=$pros->getListDetail($mah);
    $cost=$pro['dongia'];
    $hinh=$pro['hinh'];
    $ten=$pro['tensp'];
    $total=$quantity*$cost;
    // tạo thông tin của 1 sản phẩm
    // bien=array(key=>value)
    $item=array(
        'masp'=>$mah,
        'hinh'=>$hinh,
        'name'=>$ten,
        'size'=>$size,
        'cost'=>$cost,
        'qty'=>$quantity,
        'total'=>$total
    );
    // tiến hàng đưa sp vao trong giỏ hàng
    $_SESSION['cart'][$mah]=$item;
    
    
}
function get_subtotal()
    {
        $subtotal=0;
        foreach($_SESSION['cart'] as $item)
        {
            $subtotal+=$item['total'];
        }
        $subtotal=number_format($subtotal,2);
        return $subtotal;
    }
// phương thức update
function update_item($mah, $quantity)
{
    if($quantity<=0)
    {
        unset($_SESSION['cart']['mah']);
    }
    else
    {
        $_SESSION['cart'][$mah]['qty']=$quantity;
    // tính lại total
        $totalnew=$_SESSION['cart'][$mah]['qty']*$_SESSION['cart'][$mah]['cost'];
        $_SESSION['cart'][$mah]['total']=$totalnew;
    }
}

?>