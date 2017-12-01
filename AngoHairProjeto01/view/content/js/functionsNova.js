
/* Background Images
-------------------------------------------------------------------*/
var  pageTopImage = jQuery('#page-top').data('background-image');

if (pageTopImage) {
	jQuery('#page-top').css({ 'background-image':'url(' + pageTopImage + ')' }); };

jQuery(document).ready(function($) {

    /* Window Height Resize
    -------------------------------------------------------------------*/
    var windowheight = jQuery(window).height();
    if(windowheight > 650)
    {
         $('.pattern').removeClass('height-resize');
    }
  


});
