$(document).ready(function() {
    
    // dummpy data (ajax responses in a future)
    var params = ["One", "Two", "Three"];
    
    // if someone clicks on "Choose category" button
    $("#product_category").click(function() {
        
        // show wrapper
        $('#popup-wrapper').css('visibility', 'visible');
        
        
        
        
        // add div on top of accordion's cards with summary of currently chosen subcategories !!!!!
        
        
        
        
        // add first element to it
        var element = pasteAccordionCardElement(1, params);
        $("#accordion").append(element);
        
        // open the element
        $("button[data-target='#collapse_1']").removeClass('collapsed').attr('aria-expanded', 'true');
        $("#collapse_1").addClass('show');
    });
    
    $(window).click(function(event) {
        
        // if someone clicks beyond popup-content
        if (event.target === document.getElementById('popup-wrapper')) {
            
            // hide wrapper
            $('#popup-wrapper').css('visibility', 'hidden');
            
            // delete all elements in accordion
            $("#accordion").empty();
        }
    });
    
    
//    $("#close").click(function() {
//        $('#popup-wrapper').css('visibility', 'hidden');
//    });


    // if someone clicks on one of the first list, items
    $(document).on('click', "#collapse_1 li", function(event) {
                
        handleAccordionCardClickEvent(1, event, params);
    });
    
    // if someone clicks on one of the second list, items
    $(document).on('click', "#collapse_2 li", function(event) {
        
        handleAccordionCardClickEvent(2, event, params);
    });
    
    // if someone clicks on one of the third list, items
    $(document).on('click', "#collapse_3 li", function(event) {
        
        // if color is already set, disable it
        $("#collapse_3 li").each(function() {
            if($(this).attr('data-checked') === 'true') {
                $(this).css('background-color', '').removeAttr('data-checked');
            }
        });
        
        changeListTailColorAndHeadTailTitle(3, event);
        
        $("button[data-target='#collapse_3']").addClass('collapsed').attr('aria-expanded', 'false');
        $("#collapse_3").removeClass('show');
        
        // add submit button
        var button = pasteSubmitButton();
        $("#accordion").append(button);
    });
    
    // if someone clicks on the submit button appended after choosing category
    $(document).on('click', "#submit_chosen_category", function() {
        
        
        
        
        // move chosen data to form and display it there !!!!!
        
        
        
        
        // hide wrapper
        $('#popup-wrapper').css('visibility', 'hidden');

        // delete all elements in accordion
        $("#accordion").empty();
    });
    
    // handle appending next accordion card, changing list tail color, card opening and closing
    function handleAccordionCardClickEvent(index, event, params) {
        
        var element = pasteAccordionCardElement(index + 1, params);
        
        // if color is already set, disable it and remove all next child elements
        $("#collapse_" + index + " li").each(function() {
            if($(this).attr('data-checked') === 'true') {
                
                $(this).css('background-color', '').removeAttr('data-checked');
                
                $("#accordion > div:nth-child(" + index + ")").nextAll().remove();
            }
        });
        
        changeListTailColorAndHeadTailTitle(index, event);
        
        // close current card element
        $("button[data-target='#collapse_" + index + "']").addClass('collapsed').attr('aria-expanded', 'false');
        $("#collapse_" + index + "").removeClass('show');
        
        $("#accordion").append(element);
        
        // open next card element
        $("button[data-target='#collapse_" + (index + 1) + "']").removeClass('collapsed').attr('aria-expanded', 'true');
        $("#collapse_" + (index + 1) + "").addClass('show');
    }
    
    // changing list tail color and head tail title
    function changeListTailColorAndHeadTailTitle(index, event) {
        
        $(event.target).css('background-color', 'aqua').attr('data-checked', 'true');
        $("div#heading_" + index + " button[data-target='#collapse_" + index + "']").html(event.target.innerHTML);
    }
    
    // creating and pasting new accordion card element
    function pasteAccordionCardElement(value, params) {
        
        var paramsLength = params.length;
        
        // main div
        var div_1 = document.createElement('div');
        div_1.setAttribute('class', 'card');
        
        // first of two insides divs
        var div_2 = document.createElement('div');
        div_2.setAttribute('class', 'card-header');
        div_2.setAttribute('id', 'heading_' + value);
        
        var h5 = document.createElement('h5');
        h5.setAttribute('class', 'mb-0');
        
        var button = document.createElement('button');
        button.setAttribute('class', 'btn btn-link');
        button.setAttribute('data-toggle', 'collapse');
        button.setAttribute('data-target', '#collapse_' + value);
        button.setAttribute('aria-expanded', 'true');
        button.setAttribute('aria-controls', 'collapse_' + value);
        button.innerHTML = "Choose category";
        
        h5.appendChild(button);
        div_2.appendChild(h5);
        
        // second of two insides divs
        var div_3 = document.createElement('div');
        div_3.setAttribute('id', 'collapse_' + value);
        div_3.setAttribute('class', 'collapse');
        div_3.setAttribute('aria-labelledby', 'heading_' + value);
        div_3.setAttribute('data-parent', '#accordion');
        
        var div_4 = document.createElement('div');
        div_4.setAttribute('class', 'card-body');
        
        var ul = document.createElement('ul');
        ul.setAttribute('class', 'list-group');
        
        for(var i = 0; i < paramsLength; i++) {
            var li = document.createElement('li');
            li.setAttribute('class', 'list-group-item');
            li.innerHTML = params[i];
            ul.appendChild(li);
        }
        
        div_4.appendChild(ul);
        div_3.appendChild(div_4);
        
        // append inside divs to main div
        div_1.appendChild(div_2);
        div_1.appendChild(div_3);
        
        return div_1;
    }
    
    // creating and pasting submit button
    function pasteSubmitButton() {
        
        var button = document.createElement('button');
        button.setAttribute('id', 'submit_chosen_category');
        button.setAttribute('type', 'button');
        button.innerHTML = "Submit";
        
        return button;
    }
});