$(document).ready(function() {
    $('.copy').zclip({
        path: "{{ URL::asset('swf/ZeroClipboard.swf') }}",
        copy: function(){
            return $('.magnet').attr('href');
        }
    });    
});