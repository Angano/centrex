<?php 
ob_start();?>

<div class="row">
        <div class="col-md-10 mx-auto">
            <h3>Détail d'une commande</h3>
        </div>
</div>
<div class="row">
    <div class="card col-md-6">
        <?php
            var_dump($commande);
            ?>
    </div>
    <div class="col-md-6">
        <?=$commande['todo']?>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mx-auto">
        <form action="" method="post">
            <input type="hidden" name="commande_id" value="">
            <input type="checkbox" name="" id="">
            <input type="submit" value="Livré" class="btn btn-sm btn-success w-100">
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require('./vues/base.php');