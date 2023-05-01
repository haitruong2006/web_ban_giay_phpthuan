<?php
   
    $statusmember = $_GET['statusmember'];
    $query = "select * from member where status = $statusmember";
    $result = mysqli_query($connect, $query);
?>

<h1>DANH SÁCH NGƯỜI DÙNG <?=$statusmember==0?'CHƯA XỬ LÝ':($statusmember==1?'ĐANG KÍCH HOẠT':'ĐÃ BỊ KHÓA')?></h1>
<table border="1" width="100%" cellspacing="0" cellpadding="0">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <?php   $count=1;?>
    <?php foreach($result as $item): ?>
        <tbody>
            <tr>
                <td><?=$count++?></td>
                <td><?=$item['id']?></td>
                <td>
                    <a href="?option=memberdetail&idmember=<?=$item['id']?>">Chi tiết </a>
                    <a href="?option=delete&id=<?=$item['id']?>" style="display: <?=$item['status']==2?'':'none'?>" onclick="return confirm('bạn chắc chắn muốn xóa?')"> || Xóa</a>
                </td>
            </tr>
        </tbody>
    <?php endforeach;?>
</table>