window.onload = function() {
    var search = document.getElementById('search');
    var form = document.getElementById('f');
    search.onclick = function() {
        var keyword = document.getElementById('keyword').value;
        location.href = form.getAttribute('action') + '/' + keyword;
    };
};

