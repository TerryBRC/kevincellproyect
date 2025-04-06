<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente - KevinCell</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Editar Cliente</h2>
        
        <form action="/kevincell/cliente/update/<?= $cliente['Id_Cliente'] ?>" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" 
                       value="<?= htmlspecialchars($cliente['Nombre_Completo']) ?>" required>
                <div class="invalid-feedback">Por favor ingrese el nombre completo</div>
            </div>

            <div class="mb-3">
                <label for="identificacion" class="form-label">Identificación</label>
                <input type="text" class="form-control" id="identificacion" name="identificacion" 
                       value="<?= htmlspecialchars($cliente['Identificacion']) ?>" required>
                <div class="invalid-feedback">Por favor ingrese la identificación</div>
            </div>

            <div class="mb-3">
                <label for="tel" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="tel" name="tel" 
                       value="<?= htmlspecialchars($cliente['Tel']) ?>" required>
                <div class="invalid-feedback">Por favor ingrese un número de teléfono válido</div>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
            <a href="/kevincell/cliente" class="btn btn-secondary">Cancelar</a>
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