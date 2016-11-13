window.onload = function() {
    var search = document.getElementById('search');
    
    function search() {
        var keyword = document.getElementById('keyword').value;
        var action = document.getElementById('action').value;
        location.href = action + '/' + keyword;       
    }
    
    document.keydown(function(event){
        event=document.all ? window.event : event;
        if((event.keyCode || event.which) == 13){
            alert(333);
        }
    }); 
   
    search.onclick = function() {
        var keyword = document.getElementById('keyword').value;
        var form = document.getElementById('form');
        location.href = form.getAttribute('action') + '/' + keyword;
    };
};

