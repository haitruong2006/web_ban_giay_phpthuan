<?php
    session_start();
?>
<?php
    $connect=new MySQLi("localhost","root","","web_ban_hang");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Vato-Zone</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/index.css" >
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
  </head>
  <body>
      
   <section class = "wrapper">
       <head>
           <?php
            include"views/layout/header.php";
           ?>
       </head>
       <section class = "body">
           <arcicle>
               <?php
                    include"views/layout/arcicler.php";
               ?>
           </arcicle>
       </section>
       <footer>
            <?php
                include"views/layout/footer.php";
            ?>
       </footer>
   </section>
    
</html>