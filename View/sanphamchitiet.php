<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=add_cart" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-6">
                        <div class="tab-content">
                           <!-- kiểm tra mã sản phẩm đó có tồn tài -->
                           <?php
                            if(isset($_GET['id']))
                            {
                                $id=$_GET['id'];//24
                                $dt=new HangHoa();
                                $results=$dt->getListDetail($id);
                                // do kết quả trả về chỉ có 1 row nên ko cần while
                                // thông tin của 1 sản phẩm
                                $masp=$results[0];
                                $tensp=$results[2];
                                $dongia=$results[4];
                                $hinh= $results[6];
                                $mota=$results[5];
                                $nhom=$results[8];


                            }
                           ?>

                            <div class="tab-pane active" id=""><img src="<?php echo 'Content/imagetourdien/'.$hinh;?>" alt="" width="200px" height="350px">
                            </div>
                           
                        </div>
                        <!-- hiển thị nhiều hình -->
                        <ul class="preview-thumbnail nav nav-tabs">
                         <!-- ko cần tạo đt vì đã tạo ở trên rồi -->
                        <?php
                             $dt=new HangHoa();
                             $results=$dt->getListDetailNhom($nhom);// nhóm này là giá trị của dòng 38
                             // trả về nhiều row
                             while($set=$results->fetch()):
                        ?>
                           <li class="active"><a href="#<?php echo $set['hinh']?>" dat-toggle="tab">
                            <img src="<?php echo 'Content/imagetourdien/'.$set['hinh'];?>" alt="">
                            </a>
                           </li>
                            
                           
                        <?php
                        endwhile;
                        ?>
                        </ul>
                    </div>
                    <div class="details col-md-6">
                        <input type="hidden" name="masp" value="<?php echo $masp;?>" />
                        <!-- hiển thị tên sp -->
                        <h3 class="product-title"><?php echo $tensp;?> </h3>
                        <div class="rating">
                            <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <!-- hiển thị mô tả -->
                        <p class="product-description">
                        <?php echo $mota;?>
                        </p>
                        <!-- hiển thị giá bán -->
                        <h4 class="price">Giá bán:<?php echo $dongia;?> đ</h4>
                        
                           
                            <input type="hidden" name="size" id="size" value="0" />
                            Kích Thước:
                            <?php
                                $results=$dt->getListDetailNhomSize($nhom);// nhóm này là giá trị của dòng 38
                                // trả về nhiều row
                                while($set=$results->fetch()):
                            ?>
                             <button type="button" onclick="chonsize(<?php echo $set['size'];?>)" name="<?php echo $set['size'];?>" id="hong" class="btn btn-default-hong btn-circle" value="<?php echo $set['size'];?>">
                              <!-- để hiển thị người dùng thấy -->
                              <?php echo $set['size'];?>
                             </button>
                            <?php
                            endwhile;
                            ?>
                            </br></br>
                            Số Lượng:

                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />


                        </h5>
                        
                        <div class="action">

                            <button class="add-to-cart btn btn-default" type="submit" data-toggle="modal" data-target="#myModal">MUA NGAY
                            </button>

                            <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
</section>
<!-- nếu người dùng mà đăng nhập thì đc lưu thông tin vào trong $_SESSION -->
<?php
if(isset($_SESSION['makh'])):
?>
<section>
    <div class="col-12">
            <div class="row">
                <?php
                if(isset($_GET['id']))
                {
                    $id=$_GET['id'];
                    $dt=new User();
                    $results=$dt->getCountComment($id);
                    $tong=$results[0];
                }
                ?>
                <p class="float-left"><b>BÌnh luận <?php echo $tong;?></b></p>
                <hr>
            </div>
            <form action="index.php?action=home&act=comment&id=<?php echo $_GET['id'];?>" method="post">
            <div class="row">
              
                    <input type="hidden" name="txtmasp" value="<?php echo $_GET['id'];?>" />
                    <img src="Content/imagetourdien/people.png" width="50px" height="50px"; />
                    <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
                    <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />
                                
            </div>
            
            </form>
            <div class="row">
                <p class="float-left"><b>Các bình luận</b></p>
                <hr>
            </div>
            <div class="row">
                <?php
                    $u=new User();
                    $results=$u->getComment($_GET['id']);
                    while($set=$results->fetch()):
                ?>
                <div class="col-12">
                    <div class="row">
                        <img src="Content/imagetourdien/people.png" alt="" width="50px" height="50px">
                        <p><?php echo '<b>'.$set['username'].'</b>'.$set['noidung'];?></p>
                    </div>
                </div>
                <?php
                 endwhile;
                ?>
               <br/>
            </div>

        </div>
</section>
<?php
endif;
?>
