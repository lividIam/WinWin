let routes = require('../../web/js/fos_js_routes.json');
import Routing from '../../vendor/friendsofsymfony/jsrouting-bundle/Resources/public/js/router.min.js';
Routing.setRoutingData(routes);

$(document).ready(function() {
    
    // dummpy data (ajax responses in a future)
    var params = ["One", "Two", "Three"];
    
    // if someone clicks on "Choose category" button
    $("#product_category").click(function() {
        
        ajaxCall();
        
        // show wrapper
        $('#popup-wrapper').css('visibility', 'visible');
        
        // add first element to it
        var categoryElement = pasteAccordionCardElement(1, params);
        $("#accordion").append(categoryElement);
        
        // open the element
        $("button[data-target='#collapse_1']").removeClass('collapsed').attr('aria-expanded', 'true');
        $("#collapse_1").addClass('show');
    });
    
    $(window).click(function(event) {
        
        // if someone clicks beyond popup-content
        if (event.target === document.getElementById('popup-wrapper')) {
            
            shutDownPopupContent();
        }
    });
    
    
//    $("#close").click(function() {
//        $('#popup-wrapper').css('visibility', 'hidden');
//    });


    // if someone clicks on one of the first list, items
    $(document).on('click', "#collapse_1 li", function(event) {
                
        handleAccordionCardClickEvent(1, event, params);
        
        handleSummaryElementAddText();
    });
    
    // if someone clicks on one of the second list, items
    $(document).on('click', "#collapse_2 li", function(event) {
        
        handleAccordionCardClickEvent(2, event, params);
        
        handleSummaryElementAddText();
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
        
        handleSummaryElementAddText();
                
        var button = document.getElementById('submit_chosen_category');
        
        if (button === null) {
            
            // add submit button
            var button = pasteSubmitButton();
            $("#accordion").append(button);
        }
    });
    
    // if someone clicks on the submit button appended after choosing category
    $(document).on('click', "#submit_chosen_category", function() {
        
        
        
        
        // move chosen data to form and display it there !!!!!
        
        
        

        shutDownPopupContent();
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
    
    // create element if not exists, fill it with chosen category text
    function handleSummaryElementAddText() {
        
        var element =  document.getElementById('summary');
        
        if (element === null) { 
            
            // remove padding on the top
            $("#popup-content").css('padding', '0px 20px 30px 20px');
            
            // add summary element
            var element = pasteSummaryElement();
            $("#popup-content").prepend(element);
        }
        
        // fill element with category text
        var text = addTextToSummaryElement();
        $("#summary").html(text);
    }
    
    // create summary element
    function pasteSummaryElement() {
        
        var div = document.createElement('div');
        div.setAttribute('id', 'summary');
        
        return div;
    }
    
    // iterate throug all lists elements and create one string out of them
    function addTextToSummaryElement() {
        
        var categories = getChosenCategories();
        var categoriesLength = categories.length;
        
        var text = '';
        
        for (var i = 0; i < categoriesLength; i++) {
            
            if (i !== 0) {
                
                text += ' < ' + categories[i];
                
            } else {
                
                text += categories[i];
            }            
        }
        
        return text;
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
    
    // clear everything up after closing popup content
    function shutDownPopupContent() {
        
        // hide wrapper
        $('#popup-wrapper').css('visibility', 'hidden');

        // restore default padding
        $("#popup-content").css('padding', '30px 20px 30px 20px');

        // delete all elements in accordion
        $("#accordion").empty();
        
        // delete summary element
        $('#summary').remove();
    }
    
    function getChosenCategories() {
        
        var categories = new Array();
        
        $("li[data-checked='true']").each(function(){
            
            categories.push($(this).html());
        });
        
        return categories;
    }
    
    function getLastChosenCategory() {
        
        var categories = getChosenCategories();
        
        return categories.length === 0 ? 'NULL' : categories[categories.length - 1];
    }
    
    function ajaxCall() {
        
        new Promise(function(resolve, reject){
            
            let url = Routing.generate('category_get', {'categoryName': getLastChosenCategory()});
            let xhr = new XMLHttpRequest();
            
            xhr.open("GET", url);
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.addEventListener('load', function(event)
            {
                if(this.readyState === 4 && this.status === 200 && this.statusText === "OK") {
                    
                    resolve(JSON.parse(this.responseText));
                    
                } else {
                    
                    reject(JSON.parse(this.responseText));
                }
            });      
            
            xhr.send();
            
            
//            var route = Routing.generate('category_get', {'categoryName': getLastChosenCategory()});
//        
//            $.ajax({
//                url: route,
//                type: "GET",
//                dataType: "json",
//                data: {},
//                async: true,
//                success: function (data)
//                {
//                    if(this.readyState === 4 && this.status === 200 && this.statusText === "OK") 
//                    {
//                        console.log(this.responseText);
//                    }
//                }
//            });
        })
            .then((response) => {
                // display categories
            })
            .catch((error) => {
                // show error message
            })
        ;
    }
});