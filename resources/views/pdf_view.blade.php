<!DOCTYPE html>
<html>

<head>
    <title>EJEMPLO DE PDF A ENVIAR</title>
</head>

<body>


<pre>{{$cotizacion}}</pre>

    <h2><strong>Compañia Aseguradora:</strong> {{$cotizacion['cias'][0]->razon_social}}</h2>
    <h3 class="my-4 "><strong></strong> COT-{{ strtoupper($cotizacion->created_at->format('Y-M'))}}-N{{$cotizacion->n_cotizacion}}</h3>


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
