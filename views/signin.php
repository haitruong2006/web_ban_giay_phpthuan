<style>
     :root{
        --bg1: #9b59b6;
        --bg2: #3498db; 
    }
    *{
        margin : 0;
        padding: 0;
        outline : none;
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
        width: 400px;
        height: 500px;
        background: #fff;
        border-radius: 10px;
        padding: 40px 30px;
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
        margin-bottom: 60px;
        position: relative;
        margin-top: 30px;
    }
    .form-text input::placeholder{
        color: #909090;
    }
    .form-text input{
        width: 100%;
        height: 45px;
        padding-left: 30px;
        border: none;
        border-bottom: 2px solid var(--bg2);
        outline: none;
        font-size: 16px;
    }

    .form-text i {
        position: absolute;
        font-size: 20px;
        line-height: 45px;   
    }
</style>
<?php
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "select * from member where username = '$username' and password = '$password'";
        //kiểm tra truy vấn
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) == 0){
            echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
        }
        else{
            $result = mysqli_fetch_array($result);
            if($result['status'] == 2){
                //$alert = "<br>Tài khoản đang bị khóa hoặc đang trong quá trình xử lý";
                echo "<script>alert('Tài khoản đang bị khóa hoặc đang trong quá trình xử lý')</script>";
            } 
            else{
                $_SESSION['member'] = $username;
                //kiểm tra xem có cái order không nếu có biến order thì chuyển qua trang order k thì chueyenr dô trang share sản phẩm
                if(isset($_GET['order'])){
                    header("location: ?option=order");
                }
                elseif(isset($_GET['donhang'])){
                    header("location: ?option=donhangao");
                }
                elseif(isset($_GET['user'])){
                    header("location: ?option=userao");
                }
                elseif(isset($_GET['productid'])){
                    $memberid=$result['id'];
                    $productid=$_GET['productid'];
                    $content=$_SESSION['content'];
                    $query = "insert comments(memberid,productid,date,content) values($memberid,$productid,now(),'$content')";
                    mysqli_query($connect, $query);
                    echo "<script>alert('Bình luận của bạn đang được kiểm duyệt và sẽ được xuất hiện sớm nhất!!!');location='?option=productdetail&id=$productid';</script>";
                }
                
                else{
                    header("location: ?option=showsanpham");
                }
               
            }
        }
    }
?>
<section class = "container">
    <section>
        <form action="" method = "post" class = "form-login">
            <h1>Đăng Nhập Tài Khoản</h1>
            <section class="form-text">
                <i class="fas fa-user"></i><input type="text" name = "username" placeholder = "Nhập tài Khoản" required>
            </section>
            <section class="form-text">
                <i class="fas fa-lock"></i><input type="password" name = "password" placeholder = "Nhập mật Khẩu" required>
            </section>
            <button>Đăng Nhập</button>
            <span>Bạn Chưa Có Tài Khoản? Đăng Ký <a href = "?option=dangkytaikhoan" style = "color:red">Tại Đây</a></span>
            <section>
                <!--<?=isset($alert)?$alert:""?>-->
            </section>
        </form>
    </section>
</section>