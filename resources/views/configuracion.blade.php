@extends('layouts.header')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Configuracion</title>




</head>
<body>
    <div class="container-fluid">
        <h1 class="mt-4">Configuración</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Administrar configuraciones.</li>
        </ol>


        <form action="/modificar_terminos_condiciones" method="POST">
            {{ csrf_field() }}
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Terminos y condiciones</span>
                </div>
                <textarea class="form-control" rows="10" name="terminos_condiciones" >
                    <?php echo $configuraciones->terminos_condiciones; ?>
                </textarea>
            </div>
            <br>
            <input type="submit" class="btn btn-success" value="Actualizar terminos y condiciones.">
        </form>
       
    </div>

    

    
</body>
</html>


@endsection