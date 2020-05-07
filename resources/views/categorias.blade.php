<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>categorias</title>

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

        b{
         font-size:15px;
        }

    </style>


</head>
<body>
    <center>

        <a class="">Administrar categorias</a>
        <br>

        <form action="/edungo/public/ingresar_categoria" method="POST">
            {{ csrf_field() }}
            <input type="text" name="nombreCategoriaIngresada" placeholder="Nombre categoria">
            <input class="button" type="submit" value="Ingresar categoria" >
        </form>

            <br><hr>
            
        <form action="/edungo/public/modificar_categoria" method="POST">
            {{ csrf_field() }}
                <b>Nombre categoria</b>
                <select id="categorias" name="nombreCategoriaModificada" >
                    <?php
                        foreach ($categorias as $categoria){
                    ?>
                    <option name="nombreCategoriaModificada" value="<?php echo $categoria->nombre; ?>" ><?php echo $categoria->nombre ?></option>
                    <?php 
                        }
                    ?>
                </select>
                <br>
            <input type="text" name="nuevoNombreModificado" placeholder="Nuevo nombre">
            <input class="button" type="submit" value="Modificar categoria">
        </form>

            <br><hr>

        <form action="/edungo/public/eliminar_categoria" method="POST">
            {{ csrf_field() }}
            <b>Nombre categoria</b>
            <select id="categorias" name="nombreCategoriaEliminada" >
                <?php
                    foreach ($categorias as $categoria){
                ?>
                <option name="nombreCategoriaEliminada" value="<?php echo $categoria->nombre; ?>" ><?php echo $categoria->nombre ?></option>
                <?php 
                    }
                ?>
            </select>
            <input class="button" type="submit" value="eliminar categoria">
        </form>

    </center>
    
</body>
</html>