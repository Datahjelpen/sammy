<?php
	$requirements_ok = isset($_GET['id']);

	$cache_check = new stdClass();
	$cache_check->type = 'droplets';

	if ($requirements_ok) {
		$cache_check->get = htmlspecialchars($_GET['id']);
		$cache_check->single = true;
		$single = true;
	} else {
		$cache_check->get = 'all';
		$cache_check->single = false;
		$single = false;
	}

	require_once __DIR__ . '/../check-cache.php';

	$cache = generate_cache($cache_check, __DIR__ . '/../.cache/' . $cache_check->type . '-' . $cache_check->get . '.json');

	if (strlen($cache) !== 0) {
		$data = json_decode(file_get_contents($cache));
	} else {
		$data = $digitalocean->droplet();

		if ($requirements_ok) {
			$droplet_id = htmlspecialchars($_GET['id']);
			$data = $data->getByName(htmlspecialchars_decode($droplet_id));
		} else {
			$data = $data->getAll();
		}
	}