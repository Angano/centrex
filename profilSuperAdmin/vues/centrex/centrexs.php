
      <?php ob_start();?>
      <div class="row">
        <div class="col-md-10 mx-auto">
            <h3>Listes des societés avec un centrex</h3>
        </div>
    </div>

           
                    <?php
                        foreach($societes as $key=>$value){
                            ?>  
                            <div class="row card my-1 flex-row societe mx-1">
                                <div class="col-md-10 row col-sm-9">
                                    <div class=" col-md-4 " >
                                        <i class="fa-solid fa-house"></i> <?=$value['nom']?>
                                    </div>
                                    <div class=" col-md-4 " >
                                        <i class="fa-solid fa-envelope"></i> <?=$value['identifiant']?>
                                    </div>

                                    <div class=" col-md-4 ">
                                        <i class="fa-solid fa-location-dot"></i> <?=$value['town']?>
                                    </div>
                                </div>
                                <div class="col-md-2 col-sm-3 d-flex justify-content-between">
                                    <div >
                                        <small>
                                            <b style="font-size:80%"> Status: </b>
                                        </small>
                                        <?php if($value['status']==='1'){?><i class="fa-solid fa-check"></i><?php }else {?> <i class="fa-solid fa-xmark"></i><?php }?>
                                    </div>
                                    <div class="">
                                    <a href="<?=APP_URL ?>centrexPdf/<?=$value['fk_llx_soc']?>" target="_blank" >
                                        <i class="fa-solid fa-file-pdf" style="color:red; font-size:1.5rem";></i>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
              
 
       <?php
       $content = ob_get_clean();
       require('./vues/base.php');

