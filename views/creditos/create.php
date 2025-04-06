<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Crédito - KevinCell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <?php if(isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'] ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        
        <h2>Nuevo Crédito</h2>
        
        <form action="/kevincell/credito/store" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="id_cliente" class="form-label">Cliente</label>
                <select class="form-select" id="id_cliente" name="id_cliente" required>
                    <option value="">Seleccione un cliente</option>
                    <?php while ($row = $clientes->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?= $row['Id_Cliente'] ?>">
                            <?= htmlspecialchars($row['Nombre_Completo']) ?> - 
                            <?= htmlspecialchars($row['Identificacion']) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <div class="invalid-feedback">Por favor seleccione un cliente</div>
            </div>

            <div class="mb-3">
                <label for="id_inventario" class="form-label">Producto</label>
                <select class="form-select" id="id_inventario" name="id_inventario" required>
                    <option value="">Seleccione un producto</option>
                    <?php while ($row = $productos->fetch(PDO::FETCH_ASSOC)): ?>
                        <option value="<?= $row['Id'] ?>" data-precio="<?= $row['Precio_Venta'] ?>">
                            <?= htmlspecialchars($row['Nombre_Producto']) ?> - 
                            Stock: <?= $row['Stock'] ?> - 
                            Precio: $<?= number_format($row['Precio_Venta'], 2) ?>
                        </option>
                    <?php endwhile; ?>
                </select>
                <div class="invalid-feedback">Por favor seleccione un producto</div>
            </div>

            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required min="1">
                <div class="invalid-feedback">Por favor ingrese una cantidad válida</div>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio Unitario</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio" readonly>
            </div>

            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" step="0.01" class="form-control" id="total" name="total" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Crédito</button>
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