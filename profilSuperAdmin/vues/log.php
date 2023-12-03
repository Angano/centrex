<?php ob_start(); ?>
        <div class="row">
            <div class="col-md-4 mx-auto" style="margin-top:5rem";>
                <div class="card">

                    <h5 class="card-header text-light bg-primary">Connexion</h5>
                                    <div class="card-body">
                                        <form action="" method="post">
                                        <div class="form-group">
                                            <label for="login" class="form-label">login</label>
                                            <input type="text" name="login" id="login" class="form-control" placeholder="login">
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="form-label">password</label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                                        </div>
                                        <div class="mt-3">
                                            <input class=" btn btn-sm btn-primary form-control" type="submit" value="Valider">
                                        </div>
                                    </form>
                                    </div>



                </div>
              
                



            
            </div>
        </div>
<?php
    $content= ob_get_clean();
    require('./vues/base.php');
