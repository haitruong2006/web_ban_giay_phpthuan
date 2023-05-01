<style>
    table tr td input{
        margin-left: 5px;
        width: 100%;
    }
 .cart-content-right-button button:first-child a{
    background-color: #fff;

}
.cart-content-right-button button:first-child:hover a{
    background-color: #ddd;
}
.cart-content-right-button button:last-child a{
    background-color: black;
    color: #fff;
}
.cart-content-right-button button:last-child:hover a{
    background-color: #dddddd;
    color: black;
}

</style>
<?php
    //gán biết cart cho cái mảng
    if(empty($_SESSION['cart'])){
        $_SESSION['cart']=array();        
    }
    if(isset($_GET['action'])){
        $id=$_GET['id'];
        switch($_GET['action']){
            case'add':
                //nếu chưa có mã sản phẩm r thì cộng thêm 1 đơn vị không thì gán bằng 1
                if(array_key_exists($id, array_keys($_SESSION['cart']))){
                    $_SESSION['cart'][$id]++;
                }
                else{
                    $_SESSION['cart'][$id]=1;
                }
                //khi thực hiện xong thì trả về option cart để khi f5 k bị tăng giá trị lên
                header("location: ?option=cart");
                break;
            case'delete':
                unset($_SESSION['cart'][$id]);
                break;
            case'update':
                if($_GET['type'] == 'asc'){
                    $_SESSION['cart'][$id]++; 
                    header("location: ?option=cart");
                }
                else{
                    if($_SESSION['cart'][$id]>1){
                        $_SESSION['cart'][$id]--; 
                        header("location: ?option=cart");
                    }
                }
                break;
            case'order':
                //kiểm tra nếu đăng nhập r thì chueyenr qua trang order
                if(isset($_SESSION['member'])){
                    header("location: ?option=order");
                }
                //kiểm tra nếu chưa đăng nhập thì chuyển qua trang đăng nhập đăng nhập xong thì chuyển lại trang order
                else{
                    header("location: ?option=signin&order=1");
                }
                break;
        }
    }
?>
 <!--------------------cart-------------------------------->

 <section class = "cart">
        <div class="container">
            <div class="cart-content row">
                <?php 
                    if(!empty($_SESSION['cart'])){
                ?>
                <div class="cart-content-left">
                    <?php
                        if(isset($_SESSION['cart'])):
                            //$ids="0";
                            //foreach(array_keys($_SESSION['cart']) as $key)
                            //$ids.=",".$key;

                            //cần 2 đối số thứu nhất là dấu phẩy để phân cách giwuax các phần từ giữa mảng
                            //thứu 2 là mảng là t lấy
                            $ids = implode(',', array_keys($_SESSION['cart']));
                            //$query="select * from products where id in($ids)";
                            $query = "select * from products where id in($ids)";
                            $result = mysqli_query($connect, $query);
                            //$result=$connect->query("select * from products where id in($ids)");
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <th>SẢN PHẨM</th>
                                <th>TÊN SẢN PHẨM</th>
                                <th>SỐ LƯỢNG</th>
                                <th>ĐƠN GIÁ</th>
                                <th>THÀNH TIỀN</th>
                                <th>XÓA</th>
                            </tr>
                        </thead>
                       <tbody>
                            <?php
                                $tongtiengiohang=0;
                                $tongsanphamgiohang=0;
                                foreach($result as $item):
                            ?>
                            <tr>
                                <td><img width = "100%" src = "images/<?=$item['image']?>"></td>
                                <td><?=$item['name']?></td>
                                <td>
                                    <?=$tongsanpham=$_SESSION['cart'][$item['id']]?>
                                    <input type="button" value = "+" onclick="location='?option=cart&action=update&type=asc&id=<?=$item['id']?>';">
                                    <input type="button" value = "-" onclick="location='?option=cart&action=update&type=desc&id=<?=$item['id']?>';">
                                </td>
                                <td><?=number_format($item['price'],0,',','.')?>đ</td>
                                <td><?=number_format($tongtiensanpham=$item['price']*$_SESSION['cart'][$item['id']],0,',','.')?></td>
                                <td>
                                    <input type="button" value = "XÓA" onclick="location='?option=cart&action=delete&id=<?=$item['id']?>';">
                                </td>
                            </tr>
                            <?php $tongtiengiohang+=$tongtiensanpham?>
                            <?php $tongsanphamgiohang+=$tongsanpham?>
                            <?php 
                                endforeach;
                            ?>
                       </tbody>
                        
                    </table>
                    <?php
                        else:
                    ?>
                        <section style = "text-align:center;color: orange;font-weight:bold;font-size:25px">GIỎ HÀNG TRỐNG</section>
                    <?php
                        endif;
                    ?>
                </div>
                <?php
                    }
                ?>
                <?php
                    if(!empty($_SESSION['cart'])){
                ?>
                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan = "2">TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td>TỔNG SẢN PHẨM</td>
                            <td>
                                <?=$tongsanphamgiohang?>
                            </td>
                        </tr>
                        <tr>
                            <td>TỔNG TIỀN HÀNG</td>
                            <td><p>
                                    <?=number_format($tongtiengiohang,0,',','.');?><sup></sup>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td>TẠM TÍNH</td>
                            <td>
                                <p style = "color: black; font-weight: bold;">
                                <?=number_format($tongtiengiohang,0,',','.');
                                ?><sup>đ</sup></p>
                            </td>
                        </tr>
                    </table>
                    <div class="cart-content-right-text">
                        
                        <?php 
                            $tiengiam = 10000000 - $tongtiengiohang;
                        ?>
                        <?php
                            if($tiengiam > 0){
                            
                        ?>
                            <p>Bạn sẽ được miễn ship khi đơn hàng có giá trị hơn 10.000.000đ</p>
                            <p style = "color: red; font-weight: bold;">Mua thêm <span style = "font-size: 18px"><?php if($tiengiam > 0){echo number_format($tiengiam,0,',','.');} else{}?>đ</span> để được miễn ship</p>
                        <?php
                            }
                            else{
                                echo "BẠN ĐÃ ĐỦ ĐIỀU KIỆN VÀ SẼ ĐƯỢC MIỄN PHÍ SHIP";
                            }
                        ?>
                        
                    </div>
                    <div class="cart-content-right-button">
                        <button><a href="?option=showsanpham">TIẾP TỤC MUA SẮM</a></button>
                        <button><a href="?option=cart&action=order">THANH TOÁN</a></button>
                    </div>
                    <div class="cart-content-right-dangnhap">
                        <p>TÀI KHOẢN VATO'S SPORT</p><br>
                        <p>Hãy <a href = "?option=signin">đăng nhập</a> để nhận nhiều ưu đãi từ thành viên</p>
                    </div>
                    <?php
                        }
                        else{
                            ?>
                            <div class="container">
                                <a style="color: red;font-size:30px; text-align:center">GIỎ HÀNG TRỐNG</a>
                            </div>
                            
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
 