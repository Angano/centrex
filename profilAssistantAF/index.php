<?php
  session_start();

echo basename(__DIR__);
?>
<pre>
<?php
    var_dump($_SESSION);
?>
</pre>

<?php
