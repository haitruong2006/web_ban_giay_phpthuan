<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $query="select * from img_product where productid='$id'";
        if(mysqli_num_rows($connect->query($query)) != 0){
            echo "<script>alert('Sản Phẩm này đã có ảnh')</script>";
        }
        else{
            $files = $_FILES['img'];
            $file_name = $files['name'];
            foreach($file_name as $key => $value){
                move_uploaded_file($files['tmp_name'][$key], "../images/".$value);
                $sql1 = "INSERT INTO img_product(productid, image) VALUES('$id', '$value')";
                $sq1 = mysqli_query($connect, $sql1);
                
            }
            if($sq1 == true){
                echo "<script>alert('Đã Thêm Thành Công')</script>";
                //header("location: ?option=img");
                echo "<script>window.location.href=' ?option=img'</script>";
            }
            else{
                echo "<script>alert('Đã Thêm Thất bại')</script>";
            }
        }
    }
?>
<h1>THÊM ẢNH MÔ TẢ SẢN PHẨM</h1>
<form action="" method="post" enctype="multipart/form-data">
    <h2>Chọn ID sản phẩm cần thêm</h2>
    <input type="text"  placeholder="nhập id cần thêm..." name="id" required><br>
    <section>
        <br><input type="file" name="img[]" multiple required>
    </section>
    <section class = "button">
        <br><input type="submit" value="Thêm">
    </section>
</form>