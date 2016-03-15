$(document).ready(function() {

    //Reward Listings
    $('#list').click(function(event){
        event.preventDefault();
        $('.reward-list .item').addClass('list-group-item');
    });

    $('#grid').click(function(event){
        event.preventDefault();
        var item = $('.reward-list .item');
        item.removeClass('list-group-item').addClass('grid-group-item');
    });

    //Cart

    var stripe = $("#stripe"),
        handler = false,
        cartDescription = $('.cart-description');


    $(".update-quantities").on('click', function(e) {
        e.preventDefault();
        var that = $(this),
            input = $('<input type="hidden" name="updateQauntities" />').val(1);

        that.addClass('fa-spin');
        $('form').append(input).submit();
    });

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

    //FAQ
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

    //Transactions
    $(document).on("hidden.bs.modal", "#transactionModal", function (e) {
        $(e.target).removeData("bs.modal").find(".modal-content").empty();
    });

    //Resize modal to fit within the contents of the window veritcally
    $('.modal').on('show.bs.modal', function () {
        $('.modal .modal-body').css({
            'overflow-y': 'auto',
            'max-height': $(window).height() * 0.7
        });
    });

    //tooltips
    $('[data-toggle="tooltip"]').tooltip();

    $(window).scroll(function(){
        /* Show hide scrolltop button */
        if( $(window).scrollTop() == 0 ) {
            $('.scroll-top').stop(false,true).fadeOut(600);
        }else{
            $('.scroll-top').stop(false,true).fadeIn(600);
        }
    });

    /* scroll top */
    $(document).on('click','.scroll-top',function(){
        $('body,html').animate({scrollTop:0},400);
        return false;
    });


});