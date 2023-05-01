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
        $status=$_POST['status'];
        $query="update comments set status='$status' where id=".$_GET['id'];
        mysqli_query($connect, $query);
        echo "<script>alert('Đã Cập Nhập Thành Công')</script>";
    }
?>
<?php
    $statuscomment = $_GET['statuscomment'];
    $id = $_GET['id'];
    $memberid =$_GET['memberid'];
    $productid = $_GET['productid'];

    $member = "select * from member where id ='$memberid'";
    $ketnoi = mysqli_query($connect, $member);
    $result_member = mysqli_fetch_array($ketnoi);

    $product = "select * from products where id='$productid'";
    $ketnoi1 = mysqli_query($connect, $product);
    $result_product = mysqli_fetch_array($ketnoi1);

    $comment = "select * from comments where id = '$id'";
    $ketnoi2 = mysqli_query($connect, $comment);
    $result_comment = mysqli_fetch_array($ketnoi2);
?>
<h1>CHI TIẾT COMMENT <br>(Mã comment: <?=$id?> ID member: <?=$memberid?> ID sản phẩm: <?=$productid?>)</h1>
<h2>THÔNG TIN NGƯỜI COMEMNT</h2>
<table border="1" width="100%" cellspacing="0" cellpadding="0">
    <tr>
        <th>ID</th>
        <td><?=$result_member['id']?></td>
    </tr>
    <tr>
        <th>Fullname</th>
        <td><?=$result_member['fullname']?></td>
    </tr>
    <tr>
        <th>Mobile</th>
        <td><?=$result_member['mobile']?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?=$result_member['email']?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?=$result_member['address']?></td>
    </tr>
</table>
<form action="" method="post">
    <h2>CHI TIẾT SẢN PHẨM VÀ COMMENTS</h2>
    <table border="1" width="100%" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>ID SẢN PHẨM</th>
                <th>ID COMMENT</th>
                <th>TÊN SẢN PHẨM</th>
                <th>ẢNH</th>
                <th>COMMENT</th>
            </tr>
            <tr>
                <td><?=$result_product['id']?></td>
                <td><?=$result_comment['id']?></td>
                <td><?=$result_product['name']?></td>
                <td width="20%"><img src ="../images/<?=$result_product['image']?>"></td>
                <td><?=$result_comment['content']?></td>
            </tr>
        </thead>
    </table>
    <h2>TRẠNG THÁI COMMENT</h2>
    <p style="display: <?=$result_comment['status'] ==1?'none':''?>"><input type="radio" name="status" value="0" <?=$result_comment['status']==0?'checked':''?>> Đang xử lý</p>
    <p><input type="radio" name="status" value="1" <?=$result_comment['status']==1?'checked':''?>> Đã xử lý</p>
    <p><input type="radio" name="status" value="2" <?=$result_comment['status']==2?'checked':''?>> Xóa</p>
    <section class="button">
        <input type="submit" value="Cập Nhập">
    </section>
</form>
