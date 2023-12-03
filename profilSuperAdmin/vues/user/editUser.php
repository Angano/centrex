   <?php
    
        // protection dans la vue: si pas superadmin, on redirige
        if(!checkRole(['superadmin'])){
            require('./vues/back/index.php');
        };

        ob_start();  ?>

        <div class="row">
            <div class="cold-md-6">

            </div>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <h3>Mise à jour utilisateur</h3>
                <form action="" method="POST" class="d-flex flex-column">
                    <div class="row">
                        <div class="col-md-10 mx-auto d-flex">
                            <input type="hidden" name="rowid" id="rowid" class="form-control" value="<?=$user['rowid']?>">
                    
                            <div class="form-group mt-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" name="login" id="login" class="form-control" value="<?=$user['login']?>">
                            </div>

                            <div class="form-group mt-3">
                                <label for="mdp" class="form-label">Email</label>
                                <input type="text" name="email" id="pass" class="form-control" value="<?=$user['email']?>">
                            </div>
                            <div class="form-group mt-3">
                                <label for="job" class="form-label">Job</label>
                                
                                <select name="job" id="job">
                                    <option value="null">Choisir un rôle</option>
                                    <?php 
                                        foreach($profils as $profil){?>
                                        <option 
                                            value="<?= $profil['id']?>" 
                                            <?php if($profil['id']==$user['job']){echo ' selected=selected ';} ?> >
                                            <?= $profil['intitule'] ?>
                                        </option>    
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-10 mx-auto d-flex">
                                <div class="form-group mt-3">
                                    <label for="civilite" class="form-label">Civilité</label>
                                    <input type="text" name="civilite" id="civilite" class="form-control" value="<?=$user['civility']?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="firstname" class="form-label">First name</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" value="<?=$user['firstname']?>">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="lastname" class="form-label">Lastname</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" value="<?=$user['lastname']?>">
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="form-group mt-3">
                            <label for="address" class="form-label">address</label>
                            <input type="text" name="address" id="address" class="form-control" value="<?=$user['address']?>">
                        </div><div class="form-group mt-3">
                            <label for="zip" class="form-label">ZIP</label>
                            <input type="text" name="zip" id="zip" class="form-control" value="<?=$user['zip']?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="town" class="form-label">Ville</label>
                            <input type="text" name="town" id="town" class="form-control" value="<?=$user['town']?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="status" class="form-label">Actif</label>
                            <input type="checkbox" name="status" id="status" <?php if($user['statut']==='1'){ ?>  checked <?php } ?> value="1" >
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto d-flex">
                            <div class="mt3 form-group mx-auto">
                                <input class="btn btn-sm btn-warning" type="reset" value=" reset">
                                <input class="btn btn-sm btn-success" type="submit" value=" Valider">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php
    $content = ob_get_clean();
    require('./vues/base.php');