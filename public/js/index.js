$(document).ready(function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "get",
        success: function (data) {
            console.log(data);
        }
    });    
});

