<?php
class User{
    // thuộc tính
    var $makh=0;
    var $tenkh=null;
    var $username=null;
    var $matkhau=null;
    var $email=null;
    var $diachi=null;
    var $sodt=null;
    var $vaitro=0;
    public function __construct(){}
    public function insertUser($tenkh,$usesr,$matkhau,$email,$diachi,$dt)
    {
        $query="insert into khachhang(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
        values(NULL,?,?,?,?,?,?,default)";
        $db=new connect();
        $stm=$db->getListP($query);
        $stm->execute([$tenkh,$usesr,$matkhau,$email,$diachi,$dt]);
    }
    public function insertUser1($tenkh,$usesr,$matkhau,$email,$diachi,$dt)
    {
        $query="insert into khachhang(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
        values(NULL,:tenkh,:username,:matkhau,:email,:diachi,:sodienthoai,default)";
        $db=new connect();
        $stm=$db->getListP($query);
        $stm->bindParam(':tenkh',$tenkh);
        $stm->bindParam(':username',$usesr);
        $stm->bindParam(':matkhau',$matkhau);
        $stm->bindParam(':email',$email);
        $stm->bindParam(':diachi',$diachi);
        $stm->bindParam(':sodienthoai',$dt);
        $stm->execute();
    }
    public function insertUser2($tenkh,$usesr,$matkhau,$email,$diachi,$dt)
    {
        $query="insert into khachhang(makh,tenkh,username,matkhau,email,diachi,sodienthoai,vaitro)
        values(NULL,'$tenkh','$usesr','$matkhau','$email','$diachi','$dt',default)";
        $db=new connect();
        $stm=$db->exec($query);
        
    }
    // phương thức truy vấn username và mật khẩu của người dùng đăng nhập
    public function loginUser($user,$pass)
    {
        $select="select * from khachhang where username='$user' and matkhau='$pass'";
        $db=new connect();
        $result=$db->getList($select);
        $set=$result->fetch();
        return $set;
    }
    // phương thức loginUser đã lấy đc thông tin từ database về là của người dùng đã đăng nhập 
    // chèn nội dung bl
    function insertComment($masp,$makh,$noidung){
        $date=new DateTime("now");
        $ngay=$date->format("Y-m-d");
        $query="insert into binhluan(mabl,masp,makh,ngaybl,noidung) values(Null,$masp,$makh,'$ngay','$noidung')";
        $db=new connect();
        $db->exec($query);

    }
// hiển thị user nào đã bình luận

    public function getComment($masp)
    {
            $select="select a.username,b.noidung from khachhang a INNER join binhluan b on a.makh=b.makh where masp=$masp order by mabl desc";
            $db=new connect();
            $result=$db->getList($select);
            return $result;
    }
    function getCountComment($mah)
    {
          $select="select count(mabl) from binhluan where masp=$mah";
          $db=new connect();
          $result=$db->getInstance($select);
          return $result;
    }

}
?>