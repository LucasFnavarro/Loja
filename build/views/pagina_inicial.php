<h1>Está é a página inicial</h1>

<?php

use core\classes\Database;

$db = new Database();
$clientes = $db->select('SELECT * FROM clientes');

echo "<pre>";
print_r($clientes);
echo "</pre>";

?>