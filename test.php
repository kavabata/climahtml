<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

//include('latestshot.php');
//include('db.php');


$mode = 'home';
include "include/common.php";


$box_id = 1;
include('header.php');
?>

<div id="dialog"></div>

<input type="button" class="openBoxConfig" value="Open Form" data-id="1">
<input type="button" class="openBoxConfig" value="Open Form" data-id="2">
<input type="button" class="openBoxConfig" value="Open Form" data-id="3">
<input type="button" class="openBoxConfig" value="Open Form" data-id="4">
<script>

    $(".openBoxConfig").on('click',function(){
      var box_id = $(this).data('id');
      $("#dialog").load('box.php?box=' + box_id, function(){
        $( "#dialog" ).dialog({
          width: 450,
          modal: true,
          title: 'Box Configuration: ' + box_id + ' ['
          + config.box.name[box_id] + ']'
        });
      })
    });

</script>
<?php include('footer.php');