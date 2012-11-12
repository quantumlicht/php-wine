$(document).ready(function(){
   var windowWidth=$(window).width();
   var loginMenu_width = $('.loginMenu').width();
   var loginMenu_height = $('.loginMenu').height();
   var navBar_Height = $('.navbar').height(); 
   var navbar_offset =0.01*windowWidth;
   var navBar_TopOffset = $('.navbar').offset().top;
   var navContainer_height = $('#navContainer').height();
   var navContainer_width = $('#navContainer').width();
   
   $('.navbar').width(windowWidth - navbar_offset);
   $('#navContainer').offset({ top: navBar_TopOffset + (navBar_Height-navContainer_height)/2, left: 0.5*windowWidth - navContainer_width/2 });
   $('.loginMenu').offset({ top: navBar_TopOffset + (navBar_Height-loginMenu_height)/2, left: 0.80*windowWidth - loginMenu_width/2 });
});

