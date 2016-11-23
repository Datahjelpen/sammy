<?php
    // 
    // !!! REMEMBER TO REMOVE THE SSL IGNORE THING !!!
    // 
    // C:\xampp\htdocs\dh\_datahjelpen\tools\sammy\vendor\kriswallsmith\buzz\lib\Buzz\Client\Curl.php
    // 
    
    require_once __DIR__ . '/../config.php';
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
                    require 'droplets/get.php';
                    require 'droplets/info.php';
                ?>
                <footer class="space-a-small center-align">
                    <a href="/droplets/add.php" class="btn accent">Add</a>
                </footer>
            </section>
        </section>
        <section class="col s12 m6 space-a-small">
            <header class="center-align">
                <h2><i class="icon-network-2-1"></i><span>Domains</span></h2>
            </header>
            <section class="white-bg space-a-small font-brand">
                <?php
                    require 'domains/get.php';
                    require 'domains/info.php';
                ?>
                <footer class="space-a-small center-align">
                    <a href="/domains/add.php" class="btn accent">Add</a>
                </footer>
            </section>
        </section>
    </main>
<?php require_once '_templates/footer.php'; ?>