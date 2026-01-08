

jQuery(document).ready(function ($) {

    console.log('JS loaded');

    $('#new-story-btn').on('click', function () {
        console.log('Button clicked');

        $.post(ajaxData.ajaxUrl, {
            action: 'new_story_post'
        }, function (response) {
            console.log('AJAX response:', response);
            $('#new-story-output').html(response);
        });

    });

});



