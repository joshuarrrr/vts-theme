/**
 * app.js
 *
 * Custom scripts for our WordPress application
 */
(function($){
  'use strict';

  /**
   * @module Main app module
   */
   var vtstheme = (function(document){

    function init(){
      // Initialize Foundation
      $(document).foundation();

      $('#share-toggle').mouseover(function() {
        $('.naked-social-share').show(300);
      });

      $('#share-toggle').click(function() {
        $('.naked-social-share').show(300);
      });
    }

    // ...happy coding!

    return {
      init: init
    };
  })(document);

  /**
   * Initialize vtstheme module
   * on document.ready
   */
  $(function(){
    vtstheme.init();
  });

})(jQuery);
