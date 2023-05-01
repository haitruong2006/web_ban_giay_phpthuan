<style>
     textarea{
         width: 100%;
     }
     .payment-content{
         border-left: 2px solid #dddddd;
         padding-left: 12px;
     }
     select{
         width: 100%;
         height: 35px;
     }
    .delivery-content-left-button input{
         height: 35px;
     }
 </style>
 <?php
    $query ="select * from member where username = '".$_SESSION['member']."'";
    $ketnoi = mysqli_query($connect, $query);
    $member = mysqli_fetch_array($ketnoi);
    //$member=mysqli_fetch_array($connect->query($query));//lấy dl
 ?>
<?php
    if(isset($_POST['name'])){
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        $ordermethodid = $_POST['ordermethodid'];
        $memberid = $member['id'];
        
        $truyvan = "insert orders(ordermethodid,memberid,name,address,mobile,email,note) values('$ordermethodid','$memberid','$name','$address','$mobile','$email','$note')";
       // $connect->query($truyvan);
        mysqli_query($connect, $truyvan);
        //mã đơn hàng mứi đặt
        //lấy một bản ghi chính là cái dữ liệu mới được chèn vào mới nhất
        $query="select id from orders order by id desc limit 1";
        $ketnoi = mysqli_query($connect, $query);
        $orderid = mysqli_fetch_array($ketnoi)['id'];
     //   $orderid=mysqli_fetch_array($connect->query($query))['id'];

        //dùng vòng lặp để lấy mã sản phẩm và số lượng của sản phẩm
        foreach($_SESSION['cart'] as $key=>$value){
            $productid=$key;
            $number=$value;
            $query="select price from products where id='$key'";
            $ketnoi = mysqli_query($connect, $query);
            $price = mysqli_fetch_array($ketnoi)['price'];
            $query="insert orderdetail values($productid,$orderid,$number,$price)";
            mysqli_query($connect, $query);
            
        }
        unset($_SESSION['cart']);
        header("location: ?option=ordersuccess");
    }
?>
 <!----------------------delivery-------------------------------->
 <section class = "delivery">
        
        <div class="container">
            <div class="delivery-content row">
                <div class="delivery-content-left">
                    <form action="" method = "post">
                        <div class="delivery-content-left-input-top row">
                            <div class="delivery-content-left-input-top-item">
                                <section>
                                    <label>Họ Tên<span style = "color: red">*</span></label>
                                    <input required name = "name" value = "<?=$member['fullname']?>" />
                                </section>
                            </div>
                            <div class="delivery-content-left-input-top-item">
                                <section>
                                    <label>Điện Thoại<span style = "color: red">*</span></label>
                                    <input required type = "tel" name = "mobile" value = "<?=$member['mobile']?>"/>
                                </section>
                            </div>   
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <section>
                                <label>EMAIL<span style = "color: red">*</span></label>
                                <input type = "email" name = "email" value = "<?=$member['email']?>"/>
                            </section>   
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <section>
                            <label>ĐỊA CHỈ<span style = "color: red">*</span></label>
                            <textarea required name = "address" rows= 3><?=$member['address']?></textarea>
                            </section>
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <section>
                                <label>GHI CHÚ<span style = "color: red">*</span></label>
                                <textarea name = "note" rows = 3></textarea>
                            </section>
                        </div>
                        <div class="delivery-content-left-input-bottom">
                            <label>PHƯƠNG THỨC THANH TOÁN<span style = "color: red">*</span></label>
                            <?php
                                $query = "select * from ordersmethods where status";
                                $result = mysqli_query($connect, $query);
                                //$result=$connect->query($query);
                            ?>
                            
                            <select name="ordermethodid" id="">
                                <?php foreach($result as $item):?>
                                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                                    
                                <?php
                                    endforeach;
                                ?>
                            </select>
                            
                        </div>
                        
                        <div class="delivery-content-left-button row">
                            <a href = "?option=cart"><span>&#171;</span><p>Quay lại giỏ hàng</p></a>
                            <section>
                                <input type="submit" value = "thanh toan don hang">
                            </section>
                        </div>
                    </form>  
                </div>
          
            <div class="delivery-content-right row">
                    <?php
                        if(isset($_SESSION['cart'])):
                            //$ids="0";
                            //foreach(array_keys($_SESSION['cart']) as $key)
                            //$ids.=",".$key;

                            //cần 2 đối số thứu nhất là dấu phẩy để phân cách giwuax các phần từ giữa mảng
                            //thứu 2 là mảng là t lấy
                            $ids = implode(',', array_keys($_SESSION['cart']));
                            $query="select * from products where id in($ids)";
                            $result=$connect->query($query);
                    ?>
                    <table>
                        <tr>
                            <th>TÊN SẢN PHẨM</th>
                            <th>SL</th>
                            <th>GIÁ</th>
                            <th>THÀNH TIỀN</th>
                        </tr>
                        <?php
                            $tongtiengiohang=0;
                            $tongsanphamgiohang=0;
                            foreach($result as $item):
                        ?>
                        <tr>
                            <td><?=$item['name']?></td>
                            <td><a style = "color: red"><?=$tongsanpham=$_SESSION['cart'][$item['id']]?></a></td>
                            <td><a style = "color: red"><?=number_format($item['price'],0,',','.')?><sup>đ</sup></a></td>
                            <td><a style = "font-weight:bold"><?=number_format($tongtiensanpham=$item['price']*$_SESSION['cart'][$item['id']],0,',','.')?><sup>đ</sup></a></td>
                        </tr>
                        <?php $tongtiengiohang+=$tongtiensanpham?>
                        <?php $tongsanphamgiohang+=$tongsanpham?>
                        <?php $thue = $tongtiengiohang *5 / 100?>
                        <?php 
                            endforeach;
                        ?>
                        <tr>
                            <td style = "font-weight: bold;" colspan="3">Tổng</td>
                            <td style = "font-weight: bold;"><p><?=number_format($tongtiengiohang,0,',','.')?><sup>đ</sup></p></td>
                        </tr>
                        <tr>
                            <td style = "font-weight: bold;" colspan="3">Thuế VAT</td>
                            <td style = "font-weight: bold;"><p><?=number_format($thue,0,',','.')?><sup>đ</sup></p></td>
                        </tr>
                        <tr>
                            <td style = "font-weight: bold;" colspan="3">Tổng tiền thanh toán</td>
                            <td style = "font-weight: bold;"><p style = "color: red"><?=number_format($tongtiengiohang-$thue,0,',','.')?><sup>đ</sup></p></td>
                        </tr>
                        
                    </table>
                    <?php 
                        endif;

                    ?>
                </div>
        </div>
    </div>
     
    </section>