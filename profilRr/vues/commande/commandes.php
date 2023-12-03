<?php 
ob_start();
?>
<div class="row">
        <div class="col-md-10 mx-auto">
            <h3>Listes des commandes</h3>
        </div>
</div>
<?php
foreach($commandes as $commande){
    ?>

    <div class="row card my-1 flex-row societe mx-1 ">
            <div class="col-12 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-2">
                <span class="btn btn-sm btn-primary p-0 m-0"><a class="nav-link" href="<?php APP_URL?>CommandeDetail/<?= $commande['rowid']?>" target="_blank" ><b>Réf: </b> <?= $commande['ref']?></a></span>
            </div>
            <div class="col-6  col-sm-3  col-md-4  col-lg-4 col-xl-4 col-xxl-1">
                <b>id_soc: </b> <?= $commande['fk_soc']?>/<?= $commande['rowid']?>
                <?php if(strlen($commande['todo'])>0){?> <span class="btn btn-sm btn-success">Todo !</span> <?php } ?>
            </div>
            <div class="col-6  col-sm-3  col-md-4  col-lg-4 col-xl-4 col-xxl-1"><b>statut: </b> <?= $commande['fk_statut']?></div>

            
            <div class="col-12 col-sm-12  col-md-4 col-lg-4 col-xl-4 col-xxl-2"><b><?= $commande['nom']?></b></div>
            <div class="col-12 col-sm-6  col-md-4  col-lg-4 col-xl-4 col-xxl-3"><?=$commande['address']?> </div>
            <div class="col-12 col-sm-6 col-md-4  col-lg-4 col-xl-4 col-xxl-3"><?=$commande['zip']?> - <b><?=$commande['town']?></b> </div> 
    </div>
    <?php }

    $content = ob_get_clean();

    require('./vues/base.php');
