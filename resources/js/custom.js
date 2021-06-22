setTimeout(function () {
    let view = $('#article').data('view');
    if (view) {
        $.ajax({
            url: '/view',
            type: 'POST',
            dataType: "json",
            data: {
                'article': $('.like').data('article'),
                '_token': $('input[name=_token]').val(),
            },
            success: function (articleObject) {
                $('#article-' + articleObject.data.id + '-info .views-counter')
                    .text(articleObject.data.realtime_views);
            }
        });
    }
}, 5000);

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
        success: function (articleObject) {
            $('#article-'+articleObject.data.id+'-info .likes-counter')
                .text(articleObject.data.realtime_likes);
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
});
