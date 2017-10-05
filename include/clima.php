<?php

include_once 'include/db.php';

class clima extends db {

	public function get_climat() {
		$query = "SELECT * FROM temperature ORDER BY id DESC";
		return $this->query($query, true);
	}

	public function get_graph() {
		$query = "select 
		  round(sum(temperature)/count(*), 2) as temperature,
		  avg(temperature) as avgt,
		  round(sum(humidity)/count(*), 2) as humidity,
		  concat(substring(date_format(created, '%H:%i'), 1, 4), '0') as st,
		  created
		from temperature 
		where created > date_sub(now(), interval 3 day)
		and humidity <101
		group by concat(date_format(created, '%Y-%m-%d %H:'), round(date_format(created, '%i')/20) * 20)
		order by created desc
		";

		$raw_data = $this->query($query);

		$temperature_data = [
			'labels' => [],
			'datasets' => [
				0 => [
					'label' => '',
					'data' => [],
					'backgroundColor' => ['rgba(128, 99, 111, 0.2)'],
					'borderColor' => ['rgba(128, 99, 111, 1)']
				],
				1 => [
					'label' => '',
					'data' => [],
					'backgroundColor' => ['rgba(128, 140, 190, 0.2)'],
					'borderColor' => ['rgba(128, 140, 190, 1)']
				],
				2 => [
					'label' => '',
					'data' => [],
					'backgroundColor' => ['rgba(128, 200, 230, 0.2)'],
					'borderColor' => ['rgba(128, 200, 230, 1)']
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
				1 => [
					'label' => '',
					'data' => [],
					'backgroundColor' => ['rgba(100, 100, 229, 0.2)'],
					'borderColor' => ['rgba(100, 100, 229, 1)']
				],
				2 => [
					'label' => '',
					'data' => [],
					'backgroundColor' => ['rgba(150, 150, 229, 0.2)'],
					'borderColor' => ['rgba(150, 150, 229, 1)']
				]
			]
		];

		foreach ($raw_data as $row){

			if (!in_array($row['st'], $temperature_data['labels'])){
				array_push($temperature_data['labels'], $row['st']);
			}

			if (!in_array($row['st'],$humidity_data['labels'])) {
				array_push($humidity_data['labels'], $row['st']);
			}

			$day = floor((time() - strtotime($row['created'])) /  ( 24 * 60 * 60) );

			if (empty($temperature_data['datasets'][$day]['label'])) {
				$temperature_data['datasets'][$day]['label'] = 'Temperature ['.$day.']: '.$row['temperature'].'C';
			}

			if (empty($humidity_data['datasets'][$day]['label'])) {
				$humidity_data['datasets'][$day]['label'] = 'Humidity ['.$day.']: '.$row['humidity'].'%';
			}

			array_push($temperature_data['datasets'][$day]['data'], $row['temperature']);
			array_push($humidity_data['datasets'][$day]['data'], $row['humidity']);
		}

		return [
			'temperature_data' => $temperature_data,
			'humidity_data' => $humidity_data
		];

	}

	public function get_water_graph() {
		$water_query = "select 
		 (1 - sum(sensor_1)/count(*)) as s1,
		 (1 - sum(sensor_2)/count(*)) as s2,
		 (1 - sum(sensor_3)/count(*)) as s3,
		 (1 - sum(sensor_4)/count(*)) as s4,
		 concat(substring(date_format(created, '%H:%i'), 1, 4), '0') as st
		from dry
		where created > date_sub(now(), interval 1 day)
		group by concat(date_format(created, '%Y-%m-%d %H:'), round(date_format(created, '%i')/20) * 20)
		order by created desc
		";

		$raw_data = $this->query($water_query);

		$water_data = [
			1 => [
				'labels' => [],
				'datasets' => [
					0 => [
						'label' => 'Sensor 1',
						'data' => [],
						'backgroundColor' => ['rgba(255, 154, 11, 0.2)'],
						'borderColor' => ['rgba(255, 154, 11, 1)']
					]
				]
			],
			2 => [
				'labels' => [],
				'datasets' => [
					0 => [
						'label' => 'Sensor 2',
						'data' => [],
						'backgroundColor' => ['rgba(0, 102, 0, 0.2)'],
						'borderColor' => ['rgba(0, 102, 0, 1)']
					]
				]
			],
			3 => [
				'labels' => [],
				'datasets' => [
					0 => [
						'label' => 'Sensor 3',
						'data' => [],
						'backgroundColor' => ['rgba(149, 200, 255, 0.2)'],
						'borderColor' => ['rgba(149, 200, 255, 1)']
					]
				]
			],
			4 => [
				'labels' => [],
				'datasets' => [
					0 => [
						'label' => 'Sensor 4',
						'data' => [],
						'backgroundColor' => ['rgba(0, 0, 3, 0.2)'],
						'borderColor' => ['rgba(0, 0, 0, 1)']
					],
				]
			]
		];

		foreach ($raw_data as $row){
			for ($i =1; $i < 5; $i++) {
				array_push($water_data[$i]['labels'], $row['st']);
				array_push($water_data[$i]['datasets'][0]['data'], $row['s' . $i]);
			}
		}
		return $water_data;
	}
}