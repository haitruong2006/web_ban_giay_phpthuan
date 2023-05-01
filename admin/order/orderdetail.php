<style>
    table{
        margin-top:10px;
    }
    h2{
        margin-top:10px;
    }
    input{
        margin-top:10px;
    }
    .button input {
        height: 35px;
        width: 150px;
        cursor: pointer;
        transition: all 0.3s ease;
        outline: none;
        border: 1px solid #58257B;
    }
    .button input:hover{
        background-color: tomato;
        color: #fff;
        border: none;
    }
</style>
<?php
    if(isset($_POST['status'])){
        $status = $_POST['status'];
        $query = "update orders set status= '$status' where id=".$_GET['id'];
        mysqli_query($connect, $query);
        echo "<script>alert('Đã cập nhập thành công!!!')</script>";
    }
?>
<?php
    //  a là member  b là order c là ordermethod 
   $query="select a.fullname,a.mobile as 'mobilemember', a.address as 'addressmember', a.email as 'emailmember',b.*, c.name as 'nameordermethod' from member a join orders b on a.id=b.memberid join ordersmethods c on b.ordermethodid=c.id where b.id=".$_GET['id'];
    $ketnoi = mysqli_query($connect, $query);
    $order = mysqli_fetch_array($ketnoi);
   //hiển thị fullname,sdt, địa chỉ, email trong bảng member, all các trường trong bảng order, tên trong bảng ordermethod(tên phưng thức thanh toán) 
?>

<h1>CHI TIẾT ĐƠN HÀNG <br>(Mã đơn hàng: <?=$order['id']?> Ngày đặt hàng <?=$order['orderdate']?>)</h1>
<!--Thông tin người đặt hàng nằm trong bảng member-->
<!--Thông tin người nhận hàng nằm trong bảng orders-->
<h2>THÔNG TIN NGƯỜI ĐẶT HÀNG</h2>
<table border = "1" width = "100%"cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td>Họ Tên: </td>
            <td><?=$order['fullname']?></td>
        </tr>
        <tr>
            <td>Điện Thoại: </td>
            <td><?=$order['mobilemember']?></td>
        </tr>
        <tr>
            <td>Địa chỉ: </td>
            <td><?=$order['addressmember']?></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><?=$order['emailmember']?></td>
        </tr>
        <tr>
            <td>Ghi Chú: </td>
            <td><?=$order['note']?></td>
        </tr>
    </tbody>
</table>
<h2>THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<table border = "1" width = "100%"cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td>Họ Tên: </td>
            <td><?=$order['name']?></td>
        </tr>
        <tr>
            <td>Điện Thoại: </td>
            <td><?=$order['mobile']?></td>
        </tr>
        <tr>
            <td>Địa chỉ: </td>
            <td><?=$order['address']?></td>
        </tr>
        <tr>
            <td>Email: </td>
            <td><?=$order['email']?></td>
        </tr>
    </tbody>
</table>
<h2>PHƯƠNG THỨC THANH TOÁN</h2>
<section><p><?=$order['nameordermethod']?></p></section>
<?php
//a là bảng orders b là bảng orderdetail c là products
//hiển thị trạng thái(orders), số lượng(chi tiết),giá(chi tiết),tên/ảnh sản phẩm(sản phẩm) trong bảng order orderdetail pro, điều kiện id của đơn hàng bằng với id của đơn hàng trong bảng chi tiết và id sản phẩm trong bảng chi tiết phải bằng id sản phẩm trong bảng sản phẩm where id đơn hàng bằng với id bắt được..
    $query="select b.number,b.price,c.name,c.image from orders a join orderdetail b on a.id=b.orderid join products c on b.productid=c.id where a.id=".$order['id'];
    $orderdetail = mysqli_query($connect, $query);
?>
<form method="post">
        <h2>CÁC SẢN PHẨM ĐẶT MUA</h2>
        <?php $count=1;?>
        <table border = "1" width = "100%"cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orderdetail as $item):?>
                    <tr>
                        <td><?=$count++?></td>
                        <td width='30%'><?=$item['name']?></td>
                        <td  width='20%'><img src="../images/<?=$item['image']?>"></td>
                        <td><?=number_format($item['price'],0,'.',',')?></td>
                        <td><?=$item['number']?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <h2>TRẠNG THÁI ĐƠN HÀNG</h2>
        <p style="display: <?=$order['status']==2 || $order['status'] ==3 || $order['status'] == 4?'none':''?>" >
            <input type="radio" name="status" value="1" <?=$order['status']==1?'checked':''?> > Chưa xử lý
        </p>
        <p style="display: <?=$order['status'] ==3 || $order['status'] == 4?'none':''?>"><input type="radio" name="status" value="2" <?=$order['status']==2?'checked':''?>> Đang xử lý</p>
        <p style="display: <?=$order['status']==4?'none':''?>"><input type="radio" name="status" value="3" <?=$order['status']==3?'checked':''?>> Đã xử lý</p>
        <p style="display: <?=$order['status'] ==3?'none':''?>"><input type="radio" name="status" value="4" <?=$order['status']==4?'checked':''?>> Đã hủy</p>
        <section class="button">
            <input <?=$order['status']==3 || $order['status'] == 4?'disabled':''?> type="submit" value="Cập Nhập">
        </section>
</form>