<?php 

require 'bootstrap.php';

App::getAuth()->logout();

Session::getInstance()->setFlash('success', 'Vous êtes déconnecté');

App::redirect('index.php');