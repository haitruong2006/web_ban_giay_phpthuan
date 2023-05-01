<style>
    table{
        margin-left:20px;
        
    }
    th, td{
        padding: 15px;
        text-align:center;
    }
</style>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query="update orders set status='4' where id='$id'";
        $result = mysqli_query($connect, $query);
        header("location: ?option=showdonhang");
    }
    if(isset($_GET['idxoa'])){
        $id = $_GET['idxoa'];
        //$query=$connect->query("delete from orderdetail where orderid='$id'");
        $xoa = "delete from orderdetail where orderid='$id'";
        $query = mysqli_query($connect, $xoa);
        if($query == true){
            $query1 = "delete from orders where id='$id'";
            mysqli_query($connect, $query1);
            header("location: ?option=showdonhang");
        }
    }
    
?>
<?php
    if(!empty($_SESSION['member'])){
        $member = $_SESSION['member'];
        $query="select * from member where username='$member'";
        $ketnoi = mysqli_query($connect, $query);
        $result = mysqli_fetch_array($ketnoi);
        $memberid = $result['id'];
        $order = "select * from orders where memberid='$memberid'";
        $result_order = mysqli_query($connect, $order);
      
?>
<section class="cart">
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <table>
                    <h1 style="text-align:center;margin-bottom:50px;font-size:25px">DANH SÁCH ĐƠN HÀNG</h1>
                    <thead>
                        <tr>
                            <th>STT</th>      
                            <th>ID ĐƠN HÀNG</th>
                            <th>TÊN KHÁCH HÀNG</th>
                            <th>ORDER DATE</th>
                            <th>TRẠNG THÁI</th>
                            <th>HIỂN THỊ</th>
                            <th>THAO TÁC</th>
                        </tr>
                    </thead>
                    <?php $count=1;?>
                    <?php foreach($result_order as $item): ?>
                    <tbody>
                    <tr>
                            <th><?=$count++?></th>
                            <th><?=$item['id']?></th>
                            <th><?=$result['fullname']?></th>
                            <th><?=$item['orderdate']?></th>
                            <th><?=$item['status']==1?'CHƯA XỬ LÝ':($item['status']==2?'ĐANG GIAO HÀNG':($item['status']==3?'ĐÃ GIAO HÀNG':'ĐÃ HỦY'))?></th>
                            <th>
                                <a href="?option=chitietdonhang&iddonhang=<?=$item['id']?>&idmember=<?=$memberid?>">Chi tiết</a>
                            </th>
                            <th>
                                <form action="" method="post">
                                    <a href="?option=showdonhang&id=<?=$item['id']?>" style="display: <?=$item['status']==1?'':'none'?>">Hủy</a>
                                    <a  href="?option=showdonhang&idxoa=<?=$item['id']?>" style="display: <?=$item['status']==4?'':'none'?>">Xóa</a>
                                </form>
                                
                            </th>
                        </tr>
                    </tbody>
                    <?php endforeach;?>
                   
                </table>
            </div>    
        </div>
    </div>
</section>
<?php
    }
    else{
        echo "<script>window.location.href='?option=signin&donhang=1'</script>";
    }
?>