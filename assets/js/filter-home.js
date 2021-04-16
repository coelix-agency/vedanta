(function ($){
    /**
     * @type {{css: {border: string, cursor: string, padding: number, margin: number, backgroundColor: string, top: string, color: string, left: string, textAlign: string, width: string}, overlayCSS: {background: string, opacity: number}, message: string}}
     */
    var loader = {
        message             :   '',
        overlayCSS          :   {
            background      :   '#fff',
            opacity         :   0.6
        },
        css: {
            padding         :   0,
            margin          :   0,
            width           :   '100%',
            top             :   '0%',
            left            :   '0%',
            textAlign       :   'center',
            color           :   '#000',
            border          :   'none',
            backgroundColor :   'transparent',
            cursor          :   'wait'
        }
    };
    var $form = $('.filterHome');

    /**
     * FilterHome
     * @type {{init: init}}
     */
    var FilterHome = function () {

        /**
         * Install
         * @constructor
         */
        var Install = function () {

            /**
             * @change
             */
            $(document).on('change', '.filterItem [type="checkbox"]', function(e){

                var defUrl = $form.data('action');

                $form.find('[type="submit"]').attr('disabled', false);

                var type = $(this).data('type');

                if ($(this).prop('checked')) {
                    //console.log('checked');
                } else {
                    //console.log('un checked');
                }

                FilterAjax(type);

            });

            /**
             * @change
             */
            $(document).on('change', '.allFilterChecked', function(e){
                var type = $(this).data('type');
                if ($(this).prop('checked')) {
                    $(this).parent().find('input[type="checkbox"]').each(function (index, value){
                        $(this).prop('checked', true);
                    });
                } else {
                    $(this).parent().find('input[type="checkbox"]').each(function (index, value){
                        $(this).prop('checked', false);
                    });
                }
                FilterAjax(type);
            });

            /**
             * @change
             */
            $(document).on('change', '.allFilterUnChecked', function(e){
                if ( ! $(this).prop('checked')) {
                    $(this).parent().find('.allFilterChecked').prop('checked', false);
                }
            });

            /**
             * @change
             */
            $(document).on('change', '#filterItemStock [type="checkbox"]', function(e){
                var $this = $(this),
                    url = $this.val();
                $this.parent().find('.active').removeClass('active');
                $this.addClass('active');

                $form.attr('action', url);

                $this.parent().find('[type="checkbox"]').each(function(index){
                    if(!$(this).hasClass('active')) {
                        $(this).prop( 'checked', false );
                    }
                });

            });

            /**
             * @submit
             */
            $(document).on('submit', '.filterHome', function(event){
                event.preventDefault();
                var url = $(this).attr('action');
                $(this).block(loader);
                window.location.href = url;
            });


        };
        /**
         * Init
         */
        return {
            init: function () {
                Install();
            }
        };
    }();

    /**
     * FilterAjax
     * @constructor
     */
    var FilterAjax = function (type) {

        /**
         * Ajax
         */
        $.ajax( {
            beforeSend  :   function(xhr){
                FilterAjaxLoader(true);
            },
            data        :   $form.serialize() + '&type=' + type,
            dataType    :   'json',
            method      :   'POST',
            headers     :   {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            complete    :   function(){
                FilterAjaxLoader(false);
            },
            success     :   function( data ){

                console.log(data);

                /**
                 * Brand
                 */
                if(type == 'brand') {
                    if (data.data.html.models) {
                        $('#filterItemModels').html(data.data.html.models);
                    };
                    if (data.data.html.price) {
                        $('#filterRangePrice input[name="min"]').val(data.data.html.price.min);
                        $('#filterRangePrice input[name="max"]').val(data.data.html.price.max);
                    };
                };

                /**
                 * Model
                 */
                if(type == 'model') {
                    if (data.data.html.price) {
                        $('#filterRangePrice input[name="min"]').val(data.data.html.price.min);
                        $('#filterRangePrice input[name="max"]').val(data.data.html.price.max);
                    };
                };

            },
            url         :   ajax_filter_home_object.ajaxurl
        } );

    };

    /**
     * FilterAjaxLoader
     * @constructor
     */
    var FilterAjaxLoader = function (status) {

        /**
         * @each
         */
        $form.find('.filter-elem').each(function(index){
           var $this = $(this),
               $item = $(this).find('.filter-item-wrapper');
           if(!$item.hasClass('active')) {
               if(status == true) {
                   $this.block(loader);
               } else if(status == false){
                   $this.unblock();
               }
           }
        });
    }

    /**
     *@return
     */
    FilterHome.init();

})(jQuery);