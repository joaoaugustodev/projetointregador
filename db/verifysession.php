<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: /projetointregador/');
    exit();
}

include('../db/conection.php');