window.onload = function() {
    var search = document.getElementById('search');
    search.onclick = function() {
        var keyword = document.getElementById('keyword').value;
        var action = document.getElementById('action').value;
        location.href = action + '/' + keyword;
    };
};

