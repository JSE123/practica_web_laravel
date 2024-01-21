<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon -->
    <!-- estilos -->
    <style>
    /* Estilo personalizado para el borde inferior */
    .borde-inferior {
      border-width: 0 0 2px 0; /* Solo se añade un borde inferior */
      border-color: #000; /* Color del borde (puedes cambiarlo) */
    }
    .borde-inferior:focus{
        outline: none;
        border-width: 0 0 2px 0; /* Solo se añade un borde inferior */
        border-color: #000; 
    }
    .margen-form{
        margin-left: 10px;
    }

    .boton-iniciar{
        border-radius: 15px;
        padding-inline: 70px;
        padding-top: 5px;
        padding-bottom: 5px;
        margin-top: 20px;
    }
    /* stilo para header con login flotante */
    
    

 
    .login ul{
        list-style-type: none;
    }
  
    .login ul li{
        display: inline;
        /* padding: 1px 18px; */
        margin: 0 10px 2px;
        font-size: 1rem;
        font-family: sans-serif;
        font-weight: 100;
        cursor: pointer;
    }

    .login ul li{
        padding: 9px 12px;
        border-radius: 50px;
        background: #e1e6ec;
        /* box-shadow: 3px 3px 10px 1px rgba(0, 0, 0, .2),
                    -3px -3px 10px 1px rgba(255, 255, 255, 1); */

        
    }

    
    .login ul li:active{
        background-color: gray;
        /* box-shadow: inset 3px 3px 10px 1px rgba(  0, 0, 0, .2),
                    inset  -3px -3px 10px 1px rgba(255, 255, 255, 1) */

    }

    .signup-form,
    .login-form{
        position: absolute;
        top: 45%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        border-radius: 10px;
        box-shadow: 3px 3px 10px 1px rgba(0, 0, 0, .2);
        transition: .5s ;
        visibility: hidden;
        opacity: 0; 
    }
    .form{
        width: 500px;
        padding: 20px 50px;
    }

    .form .close{
        text-align: right;
        cursor: pointer;
    }

    .form .text h1{
        text-align: center;
        margin: 30px 0;
    }

    .form form{
        display: block;
        margin: auto;
    }

    .form .fila{
        display: flex;
        justify-content: space-between;
    }

    .form .fila input{
        margin-bottom: 0;
    }

    .form .fila input:first-child{
        margin-right: 10px;
    }
    .form .fila input:last-child{
        margin-left: 10px;
    }

    .form form input{
        width: 100%;
        display: block;
        border: 1px solid #000;
        border-radius: 50px;
        padding: 20px 16px; 
        margin: 20px auto;
        outline: none;
    }

    .signup-form.active,
    .login-form.active{
        top: 50%;
        transition: .5s;
        visibility: visible;
        opacity: 1;
    }

    .contenido.active{
        filter: blur(10px);
        transition: .5s;
        position: relative;
        pointer-events: none;
    }

    

    .ocultar{ /*mensaje de error*/
        display: none;
    }
    .mensaje-error{
        margin-left: 20px;
        color: red;

    }
    /**cambia el color del borde donde hay un error */
    #email-repetido{
        border: red;
    }

    .password-error{
        border: red;
    }

    /* cambios */

        /* .boton-aceptar:active{
            background: rgb(0, 0, 0);
            color: white;

        }

        .cuerpo{
            margin-top: 2rem;
        } */
    /*///////fin/////*/
  </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="contenido">
        <!-- header  -->
        <!-- <nav class="navbar bg-body-tertiary"> -->
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">Inicio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="login">
                        <ul class="navbar-nav ">
                            <li onclick="signupToggle()" class="">Sigup</li>
                            <li onclick="loginToggle()">Login</li>
                        </ul>
                    </div>

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                        <!-- <li class="nav-item">
                            <a class="nav-link text-light" href="#" data-bs-toggle="modal" data-bs-target="#modal_inicio_sesion">Iniciar sesion</a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="http://127.0.0.1:8000/login">Inicio de sesion 1</a>
                        </li>
                         -->
                        
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success text-light" type="submit">Buscar</button>
                    </form>
                </div>

            </div>
            
        </nav>
        @yield('content')
    </div>
    <!-- FORMULARIOS DE LOGIN -->
    <div class="signup-form">
        <div class="form" >
            <div class="close" onclick="signupToggle()">&times;</div>
            <div class="text">
                <h1>Register form</h1>
            </div>
            <form id="datosRegistro" method="POST" enctype="multipart/form-data">
            <!-- <form action="{{Route('registrarse')}}" method="POST" enctype="multipart/form-data"> -->
                @csrf
                <!-- @METHOD('POST') -->
                <div class="fila">
                    <input type="text" name="name" placeholder="First Name">
                    <input type="text"name="last_name"  placeholder="Last Name">
                </div>
                <input type="email" name="email" placeholder="Email ID">
                <input type="Password" class ="password" name="password" placeholder="Password">
                <input type="Password" class ="password" name="password_confirmation" placeholder="Confirm password">
                <input type="submit" value="Register" class="boton-aceptar">
            </form>
        </div>
    </div>
    <div class="login-form" >
        <div class="form">
            <div class="close" onclick="loginToggle()">&times;</div>
            <div class="text">
                <h1>Login</h1>
            </div>
            <form id="login" method="POST" enctype="multipart/form-data">
            <!-- <form action="{{Route('login')}}" method="POST" enctype="multipart/form-data"> -->
                <input type="email" id="email" name="email" placeholder="Email ID">
                <input type="Password" name="password" placeholder="Password">
                <label for="" id="mensajeError" class="ocultar mensaje-error">Usuario o contraseña incorrecta</label>
                <input type="submit" value="Log in" class="boton-aceptar">
            </form>
        </div>
    </div>
       
      
    <!-- FIN FORMULARIOS -->
    <!-- SCRIP FUNCIONAMIENTO DE LOS BOTONES -->
    <script>
        function signupToggle(){
            var container = document.querySelector('.contenido');
            container.classList.toggle('active')
   
            var popup = document.querySelector('.signup-form')
            popup.classList.toggle('active');

        }
        function loginToggle(){
            var container = document.querySelector('.contenido');
            container.classList.toggle('active')
           
            var popup = document.querySelector('.login-form')
            popup.classList.toggle('active');

        }

        document.addEventListener('DOMContentLoaded', function(){
            //LOGIN 
            const datosLogin = document.getElementById("login");
            const labelMensajeError = document.getElementById("mensajeError");

            datosLogin.addEventListener('submit', function(event){

                event.preventDefault();
                const formData = new FormData(datosLogin);

                fetch('http://127.0.0.1:8000/api/login',{
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        labelMensajeError.classList.remove('ocultar');
                        throw new Error('No se pudo obtener la respuesta del servidor.');
                    }
                    return response.json();
                })
                .then(data => {
                    // Manejar los datos obtenidos
                    console.log('Datos recibidos:', data);

                    // // Mostrar los datos en el DOM
                    // const resultadoElemento = document.getElementById('resultado');
                    // resultadoElemento.innerText = `Nombre: ${data.nombre}, Edad: ${data.edad}`;
                })
                .catch(error => {
                    console.error('Error al obtener datos:', error);
                });
            })
            // FIN LOGIN

            // REGISTRO 
            const datosRegistro = document.getElementById('datosRegistro');
            datosRegistro.addEventListener('submit', function(event){

                event.preventDefault();
                const formDataRegistro = new FormData(datosRegistro);

                fetch('http://127.0.0.1:8000/api/registrarse',{
                    method: 'POST',
                    body: formDataRegistro
                })
                .then(response => {
                    if(!response.ok){
                        if (response.status === 400) {
                            // Manejar el caso específico de código de estado 400
                            console.error('Error de cliente: La solicitud es inválida.');
                            
                            // Aquí podrías realizar acciones adicionales, como mostrar un mensaje al usuario.
                        } else {
                            throw new Error('No se pudo obtener la respuesta del servidor.');
                        }

                        // throw new Error('No se pudo obtener la respuesta del servidor.');

                    }
                    console.log(response)
                    return response.json();

                })
                .then(data => {
                    console.log('Data: ', data.error);
                    if(data.error.email){
                        console.log("es el email")
                    }

                })
                .catch(error => {
                    console.error('Error al obtener datos:', error);
                });

            })

            // FIN REGISTRO
            
        });

        
    </script> 
    <!-- FIN FUNCIONAMIENTO -->

    
    <!-- <button type="button" class="btn">Base class</button> -->
    <!-- footer -->

    <!-- script  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
