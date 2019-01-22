<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro a cursos</title>
</head>
<body>
    <h3>Registrate al curso</h3>
    <form action="service/actions.php" method="post">
        <input type="text" placeholder="nombre" name="name_first">
        <input type="text" placeholder="apellido" name="name_last">
        <input type="email" placeholder="email" name="email">
        <input type="hidden" value="1" name="course">
        <input type="hidden" value="1" name="action">
        <input type="submit" value="Registrar">
    </form>
</body>
</html>