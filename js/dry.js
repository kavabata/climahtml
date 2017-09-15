jQuery('document').ready(function () {
  $("#dry-1-chart").insertFusionCharts({
    type: "angulargauge",
    width: "200",
    height: "100",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "editmode": "0",
        "lowerlimit": "0",
        "upperlimit": "100",
        "bgcolor": config.box.color[1],
        "showborder": "0",
        "gaugestartangle": "180",
        "gaugeendangle": "0",
        "manageresize": "0"
      },
      "colorrange": {
        "color": [
          {
            "minvalue": "0",
            "maxvalue": config['box']['water']['limit']['1'],
            "code": "#a34d56"
          },
          {
            "minvalue": config['box']['water']['limit']['1'],
            "maxvalue": parseInt(config['box']['water']['limit']['1']) + parseInt((100 - config['box']['water']['limit']['1'])/2),
            "code": "#a1a350"
          },
          {
            "minvalue": parseInt(config['box']['water']['limit']['1']) + parseInt((100 - config['box']['water']['limit']['1'])/2),
            "maxvalue": "100",
            "code": "#48a35a"
          }
        ]
      },
      "value": dry[1]
    }
  });

  $("#dry-2-chart").insertFusionCharts({
    type: "angulargauge",
    width: "200",
    height: "100",
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
        "gaugestartangle": "280",
      },
      "colorrange": {
        "color": [
          {
            "minvalue": "0",
            "maxvalue": config['box']['water']['limit']['2'],
            "code": "#a34d56"
          },
          {
            "minvalue": config['box']['water']['limit']['2'],
            "maxvalue": parseInt(config['box']['water']['limit']['2']) + parseInt((100 - config['box']['water']['limit']['2'])/2),
            "code": "#a1a350"
          },
          {
            "minvalue": parseInt(config['box']['water']['limit']['2']) + parseInt((100 - config['box']['water']['limit']['2'])/2),
            "maxvalue": "100",
            "code": "#48a35a"
          }
        ]
      },
      "value": dry[2]
    }
  });

  $("#dry-3-chart").insertFusionCharts({
    type: "hled",
    width: "250",
    height: "100",
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
            "maxvalue": config['box']['water']['limit']['3'],
            "code": "#a34d56"
          },
          {
            "minvalue": config['box']['water']['limit']['3'],
            "maxvalue": parseInt(config['box']['water']['limit']['3']) + parseInt((100 - config['box']['water']['limit']['3'])/2),
            "code": "#a1a350"
          },
          {
            "minvalue": parseInt(config['box']['water']['limit']['3']) + parseInt((100 - config['box']['water']['limit']['3'])/2),
            "maxvalue": "100",
            "code": "#48a35a"
          }
        ]
      },
      "value": dry[3]
    }
  });

  $("#dry-4-chart").insertFusionCharts({
    type: "hled",
    width: "250",
    height: "100",
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
            "maxvalue": config['box']['water']['limit']['4'],
            "code": "#a34d56"
          },
          {
            "minvalue": config['box']['water']['limit']['4'],
            "maxvalue": parseInt(config['box']['water']['limit']['4']) + parseInt((100 - config['box']['water']['limit']['4'])/2),
            "code": "#a1a350"
          },
          {
            "minvalue": parseInt(config['box']['water']['limit']['4']) + parseInt((100 - config['box']['water']['limit']['4'])/2),
            "maxvalue": "100",
            "code": "#48a35a"
          }
        ]
      },
      "value": dry[4]
    }
  });
  console.log();
});