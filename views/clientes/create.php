<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Cliente - KevinCell</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Registrar Nuevo Cliente</h2>
        
        <form action="/kevincell/cliente/create" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="nombre_completo" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
                <div class="invalid-feedback">
                    Por favor ingrese el nombre completo
                </div>
            </div>

            <div class="mb-3">
                <label for="identificacion" class="form-label">Identificación</label>
                <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                <div class="invalid-feedback">
                    Por favor ingrese la identificación
                </div>
            </div>

            <div class="mb-3">
                <label for="tel" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" id="tel" name="tel" required>
                <div class="invalid-feedback">
                    Por favor ingrese un número de teléfono válido
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Cliente</button>
            <a href="/kevincell/cliente" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

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