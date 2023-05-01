<style>
    .menu li a{
        font-size:10px;
    }
</style>
<?php
    $query="select * from brand where status = '1' and id > 1";
    $result=$connect->query($query);
?>
<header>
        <div class="logo">
            <img src="images/logotrongsuot.png" width=80px>
        </div>
        <div class="menu">
            <li><a href="?option=home">TRANG CHỦ</a></li>
            <?php
                foreach($result as $item):
            ?>
            <li><a href="?option=showsanpham&brandid=<?=$item['id']?>"><?=$item['name']?></a></li>
            <?php endforeach;?>
            <li><a href="?option=showsanpham">TẤT CẢ SẢN PHẨM</a>
            <li><a href="?option=showdonhang">TT ĐƠN HÀNG</a></li>
            <li><a href="?option=showuser">TT CÁ NHÂN</a></li>
        </div>
        <div class="others">
            <li>
                <form action="">
                    <input type="hidden" name = "option" value = "showsanpham">
                    <input type="search" name  = "tukhoa" placeholder="Tìm Kiếm" value="<?php if(isset($_GET['tukhoa'])) echo $_GET['tukhoa']?>"/><i class="fas fa-search"></i>
                </form>
                
            </li>

            <li>
                <a style = "display: <?=$_SESSION['member']?'none':''?>" href="?option=signin" class="fa fa-user"></a>
                
            </li>
            <li>
                <a href="?option=cart" class="fa fa-shopping-bag"></a>
            </li>
            <?php
                //kiểm tra biến đó có chứa dữ liệu hay không
                 if(empty($_SESSION['member'])):
            ?>     
            
            <?php
                else:
            ?>
            <section class = "dangxuat">
                <li>
                    <a href = "?option=logout" class = "fa fa-paw"></a>
                </li>
            </section>
            <?php
                endif;
            ?>
        </div>
    </header>
    <script>
        const header = document.querySelector("header")
      window.addEventListener("scroll",function(){
          x = window.pageYOffset
          console.log(x)
          if(x > 0){
              header.classList.add("sticky")
          }
          else{
            header.classList.remove("sticky")
          }
      })
    </script>
   