$(document).ready(function() {
    
    $(window).click(function(event) {
        if (event.target === document.getElementById('popup-wrapper')) {
            $('#popup-wrapper').css('visibility', 'hidden');
        }
    });
    
    $("#product_category").click(function() {
        $('#popup-wrapper').css('visibility', 'visible');
    });
    
//    $("#close").click(function() {
//        $('#popup-wrapper').css('visibility', 'hidden');
//    });
});