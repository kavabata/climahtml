function getColor(volume, left) {
  var color = "#ffffff";
  if (left / volume < 0.2) {
    color = "#ffb721";
  } else if (left / volume < 0.7) {
    color = "#78d1ff";
  } else {
    color = "#101fff";
  }
  return color;
}
function initWater() {
  $("#water-chart").insertFusionCharts({
    type: "cylinder",
    width: "250",
    height: "390",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "theme": "fint",
        "lowerLimit": "0",
        "upperLimit": config.can.volume[1],
        "lowerLimitDisplay": "Empty",
        "upperLimitDisplay": "Full",
        "numberSuffix": " ml",
        "showValue": "0",
        "chartBottomMargin": "45",
        "showValue": "1",
        "cylFillColor": getColor(config.can.volume[1],config.can.left[1])
      },
      "value":config.can.left[1]
    }
  });
/*
  $("#water-bloom-chart").insertFusionCharts({
    type: "cylinder",
    width: "250",
    height: "180",
    dataFormat: "json",
    dataSource: {
      "chart": {
        "theme": "fint",
        "lowerLimit": "0",
        "upperLimit": config.can.volume[2],
        "lowerLimitDisplay": "Empty",
        "upperLimitDisplay": "Full",
        "numberSuffix": " ml",
        "showValue": "0",
        "chartBottomMargin": "45",
        "showValue": "1",
        "cylFillColor": getColor(config.can.volume[2],config.can.left[2])
      },
      "value": config.can.left[2]
    }
  });*/
}

function updateWater() {
  $("#water-chart").updateFusionCharts({
    dataSource: {
      "chart": {
        "theme": "fint",
        "lowerLimit": "0",
        "upperLimit": config.can.volume[1],
        "lowerLimitDisplay": "Empty",
        "upperLimitDisplay": "Full",
        "numberSuffix": " ml",
        "showValue": "0",
        "chartBottomMargin": "45",
        "showValue": "1",
        "cylFillColor": getColor(config.can.volume[1],config.can.left[1])
      },
      "value":config.can.left[1]
    }
  });
/*
  $("#water-bloom-chart").updateFusionCharts({
    dataSource: {
      "chart": {
        "theme": "fint",
        "lowerLimit": "0",
        "upperLimit": config.can.volume[2],
        "lowerLimitDisplay": "Empty",
        "upperLimitDisplay": "Full",
        "numberSuffix": " ml",
        "showValue": "0",
        "chartBottomMargin": "45",
        "showValue": "1",
        "cylFillColor": getColor(config.can.volume[2],config.can.left[2])
      },
      "value": config.can.left[2]
    }
  });
  */
}

jQuery('document').ready(function () {
  initWater();

  $('.water .config').on('click',function(){
    var box_id = $(this).data('id');
    $("#dialog").load('water.php?id=' + box_id, function(){
      $( "#dialog" ).dialog({
        width: 450,
        modal: true,
        title: 'Water Configuration: ' + box_id
      });
    })
  });
});
