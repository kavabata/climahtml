jQuery('document').ready(function () {
  $("#water-chart").insertFusionCharts({
    type: "cylinder",
    width: "250",
    height: "200",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "theme": "fint",
        "lowerLimit": "0",
        "upperLimit": water['grow']['total'],
        "lowerLimitDisplay": "Empty",
        "upperLimitDisplay": "Full",
        "numberSuffix": " ml",
        "showValue": "0",
        "chartBottomMargin": "45"
      },
      "value": water['grow']['value']
    }
  });


  $("#water-bloom-chart").insertFusionCharts({
    type: "cylinder",
    width: "250",
    height: "200",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "theme": "fint",
        "lowerLimit": "0",
        "upperLimit": water['bloom']['total'],
        "lowerLimitDisplay": "Empty",
        "upperLimitDisplay": "Full",
        "numberSuffix": " ml",
        "showValue": "0",
        "chartBottomMargin": "45"
      },
      "value": water['bloom']['value']
    }
  });
});
