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
        $query = "update member set status = '$status' where id =".$_GET['idmember'];
        mysqli_query($connect, $query);
        echo "<script>alert('Cập nhập thành công!!!')</script>";
      
    }
    
?>
<?php
    if(isset($_GET['idmember'])){
        $idmember = $_GET['idmember'];
    }
    $query="select * from member where id=$idmember";
    $ketnoi = mysqli_query($connect, $query);
    $member = mysqli_fetch_array($ketnoi);
?>
<form action="" method="post">
    <h1>THÔNG TIN CHI TIẾT <br>(ID: <?=$idmember?> )</h1>
    <table border="1" width="100%" cellspacing="0" cellpadding="0">

        <tr>
            <th>Username</th>
            <td><?=$member['username']?></td>
        </tr>
        <tr>
            <th>Password</th>
            <td><?=$member['password']?></td>
        </tr>
        <tr>
            <th>Fullname</th>
            <td><?=$member['fullname']?></td>
        </tr>
        <tr>
            <th>Mobile</th>
            <td><?=$member['mobile']?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?=$member['email']?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?=$member['address']?></td>
        </tr>
    </table>
    <h2>TRẠNG THÁI NGƯỜI DÙNG</h2>
    <p><input type="radio" name="status" value="1" <?=$member['status']==1?'checked':''?> > Đang kích hoạt</p>
    <p><input type="radio" name="status" value="2" <?=$member['status']==2?'checked':''?>> Khóa</p>
    <section class="button">
        <input type="submit" value="Cập Nhập">
    </section>
</form>
