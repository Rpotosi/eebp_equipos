<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite([  // aqui se llama los archivos CSS del proyecto
        'resources/css/login.css',     
    ])
    <!--styles start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!--styles end-->

    <title>EEBP</title>
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="../resources/img/eebp4.png" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="http://localhost/projects/eebp_equipos/public/" method="POST">

                        @csrf <!-- este es un complemento de laravel por seguridad--->

                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">EEBP S.A. E.S.P</p>                        
                        </div>
            
                        <div class="divider d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0"></p>
                        </div>
            
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="form3Example3" class="form-control form-control-lg" placeholder="Ingrese su correo" name="username" />
                            <label class="form-label" for="form3Example3">Email</label>
                        </div>
            
                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <input type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Ingrese su contraseña" name="password"/>
                            <label class="form-label" for="form3Example4">Password</label>
                        </div>
        
                        <div class="d-flex justify-content-between align-items-center"></div>
                        <div class="registro">    
                            <a href="{{route('register.show')}}">Registrarse</a>
                        </div>
            
                        <a href="home">
                            <button type="submit" class="btn btn-secondary" > 
                                Ingresar
                                @if(session()->has('error'))  <!-- Inio : codigo alerta para validad con el controlador LoginController-->
                                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <script>
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: "{{session('error')}}",
                                            confirmButtonText: 'Aceptar',
                                            confirmButtonColor: '#0D4F7F',
                                            confirmButtonTextColor: '#fff', 
                                        });
                                    </script>
                                @endif    <!-- FIN: codigo alerta para validad con el controlador LoginController-->
                            </button>
                        </a>            
                    </form>
                </div>
            </div>
        </div>
        <div class="copy">
            <!-- Copyright start -->
            <div class="text-Blue mb-2 mb-md-0">
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
           
            Copyright &copy; 2023|&nbsp;All rights reserved |&nbsp; Ing.Richard Potosi 
        </div>


            <!-- Copyright end-->
 
        </div>
    </section>    
</body>
</html>
