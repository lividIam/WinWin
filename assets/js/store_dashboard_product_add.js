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

    $("#collapse1 li").click(function(event) {
        
        handleFirstCollapsiblePanel(event);
        
//        resetAllFollowingSiblings();
        
        preHandleSecondCollapsiblePanel();
    });
    
    $("#collapse2 li").click(function(event) {
        
        // after click close first panel if its open
        
        
        handleSecondCollapsiblePanel(event);
    });
    
    function handleFirstCollapsiblePanel(event){
        
        $("#collapse1 li").each(function() {
            if($(this).attr('data-checked') === 'true') {
                $(this).css('background-color', '').removeAttr('data-checked');
            }
        });
        
        $(event.target).css('background-color', 'aqua').attr('data-checked', 'true');
        $(".panel-heading a[href='#collapse1']").html(event.target.innerHTML);
        
        // remove all the following siblings
    }
    
//    function resetAllFollowingSiblings() {
//        
//        $("div#first").nextAll().each(function(index) {
//            $(".panel-heading a[href='#collapse" + index + "']").html("Choose category");
//            
//            if($(this).attr('data-checked') === 'true') {
//                $(this).css('background-color', '').removeAttr('data-checked');
//            }
//            
//            if($(this).css('visibility') === 'visible') {
//                $(this).css('visibility', 'hidden');
//            }
//        });
//    }
    
    function preHandleSecondCollapsiblePanel() {
        
        $("#collapse1").removeClass("show");
        $("#second").css('visibility', 'visible');
        $("#collapse2 li").each(function() {
            if($(this).attr('data-checked') === 'true') {
                $(this).css('background-color', '').removeAttr('data-checked');
            }
        });
    }
    
    function handleSecondCollapsiblePanel(event) {
        
        preHandleSecondCollapsiblePanel();
        
        $("#collapse1").removeClass("show");
        $(event.target).css('background-color', 'aqua').attr('data-checked', 'true');
        $(".panel-heading a[href='#collapse2']").html(event.target.innerHTML);
        $("#collapse2").removeClass("show");
    }
});