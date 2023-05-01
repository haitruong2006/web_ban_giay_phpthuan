<!-----------------------------thông tin app0---------------------------------------->
<section class = "app-container">
        <p>Mua Sắm Trên Sàn Điện Tử</p>
        <div class="app-google">
            <img src = "images/lazada.png">
            <img src = "images/shopeejpg.jpg">
        </div>
        <p>Nhận thông báo của Vato's Zone</p>
        <input type = "text" placeholder="nhập email của bạn" />
    </section>
    <!---------------------------------footer----------------------------------->
    <div class="footer-top">
        <li><a href = ""><img src = "images/bocongthuong.jpg"></a></li>
        <li><a href = ""></a>Liên Hệ</li>
        <li><a href = ""></a>Tuyển Dụng</li>
        <li><a href = ""></a>Giới Thiệu</li>
        <li>
            <a href = "" class = "fab fa-facebook-f"></a>
            <a href = "" class= "fab fa-youtube"></a>
            <a href = "" class = "fab fa-instagram"></a>
        </li>
    </div>
   <div class="footer-content">
        <p>
            Shop đồ thể thao VATO'S SPORTS số đăng ký kinh doanh: 12041997<br>
            Địa chỉ: Sảnh A - R6 Khu Đô Thị Royal City, Phường Thượng Đình, Quận Thanh Xuân, Hà Nội<br>
            Hotline: <b>0766 106 357</b>
        </p>
   </div>
    <div class="footer-bottom">
        Copyright 2021 © Vato 9 Zone
    </div>
  </body>
  <script>
    const bigIMG = document.querySelector(".product-content-left-big-img img")
    const smallIMG = document.querySelectorAll(".product-content-left-small-img img")
    smallIMG.forEach(function(imgItem,X){
        imgItem.addEventListener("click", function(){
            bigIMG.src = imgItem.src
        })
    })


    const baoquan = document.querySelector(".baoquan")
    const chitiet = document.querySelector(".chitiet")
    if(baoquan){
        baoquan.addEventListener("click", function(){
            document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "none"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "block"
        })
    }
    if(chitiet){
        chitiet.addEventListener("click", function(){
            document.querySelector(".product-content-right-bottom-content-chitiet").style.display = "block"
            document.querySelector(".product-content-right-bottom-content-baoquan").style.display = "none"
        })
    }
    const button = document.querySelector(".product-content-right-bottom-top")
    if(button){
        button.addEventListener("click", function(){
            document.querySelector(".product-content-right-bottom-content-big").classList.toggle("activeB")
        })
    }
</script>
<script>
      const formlogin = document.querySelectorAll('.form-text input')
      const formlabel = document.querySelectorAll('.form-text label')
      for(let i = 0;i<2;i++){
        formlogin[i].addEventListener("mouseover",function(){
          formlabel[i].classList.add("focus")
        })
        formlogin[i].addEventListener("mouseout",function(){
          if(formlogin[i].value == ""){
            formlabel[i].classList.remove("focus")
          } 
        })
      }
    </script>