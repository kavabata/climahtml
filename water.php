<?php

include "include/common.php";

$box_id = !empty($_REQUEST['id']) && is_numeric($_REQUEST['id']) && $_REQUEST['id'] <=4 ?
	$_REQUEST['id'] : 1;

if (!empty($_POST)) {
	if (isset($_POST['volume'])) {
		$config->update('can.volume.' . $box_id, (int)$_POST['volume']);
	}
	if (isset($_POST['left'])) {
		$config->update('can.left.' . $box_id, (int)$_POST['left']);
	}
	die('success');
}
?>
<form id="dialogForm" class="dialogConfigForm">
	<input type="hidden" name="id" value="<?php echo $box_id;?>"/>
	<table border="0" style="width: 400px" cellpadding="5">
		<tr>
			<td>Can Volume:</td>
			<td><select name="volume">
					<?php for($i=0; $i <= 40; $i++):?>
						<option value="<?php echo $i * 500;?>"
							<?php echo ($i * 500 == $config->data['can']['volume'][$box_id] ? 'selected' : '');?>>
							<?php echo $i * 500;?> ml
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Left Water:</td>
			<td><select name="left">
					<?php for($i=0; $i <= 40; $i++):?>
						<option value="<?php echo $i * 500;?>"
							<?php
							$v = round($config->data['can']['left'][$box_id]/500);
							echo ($i == $v ? 'selected' : '');?>>
							<?php echo $i * 500;?> ml
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>
				<input type="button" class="cancel" value="Cancel" onclick="$('#dialog').dialog('close')">
			</td>
			<td>
				<input type="submit" class="submit" value="Save">
			</td>
		</tr>
	</table>
</form>
<script>
  $('#dialogForm').submit(function(e) {
    $.ajax({
      type: "POST",
      url: 'water.php',
      data: $('#dialogForm').serialize(),
      success: function(data)
      {
        if (data == 'success') {
          $('#dialog').dialog('close');
          reloadConfig();
        } else {
        }
      }
    });

    e.preventDefault();
    return false;
  });
</script>
