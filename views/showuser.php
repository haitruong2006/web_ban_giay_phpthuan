<style>
    .container{
        text-align:center;
        margin-left:20px;
    }
    .product-add-content input {
        outline: none;
        outline: none;
        padding-left: 6px;
        height: 30px;
        margin-bottom: 20px;
        width: 500px;
    }
    .product-add-content label {
        display: block;
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
    if(!empty($_SESSION['member'])){
        $member = $_SESSION['member'];
        $query="select * from member where username='$member'";
        $result = mysqli_query($connect, $query);
       // $result=$connect->query($query);
    }
    else{
        echo "<script>window.location.href='?option=signin&user=1'</script>";
    }
?>
<?php
    if(isset($_POST['username'])){
        $name = $_POST['username'];
        $id = $_POST['id'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        if (!preg_match ("/^[0-9]*$/",$mobile)) 
        {  
            echo "<script>alert('Vui lòng nhập đúng số điện thoại')</script>";       
        }
        else{
            $sql = "update member set username = '$name', password = '$password', fullname='$fullname', mobile='$mobile', email = '$email', address = '$address' where username = '$member'";
            $them = mysqli_query($connect, $sql);
            if($them == true){
                echo "<script>alert('Đã cập nhập thành công')</script>";
                echo "<script>window.location.href='?option=showuser'</script>";
            }
            else{
                echo "<script>alert('truy vấn sai')</script>";
            }
            
        }
       
        //$connect->query("update member set username = '$name', password ='$password', ")
    }
    
?>
<section class="cart">
    <div class="container">
        <div class="div">
            <div class="product-add-content">
                <?php foreach($result as $item):?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h1 style="text-align:center;margin-bottom:50px;font-size:25px">THÔNG TIN CÁ NHÂN</h1>
                    
                    <input readonly="true" required type="text" name="id" value="<?=$item['id']?>"> <br>  
                   
                    <input readonly="true" required type="text" name="username" value="<?=$item['username']?>"> <br>  
                    
                    <input required type="text" name="fullname" value="<?=$item['fullname']?>" placeholder="Vui lòng nhập họ tên đầy đủ"> <br> 
                  
                    <input required type="text" name="password" value="<?=$item['password']?>" placeholder="Vui lòng nhập mật khẩu"> <br>  
                   
                    <input required type="phone" name="mobile" value="<?=$item['mobile']?>" placeholder="Vui lòng nhập số điện thoại"> <br>  
                    
                    <input required type="text" name="email" value="<?=$item['email']?>" placeholder="Vui lòng nhập email"> <br>  
               
                    <input required type="text" name="address" value="<?=$item['address']?>" placeholder="Vui lòng nhập địa chỉ"> <br>  
                    
                    <section class = "button">
                        <input  type="submit" value="Cập Nhập" />
                    </section>
                </form>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</section>
