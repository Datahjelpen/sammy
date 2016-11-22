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
    <?php require '_templates/nav.php'; ?>
    <header id="intro-header" class="primary-bg center-align space-v-large font-medium">
        <h1 class="no-margin font-thin">SAMMY</h1>
    </header>
    <main class="row">
        <section class="col s12 m6 space-a-small">
            <header class="center-align">
                <h2><i class="icon-server-2"></i><span>Droplets</span></h2>
            </header>
            <section class="white-bg space-a-small font-brand">
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
            <header class="center-align">
                <h2><i class="icon-network-2-1"></i><span>Domains</span></h2>
            </header>
            <section class="white-bg space-a-small font-brand">
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