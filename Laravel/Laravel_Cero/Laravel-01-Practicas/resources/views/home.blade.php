<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div class="max-w-4xl mx-auto px-4">
        {{-- <h1>Bienvendio a Laravel!</h1> --}}

        {{-- alerta dinamica --}}
        <x-alert type="danger">
            <x-slot name="title">
                No se encuantran posts!
            </x-slot>
            contenido de la alerta
        </x-alert>

    </div>
</body>
</html>