<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro a cursos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <!-- Just an image -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="img/logo.png" alt="Logo" width="150">
            </a>
        </nav>
    </header>
    <div class="container containerForm">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1>Formulario de registro al curso HTML / CSS</h1>
                <p>Registrate a este curso y aprender mas sobre los principios de HTML y CSS para comenzar a armar tu
                    futuro personal y profecional.</p>
                <div class="form">
                    <input id="course" type="hidden" value="1" name="course">
                    <input id="action" type="hidden" value="1" name="action">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input id="name_first" type="text" class="form-control" placeholder="Nombre" name="name_first">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Apellido</label>
                        <input id="name_last" type="text" class="form-control" placeholder="Apellido" name="name_last">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input id="email" type="email" class="form-control" placeholder="email" name="email">
                    </div>
                    <button class="btn btn-primary" onclick="registerCourse()">Registrarme</button>
                </div>
            </div>
        </div>
        <div class="container text-center containerSucces" style="display: none;">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h3>!Felicidades! Ya estas inscrito en el curso, te enviaremos un email con la información.</h3>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <h5>Poweres by Login-Cloud</h5>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
</body>

</html>