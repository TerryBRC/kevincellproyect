<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto - KevinCell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Producto</h2>
        
        <form action="/kevincell/inventario/update/<?= $producto['Id'] ?>" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nombre_producto" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" 
                       value="<?= htmlspecialchars($producto['Nombre_Producto']) ?>" required>
                <div class="invalid-feedback">Por favor ingrese el nombre del producto</div>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?= htmlspecialchars($producto['Descripcion']) ?></textarea>
                <div class="invalid-feedback">Por favor ingrese una descripción</div>
            </div>

            <div class="mb-3">
                <label for="precio_venta" class="form-label">Precio de Venta</label>
                <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" 
                       value="<?= htmlspecialchars($producto['Precio_Venta']) ?>" required>
                <div class="invalid-feedback">Por favor ingrese el precio de venta</div>
            </div>

            <div class="mb-3">
                <label for="precio_compra" class="form-label">Precio de Compra</label>
                <input type="number" step="0.01" class="form-control" id="precio_compra" name="precio_compra" 
                       value="<?= htmlspecialchars($producto['Precio_Compra']) ?>" required>
                <div class="invalid-feedback">Por favor ingrese el precio de compra</div>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" 
                       value="<?= htmlspecialchars($producto['Stock']) ?>" required min="0">
                <div class="invalid-feedback">Por favor ingrese la cantidad en stock</div>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            <a href="/kevincell/inventario" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        (function () {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>
</html>