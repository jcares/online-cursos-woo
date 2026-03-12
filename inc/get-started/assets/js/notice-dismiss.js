jQuery(document).ready(function ($) {
    // When the notice is dismissed
    $(document).on('click', '.online-education-academy-notice .notice-dismiss', function () {
        $.post(ajaxurl, {
            action: 'online_education_academy_dismiss_notice'
        });
    });
});