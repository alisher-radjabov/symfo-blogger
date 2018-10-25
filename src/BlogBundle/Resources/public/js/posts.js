/**
 * Created by vitalij.bell on 26.10.2017.
 */
$(document).ready(function () {
    $(document).on('click','.navigation li:not(.disabled):not(.active) a',function () {

        $('.posts').css({opacity: 0.5});
        $.ajax({
            type: 'GET',
            url: $(this).attr('href'),
            dataType: 'html',
            success: function (html) {

                $('.posts').html($(html).find('.posts').html());
                $('.posts').css({opacity: 1});
            }
        });

        return false;
    })
});