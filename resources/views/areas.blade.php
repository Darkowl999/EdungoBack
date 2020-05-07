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
    
    
       input{
        font-size:30px;
        margin-top: 15px;
        margin-bottom: 15px;
      }

        body{
        font-size:30px;
          margin-top: 15px;
        margin-bottom: 15px;
        background-color: rgb(220, 255, 213);
        }
    
        select{
        font-size:30px;
        margin-top: 15px;
        margin-bottom: 15px;
        background-color:rgb(187, 255, 190);
        }
        
        a{
            font-size:50px;
            font-style: bold;
            margin-top: 15px;
            margin-bottom: 15px;
        }

    </style>


</head>
<body>
    <center>

        <a class="">Administrar Areas</a>
        <br>

        <form action="/edungo/public/ingresar_area" method="POST">
            {{ csrf_field() }}
            <b>Nombre categoria</b>
            <select id="Categorias" name="idCategoriaIngresada" >
                <?php
                    foreach ($Categorias as $Categoria){
                ?>
                <option name="idCategoriaIngresada" value="<?php echo $Categoria->id; ?>" ><?php echo $Categoria->nombre ?></option>
                <?php 
                    }
                ?>
            </select>
            <br>
            <input type="text" name="nombreAreaIngresada" placeholder="Nombre area">
            <input class="button" type="submit" value="ingresar Area">
        </form>

            <br><hr>
            
        <form action="/edungo/public/modificar_area" method="POST">
            {{ csrf_field() }}

            <b>Nombre categoria</b>
                <select id="Categorias" name="idCategoriaModificada" >
                    <?php
                       foreach ($Categorias as $Categoria){
                 ?>
                 <option name="idCategoriaModificada" value="<?php echo $Categoria->id; ?>" ><?php echo $Categoria->nombre ?></option>
                 <?php 
                     }
                    ?>
                </select>
                
                <b>Nombre Area</b>
                <select id="Areas" name="nombreAreaModificada" >
                    <?php
                        foreach ($Areas as $Area){
                    ?>
                    <option name="nombreAreaModificada" value="<?php echo $Area->nombre; ?>" ><?php echo $Area->nombre ?></option>
                    <?php 
                        }
                    ?>
                </select>
                <br>
            <input type="text" name="nuevoNombreModificado" placeholder="Nuevo nombre de area">
            <input class="button" type="submit" value="modificar area">
        </form>

            <br><hr>

        <form action="/edungo/public/eliminar_area" method="POST">
            {{ csrf_field() }}
            <b>Nombre Area</b>
            <select id="Areas" name="nombreAreaEliminada" >
                <?php
                    foreach ($Areas as $Area){
                ?>
                <option name="nombreAreaEliminada" value="<?php echo $Area->nombre; ?>" ><?php echo $Area->nombre ?></option>
                <?php 
                    }
                ?>
            </select>
            <input class="button" type="submit" value="eliminar Area">
        </form>

    </center>
    
</body>
</html>