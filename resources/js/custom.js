let like = document.getElementsByClassName('like');

for (var i = 0; i < like.length; i++) {
    like[i].onclick = function() {
        let article = this.dataset.article;
        let url = '/articles/like/'+article;
        axios.get(url).then();
    };
}

let comment = document.getElementById('comment-send');

comment.onclick = function (event) {
    event.preventDefault();
    axios.post('/comments/store/', {
        'article_id': document.getElementById('comment-article').value,
        'title': document.getElementById('comment-title').value,
        'content': document.getElementById('comment-content').value
    }).then();
}
