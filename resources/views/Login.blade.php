<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <!-- estilos  -->
    <style>
        .borde-inferior {
            /* background-color: #000; */

            border-width: 0 0 2px 0; /* Solo se añade un borde inferior */
            border-color: #000; /* Color del borde (puedes cambiarlo) */
        }
    .borde-inferior:focus{
        outline: none;
        border-width: 0 0 2px 0; /* Solo se añade un borde inferior */
        border-color: #000; 
    }
        .contenedor-login{
            padding-top: 30px;
            box-shadow: 0px 0px 15px rgba(31, 98, 113, 0.5);
            width: 300px;
            /* width: 18%; */
            box-shadow: 1px;
            border-radius: 10px;
            background-color: white;
        }

        .boton-iniciar{
        border-radius: 15px;
        margin-top: 20px;
        margin-bottom: 40px;
        }
        h1{
            font-family: 'Roboto', sans-serif;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>
    <div class="contenedor-login m-5">
        <form id="loginForm">
            <h1 class="text-center">Iniciar sesion</h1>
            <div class="form-group ms-3 d-grid gap-2 me-3">
                <label for="username ms-4">Usuario:</label>
                <input type="text" class="borde-inferior" id="username" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="form-group ms-3 mt-3 d-grid gap-2 me-3">
                <label for="password">Contraseña:</label>
                <input type="password" class="borde-inferior" id="password" placeholder="Ingresa tu contraseña" required>
            </div>
            <div class="d-grid gap-2 me-3 mb-3">
                <button type="submit" class="bg-primary ms-2 mt-5 boton-iniciar">Iniciar sesión</button>

            </div>
        </form>
    </div>
    
</body>
</html>