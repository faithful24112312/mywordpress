<?php
class HoaDon{
    var $mashd=null;
    var $makh=null;
    var $ngaymua=null;
    var $tongtien=0;
    var $masp=null;
    public function __construct()
    {
        
    }
    function insertOrder($makh)
    {
        $date=new DateTime('now');
        $ngay=$date->format('Y-m-d');
        $query="insert into hoadon(masohd,makh,ngaydat,tongtien)
        values(Null,$makh,'$ngay',0)";
        $db=new connect();
        $db->exec($query);
        $select="select masohd from hoadon ORDER by masohd DESC LIMIT 1 ";
        $mahd=$db->getInstance($select);
        return $mahd[0];
    }
    function insertOrderDetail($mahd,$mah,$soluong,$size,$thanhtien)
    {
        $query="insert into cthoadon(masohd,masp,soluongmua,size,thanhtien,tinhtrang) 
        values($mahd,$mah,$soluong,$size,$thanhtien,0)";
        $db=new connect();
        $db->exec($query);
    }
    function updateOrderTotal($sohdid,$total)
    {
        $query="update hoadon set tongtien=$total where masohd=$sohdid";
        $db=new connect();
        $db->exec($query);
    }
    // hiển thị thông tin khách hàng mua hóa đơn
    function getOrder($sohd)
    {
        $select="select b.masohd,b.ngaydat,a.tenkh,a.diachi,a.sodienthoai
        from khachhang a INNER JOIN hoadon b on a.makh=b.makh WHERE masohd=$sohd";
        $db=new connect;
        $result=$db->getInstance($select);
        return  $result;
    }
    function getOrderDetail($sohd)
    {
        $select="select a.tensp,a.size,a.dongia,b.soluongmua
        from sanpham a INNER JOIN cthoadon b on a.masp=b.masp where b.masohd=$sohd";
        $db=new connect;
        $result=$db->getList($select);
        return  $result;
    }
}
?>