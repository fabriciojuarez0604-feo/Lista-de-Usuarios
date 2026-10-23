<?php
include("conexion.php");

if (isset($_POST['guardar'])) {
    $nombre = $_POST['nombre'];
    $email  = $_POST['email'];
    $edad   = $_POST['edad'];

    $sql = "INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombre', '$email', '$edad')";
    
    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al guardar: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; }
        div { margin-bottom: 12px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>

    <h2>Registrar Nuevo Usuario</h2>
    <form action="crear.php" method="POST">
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div>
            <label>Edad:</label>
            <input type="number" name="edad" required>
        </div>
        <button type="submit" name="guardar">Guardar Usuario</button>
        <a href="index.php">Cancelar</a>
    </form>

</body>
</html>
