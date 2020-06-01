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


    <div class="container-fluid">
        <h1 class="mt-4">Solicitudes</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Administrar solicitudes de auxiliares.</li>
        </ol>



           <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Foto de perfil</th>
                <th scope="col">Foto de carnet</th>
                <th scope="col">ci</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>        ​   
                    <picture>
                        <img class="img-fluid img-thumbnail" src="<?php echo "storage/".$Auxiliar->foto_carnet; ?>" alt="Ci" />
                    </picture>
                </td>
                <td>                    
                     <picture>
                         <img class="img-fluid img-thumbnail" src="<?php echo "storage/".$Auxiliar->foto_carnet; ?>" alt="Ci" />
                     </picture>
                </td>
                <td><?php echo $Auxiliar->ci; ?></td>
                <td>
                    <button type="button" class="btn btn-success">Aceptar</button>
                    <button type="button" class="btn btn-danger">Rechazar</button>
                </td>
                <td>
                    <button type="button" class="btn btn-light">Ver detalles</button>
                </td>
              </tr>
             
            </tbody>
          </table>
   
       
    </div>





   <?php
    }
    ?>

</body>
</html>
@endsection