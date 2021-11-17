<div class="table-responsive">
 <?php
 if(!isset($_SESSION['makh'])|| count($_SESSION['cart'])==0):
  echo '<script> alert("Bạn chưa đăng nhập");</script>';
  include "login.php";
 ?>
 <?php
 else:
 ?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">
      <?php
      if(isset($_SESSION['sohd']))
      {
        $mahd=$_SESSION['sohd'];
        $hd=new HoaDon();
        $result=$hd->getOrder($mahd);
        $sohdon=$result[0];
        $ngay=$result[1];
        $ten=$result[2];
        $diachi=$result[3];
        $dt=$result[4];
      }
      ?>
                        
       <tr>
          <td colspan="4">
            <h2 style="color: red;">HÓA ĐƠN</h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn:<?php echo $sohdon; ?> </td>
          <td colspan="2"> Ngày lập: <?php echo $ngay; ?></td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên:</td>
          <td colspan="2"><?php echo $ten; ?></td>
        </tr>
       <tr>
          <td colspan="2">Địa chỉ:  </td>
          <td colspan="2"><?php echo $diachi; ?></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: </td>
          <td colspan="2"><?php echo $dt; ?></td>
        </tr>
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>
     
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          
            <?php
            $result=$hd->getOrderDetail($mahd);
            $j=0;
            while($set=$result->fetch()):
              $j++;
            ?>
            <tr>
              <td><?php echo $j; ?></td>
              <td><?php echo $set['tensp'] ?></td>
              <td>Size: <?php echo $set['size'] ?></td>
              <td>Đơn Giá: <?php echo $set['dongia'] ?> - Số Lượng: <?php echo $set['soluongmua'] ?> <br />
              </td>
            </tr>
            <?php
            endwhile;
            ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b> <?php echo get_subtotal();?> <sup><u>đ</u></sup></b>
            </td>
           
          </tr>
        </tbody>
      </table>
    </form>
 <?php
 endif;
 ?> 
</div>
</div>