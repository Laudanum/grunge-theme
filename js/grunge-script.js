// $Id: grunge-script.js,v 1.1 2010/09/11 20:28:39 atelier Exp $
(function ($) {
  Drupal.behaviors.grungeFirstword = {
    attach: function(context) {
      $('h1.title, .block h2.title').each(function(){
          var bt = $(this);
          if ( bt.find('a').size() ) {
            bt = bt.find('a')[0];
          }
          bt.html( bt.text().replace(/(^\w+)/,'<span class="first-word">$1</span>') );
      });
    }
  };
/*
  Drupal.behaviors.grungeSuperfish = {
    attach: function(context) {
      $("#primary-menu ul.sf-menu").superfish({
        hoverClass:  'sfHover',
        delay:       250,
        animation:   {opacity:'show',height:'show'},
        speed:       'fast',
        autoArrows:  true,
        dropShadows: false,
        disableHI:   true
      }).supposition();
    }
  };
*/

  Drupal.behaviors.grungeCarousel = {
    attach: function(context) {
      $(".jcarousel-container").click(function(e) {
//  did we click on the navigators or arrows ? if so continue 
        if (e.target !== this) {
          if ( $(e.target).hasClass("jcarousel-next") || $(e.target).hasClass("jcarousel-prev") ){
            return;
          }
        }
        
//  how do we know which slide is active? its in the navigation - ick
        active_index = $(this).find(".jcarousel-navigation .active").attr("jcarousel-page");
        active_link = $(".jcarousel .jcarousel-item-" + active_index + " .views-field-title a").attr("href");
        if ( active_link )
          location.href = active_link;
        
      });
    }
  };
})(jQuery);
