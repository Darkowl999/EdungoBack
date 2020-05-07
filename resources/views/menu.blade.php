<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <style>
    
    body{
        background-color:rgb(196, 255, 196), 255, 240);
    }
    
    .button{
           font-size: 40px;
           background-color:rgb(7, 189, 77);
           width:30%;
           height:200px;
           border-radius: 20px;
    }

    </style>
</head>
<body>

    <center>
        <button class="button" type="button" onclick="window.location.href = '/edungo/public/administrar_categorias'; ">
            Administrar categorias
        </button>   

        <button class="button" type="button" onclick="window.location.href = '/edungo/public/administrar_areas'; ">
            Administrar areas
        </button>   

        <button class="button" type="button" onclick="window.location.href = '/edungo/public/administrar_materias'; ">
            Administrar materias
        </button>   

    </center>
    
</body>
</html>