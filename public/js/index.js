$(document).ready(function(){
    $('#search').click(function(){
        var keyword = $('#keyword').val();
        var action = $('#action').val();
        if (keyword !== undefined && $.trim(keyword) != '') {
            location.href = action + '/' + keyword;  
        }         
    });
    
    $(document).keydown(function(event){
        if(event.keyCode ==13){
            $('#search').trigger('click');
        }
    });
    
    $('#search').mouseenter(function() {
        $('#keyword').css('border', '1px solid #dcdcdc');
    });
    
    $('#search').mouseleave(function() {
        $('#keyword').css('border', '0px');
    });    
});

