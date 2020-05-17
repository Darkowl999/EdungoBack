@extends('layouts.header')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Areas</title>

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
        <h1 class="mt-4">Areas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Administrar areas</li>
        </ol>
    </div>

    <center>
        <br>

        <form action="/ingresar_area" method="POST">
            {{ csrf_field() }}
            <b>Nombre categoria</b>
            <select id="Categorias" class="select" name="idCategoriaIngresada" >
                <?php
                    foreach ($Categorias as $Categoria){
                ?>
                <option name="idCategoriaIngresada" value="<?php echo $Categoria->id; ?>" ><?php echo $Categoria->nombre ?></option>
                <?php 
                    }
                ?>
            </select>
            <br>
            <input type="text" class="input"  name="nombreAreaIngresada" placeholder="Nombre area">
            <input class="button" type="submit" value="ingresar Area">
        </form>

            <br><hr>
            
        <form action="/modificar_area" method="POST">
            {{ csrf_field() }}

            <b>Nombre categoria</b>
                <select id="Categorias" class="select" name="idCategoriaModificada" >
                    <?php
                       foreach ($Categorias as $Categoria){
                 ?>
                 <option name="idCategoriaModificada" value="<?php echo $Categoria->id; ?>" ><?php echo $Categoria->nombre ?></option>
                 <?php 
                     }
                    ?>
                </select>
                <br>
                <b class="b">Nombre Area</b>
                <select id="Areas" class="select" name="nombreAreaModificada" >
                    <?php
                        foreach ($Areas as $Area){
                    ?>
                    <option name="nombreAreaModificada" value="<?php echo $Area->nombre; ?>" ><?php echo $Area->nombreArea."/".$Area->nombreCategoria ?></option>
                    <?php 
                        }
                    ?>
                </select>
                <br>
            <input type="text" class="input" name="nuevoNombreModificado" placeholder="Nuevo nombre de area">
            <input class="button" type="submit" value="modificar area">
        </form>

            <br><hr>

        <form action="/eliminar_area" method="POST">
            {{ csrf_field() }}
            <b>Nombre Area</b>
            <select id="Areas" class="select" name="nombreAreaEliminada" >
                <?php
                    foreach ($Areas as $Area){
                ?>
                <option name="nombreAreaEliminada" value="<?php echo $Area->nombreArea."/".$Area->nombreCategoria; ?>" ><?php echo $Area->nombre ?></option>
                <?php 
                    }
                ?>
            </select>
            <br>
            <input class="button" type="submit" value="eliminar Area">
        </form>

    </center>
    
</body>
</html>

@endsection