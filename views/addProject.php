<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
    <title>Agregar Proyecto</title>
</head>
<body>
    <div class="container">
        <h1>Add Project</h1>

        <form action="/projects/add" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Ingrese un titulo para el proyecto">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="20" rows="5" class="form-control" placeholder="Ingrese una descripción detallada del proyecto elaborado"></textarea>
            </div>
            <div class="form-group">
                <label for="technologies">Tecnologies</label>
                <input type="text" name="technologies" class="form-control" placeholder="Ingrese las tecnologías aplicadas (separar por comas)">
            </div>
            <input type="submit" name="enviar" value="Enviar Registro" class="btn btn-primary">
        </form>
        
    </div>
</body>
</html>