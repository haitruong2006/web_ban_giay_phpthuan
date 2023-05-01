<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        //$result = $connect->query("delete from comments where id = '$id'");
        $query="delete from comments where id = '$id'";
        $result = mysqli_query($connect, $query);
        if($result == true){
            echo "<script>alert('Xóa thành công')</script>";
            echo "<script>window.location.href='?option=comment&statuscomment=2'</script>";
        }
        else{
            echo "xóa không thành công";
        }
        
    }
?>