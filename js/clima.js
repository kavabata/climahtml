function getClimaColor() {
  var color = 'fafafa';
  if (config.climat.temperature.min > temperature) {
    color = '#63A9E4';
  } else if (config.climat.temperature.max > temperature) {
    color = '#06e404';
  } else if (config.climat.temperature.extreme > temperature) {
    color = '#e4dd50';
  } else {
    color = '#E4002B';
  }
  return color;
}

function setClima() {
  $("#temperature-chart").insertFusionCharts({
    type: "thermometer",
    width: "300",
    height: "220",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "editmode": "0",
        "lowerLimit": "10",
        "upperlimit": "40",
        "decimals": "1",
        "numberSuffix": "°C",
        "showhovereffect": "1",
        "thmFillColor": getClimaColor(),
        "thmOriginX": "100",
        "bgcolor": "FFFFFF",
        "showborder": "0",
      },
      "value": temperature
    }
  });

  $("#humidity-chart").insertFusionCharts({
    type: "angulargauge",
    width: "400",
    height: "200",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "editmode": "0",
        "lowerlimit": "0",
        "upperlimit": "100",
        "bgcolor": "FFFFFF",
        "showborder": "0",
        "gaugestartangle": "180",
        "gaugeendangle": "0",
        "manageresize": "0",
        "showValue": "1"
      },
      "colorrange": {
        "color": [
          {
            "minvalue": "0",
            "maxvalue": "50",
            "code": "91A3A1"
          },
          {
            "minvalue": "50",
            "maxvalue": "75",
            "code": "387AA3"
          },
          {
            "minvalue": "75",
            "maxvalue": "100",
            "code": "0300A3"
          }
        ]
      },
      "dials": {
        "dial": [
          {
            "editmode": "0",
            "value": humidity,
            "rearextension": "40"
          }
        ]
      }
    }
  });
}


function updateClima() {
  $("#temperature-chart").updateFusionCharts({
    dataSource: {
      "chart": {
        "editmode": "0",
        "lowerLimit": "10",
        "upperlimit": "40",
        "decimals": "1",
        "numberSuffix": "°C",
        "showhovereffect": "1",
        "thmFillColor": getClimaColor(),
        "thmOriginX": "100",
        "bgcolor": "FFFFFF",
        "showborder": "0",
      },
      "value": temperature
    }
  });

  $("#humidity-chart").updateFusionCharts({
    dataSource: {
      "chart": {
        "editmode": "0",
        "lowerlimit": "0",
        "upperlimit": "100",
        "bgcolor": "FFFFFF",
        "showborder": "0",
        "gaugestartangle": "180",
        "gaugeendangle": "0",
        "manageresize": "0",
        "showValue": "1"
      },
      "colorrange": {
        "color": [
          {
            "minvalue": "0",
            "maxvalue": "50",
            "code": "91A3A1"
          },
          {
            "minvalue": "50",
            "maxvalue": "75",
            "code": "387AA3"
          },
          {
            "minvalue": "75",
            "maxvalue": "100",
            "code": "0300A3"
          }
        ]
      },
      "dials": {
        "dial": [
          {
            "editmode": "0",
            "value": humidity,
            "rearextension": "40"
          }
        ]
      }
    }
  });
}
jQuery('document').ready(function () {
  setClima();

  $('.temperature_status .config').on('click',function(){
    $("#dialog").load('clima.php', function(){
      $( "#dialog" ).dialog({
        width: 450,
        modal: true,
        title: 'Climat Configuration'
      });
    })
  });
});