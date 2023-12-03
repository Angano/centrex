<?php
ob_start(); ?>

<div class="row">
        <div class="col-md-10 mx-auto">
            <h3>Ajouter un todo</h3>
        </div>
</div>
<div class="row">
        <div class="col-md-6 mx-auto mt-4">

</div>
<?php
    $content = ob_get_clean();
    require('./vues/base.php');