/*
    Script Description
    ---------------------------------------------------
    Global logic for the entire Marketplace application
    ---------------------------------------------------
*/
!function($,doc) {
    
    //Extend jquery
    $.extend($.gritter.options, {
        position: 'bottom-left', // defaults to 'top-right' but can be 'bottom-left', 'bottom-right', 'top-left', 'top-right' (added in 1.7.1)
        fade_in_speed: 'medium', // how fast notifications fade in (string or int)
        fade_out_speed: 2000, // how fast the notices fade out
        time: 6000 // hang on the screen for...
    });
    
    //Set global ajax callback to check for redirects
    //var origOpen = XMLHttpRequest.prototype.open;
    //XMLHttpRequest.prototype.open = function(method, requestedURL) {
    //    this.addEventListener('load', function() {
    //        //If the request was redirected
    //        if (this.responseURL != requestedURL) {
    //            $.gritter.add({
    //                title: 'Oops',
    //                text: 'Please login to complete this action',
    //                position: 'bottom-right'
    //            });
    //        }
    //    });
    //    origOpen.apply(this, arguments);
    //};
    //
    //Set the global callback for ajax requests made with the request lib
    //iim.request.defaults({
    //    callback: function (response) {
            
            //Handle notification messages from the server
            //if (typeof response.message !== 'undefined') {
            //
            //    var title = 'Success';
            //
            //    if (!response.success) {
            //        title = 'Oops!';
            //    }
            //
            //    if (typeof response.title !== 'undefined') {
            //        title = response.title;
            //    }
            //
            //    $.gritter.add({
            //        title: title,
            //        text: response.message,
            //        position: 'bottom-right'
            //    });
            //
            //}
            
            //Updating cart preview when a product is added
            //if (typeof response.cartPreview !== 'undefined') {
            //    $('#cart-preview').html(response.cartPreview);
            //}
            
            //Cart review (in checkout proccess)
            //if (typeof response.cartReview !== 'undefined') {
            //    if ($('#cart-review').length) {
            //        $('#cart-review').html(response.cartReview);
            //    }
            //}
            
            //If there are no products in the cart then hide the "Proceed to Shipping" button
            //if ($('#cart-review tr').length > 2) {//There are 2 rows in the table by default
            //    $("#previewPageNext").removeClass('hide');
            //} else {
            //    $("#previewPageNext").addClass('hide');
            //}
            
            //Redirect request from the server
            //if (typeof response.redirect !== 'undefined') {
            //    window.location = response.redirect
            //}
            
            //Ajax call request from the server
            //if (typeof response.ajax !== 'undefined') {
            //    iim.request.ajax(response.ajax, {}, function() {});
            //}

        //}
    //
    //});
    
    //The default ajax requests for every page load
    $(doc).ready(function() {
        
       /*
            Fetch the cart preview
       */
       //$.get(baseURL + 'merchandise/ajax/fetchCartPreview', function(response) {
       //
       //     if (typeof response.cartPreview !== 'undefined') {
       //
       //         $('#cart-preview').html(response.cartPreview);
       //
       //     }
       //
       // },'json');
        
        /*
            Fetch cart preview if there is a preview table on the current page
            NOTE: this is used in the checkout process
        */
        //if ($('#cart-review').length) {
        //
        //    $.get(baseURL + 'merchandise/ajax/fetchCartReview', function(response) {
        //
        //        if (typeof response.cartReview !== 'undefined') {
        //            $('#cart-review').html(response.cartReview);
        //        }
        //
        //    },'json');
        //
        //}
        
        /*
            Automatically submit quantity input forms
            when a quantity field is updated
        */
        $('body').on('keyup', '.product-quantity-input', function() {
            var self = $(this);
            
            if (self.val() == '') {
                return false;
            }
            
            self.closest('form').submit();
        });
    
    });
    
}(jQuery,document);

$(document).ready(function() {

    $('.cart').popover({
        html : true,
        container: 'body',
        animation:false,
        trigger: 'manual',
        content: function() {
            var cart = $('.cart-content').clone();
            cart.removeClass('hide');
            return cart.html();
        }
    }).on("mouseenter", function () {
        var that = this;
        $(this).popover("show");
        $(".popover").on("mouseleave", function () {
            $(that).popover('hide');
        });
    }).on("mouseleave", function () {
        var that = this;
        setTimeout(function () {
            if (!$(".popover:hover").length) {
                $(that).popover("hide")
            }
        }, 100);
    });

    //$('[data-toggle="popover"]').each(function () {
    //    var button = $(this);
    //    button.popover().on('shown.bs.popover', function() {
    //        button.data('bs.popover').tip().find('[data-dismiss="popover"]').on('click', function () {
    //            button.popover('hide');
    //        });
    //    });
    //});


    $(document).ready(function() {
        var stripe = $("#stripe"),
            handler = false;

        stripe.prop('disabled', false);

        stripe.on('click', function(e) {
            e.preventDefault();
            var that = $(this),
                name = that.data('name'),
                key = that.data('key'),
                amount = that.data('amount');

            if(handler === false) {
                handler = StripeCheckout.configure("customButtonA", {
                    key: key,
                    token: function(token, args){
                        var $input = $('<input type=hidden name=stripeToken />').val(token.id);
                        $('form').append($input).submit();
                    }
                });
            }

            stripe.prop('disabled', true);

            setTimeout(function () {
                stripe.prop('disabled', false);
            }, 3000); // Sets a short timeout

            handler.open({
                amount: amount,
                name: name
            });
        });

        $('#points').on('click', function(e) {
            e.preventDefault();
            $('form').submit();
        });


        $(".update-quantities").on('click', function(e) {
            e.preventDefault();
            var that = $(this),
                input = $('<input type="hidden" name="updateQauntities" />').val(1);

            that.addClass('fa-spin');
            $('form').append(input).submit();
        });

        $('.no-bullets li > strong, .no-bullets li .collapse-indicator').click(function(e){
            var that = $(this);
            var collapseControl = (e.target.className === 'collapse-indicator' ? that : that.parent().find('.collapse-indicator'));
            that.parent().find('div').slideToggle(function(){
                if(that.parent().find('div').is(':visible')) {
                    collapseControl.html('<i class="fa fa-fw fa-minus"></i>');
                } else {
                    collapseControl.html('<i class="fa fa-fw fa-plus"></i>');
                }
            });
        });

    });


    $(document).on("hidden.bs.modal", "#transactionModal", function (e) {
        $(e.target).removeData("bs.modal").find(".modal-content").empty();
    });
    $('.modal').on('show.bs.modal', function () {
        $('.modal .modal-body').css('overflow-y', 'auto');
        $('.modal .modal-body').css('max-height', $(window).height() * 0.7);
    });
    if($('.cart-description').length > 0) {
        $('.cart-description').each(function(index, value) {
            $clamp($(value)[0], {clamp: 4});
        });
    }
    //$('body').on('click', '.cart-close', function(){
    //    $('.cart').popover('toggle');
    //});
    $('#list').click(function(event){
        event.preventDefault();
        $('.reward-list .item').addClass('list-group-item');
    });

    $('#grid').click(function(event){
        event.preventDefault();
        $('.reward-list .item').removeClass('list-group-item');
        $('.reward-list .item').addClass('grid-group-item');
    });
});