<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 PDF Example</title>
</head>

<body>

    {{-- <h1>{{ $title }}</h1> --}}
    <h2><strong>Compañia Aseguradora:</strong> {{$cotizacion['cias'][0]->razon_social}}</h2>
    <h3 class="my-4 "><strong></strong> COT-{{ $cotizacion->created_at->format('Y-m') }}-{{ $cotizacion->id }}</h2>

    <p>Este es un ejemplo de cotización</p>


    <p><strong>Marca:</strong> {{$cotizacion->marca}}</p>
    <p><strong>Modelo:</strong> {{$cotizacion->modelo}}</p>
    <p><strong>Nº Chasis:</strong> {{$cotizacion->n_chasis}}</p>
    <p><strong>Nº Motor:</strong> {{$cotizacion->n_motor}}</p>
    <p><strong>Patente:</strong> {{$cotizacion->patente}}</p>

    <h2 class="font-bold"><strong> Ejecutiva/o </strong></h2>
    <p><strong>Nombre:</strong> {{$cotizacion['ejecutivas'][0]->name}} {{$cotizacion['ejecutivas'][0]->last_name}}</p>
    <p><strong>Correo:</strong> {{$cotizacion['ejecutivas'][0]->email}}</p>
    
    {{-- @foreach ($cotizacion as $cotizacionData)
      
    {{ $cotizacionData }}
      
    @endforeach --}}
</body>

</html>
