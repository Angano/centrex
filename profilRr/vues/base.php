<!DOCTYPE html>
<html lang="frob">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titlePage ?></title>
    <link rel="stylesheet" href="<?=APP_URL?>/assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="<?=APP_URL?>/assets/css/style.css">
</head>
<body>
    <?php 
    require_once('vues/_nav.php');
    $messages = getMessages();
   
    ?>

    <container class="container-fluid d-block pt-1" style="max-width:1330px;padding-bottom:5rem">
        <div class="row" >
            <div class="col-md-8 mx-auto" id="tata">
                <div id="toto">

                <?php  
                if($messages){
                    foreach($messages as $message){ ?>
                        <div class="message alert alert-<?=$message[0] ?>"><?=$message[1]?></div>
                    <?php 
                    }

                }
                    
                    cleanMessage(); 
                ?>
                </div>
                
            </div>
        </div>

        <!-- Chargement du contenu -->
        <?php
            if(isset($content)){
                echo $content; 
            }
        ?>
    </container>


    <script src="<?=APP_URL?>/assets/js/bootstrap/bootstrap.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="<?=APP_URL?>/assets/js/base.js"></script>
    
    <!-- Chargement des scripts -->
    <?php
        if(isset($script)){
            echo $script;
        }
    ?>
        
</body>
</html>