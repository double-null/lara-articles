let like = document.getElementsByClassName('like');

for (var i = 0; i < like.length; i++) {
    like[i].onclick = function() {
        let article = this.dataset.article;
        let url = '/articles/like/'+article;
        axios.get(url).then();
    };
}

/*
let comment = document.getElementById('comment-send');

comment.onclick = function (event) {
    event.preventDefault();
    axios.post('/comments/store/', {
        'article_id': document.getElementById('comment-article').value,
        'title': document.getElementById('comment-title').value,
        'content': document.getElementById('comment-content').value,
        '_token': document.getElementsByName('_token')[0].value()
    }).then();
}

 */

$('#comment-send').click(function (event){
    event.preventDefault();
    $.ajax({
            url : '/comments/store/',
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
