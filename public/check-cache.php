<?php
	//                                                                               24 hours
	function generate_cache($cache_check, $filename = null, $max_cache_count = 10, $max_cache_time = 86400) {
		if ($filename === null) {
			$filename = __DIR__ . '/.cache/' . uniqid() . '.json'; // Make random filename
		}

		$counter = __DIR__ . '/.cache/' . 'counter-' . $cache_check->type . '.txt';
		$cache_count = intval(file_get_contents($counter) + 1);

		if ($cache_check->type === 'domains') {
			$data = $GLOBALS['digitalocean']->domain();

			if ($cache_check->single) {
				$data = $data->getById(htmlspecialchars_decode($cache_check->get));
			} else {
				$data = $data->getAll();
			}
		} else if ($cache_check->type === 'droplets') {
			$data = $GLOBALS['digitalocean']->droplet();

			if ($cache_check->single) {
				$data = $data->getById(htmlspecialchars_decode($cache_check->get));
			} else {
				$data = $data->getAll();
			}
		}

		if ($cache_check->type === 'domains') {
			$data = $GLOBALS['digitalocean']->domain();

			if ($cache_check->single) {
				$data = $data->getById(htmlspecialchars_decode($cache_check->get));
			} else {
				$data = $data->getAll();
			}
		}

		if (!file_exists($filename) || filemtime($filename) < time() - $max_cache_time || $cache_count > $max_cache_count) {
			// Write to file
			$file = fopen($filename, 'w');
			fwrite($file, json_encode($data));
			fclose($file);

			// Reset cache counter
			$file = fopen($counter, 'w');
			fwrite($file, 0);
			fclose($file);
		} else {
			// Up cache counter by 1
			$file = fopen($counter, 'w');
			fwrite($file, $cache_count);
			fclose($file);
		}

		return $filename;
	}