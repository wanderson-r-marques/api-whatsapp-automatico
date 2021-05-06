<?php
require 'class/Connection.php';
require 'class/TokenController.php';
$cliente = TokenController::all();
    print_r($cliente);