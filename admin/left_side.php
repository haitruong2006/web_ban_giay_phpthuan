<?php
    $chuaxuly = mysqli_num_rows($connect->query("select * from orders where status =1"));
    $dangxuly = mysqli_num_rows($connect->query("select * from orders where status =2"));
    $daxuly = mysqli_num_rows($connect->query("select * from orders where status =3"));
    $huy = mysqli_num_rows($connect->query("select * from orders where status =4"));

    
    $nguoidung_daxuly = mysqli_num_rows($connect->query("select * from member where status = 1"));
    $nguoidung_huy = mysqli_num_rows($connect->query("select * from member where status = 2"));

    $comment_chuaxuly = mysqli_num_rows($connect->query("select * from comments where status = 0"));
    $comment_daxuly = mysqli_num_rows($connect->query("select * from comments where status = 1"));
    $comment_huy = mysqli_num_rows($connect->query("select * from comments  where status = 2"));
?>
<section class="admin-content row space-between">
        <div class="admin-content-left">
        <div class="header-top-left">
            <a href="index.php"><p> <span>VATO</span>sport</p></a>
        </div>
            <ul>
                <li><a  href=""> <img style="width:20px" src="icon/hi.png" alt="">Chào:  <span style="color:blueviolet; font-size:22px">admin</span><span style="color: red; font-size:20px">❤</span></a>
                <li><a href="#"><img style="width:20px" src="icon/user1.webp" alt="">Người Dùng</a>
                    <ul>
                       
                        <li><a href="?option=member&statusmember=1">Đang kích hoạt[<span style="color:red"><?=$nguoidung_daxuly?></span>]</a></li>
                        <li><a href="?option=member&statusmember=2">Đã khoá[<span style="color:red"><?=$nguoidung_huy?></span>]</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/options.png" alt="">Danh Mục</a>
                    <ul>
                        <li><a href="?option=brand">Danh sách</a></li>
                        <li><a href="?option=brandadd">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/article.png" alt="">Sản phẩm</a>
                    <ul>
                        <li><a href="?option=product">Danh sách</a></li>
                        <li><a href="?option=productadd">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/picture.png" alt="">Ảnh Sản phẩm</a>
                    <ul>
                        <li><a href="?option=img">Danh sách</a></li>
                        <li><a href="?option=addimg">Thêm</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/comments.png" alt="">Comment sản phẩm</a>
                    <ul>
                        <li><a href="?option=comment&statuscomment=0">Chưa xử lý[<span style="color:red"><?=$comment_chuaxuly?></span>]</a></li>
                        <li><a href="?option=comment&statuscomment=1">Đã xử lý[<span style="color:red"><?=$comment_daxuly?></span>]</a></li>
                        <li><a href="?option=comment&statuscomment=2">Đã Xóa[<span style="color:red"><?=$comment_huy?></span>]</a></li>
                    </ul>
                </li>
                <li><a href="#"><img style="width:20px" src="icon/dich-vu-giao-hang-nhanh.png" alt="">Đơn Hàng</a>
                    <ul>
                        <li><a href="?option=order&status=1">Chưa Xử Lý[<span style="color:red"><?=$chuaxuly?></span>]</a></li>
                        <li><a href="?option=order&status=2">Đang Xử Lý[<span style="color:red"><?=$dangxuly?></span>]</a></li>
                        <li><a href="?option=order&status=3">Đã Xử Lý[<span style="color:red"><?=$daxuly?></span>]</a></li>
                        <li><a href="?option=order&status=4">Đã Hủy[<span style="color:red"><?=$huy?></span>]</a></li>
                    </ul>
                </li>
                <li><a href="?option=logout"> <img style="width:20px" src="icon/logout.png" alt="">Đăng Xuất</a>
                    
                </li>
            </ul>
        </div>
        <div class="admin-content-right">
        <div class="admin-content-right-bg">
            
            <?php
                if(isset($_GET['option'])){
                    switch($_GET['option']){
                        case'logout':
                            unset($_SESSION['admin']);
                            header("location: .");
                            break;
                        case'brand':
                            include"brands/showbrand.php";
                            break;
                        case'brandadd':
                            include"brands/brandadd.php";
                            break;
                        case'brandupdate':
                            include"brands/brandupdate.php";
                            break;
                        case'product':
                            include"products/showproducts.php";
                            break;
                        case'productadd':
                            include"products/productadd.php";
                            break;
                        case'productupdate':
                            include"products/productupdate.php";
                            break;
                        case'img':
                            include"img_product/showimg.php";
                            break;
                        case'addimg':
                            include"img_product/addimg.php";
                            break;
                        case'imgupdate':
                            include"img_product/imgupdate.php";
                            break;
                        case'order':
                            include"order/showorder.php";
                            break;
                        case'orderdetail':
                            include"order/orderdetail.php";
                            break;
                        case'member':
                            include"member/showmember.php";
                            break;
                        case'memberdetail':
                            include"member/memberdetail.php";
                            break;
                        case'comment':
                            include"comment/showcomment.php";
                            break;
                        case'commentdetail':
                            include"comment/commentdetail.php";
                            break;
                        case'delete':
                            include"member/delete.php";
                            break;
                        case'deletecomment':
                            include"comment/delete.php";
                            break;
                    }
                }
               
                else{
                    
                    ?>
                    <img src="icon/bg.png">
                    <?php
                }
            ?>
        </div>
 </div>