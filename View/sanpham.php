  <!-- quảng cáo -->
  <?php
  include "quangcao.php";
  ?>
  <!-- end quảng cáo -->
  <?php
  // tìm tổng số record(số sản phẩm hoặc số dòng trong bảng hàng hóa)
  $hh=new HangHoa();
  $results=$hh->getListHangHoaAll();
  $count=$results->rowCount();
  $limit=8;
  // tính số page
  $p=new Page();
  $page=$p->findPage($count,$limit);
  // tính start
  $start=$p->findStart($limit);//=16
  // trang hiện tại
  $current_page=isset($_GET['page'])?$_GET['page']:1;
  ?>
  
  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->
 <?php
 if(isset($_GET['act']))
 {
     if($_GET['act']=="sanpham")
     {
         $ac=1;
     }
     elseif($_GET['act']="timkiem")
     {
         $ac=2;
     }
     else
     {
         $ac=0;
     }
 }
 ?>

  <section id="examples" class="text-center">

      <!-- Heading -->
      <div class="row">
          <div class="col-lg-8 text-right">
             <?php
             if($ac==1)
             {
                echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM</h3>';
             }
             elseif($ac==2)
             {
                 echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM KHUYẾN MÃI</h3>';
             }
             elseif($ac==3)
             {
                 echo '<h3 class="mb-5 font-weight-bold">SẢN PHẨM TÌM KIẾM</h3>';
             }
             else{
                 echo '<h3 class="mb-5 font-weight-bold">KHÔNG CÓ SẢN PHẨM</h3>';
             }
             
             ?>
          </div>

      </div>
      <!--Grid row-->
      <div class="row">
         <?php
         $hh=new HangHoa();
         if($ac==1)
         {
            $results=$hh->getListHangHoaAllPage($start, $limit);
         }
         
         elseif($ac==2)
         {
             if($_SERVER['REQUEST_METHOD']=='POST')
             {
                 $name=$_POST['txtsearch'];
                 $results=$hh->getSearch($name);
             }
         }
         $j=1;
         while($set=$results->fetch()):
         ?>
              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                  <img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>
                 <!-- hiển thì tiền tệ -->
                 <?php
                 if($ac==2)
                 {
                    echo '<h5 class="my-4 font-weight-bold" style="color: red;">'.number_format($set['dongia']).'<sup><u>đ</u></sup></br>';
                 }
                 
                 ?>
                  </h5>
                  <a href="index.php?action=home&act=detail&id=<?php echo $set['masp'];?>">
                      <!-- lấy ra tên và mau -->
                      <span><?php echo $set['tensp'];?></span></br></a>
                  <button class="btn btn-danger" id="may4" value="lap 4">New</button>
                  

              </div>
          <?php
          if($j%4==0)
          {
              echo '</div><div class="row">';
          }
          $j++;
          endwhile;
          ?>
      </div>

      <!--Grid row-->

  </section>
 
  
  <!-- end sản phẩm mới nhất -->
  
 
  <div class="col-md-6 div col-md-offset-3">
				<ul class="pagination">
					<?php
                    
                    if($current_page>1 && $page>1)
                    {
                        echo ' <li ><a href="index.php?action=home&act=sanpham&page='.($current_page-1).'">Prev</a></li>';
                    }
                    for($i=1;$i<=$page;$i++)
                    {
                    ?>
				    <li ><a href="index.php?action=home&act=sanpham&page=<?php echo $i;?>">
                    <?php
                        echo $i;
                    ?>
                    </a></li>
				    <?php
                    }
                    // nút next
                    if($current_page<$page && $page>1)//1<3
                    {
                        echo ' <li ><a href="index.php?action=home&act=sanpham&page='.($current_page+1).'">Next</a></li>';
                    }
                    ?>
				</ul>
</div>