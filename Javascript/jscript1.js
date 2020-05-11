
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



//Shtimi
var butonat = document.querySelectorAll(".button1");
    butonat.forEach(function(btn){
        const article = btn;
        btn.addEventListener('click', function(event){
            var shporta = JSON.parse(window.localStorage.getItem('shport') || window.localStorage.setItem('shport', JSON.stringify([])) )
            let sasia = 1;
            if(shporta.length !== 0) {
                console.log(shporta)
                shporta.forEach(function(s) {
                    if(s.kodi === event.target.id) {
                        sasia = s.sasi + 1;
                        total = article.dataset.shitje * sasia;
                        const new_shporta = shporta.filter(function(i) {
                            return i.kodi !== event.target.id;
                        });
                        new_shporta.push({kodi: event.target.id, cmimi : total , sasi: sasia});
                        window.localStorage.setItem('shport',JSON.stringify(new_shporta))
                    } else {
                        shporta.push({kodi: event.target.id, cmimi : article.total , sasi: sasia}) 
                        window.localStorage.setItem('shport',JSON.stringify(shporta)) 
                    }
                })
            } else {
                shporta.push({kodi: event.target.id, cmimi : article.dataset.shitje , sasi: 1});
                window.localStorage.setItem('shport',JSON.stringify(shporta)) 
            }
    })
})




