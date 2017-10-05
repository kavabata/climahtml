
function reloadConfig() {
  $.get('config.php',function(data) {
    window.config = data.config;
    window.dry = data.dry;
    window.temperature = data.temperature;
    window.humidity = data.humidity;
    window.time = data.time;

    $('#climaTime').html(data.time);

    updateDryBox();
    updateClima();
    updateWater();
  })
}

setInterval(reloadConfig, 10000);



jQuery('document').ready(function () {


  $('#sleep').on('click', function(e){

    var highlighted = $(this).hasClass('highlight');

    $.ajax({
      type: "POST",
      url: 'sleep.php',
      data: {
        status: (highlighted ? 0 : 1)
      },
      success: function(data)
      {
        if (data == true) {
          $('#sleep').addClass('highlight');
        } else {
          $('#sleep').removeClass('highlight');
        }
      }
    });
    e.preventDefault();
    return false;

  });
});
