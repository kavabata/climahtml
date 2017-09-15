<?php

include "include/common.php";

$box_id = !empty($_REQUEST['id']) && is_numeric($_REQUEST['id']) && $_REQUEST['id'] <=4 ?
	$_REQUEST['id'] : 1;

if (!empty($_POST)) {
	if (isset($_POST['status'])) {
		$config->update('box.water.status.' . $box_id, (int)$_POST['status']);
	}
	if (isset($_POST['time'])) {
		$config->update('box.water.time.' . $box_id, (int)$_POST['time']);
	}
	if (isset($_POST['limit'])) {
		$config->update('box.water.limit.' . $box_id, (int)$_POST['limit']);
	}
	if (isset($_POST['manual'])) {
		$config->update('box.water.manual.' . $box_id, (int)$_POST['manual']);
	}
	die('success');
}
?>
<form id="dialogForm" class="dialogConfigForm">
	<input type="hidden" name="id" value="<?php echo $box_id;?>"/>
	<table border="0" style="width: 400px" cellpadding="5">
		<tr>
			<td>Box Status:</td>
			<td><select name="status">
					<option value="0"
						<?php echo (0 == $config->data['box']['water']['status'][$box_id] ? 'selected' : '');?>>
						Disabled
					</option>
					<option value="1"
						<?php echo (1 == $config->data['box']['water']['status'][$box_id] ? 'selected' : '');?>>
						Enabled
					</option>
				</select>
			</td>
		</tr>

		<tr>
			<td>Water Time/Volume:</td>
			<td><select name="time">
					<?php for($i=0; $i <= 60; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['box']['water']['time'][$box_id] ? 'selected' : '');?>>
							<?php echo $i;?> sec (<?php echo $i * 10;?> ml)
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Water Sensor Limit:</td>
			<td><select name="limit">
					<?php for($i=0; $i <= 100; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['box']['water']['limit'][$box_id] ? 'selected' : '');?>>
							<?php echo $i;?> %
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Water Manual per Day:</td>
			<td><select name="manual">
					<?php for($i=0; $i <= 100; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['box']['water']['manual'][$box_id] ? 'selected' : '');?>>
							<?php if ($i == 0): ?>
								Disabled
							<?php else: ?>
								<?php echo $i;?> sec (<?php echo $i * 10;?> ml)
							<?php endif; ?>
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
	url: 'box.php',
	data: $('#dialogForm').serialize(),
	success: function(data)
	{
	  if (data == 'success') {
		$('#dialog').dialog('close');
        reloadConfig();
//		alert('Box Configuration Saved');
	  } else {
//		alert('Something Goes Wrong');
	  }
	}
  });

  e.preventDefault();
  return false;
});
</script>
