
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
