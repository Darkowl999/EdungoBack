@extends('layouts.header')

@section('content')    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalle auxiliar</title>
</head>
<body>

    <div class="container-fluid">
        <br>
        <ol class="breadcrumb mb-4">
            <h1 class="mt-4">Detalle auxiliar</h1>
        </ol>
        <br>
        <div class="container">
            <div class="row">
                <h4 class="col">Nombre de usuario:</h4>
                <h5 class="col">{{$Auxiliar->nombre_usuario}}</h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Nombre:</h4>
                <h5 class="col">{{$Auxiliar->nombre}}</h5>
                <div class="w-100"><hr></div>
                
                <h4 class="col">Apellido:</h4>
                <h5 class="col">{{$Auxiliar->apellido}}</h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Foto de perfil:</h4>
                <h5 class="col">
                    <picture>
                        <img class="img-fluid img-thumbnail" src="<?php echo asset("storage/".$Auxiliar->foto_perfil); ?>" alt="Perfil" />
                    </picture>
                </h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Foto de carnet:</h4>
                <h5 class="col">
                    <picture>
                        <img class="img-fluid img-thumbnail" src="<?php echo asset("storage/".$Auxiliar->foto_carnet); ?>" alt="Perfil" />
                    </picture>
                </h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Telefono:</h4>
                <h5 class="col">{{$Auxiliar->telefono}}</h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Sexo:</h4>
                <h5 class="col">{{$Auxiliar->sexo}}</h5>
                <div class="w-100"><hr></div>

                <h4 class="col">E-mail:</h4>
                <h5 class="col">{{$Auxiliar->email}}</h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Direccion:</h4>
                <h5 class="col">{{$Auxiliar->direccion}}</h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Fecha de nacimiento:</h4>
                <h5 class="col">{{$Auxiliar->fecha_nacimiento}}</h5>
                <div class="w-100"><hr></div>

                <h4 class="col">Ganancias totales:</h4>
                <h5 class="col">{{$Auxiliar->ganancia}} Bs.</h5>
                <div class="w-100"><hr></div>

                

            </div>
          </div>


    </div>
    
</body>
</html>
@endsection