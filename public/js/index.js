$(document).ready(function(){
    $('#search').click(function(){
        var keyword = $('#keyword').val();
        var action = $('#action').val();
        location.href = action + '/' + keyword;           
    });
    
    $(document).keydown(function(event){
        if(event.keyCode ==13){
            $('#search').trigger('click');
        }
    });
});

