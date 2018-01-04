$(document).ready(function() {
    $('#table_id').DataTable();
    var _token = $('input[name="_token"]').val();
    $('body').on('click', '.addcontact', function(){
        $.ajax({
            type: "POST",
            url: '/addcontact',
            data: {id: $(this).attr('data-id'), _token : _token },
            success: function() {
                location.reload();
            }
        })        
    });

    $('body').on('click','.acceptrequest', function(){
        $.ajax({
            type: "POST",
            url: '/acceptrequest',
            data: {id: $(this).attr('data-id'), _token : _token },
            success: function() {
                location.reload();
            }
        })            
    });

    $('body').on('click', '.viewcontact', function(){
        $.ajax({
            type: "GET",
            url: '/viewcontact',
            data: {id: $(this).attr('data-id'), _token : _token },
            success: function(response) {
                $('.display-profile').removeClass('hide');
                $('.display-contact').addClass('hide');
                $('.mutualfrnd').empty();
                $.each(response, function (key, val) {
                    $('.profile-name').html(val.name);
                    $('.profile-email').html(val.email);
                    if(val.mutualfriend.length >0){
                        $.each(val.mutualfriend, function(k,v){
                            $('.mutualfrnd').append('<li>'+v.name+'</li>');
                        });   
                    } else {
                        $('.mutualfrnd').append('<li>No mutual Friend</li>');
                    }
                });
            }
        })          
    })

    $('body').on('click','.back-contact', function(){
    $('.display-profile').addClass('hide');
    $('.display-contact').removeClass('hide');        
    });
});