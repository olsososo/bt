window.onload = function() {
    var search = document.getElementById('search');
    var form = document.getElementById('f');
    search.onclick = function() {
        var keyword = document.getElementById('keyword');
        location.href = form.getAttribute('action') + keyword;
    };
};

