<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 PDF Example</title>
</head>

<body>

    <h1>{{ $data['title'] }}</h1>
    <h2><strong>Compañía Aseguradora:</strong> {{ $data['cotizacion']['cias'][0]->razon_social }}</h2>
    <h3 class="my-4 "><strong></strong>
        COT-{{ $data['cotizacion']->created_at->format('Y-m') }}-{{ $data['cotizacion']->id }}</h2>

        <p>Este es un ejemplo de cotización</p>
        <p><strong>Marca:</strong> {{ $data['cotizacion']->marca }}</p>
        <p><strong>Modelo:</strong> {{ $data['cotizacion']->modelo }}</p>
        <p><strong>Nº Chasis:</strong> {{ $data['cotizacion']->n_chasis }}</p>
        <p><strong>Nº Motor:</strong> {{ $data['cotizacion']->n_motor }}</p>
        <p><strong>Patente:</strong> {{ $data['cotizacion']->patente }}</p>
        <h2 class="font-bold"><strong> Ejecutiva/o </strong></h2>
        <p><strong>Nombre:</strong> {{ $data['cotizacion']['ejecutivas'][0]->name }}
            {{ $data['cotizacion']['ejecutivas'][0]->last_name }}</p>
        <p><strong>Correo:</strong> {{ $data['cotizacion']['ejecutivas'][0]->email }}</p>



</body>

</html>
