window.addEventListener('load', function() {
    var onClick = function() {
        $('ul.nav-tabs a.active').removeClass('active');
        $(this).addClass('active');
        $('#forecast-wrap').show();
        $('#add-city-wrap').hide();
        var cityName = $(this).data('name');

        $.ajax({
            url: '/city-data/'+$(this).data('id'),
            type: 'post',
            cache: false,
            success: function (data) {
                if (data.status == 'error') {
                    alert(data.message);
                } else {
                    $('#city-table-name').html(cityName);
                    $('#humidity').html(data.main.humidity);
                    $('#pressure').html(data.main.pressure);
                    $('#temp').html(data.main.temp);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    $('.nav-tabs .city').on( "click", onClick);

    $('#submit').on( "click", function() {
        var cityName = $('#cityName').val();
        var key = $('#key').val();

        $.ajax({
            url: '/add-city/'+cityName+'/'+key,
            type: 'post',
            cache: false,
            success: function (data) {
                if (data.status == 'success') {
                    var newHtml = $('ul.nav-tabs')
                        .data('prototype');
                    newHtml = newHtml.replace(/__id__/g, data.id);
                    newHtml = newHtml.replace(/__name__/g, data.name);
                    $('ul.nav-tabs').append(newHtml);
                    $('.nav-tabs .city:last()').on("click", onClick);
                } else if (data.status == 'error') {
                    alert(data.message);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Server error');
                console.log(jqXHR, textStatus, errorThrown);
            }
        });
    });
});