jQuery(function($){
    /*
     * действие при нажатии на кнопку загрузки изображения
     * вы также можете привязать это действие к клику по самому изображению
     */
    $('.itm_attribute_upload_image_button').click(function(){
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = $(this);
        wp.media.editor.send.attachment = function(props, attachment) {
            $('#attribute_thumbnail').find('img').attr('src', attachment.url);
            $(button).prev().val(attachment.id);
            wp.media.editor.send.attachment = send_attachment_bkp;
        }
        wp.media.editor.open(button);
        return false;
    });
    /*
     * удаляем значение произвольного поля
     * если быть точным, то мы просто удаляем value у input type="hidden"
     */
    $('.itm_remove_attribute_section').click(function(){
        var r = confirm("Уверены?");
        if (r == true) {
            var src = $('#attribute_thumbnail').find('img').attr('data-src');
            $('#attribute_thumbnail').find('img').attr('src', src);
            $(this).prev().prev().val('');
        }
        return false;
    });
});