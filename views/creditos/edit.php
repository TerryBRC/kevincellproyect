<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Crédito - KevinCell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Crédito</h2>
        
        <form action="/kevincell/credito/update/<?= $credito['Id'] ?>" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-select" id="id_cliente" name="id_cliente" required>
                    <option value="">Seleccione un cliente</option>
                    <?php foreach($clientes as $cliente): ?>
                        <option value="<?= $cliente['Id_Cliente'] ?>" 
                                <?= ($cliente['Id_Cliente'] == $credito['Id_Cliente']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($cliente['Nombre_Completo']) ?> - 
                            <?= htmlspecialchars($cliente['Identificacion']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">Por favor seleccione un cliente</div>
            </div>

            <div class="mb-3">
                <label for="id_inventario" class="form-label">Producto</label>
                <select class="form-select" id="id_inventario" name="id_inventario" required>
                    <option value="">Seleccione un producto</option>
                    <?php foreach($productos as $producto): ?>
                        <option value="<?= $producto['Id'] ?>" 
                                data-precio="<?= $producto['Precio_Venta'] ?>"
                                data-stock="<?= $producto['Stock'] ?>"
                                <?= ($producto['Id'] == $credito['Id_Inventario']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($producto['Nombre_Producto']) ?> - 
                            Stock: <?= $producto['Stock'] ?> - 
                            Precio: $<?= number_format($producto['Precio_Venta'], 2) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">Por favor seleccione un producto</div>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" 
                       value="<?= htmlspecialchars($credito['Cantidad']) ?>" required min="1">
                <div class="invalid-feedback">Por favor ingrese una cantidad válida</div>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio Unitario</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" 
                       value="<?= htmlspecialchars($credito['Precio']) ?>" required readonly>
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" step="0.01" class="form-control" id="total" name="total" 
                       value="<?= htmlspecialchars($credito['Total']) ?>" required readonly>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Crédito</button>
            <a href="/kevincell/credito" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('id_inventario').addEventListener('change', function() {
            const option = this.options[this.selectedIndex];
            const precio = option.getAttribute('data-precio');
            document.getElementById('precio').value = precio;
            calcularTotal();
        });

        document.getElementById('cantidad').addEventListener('input', calcularTotal);

        function calcularTotal() {
            const precio = parseFloat(document.getElementById('precio').value) || 0;
            const cantidad = parseInt(document.getElementById('cantidad').value) || 0;
            document.getElementById('total').value = (precio * cantidad).toFixed(2);
        }
    </script>
</body>
</html>