
<div class="table-responsive">
  <?php
  // kiểm tra xem giỏ hàng
  if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0):
    echo '<script> alert("Giỏ hàng của bạn chưa có sản phẩm nào...")</script>';
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=sanpham"/>';

  ?>
  <?php
  else:
  ?>
    <form action="index.php?action=giohang&act=update_cart" method="post">
      <table class="table table-bordered">
        <thead>
          <tr><td colspan="5"><h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2></td></tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $j=0;
          foreach($_SESSION['cart'] as $key=>$item):
            $costnew=number_format($item['cost'],2);
            $totalnew=number_format($item['total'],2);
            $j++;
          ?>
            <tr>
              <td><?php echo $j;?></td>
              <td><img width="50px" height="50px" src="Content/imagetourdien/<?php echo $item['hinh'];?>"><?php echo $item['name'];?></td>
              <td>Size:<?php echo $item['size'];?> </td>
              <td>Đơn Giá: <?php echo $costnew;?> - Số Lượng: 
              <input type="text" name="newqty[<?php echo $item['masp'];?>]" value="<?php echo $item['qty'];?>" /><br />
                <p style="float: right;"> Thành Tiền <?php echo $totalnew;?> <sup><u>đ</u></sup></p>
              </td>
              <td><a href="index.php?action=giohang&act=delete_item&id=<?php echo $item['masp'];?>"><button type="button" class="btn btn-danger">Xóa</button></a>

                <button type="submit" class="btn btn-secondary">Sửa</button>

              </td>
            </tr>
          <?php
          endforeach;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b><?php echo get_subtotal();?><sup><u>đ</u></sup></b>
            </td>
            <td><a href="index.php?action=hoadon">Thanh toán</a></td>
          </tr>
        </tbody>
      </table>
    </form>
 <?php
  endif;
 ?>
</div>
</div>