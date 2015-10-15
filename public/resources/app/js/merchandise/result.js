/*
    Script Description
    ---------------------------------------------------
    Product filtering logic for results page
    ---------------------------------------------------
*/
!function($,doc) {
    
    "use strict"
        
     /*
        Being as the search bar is in the header
        and is thereby not placed inside paginator's container
        we need to manually make input known to the paginator
    */
    $('#product-search-bar').keyup(function() {
        $('input[name=rewardTitle]').val($(this).val());
        zewa.paginator.refresh('product-listing');
    });
    
    /*
        Setup the cost input slider
    */
    $("#priceRangeSlider").slider({
        min: 800,
        max: 90000,
        step: 1,
        values: [800, 90000],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue[data-index=" + i + "]").val(ui.values[i]);
            }
            zewa.paginator.refresh('product-listing');
        }
    });
    
    /*
        Update slider when other cost filters are updated
    */
    $("input.sliderValue").keyup(function() {
        var $this = $(this);
        $("#priceRangeSlider").slider("values", $this.data("index"), $this.val());
    });
    
}(jQuery,document);