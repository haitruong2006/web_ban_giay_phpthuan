<?php
    $status_comment=$_GET['statuscomment'];
    $query="select * from comments where status='$status_comment'";
    $result = mysqli_query($connect, $query);
?>
<h1>DANH SÁCH COMMENTS <?=$status_comment==0?'CHƯA XỬ LÝ':($status_comment==1?'ĐÃ XỬ LÝ':'ĐÃ XÓA')?></h1>
<table border="1" width="100%" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <?php $count=1;?>
    <?php foreach($result as $item):?>
        <tbody>
            <tr>
                <td><?=$count++?></td>
                <td><?=$item['id']?></td>
                <td>
                    <a href="?option=commentdetail&statuscomment=<?=$item['status']?>&memberid=<?=$item['memberid']?>&productid=<?=$item['productid']?>&id=<?=$item['id']?>">Chi tiết</a>
                    <a href="?option=deletecomment&id=<?=$item['id']?>" style="display: <?=$status_comment==2?'':'none'?>" onclick="return confirm('bạn có chắc chắn muốn xóa???')"> || Xóa</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach;?>
</table>

