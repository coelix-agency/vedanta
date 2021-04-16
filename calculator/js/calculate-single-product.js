var CalculatorSingle = function () {

    /**
     * AjaxFunc
     * @constructor
     */
    var AjaxFunc = function () {

        var $container = $('#calculatorSingle'),
            data = {
            action              : 'calculator',
            type                : 'CalculatorSingle',
            fields              : {
                product_id      : $container.data('product-id'),
                product_price   : $container.data('product-price'),
                product_year    : $container.data('product-year'),
                product_obem    : $container.data('product-obem'),
                product_type    : $container.data('product-type'),
                product_oil    : $container.data('product-oil'),
            }
        };
        $.ajax( {
            beforeSend  :   function(xhr){
                $container.block( { message : '', overlayCSS : { background : '#fff', opacity : 0.6 } } );
            },
            data        :   data,
            dataType    :   'html',
            method      :   'POST',
            headers     :   {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            complete    :   function(){
                $container.unblock();
            },
            success     :   function( data ){

                $container.html(data);

            },
            url         :   ajax_calculator.ajaxurl
        } );
    };

    /**
     * Year Select
     * @change
     */
    $(document).on('change', '#calculatorSingleYear', function(){
        $('#calculatorSingle').data('product-year', $(this).val());
        CalculatorSingle.init();
        return false;
    });

    /**
     * Init
     * @return
     */
    return {
        init: function () {
            AjaxFunc();
        }
    };
}();

jQuery(document).ready(function ($) {

    /**
     * Start Init
     */
    CalculatorSingle.init();

});