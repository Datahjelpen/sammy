<?php
    require_once '../../config.php';
    require_once __DIR__ . '/functions.php';

    if (!$_POST) {
        die('You need to fill out the required fields');
    } else {
        if (strlen($_POST['fqdn']) === 0) {
            die('You need to fill out the FQDN field');
        }

        if (strlen($_POST['droplet']) === 0) {
            die('You need to select a droplet');
        }

        if (isset($_POST['record']) && isset($_POST['record_type'])) {
            if (strlen($_POST['record']) === 0 && strlen($_POST['record_type']) === 0) {
                die('You need to select a droplet');
            } else {
                $record = $_POST['record'];
                $record_type = $_POST['record_type'];

                if ($record_type === 'MX') {
                    $record_priority = 10;
                } else {
                    $record_priority = null;
                }
            }
        }

        $domain = $_POST['fqdn'];
        $droplet = $_POST['droplet'];
    }


    $domainsActions = $GLOBALS['digitalocean']->domain();
    $domainsRecordsActions = $GLOBALS['digitalocean']->domainRecord();

    if (domainExist($domain) && isset($record)) {
        $action = 'updated';
        $data = $domain . '\'s ' . $record_type . ' record';
        $record_id = domainHasRecord($domain, $record_type);

        if ($record_id) {
            $domainsRecordsActions->update($domain, $record_id, '@', $record, $record_priority);
        }
    } else {
        $action = 'created';
        $data = $domainsActions->create($domain, $droplet);
        $data = $data->name;

        $domainsRecordsActions->create($domain, 'CNAME', 'www.', '@');
        $domainsRecordsActions->create($domain, 'MX', '@', 'mx.domeneshop.no.', 10);
    }
?>
</head>
<body>
    <?php require '../_templates/nav.php'; ?>
    <header id="intro-header" class="primary-bg center-align space-v-medium">
        <h1 class="font-small no-margin font-thin">Success</h1>
        <p><?= $data; ?> was successfully <?= $action; ?></p>
    </header>
    <main class="row">
        <section class="col s12 m8 offset-m2 l6 offset-l3 space-a-small">
            <section class="white-bg space-h-small space-v-medium font-brand center-align">
                <a href="./add.php?name=<?= $domain; ?>" class="btn accent"><i class="icon-arrow-31"></i><span>Go back</span></a>
            </section>
        </section>
    </main>
<?php require_once '../_templates/footer.php'; ?>