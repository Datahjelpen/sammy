<?php
	$requirements_ok = isset($_GET['name']);

	$cache_check = new stdClass();
	$cache_check->type = 'domains';

	if ($requirements_ok) {
		$cache_check->get = htmlspecialchars($_GET['name']);
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
		$domains = json_decode(file_get_contents($cache));
	} else {
		$domain = $digitalocean->domain();

		if ($requirements_ok) {
			$domain_name = htmlspecialchars($_GET['name']);
			$domain = $domain->getByName(htmlspecialchars_decode($domain_name));
		} else {
			$domains = $domain->getAll();
		}
	}