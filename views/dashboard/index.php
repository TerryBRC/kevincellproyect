<div class="container mt-4">
    <h2 class="mb-4">Dashboard</h2>
    
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Total Clientes</h5>
                    <p class="card-text h2"><?= $total_clientes ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Productos</h5>
                    <p class="card-text h2"><?= $total_productos ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Créditos Activos</h5>
                    <p class="card-text h2"><?= $creditos_activos ?></p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total por Cobrar</h5>
                    <p class="card-text h2">$<?= number_format($total_por_cobrar, 2) ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Últimos Créditos</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Monto</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($ultimos_creditos as $credito): ?>
                                <tr>
                                    <td><?= htmlspecialchars($credito['Nombre_Completo']) ?></td>
                                    <td>$<?= number_format($credito['Total'], 2) ?></td>
                                    <td>$<?= number_format($credito['Saldo'], 2) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Productos con Bajo Stock</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Stock Actual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos_bajo_stock as $producto): ?>
                                <tr>
                                    <td><?= htmlspecialchars($producto['Nombre_Producto']) ?></td>
                                    <td><?= $producto['Stock'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>