<?php
    require '../../config.php';
    require 'get.php';
?>
</head>
<body>
    <?php require '../_templates/nav.php'; ?>
    <header id="intro-header" class="primary-bg center-align space-v-medium font-small">
        <h1 class="no-margin font-thin"><?= ($single ? $droplet->name : '<i class="icon-server-2"></i><span>Droplets</span>'); ?></h1>
    </header>
    <main class="row">
        <section class="col s12 l10 offset-l1 space-a-small">
            <section class="white-bg space-a-small font-brand">
                <?php require 'info.php'; ?>
            </section>
        </section>
    </main>
<?php require_once '../_templates/footer.php'; ?>