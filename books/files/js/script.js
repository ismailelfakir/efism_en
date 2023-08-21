   // jquery for toggle drop down
   $(document).ready(function(){

         $(".sub-bnt").click(function(){
             $(this).next(".sub-menu").slideToggle();
         });

   });

   // javascript for menu 

   var menu = document.querySelector(".menu");
   var menuBtn = document.querySelector(".menu-btn");
   var closeBtn = document.querySelector(".close-btn");
   


   menuBtn.addEventListener("click" , () => {
        menu.classList.add("active");
   });

   closeBtn.addEventListener("click" , () => {
        menu.classList.remove("active");
   });
