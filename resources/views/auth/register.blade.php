<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite([  // aqui se llama los archivos CSS del proyecto
    'resources/css/registro.css',     
    ])
    <title>Register</title>
</head>
<body>
    <div class="container">
        <section id="content">
         <form id="formulario" action="{{route('register.register_create')}}" method="POST" enctype="multipart/form-data" class="row g-3">
		   @csrf
            <h1>Registro</h1>
            <div>
              <input type="text" class="form-control" id="username" placeholder="username" name="username" required/>
            </div>
             <div>
              <input type="text" class="form-control" id="email" placeholder="email" name="email" required/>
            </div>
             <div>
              <input type="text" class="form-control" id="password" placeholder="password" name="password" required/>
            </div>
            <div>
              <input type="text" class="form-control" id="password_confirmation" placeholder="password_confirmation" name="password_confirmation" required/>
            </div>
            <div>
                <input type="submit" value="Registrarse"> 
            </div>
		</form>
         </div><!-- container -->
    
</body>
</html>