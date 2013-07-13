/**
 * Off Canvas
 */
jQuery(function($) {
    var toggleOnCanvas = function(e) {
        e.preventDefault();
        $('body').toggleClass('offCanvas');
    };
    
    var toggleOffCanvas = function(e) {
        $('body').toggleClass('offCanvas');
    };

    $('#offCanvasToggler').on('click', toggleOnCanvas);
    $('nav').on('click', toggleOffCanvas);
    $('.searchform').on('click', toggleOffCanvas);
});
