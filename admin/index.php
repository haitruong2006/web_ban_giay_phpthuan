<?php
    session_start();
?>
<?php
    $connect=new MySQLi("localhost","root","","web_ban_hang");
?>
<?php
    if(isset($_SESSION['admin'])){
        $user = $_SESSION['admin'];
    
?>  
<?php
    include "../admin/header.php";
    include "../admin/left_side.php";
?>
 

</section>

<section>
</section>
<script src="js/script.js"></script>
</body>
</html>  
<?php
    }
    else{
         header("location: login.php");
    }
?> 
            