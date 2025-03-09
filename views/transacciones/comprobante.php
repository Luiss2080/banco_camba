<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Transacción - Banco Mercantil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Variables globales */
        :root {
            --primary: #0f6e14;
            --primary-light: #e9f5ea;
            --secondary: #f4c01e;
            --secondary-light: #fff8e1;
            --success: #5cb85c;
            --info: #5bc0de;
            --warning: #f0ad4e;
            --danger: #d9534f;
            --text-dark: #333333;
            --text-medium: #666666;
            --text-light: #999999;
            --gray-light: #f8f8f8;
            --gray: #e9e9e9;
            --border: #e0e0e0;
            --border-radius: 8px;
            --box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            height: 100%;
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            color: var(--text-dark);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        
        /* Estilos del comprobante */
        .receipt-container {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            position: relative;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        /* Marca de agua */
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 120px;
            opacity: 0.03;
            font-weight: bold;
            color: var(--primary);
            z-index: 0;
            user-select: none;
            white-space: nowrap;
        }
        
        /* Encabezado del comprobante */
        .receipt-header {
            background-color: var(--primary);
            color: white;
            padding: 20px;
            text-align: center;
            position: relative;
            border-bottom: 5px solid var(--secondary);
        }
        
        .receipt-title {
            font-size: 1.6rem;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        
        .receipt-subtitle {
            font-size: 1.1rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.9);
            margin-top: 10px;
        }
        
        .bank-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }
        
        .bank-logo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: white;
            padding: 5px;
            margin-right: 15px;
        }
        
        .bank-name {
            font-size: 1.8rem;
            font-weight: 700;
        }
        
        /* Información de transacción en encabezado */
        .header-transaction-info {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: var(--border-radius);
            padding: 10px 15px;
            margin: 15px 0 5px;
        }
        
        .header-transaction-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        
        .header-transaction-item {
            padding: 5px 10px;
            font-size: 0.9rem;
        }
        
        .header-label {
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
        }
        
        .header-value {
            color: white;
        }
        
        /* Cuerpo del comprobante */
        .receipt-body {
            padding: 30px;
            position: relative;
            z-index: 1;
            flex: 1;
            overflow-y: auto;
        }
        
        .transaction-info {
            background-color: var(--gray-light);
            border-radius: var(--border-radius);
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid var(--primary);
        }
        
        .transaction-type {
            display: inline-block;
            padding: 8px 15px;
            background-color: var(--primary);
            color: white;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .transaction-type.withdrawal {
            background-color: var(--warning);
        }
        
        .transaction-type.deposit {
            background-color: var(--success);
        }
        
        .transaction-type.transfer-in {
            background-color: var(--info);
        }
        
        .transaction-type.transfer-out {
            background-color: var(--primary);
        }
        
        .transaction-date {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
            font-size: 0.95rem;
        }
        
        .transaction-date div {
            display: flex;
            align-items: center;
        }
        
        .transaction-date i {
            margin-right: 8px;
            color: var(--primary);
        }
        
        .transaction-id {
            font-family: 'Consolas', monospace;
            font-size: 1rem;
            color: var(--text-medium);
            letter-spacing: 1px;
            margin-top: 5px;
            text-align: right;
        }
        
        /* Detalles */
        .receipt-details {
            margin-bottom: 25px;
        }
        
        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
        }
        
        .detail-row:last-child {
            border-bottom: none;
        }
        
        .detail-label {
            flex: 0 0 45%;
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .detail-label i {
            width: 20px;
            margin-right: 10px;
            color: var(--primary);
        }
        
        .detail-value {
            flex: 0 0 55%;
            text-align: right;
        }
        
        /* Monto y saldo */
        .amount-section {
            background-color: var(--secondary-light);
            border-radius: var(--border-radius);
            padding: 20px;
            margin-bottom: 25px;
            border-left: 4px solid var(--secondary);
        }
        
        .amount-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px dashed var(--border);
        }
        
        .amount-row:last-child {
            border-bottom: none;
        }
        
        .amount-label {
            font-weight: 600;
            display: flex;
            align-items: center;
        }
        
        .amount-label i {
            margin-right: 10px;
            color: var(--secondary);
        }
        
        .amount-value {
            font-family: 'Consolas', monospace;
            font-size: 1.2rem;
            font-weight: 700;
        }
        
        .amount-value.result {
            color: var(--success);
        }
        
        /* Código QR / Validación */
        .receipt-validation {
            background-color: var(--gray-light);
            border-radius: var(--border-radius);
            padding: 20px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .qr-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .qr-code {
            width: 180px;
            height: 180px;
            background-color: white;
            padding: 8px;
            border: 1px solid var(--border);
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }
        
        .qr-code img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        
        .hash-reference {
            font-family: 'Consolas', monospace;
            font-size: 0.85rem;
            color: var(--text-medium);
            word-break: break-all;
            text-align: center;
            margin-top: 10px;
        }
        
        /* Pie del comprobante */
        .receipt-footer {
            text-align: center;
            border-top: 1px solid var(--border);
            padding: 20px;
            color: var(--text-medium);
            background-color: var(--gray-light);
        }
        
        .receipt-footer p {
            margin-bottom: 5px;
            font-size: 0.95rem;
        }
        
        .timestamp {
            font-size: 0.85rem;
            margin-top: 10px;
            color: var(--text-light);
        }
        
        /* Botones de acción */
        .actions-footer {
            display: flex;
            justify-content: center;
            gap: 15px;
            padding: 20px;
            background-color: var(--gray-light);
            border-top: 1px solid var(--border);
        }
        
        .btn {
            padding: 10px 20px;
            border-radius: var(--border-radius);
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: background-color 0.2s, transform 0.2s;
            border: none;
            font-size: 0.95rem;
            flex: 1;
            max-width: 200px;
        }
        
        .btn i {
            margin-right: 8px;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0a5510;
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
            transform: translateY(-2px);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: var(--primary-light);
            transform: translateY(-2px);
        }
        
        .btn-info {
            background-color: var(--info);
            color: white;
        }
        
        .btn-info:hover {
            background-color: #46b8da;
            transform: translateY(-2px);
        }
        
        .btn-warning {
            background-color: var(--warning);
            color: white;
        }
        
        .btn-warning:hover {
            background-color: #eea236;
            transform: translateY(-2px);
        }
        
        /* Sello de verificación */
        .verification-seal {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 100px;
            height: 100px;
            opacity: 0.2;
            pointer-events: none;
        }
        
        /* Información de seguridad */
        .security-info {
            background-color: var(--primary-light);
            border-radius: var(--border-radius);
            padding: 15px;
            font-size: 0.85rem;
            color: var(--text-medium);
            margin-bottom: 20px;
            border-left: 4px solid var(--primary);
        }
        
        .security-info p {
            display: flex;
            align-items: center;
        }
        
        .security-info i {
            margin-right: 10px;
            color: var(--primary);
        }
        
        /* Media compartir */
        .share-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .share-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: transform 0.2s;
        }
        
        .share-button:hover {
            transform: scale(1.1);
        }
        
        .share-whatsapp {
            background-color: #25D366;
        }
        
        .share-email {
            background-color: #D44638;
        }
        
        .share-telegram {
            background-color: #0088cc;
        }
        
        /* Notificación de éxito */
        .success-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: var(--success);
            color: white;
            padding: 15px 20px;
            border-radius: var(--border-radius);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            z-index: 1000;
            transform: translateY(-100px);
            opacity: 0;
            transition: transform 0.3s, opacity 0.3s;
        }
        
        .success-notification.show {
            transform: translateY(0);
            opacity: 1;
        }
        
        .success-notification i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        /* Estilos para impresión */
        @media print {
            body {
                background-color: white;
                font-size: 12pt;
            }
            
            .container {
                height: auto;
                padding: 0;
            }
            
            .receipt-container {
                box-shadow: none;
                border: 1px solid #ddd;
            }
            
            .actions-footer, .btn, .share-buttons, .success-notification {
                display: none !important;
            }
            
            .receipt-header {
                background-color: #f0f0f0 !important;
                color: black !important;
                border-bottom: 1px solid #ddd;
            }
            
            .header-transaction-info {
                background-color: transparent !important;
            }
            
            .header-label, .header-value {
                color: black !important;
            }
            
            .verification-seal {
                opacity: 0.1;
            }
            
            .transaction-type {
                background-color: #f0f0f0 !important;
                color: black !important;
                border: 1px solid #ddd;
            }
            
            .security-info {
                display: none;
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            .receipt-body {
                padding: 20px;
            }
            
            .receipt-title {
                font-size: 1.4rem;
            }
            
            .bank-name {
                font-size: 1.6rem;
            }
            
            .detail-row, .amount-row {
                flex-direction: column;
            }
            
            .detail-label, .detail-value, 
            .amount-label, .amount-value {
                width: 100%;
                flex: 0 0 100%;
                text-align: left;
            }
            
            .detail-value, .amount-value {
                margin-top: 5px;
                padding-left: 30px;
            }
            
            .actions-footer {
                flex-wrap: wrap;
            }
            
            .btn {
                flex: 0 0 calc(50% - 10px);
                max-width: none;
            }
            
            .header-transaction-row {
                flex-direction: column;
            }
            
            .header-transaction-item {
                text-align: center;
                padding: 3px 0;
            }
            
            .qr-code {
                width: 150px;
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-container">
            <!-- Marca de agua -->
            <div class="watermark">COMPROBANTE</div>
            
            <!-- Encabezado del comprobante -->
            <div class="receipt-header">
                <div class="bank-logo">
                    <img src="/BANCO_CAMBA/assets/img/logo.png" alt="Banco Mercantil Logo">
                    <div class="bank-name">Banco Mercantil</div>
                </div>
                <h1 class="receipt-title">COMPROBANTE DE TRANSACCIÓN</h1>
                <!-- Información de transacción en el encabezado -->
                <div class="header-transaction-info">
                    <div class="header-transaction-row">
                        <div class="header-transaction-item">
                            <span class="header-label">Fecha: </span>
                            <span class="header-value"><?php echo date('d/m/Y', strtotime($this->model->fecha)); ?></span>
                        </div>
                        <div class="header-transaction-item">
                            <span class="header-label">Hora: </span>
                            <span class="header-value"><?php echo date('H:i:s', strtotime($this->model->hora)); ?></span>
                        </div>
                        <div class="header-transaction-item">
                            <span class="header-label">ID: </span>
                            <span class="header-value"><?php echo $this->model->idTransaccion; ?></span>
                        </div>
                    </div>
                </div>
                <!-- Subtítulo dinámico según el tipo de transacción -->
                <?php 
                $subtitleClass = '';
                switch($this->model->tipoTransaccion) {
                    case 1:
                        $receiptType = $lang['withdrawal_receipt'];
                        $transactionClass = 'withdrawal';
                        $transactionName = $lang['withdrawal'];
                        break;
                    case 2:
                        $receiptType = $lang['deposit_receipt'];
                        $transactionClass = 'deposit';
                        $transactionName = $lang['deposit'];
                        break;
                    case 3:
                        $receiptType = $lang['transfer_received_receipt'];
                        $transactionClass = 'transfer-in';
                        $transactionName = $lang['transfer_received'];
                        break;
                    case 4:
                        $receiptType = $lang['transfer_sent_receipt'];
                        $transactionClass = 'transfer-out';
                        $transactionName = $lang['transfer_sent'];
                        break;
                    default:
                        $receiptType = $lang['transaction_receipt'];
                        $transactionClass = '';
                        $transactionName = $lang['other'];
                }
                ?>
                <p class="receipt-subtitle"><?php echo $receiptType; ?></p>
            </div>
            
            <!-- Cuerpo del comprobante -->
            <div class="receipt-body">
               
                <!-- Información de seguridad -->
                <div class="security-info">
                    <p>
                        <i class="fas fa-shield-alt"></i>
                        <?php echo $lang['receipt_security_message'] ?? 'Este documento es un comprobante oficial de Banco Mercantil. Verifique los datos antes de finalizar.'; ?>
                    </p>
                </div>
                
                <!-- Detalles de la transacción -->
                <div class="receipt-details">
                    <div class="detail-row">
                        <div class="detail-label">
                            <i class="fas fa-university"></i>
                            <span><?php echo $lang['account_number']; ?></span>
                        </div>
                        <div class="detail-value"><?php echo $cuenta->nroCuenta; ?></div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">
                            <i class="fas fa-user"></i>
                            <span><?php echo $lang['client']; ?></span>
                        </div>
                        <div class="detail-value"><?php echo $cliente->nombre . ' ' . $cliente->apellidoPaterno . ' ' . $cliente->apellidoMaterno; ?></div>
                    </div>
                    
                    <div class="detail-row">
                        <div class="detail-label">
                            <i class="fas fa-exchange-alt"></i>
                            <span><?php echo $lang['transaction_type']; ?></span>
                        </div>
                        <div class="detail-value"><?php echo $transactionName; ?></div>
                    </div>
                    
                    <?php if (!empty($this->model->cuentaOrigen)): ?>
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-sign-out-alt"></i>
                                <span><?php echo $lang['source_account']; ?></span>
                            </div>
                            <div class="detail-value"><?php echo $this->model->cuentaOrigen; ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($this->model->cuentaDestino)): ?>
                        <div class="detail-row">
                            <div class="detail-label">
                                <i class="fas fa-sign-in-alt"></i>
                                <span><?php echo $lang['destination_account']; ?></span>
                            </div>
                            <div class="detail-value"><?php echo $this->model->cuentaDestino; ?></div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="detail-row">
                        <div class="detail-label">
                            <i class="fas fa-align-left"></i>
                            <span><?php echo $lang['description']; ?></span>
                        </div>
                        <div class="detail-value"><?php echo $this->model->descripcion; ?></div>
                    </div>
                    
                    <!-- Información adicional - Sucursal -->
                    <div class="detail-row">
                        <div class="detail-label">
                            <i class="fas fa-map-marker-alt"></i>
                            <span><?php echo $lang['branch'] ?? 'Sucursal'; ?></span>
                        </div>
                        <div class="detail-value"><?php echo $cuenta->sucursal ?? 'Casa Matriz'; ?></div>
                    </div>
                    
                    <!-- Cajero/Atendido por -->
                    <div class="detail-row">
                        <div class="detail-label">
                            <i class="fas fa-user-tie"></i>
                            <span><?php echo $lang['attended_by'] ?? 'Atendido por'; ?></span>
                        </div>
                        <div class="detail-value"><?php echo $this->model->usuario ?? $lang['online_transaction'] ?? 'Transacción en línea'; ?></div>
                    </div>
                </div>
                
                <!-- Sección de montos -->
                <div class="amount-section">
                    <div class="amount-row">
                        <div class="amount-label">
                            <i class="fas fa-money-bill-wave"></i>
                            <span><?php echo $lang['amount']; ?></span>
                        </div>
                        <div class="amount-value">
                            <?php 
                            if ($cuenta->tipoMoneda == 1) {
                                echo 'Bs. ' . number_format($this->model->monto, 2);
                            } else {
                                echo '$ ' . number_format($this->model->monto, 2);
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="amount-row">
                        <div class="amount-label">
                            <i class="fas fa-wallet"></i>
                            <span><?php echo $lang['resulting_balance']; ?></span>
                        </div>
                        <div class="amount-value result">
                            <?php 
                            if ($cuenta->tipoMoneda == 1) {
                                echo 'Bs. ' . number_format($this->model->saldoResultante, 2);
                            } else {
                                echo '$ ' . number_format($this->model->saldoResultante, 2);
                            }
                            ?>
                        </div>
                    </div>
                </div>
                
                <!-- Validación con QR corregido -->
                <div class="receipt-validation">
                    <div class="qr-container">
                        <div class="qr-code">
                            <img src="/BANCO_CAMBA/assets/img/QR.png" alt="Código QR de verificación">
                        </div>
                    </div>
                    <p><?php echo $lang['scan_qr_code'] ?? 'Escanee el código QR para verificar la autenticidad'; ?></p>
                    <div class="hash-reference">
                        <small><?php echo $lang['transaction_reference'] ?? 'Referencia'; ?>: <?php echo $this->model->hash; ?></small>
                    </div>
                </div>
                
                <!-- Pie del comprobante -->
                <div class="receipt-footer">
                    <p><strong><?php echo $lang['receipt_thank_you'] ?? '¡Gracias por confiar en Banco Mercantil!'; ?></strong></p>
                    <p><?php echo $lang['receipt_valid_without_signature'] ?? 'Este comprobante es válido sin firma ni sello.'; ?></p>
                    <p><?php echo $lang['receipt_contact_info'] ?? 'Para cualquier consulta, comuníquese al 0800-BANCO (22626)'; ?></p>
                    <p class="timestamp"><?php echo $lang['generated_on'] ?? 'Generado el'; ?> <?php echo date('d/m/Y H:i:s'); ?></p>
                </div>
            </div>
            
            <!-- Botones de acción -->
            <div class="actions-footer">
                <button type="button" class="btn btn-primary" onclick="window.print();">
                    <i class="fas fa-print"></i> <?php echo $lang['print']; ?>
                </button>
                
                <a href="index.php?controller=transaccion&action=ver&id=<?php echo $this->model->idTransaccion; ?>" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> <?php echo $lang['back']; ?>
                </a>
                
                <button type="button" class="btn btn-info" onclick="downloadPDF()">
                    <i class="fas fa-file-pdf"></i> <?php echo $lang['download_pdf'] ?? 'Descargar PDF'; ?>
                </button>
                
                <button type="button" class="btn btn-outline" onclick="sendByEmail()">
                    <i class="fas fa-envelope"></i> <?php echo $lang['send_by_email'] ?? 'Enviar por Email'; ?>
                </button>
                
                <button type="button" class="btn btn-warning" onclick="reportIssue()">
                    <i class="fas fa-exclamation-triangle"></i> <?php echo $lang['report_issue'] ?? 'Reportar'; ?>
                </button>
            </div>
            
            <!-- Sello de verificación -->
            <img class="verification-seal" src="/api/placeholder/100/100" alt="Sello de verificación">
        </div>
    </div>
    
    <!-- Notificación de éxito (oculta por defecto) -->
    <div id="successNotification" class="success-notification">
        <i class="fas fa-check-circle"></i>
        <span id="notificationMessage"></span>
    </div>
    
    <script>
        // Función para mostrar notificación
        function showNotification(message) {
            const notification = document.getElementById('successNotification');
            const messageElement = document.getElementById('notificationMessage');
            messageElement.textContent = message;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
        
        // Función para descargar PDF
        function downloadPDF() {
            // Aquí se implementaría la lógica real de descarga
            showNotification('El PDF ha sido descargado correctamente');
        }
        
        // Función para enviar por email
        function sendByEmail() {
            // Simulación de envío de email
            setTimeout(() => {
                showNotification('El comprobante ha sido enviado por email');
            }, 1000);
        }
        
        // Función para reportar un problema
        function reportIssue() {
            // Aquí se implementaría el formulario o la lógica para reportar
            const reason = prompt('Por favor, describa el problema con este comprobante:');
            if (reason) {
                showNotification('Su reporte ha sido enviado. Gracias por su feedback.');
            }
        }
        
        // Funciones para compartir
        function shareViaWhatsApp() {
            const message = 'Comprobante de transacción Banco Mercantil #<?php echo $this->model->idTransaccion; ?>';
            window.open(`https://wa.me/?text=${encodeURIComponent(message)}`, '_blank');
            showNotification('Compartiendo por WhatsApp...');
        }
        
        function shareViaEmail() {
            const subject = 'Comprobante de Transacción - Banco Mercantil';
            const body = 'Adjunto encontrará su comprobante de transacción #<?php echo $this->model->idTransaccion; ?> del Banco Mercantil.';
            window.location.href = `mailto:?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
            showNotification('Abriendo su cliente de correo...');
        }
        
        function shareViaTelegram() {
            const message = 'Comprobante de transacción Banco Mercantil #<?php echo $this->model->idTransaccion; ?>';
            window.open(`https://t.me/share/url?url=${encodeURIComponent(window.location.href)}&text=${encodeURIComponent(message)}`, '_blank');
            showNotification('Compartiendo por Telegram...');
        }
    </script>
</body>
</html>