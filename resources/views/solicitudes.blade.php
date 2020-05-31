@extends('layouts.header')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud Auxiliares</title>
</head>
<body>
    
    <!-- imagenaux,imagencarnet,nombre,apellido,ci (aceptar,eliminar) -->

    <?php
    foreach ($Auxiliares as $Auxiliar){
    ?>
    <img src="<?php echo "images/".$Auxiliar->foto_carnet; ?>" id="icon" alt="User Icon" />
    <?php echo "images/".$Auxiliar->foto_carnet; ?>
   <?php
    }
    ?>

</body>
</html>
@endsection