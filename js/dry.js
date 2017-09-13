jQuery('document').ready(function () {
  $("#dry-1-chart").insertFusionCharts({
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
            "maxvalue": "50",
            "code": "#91A3A1"
          },
          {
            "minvalue": "50",
            "maxvalue": "75",
            "code": "#387AA3"
          },
          {
            "minvalue": "75",
            "maxvalue": "100",
            "code": "#0300A3"
          }
        ]
      },
      "value": dry[1]
    }
  });

  $("#dry-2-chart").insertFusionCharts({
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
            "maxvalue": "50",
            "code": "#91A3A1"
          },
          {
            "minvalue": "50",
            "maxvalue": "75",
            "code": "#387AA3"
          },
          {
            "minvalue": "75",
            "maxvalue": "100",
            "code": "#0300A3"
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
            "maxvalue": "50",
            "code": "#91A3A1"
          },
          {
            "minvalue": "50",
            "maxvalue": "75",
            "code": "#387AA3"
          },
          {
            "minvalue": "75",
            "maxvalue": "100",
            "code": "#0300A3"
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
            "maxvalue": "50",
            "code": "#91A3A1"
          },
          {
            "minvalue": "50",
            "maxvalue": "75",
            "code": "#387AA3"
          },
          {
            "minvalue": "75",
            "maxvalue": "100",
            "code": "#0300A3"
          }
        ]
      },
      "value": dry[4]
    }
  });
});