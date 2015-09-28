////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// jQuery
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function($) {
    "use strict";

    var tempID = 1;

    equalHeight('.equal-height');

    $('.parent-height').height($('.parent-height').parent().height());

    if ($(window).width() < 768) {
        var $navigation = $('.navigation');
        $('#slider .slide').height($(window).height() - $navigation.height());
        $('#slider').height($(window).height() - $navigation.height());
    }

    if( $('input[type=file]').length > 0 ) {
        $('input[type=file]').nicefileinput();
    }


    $('.nav > li > ul li > ul').css('left', $('.nav > li > ul').width());

    var navigationLi = $('.nav > li');
    navigationLi.hover(function() {
        if ($('body').hasClass('navigation-fixed-bottom')){
            if ($(window).width() > 768) {
                var spaceUnderNavigation = $(window).height() - ($(this).offset().top - $(window).scrollTop());
                if(spaceUnderNavigation < $(this).children('.child-navigation').height()){
                    $(this).children('.child-navigation').addClass('position-bottom');
                } else {
                    $(this).children('.child-navigation').removeClass('position-bottom');
                }
            }
        }
    });

    var $passwordMessage = $('#password-message');
    var $messageWrapper = $('.message-wrapper');

    $('#form-account-password').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'assets/inc/change_password.php',
            data: $('form').serialize(),
            cache:false,
            success: function (data) {
                $passwordMessage.html(data);
                $messageWrapper.height($passwordMessage.height() + 40);
                if(data == 'Done'){
                    $passwordMessage.html('You have successfully changed your password');
                    $passwordMessage.addClass('alert-success');
                    $passwordMessage.removeClass('alert-danger');
                    setTimeout(function() {
                        $messageWrapper.height(0);
                    }, 2000);
                } else {
                    $passwordMessage.removeClass('alert-success');
                    $passwordMessage.addClass('alert-danger');
                }
            }
        });
    });

    $('#form-contact').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'assets/inc/email.php',
            data: $('#form-contact').serialize(),
            success: function (data) {
                $('#form-status').html(data);
                $('#form-submit').attr("disabled", true);
                //alert(data);
            }
        });
    });

    setNavigationPosition();

    $('.tool-tip').tooltip();

    var select = $('select');
    if (select.length > 0 ){
        select.selectpicker();
    }

    var bootstrapSelect = $('.bootstrap-select');
    var dropDownMenu = $('.dropdown-menu');

    bootstrapSelect.on('shown.bs.dropdown', function () {
        dropDownMenu.removeClass('animation-fade-out');
        dropDownMenu.addClass('animation-fade-in');
    });

    bootstrapSelect.on('hide.bs.dropdown', function () {
        dropDownMenu.removeClass('animation-fade-in');
        dropDownMenu.addClass('animation-fade-out');
    });

    bootstrapSelect.on('hidden.bs.dropdown', function () {
        var _this = $(this);
        $(_this).addClass('open');
        setTimeout(function() {
            $(_this).removeClass('open');
        }, 100);
    });

    var $formSelect = $('.form-search select');

    $formSelect.each(function () {
        if ($(this).val() != '') {
            $(this).parent().addClass('selected-option-check');
        }
        else {
            $(this).parent().removeClass('selected-option-check');
        }
    });

    $formSelect.live('change', function () {
        if ($(this).val() != '') {
            $(this).parent().addClass('selected-option-check');
        }else {
            $(this).parent().removeClass('selected-option-check');
        }
    });

//  Remove Filter

    $formSelect.each(function () {
        //alert($(this).val());
        if( $(this).val() != '' || $('#price-input').attr('data-price-changed') == 1 ){
            $('#remove-filter').css('display','inline-block');
        }
    });

    $('#remove-filter').on('click', function (e) {
        e.preventDefault(e);
        $('#results').addClass('set-opacity');
        $('.form-search .form-group').each(function () {
            $formSelect.val('');
            $('#price-input').val( $priceSlider.attr('data-min-price') + ';' + $priceSlider.attr('data-max-price') );
        });
        $('.form-search').submit();
    });

    $('.faq-no').on('click', function (e) {
        e.preventDefault(e);
        var id = $(this).closest('article').attr('id');
        $.ajax({
            url: 'assets/inc/faq_answer_count.php',
            type: 'POST',
            data: { id: id, action: 'no' },
            success: function(data) {
                $('article#' + id + '.faq aside').html(data);
            }
        });
    });

    $('.faq-yes').on('click', function (e) {
        e.preventDefault(e);
        var id = $(this).closest('article').attr('id');
        $.ajax({
            url: 'assets/inc/faq_answer_count.php',
            type: 'POST',
            data: { id: id, action: 'yes' },
            success: function(data) {
                $('article#' + id + '.faq aside').html(data);
            }
        });
    });

    $('.delete').live('click', function (e) {
        e.preventDefault(e);
        var itemType = $(this).attr('data-item-type');
        var answer = confirm('Are you sure you want to delete this?');
        if ( itemType == 'gallery-submit' ){
            $('#form-submit #image-gallery #file-input'+$(this).attr('id')).remove();
        }
        else {
            if (answer)
            {
                $.ajax({
                    url: 'assets/inc/delete_item.php',
                    type: "POST",
                    data: { itemType: itemType, id: this.id },
                    success: function(data) {
                        location.reload();
                    }
                });
            }
            else
            {
                return false;
            }
        }
    });

    $('input:file').live('change', function (event) {
        var id = $(this).attr('id');
        $('#image'+ id).attr('src',URL.createObjectURL(event.target.files[0]));
    });

    $('#thumbnail').on('change', function (event) {
        $('#thumbnail-image').attr('src',URL.createObjectURL(event.target.files[0]));
    });

    $('#add-image').on('click', function (e) {
        e.preventDefault(e);
        var item_id = $(this).attr('data-item');
        $.ajax({
            url: 'assets/inc/add_image.php',
            type: 'POST',
            data: { action: 'add_image_field', item_id: item_id },
            success: function(data) {
                $('#form-edit #image-gallery').append(data);
                $('#form-edit .file-input:last').hide().fadeIn(200);
                $('#form-edit .file-input:last input[type=file]').nicefileinput();
            }
        });
    });

    $('#add-image-submit').live('click', function (e) {
        e.preventDefault(e);
        var item_id = tempID++;
        $.ajax({
            url: 'assets/inc/add_image.php',
            type: 'POST',
            data: { action: 'add_image_field_submit', item_id: item_id },
            success: function(data) {
                $('#form-submit #image-gallery').append(data);
                $('#form-submit .file-input:last').hide().fadeIn(200);
                $('#form-submit .file-input:last input[type=file]').nicefileinput();
            }
        });
    });

    $('form #tools-submit').live('click', function (e) {
        e.preventDefault(e);
        var formData = $('form').serialize();
        $.ajax({
            url: 'assets/inc/submit_tools_search_form.php',
            type: 'POST',
            data: formData,
            success: function(data) {
                $('.pop-up-message').removeClass('fade-out');
                $('.pop-up-message').addClass('fade-in');
                setTimeout(function() {
                    $('.pop-up-message').addClass('fade-out');
                    $('.pop-up-message').removeClass('fade-in');
                }, 3000);
            }
        });
    });

    $('.tool-add').live('click', function (e) {
        var id = $(this).attr('id');
        var toolType = $(this).attr('data-tool-type');
        $.ajax({
            url: 'assets/inc/tools_add.php',
            type: "POST",
            data: { tool_type: toolType, id: id },
            success: function(data) {
                if( toolType == 'state' ){
                    $('form #states').append(data);
                }
                else if( toolType == 'country' ){
                    $('form #countries-for-' + id).append(data);
                }
                else if( toolType == 'district' ){
                    $('form #districts-for-' + id).append(data);
                }
                else if( toolType == 'city' ){
                    $('form #cities-for-' + id).append(data);
                }
                else if( toolType == 'type' ){
                    $('form #types').append(data);
                }
                else if( toolType == 'footer_link' ){
                    $('form #footer_links').append(data);
                }
                else  {
                    $('form').prepend(data);
                }
                if( $('#form-testimonial').length > 0 ){
                    $('#form-testimonial .testimonial-tools:first input[type=file]').nicefileinput();
                }
                if( $('#form-partners').length > 0 ){
                    $('#form-partners .partner-tools:first input[type=file]').nicefileinput();
                }
            }
        });
    });

//  Load items to homepage map

    if( $('body').hasClass('page-homepage') ){
        $.ajax({
            url: 'load_items.php',
            type: "POST",
            data: { action: 'load_map_items' },
            dataType: 'json',
            success: function(data) {
                createHomepageGoogleMap(data);
            }
        });
    }

//  Sorting

    $('#item-sorting').change(function() {
        $('#results').addClass('set-opacity');
        var data = $(this).val();
        $.ajax({
            url: '',
            type: "POST",
            data: { sorting : data },
            success: function(data) {
                $('#form-sorting').submit();
            }
        });
    });

//  Fit videos width and height

    if($(".video").length > 0) {
        $(".video").fitVids();
    }

//  Price slider

    var $priceSlider = $("#price-input");
    var currency = $priceSlider.data('currency');

    if($priceSlider.length > 0) {
        if( $priceSlider.attr('data-locale') == 'US' ){
            $priceSlider.slider({
                from: parseInt($priceSlider.attr('data-min-price')),
                to: parseInt($priceSlider.attr('data-max-price')),
                step: 1,
                round: 0,
                format: { format: currency + '###,###', locale: 'us' }
            });
        }
        else if ( $priceSlider.attr('data-locale') == 'EU' ){
            $priceSlider.slider({
                from: parseInt($priceSlider.attr('data-min-price')),
                to: parseInt($priceSlider.attr('data-max-price')),
                step: 1,
                round: 0,
                format: { format: '###,### ' + currency, locale: 'en' }
            });
            var price = $('.jslider-value-to span').text();
            var formattedPrice = price.replace(/,/g, " ");
            $('.jslider-value-to span').text(formattedPrice);
        }
    }

//  Parallax scrolling and fixed header after scroll

    $(window).scroll(function () {
        var scrollAmount = $(window).scrollTop() / 1.5;
        scrollAmount = Math.round(scrollAmount);
        if ( $("body").hasClass("navigation-fixed-bottom") ) {
            if ($(window).scrollTop() > $(window).height() - $('.navigation').height() ) {
                $('.navigation').addClass('navigation-fix-to-top');
            } else {
                $('.navigation').removeClass('navigation-fix-to-top');
            }
        }

        if ($(window).width() > 768) {
            if($('#map').hasClass('has-parallax')){
                $('#map .gm-style').css('margin-top', scrollAmount + 'px');
                $('#map .leaflet-map-pane').css('margin-top', scrollAmount + 'px');
            }
            if($('#slider').hasClass('has-parallax')){
                $(".homepage-slider").css('top', scrollAmount + 'px');
            }
        }
    });

//  Smooth Navigation Scrolling

    $('.navigation .nav a[href^="#"], a[href^="#"].roll').on('click',function (e) {
        e.preventDefault();
        var target = this.hash,
            $target = $(target);
        if ($(window).width() > 768) {
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - $('.navigation').height()
            }, 2000)
        } else {
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 2000)
        }
    });

//  Rating

    var ratingOverall = $('.rating-overall');
    if (ratingOverall.length > 0) {
        ratingOverall.raty({
            path: 'assets/img',
            readOnly: true,
            score: function() {
                return $(this).attr('data-score');
            }
        });
    }
    var ratingIndividual = $('.rating-individual');
    if (ratingIndividual.length > 0) {
        ratingIndividual.raty({
            path: 'assets/img',
            readOnly: true,
            score: function() {
                return $(this).attr('data-score');
            }
        });
    }
    var ratingUser = $('.rating-user');
    if (ratingUser.length > 0) {
        $('.rating-user .inner').raty({
            path: 'assets/img',
            starOff : 'big-star-off.png',
            starOn  : 'big-star-on.png',
            width: 150,
            //target : '#hint',
            targetType : 'number',
            targetFormat : 'Rating: {score}',
            click: function(score, evt) {
                showRatingForm();
            }
        });
    }

//  Agent State

    $('#agent-switch').on('ifClicked', function(event) {
        agentState();
    });

    $('#create-account-user').on('ifClicked', function(event) {
        $('#agent-switch').data('agent-state', '');
        agentState();
    });

// Set Bookmark button attribute

    var bookmarkButton = $(".bookmark");

    if (bookmarkButton.data('bookmark-state') == 0) {
        bookmarkButton.removeClass('bookmark-added');
    } else if (bookmarkButton.data('bookmark-state') == 1) {
        bookmarkButton.addClass('bookmark-added');
    }

    bookmarkButton.on("click", function() {
        if (bookmarkButton.data('bookmark-state') == 0) {
            bookmarkButton.data('bookmark-state', 1);
            bookmarkButton.addClass('bookmark-added');
        } else if (bookmarkButton.data('bookmark-state') == 1) {
            bookmarkButton.data('bookmark-state', 0);
            bookmarkButton.removeClass('bookmark-added');
        }
    });

    if ($('body').hasClass('navigation-fixed-bottom')){
        $('#page-content').css('padding-top',$('.navigation').height());
    }

//  Masonry grid listing

    if($('.property').hasClass('masonry')){
        var container = $('.grid');
        container.imagesLoaded( function() {
            container.masonry({
                gutter: 15,
                itemSelector: '.masonry'
            });
        });
        if ($(window).width() > 991) {

            $('.masonry').hover(function() {
                    $('.masonry').each(function () {
                        $('.masonry').addClass('masonry-hide-other');
                        $(this).removeClass('masonry-show');
                    });
                    $(this).addClass('masonry-show');
                }, function() {
                    $('.masonry').each(function () {
                        $('.masonry').removeClass('masonry-hide-other');
                    });
                }
            );

            var config = {
                after: '0s',
                enter: 'bottom',
                move: '20px',
                over: '.5s',
                easing: 'ease-out',
                viewportFactor: 0.33,
                reset: false,
                init: true
            };
            window.scrollReveal = new scrollReveal(config);
        }
    }

//  Magnific Popup

    var imagePopup = $('.image-popup');
    if (imagePopup.length > 0) {
        imagePopup.magnificPopup({
            type:'image',
            removalDelay: 300,
            mainClass: 'mfp-fade',
            overflowY: 'scroll'
        });
    }

//  iCheck

    if ($('.checkbox').length > 0) {
        $('input').iCheck();
    }

    if ($('.radio').length > 0) {
        $('input').iCheck();
    }

//  Pricing Tables in Submit page

    if($('.submit-pricing').length >0 ){
        $('.btn').click(function() {
                $('.submit-pricing .buttons td').each(function () {
                    $(this).removeClass('package-selected');
                });
                $(this).parent().css('opacity','1');
                $(this).parent().addClass('package-selected');

            }
        );
    }

    centerSearchBox();

});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// On RESIZE
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(window).on('resize', function(){
    setNavigationPosition();
    setCarouselWidth();
    equalHeight('.equal-height');


});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// On LOAD
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$(window).load(function(){

//  Show Search Box on Map

    $('.search-box.map').addClass('show-search-box');

//  Show All button

    showAllButton();

//  Show counter after appear

    var $number = $('.number');
    if ($number.length > 0 ) {
        $number.waypoint(function() {
            initCounter();
        }, { offset: '100%' });
    }

    agentState();

//  Owl Carousel

    // Disable click when dragging
    function disableClick(){
        $('.owl-carousel .property').css('pointer-events', 'none');
    }
    // Enable click after dragging
    function enableClick(){
        $('.owl-carousel .property').css('pointer-events', 'auto');
    }

    if ($('.owl-carousel').length > 0) {
        if ($('.carousel-full-width').length > 0) {
            setCarouselWidth();
        }
        $(".featured-properties-carousel").owlCarousel({
            items: 5,
            itemsDesktop: [1700,4],
            responsiveBaseWidth: ".featured-properties-carousel",
            pagination: false,
            startDragging: disableClick,
            beforeMove: enableClick
        });
        $(".testimonials-carousel").owlCarousel({
            items: 1,
            responsiveBaseWidth: ".testimonial",
            pagination: true
        });
        $("#text-banner").owlCarousel({
            autoPlay: 10000,
            items: 1,
            responsiveBaseWidth: ".text-slide",
            transitionStyle : 'fade',
            pagination: false
        });
        $(".property-carousel").owlCarousel({
            items: 1,
            responsiveBaseWidth: ".property-slide",
            pagination: false,
            autoHeight : true,
            navigation: true,
            navigationText: ["",""],
            startDragging: disableClick,
            beforeMove: enableClick
        });
        $(".homepage-slider").owlCarousel({
            autoPlay: 10000,
            navigation: true,
            mouseDrag: false,
            items: 1,
            responsiveBaseWidth: ".slide",
            pagination: false,
            transitionStyle : 'fade',
            navigationText: ["",""],
            afterInit: sliderLoaded,
            afterAction: animateDescription,
            startDragging: animateDescription
        });
    }
    function sliderLoaded(){
        $('#slider').removeClass('loading');
        document.getElementById("loading-icon").remove();
    }
    function animateDescription(){
        var $description = $(".slide .overlay .info");
        $description.addClass('animate-description-out');
        $description.removeClass('animate-description-in');
        setTimeout(function() {
            $description.addClass('animate-description-in');
        }, 400);
    }


});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Functions
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Set height of the map

function setMapHeight(){
    var $body = $('body');
    if($body.hasClass('has-fullscreen-map')) {
        $('#map').height($(window).height() - $('.navigation').height());
    }
    if($body.hasClass('has-fullscreen-map')) {
        $(window).on('resize', function(){
            $('#map').height($(window).height() - $('.navigation').height());
            var mapHeight = $('#map').height();
            var contentHeight = $('.search-box').height();
            var top;
            top = (mapHeight / 2) - (contentHeight / 2);
            $('.search-box-wrapper').css('top', top);
        });
    }
    if ($(window).width() < 768) {
        $('#map').height($(window).height() - $('.navigation').height());
    }
}

function setNavigationPosition(){
    $('.nav > li').each(function () {
        if($(this).hasClass('has-child')){
            var fullNavigationWidth = $(this).children('.child-navigation').width() + $(this).children('.child-navigation').children('li').children('.child-navigation').width();
            if(($(this).children('.child-navigation').offset().left + fullNavigationWidth) > $(window).width()){
                $(this).children('.child-navigation').addClass('navigation-to-left');
            }
        }
    });
}

// Agent state - Fired when user change the state if he is agent or doesn't

function agentState(){
    var _originalHeight = $('#agency .form-group').height();
    var $agentSwitch = $('#agent-switch');
    var $agency = $('#agency');

    if ($agentSwitch.data('agent-state') == 'is-agent') {
        $agentSwitch.iCheck('check');
        $agency.removeClass('disabled');
        $agency.addClass('enabled');
        $agentSwitch.data('agent-state', '');
    } else {
        $agentSwitch.data('agent-state', 'is-agent');
        $agency.removeClass('enabled');
        $agency.addClass('disabled');
    }
}

function initCounter(){
    $('.number').countTo({
        speed: 3000,
        refreshInterval: 50
    });
}

function showAllButton(){
    var rowsToShow = 2; // number of collapsed rows to show
    var $layoutExpandable = $('.layout-expandable');
    var layoutHeightOriginal = $layoutExpandable.height();
    if( layoutHeightOriginal > 225 ) {
        $layoutExpandable.height( $('.layout-expandable .row .property').height()*rowsToShow+50 );
        $('.show-all').css('display', 'block');
        $('.show-all').on("click", function() {
            if ($layoutExpandable.hasClass('layout-expanded')) {
                $layoutExpandable.height($('.layout-expandable .row .property').height()*rowsToShow+50);
                $layoutExpandable.removeClass('layout-expanded');
                $('.show-all').removeClass('layout-expanded');
            } else {
                $layoutExpandable.height(layoutHeightOriginal);
                $layoutExpandable.addClass('layout-expanded');
                $('.show-all').addClass('layout-expanded');
            }
        });
    }


}

//  Center Search box Vertically

function centerSearchBox() {
    var $searchBox = $('.search-box-wrapper');
    var $navigation = $('.navigation');
    var positionFromBottom = 20;
    if ($('body').hasClass('navigation-fixed-top')){
        $('#map, #slider').css('margin-top',$navigation.height());
        $searchBox.css('z-index',98);
    } else {
        $('.leaflet-map-pane').css('top',-50);
        $(".homepage-slider").css('margin-top', -$('.navigation header').height());
    }
    if ($(window).width() > 768) {
        $('#slider .slide .overlay').css('margin-bottom',$navigation.height());
        $('#map, #slider').each(function () {
            if (!$('body').hasClass('horizontal-search-float')){
                var mapHeight = $(this).height();
                var contentHeight = $('.search-box').height();
                var top;
                if($('body').hasClass('has-fullscreen-map')) {
                    top = (mapHeight / 2) - (contentHeight / 2);
                }
                else {
                    top = (mapHeight / 2) - (contentHeight / 2) + $('.navigation').height();
                }
                $('.search-box-wrapper').css('top', top);

            } else {
                $searchBox.css('top', $(this).height() + $navigation.height() - $searchBox.height() - positionFromBottom);
                $('#slider .slide .overlay').css('margin-bottom',$navigation.height() + $searchBox.height() + positionFromBottom);
                if ($('body').hasClass('has-fullscreen-map')) {
                    $('.search-box-wrapper').css('top', $(this).height() - $('.navigation').height());
                }
            }
        });
    }
}

// Set Owl Carousel width

function setCarouselWidth(){
    $('.carousel-full-width').css('width', $(window).width());
}

// Show rating form

function showRatingForm(){
    $('.rating-form').css('height', $('.rating-form form').height() + 85 + 'px');
}

//  Equal heights

function equalHeight(container){

    var currentTallest = 0,
        currentRowStart = 0,
        rowDivs = new Array(),
        $el,
        topPosition = 0;
    $(container).each(function() {

        $el = $(this);
        $($el).height('auto');
        topPostion = $el.position().top;

        if (currentRowStart != topPostion) {
            for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
                rowDivs[currentDiv].height(currentTallest);
            }
            rowDivs.length = 0; // empty the array
            currentRowStart = topPostion;
            currentTallest = $el.height();
            rowDivs.push($el);
        } else {
            rowDivs.push($el);
            currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
        }
        for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
            rowDivs[currentDiv].height(currentTallest);
        }
    });
}

//  Creating property thumbnails in the footer

function drawFooterThumbnails(data){

    var i = 0;
    var rows = 1; // how many rows to display, default = 1
    var thumbnailsPerRow = 1; // how many thumbnails per row to display, default = 1

    // Create thumbnail function
    function createThumbnail() {
        for (i = 0; i < rows * thumbnailsPerRow; i++) {
            if( data['item_data'][i] ){
                $('.footer-thumbnails').append("<div class='property-thumbnail'><a href='?page=item-detail&item=" + data['item_data'][i]['item_id'] + "'><img src="  + data['item_data'][i]['image'] + "></a></div>");
            }
            var $thumbnail = $('.footer-thumbnails .property-thumbnail');
            $thumbnail.css('width', 100/thumbnailsPerRow + '%');
        }
    }

    if ($(window).width() < 768) {
        rows = 1;
        thumbnailsPerRow = 5;
        //createThumbnail();
    } else if ($(window).width() >= 768 && $(window).width() < 1199 ) {
        rows = 1;
        thumbnailsPerRow = 10;
        createThumbnail();
    } else if ($(window).width() >= 1200) {
        rows = 1;
        thumbnailsPerRow = 20;
        createThumbnail();
    }
}
