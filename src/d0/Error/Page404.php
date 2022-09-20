<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <title>404 - Page Error</title>
</head>
<body>

<div class="mdl-card mdl-shadow--2dp" style="margin: 10% auto">
    <div class="mdl-card__supporting-text">
        <pre>Datos usuario : <?php print_r($_SESSION['session_usr'])?></pre>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
</body>
</html>