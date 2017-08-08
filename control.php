<?php
include(ini_get('extension_dir') . '/wiringpi.php');

$pin_array = [
    1 => '3.3V',
    2 => '5V',
    3 => [
        'bcm' => 2,
        'wp' => 8,
        'clima' => ''
    ],
    4 => '5V',
    5 => [
        'bcm' => 3,
        'wp' => 9,
        'clima' => ''
    ],
    6 => 'GND',
    7 => [
        'bcm' => 4,
        'wp' => 7,
        'clima' => ''
    ],
    8 => [
        'bcm' => 14,
        'wp' => 15,
        'clima' => 'DRY 1'
    ],
    9 => 'GND',
    10 => [
        'bcm' => 15,
        'wp' => 16,
        'clima' => 'DRY 2'
    ],
    11 => [
        'bcm' => 17,
        'wp' => 0,
        'clima' => ''
    ],
    12 => [
        'bcm' => 18,
        'wp' => 1,
        'clima' => 'DRY 3'
    ],
    13 => [
        'bcm' => 27,
        'wp' => 2,
        'clima' => ''
    ],
    14 => 'GND',
    15 => [
        'bcm' => 22,
        'wp' => 3,
        'clima' => ''
    ],
    16 => [
        'bcm' => 23,
        'wp' => 4,
        'clima' => 'DRY 4'
    ],
    17 => '3.3V',
    18 => [
        'bcm' => 24,
        'wp' => 5,
        'clima' => 'RELE 1'
    ],
    19 => [
        'bcm' => 10,
        'wp' => 12,
        'clima' => ''
    ],
    20 => 'GND',
    21 => [
        'bcm' => 9,
        'wp' => 13,
        'clima' => ''
    ],
    22 => [
        'bcm' => 25,
        'wp' => 6,
        'clima' => 'RELE 2'
    ],
    23 => [
        'bcm' => 11,
        'wp' => 14,
        'clima' => ''
    ],
    24 => [
        'bcm' => 8,
        'wp' => 10,
        'clima' => 'RELE 3'
    ],
    25 => 'GND',
    26 => [
        'bcm' => 7,
        'wp' => 11,
        'clima' => 'RELE 4'
    ],
    27 => [
        'bcm' => 0,
        'wp' => 30,
        'clima' => ''
    ],
    28 => [
        'bcm' => 1,
        'wp' => 31,
        'clima' => 'RELE 5'
    ],
    29 => [
        'bcm' => 5,
        'wp' => 21,
        'clima' => ''
    ],
    30 => 'GND',
    31 => [
        'bcm' => 6,
        'wp' => 22,
        'clima' => ''
    ],
    32 => [
        'bcm' => 12,
        'wp' => 26,
        'clima' => 'RELE 6'
    ],
    33 => [
        'bcm' => 13,
        'wp' => 23,
        'clima' => ''
    ],
    34 => 'GND',
    35 => [
        'bcm' => 19,
        'wp' => 24,
        'clima' => ''
    ],
    36 => [
        'bcm' => 16,
        'wp' => 27,
        'clima' => 'RELE 7'
    ],
    37 => [
        'bcm' => 26,
        'wp' => 25,
        'clima' => ''
    ],
    38 => [
        'bcm' => 20,
        'wp' => 28,
        'clima' => 'RELE 8'
    ],
    39 => 'GND',
    40 => [
        'bcm' => 21,
        'wp' => 29,
        'clima' => 'dht'
    ]
];
$pin = $_GET['pin'];
$action = $_GET['action'] == 'on' ? 1 : 0;


if (!empty($pin_array[$pin])) {
    shell_exec("/usr/local/bin/gpio -g mode " . $pin_array[$pin]['bcm'] . " out");
    var_dump("/usr/local/bin/gpio -g mode " . $pin_array[$pin]['wp'] . " out");
    shell_exec("/usr/local/bin/gpio -g write " . $pin_array[$pin]['bcm'] . " " . $action);
    var_dump("/usr/local/bin/gpio -g write " . $pin_array[$pin]['wp'] . " " . $action);
    $message = 'set';
}
?>
<html>
<head>
    <title>Control GPIO</title>
</head>
<body>
<table cellpadding="5" border="1">
<?php for($pin = 1; $pin <= 40; $pin = $pin+2) {?>
    <tr>
        <td <?php echo !empty($pin_array[$pin]['clima']) ? 'style="background: #fa45f3"':'';?>>
            <?php echo $pin;?>
            <?php echo is_array($pin_array[$pin]) ? $pin_array[$pin]['clima'] : $pin_array[$pin];?><br>
            <?php echo is_array($pin_array[$pin]) ? 'bcm-'.$pin_array[$pin]['bcm'] : $pin_array[$pin];?><br>
            <a href="control.php?pin=<?php echo $pin;?>&action=on">ON</a>
            <a href="control.php?pin=<?php echo $pin;?>&action=off">OFF</a>
        </td>
        <td <?php echo !empty($pin_array[$pin+1]['clima']) ? 'style="background: #3af503"':'';?>>
            <?php echo $pin+1;?>
            <?php echo is_array($pin_array[$pin+1]) ? $pin_array[$pin+1]['clima'] : $pin_array[$pin+1];?><br>
            <?php echo is_array($pin_array[$pin+1]) ? 'bcm-'.$pin_array[$pin+1]['bcm'] : $pin_array[$pin+1];?><br>
            <a href="control.php?pin=<?php echo $pin+1;?>&action=on">ON</a>
            <a href="control.php?pin=<?php echo $pin+1;?>&action=off">OFF</a>

        </td>

    </tr>
<?php } ?>
</table>
</body>
</html>