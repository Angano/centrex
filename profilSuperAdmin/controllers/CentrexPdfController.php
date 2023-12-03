<?php

require_once('./lib/html2pdf/vendor/autoload.php');
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$titlePage = 'Liste des Centrex';

if( isset($_SESSION['user_job']) && in_array($_SESSION['user_job'],['dirigeants', 'rr' ,'rs_itinerant','superadmin'])){



    require_once('./models/CentrexModel.php');
    $html2pdf = new Html2Pdf();

    ob_start();
    ?>
        <page backimg="./assets/img/pdf1.webp">
            <span style="display:inline-block;position:absolute;top:35%;left:40%; "><?= $societe['identifiant'] ?></span>
            <span style="display:inline-block;position:absolute;top:64%;left:11%; font-size:80%; font-weight:bold "><?= $societe['nom'] ?></span>

        </page>
        <page backimg="./assets/img/pdf2.webp">
            <span style="display:inline-block;position:absolute;top:19%;left:23%; "><?= $societe['nom'] ?></span>
            <span style="display:inline-block;position:absolute;top:19%;left:46%; "><?= $societe['phone'] ?></span>
        </page>
    <?php

    $content = ob_get_clean();

    try{
        $html2pdf->writeHTML($content);
        $html2pdf->output();
    }
    catch(Html2PdfException $e){
        echo $e->getMessage();
    }



    
}else{
    header('Location:'.APP_URL.'/home');
    }