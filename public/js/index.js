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
        $(this).css({'border': '1px solid #dcdcdc', 'backround-color': '#F5F5F5'});
    });
    
    $('#search').mouseleave(function() {
        $(this).css({'border': '0px', 'backround-color': '#f2f2f2'});
    });    
});

