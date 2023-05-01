  <style>
      .product-content-right-product-button input{
        width: 130px;
        height: 40px;
        display: block;
        margin: 20px 0 12px;
        transition: all 0.3s ease;
      }
      .submit input{
        width: 130px;
        height: 40px;
        display: block;
        margin: 20px 0 12px;
        transition: all 0.3s ease;
        cursor: pointer;
      }
      .submit input:hover{
        background-color: tomato;
        color: #fff;
        border: none;
      }
      .binhluan{
          padding: 0px 10px;
      }
  </style>
  <!----------------------product------------------------------->
  <?php
        ///bình luận
        if(isset($_POST['content'])){
            $content = $_POST['content'];
            $productid=$_GET['id'];
            if(isset($_SESSION['member'])){
                $query = "select * from member where username='".$_SESSION['member']."'";
                $ketnoi = mysqli_query($connect, $query);
                $memberid = mysqli_fetch_array($ketnoi);
                $memberid=$memberid['id'];
                $query1 = "insert comments(memberid,productid,date,content) values($memberid,$productid,now(),'$content')";
                mysqli_query($connect, $query1);
                echo "<script>alert('Bình luận của bạn đang được kiểm duyệt và sẽ được xuất hiện sớm nhất!!!');</script>";
            }
            else{
                $_SESSION['content'] = $content;
                echo "<script>alert('Vui lòng đăng nhập tài khoản để bình luận sản phẩm!!!');location='?option=signin&productid=$productid';</script>";
            }
        }
  ?>
  <?php
        $id=$_GET['id'];
        $query = "select * from products where id='$id'";
        $result = mysqli_query($connect, $query);
        $item=mysqli_fetch_array($result);
  ?>
  <section class = "product">
        <div class="container">
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src = "images/<?=$item['image']?>">
                    </div>
                    <?php
                        $query = "select * from img_product where productid='$id'";
                        $result = mysqli_query($connect, $query);
                    ?>
                    <div class="product-content-left-small-img">
                        <img src = "images/<?=$item['image']?>">
                        <?php foreach($result as $img):?>
                        <img src = "images/<?=$img['image']?>">
                        <?php endforeach;?> 
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?=$item['name']?></h1>
                        <p>MSP: <?=$item['id']?></p>
                    </div>
                    <div class="product-content-right-product-price">
                        <p><?=number_format($item['price'],0,',','.')?><sup>đ</sup></p>
                    </div>
                    <div class="product-content-right-product-soluong">
                        <p style = "font-weight: bold;">Số Lượng:</p>
                        <input type = "number" min = "0" value = "1">
                      
                    </div>
                    <p style = "color: red;">Vui Lòng Chọn Đầy Đủ Thông Tin!!!</p>
                    <div class="product-content-right-product-button">
                        <!--<button><i class = "fas fa-shopping-cart" href = "?option=cart"></i><a href="?option=cart"><p href = "">Mua Hàng</p></a></button>-->
                        <input type = "button" value = "Thêm vào giỏ hàng" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';">
                        <button><a href = "?option=showsanpham">Tìm Tại Cửa Hàng</a></button>
                    </div>
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-phone-alt"> </i><p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-comments"></i><p>Chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-envelope"></i><p>Mail</p>
                        </div>
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            &#8744;
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-big-title row">
                                <div class="product-content-right-bottom-content-big-title-item chitiet">
                                    <p>Mô Tả</p>
                                </div>
                                <div class="product-content-right-bottom-content-big-title-item baoquan">
                                    <p>Thông Số Kỹ Thuật</p>
                                </div>
                                <div class="product-content-right-bottom-content-big-title-item">
                                    <p>Kham Khảo Size</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                    <?=$item['description']?>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                   <?=$item['thongso']?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>  
    <!--bình luận-->
    <section class="binhluan">
        <h2 style="margin-bottom:10px;text-align:center">Bình Luận</h2>
        <h3 style="margin-bottom:10px">TẤT CẢ BÌNH LUẬN</h3>
        <?php
           $query = "select * from member a join comments b on a.id = b.memberid join products c on b.productid = c.id where b.status=1 and productid=".$_GET['id'];
           $comments = mysqli_query($connect, $query);
            if(mysqli_num_rows($comments) == 0):
                echo "<section style='color:#c2cad0'>Sản phẩm này chưa có bình luận!!!</section>";
            else:
                foreach($comments as $comment):
                    
                    ?>
                
                <section style="font-weight:bold"><?=$comment['fullname']?></section>
                <section style="padding-left:20px;margin-bottom:10px;"><?=$comment['content']?></section>
            <?php    
                endforeach;
            endif;
        ?>
        <form action="" method="post">
            <section>
                <textarea name="content" style="width:100%" rows="10" placeholder="Viết bình luận ở đây"></textarea>
            </section>
            <section class="submit">
                <input type="submit" value = "Đăng bình luận">
            </section>
        </form>
        
    </section>
   <!----------------sanr pham lien quan-------------------->
   <section class = "product-related">
            <div class="product-related-title">
                <p style = "font-size: 25px">SẢN PHẨM LIÊN QUAN</p>
            </div>
            <?php 
                $brandid = $item['brandid'];
                $query = "select * from products where status = '1' and brandid = '$brandid'";
                $result = mysqli_query($connect, $query);
               // $result=$connect->query($query);
            ?>
            <div class = "product-content row">
                <?php foreach($result as $item):?>
                <div class="product-related-item">
                    <a href="?option=productdetail&id=<?=$item['id']?>"><img src = "images/<?=$item['image']?>"></a>
                    <h1><?=$item['name']?></h1>
                    <p><?=number_format($item['price'],0,',','.')?><sup>đ</sup></p>
                </div>
               <?php endforeach;?>
            </div>
        
    </section>