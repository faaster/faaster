<?php
// Authentification
require_once '_include/connection.php';
$sql = 'SELECT *
        FROM `functions`
        WHERE id = ?';
$r = $db->prepare($sql);
$r->execute(array($_GET['function_id']));
if ($r->rowCount() != 1) {
  exit('Fonction introuvable.');
}
$function = $r->fetch();
echo $function['code'];
// Maintenant, on va executer le code qu'on peut retrouver dans la variable ici : $function['code']
$start_time = microtime(TRUE);

$result = eval($function['code']);

$end_time = microtime(TRUE);

$total_time = $end_time - $start_time;

$total_time = round($total_time, 4, PHP_ROUND_HALF_UP);
?>

// exemple : return $_GET['integer'] + 1 ;

<p>
  La fonction vient de se terminer en <?php echo $total_time; ?> secondes (avec le résultat : <?php echo $result ?>).
</p>
