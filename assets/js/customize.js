(function ($){

    /**
     * Woocommerce
     * Order Products
     * @click
     */
    $(document).on('click', '.sort-list a', function(e){
        e.stopPropagation();
        var $id = $(this).attr('data-orderby');

        $('.sort-lis').find('.active').removeClass('active');
        $(this).addClass('active');

        $('.woocommerce-ordering select').val($id);
        $('.woocommerce-ordering select').trigger('change');

        return false;
    });


    /**
     * Fancybox Form
     * @click
     */
    $(document).on('click', '.modalForm', function(e){

        var type = $(this).data('type');

        if( ! $(this).hasClass('disabled')) {
            var $this   =   $(this),
                type    =   $this.data('type'),
                data    =   {
                    action  :   'fancybox_form',
                    type    :   type,
                    product :  $this.data('product')
                };

            $this.addClass('disabled');

            $.ajax( {
                beforeSend  :   function(xhr){
                    $this.block({ message : '', overlayCSS : { background : '#fff', opacity : 0.6 } });
                },
                data        :   data,
                dataType    :   'html',
                method      :   'POST',
                headers     :   {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                complete    :   function(){
                    $this.removeClass('disabled');
                    $this.unblock();
                },
                success     :   function( data ){

                    $.fancybox.close();
                    $.fancybox.open({
                        type: "html",
                        src: data,
                        opts : {
                            afterShow : function( instance, current ) {
                                var wpcf7_form = document.getElementsByClassName('wpcf7-form');
                                [].forEach.call(wpcf7_form, function( form ) {
                                    wpcf7.initForm( form );
                                });
                            }
                        }
                    });

                },
                url         :   ajax_fancybox_object.ajaxurl
            } );


        }

        e.preventDefault();

    });


    /**
     * Contact Form 7
     * @before-send
     */
    $(document).on('submit', '.wpcf7-form', function (event) {
        var $frm = $(this),
            $btn = $frm.find('[type="submit"]'),
            txt = $btn.data('preload');

        $btn.find('span').addClass('hidden');
        $btn.append('<span class="loaded">' + txt + ' <b class="btn__loading"><i>.</i><i>.</i><i>.</i></b></span>');
        $frm.find('input,button,select,textarea,checkbox').addClass('disabled');
    });

    /**
     * Contact Form 7
     * @after-send
     */
    document.addEventListener('wpcf7submit', function (event) {
        var $submit = $('#' + event.detail.id).find('[type="submit"]'),
            $form = $('#' + event.detail.id);
        $submit.find('.loaded').remove();
        $submit.find('.hidden').removeClass('hidden');
        $submit.removeClass('disabled');
        $form.find('input,button,select,textarea')
            .removeClass('disabled');
    });

    /**
     * Contact Form 7
     * @mailsent
     */
    document.addEventListener('wpcf7mailsent', function (event) {
        $.fancybox.close(true);
        $.fancybox.open('' +
            '<div class="popup thanks">' +
            '<div class="popup__header">' +
            '<h3 class="popup__header-title">Спасибо!</h3>' +
            '</div>' +
            '<div class="popup__content">' +
            '<p style="margin: 0;padding: 0">Ваше сообщение успешно отправлено.</p>' +
            '</div>' +
            '<div class="popup__footer">' +
            '<a href="#close" class="aside-btn" data-fancybox-close>Закрыть</a>' +
            '</div>' +
            '</div>'
        );

        $('body').removeAttr('class');
        $('.overlay').remove();
    });

})(jQuery);