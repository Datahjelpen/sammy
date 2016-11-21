<?php
    // 
    // !!! REMEMBER TO REMOVE THE SSL IGNORE THING !!!
    // 
    // C:\xampp\htdocs\dh\_datahjelpen\tools\sammy\vendor\kriswallsmith\buzz\lib\Buzz\Client\Curl.php
    // 
    
    require '../config.php';
?>
</head>
<body>
    <header class="header center-align space-v-large font-medium">
    <?php require '_templates/nav.php'; ?>
        <h1 class="no-margin font-thin">SAMMY</h1>
    </header>
    <main class="row">
        <section class="col s12 m6 space-a-small">
            <header>
                <h2>Droplets</h2>
            </header>
            <section class="grey-bg space-a-small">
                <?php
                    $droplet = $digitalocean->droplet();
                    $droplets = $droplet->getAll();

                    echo '<ul>';
                    foreach ($droplets as $droplet) {
                        echo '<li><a href="/droplets/?id=' . $droplet->id . '">' . $droplet->name . '</a></li>';
                    }
                    echo '</ul>';
                ?>
            </section>
        </section>
        <section class="col s12 m6 space-a-small">
            <header>
                <h2>Domains</h2>
            </header>
            <section class="grey-bg space-a-small">
                <?php
                    $domain = $digitalocean->domain();
                    $domains = $domain->getAll();

                    echo '<ul>';
                    foreach ($domains as $domain) {
                        echo '<li><a href="/domains/?name=' . $domain->name . '">' . $domain->name . '</a></li>';
                    }
                    echo '</ul>';
                ?>
            </section>
        </section>
    </main>
    <?php require_once '_templates/footer.php'; ?>