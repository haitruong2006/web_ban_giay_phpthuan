<style>
    :root{
        --bg1: #9b59b6;
        --bg2: #3498db; 
    }
     .container{
        display: flex;
        
        text-align: center;
        align-items: center;
        justify-content: center;
        margin-top:100px;
        border-bottom: 2px solid #333;
    }
    .form-login{
        width: 500px;
        height: 850px;
        background: #fff;
        padding: 40px 30px;
        margin-bottom: 10px;
    }
    .form-login button{
        height: 35px;
        width: 100%;
        margin-bottom: 50px;
        background: linear-gradient(to bottom right, var(--bg1), var(--bg2));
        border: none;
        color: #fff;
    }
    .form-text{
        margin-bottom: 20px;
        position: relative;
        margin-top: 10px;
    }
    .form-text input{
        width: 100%;
        height: 45px;
        padding-left: 30px;
        font-size: 16px;
    }
    .form-text label{
        position: absolute;
        font-size: 20px;
        line-height: 45px;
    }
    .form-text textarea{
        width: 100%;
        height: 150px;
        padding-left: 30px;
    }
</style>
<?php 
    if(isset($_POST['username'])){
        $username=$_POST['username'];
        $query="select * from member where username = '$username'";
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) != 0){
            echo "<script>alert('Đã tồn tại tên này')</script>";
        }
        else{
            $password=$_POST['password'];
            $fullname=$_POST['fullname'];
            $mobile = $_POST['mobile'];
            $email=$_POST['email'];
            $address = $_POST['address'];
            $query="insert member(username,password,fullname,mobile,address,email) values('$username','$password','$fullname','$mobile','$address','$email')";
            mysqli_query($connect, $query);    
            echo "<script>alert('Bạn đã đăng ký thành công!!!,Mời bạn đăng nhập để tiếp tục mua hàng');location='?option=signin';</script>";
        }
    }
?>

<section class = "container">
    <section >
        <form class = "form-login" action="" method = "post" onsubmit="if(repassword.value!=password.value){alert('2 MẬT KHẨU KHÔNG TRÙNG KHỚP VỚI NHAU');return false;}">
            <h1>Đăng Ký Tài Khoản</h1>
            <section class = "form-text">
               <input type="text" name = "username" placeholder = "Nhập tài khoản" required>
            </section>
            <section class = "form-text">
                 <input type="password" name = "password"  placeholder = "Nhập mật khẩu" required>
            </section>
            <section class = "form-text">
                 <input type="password" name = "repassword" placeholder = "Nhập lại mật khẩu" required>
            </section>
            <section class = "form-text">
                <input type="text" name = "fullname" placeholder = "Nhập đầy đủ họ tên" required>
            </section>
            <section class = "form-text">
                <input type="tel" name = "mobile" placeholder = "Nhập số điện thoại" required >
            </section>
            <section class = "form-text">
                <input type="email" name = "email" placeholder = "Nhập email" required>
            </section>
            <section class = "form-text">
                <textarea name="address" placeholder = "Nhập địa chỉ" required></textarea>
            </section>
            <button>ĐĂNG KÝ</button>
            
        </form>
    </section>
</section>