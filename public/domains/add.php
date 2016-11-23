<?php
    require_once '../../config.php';
    require 'get.php';
?>
</head>
<body>
    <?php require '../_templates/nav.php'; ?>
    <header id="intro-header" class="primary-bg center-align space-v-medium font-small">
        <h1 class="no-margin font-thin"><i class="icon-network-2-1"></i><span><?= ($single ? 'Edit ' . $data->name : 'Add domain'); ?></span></h1>
    </header>
    <main class="row">
        <section class="col s12 m8 offset-m2 l6 offset-l3 space-a-small">
            <section class="white-bg space-a-small font-brand">
                <form action="./add-action.php" method="POST">
                    <div class="row input-field">
                        <input name="fqdn" type="text" placeholder="FQDN" <?= ($single ? 'value="' . $data->name . '"' : ''); ?> required>
                    </div>
                    <?php if ($single) { ?>
                    <div class="row input-field">
                        <input name="record_type" type="text" class="col s2" placeholder="Type" value="MX">
                        <input name="record" type="text" class="col s10" placeholder="Record value" value="mx.domeneshop.no.">
                    </div>
                    <?php } ?>
                    <div class="row input-field">
                        <select name="droplet" required>
                            <option value="" selected disabled>Droplet</option>
                            <?php
                                $dropletsActions = $GLOBALS['digitalocean']->droplet();
                                $droplets = $dropletsActions->getAll();

                                foreach ($droplets as $droplet) {
                                    ?>
                                    <option value="<?= $droplet->networks[0]->ipAddress;?>"><?= $droplet->name; ?></option>
                                    <?php
                                }
                            ?>
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