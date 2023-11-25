<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form id="formulario" action="{{route('register.register_create')}}" method="POST" enctype="multipart/form-data" class="row g-3">
        @csrf

        <input type="text" class="form-control" id="username" placeholder="username" name="username" required/>
        <input type="text" class="form-control" id="email" placeholder="email" name="email" required/>
        <input type="text" class="form-control" id="password" placeholder="password" name="password" required/>
        <input type="text" class="form-control" id="password_confirmation" placeholder="password_confirmation" name="password_confirmation" required/>
        <button type="submit" class="btn btn-primary" id="guardar-btn">Registrarse</button> 
    </form>
    
</body>
</html>