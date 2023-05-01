<style>
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
    .trangthai input{
        width: 20px;
    }
    .product-add-content img{
        width:50%;
    }
</style>
<?php
    $query="select * from products where id=".$_GET['id'];
    $product=mysqli_fetch_array($connect->query($query));
?>

<?php
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $query="select * from products where name='$name' and id!=".$product['id'];
        if(mysqli_num_rows($connect->query($query))!=0){
            $alert="Đã tồn tại tên sản phẩm này";
        }else{
            $brandid=$_POST['brandid'];
            $price=$_POST['price'];
            $description=$_POST['description'];
            $thongso=$_POST['thongso'];
            $status=$_POST['status'];
            //xử lý ảnh
            
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
            $connect->query("update products set brandid = '$brandid', name = '$name', price = '$price', image = '$imageName', description = '$description', status = '$status', thongso = '$thongso' where id=".$product['id']);
           // header("Location: ?option=product");
           echo "<script>window.location.href=' ?option=product'</script>";
        }
    } 
?>
<?php
    $brands=$connect->query("select * from brand");
?>

<div class="">
    <div class="product-add-content">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>UPDATE SẢN PHẨM</h1>
            <label for="">Chọn Hãng Sản Xuất<span style="color: red;">*</span></label> <br>
            <select name="brandid" id="">
                <option hidden>--Chọn Hãng--</option>
                <?php
                    foreach($brands as $item):
                ?>
                <option value="<?=$item['id']?>" <?=$item['id']==$product['brandid']?'selected':''?>>
                    <?=$item['name']?>
                </option>
                <?php
                    endforeach;
                ?>
            </select>
            <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
            <input required type="text" name="name" value="<?=$product['name']?>"> <br>              
            <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
            <input required name="price" type="number" min="100000" value="<?=$product['price']?>"> <br>  
            <label for="">Mô tả<span style="color: red;">*</span></label> <br>
            <textarea class="ckeditor"  required name="description" cols="60" rows="5" id="description"><?=$product['description']?></textarea><br>  
            <label  for="">Thông Số<span style="color: red;">*</span></label> <br>
            <textarea class="ckeditor" required name="thongso" cols="60" rows="5" id="thongso"><?=$product['thongso']?></textarea><br> 
            <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
            <img src="../images/<?=$product['image']?>" width="20%">
            <input  type="file" name="image"> <br>
            <div class="trangthai">
                <label for="">Trạng Thái<span style="color: red;">*</span></label> <br>
                <input type="radio" name="status" value="1" <?=$product['status']==1?'checked':''?>> Active
                <input type="radio" name="status" value="0" <?=$product['status']==0?'checked':''?>> Unactive  
            </div>
            <section class = "button">
                <input  type="submit" value="Update" />
            </section>
            <section><?=isset($alert)?$alert:''?></section>
        </form>
    </div>           
</div>