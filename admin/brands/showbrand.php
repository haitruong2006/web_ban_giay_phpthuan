<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "select * from products where brandid='$id'";
        $products = mysqli_query($connect, $query);
        if(mysqli_num_rows($products)!=0){
            $update = "update brand set status=0 where id='$id'";
            mysqli_query($connect, $update);
            
        }
        else{
            $xoa = "delete from brand where id='$id'";
            mysqli_query($connect, $xoa);
        }
    }
?>
<?php
    $query = "select * from brand";
    $result=$connect->query($query);
?>
<h1>HÃNG SẢN XUẤT</h1>
<table border = "1" width = "100%"cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã Hãng</th>
            <th>Tên Hãng</th>
            <th>Trạng Thái</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1;?>
        <?php foreach($result as $item):?>
             <tr>
                <td><?=$count++?></td>
                <td><?=$item['id']?></td>
                <td><?=$item['name']?></td>
                <td><?=$item['status']==1?'Active':'Unactive'?></td>
                <td>
                    <a href="?option=brandupdate&id=<?=$item['id']?>">Update || </a>
                    <a href="?option=brand&id=<?=$item['id']?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa?')">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>