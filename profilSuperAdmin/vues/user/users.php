<?php ob_start(); ?>
<div class="row">
    <div class="col-md-10 mx-auto">
<div class="d-flex justify-content-between">

<h3><?php if(isset($title)){echo $title;} ?></h3> <div style="align-self:center">
<span class="<?php if($more==='asc'){ echo ' btn-order ';} ?>">  &#x25BC; </span>
                            <span class="<?php if($more!=='asc'){ echo ' btn-order ';} ?>"><a href="<?=APP_URL?><?=$url_tri?>/desc"> &#x25BD; </a></span>Societé
                            <span class="<?php if($more!=='asc'){ echo ' btn-order ';} ?>">  &#x25B2;</span>
                            <span class="<?php if($more==='asc'){ echo ' btn-order ';} ?>"><a href="<?=APP_URL?><?=$url_tri?>/asc"> &#x25B3; </a></span> </th>
                     
</div>
</div>
        
        
        <?php  if(isset($users)){ ?>
           
            <hr>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4"  id="tbody">
                <?php
                foreach($users as $value){
                    ?>
                    <div class=" col">
                        <div class="card ">
                        <div class="card-header">
                            <p class="card-text" style="color:#0d6efd; font-weight:bold";><b><?= $value['lastname'] ?> </b><?= $value['firstname'] ?></p>
                        </div>
                        <div class="card-body">
                            <p><b><?= checkPost($value,'nom') ?></b></p>
                            <p><span style="border-bottom:solid 1px black;margin-right:1rem">Login :</span><?= $value['login'] ?></p>
                            <p><span style="border-bottom:solid 1px black;margin-right:2rem">Job :</span><?= $value['code'] ?> </p>
                        </div>
                            <div class="card-footer d-flex justify-content-between pb-0">
                                <p>
                                    <button title="SSOS">
                                        <a style="background-image:url('<?=APP_URL?>assets/img/bouygue.png');background-repeat: no-repeat;
                                        background-size: contain; height: 28px; width: 48px;" 
                                        class="btn btn-sm " 
                                        target="_blank" 
                                        href="https://ucportal.hosted-pbx.bouyguestelecom.com/ssos/index.php">
                                    </a>
                                    </button>
                                    
                                </p>
                                <?php
                                if($value['statut'] && $_SESSION['user_job'] === "superadmin"){
                                    ?>  
                                    <p>
                                        <form action="<?=APP_URL?>ApiUpdateActifUser" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="rowid" value="<?=$value['rowid']?>">
                                            <input type="hidden" name="statut" value="0">
                                            <button type="submit" title="Désactiver le compte"><i class="fa-solid fa-eye-slash"></i></button>
                                       
                                            
                                        </form> 
                                    </p>
                                        <?php
                                }
                                elseif(!$value['statut'] && $_SESSION['user_job'] === "superadmin"){?>
                                <p>
                                    <form action="<?=APP_URL?>ApiUpdateActifUser" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="rowid" value="<?=$value['rowid']?>">
                                        <input type="hidden" name="statut" value="1">
                                        <button title="Activer l'utilisateur" type="submit"><i class="fa-solid fa-eye"></i></button>
                                    </form>
                                </p>
                                <?php } ?>
                            
                        

                                <?php
                                if(in_array($_SESSION['user_job'],['superadmin'])){
                                    ?><p>
                                        <button title="Editer l'utilisateur">
                                            <a href="<?=APP_URL?>editUser/<?=$value['rowid']?>" target="_blank"><i class="fa fa-edit" style="font-size:22px; color:black"></i></a>
                                        </button>
                                    </p>

                                    <?php } ?>
                            </div>
                        </div> 
                    </div>        
                    <?php
                } ?>
            </div>
            
        <?php } ?>


    </div>
</div>

<?php
    $content = ob_get_clean();

    ob_start();
?>
<script src="<?=APP_URL?>assets/js/updateUser.js"></script>

<?php 
    $script = ob_get_clean();

    require('./vues/base.php');