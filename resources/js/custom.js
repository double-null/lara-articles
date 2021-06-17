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
        }
    });
})
