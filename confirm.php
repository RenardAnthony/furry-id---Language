<?php 

require 'bootstrap.php';

$db = App::getDatabase();

if(App::getAuth()->confirm($db, $_GET['id'], $_GET['token'], Session::getInstance())){

	Session::getInstance()->setFlash('success',"Votre compte à bien été validé, Bienvenu !");

	App::redirect('index.php');

} else {

	Session::getInstance()->setFlash('alert',"Ce token n'est plus valide");

	App::redirect('login.php');
}