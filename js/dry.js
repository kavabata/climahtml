function initDryBox() {
  for (var i = 1; i < 5; i++) {
    if (config.box.water.status[i] == 1) {
      $('#dryChart' + i + ' .unlock').hide();
      $('#dryChart' + i + ' .lock').show();
    } else {
      $('#dryChart' + i + ' .lock').hide();
      $('#dryChart' + i + ' .unlock').show();
    }

    $("#dry-" + i + "-chart").insertFusionCharts({
      type: "angulargauge",
      width: "200",
      height: "110",
      dataFormat: "json",
      dataSource: {
        "chart": {
          "editmode": "0",
          "lowerlimit": "0",
          "upperlimit": "100",
          "bgcolor": config.box.color[i],
          "bgAlpha": "100",
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
              "maxvalue": config['box']['water']['limit'][i],
              "code": "#a34d56"
            },
            {
              "minvalue": config['box']['water']['limit'][i],
              "maxvalue": parseInt(config['box']['water']['limit'][i]) + parseInt((100 - config['box']['water']['limit'][i])/2),
              "code": "#a1a350"
            },
            {
              "minvalue": parseInt(config['box']['water']['limit'][i]) + parseInt((100 - config['box']['water']['limit'][i])/2),
              "maxvalue": "100",
              "code": "#48a35a"
            }
          ]
        },
        "dials": {
          "dial": [
            {
              "editmode": "0",
              "value": dry[i],
              "rearextension": "40"
            }
          ]
        }
      }
    });
  }
}

function updateDryBox() {
  for (var i = 1; i < 5; i++) {
    if (config.box.water.status[i] == 1) {
      $('#dryChart' + i + ' .unlock').hide();
      $('#dryChart' + i + ' .lock').show();
    } else {
      $('#dryChart' + i + ' .lock').hide();
      $('#dryChart' + i + ' .unlock').show();
    }

    $("#dry-" + i + "-chart").updateFusionCharts({
      dataSource: {
        "chart": {
          "editmode": "0",
          "lowerlimit": "0",
          "upperlimit": "100",
          "bgcolor": config.box.color[i],
          "bgAlpha": "100",
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
              "maxvalue": config['box']['water']['limit'][i],
              "code": "#a34d56"
            },
            {
              "minvalue": config['box']['water']['limit'][i],
              "maxvalue": parseInt(config['box']['water']['limit'][i]) + parseInt((100 - config['box']['water']['limit'][i])/2),
              "code": "#a1a350"
            },
            {
              "minvalue": parseInt(config['box']['water']['limit'][i]) + parseInt((100 - config['box']['water']['limit'][i])/2),
              "maxvalue": "100",
              "code": "#48a35a"
            }
          ]
        },
        "dials": {
          "dial": [
            {
              "editmode": "0",
              "value": dry[i],
              "rearextension": "40"
            }
          ]
        }
      }
    });
  }
}

jQuery('document').ready(function () {

  $('.drychart .config').on('click',function(){
    var box_id = $(this).data('id');
    $("#dialog").load('box.php?id=' + box_id, function(){
      $( "#dialog" ).dialog({
        width: 450,
        modal: true,
        title: 'Box Configuration: ' + box_id + ' ['
        + config.box.name[box_id] + ']'
      });
    })
  });

  $('.drychart .lock').on('click',function(){
    var box_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: 'box.php',
      data: {
        id: box_id,
        status: 0
      },
      success: function (data) {
        reloadConfig();
      }
    });
  });

  $('.drychart .unlock').on('click',function(){
    var box_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: 'box.php',
      data: {
        id: box_id,
        status: 1
      },
      success: function (data) {
        reloadConfig();
      }
    });
  });

  $('.drychart .pour').on('click',function(){
    var box_id = $(this).data('id');
    $.ajax({
      type: "POST",
      url: 'pour.php',
      data: {
        id: box_id
      },
      success: function (data) {
        alert(data);
      }
    });
  });

  initDryBox();

});