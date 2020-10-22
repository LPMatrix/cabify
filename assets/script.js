
var imageID = 0;
    function apeke(secs){
        if(!imageID){
            document.getElementById("cool").style.backgroundImage = 'url(images/car1.png';
              imageID++;
        }
        else if(imageID == 1){
            document.getElementById("cool").style.backgroundImage = 'url(images/car3.png';
            imageID++;
        }
        else if(imageID == 2){
            document.getElementById("cool").style.backgroundImage = 'url(images/car4.png';
            imageID = 0;
        }
        setTimeout("apeke("+secs+")",((secs)*4000));
    }
jQuery(document).ready(function($) {
 
    $(".scroll").click(function(event){   
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800,'swing');
    });
    });





// uniform
    $(function () {
    $('input[type="checkbox"], input[type="radio"], select').uniform();
    });

// social icon
$(document).ready(function($) {
  $('.social i').tooltip('hide')
});

// 

var wow = new WOW(
  {
    boxClass:     'wowload',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
  }
);
wow.init();




$('.carousel').swipe( {
     swipeLeft: function() {
         $(this).carousel('next');
     },
     swipeRight: function() {
         $(this).carousel('prev');
     },
     allowPageScroll: 'vertical'
 });