<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h2>Nuevo Abono</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="/kevincell/credito/view/<?= $credito['Id'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <form action="/kevincell/abono/store" method="POST" class="needs-validation" novalidate>
                <input type="hidden" name="id_credito" value="<?= $credito['Id'] ?>">
                
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($credito['Nombre_Completo']) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Saldo Pendiente</label>
                    <input type="text" class="form-control" value="$<?= number_format($credito['Saldo'], 2) ?>" readonly>
                </div>

                <div class="mb-3">
                    <label for="abono" class="form-label">Monto del Abono</label>
                    <input type="number" step="0.01" class="form-control" id="abono" name="abono" required>
                    <div class="invalid-feedback">Por favor ingrese el monto del abono</div>
                </div>

                <div class="mb-3">
                    <label for="metodo_pago" class="form-label">Método de Pago</label>
                    <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Transferencia">Transferencia</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones</label>
                    <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Guardar Abono</button>
            </form>
        </div>
    </div>
</div>