
function myFunction(x) {
    "use strict";
    x.classList.toggle("change");
}

var $;
 $(function(){ 
     var navMain = $(".navbar-collapse"); // avoid dependency on #id
     // "a:not([data-toggle])" - to avoid issues caused
     // when you have dropdown inside navbar
     navMain.on("click", "a:not([data-toggle])", null, function () {
         navMain.collapse('hide');
     });
 });

// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the navbar
var menu1 = document.getElementById("menu1");

// Get the offset position of the navbar
var sticky = menu1.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset >= sticky) {
    menu1.classList.add("sticky")
  } else {
    menu1.classList.remove("sticky");
  }
}



$(window).scroll(function(){
    
    let position = $(this).scrollTop();
    
    if(position>=680){
        $('#back-to-top').addClass('scrollTop');
    }else{
        $('#back-to-top').removeClass('scrollTop');
    }
})



