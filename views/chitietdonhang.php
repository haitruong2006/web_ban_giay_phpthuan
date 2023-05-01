<style>
    h2{
        margin-top:10px;
        font-size:20px;
    }
    table{
        margin-top:10px;
    }
    th, td{
        text-align:center;
        padding: 10px 0;
    }
</style>
<?php
    $iddonhang = $_GET['iddonhang'];
    $query = "select a.fullname, a.mobile as 'mobilemember', a.address as 'addressmember', a.email as 'emailmember', b.* from member a join orders b on a.id = b.memberid where b.id='$iddonhang'";
    $order = mysqli_fetch_array($connect->query($query));
?>
<section class="cart">
    <div class="container">
        <h1 style="text-align:center;font-size:25px;margin-bottom:50px">CHI TIẾT ĐƠN HÀNG <br>(Mã Đơn Hàng: <?=$order['id']?> Ngày đặt: <?=$order['orderdate']?>)</h1>
        <h2>THÔNG TIN NGƯỜI ĐẶT HÀNG</h2>
        <table border="1" cellspacing ="0" cellpadding = "0" width="100%">
            <tr>
                <th>Họ Tên: </th>
                <td><?=$order['fullname']?></td>
            </tr>
            <tr>
                <th>Số Điện Thoại: </th>
                <td><?=$order['mobilemember']?></td>
            </tr>
            <tr>
                <th>Địa Chỉ: </th>
                <td><?=$order['addressmember']?></td>
            </tr>
            <tr>
                <th>Email: </th>
                <td><?=$order['emailmember']?></td>
            </tr>
            <tr>
                <th>Ghi chú: </th>
                <td><?=$order['note']?></td>
            </tr>
        </table>
        <h2>THÔNG TIN NGƯỜI NHẬN</h2>
        <table border="1" cellspacing ="0" cellpadding = "0" width="100%">
            <tr>
                <th>Họ Tên: </th>
                <td><?=$order['name']?></td>
            </tr>
            <tr>
                <th>Số Điện Thoại: </th>
                <td><?=$order['mobile']?></td>
            </tr>
            <tr>
                <th>Địa Chỉ: </th>
                <td><?=$order['address']?></td>
            </tr>
            <tr>
                <th>Email: </th>
                <td><?=$order['email']?></td>
            </tr>
        </table>
        <?php 
             $query="select b.number,b.price,c.name,c.image from orders a join orderdetail b on a.id=b.orderid join products c on b.productid=c.id where a.id=".$order['id'];
             $orderdetail=$connect->query($query);
        ?>
        <h2>CÁC SẢN PHẨM ĐẶT MUA</h2>
        <table border="1" width="100%" cellspacing="0" cellpadding="0">
            <thead>
               <tr>
                   <th>STT</th>
                   <th>Tên sản phẩm</th>
                   <th>Ảnh</th>
                   <th>Giá</th>
                   <th>Số lượng</th>
                   <th>Thành Tiền</th>
               </tr>
            </thead>
            <?php $count=1;?>
            <?php $tongtiengiohang=0;?>
            <?php foreach($orderdetail as $item):?>
            <tbody>
                <tr>
                    <td><?=$count++?></td>
                    <td><?=$item['name']?></td>
                    <td width="20%"><img src="images/<?=$item['image']?>" width="50%"></td>
                    <td><?=number_format($item['price'],0,',','.')?></td>
                    <td><?=$item['number']?></td>
                    <td ><?=number_format($tongtiengsanpham=$item['price']*$item['number'],0,',','.')?></td>
                </tr>
                <?php $tongtiengiohang+=$tongtiengsanpham?>
                <?php endforeach;?>
                <tr>
                    <th colspan="5">Tổng Tiền Đơn Hàng</th>
                    <th><?=number_format($tongtiengiohang,0,',','.')?><sup>đ</sup></th>
                </tr>
            </tbody>
           
        </table>
    </div>
</section>
