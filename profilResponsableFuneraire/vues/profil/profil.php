<?php
    ob_start();
    
    ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h3>Ajouter un profil</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto mt-4">
            <form action="" method="POST">
                <div class="form group">
                    <label for="intitule"> Intitule profil</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="intitule" 
                        name="intitule" 
                        value="<?php if(isset($profil)) echo $profil['intitule'] ?>">
                </div>
                <div class="form group">
                    <label for="repertoire"> Repertoire</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="repertoire" 
                        name="repertoire"
                        value="<?php if(isset($profil)) echo $profil['repertoire'] ?>">
                </div>
                <div class="form group">
                    <label for="repertoire">Code</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="code" 
                        name="code"
                        value="<?php if(isset($profil)) echo $profil['code'] ?>">
                </div>
                <div class="form group mt-3 text-center">
                   <input type="submit" class=" btn btn-sm btn-primary" value=" enregistrer">
                </div>
            </form>
        </div>
    </div>

    <?php
    $content = ob_get_clean();
    require('./vues/base.php');
    
