$(document).ready(function(){
    $('#search').click(function(){
        var keyword = $('#keyword').val();
        var action = $('#form').attr('action');
        location.href = action + '/' + keyword;           
    });
    
    $(document).keydown(function(event){
        if(event.keyCode ==13){
            $('#search').trigger('click');
        }
    });
});

