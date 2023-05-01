<?php
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query = "select * from orderdetail where productid='$id'";
        $products = mysqli_query($connect, $query);
        if(mysqli_num_rows($products)!=0){
            $update = "update products set status=0 where id='$id'";
            mysqli_query($connect, $update);
        }
        else{
            $xoa = "delete from products where id='$id'";
            mysqli_query($connect, $xoa);
        }
    }
?>
<?php
    $query = "select * from products";
    $result = mysqli_query($connect, $query);
?>
<h1>DANH SÁCH SẢN PHẨM</h1>
<table border = "1" width = "100%"cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá Sản Phẩm</th>
            <th>Ảnh Sản Phẩm</th>
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
                <td width="20%"><?=$item['name']?></td>
                <td><?=number_format($item['price'],0,',','.')?>đ</td>
                <td width="20%">
                    <img src="../images/<?=$item['image']?>" width="10%" />
                </td>
                <td><?=$item['status']==1?'Active':'Unactive'?></td>
                <td>
                    <a href="?option=productupdate&id=<?=$item['id']?>">Update || </a>
                    <a href="?option=product&id=<?=$item['id']?>&image=<?=$item['image']?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa Sản Phẩm Này?')">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>