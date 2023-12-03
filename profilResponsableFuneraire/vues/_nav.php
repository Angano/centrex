<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=APP_URL?>home"><b>INTRANET</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">SANIOS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">ISIS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="">TICKETS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link">STOCKS</a>
                </li>
            </ul>
            
            
                <?php
                    if(checkPost($_SESSION,'isIdentified')){ ?>
                
                        <?php if(checkRole(['superadmin','dirigeant','rr','rs_itinerant'])){ ?>
                            <ul  class="navbar-nav">
                                <li class="nav-item <?php active($controller, 'home') ?>">
                                    <a href="<?=APP_URL?>home" class="nav-link">Accueil</a>
                                </li>
                    
                               

                                

                            
                             <li class="nav-item <?php active($controller, 'users') ?>">
                                <a class="nav-link" href="<?=APP_URL?>users">Users</a>
                            </li>
                            <?php
                        
                                if(checkRole(['superadmin'])){ ?>
                                    <li class="nav-item <?php active($controller, 'usersdesactived') ?>">
                                        <a class="nav-link" href="<?=APP_URL?>usersDesactived">User désactivés</a>
                                    </li>  <?php } ?>

                            <li class="nav-item <?php active($controller, 'centrexs') ?>">
                                <a class="nav-link" href="<?=APP_URL?>centrexs">Centrexs</a>
                            </li> 
                            <?php
                                if(checkRole(['superadmin'])){ ?>
                            <li class="nav-item dropdown <?php active($controller, 'profil') ?>">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Profil
                                </a>
                                <ul class="dropdown-menu" style="background-color:#0d6efd">
                                    <li>
                                        <a class="dropdown-item" href="<?=APP_URL?>profil">Ajouter un profil</a>
                                    </li>
                                    <li><a class="dropdown-item" href="<?=APP_URL?>profils">Liste des profils</a></li>
                                </ul>
                            </li>
                            <?php } ?>

                        </ul>
                           
                <?php } }?>
                   
            </ul>
            <ul class="navbar-nav">
                <?php
                if(checkPost($_SESSION,'isIdentified')){ ?>
                    
                    <li class="nav-item">
                        <a  data-bs-toggle="modal" data-bs-target="#get-profil" class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i>
                    <?php echo  checkPost($_SESSION,'login') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=APP_URL?>logout">Logout</a>
                    </li>
                <?php }
                else{ ?>
                    <li class="nav-item <?php active($controller, 'login') ?>">
                        <a class="nav-link" href="<?=APP_URL?>login">login</a>
                    </li>
                 
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
<!-- Modal -->
<div class="modal fade" id="get-profil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
            <tr><th>Civilite</th><td id="current-civility"></td></tr>
            <tr><th>Nom</th><td id="current-lastname"></td></tr>
            <tr><th>Prénom</th><td id="current-firstname"></td></tr>
            <tr><th>Société</th><td id="current-soc"></td></tr>
            <tr><th>Job</th><td id="current-job"></td></tr>
            <tr><th>Login</th><td id="current-login"></td></tr>
            <tr><th>Email</th><td id="current-email"></td></tr>
            <tr><th>adresse</th><td id="current-address"></td></tr>
            <tr><th>Zip</th><td id="current-zip"></td></tr>
            <tr><th>Ville</th><td id="current-town"></td></tr>
            
        </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <a href="#"  class="btn btn-primary">Mettre à jour mon profil</a>
      </div>
    </div>
  </div>
</div>
