 <!----------------------------------slider----------------------->
 <section id = "slider">
        <div class="aspect-ratio-169">
            <img src = "images/sl1.webp">
            <img src = "images/sl2.webp">
            <img src = "images/sl3.webp">
            <img src = "images/sl4.jpg">
            <img src = "images/sl5.jpg">
        </div>
        <div class="dot-container">
            <div class="dot active">

            </div>
            <div class="dot">
                
            </div>
            <div class="dot">
                
            </div>
            <div class="dot">
                
            </div>
            <div class="dot">
                
            </div>
        </div>
    </section>
    <script>
  
  /*slide*/
  const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
  const imgContainer = document.querySelector('.aspect-ratio-169')
  const dotItem = document.querySelectorAll(".dot")
  let imgNumber = imgPosition.length
  let index = 0;
  //console.log(imgPosition)
  imgPosition.forEach(function(image, index){
    //console.log(image) 
    image.style.left = index* 100 + "%"
    dotItem[index].addEventListener("click", function(){
        slider(index)
    })
  })
  function imgSlide(){
      index++;
      if(index >= imgNumber){
          index = 0
      }
      slider(index)
  }
  function slider(index) {
    imgContainer.style.left = "-" + index * 100 + "%"
    const dotActive = document.querySelector(".active")
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")
  }
  setInterval(imgSlide, 5000)
</script>