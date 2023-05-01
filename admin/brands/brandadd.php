<style>
   .btnstatus{
       margin-top:10px;
   }
   .them{
       margin-top:10px;
   }
</style>
<?php
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $query="select * from brand where name = '$name'";
        $ketnoi = mysqli_query($connect, $query);
        if(mysqli_num_rows($ketnoi)!=0){
            $alert="Đã tồn tại hãng này!!!";
        }
        else{
            $status=$_POST['status'];
            $query="insert brand(name,status) values('$name','$status')";
            mysqli_query($connect, $query);
            echo "<script>window.location.href=' ?option=brand'</script>";
        }
    }
?>
<h1>Thêm Hãng Sản Xuất</h1>
<section class="brandadd">
    <form method="post">
        <section class="hang">
            <label for="">Tên Hãng: </label>
            <input type="text" name="name" placeholder="nhập tên hãng..." value="<?php if(isset($_POST['name'])) echo $_POST['name']?>">
        </section>
        <section class='btnstatus'>
            <label for="">Trạng Thái Hãng: </label>
            <input type="radio" name="status" value="1" checked> Active
            <input type="radio" name="status" value="0"> Unactive
        </section>
        <section class="them">
            <input type="submit" value="Thêm">
        </section>
        <section style="color:red;font-weight:bold">
            <?=isset($alert)?$alert:''?>
        </section>
    </form>
</section>