@extends('layouts.header')

@section('content')
<title>Menu</title>
<div>

<?php 
    if (Auth::guard("administrador")->check()){
        echo 'true';
    }else{
        echo 'false';
    }

    ?>

</div>

@endsection