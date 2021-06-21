<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
</head>
<body>
    <div>
        <p>
            Por este medio se solicita una activación del usuario: {{$name}}.            
        </p>        
    </div>
    <a href="{{url('empleado/'.$empleadocod.'/edit')}}">
        Proceso de reactivación de cuenta
    </a>
</body>
</html>