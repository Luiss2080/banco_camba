<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleCrear.css">

<div class="client-card">
    <div class="card-header">
        <h2 class="title-with-line"><?php echo $lang['new_account']; ?></h2>
    </div>
    <div class="card-body">
        <form id="form-cuenta" method="POST" action="index.php?controller=cuenta&action=guardar" class="needs-validation" novalidate>
            <!-- Campo: Cliente -->
            <div class="form-group">
                <label for="idPersona" class="form-label"><?php echo $lang['client']; ?><span class="required">*</span></label>
                <?php if ($cliente): ?>
                    <!-- Cliente ya seleccionado -->
                    <input type="hidden" name="idPersona" value="<?php echo $cliente['idPersona']; ?>">
                    <div class="form-control disabled">
                        <?php echo $cliente['nombre'] . ' ' . $cliente['apellidoPaterno'] . ' ' . $cliente['apellidoMaterno'] . ' - ' . $cliente['ci']; ?>
                    </div>
                <?php else: ?>
                    <!-- Selector de cliente -->
                    <select id="idPersona" name="idPersona" class="form-control" required>
                        <option value=""><?php echo $lang['select_client']; ?></option>
                        <?php foreach ($clientes as $cliente): ?>
                        <option value="<?php echo $cliente['idPersona']; ?>">
                            <?php echo $cliente['nombre'] . ' ' . $cliente['apellidoPaterno'] . ' ' . $cliente['apellidoMaterno'] . ' - ' . $cliente['ci']; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?php echo $lang['client_required']; ?>
                    </div>
                <?php endif; ?>
            </div>
            
            <!-- Campo: Tipo de Cuenta -->
            <div class="form-group">
                <label for="tipoCuenta" class="form-label"><?php echo $lang['account_type']; ?><span class="required">*</span></label>
                <select id="tipoCuenta" name="tipoCuenta" class="form-control" required>
                    <option value=""><?php echo $lang['select_option']; ?></option>
                    <option value="1"><?php echo $lang['savings_account']; ?></option>
                    <option value="2"><?php echo $lang['checking_account']; ?></option>
                </select>
                <div class="invalid-feedback">
                    <?php echo $lang['account_type_required']; ?>
                </div>
            </div>
            
            <!-- Campo: Tipo de Moneda -->
            <div class="form-group">
                <label for="tipoMoneda" class="form-label"><?php echo $lang['currency']; ?><span class="required">*</span></label>
                <select id="tipoMoneda" name="tipoMoneda" class="form-control" required>
                    <option value=""><?php echo $lang['select_option']; ?></option>
                    <option value="1"><?php echo $lang['bolivianos']; ?></option>
                    <option value="2"><?php echo $lang['dollars']; ?></option>
                </select>
                <div class="invalid-feedback">
                    <?php echo $lang['currency_required']; ?>
                </div>
            </div>
            
            <!-- Campo: Saldo Inicial -->
            <div class="form-group">
                <label for="saldoInicial" class="form-label"><?php echo $lang['initial_balance']; ?></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="moneda-symbol">Bs.</span>
                    </div>
                    <input type="number" id="saldoInicial" name="saldoInicial" class="form-control" step="0.01" min="0" value="0">
                </div>
                <small class="form-text text-muted"><?php echo $lang['initial_balance_help']; ?></small>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><?php echo $lang['save']; ?></button>
                <?php if (isset($cliente) && $cliente): ?>
                    <a href="index.php?controller=cliente&action=ver&id=<?php echo $cliente['idPersona']; ?>" class="btn btn-secondary"><?php echo $lang['cancel']; ?></a>
                <?php else: ?>
                    <a href="index.php?controller=cuenta&action=listar" class="btn btn-secondary"><?php echo $lang['cancel']; ?></a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-cuenta');
    const tipoMoneda = document.getElementById('tipoMoneda');
    const monedaSymbol = document.getElementById('moneda-symbol');
    
    // Cambiar el símbolo de moneda según el tipo seleccionado
    tipoMoneda.addEventListener('change', function() {
        if (this.value === '1') {
            monedaSymbol.textContent = 'Bs.';
        } else if (this.value === '2') {
            monedaSymbol.textContent = '$';
        } else {
            monedaSymbol.textContent = '';
        }
    });
    
    // Validación del formulario
    form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        
        form.classList.add('was-validated');
    });
});
</script>