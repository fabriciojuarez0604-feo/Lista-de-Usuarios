<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
}

if (isset($_POST['actualizar'])) {
    $id     = $_POST['id'];
    $nombre = $_POST['nombre'];
    $email  = $_POST['email'];
    $edad   = $_POST['edad'];

    $sql_update = "UPDATE usuarios SET nombre='$nombre', email='$email', edad='$edad' WHERE id=$id";

    if (mysqli_query($conexion, $sql_update)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 400px; }
        div { margin-bottom: 12px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="email"], input[type="number"] { width: 100%; padding: 8px; box-sizing: border-box; }
    </style>
</head>
<body>

    <h2>Editar Usuario</h2>
    <form action="editar.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
        
        <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" required>
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>
        </div>
        <div>
            <label>Edad:</label>
            <input type="number" name="edad" value="<?php echo $usuario['edad']; ?>" required>
        </div>
        <button type="submit" name="actualizar">Actualizar</button>
        <a href="index.php">Cancelar</a>
    </form>

</body>
</html>
