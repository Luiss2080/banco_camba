<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleCrear.css">

<div class="client-card">
    <div class="card-header">
        <h2 class="title-with-line">Nueva Tarjeta</h2>
    </div>
    <div class="card-body">
        <form id="form-tarjeta" method="POST" action="index.php?controller=tarjeta&action=guardar" class="needs-validation" novalidate>
            
        
            <!-- Campo: Cuenta asociada (selector) -->
            <div class="form-group">
                <label for="idCuenta" class="form-label">Cuenta <span class="required">*</span></label>
                <input type="text" id="cuenta-display" class="form-control" value="- 1234567903 ($)" readonly>
                <input type="hidden" id="idCuenta" name="idCuenta" value="<?php echo isset($idCuenta) ? $idCuenta : ''; ?>">
            </div>
            
            <!-- Título de sección -->
            <div class="section-title">
                <h3>Información de la Tarjeta</h3>
            </div>
            
            <!-- Campo: Tipo de Tarjeta -->
            <div class="form-group">
                <label for="tipoTarjeta" class="form-label">Tipo <span class="required">*</span></label>
                <select id="tipoTarjeta" name="tipoTarjeta" class="form-control" required>
                    <option value="">Seleccione una opción</option>
                    <option value="debito">Débito</option>
                    <option value="credito">Crédito</option>
                </select>
                <div class="invalid-feedback">
                    Seleccione el tipo de tarjeta
                </div>
            </div>
            
            <!-- Campo: Número de Tarjeta -->
            <div class="form-group">
                <label for="nroTarjeta" class="form-label">Número <span class="required">*</span></label>
                <div class="input-group">
                    <input type="text" id="nroTarjeta" name="nroTarjeta" class="form-control" value="<?php echo isset($numeroTarjeta) ? $numeroTarjeta : '4532XXXXXXXX1234'; ?>" pattern="[0-9]{16}" required readonly>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-credit-card"></i></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    El número de tarjeta es requerido
                </div>
                <small class="form-text text-muted">El número se genera automáticamente</small>
            </div>
            
            <!-- Campo: CVV -->
            <div class="form-group">
                <label for="cvv" class="form-label">CVV <span class="required">*</span></label>
                <div class="input-group">
                    <input type="text" id="cvv" name="cvv" class="form-control" value="<?php echo isset($cvv) ? $cvv : '123'; ?>" pattern="[0-9]{3}" maxlength="3" required readonly>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    El CVV es requerido
                </div>
                <small class="form-text text-muted">Código de seguridad de 3 dígitos</small>
            </div>
            
            <!-- Campo: Fecha de Expiración -->
            <div class="form-group">
                <label for="fechaExpiracion" class="form-label">Vigencia <span class="required">*</span></label>
                <div class="input-group">
                    <input type="text" id="fechaExpiracion" name="fechaExpiracion" class="form-control" value="<?php echo isset($fechaExpiracion) ? $fechaExpiracion : '12/28'; ?>" pattern="(0[1-9]|1[0-2])\/[0-9]{2}" maxlength="5" required readonly>
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                </div>
                <div class="invalid-feedback">
                    La fecha de vencimiento es requerida
                </div>
                <small class="form-text text-muted">Formato: MM/AA</small>
            </div>
            
            <!-- Campo: PIN -->
            <div class="form-group">
                <label for="pin" class="form-label">PIN <span class="required">*</span></label>
                <div class="input-group">
                    <input type="password" id="pin" name="pin" class="form-control" pattern="[0-9]{4}" maxlength="4" required>
                    <div class="input-group-append">
                        <button type="button" id="togglePin" class="btn btn-outline-secondary" tabindex="-1">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="invalid-feedback" id="pin-feedback">
                    El PIN es requerido
                </div>
                <small class="form-text text-muted">Debe contener 4 dígitos numéricos</small>
            </div>
            
            <!-- Campo: Estado -->
            <div class="form-group">
                <label for="estado" class="form-label">Estado <span class="required">*</span></label>
                <select id="estado" name="estado" class="form-control" required>
                    <option value="activa" selected>Activa</option>
                    <option value="inactiva">Inactiva</option>
                </select>
                <div class="invalid-feedback">
                    Seleccione un estado
                </div>
            </div>
            
            <!-- Campo oculto para el hash -->
            <input type="hidden" id="hash" name="hash" value="<?php echo isset($hash) ? $hash : md5(uniqid(rand(), true)); ?>">
            
            <!-- Título de sección -->
            <div class="section-title">
                <h3>Información Adicional</h3>
            </div>
            
            <!-- Campo: Límite de Crédito (solo visible si es tarjeta de crédito) -->
            <div class="form-group" id="limite-credito-group" style="display: none;">
                <label for="limiteCredito" class="form-label">Límite de Crédito <span class="required">*</span></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="number" id="limiteCredito" name="limiteCredito" class="form-control" step="0.01" min="0" value="1000">
                </div>
                <small class="form-text text-muted">Límite máximo para tarjetas de crédito</small>
            </div>
            
            <!-- Campo: Notas -->
            <div class="form-group">
                <label for="notas" class="form-label">Notas</label>
                <textarea id="notas" name="notas" class="form-control" rows="3"></textarea>
                <small class="form-text text-muted">Información adicional sobre la tarjeta (opcional)</small>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php?controller=tarjeta&action=listar" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

<style>
.section-title {
    margin-top: 1.5rem;
    margin-bottom: 1rem;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 0.5rem;
}

.section-title h3 {
    font-size: 1.2rem;
    color: #006633;
    margin: 0;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-control:read-only {
    background-color: #f9f9f9;
}

.input-group-text {
    background-color: #f4f4f4;
    border-color: #ced4da;
}

.field-focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 102, 51, 0.25);
}

.btn-primary {
    background-color: #006633;
    border-color: #006633;
}

.btn-primary:hover {
    background-color: #005529;
    border-color: #005529;
}

.required {
    color: #dc3545;
    margin-left: 3px;
}
</style>

<script>
// Validación del formulario con JavaScript
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-tarjeta');
    
    // Validar que el PIN tenga exactamente 4 dígitos
    const pinInput = document.getElementById('pin');
    pinInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '').substring(0, 4);
        
        // Actualizar mensaje de validación personalizado
        if (this.value.length !== 4) {
            this.setCustomValidity('El PIN debe tener 4 dígitos');
            document.getElementById('pin-feedback').textContent = 'El PIN debe tener 4 dígitos';
        } else {
            this.setCustomValidity('');
            document.getElementById('pin-feedback').textContent = 'El PIN es requerido';
        }
    });
    
    // Mostrar/ocultar PIN
    const togglePin = document.getElementById('togglePin');
    togglePin.addEventListener('click', function() {
        const type = pinInput.getAttribute('type') === 'password' ? 'text' : 'password';
        pinInput.setAttribute('type', type);
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });
    
    // Mostrar/ocultar campo de límite de crédito según el tipo de tarjeta
    const tipoTarjetaSelect = document.getElementById('tipoTarjeta');
    const limiteCreditoGroup = document.getElementById('limite-credito-group');
    
    tipoTarjetaSelect.addEventListener('change', function() {
        if (this.value === 'credito') {
            limiteCreditoGroup.style.display = 'block';
            document.getElementById('limiteCredito').setAttribute('required', 'required');
        } else {
            limiteCreditoGroup.style.display = 'none';
            document.getElementById('limiteCredito').removeAttribute('required');
        }
    });
    
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        
        // Validación adicional para el PIN
        if (pinInput.value.length !== 4 || !/^\d{4}$/.test(pinInput.value)) {
            pinInput.setCustomValidity('El PIN debe tener 4 dígitos');
            document.getElementById('pin-feedback').textContent = 'El PIN debe tener 4 dígitos';
            event.preventDefault();
            event.stopPropagation();
        } else {
            pinInput.setCustomValidity('');
        }
        
        form.classList.add('was-validated');
    });
    
    // Mejorar la experiencia de usuario en los campos
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        // Añadir clase cuando el campo recibe el foco
        input.addEventListener('focus', () => {
            input.parentElement.classList.add('field-focus');
        });
        
        // Quitar la clase cuando pierde el foco
        input.addEventListener('blur', () => {
            input.parentElement.classList.remove('field-focus');
        });
    });
});
</script>