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
</style>
<?php
    if(isset($_POST['name'])){
        $name=$_POST['name'];
        $query="select * from products where name='$name'";
        $ketnoi = mysqli_query($connect, $query);
        if(mysqli_num_rows($ketnoi)!=0){
            echo "<script>alert('Đã tồn tại tên sản phẩm này')</script>";
        }
        else{
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
                move_uploaded_file($imageTemp,$store.$imageName);
                $result="insert products(brandid,name,price,image,description,status,thongso) values('$brandid','$name','$price','$imageName','$description','$status','$thongso')";
                mysqli_query($connect, $result);
                
                echo "<script>window.location.href=' ?option=product'</script>";
            }
            else{
                $alert="File đã chọn không phải file ảnh";
            }
            
            //
            
        }
    }
?>
<?php
    $query = "select * from brand where status = 1";
    $brands = mysqli_query($connect, $query);
?>

<div class="">
    <div class="product-add-content">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>THÊM SẢN PHẨM</h1>
            <label for="">Chọn Hãng Sản Xuất<span style="color: red;">*</span></label> <br>
            <select name="brandid" id="">
                <option hidden>--Chọn Hãng--</option>
                <?php
                    foreach($brands as $item):
                ?>
                <option value="<?=$item['id']?>">
                    <?=$item['name']?>
                </option>
                <?php
                    endforeach;
                ?>
            </select>
            <label for="">Tên sản phẩm<span style="color: red;">*</span></label> <br>
            <input required type="text" name="name"> <br>              
            <label for="">Giá sản phẩm<span style="color: red;">*</span></label> <br>
            <input required name="price" type="number" min="100000"> <br>  
            <label for="">Mô tả<span style="color: red;">*</span></label> <br>
            <textarea class="ckeditor"  required name="description" cols="60" rows="5" id="description" required></textarea><br>  
            <label  for="">Thông Số<span style="color: red;">*</span></label> <br>
            <textarea class="ckeditor" required name="thongso" cols="60" rows="5" id="thongso" required></textarea><br> 
            <label for="">Ảnh đại diện<span style="color: red;">*</span></label> <br>
            <input required type="file" name="image"> <br>
            <div class="trangthai">
                <label for="">Trạng Thái<span style="color: red;">*</span></label> <br>
                <input type="radio" name="status" value="1" checked> Active
                <input type="radio" name="status" value="0"> Unactive  
            </div>
            <section class = "button">
                <input  type="submit" value="xác nhận" />
            </section>
        </form>
    </div>           
</div>