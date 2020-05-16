@extends('layouts.header')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Materias</title>

    <style>
        .button{
           font-size: 25px;
           background-color:rgb(41, 226, 66);
           width:300px;
           height:70px;
           border-radius: 20px;
       }
    
    
       .input{
        font-size:30px;
        margin-top: 15px;
        margin-bottom: 15px;
      }

        .body{
        font-size:30px;
          margin-top: 15px;
        margin-bottom: 15px;
        background-color: rgb(220, 255, 213);
        }
    
        .select{
        font-size:30px;
        margin-top: 15px;
        margin-bottom: 15px;
        background-color:rgb(187, 255, 190);
        }
        
        .a{
            font-size:50px;
            font-style: bold;
            margin-top: 15px;
            margin-bottom: 15px;
        }

    </style>


</head>
<body>


    <div class="container-fluid">
        <h1 class="mt-4">Materias</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Administrar materias</li>
        </ol>
    </div>

    <center>
        <br>

        <form action="/ingresar_materia" method="POST">
            {{ csrf_field() }}
            <b>Nombre Area</b>
            <select id="Areas" class="select" name="idAreaIngresada" >
                <?php
                    foreach ($Areas as $Area){
                ?>
                <option name="idAreaIngresada" value="<?php echo $Area->id; ?>" ><?php echo $Area->nombre ?></option>
                <?php 
                    }
                ?>
            </select>
            <br>
            <input type="text" class="input" name="nombreMateriaIngresada" placeholder="Nombre Materia">
            <input class="button" type="submit" value="ingresar Materia">
        </form>

            <br><hr>
            
        <form action="/modificar_materia" method="POST">
            {{ csrf_field() }}

            <b class="b">Nombre Area</b>
                <select id="Areas" class="select" name="idAreaModificada" >
                    <?php
                       foreach ($Areas as $Area){
                 ?>
                 <option name="idAreaModificada" value="<?php echo $Area->id; ?>" ><?php echo $Area->nombre ?></option>
                 <?php 
                     }
                    ?>
                </select>
                <br>
                <b class="b">Nombre Materia</b>
                <select id="Materias" class="select" name="nombreMateriaModificada" >
                    <?php
                        foreach ($Materias as $Materia){
                    ?>
                    <option name="nombreMateriaModificada" value="<?php echo $Materia->nombre; ?>" ><?php echo $Materia->nombre ?></option>
                    <?php 
                        }
                    ?>
                </select>
                <br>
            <input type="text" class="input" name="nuevoNombreModificado" placeholder="Nuevo nombre Materia">
            <input class="button" type="submit" value="modificar Materia">
        </form>

            <br><hr>

        <form action="/eliminar_materia" method="POST">
            {{ csrf_field() }}
            <b>Nombre Materia</b>
            <select id="Materias" class="select" name="nombreMateriaEliminada" >
                <?php
                    foreach ($Materias as $Materia){
                ?>
                <option name="nombreMateriaEliminada" value="<?php echo $Materia->nombre; ?>" ><?php echo $Materia->nombre ?></option>
                <?php 
                    }
                ?>
            </select>
            <br>
            <input class="button" type="submit" value="Eliminar materia">
        </form>

    </center>
    
</body>
</html>
@endsection