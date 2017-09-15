<?php

include "include/common.php";

if (!empty($_POST)) {
	if (isset($_POST['lightonh'])) {
		$config->update('climat.light.on', $_POST['lightonh'] . $_POST['lightonm']);
	}
	if (isset($_POST['lightoffh'])) {
		$config->update('climat.light.off', $_POST['lightoffh'] . $_POST['lightoffm']);
	}
	if (isset($_POST['tempmin'])) {
		$config->update('climat.temperature.min', (int)$_POST['tempmin']);
	}
	if (isset($_POST['tempmax'])) {
		$config->update('climat.temperature.max', (int)$_POST['tempmax']);
	}
	if (isset($_POST['tempextrime'])) {
		$config->update('climat.temperature.extreme', (int)$_POST['tempextrime']);
	}
	if (isset($_POST['hummin'])) {
		$config->update('climat.humidity.min', (int)$_POST['hummin']);
	}
	if (isset($_POST['hummax'])) {
		$config->update('climat.humidity.max', (int)$_POST['hummax']);
	}
	die('success');
}
?>
<form id="dialogForm" class="dialogConfigForm">
	<input type="hidden" name="id" value="<?php echo $box_id;?>"/>
	<table border="0" style="width: 400px" cellpadding="5">
		<tr>
			<td>Enable Light:</td>
			<td><select name="lightonh" style="width: 45%">
					<?php for($i=0; $i <= 23; $i++):?>
						<option value="<?php echo substr('0' . $i, -2);?>"
							<?php echo ($i == substr($config->data['climat']['light']['on'],0,2)? 'selected' : '');?>>
							<?php echo  substr('0' . $i, -2);?>
						</option>
					<?php endfor;?>
				</select>
				<select name="lightonm" style="width: 45%">
					<?php for($i=0; $i <= 59; $i++):?>
						<option value="<?php echo substr('0' . $i, -2);?>"
							<?php echo ($i == substr($config->data['climat']['light']['on'],2,2)? 'selected' : '');?>>
							<?php echo  substr('0' . $i, -2);?>
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Disable Light:</td>
			<td><select name="lightoffh" style="width: 45%">
					<?php for($i=0; $i <= 23; $i++):?>
						<option value="<?php echo substr('0' . $i, -2);?>"
							<?php echo ($i == substr($config->data['climat']['light']['off'],0,2)? 'selected' : '');?>>
							<?php echo  substr('0' . $i, -2);?>
						</option>
					<?php endfor;?>
				</select>
				<select name="lightoffm" style="width: 45%">
					<?php for($i=0; $i <= 59; $i++):?>
						<option value="<?php echo substr('0' . $i, -2);?>"
							<?php echo ($i == substr($config->data['climat']['light']['off'],2,2)? 'selected' : '');?>>
							<?php echo  substr('0' . $i, -2);?>
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Temperature Min:</td>
			<td><select name="tempmin">
					<?php for($i=10; $i <= 40; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['climat']['temperature']['min']? 'selected' : '');?>>
							<?php echo $i;?> °C
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Temperature Max:</td>
			<td><select name="tempmax">
					<?php for($i=10; $i <= 40; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['climat']['temperature']['max']? 'selected' : '');?>>
							<?php echo $i;?> °C
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Temperature Extreme:</td>
			<td><select name="tempextrime">
					<?php for($i=10; $i <= 50; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['climat']['temperature']['extreme']? 'selected' : '');?>>
							<?php echo $i;?> °C
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>

		<tr>
			<td>Humidity Min:</td>
			<td><select name="hummin">
					<?php for($i=10; $i <= 100; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['climat']['humidity']['min']? 'selected' : '');?>>
							<?php echo $i;?> %
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Humidity Max:</td>
			<td><select name="hummax">
					<?php for($i=10; $i <= 100; $i++):?>
						<option value="<?php echo $i;?>"
							<?php echo ($i == $config->data['climat']['humidity']['max']? 'selected' : '');?>>
							<?php echo $i;?> %
						</option>
					<?php endfor;?>
				</select>
			</td>
		</tr

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
      url: 'clima.php',
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
