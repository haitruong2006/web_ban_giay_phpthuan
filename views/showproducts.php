<style>
    .highlight{
        font-size: 25px;
        color: #333;
    }
    .cartegory-right-content-item{
        background-color: white;
        border-radius: 5px;
        padding: 5px 10px 0px 10px;
        margin-top: 15px;
        width: 24%;
        
    }
    .cartegory-right-content-item li{
        margin-bottom: 10px;
    }
    .cartegory-right-content-item input{
        height:30PX;
        padding: 0 12PX;
        cursor: pointer;
        background-color: transparent;
        color:#333;
        border: 1px solid rgb(71, 70, 70);
        border-radius: 5px;
        transition: all 0.5s ease;
        margin-top: 10px;
    }
    .cartegory-right-content-item input:hover{
        color: white;
        background-color: red;
    }
</style>
<!-------------------------catogory--------------------------->
<section class = "cartegory">
        <div class="container">
            <div class="row">
                <div class="cartegory-left">
                    <ul>
                        <?php
                            $query = "select * from brand where status = '1' and id > 1";
                            $result = mysqli_query($connect, $query);
                        ?>
                        <li><a href="?option=home">TRANG CHỦ</a></li>
                        <?php foreach($result as $item):?>
                            <li><a href = "?option=showsanpham&brandid=<?=$item['id']?>"><?=$item['name']?></a></li>
                        <?php endforeach;?>
                        <li><a href="?option=showsanpham">TẤT CẢ SẢN PHẨM</a></li>
                    </ul>
                </div>
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-item">
                        <p>HÀNG MỚI VỀ</p>
                    </div>
                    <div class="cartegory-right-top-item">
                        <button><span>Bộ Lọc</span><i class = "fas fa-sort-down"></i></button>
                    </div>
                    <div class="cartegory-right-top-item">
                        <select name = "" id ="">
                            <option value = "">Sắp Xếp</option>
                            <option value = "">Giá Cao Đến Thấp</option>
                            <option value = "">Giá Thấp Đến Cao</option>
                        </select>
                    </div>
                    <div class="cartegory-right-content row">
                         <?php
                            $option = 'showsanpham';
                            $query = "select * from products where status = '1'";
                            if(isset($_GET['brandid'])){
                                $query.=" and brandid=".$_GET['brandid'];
                                $option='showsanpham&brandid='.$_GET['brandid'];
                             }
                             elseif(isset($_GET['tukhoa'])){
                                $query.=" and name like'%".$_GET['tukhoa']."%'";
                                $option='showsanpham&tukhoa='.$_GET['tukhoa'];
                             }

                             $page = 1;
                             if(isset($_GET['page'])){
                                 $page = $_GET['page'];
                             }
                             //số lượng sản phẩm mỗi trang
                             $sosanpham = 8;
                             //sản phẩm bắt đầu từ vị trí trong bảng(0 là bản ghi đầu tiên)
                             $from = ($page-1)*$sosanpham;
                             //lấy tổng số sản phẩm
                             $totalproduct=$connect->query($query);
                             //tính tổng số trang có được
                             $totalpage=ceil(mysqli_num_rows($totalproduct)/$sosanpham);
                             //lấy các sản phẩm ở trang hiện tại
                             $query.=" limit $from,$sosanpham";
                            $result = mysqli_query($connect, $query);
                        ?>
                        <?php
                            foreach($result as $item):
                        ?>
                        <div class="cartegory-right-content-item">
                             <li><a href="?option=productdetail&id=<?=$item['id']?>"><img src = "images/<?=$item['image']?>"></a></li>
                             <li><p style = "font-size: 11px;"><?=$item['name']?></p></li>
                             <li><p><?=number_format($item['price'],0,',','.')?><sup>đ</sup></p></li>     
                             <!--<li><a href="?option=cart&action=add&id=<?=$item['id']?>"><button><i class="fas fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</button></a></li>-->
                             <input type = "button" value = "Thêm vào giỏ hàng" onclick="location='?option=cart&action=add&id=<?=$item['id']?>';">
                            </div>
                        <?php endforeach;?>
                       
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-item">
                            <p>Hiển Thị <?=$page?> <span>|</span> <?=$sosanpham?> Sản Phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-item">
                            <<<?php for($i=1;$i<=$totalpage;$i++):?>
                                <a class = "<?=(empty($_GET['page'])&&$i==1)||(isset($_GET['page'])&&$_GET['page']==$i)?'highlight':''?>" href="?option=<?=$option?>&page=<?=$i?>"><?=$i?></a>
                            <?php endfor;?>>>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>