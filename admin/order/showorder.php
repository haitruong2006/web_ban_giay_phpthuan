<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "delete from orderdetail where orderid='$id'";
        mysqli_query($connect, $query);
        $query1="delete from orders where id='$id'";
        mysqli_query($connect, $query1);
        echo "<script>alert('Đã xóa thành công')</script>";
        echo "<script>window.location.href='?option=order&status=4'</script>";
    }
?>
<?php
    $status=$_GET['status'];
    $query = "select * from orders where status ='$status'";
    $result = mysqli_query($connect, $query);
?>
<h1>DANH SÁCH ĐƠN HÀNG <?=$status==1?'CHƯA XỬ LÝ':($status==2?'ĐANG XỬ LÝ':($status==3?'ĐÃ XỬ LÝ':'HỦY'))?></h1>
<table border = "1" width = "100%"cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID Đơn Hàng</th>
            <th>Ngày Tạo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1;?>
        <?php foreach($result as $item):?>
             <tr>
                <td><?=$count++?></td>
                <td><?=$item['id']?></td>
                <td width="20%"><?=$item['orderdate']?></td>
                <td>
                    <a href="?option=orderdetail&id=<?=$item['id']?>">Chi tiết đơn hàng </a>
                    <a style="display:<?=$status==4?'':'none'?>" href="?option=order&id=<?=$item['id']?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa Đơn Hàng Này?')" >|| Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>