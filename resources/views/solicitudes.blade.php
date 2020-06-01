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

              <?php
              $i=0;
                foreach ($Auxiliares as $Auxiliar){
                  $i=$i+1;
              ?>

              <tr>
              <th scope="row">{{$i}}</th>
                <td>        ​   
                    <picture>
                        <img class="img-fluid img-thumbnail" src="<?php echo asset("storage/".$Auxiliar->foto_perfil); ?>" alt="perfil" />
                    </picture>
                </td>
                <td>                    
                     <picture>
                         <img class="img-fluid img-thumbnail" src="<?php echo asset("storage/".$Auxiliar->foto_carnet); ?>" alt="Ci" />
                     </picture>
                </td>
                <td><?php echo $Auxiliar->ci; ?></td>
                <td>
                    <form action="" method="post">
                      <input type="hidden"  name="id_persona" value="<?php echo $Auxiliar->id_persona; ?>">
                      <button type="button" class="btn btn-success">Aceptar</button>
                      <button type="button" class="btn btn-danger">Rechazar</button>
                    </form>
                </td>
                <td>
                    <form action="detalle_auxiliar" method="get">
                      <input type="hidden"  name="id_persona" value="<?php echo $Auxiliar->id_persona; ?>">
                      <input type="submit" class="btn btn-light" value="Ver detalles.">
                    </form>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        
    </div>



</body>
</html>
@endsection