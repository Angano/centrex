<?php
    $titlePage = 'Liste des profils';
    ob_start();

    ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h3>Listes des profils</h3>
        </div>
    </div>
    <hr>
                <?php
                 foreach($profils as $profil){?>
                        <div class="row card my-1 flex-row societe mx-1">
                                
                                    <div class="col-12 col-md-3 col-sm-6" title="Intitulé"><i class="fa-solid fa-book"></i> <?= $profil['intitule'] ?></div>
                                    <div class="col-12 col-md-3 col-sm-6" title="Code"><i class="fa-solid fa-code"></i> <?= $profil['code'] ?></div>
                                    <div class="col-12 col-md-3 col-sm-6" title="Répertoire"><i class="fa-solid fa-file-code"></i> <?= $profil['repertoire'] ?></div>
                                    
                                    <div class="col-6 col-md-1 col-sm-1 d-flex flex-row justify-content-start">
                                        <button title="Edition du profil" class=" btn ps-0 ms-O"><a href="<?=APP_URL?>profilUpdate/<?= $profil['id']?>" ><i class="fa-solid fa-pen-to-square"></i></a></button>
                                        
                                
                                        <form action="" method="POST" class="mx-1" title="Delete">
                                            <input type="hidden" name="id" value="<?= $profil['id'] ?>">
                                            <button class="btn " type="submit"><i class="fa-solid fa-trash"></i></button>
                                        </form>

                                    </div>  
                                    
                
                                  
                             
                        </div>
                    
                <?php } ?>
            </div>   
    </div>

    <?php
    $content = ob_get_clean();
    require('./vues/base.php');