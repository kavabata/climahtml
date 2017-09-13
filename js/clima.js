jQuery('document').ready(function () {
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
        "thmFillColor": "#008ee4",
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
        "manageresize": "0"
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
});