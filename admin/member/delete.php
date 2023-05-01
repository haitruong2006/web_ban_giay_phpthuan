<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "select * from orders where memberid='$id'";
        $product = mysqli_query($connect, $query);
        //$product = $connect->query("select * from orders where memberid='$id'");
        if(mysqli_num_rows($product)!=0){
            $query = "update member set status='1' where id='$id'";
            $result_member = mysqli_query($connect, $query);
           // $result_member = $connect->query($query);
            if($result_member == true){
                echo "<script>alert('Khách hàng này có tồn tại đơn hàng nên không thể xóa')</script>";
                echo "<script>window.location.href='?option=member&statusmember=1'</script>";
            }
            else{
                echo "update không thành công";
            }
        }
        else{
            $xoa = "delete from member where id = '$id'";
            $result = mysqli_query($connect, $xoa);
            if($result == true){
                echo "<script>alert('xóa thành công')</script>";
                echo "<script>window.location.href='?option=member&statusmember=2'</script>";
            }
            else{
                echo "xóa không thành công";
            }
        }
    }
?>