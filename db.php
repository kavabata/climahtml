<?php
$db  = new mysqli('127.0.0.1','clima','', 'clima');





$clima_query = "select 
  round(sum(temperature)/count(*), 2) as temperatura,
  round(sum(humidity)/count(*), 2) as humidity,
  concat(substring(date_format(created, '%m/%d %h:%i'), 1, 10), '0') as st 
from temperature 
where created > date_sub(now(), interval 2 day)
group by concat(date_format(created, '%Y-%m-%d %h:'), round(date_format(created, '%i')/20) * 20)
order by created desc
limit 100;";
$clima_result = $db->query($clima_query);
$clima_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => 'Temperature',
            'data' => [],
            'backgroundColor' => ['rgba(255, 99, 132, 0.2)'],
            'borderColor' => ['rgba(255, 159, 64, 1)']
        ],
        1 => [
            'label' => 'Humidity',
            'data' => [],
            'backgroundColor' => ['rgba(255, 206, 86, 0.2)'],
            'borderColor' => ['rgba(75, 192, 192, 1)']
        ],
    ]
];
while ($row = $clima_result->fetch_object()){
    array_push($clima_data['labels'], $row->st);
    array_push($clima_data['datasets'][0]['data'], $row->temperatura);
    array_push($clima_data['datasets'][1]['data'], $row->humidity);
}


$water_query = "select 
 round(100 * sum(sensor_1)/count(*)) as s1,
 round(100 * sum(sensor_1)/count(*)) as s2,
 round(100 * sum(sensor_1)/count(*)) as s3,
 round(100 * sum(sensor_1)/count(*)) as s4,
 concat(substring(date_format(created, '%Y-%m-%d %h:%i'), 1, 15), '0') as st 
from dry
where created > date_sub(now(), interval 2 day)
group by concat(date_format(created, '%Y-%m-%d %h:'), round(date_format(created, '%i')/20) * 20)
order by created desc
limit 100";
$water_result = $db->query($water_query);
$water_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => 'Sensor 1',
            'data' => [],
            'backgroundColor' => ['rgba(255, 99, 132, 0.2)'],
            'borderColor' => ['rgba(255, 159, 64, 1)']
        ],
        1 => [
            'label' => 'Sensor 2',
            'data' => [],
            'backgroundColor' => ['rgba(3, 99, 132, 0.2)'],
            'borderColor' => ['rgba(255, 159, 64, 1)']
        ],
        2 => [
            'label' => 'Sensor 3',
            'data' => [],
            'backgroundColor' => ['rgba(255, 3, 132, 0.2)'],
            'borderColor' => ['rgba(255, 159, 64, 1)']
        ],
        3 => [
            'label' => 'Sensor 4',
            'data' => [],
            'backgroundColor' => ['rgba(255, 206, 3, 0.2)'],
            'borderColor' => ['rgba(75, 192, 192, 1)']
        ],
    ]
];
while ($row = $water_result->fetch_object()){
    array_push($water_data['labels'], $row->st);
    array_push($water_data['datasets'][0]['data'], $row->s1);
    array_push($water_data['datasets'][1]['data'], $row->s2);
    array_push($water_data['datasets'][2]['data'], $row->s3);
    array_push($water_data['datasets'][3]['data'], $row->s4);
}

$light_query = "select 
    max(l.id) as id, 
    l.action, 
    max(l.created) as created,
    l2.message 
from logs l
join logs l2 on l2.id = l.id
group by action;";
$light_result = $db->query($light_query);
$light_data = [];
while ($row = $light_result->fetch_object()){
    if (in_array($row->message, ['OPEN', 'HIGH']) || substr($row->message,0,2) == 'ON') {
        $class = 'green';
    } else if (in_array($row->message, ['CLOSE', 'OFF','LOW'])) {
        $class = 'red';
    } else {
        $class = '';
    }

    $light_data[$row->action] = [
        'action' => $row->action,
        'message' => $row->message,
        'class' => $class,
        'created' => $row->created
    ];
}
