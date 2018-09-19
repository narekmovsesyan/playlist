$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.save-playlist').on( "click", function() {
        $('#video source').remove();
        $('.all-songs-ul li').remove();

        $('.error-info').hide();

            var playlist = [];

        $.map($('.checked-genre :selected'), function(e) {
            if(parseInt($(e).text()) !== 0){
                playlist.push({genre_id:$(e.parentNode).data('id'), points:$(e).text()});
            }
        });

        if(playlist.length === 0){
            $('.error-info').show();
        }

        $.ajax({
            method: "POST",
            dataType : 'json',
            url: "/store-playlist",
            data: { playlist: playlist },

            success: function(data) {
                var count = 0;
                var video = document.getElementById('video');
                var source = document.createElement('source');

                console.log('data');
                console.log(data['music_playlist']);

                if (data['music_playlist'][0]) {
                    $.each(data['music_playlist'][0], function( key, value ) {

                        source.setAttribute('src', '/videos/'+value);

                        video.pause();
                        video.appendChild(source);
                        video.load();
                        video.play();
                    });
                }

                $.each(data['music_playlist'], function( key, value ) {
                    $.each(value, function( index2, value2 ) {
                        count++;
                        if(count === 1){
                            $('.all-songs-ul').append('<li class="list-group-item active-song" data-path="'+value2+'" id="'+key+'">'+count+" "+index2+'</li>');
                        } else {
                            $('.all-songs-ul').append('<li class="list-group-item" data-path="'+value2+'" id="'+key+'">'+count+" "+index2+'</li>');
                        }
                    });
                });
            }
        });
    });

    var countForLi = 0;
    var video = document.getElementById('video');
    var source = document.createElement('source');

    function Player() {
        ++countForLi;

        var firstLi,
            fileName;

        var allLiCount = $(".all-songs-ul li").length;
        var activeLi = $('.all-songs-ul li.active-song').removeClass('active-song');

        $('#video source').remove();

        if (countForLi !== allLiCount) {

            activeLi.next('li').addClass('active-song');
            fileName = activeLi.next().data('path');

        } else {

            firstLi = $(".all-songs-ul li").first().addClass('active-song');
            fileName = firstLi.data("path");

            countForLi = 0;
        }

        source.setAttribute('src', '/videos/'+fileName);

        video.pause();
        video.appendChild(source);
        video.load();
        video.play();

    }

    // change song when click next button
    $('#buttonFfw').on('click', Player);

    // autoplay next song after finished preview
    video.addEventListener('ended', Player);

});

