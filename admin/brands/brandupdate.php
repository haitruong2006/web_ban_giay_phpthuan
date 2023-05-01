<style>
   .btnstatus{
       margin-top:10px;
   }
   .them{
       margin-top:10px;
   }
</style>
<?php
    $query = "select * from brand where id = ".$_GET['id'];
    $Ketnoi = mysqli_query($connect, $query);
    $brand = mysqli_fetch_array($Ketnoi);
?>
<?php
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $query1="select * from brand where name = '$name' and id!=".$brand['id'];
        $Ketnoi = mysqli_query($connect, $query1);
        if(mysqli_num_rows($Ketnoi)!=0){
            $alert="Đã tồn tại hãng này!!!";
        }
        else{
            $status=$_POST['status'];
            $query="update brand set name='$name', status='$status' where id=".$brand['id'];
            mysqli_query($connect,$query);
            echo "<script> window.location.href='?option=brand';</script>";
            
        }
    }
?>
<h1>Sửa Hãng Sản Xuất</h1>
<section class="brandadd">
    <form method="post">
        <section class="hang">
            <label for="">Tên Hãng: </label>
            <input type="text" name="name" placeholder="nhập tên hãng..." value="<?=$brand['name']?>">
        </section>
        <section class='btnstatus'>
            <label for="">Trạng Thái Hãng: </label>
            <input type="radio" name="status" value="1" <?=$brand['status']==1?'checked':''?>> Active
            <input type="radio" name="status" value="0" <?=$brand['status']==0?'checked':''?>> Unactive
        </section>
        <section class="them">
            <a href="?option=brand">&lt;&lt Back</a>
            <input type="submit" value="update">
        </section>
        <section style="color:red;font-weight:bold">
            <?=isset($alert)?$alert:''?>
        </section>
    </form>
</section>