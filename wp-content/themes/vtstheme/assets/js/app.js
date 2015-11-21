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
