<style>
    .product-add-content img{
        width:50%;
    }
</style>
<?php
    $query="select * from img_product where id=".$_GET['id'];
    $ketnoit = mysqli_query($connect, $query);
    $product = mysqli_fetch_array($ketnoit);
?>
<?php
    if(isset($_FILES['image'])){
        $store="../images/";
        $imageName=$_FILES['image']['name'];
        
        $imageTemp=$_FILES['image']['tmp_name'];
            
        $exp3=substr($imageName, strlen($imageName) - 3);//123.jpg thì lấy sau dấu chấm
        $exp4=substr($imageName, strlen($imageName) - 4);
        if($exp3 == 'jpg' || $exp3=='png' || $exp3 == 'bmp' || $exp3 == 'gif' || $exp3 == "JPG" || $exp3 == "PNG" || $exp3=="BMP" || $exp3 == 'GIF' || $exp4 == 'jpeg' || $exp4 == "JPEG" || $exp4=='WEBP' || $exp4=='webp'){
                //$imageName=time().'_'.$imageName;
            move_uploaded_file($imageTemp,$store.$imageName);
            //unlink($store.$product['image']);
        }else{
            $alert="File đã chọn không phải file ảnh";
        }
        if(empty($imageName)){
             $imageName=$product['image'];
        }
        $query = "update img_product set image='$imageName' where id=".$_GET['id'];
        mysqli_query($connect, $query);
        echo "<script>window.location.href=' ?option=img'</script>";
        
    }
?>
<div class="">
    <div class="product-add-content">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>UPDATE ẢNH MÔ TẢ SẢN PHẨM</h1>
            <label for="">ID ẢNH: <?=$product['id']?><span style="color: red;">*</span></label> <br>
            <label for="">ID SẢN PHẨM: <?=$product['productid']?><span style="color: red;">*</span></label> <br>
            <img src="../images/<?=$product['image']?>" width="20%"><br>
            <input  type="file" name="image"> <br>
            <section class = "button">
                <input  type="submit" value="Update" />
            </section>
            <section><?=isset($alert)?$alert:''?></section>
        </form>
    </div>           
</div>
