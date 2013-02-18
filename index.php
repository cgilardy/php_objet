<?php
include("includes/haut.php");

function chargerClasse($classe)
{
  require 'class/'.$classe . '.class.php'; // On inclut la classe correspondante au paramètre passé.
}
 
spl_autoload_register('chargerClasse'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.
 
$perso = new Personnage(array(
  'nom' => 'Clément',
  'vie' => 100,
  'force' => 10
));
echo $perso->getNom();  
$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'chiennes');
$manager = new PersonnageManager($db);



include("includes/bas.php");
?>