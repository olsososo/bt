window.onload = function() {
    var search = document.getElementById('search');
    
    function next() {
        var keyword = document.getElementById('keyword').value;
        var form = document.getElementById('form');
        location.href = form.getAttribute('action') + '/' + keyword;      
    }
    
    document.onkeydown = function(event){
        event = document.all ? window.event : event;
        if((event.keyCode || event.which) == 13){
            next();
        }
    }; 
   
    search.onclick = next;
};

