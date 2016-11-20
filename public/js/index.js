$(document).ready(function(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        async: true,
        dataType: 'json',
        type:"POST",
        url: '/torrents',
        success: function (data) {
            console.log(data);
        }
    });    
});

