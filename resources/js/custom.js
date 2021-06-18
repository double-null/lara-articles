$('.like').click(function (event) {
    event.preventDefault();
    $.ajax({
        url : '/like',
        type: 'POST',
        dataType : "json",
        data: {
            'article': $(this).data('article'),
            '_token': $('input[name=_token]').val(),
        },
        success: function (data) {
            $('#article-'+data.article+'-info .likes-counter').text(data.likes);
        }
    });
});

$('#comment-send').click(function (event){
    event.preventDefault();
    $.ajax({
        url : '/comments/store',
        type: 'POST',
        dataType : "json",
        headers: {"X-CSRF-TOKEN":$('input[name=_token]').val()},
        data: {
            'article_id': $('#comment-article').val(),
            'title': $('#comment-title').val(),
            'content': $('#comment-content').val(),
            '_token': $('input[name=_token]').val(),
        },
        success: function (data) {
            $('.errors').html('');
            $('#comment-form-block').html('<div class="alert alert-success">Комментарий отправлен успешно</div>');
        },
        error: function (data) {
            $('.errors').html('');
            if( data.status === 422 ) {
                var errors = $.parseJSON(data.responseText)['errors'];
                if ( typeof errors.title !== "undefined") {
                    $('#comment-title-error').html(errors.title[0]);
                }
                if ( typeof errors.content[0] !== "undefined") {
                    $('#comment-content-error').html(errors.content[0]);
                }
            }
        },
    });
})
