<?php
$db  = new mysqli('127.0.0.1','clima','', 'clima');





$clima_query = "select 
  round(sum(temperature)/count(*), 2) as temperature,
  round(sum(humidity)/count(*), 2) as humidity,
  concat(substring(date_format(created, '%d %H:%i'), 1, 7), '0') as st 
from temperature 
where created > date_sub(now(), interval 2 day)
and humidity <101
group by concat(date_format(created, '%Y-%m-%d %H:'), round(date_format(created, '%i')/20) * 20)
order by created desc
limit 100;";
$clima_result = $db->query($clima_query);
$temperature_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => '',
            'data' => [],
            'backgroundColor' => ['rgba(128, 99, 111, 0.2)'],
            'borderColor' => ['rgba(128, 99, 111, 1)']
        ]
    ]
];
$humidity_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => '',
            'data' => [],
            'backgroundColor' => ['rgba(0, 0, 229, 0.2)'],
            'borderColor' => ['rgba(0, 0, 229, 1)']
        ],
    ]
];
while ($row = $clima_result->fetch_object()){

    array_push($temperature_data['labels'], $row->st);
    array_push($humidity_data['labels'], $row->st);
    array_push($temperature_data['datasets'][0]['data'], $row->temperature);
    if (empty($temperature_data['datasets'][0]['label'])) {
        $temperature_data['datasets'][0]['label'] = 'Temperature: '.$row->temperature.'C';
    }
    array_push($humidity_data['datasets'][0]['data'], $row->humidity);
    if (empty($humidity_data['datasets'][0]['label'])) {
        $humidity_data['datasets'][0]['label'] = 'Humidity: '.$row->humidity.'%';
    }
}

$clima_detailed_query = "select 
  temperature,
  humidity,
  date_format(created, '%H:%i') as st  
from temperature 
where created > date_sub(now(), interval 4 hour)
and humidity <101
order by created desc
limit 200;";
$clima_detailed_result = $db->query($clima_detailed_query);
$temperature_detailed_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => '',
            'data' => [],
            'backgroundColor' => ['rgba(128, 99, 111, 0.2)'],
            'borderColor' => ['rgba(128, 99, 111, 1)']
        ]
    ]
];

$humidity_detailed_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => '',
            'data' => [],
            'backgroundColor' => ['rgba(0, 0, 229, 0.2)'],
            'borderColor' => ['rgba(0, 0, 229, 1)']
        ]
    ]
];
while ($row = $clima_detailed_result->fetch_object()){
    array_push($temperature_detailed_data['labels'], $row->st);
    array_push($humidity_detailed_data['labels'], $row->st);
    array_push($temperature_detailed_data['datasets'][0]['data'], $row->temperature);
    if (empty($temperature_detailed_data['datasets'][0]['label'])) {
        $temperature_detailed_data['datasets'][0]['label'] = 'Temperature NOW: '.$row->temperature.'C';
    }

    array_push($humidity_detailed_data['datasets'][0]['data'], $row->humidity);
    if (empty($humidity_detailed_data['datasets'][0]['label'])) {
        $humidity_detailed_data['datasets'][0]['label'] = 'Humidity NOW: '.$row->humidity.'%';
    }
}

$water_query = "select 
 round(1 - sum(sensor_1)/count(*)) as s1,
 round(1 - sum(sensor_2)/count(*)) as s2,
 round(1 - sum(sensor_3)/count(*)) as s3,
 round(1 - sum(sensor_4)/count(*)) as s4,
 concat(substring(date_format(created, '%Y-%m-%d %H:%i'), 1, 15), '0') as st 
from dry
where created > date_sub(now(), interval 2 day)
group by concat(date_format(created, '%Y-%m-%d %H :'), round(date_format(created, '%i')/20) * 20)
order by created desc
limit 100";
$water_result = $db->query($water_query);
$water_1_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => 'Sensor 1',
            'data' => [],
            'backgroundColor' => ['rgba(255, 154, 11, 0.2)'],
            'borderColor' => ['rgba(255, 154, 11, 1)']
        ]
    ]
];
$water_2_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => 'Sensor 2',
            'data' => [],
            'backgroundColor' => ['rgba(0, 102, 0, 0.2)'],
            'borderColor' => ['rgba(0, 102, 0, 1)']
        ]
    ]
];
$water_3_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => 'Sensor 3',
            'data' => [],
            'backgroundColor' => ['rgba(149, 200, 255, 0.2)'],
            'borderColor' => ['rgba(149, 200, 255, 1)']
        ]
    ]
];
$water_4_data = [
    'labels' => [],
    'datasets' => [
        0 => [
            'label' => 'Sensor 4',
            'data' => [],
            'backgroundColor' => ['rgba(0, 0, 3, 0.2)'],
            'borderColor' => ['rgba(0, 0, 0, 1)']
        ],
    ]
];
while ($row = $water_result->fetch_object()){
    array_push($water_1_data['labels'], $row->st);
    array_push($water_2_data['labels'], $row->st);
    array_push($water_3_data['labels'], $row->st);
    array_push($water_4_data['labels'], $row->st);
    array_push($water_1_data['datasets'][0]['data'], $row->s1);
    array_push($water_2_data['datasets'][0]['data'], $row->s2);
    array_push($water_3_data['datasets'][0]['data'], $row->s3);
    array_push($water_4_data['datasets'][0]['data'], $row->s4);
}

$light_query = "select * from pins p
join (
	select 
    	max(id) as id
    from pins
	group by action
	) as pp on pp.id = p.id";
$light_result = $db->query($light_query);
$light_data = [];
while ($row = $light_result->fetch_object()){
    if (in_array($row->message, ['OPEN', 'HIGH', 'ON']) || substr($row->message,0,2) == 'ON') {
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



