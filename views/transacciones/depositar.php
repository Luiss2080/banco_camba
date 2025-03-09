<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depósito de Fondos - Banco Mercantil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0B6E24;
            --primary-dark: #075019;
            --primary-light: #f0f7f2;
            --secondary: #FAD02C;
            --success: #28a745;
            --success-dark: #1e7e34;
            --text-color: #333333;
            --text-muted: #6c757d;
            --border-color: #ced4da;
            --white: #ffffff;
        }
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: var(--text-color);
            padding: 0;
            margin: 0;
        }
        
        /* Page header */
        .page-header {
            background-color: var(--primary);
            color: var(--white);
            padding: 15px;
            margin-bottom: 20px;
            position: relative;
        }
        
        .page-header h2 {
            font-size: 20px;
            margin: 0;
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .page-header h2 i {
            margin-right: 10px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        .page-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--secondary);
        }
        
        /* Alert box */
        .alert-box {
            padding: 15px;
            margin: 0 20px 20px 20px;
            border-left: 4px solid;
            background-color: #f8f9fa;
            border-radius: 4px;
            animation: fadeInLeft 0.5s ease;
        }
        
        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .alert-info {
            border-color: var(--primary);
        }
        
        .alert-box i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        /* Form styles */
        .form-container {
            background-color: var(--white);
            border: 1px solid #ddd;
            margin: 0 20px 20px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .form-section {
            padding: 25px;
        }
        
        .form-label {
            font-weight: 600;
            color: var(--text-color);
            margin-bottom: 10px;
            display: block;
            font-size: 16px;
        }
        
        .form-label .required {
            color: #dc3545;
            margin-left: 3px;
        }
        
        .form-control {
            border: 2px solid var(--border-color);
            border-radius: 8px;
            padding: 15px 15px 15px 50px;
            width: 100%;
            font-size: 18px;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(11, 110, 36, 0.25);
            outline: none;
        }
        
        .form-control::placeholder {
            color: #adb5bd;
            font-size: 16px;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 25px;
        }
        
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary);
            font-size: 20px;
            z-index: 5;
        }
        
        .btn {
            padding: 12px 25px;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: var(--white);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: var(--white);
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .btn-success {
            background-color: var(--success);
            color: var(--white);
        }
        
        .btn-success:hover {
            background-color: var(--success-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }
        
        /* Dynamic help section */
        .help-cards {
            margin: 0 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .help-card {
            flex: 1 0 calc(50% - 15px);
            min-width: 250px;
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            border-top: 3px solid var(--primary);
            cursor: pointer;
            transition: all 0.3s;
            opacity: 0;
            animation: fadeInUp 0.5s ease forwards;
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .help-card:nth-child(1) { animation-delay: 0.1s; }
        .help-card:nth-child(2) { animation-delay: 0.2s; }
        .help-card:nth-child(3) { animation-delay: 0.3s; }
        .help-card:nth-child(4) { animation-delay: 0.4s; }
        
        .help-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .help-card-icon {
            font-size: 24px;
            color: var(--primary);
            margin-bottom: 10px;
            display: inline-block;
        }
        
        .help-card-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary);
        }
        
        .help-card-text {
            color: var(--text-muted);
            font-size: 14px;
            line-height: 1.4;
        }
        
        /* Example accounts section */
        .example-accounts {
            margin: 30px 20px;
            background-color: var(--white);
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        
        .accounts-title {
            font-size: 18px;
            color: var(--primary);
            margin-bottom: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .accounts-title i {
            margin-right: 10px;
        }
        
        .account-cards {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 15px;
        }
        
        .account-card {
            flex: 1 0 calc(33.33% - 15px);
            min-width: 200px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            border-radius: 10px;
            padding: 15px;
            position: relative;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s;
            opacity: 0;
            animation: fadeInUp 0.5s ease forwards;
            animation-delay: 0.5s;
        }
        
        .account-card:nth-child(2) { animation-delay: 0.6s; }
        .account-card:nth-child(3) { animation-delay: 0.7s; }
        
        .account-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        .account-card-chip {
            width: 30px;
            height: 20px;
            background: var(--secondary);
            border-radius: 3px;
            margin-bottom: 15px;
        }
        
        .account-card-type {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 12px;
            background: rgba(255,255,255,0.2);
            padding: 3px 8px;
            border-radius: 3px;
        }
        
        .account-card-number {
            font-family: monospace;
            font-size: 16px;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }
        
        .account-card-name {
            font-size: 12px;
            text-transform: uppercase;
            opacity: 0.8;
        }
        
        /* Scan animation */
        .scan-animation {
            position: absolute;
            width: 100%;
            height: 2px;
            background: var(--secondary);
            top: 0;
            left: 0;
            opacity: 0;
            animation: scanLine 2s infinite;
            pointer-events: none;
        }
        
        @keyframes scanLine {
            0%, 100% { top: 0; opacity: 0; }
            50% { top: 100%; opacity: 1; }
        }
        
        /* Custom animations */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .shake {
            animation: shake 0.5s;
        }
        
        /* Toast notification */
        .toast-notification {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0,0,0,0.8);
            color: white;
            padding: 12px 20px;
            border-radius: 6px;
            z-index: 9999;
            max-width: 80%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            font-size: 14px;
            animation: fadeInUp 0.3s ease;
        }
        
        /* Loader animation */
        .loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10000;
        }
        
        .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(11, 110, 36, 0.2);
            border-radius: 50%;
            border-top-color: var(--primary);
            animation: spin 1s ease-in-out infinite;
            margin-bottom: 15px;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        .loading-text {
            color: var(--primary);
            font-weight: 600;
        }
        
        /* Account info styles */
        .account-info-card, 
        .client-info-card {
            background-color: var(--white);
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            border-top: 3px solid var(--primary);
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .info-card-title {
            color: var(--primary);
            font-size: 18px;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }
        
        .info-card-title i {
            margin-right: 10px;
        }
        
        .balance-text {
            color: var(--primary);
            font-size: 18px;
            font-weight: 600;
        }
        
        /* Deposit specific styles */
        .deposit-icon {
            color: var(--success);
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .help-card {
                flex: 1 0 100%;
            }
            
            .account-card {
                flex: 1 0 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Page header -->
    <div class="page-header">
        <h2><i class="fas fa-hand-holding-usd deposit-icon"></i> 
            <?php echo isset($lang['deposit_funds']) ? $lang['deposit_funds'] : 'Depósito de Fondos'; ?>
        </h2>
    </div>
    
    <?php
    // Determine which view to show based on if cuenta is set
    $showSearchForm = !isset($cuenta);
    ?>
    
    <!-- Alert information (only show in search view) -->
    <?php if ($showSearchForm): ?>
    <div class="alert-box alert-info">
        <i class="fas fa-info-circle"></i> 
        <?php echo isset($lang['enter_account_number_to_deposit']) ? $lang['enter_account_number_to_deposit'] : 'Ingrese el número de cuenta en la cual desea realizar el depósito.'; ?>
    </div>
    <?php endif; ?>
    
    <!-- Form container -->
    <div class="form-container">
        <div class="form-section">
            <?php if ($showSearchForm): ?>
            <!-- Formulario para buscar cuenta -->
            <form method="POST" action="index.php?controller=transaccion&action=buscarCuentaDeposito" id="searchForm">
                <div class="input-group">
                    <label for="nroCuenta" class="form-label">
                        <?php echo isset($lang['account_number']) ? $lang['account_number'] : 'Número de Cuenta'; ?> 
                        <span class="required">*</span>
                    </label>
                    <i class="fas fa-university input-icon"></i>
                    <input type="text" id="nroCuenta" name="nroCuenta" class="form-control" 
                           required placeholder="Ingrese el número de cuenta" autofocus>
                    <div class="scan-animation"></div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary" id="searchButton">
                        <i class="fas fa-search"></i> 
                        <?php echo isset($lang['search']) ? $lang['search'] : 'Buscar'; ?>
                    </button>
                    <a href="index.php?controller=transaccion&action=listar" class="btn btn-secondary">
                        <i class="fas fa-times"></i> 
                        <?php echo isset($lang['cancel']) ? $lang['cancel'] : 'Cancelar'; ?>
                    </a>
                </div>
            </form>
            <?php else: ?>
            <!-- Formulario para realizar depósito -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="account-info-card">
                        <h4 class="info-card-title">
                            <i class="fas fa-university"></i> 
                            <?php echo isset($lang['account_information']) ? $lang['account_information'] : 'Información de la Cuenta'; ?>
                        </h4>
                        <table class="table">
                            <tr>
                                <th width="40%"><?php echo isset($lang['account_number']) ? $lang['account_number'] : 'Número de Cuenta'; ?>:</th>
                                <td><?php echo $cuenta->nroCuenta; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo isset($lang['account_type']) ? $lang['account_type'] : 'Tipo de Cuenta'; ?>:</th>
                                <td>
                                    <?php 
                                    if (isset($lang['savings_account']) && isset($lang['checking_account'])) {
                                        echo $cuenta->tipoCuenta == 1 ? $lang['savings_account'] : $lang['checking_account'];
                                    } else {
                                        echo $cuenta->tipoCuenta == 1 ? 'Cuenta de Ahorros' : 'Cuenta Corriente';
                                    }
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th><?php echo isset($lang['currency']) ? $lang['currency'] : 'Moneda'; ?>:</th>
                                <td>
                                    <?php 
                                    if (isset($lang['bolivianos']) && isset($lang['dollars'])) {
                                        echo $cuenta->tipoMoneda == 1 ? $lang['bolivianos'] : $lang['dollars'];
                                    } else {
                                        echo $cuenta->tipoMoneda == 1 ? 'Bolivianos' : 'Dólares';
                                    }
                                    ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="client-info-card">
                        <h4 class="info-card-title">
                            <i class="fas fa-user"></i> 
                            <?php echo isset($lang['client_information']) ? $lang['client_information'] : 'Información del Cliente'; ?>
                        </h4>
                        <table class="table">
                            <tr>
                                <th width="40%"><?php echo isset($lang['name']) ? $lang['name'] : 'Nombre'; ?>:</th>
                                <td><?php echo $cliente->nombre; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo isset($lang['last_name']) ? $lang['last_name'] : 'Apellido'; ?>:</th>
                                <td><?php echo $cliente->apellidoPaterno . ' ' . $cliente->apellidoMaterno; ?></td>
                            </tr>
                            <tr>
                                <th><?php echo isset($lang['id_number']) ? $lang['id_number'] : 'Número de Identificación'; ?>:</th>
                                <td><?php echo $cliente->ci; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            
            <form method="POST" action="index.php?controller=transaccion&action=procesarDeposito" class="needs-validation" novalidate id="depositForm">
                <input type="hidden" name="idCuenta" value="<?php echo $cuenta->idCuenta; ?>">
                
                <div class="form-group mb-4">
                    <label for="monto" class="form-label">
                        <?php echo isset($lang['amount']) ? $lang['amount'] : 'Monto'; ?> <span class="required">*</span>
                    </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><?php echo $cuenta->tipoMoneda == 1 ? 'Bs.' : '$'; ?></span>
                        </div>
                        <input type="number" id="monto" name="monto" class="form-control" step="0.01" min="0.01" required>
                        <div class="invalid-feedback">
                            <?php echo isset($lang['amount_required']) ? $lang['amount_required'] : 'Por favor ingrese un monto válido.'; ?>
                        </div>
                    </div>
                </div>
                
                <div class="form-group mb-4">
                    <label for="descripcion" class="form-label">
                        <?php echo isset($lang['description']) ? $lang['description'] : 'Descripción'; ?>
                    </label>
                    <textarea id="descripcion" name="descripcion" class="form-control" rows="3"><?php echo isset($lang['deposit']) ? $lang['deposit'] : 'Depósito de efectivo'; ?></textarea>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-hand-holding-usd"></i> 
                        <?php echo isset($lang['deposit']) ? $lang['deposit'] : 'Depositar'; ?>
                    </button>
                    <a href="index.php?controller=cuenta&action=ver&id=<?php echo $cuenta->idCuenta; ?>" class="btn btn-secondary">
                        <i class="fas fa-times"></i> 
                        <?php echo isset($lang['cancel']) ? $lang['cancel'] : 'Cancelar'; ?>
                    </a>
                </div>
            </form>
            <?php endif; ?>
        </div>
    </div>
    
    <?php if ($showSearchForm): ?>
    <!-- Dynamic help cards (only in search view) -->
    <div class="help-cards">
        <div class="help-card" onclick="showHelp('account')">
            <div class="help-card-icon"><i class="fas fa-id-card"></i></div>
            <div class="help-card-title">¿Dónde encontrar el número de cuenta?</div>
            <div class="help-card-text">El número aparece en la libreta, tarjeta de débito o app móvil</div>
        </div>
        
        <div class="help-card" onclick="showHelp('deposit-types')">
            <div class="help-card-icon"><i class="fas fa-money-bill-wave"></i></div>
            <div class="help-card-title">Tipos de depósito</div>
            <div class="help-card-text">Puede realizar depósitos en efectivo, cheque o transferencia</div>
        </div>
        
        <div class="help-card" onclick="showHelp('deposit-limits')">
            <div class="help-card-icon"><i class="fas fa-chart-line"></i></div>
            <div class="help-card-title">Límites de depósito</div>
            <div class="help-card-text">Consulte los límites según el tipo de cuenta y canal utilizado</div>
        </div>
        
        <div class="help-card" onclick="showHelp('deposit-time')">
            <div class="help-card-icon"><i class="fas fa-clock"></i></div>
            <div class="help-card-title">Tiempo de acreditación</div>
            <div class="help-card-text">Los depósitos en efectivo se acreditan de inmediato</div>
        </div>
    </div>
    
    <!-- Example accounts section (only in search view) -->
    <div class="example-accounts">
        <div class="accounts-title">
            <i class="fas fa-credit-card"></i> Ejemplos de Cuentas
        </div>
        <div class="account-cards">
            <div class="account-card" onclick="fillAccountNumber('1234567890')">
                <div class="account-card-chip"></div>
                <div class="account-card-type">Ahorros</div>
                <div class="account-card-number">1234 5678 90</div>
                <div class="account-card-name">Cuenta Personal</div>
            </div>
            
            <div class="account-card" onclick="fillAccountNumber('0987654321')">
                <div class="account-card-chip"></div>
                <div class="account-card-type">Corriente</div>
                <div class="account-card-number">0987 6543 21</div>
                <div class="account-card-name">Cuenta Empresarial</div>
            </div>
            
            <div class="account-card" onclick="fillAccountNumber('5678901234')">
                <div class="account-card-chip"></div>
                <div class="account-card-type">Nómina</div>
                <div class="account-card-number">5678 9012 34</div>
                <div class="account-card-name">Cuenta Salario</div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Account search form handling
        const searchForm = document.getElementById('searchForm');
        const accountInput = document.getElementById('nroCuenta');
        
        if (searchForm && accountInput) {
            // Focus on account input field
            accountInput.focus();
            
            // Format account number input (numbers only)
            accountInput.addEventListener('input', function(e) {
                // Remove non-digits
                let value = this.value.replace(/\D/g, '');
                
                // Truncate to max 10 digits
                if (value.length > 10) {
                    value = value.slice(0, 10);
                }
                
                this.value = value;
                
                // Show scan animation when typing
                const scanAnimation = document.querySelector('.scan-animation');
                if (scanAnimation) {
                    if (value.length > 0) {
                        scanAnimation.style.opacity = '1';
                    } else {
                        scanAnimation.style.opacity = '0';
                    }
                }
            });
            
            // Form validation
            searchForm.addEventListener('submit', function(event) {
                const accountNumber = accountInput.value.replace(/\s/g, '');
                
                if (accountNumber.length !== 10 || !/^\d+$/.test(accountNumber)) {
                    event.preventDefault();
                    
                    // Add shake animation for invalid input
                    accountInput.classList.add('shake');
                    setTimeout(() => {
                        accountInput.classList.remove('shake');
                    }, 500);
                    
                    showToast('Por favor ingrese un número de cuenta válido de 10 dígitos.');
                    accountInput.focus();
                } else {
                    // Show loading indicator
                    showLoadingIndicator('Buscando cuenta...');
                }
            });
        }
        
        // Deposit form handling
        const depositForm = document.getElementById('depositForm');
        const montoInput = document.getElementById('monto');
        
        if (depositForm && montoInput) {
            // Form validation
            depositForm.addEventListener('submit', function(event) {
                if (!this.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                    
                    // Add shake animation for invalid input
                    if (!montoInput.checkValidity()) {
                        montoInput.classList.add('shake');
                        setTimeout(() => {
                            montoInput.classList.remove('shake');
                        }, 500);
                        
                        showToast('Por favor ingrese un monto válido para el depósito.');
                    }
                } else {
                    const monto = parseFloat(montoInput.value);
                    
                    if (monto <= 0) {
                        event.preventDefault();
                        montoInput.classList.add('shake');
                        setTimeout(() => {
                            montoInput.classList.remove('shake');
                        }, 500);
                        
                        showToast('El monto debe ser mayor que cero.');
                        montoInput.focus();
                    } else {
                        // Show loading indicator
                        showLoadingIndicator('Procesando depósito...');
                    }
                }
                
                depositForm.classList.add('was-validated');
            });
            
            // Validate amount input as user types
            montoInput.addEventListener('input', function() {
                const value = parseFloat(this.value || 0);
                
                if (value <= 0) {
                    this.setCustomValidity('El monto debe ser mayor que cero.');
                } else {
                    this.setCustomValidity('');
                }
            });
        }
    });
    
    // Fill account number from example card
    function fillAccountNumber(number) {
        const input = document.getElementById('nroCuenta');
        if (input) {
            input.value = number;
            input.focus();
            
            // Add animation to search button
            const searchBtn = document.getElementById('searchButton');
            if (searchBtn) {
                searchBtn.classList.add('animate__animated', 'animate__heartBeat');
                setTimeout(() => {
                    searchBtn.classList.remove('animate__animated', 'animate__heartBeat');
                }, 1000);
            }
            
            // Update scan animation
            const scanAnimation = document.querySelector('.scan-animation');
            if (scanAnimation) {
                scanAnimation.style.opacity = '1';
            }
        }
    }
    
    // Show help information in toast
    function showHelp(topic) {
        let message = '';
        switch(topic) {
            case 'account':
                message = 'El número de cuenta de 10 dígitos se encuentra en la libreta bancaria, tarjeta de débito, o en la sección "Mis Cuentas" de la aplicación móvil.';
                break;
            case 'deposit-types':
                message = 'Puede realizar depósitos en efectivo, cheque o transferencia bancaria. Los depósitos en efectivo y transferencias se acreditan inmediatamente.';
                break;
            case 'deposit-limits':
                message = 'No hay límite para depósitos en ventanilla. Para otros canales, consulte con su ejecutivo de cuenta sobre los límites aplicables.';
                break;
            case 'deposit-time':
                message = 'Los depósitos en efectivo se acreditan inmediatamente, mientras que los cheques pueden demorar hasta 48 horas hábiles en hacerse efectivos.';
                break;
            default:
                message = 'Para más información, contacte a nuestro centro de atención al cliente.';
        }
        
        showToast(message);
    }
    
    // Show loading indicator
    function showLoadingIndicator(message = 'Buscando cuenta...') {
        // Create the loading overlay
        const overlay = document.createElement('div');
        overlay.className = 'loading-overlay';
        
        // Create the spinner
        const spinner = document.createElement('div');
        spinner.className = 'spinner';
        overlay.appendChild(spinner);
        
        // Create the message
        const text = document.createElement('div');
        text.className = 'loading-text';
        text.textContent = message;
        overlay.appendChild(text);
        
        // Add to body
        document.body.appendChild(overlay);
    }
    
    // Toast notification function
    function showToast(message) {
        // Remove existing toast if present
        const existingToast = document.querySelector('.toast-notification');
        if (existingToast) {
            document.body.removeChild(existingToast);
        }
        
        // Create new toast
        const toast = document.createElement('div');
        toast.className = 'toast-notification';
        toast.textContent = message;
        
        // Add to document
        document.body.appendChild(toast);
        
        // Automatically remove after delay
        setTimeout(() => {
            if (document.body.contains(toast)) {
                toast.style.animation = 'fadeInUp 0.3s ease reverse';
                setTimeout(() => {
                    if (document.body.contains(toast)) {
                        document.body.removeChild(toast);
                    }
                }, 300);
            }
        }, 4000);
    }
    </script>
</body>
</html>