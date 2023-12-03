<?php ob_start();?>
       
<div class="row row-cols-1 row-cols-md-3 g-4 ">
    <div class="col">
        <div class="card">
        <img src="<?=APP_URL?>/assets/img/sanios.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
            <a href="#" class="btn btn-primary btn-sm mb-3">SANIOS</a>
            <p class="card-text">Votre outil de gestion des véhicules sanitaires.</p>
        
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
        <img src="<?=APP_URL?>/assets/img/isisPlanning.jpg" class="card-img-top" alt="...">
        <div class="card-body text-center">
        <a href="#" class="btn btn-primary btn-sm mb-3">ISIS</a>
            <p class="card-text">Vos planing ISIS</p>
        
        </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
        <img src="<?=APP_URL?>/assets/img/tickets.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
        <a href="#" class="btn btn-primary btn-sm mb-3">TICKETS</a>
            <p class="card-text">Gestion de vos travaux , réparations, maintenances</p>

        </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
        <img src="<?=APP_URL?>/assets/img/stocks.png" class="card-img-top" alt="...">
        <div class="card-body text-center">
        <a href="#" class="btn btn-primary btn-sm mb-3">STOCKS</a>
            <p class="card-text">Votre outils de gestion de vos approvisionnments</p>
            <a href="#" >Aide Textuelle</a>
        </div>
        
        </div>
    </div>

    <div class="col">
        <div class="card">
        <img src="<?=APP_URL?>/assets/img/commande.webp" class="card-img-top" alt="...">
        <div class="card-body text-center">
        <a href="/<?php $_SERVER['REQUEST_SCHEME'].$_SERVER['HTTP_HOST']?>commande" class="btn btn-primary btn-sm mb-3">LIVRAISONS</a>
            <p class="card-text">Votre outils de gestion des livraisons</p>
            <a href="#" >Aide Textuelle</a>
        </div>
        
        </div>
    </div>
</div>

<div class="row pt-1">
    <div class="col">
        <div class="card">
            <div class="card-body text-center footer">
                <p class="card-text"><b>NOUVEAUTES PRODUITS ENTRETIEN</b></p>
                <p class="card-text">Commande passées jeudi avant 15:00 livraison semaine suivante</p>
                <p class="card-text">Merci de passer vos commandes en fonction des familles de produit</p>
                <p class="">1 commande pour les consommables ambulances (gants, masques, etc...)</p>
                <p class="text-card">1 commande pour les produits d'entretien (papier toilette, liquide vaisselle, éponges, etc ...)</p>
            </div>
        </div>
    </div>
</div>



<?php
$content = ob_get_clean();
require('base.php');

