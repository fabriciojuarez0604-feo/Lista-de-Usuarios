<?php
include("conexion.php");

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        a.btn { padding: 6px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; display: inline-block; margin-bottom: 15px; }
        a.btn-danger { color: #dc3545; }
    </style>
</head>
<body>

    <h2>Lista de Usuarios</h2>
    <a href="crear.php" class="btn">+ Nuevo Usuario</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['email']; ?></td>
            <td><?php echo $fila['edad']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> | 
                <a href="eliminar.php?id=<?php echo $fila['id']; ?>" class="btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
            </td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
