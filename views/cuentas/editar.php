<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleEditar.css">
<div class="client-card edit-mode">
    <div class="card-header">
        <h2 class="title-with-line"><?php echo $lang['edit_account']; ?></h2>
        <div class="edit-badge">
            <span class="edit-icon">✏️</span>
            <span class="edit-text"><?php echo $lang['editing_mode']; ?></span>
        </div>
    </div>
    <div class="card-body">
        <div class="client-info-summary">
            <div class="client-avatar">
                <i class="fas fa-credit-card"></i>
            </div>
            <div class="client-summary">
                <h3><?php echo $clienteModel->nombre . ' ' . $clienteModel->apellidoPaterno; ?></h3>
                <p class="client-id"><?php echo $lang['account_number']; ?>: <?php echo $this->model->nroCuenta; ?></p>
            </div>
        </div>
        
        <form id="form-cuenta" method="POST" action="index.php?controller=cuenta&action=actualizar" class="needs-validation" novalidate>
            <!-- Campo oculto para el ID de la cuenta -->
            <input type="hidden" name="idCuenta" value="<?php echo $this->model->idCuenta; ?>">
            
            <div class="form-grid">
                <!-- Columna izquierda -->
                <div class="form-column">
                    <!-- Información del cliente (solo lectura) -->
                    <div class="form-group">
                        <label for="cliente" class="form-label"><?php echo $lang['client']; ?></label>
                        <input type="text" id="cliente" class="form-control" value="<?php echo $clienteModel->nombre . ' ' . $clienteModel->apellidoPaterno . ' ' . $clienteModel->apellidoMaterno; ?>" readonly>
                    </div>
                    
                    <!-- Número de cuenta (solo lectura) -->
                    <div class="form-group">
                        <label for="nroCuenta" class="form-label"><?php echo $lang['account_number']; ?></label>
                        <input type="text" id="nroCuenta" class="form-control" value="<?php echo $this->model->nroCuenta; ?>" readonly>
                    </div>
                    
                    <!-- Tipo de moneda (solo lectura) -->
                    <div class="form-group">
                        <label for="tipoMoneda" class="form-label"><?php echo $lang['currency']; ?></label>
                        <input type="text" id="tipoMoneda" class="form-control" value="<?php echo $this->model->tipoMoneda == 1 ? $lang['bolivianos'] : $lang['dollars']; ?>" readonly>
                    </div>
                </div>
                
                <!-- Columna derecha -->
                <div class="form-column">
                    <!-- Saldo (solo lectura) -->
                    <div class="form-group">
                        <label for="saldo" class="form-label"><?php echo $lang['balance']; ?></label>
                        <input type="text" id="saldo" class="form-control" value="<?php echo ($this->model->tipoMoneda == 1 ? 'Bs. ' : '$ ') . number_format($this->model->saldo, 2); ?>" readonly>
                    </div>
                    
                    <!-- Fecha de apertura (solo lectura) -->
                    <div class="form-group">
                        <label for="fechaApertura" class="form-label"><?php echo $lang['opening_date']; ?></label>
                        <input type="text" id="fechaApertura" class="form-control" value="<?php echo date('d/m/Y', strtotime($this->model->fechaApertura)); ?>" readonly>
                    </div>
                    
                    <!-- Campo: Tipo de Cuenta (editable) -->
                    <div class="form-group">
                        <label for="tipoCuenta" class="form-label"><?php echo $lang['account_type']; ?><span class="required">*</span></label>
                        <select id="tipoCuenta" name="tipoCuenta" class="form-control" required>
                            <option value="1" <?php echo $this->model->tipoCuenta == 1 ? 'selected' : ''; ?>><?php echo $lang['savings_account']; ?></option>
                            <option value="2" <?php echo $this->model->tipoCuenta == 2 ? 'selected' : ''; ?>><?php echo $lang['checking_account']; ?></option>
                        </select>
                        <div class="invalid-feedback">
                            <?php echo $lang['account_type_required']; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Campo: Estado (editable) - A ancho completo -->
            <div class="form-group full-width">
                <label for="estado" class="form-label"><?php echo $lang['status']; ?><span class="required">*</span></label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="1" <?php echo $this->model->estado == 1 ? 'selected' : ''; ?>><?php echo $lang['active']; ?></option>
                    <option value="2" <?php echo $this->model->estado == 2 ? 'selected' : ''; ?>><?php echo $lang['inactive']; ?></option>
                </select>
                <div class="invalid-feedback">
                    <?php echo $lang['status_required']; ?>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> <?php echo $lang['save']; ?>
                </button>
                <a href="index.php?controller=cuenta&action=ver&id=<?php echo $this->model->idCuenta; ?>" class="btn btn-secondary">
                    <i class="fas fa-times"></i> <?php echo $lang['cancel']; ?>
                </a>
            </div>
        </form>
    </div>
</div>

<script>
// Validación del formulario con JavaScript
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-cuenta');
    
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        
        form.classList.add('was-validated');
    });
    
    // Mejorar la experiencia de usuario en los campos
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        // No aplicar efectos a campos de solo lectura
        if (input.hasAttribute('readonly')) {
            input.classList.add('read-only');
            return;
        }
        
        // Añadir clase cuando el campo recibe el foco
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('field-focus');
        });
        
        // Quitar la clase cuando pierde el foco
        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('field-focus');
            
            // Añadir clase si el campo ha sido modificado
            if (input.value !== input.defaultValue) {
                input.classList.add('field-modified');
                input.parentElement.classList.add('has-changes');
            } else {
                input.classList.remove('field-modified');
                input.parentElement.classList.remove('has-changes');
            }
        });
    });
    
    // Mostrar alerta de confirmación al salir sin guardar cambios
    let formModified = false;
    
    inputs.forEach(input => {
        // Solo detectar cambios en campos editables
        if (!input.hasAttribute('readonly')) {
            input.addEventListener('change', () => {
                formModified = true;
            });
        }
    });
    
    window.addEventListener('beforeunload', function(e) {
        if (formModified) {
            e.preventDefault();
            e.returnValue = '';
        }
    });
    
    // Desactivar advertencia al enviar el formulario
    form.addEventListener('submit', () => {
        formModified = false;
    });
    
    // Desactivar advertencia al hacer clic en Cancelar
    document.querySelector('.btn-secondary').addEventListener('click', () => {
        formModified = false;
    });
});
</script>