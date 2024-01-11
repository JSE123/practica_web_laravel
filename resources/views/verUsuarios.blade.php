<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista usuarios</title> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
</head>

</head>
<body>
    <table id="tblUsuarios">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           

            <!-- LOS DATOS SE LLENARAN AUTOMATICAMENTE AQUI -->
        </tbody>
    </table>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        // $(document).ready(function(){
        //     $('#tblUsuarios').DataTable({
        //         "ajax": "http://127.0.0.1:8000/api/listarUsuarios",
        //         "columns": [
        //             {"data": "name"},
        //             {"data": "email"}
        //         ]
        //     });
        // });


        $.ajax({
            url: "http://127.0.0.1:8000/api/listarUsuarios",
            method: 'GET',
            success: function(data){
                console.log(data)
            },
            error: function(error){
                console.error('Error al obtener los datos: ', error)
            }

        })

        $(document).ready(function() {
            $('#tblUsuarios').DataTable();
        });
        document.addEventListener('DOMContentLoaded', function(){
            fetch('http://127.0.0.1:8000/api/listarUsuarios')
                .then(response=> response.json())
                .then(data => {
                    if(Array.isArray(data)){
                        console.log(data)
                        $('#tblUsuarios').DataTable().clear().draw();
                        data.forEach(item => {
                            $('#tblUsuarios').DataTable().row.add([
                                item.name,
                                item.email,
                                `<button class="btnEliminar" data-id="${item.id}">Eliminar</button>`
                            ]).draw(false);
                        });
                        
                    }else{
                        console.log("no es un arreglo")
                    }
                })
                .catch(error => {
                    console.error('Error al obtener los datos: ', error);
                });
        })
    </script>
</body>
</html>