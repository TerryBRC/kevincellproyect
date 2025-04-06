<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Créditos - KevinCell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Créditos</h2>
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="/kevincell/credito/create" class="btn btn-primary mb-3">Nuevo Crédito</a>
            </div>
            <div class="col-md-6">
                <form action="/kevincell/credito" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar crédito...">
                    <button type="submit" class="btn btn-outline-primary">Buscar</button>
                </form>
            </div>
        </div>
        
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Id']) ?></td>
                        <td><?= htmlspecialchars($row['Nombre_Completo']) ?></td>
                        <td><?= htmlspecialchars($row['Nombre_Producto']) ?></td>
                        <td>$<?= htmlspecialchars($row['Precio']) ?></td>
                        <td><?= htmlspecialchars($row['Cantidad']) ?></td>
                        <td>$<?= htmlspecialchars($row['Total']) ?></td>
                        <td>$<?= htmlspecialchars($row['Saldo']) ?></td>
                        <td>
                            <a href="/kevincell/credito/view/<?= $row['Id'] ?>" class="btn btn-sm btn-info">Ver</a>
                            <!-- <a href="/kevincell/credito/edit/<= #$row['Id'] ?>" class="btn btn-sm btn-warning">Editar</a> -->
                            <!--<a href="/kevincell/credito/delete/<= $row['Id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro?')">Eliminar</a>-->
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>