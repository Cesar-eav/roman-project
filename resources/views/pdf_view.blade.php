<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 PDF Example</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Este es un ejemplo de cotización</p>



    <p><strong>Marca:</strong> {{$cotizacion->marca}}</p>
    <p><strong>Modelo:</strong> {{$cotizacion->modelo}}</p>
    <p><strong>Nº Chasis:</strong> {{$cotizacion->n_chasis}}</p>
    <p><strong>Nº Motor:</strong> {{$cotizacion->n_motor}}</p>
    <p><strong>Patente:</strong> {{$cotizacion->patente}}</p>
    <p><strong>Comañia Aseguradora:</strong> {{$cotizacion['cias'][0]->razon_social}}</p>

    <p class="font-bold text-2xl">Ejecutiva</p>
    <p><strong>Nombre:</strong> {{$cotizacion['ejecutivas'][0]->name}} {{$cotizacion['ejecutivas'][0]->last_name}}</p>
    {{-- @foreach ($cotizacion as $cotizacionData)
      
    {{ $cotizacionData }}
      
    @endforeach --}}
</body>

</html>
