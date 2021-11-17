<?php
class HangHoa{
    var $masp=0;
    var $maloai=0;
    var $tensp=null;
    var $size=0;
    var $dongia=0;
    var $mota=null;
    var $hinh=null;
    var $ngaylap=null;

    public function __construct(){
    }
    public function getListHangHoaNew()
    {
        $select="select * from sanpham order by masp DESC limit 12";
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }
    
    // 12 sản phẩm mới nhất từ database 
    public function getListHangHoaAll()
    {
        $select="select * from sanpham";
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }
    public function getCount()
    {
        $select="select count(*) from sanpham";
        $db=new connect();
        $results=$db->getInstance($select);
        return $results[0];
    }
    public function getListDetail($masp)
    {
        $select="select * from sanpham where masp=$masp";
        $db=new connect();
        $result=$db->getInstance($select);
        return $result;
    }
   
   
    function getSearch($name)
    {
        $select="SELECT * from sanpham WHERE tensp LIKE :tensp";
        $db=new connect();
        $stm=$db->getListP($select);
        $stm->bindValue(':tensp',"%".$name."%");
        // để chạy đuộc prepare thì phải execute
        $stm->execute();
        return $stm;
    }
    //phan trang
    public function getListHangHoaAllPage($start, $limit)
    {
        $select="select * from sanpham limit ".$start.",".$limit;
        $db=new connect();
        $results=$db->getList($select);
        return $results;
    }
    //phan nhom
    public function getListDetailNhom($nhom)
    {
        $select="select * from sanpham where nhom=$nhom";
        $db=new connect();
        $result=$db->getList($select);
        return $result;
    }
    public function getListDetailNhomSize($nhom)
    {
        $select="select distinct(size) from sanpham where nhom=$nhom order by size";
        $db=new connect();
        $result=$db->getList($select);
        return $result;
    }
}
?>