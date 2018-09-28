$(document).ready(function() {
    var tableSongs = $('.dataTable').DataTable({
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        },
        {
            "targets": [ 5, 6 ],
            "visible": false
        }

        ],
        "order": [[ 1, 'asc' ]]
    });

// for first numbers column
    tableSongs.on( 'order.dt search.dt', function () {
        tableSongs.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

// for add musics in playlist

    $('#example tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );

    $('.addMusic').click( function () {

        var playlistSongs = tableSongs.rows('.selected').data().toArray();
        var songsId = [];

        if(playlistSongs.length > 1) {
            $.map(playlistSongs, function(element) {
                if(element[5] !== 0){
                    songsId.push(element[5]);
                }
            });

        } else {
            if(playlistSongs[0][5] !== 0){
                songsId.push(playlistSongs[0][5]);
            }
        }

        var playlistId = playlistSongs[0][6];

        $.ajax({
            method: "Get",
            url: "/add-music-in-playlist",
            data: { songsId: songsId, playlistId: playlistId},

            success: function(data) {
                if (data['status'] !== 400) {

                $('.successful').show('fast');

                    function refresh(){
                        location.reload();
                        window.scrollTo(0, 0);
                    }
                    setTimeout(refresh, 600);
                }
            }
        });
    } );
});