$(document).ready(function() {
   
   $('#product-search-bar').keyup(function() {
        $('input[name=productTitle]').val($(this).val());
        iim.paginator.refresh('product-listing');
    });
    
    $("#priceRangeSlider").slider({
        min: 800,
        max: 90000,
        step: 1,
        values: [800, 90000],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue[data-index=" + i + "]").val(ui.values[i]);
            }
            iim.paginator.refresh('product-listing');
        }
    });
    
    $("input.sliderValue").keyup(function() {
        var $this = $(this);
        $("#priceRangeSlider").slider("values", $this.data("index"), $this.val());
    });
    
    $('input.sliderValue').keyup();
    
});