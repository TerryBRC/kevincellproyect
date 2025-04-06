<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle de Crédito - KevinCell</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <h2>Detalle del Crédito</h2>
            </div>
            <div class="col-md-4 text-end">
                <a href="/kevincell/credito" class="btn btn-secondary">Volver</a>
                <a href="/kevincell/abono/create/<?= $credito['Id'] ?>" class="btn btn-success">Realizar Abono</a>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h5>Información del Crédito</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Cliente:</strong> <?= htmlspecialchars($credito['Nombre_Completo']) ?></p>
                        <p><strong>Producto:</strong> <?= htmlspecialchars($credito['Nombre_Producto']) ?></p>
                        <p><strong>Cantidad:</strong> <?= htmlspecialchars($credito['Cantidad']) ?></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Precio Unitario:</strong> $<?= number_format($credito['Precio'], 2) ?></p>
                        <p><strong>Total:</strong> $<?= number_format($credito['Total'], 2) ?></p>
                        <p><strong>Saldo Pendiente:</strong> $<?= number_format($credito['Saldo'], 2) ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-header">
                <h5>Historial de Abonos</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Monto</th>
                            <th>Método de Pago</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($abonos as $abono): ?>
                        <tr>
                            <td><?= date('d/m/Y', strtotime($abono['Fecha'])) ?></td>
                            <td>$<?= number_format($abono['Monto'], 2) ?></td>
                            <td><?= htmlspecialchars($abono['Metodo_Pago']) ?></td>
                            <td><?= htmlspecialchars($abono['Observaciones']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>