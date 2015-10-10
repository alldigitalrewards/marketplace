!function($,doc) {
    
    iim.request.defaults({
        callback: function (response) {
            
            if (typeof response.message !== 'undefined') {
                
                var title = 'Success';
                
                if (!response.success) {
                    title = 'Oops!';
                }
                
                if (typeof response.title !== 'undefined') {
                    title = response.title;
                }
                
                $.gritter.add({
                    title: title,
                    text: response.message
                });
                
            }
            
            //Updating cart preview when a product is added
            if (typeof response.cartPreview !== 'undefined') {
                $('#cart-block').html(response.cartPreview);
            }
            
            //Cart review (in checkout proccess)
            if (typeof response.cartReview !== 'undefined') {
                if ($('#cart-review').length) {
                    $('#cart-review').html(response.cartReview);
                }
            }
            
            //On form validation failure
            if (typeof response.validation !== 'undefined') {
                $.each(response.validation, function(key,message) {
                    $.gritter.add({
                        title: 'Invalid Field',
                        text: message
                    }); 
                });
            }
            
            //If there are no products in the cart then hide the "Proceed to Shipping" button
            if ($('#cart-review tr').length > 2) {//There are 2 rows in the table by default
                $("#previewPageNext").removeClass('hide');
            } else {
                $("#previewPageNext").addClass('hide');
            }
            
            if (typeof response.redirect !== 'undefined') {
                window.location = response.redirect
            }
            
        }
        
    });
    
    $(doc).ready(function() {
        
       $.get(baseURL + 'merchandise/ajax/fetchCartPreview', function(response) {
           
            if (typeof response.cartPreview !== 'undefined') {
                
                $('#cart-block').html(response.cartPreview);
                
            }
            
        },'json'); 
        
        if ($('#cart-review').length) {
            
            $.get(baseURL + 'merchandise/ajax/fetchCartReview', function(response) {
                
                if (typeof response.cartReview !== 'undefined') {
                    $('#cart-review').html(response.cartReview);
                }
                
            },'json');
            
        }
        
        $('body').on('keyup', '.product-quantity-input', function() {
                var self = $(this);
                
                if (self.val() == '') {
                    return false;
                }
                
                self.closest('form').submit();
            });
    
    });
    
}(jQuery,document);