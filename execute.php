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

// Maintenant, on va executer le code qu'on peut retrouver dans la variable ici : $function['code']
$start_time = microtime(TRUE);

$result = eval($function['code']);

$end_time = microtime(TRUE);

$total_time = $end_time - $start_time;

$total_time = round($total_time, 4, PHP_ROUND_HALF_UP);
?>

<dl>
  <dt>Résultat</dt>
  <dd><code><?php echo $result ?></code></dd>

  <dt>Durée d'exécution</dt>
  <dd><?php echo $total_time; ?> secondes</dd>
</dl>

<?php



// @todo

// Fonction dans la table invoices.

// date_default_timezone_set('Europe/Paris');
//
// $date = date("d-m-Y");
//
// $sql = 'INSERT INTO invoices(id, params,duration,created_at,function_id)
//         VALUES(:id, params,duration,created_at,function_id)';
//
// $req = $db->prepare($sql);
// $req->execute(array(
// 	'id'    => $_POST['id'],
//   'function_id'  => $function['id'],
//   'duration'    =>  $total_time,
//   'created_at'    =>  $date,
// ));



?>
