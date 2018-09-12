$( document ).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.save-playlist').on( "click", function() {
        $('#video source').remove();
        $('.all_songs_ul li').remove();

        $('.error_info').hide();

            var playlist = [];

        $.map($('.checked-genre :selected'), function(e) {
            if(parseInt($(e).text()) !== 0){
                playlist.push({genre_id:$(e.parentNode).data('id'), points:$(e).text()});
            }
        });

        if(playlist.length === 0){
            $('.error_info').show();
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

                $.each(data['music_playlist'][0], function( key, value ) {

                    source.setAttribute('src', '/videos/'+value);

                    video.pause();
                    video.appendChild(source);
                    video.load();
                    video.play();
                });

                $.each(data['music_playlist'], function( key, value ) {
                    $.each(value, function( index2, value2 ) {
                        count++;
                        if(count === 1){
                            $('.all_songs_ul').append('<li class="list-group-item active_song" data-path="'+value2+'" id="'+key+'">'+count+" "+index2+'</li>');
                        } else {
                            $('.all_songs_ul').append('<li class="list-group-item" data-path="'+value2+'" id="'+key+'">'+count+" "+index2+'</li>');
                        }
                    });
                });
            }
        });
    });

    var count_for_li = 0;
    var video = document.getElementById('video');
    var source = document.createElement('source');

    function Player() {
        ++count_for_li;

        var first_li,
            file_name;

        var all_li_count = $(".all_songs_ul li").length;
        var active_li = $('.all_songs_ul li.active_song').removeClass('active_song');

        $('#video source').remove();

        if (count_for_li !== all_li_count) {

            active_li.next('li').addClass('active_song');
            file_name = active_li.next().data('path');

        } else {

            first_li = $(".all_songs_ul li").first().addClass('active_song');
            file_name = first_li.data("path");

            count_for_li = 0;
        }

        source.setAttribute('src', '/videos/'+file_name);

        video.pause();
        video.appendChild(source);
        video.load();
        video.play();

    }

    // change song when click next button
    $('#button_ffw').on('click', Player);

    // autoplay next song after finished preview
    video.addEventListener('ended', Player);

});

