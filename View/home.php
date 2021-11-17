  
  <!--Section: Examples-->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
              <h3 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM MỚI NHẤT</h3>
          </div>
          <div class="col-lg-4 text-right mt-4">
              <a href="index.php?action=home&act=sanpham">
                  <span style="color: gray;">Xem chi tiết</span></div>
          </a>


      </div>
      <!--Grid row-->
      <div class="row">
         <!-- lấy kết quả mà trả về từ database -->
         <?php
         $hh=new HangHoa();
         $results=$hh->getListHangHoaNew();
        //  vì trả ra là 12 sản phẩm nên phải đùng vòng lặp để loop qua 12 sản phẩm
         while($set=$results->fetch()):
            // $set[24,giày cao gót..,600000,0,24.jpg.....]
         ?>

              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                      <img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>
                    <!-- đỗ dữ liệu tiền -->
                  <h5 class="my-4 font-weight-bold" style="color: red;"><?php echo number_format($set['dongia']);?><sup><u>đ</u></sup></br>
                  </h5>
                  <a href="index.php?action=home&act=detail&id=<?php echo $set['masp'];?>">
                     
                      <span><?php echo $set['tensp'];?></span></br></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>

              </div>
         <?php
         endwhile;
         ?>
      </div>

      <!--Grid row-->

  </section>
  <!-- end sản phẩm mới nhất -->
  <!-- sản phẩm khuyến mãi -->
  <section id="examples" class="text-center">

      <!-- Heading -->
      <!--Grid row-->
      <div class="row">
            <?php
            // $hh =new HangHoa();
            // vì đối tượng $hh đã tạo trên rồi nên dùng đc ở dưới vì cùng lớp HangHoa
            //  vì trả ra là 8 sản phẩm giảm giá nên phải đùng vòng lặp để loop qua 8 sản phẩm
             while($set=$results->fetch()):
            ?>

              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                  <img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>

                  <h5 class="my-4 font-weight-bold">
                      <!-- hiển thị giá giảm -->
                      <font color="red"><?php echo number_format($set['giamgia']);?><sup><u>đ</u></sup></font>
                      <!-- hiển thị giá gốc -->
                      <strike><?php echo number_format($set['dongia']);?></strike><sup><u>đ</u></sup>
                  </h5>

                  <a href="index.php?action=home&act=detail&id=<?php echo $set['masp'];?>">
                      <!-- hiển thị tên và màu -->
                      <span><?php echo $set['tensp'];?></span></br></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                  

              </div>
         <?php
         endwhile;
         ?>
      </div>

      <!--Grid row-->

  </section>
  <!-- end sản phẩm khuyến mãi -->