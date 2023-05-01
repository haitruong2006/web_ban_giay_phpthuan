
<?php
    $query = "select * from img_product";
    $result = mysqli_query($connect, $query);
?>
<h1>DANH SÁCH SẢN PHẨM</h1>
<table border = "1" width = "100%"cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID Ảnh</th>
            <th>Id Sản Phẩm</th>
            <th>Ảnh</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $count=1;?>
        <?php foreach($result as $item):?>
             <tr>
                <td><?=$count++?></td>
                <td><?=$item['id']?></td>
                <td><?=$item['productid']?></td>
                <td width="20%">
                    <img src="../images/<?=$item['image']?>" width="10%" />
                </td>
                <td>
                    <a href="?option=imgupdate&id=<?=$item['id']?>">Update || </a>
                    <a href="?option=product&id=<?=$item['id']?>&image=<?=$item['image']?>" onclick="return confirm('Bạn Chắc Chắn Muốn Xóa Sản Phẩm Này?')">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
    </tbody>
</table>