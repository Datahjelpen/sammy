<?php
    require_once '../../config.php';
    require 'get.php';
?>
</head>
<body>
    <?php require '../_templates/nav.php'; ?>
    <header id="intro-header" class="primary-bg center-align space-v-medium font-small">
        <h1 class="no-margin font-thin"><?= ($single ? $domain->name : '<i class="icon-network-2-1"></i><span>Add domain</span>'); ?></h1>
    </header>
    <main class="row">
        <section class="col s12 m8 offset-m2 l6 offset-l3 space-a-small">
            <section class="white-bg space-a-small font-brand">
                <form action="./add-action.php" method="POST">
                    <div class="row input-field">
                        <input type="text" placeholder="FQDN">
                    </div>
                    <div class="row input-field">
                        <input type="text" placeholder="MX">
                    </div>
                    <div class="row input-field">
                        <select name="" id="">
                            <option value="null" selected disabled>Droplet</option>
                        </select>
                    </div>
                    <div class="row input-field right-align">
                        <button class="btn accent" type="submit"><span>Add</span><i class="icon-arrow-32"></i></button>
                    </div>
                </form>
            </section>
        </section>
    </main>
<?php require_once '../_templates/footer.php'; ?>