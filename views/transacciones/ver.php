<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/StyleVerTransaccion.css">
<!-- Contenedor principal sin márgenes laterales -->
<div class="content-wrapper">
    <!-- Encabezado con título y badge de modo visualización -->
    <div class="header-container">
        <h2 class="page-title">Detalles de Transacción</h2>
        <div class="mode-visualizacion">
            <span class="mode-icon">👁️</span> Modo Visualización
        </div>
    </div>

    <!-- Resumen de transacción -->
    <div class="transaction-summary">
        <div class="transaction-icon-box">
            <?php 
            $iconClass = '';
            $transactionLabel = '';
            switch($this->model->tipoTransaccion) {
                case 1:
                    $iconClass = 'withdraw-icon';
                    $transactionLabel = 'Retiro';
                    break;
                case 2:
                    $iconClass = 'deposit-icon';
                    $transactionLabel = 'Depósito';
                    break;
                case 3:
                    $iconClass = 'transfer-in-icon';
                    $transactionLabel = 'Transferencia Recibida';
                    break;
                case 4:
                    $iconClass = 'transfer-out-icon';
                    $transactionLabel = 'Transferencia Enviada';
                    break;
                default:
                    $iconClass = 'other-icon';
                    $transactionLabel = 'Otra Operación';
            }
            ?>
            <div class="transaction-icon <?php echo $iconClass; ?>">
                <?php 
                switch($this->model->tipoTransaccion) {
                    case 1:
                        echo '<i class="fas fa-arrow-up"></i>';
                        break;
                    case 2:
                        echo '<i class="fas fa-arrow-down"></i>';
                        break;
                    case 3:
                        echo '<i class="fas fa-arrow-circle-down"></i>';
                        break;
                    case 4:
                        echo '<i class="fas fa-arrow-circle-up"></i>';
                        break;
                    default:
                        echo '<i class="fas fa-exchange-alt"></i>';
                }
                ?>
            </div>
        </div>
        <div class="transaction-info">
            <h2 class="transaction-id">Transacción #<?php echo $this->model->idTransaccion; ?></h2>
            <p class="transaction-type"><?php echo $transactionLabel; ?></p>
        </div>
        <div class="transaction-amount-box">
            <div class="transaction-amount <?php echo in_array($this->model->tipoTransaccion, [1, 4]) ? 'negative' : 'positive'; ?>">
                <?php 
                $prefix = in_array($this->model->tipoTransaccion, [1, 4]) ? '-' : '+';
                if ($cuenta->tipoMoneda == 1) {
                    echo $prefix . ' Bs. ' . number_format($this->model->monto, 2);
                } else {
                    echo $prefix . ' $ ' . number_format($this->model->monto, 2);
                }
                ?>
            </div>
            <div class="transaction-date-time">
                <?php echo date('d/m/Y', strtotime($this->model->fecha)); ?> a las <?php echo date('H:i:s', strtotime($this->model->hora)); ?>
            </div>
        </div>
    </div>

    <!-- Detalles de la transacción -->
    <div class="details-container">
        <div class="details-column">
            <h3 class="details-section-title">Información de la Transacción</h3>
            
            <div class="details-box">
                <div class="details-row">
                    <div class="details-cell">
                        <label class="detail-label">ID Transacción</label>
                        <div class="detail-value"><?php echo $this->model->idTransaccion; ?></div>
                    </div>
                    <div class="details-cell">
                        <label class="detail-label">Tipo de Transacción</label>
                        <div class="detail-value">
                            <?php 
                            switch($this->model->tipoTransaccion) {
                                case 1:
                                    echo '<span class="transaction-badge withdrawal">' . 'Retiro' . '</span>';
                                    break;
                                case 2:
                                    echo '<span class="transaction-badge deposit">' . 'Depósito' . '</span>';
                                    break;
                                case 3:
                                    echo '<span class="transaction-badge transfer-in">' . 'Transferencia Recibida' . '</span>';
                                    break;
                                case 4:
                                    echo '<span class="transaction-badge transfer-out">' . 'Transferencia Enviada' . '</span>';
                                    break;
                                default:
                                    echo '<span class="transaction-badge other">' . 'Otro' . '</span>';
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="details-row">
                    <div class="details-cell">
                        <label class="detail-label">Fecha</label>
                        <div class="detail-value"><?php echo date('d/m/Y', strtotime($this->model->fecha)); ?></div>
                    </div>
                    <div class="details-cell">
                        <label class="detail-label">Hora</label>
                        <div class="detail-value"><?php echo date('H:i:s', strtotime($this->model->hora)); ?></div>
                    </div>
                </div>

                <div class="details-row">
                    <div class="details-cell">
                        <label class="detail-label">Monto</label>
                        <div class="detail-value highlight-value">
                            <?php 
                            if ($cuenta->tipoMoneda == 1) {
                                echo 'Bs. ' . number_format($this->model->monto, 2);
                            } else {
                                echo '$ ' . number_format($this->model->monto, 2);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="details-cell">
                        <label class="detail-label">Saldo Resultante</label>
                        <div class="detail-value">
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

                <div class="details-row">
                    <div class="details-cell full-width">
                        <label class="detail-label">Descripción</label>
                        <div class="detail-value"><?php echo htmlspecialchars($this->model->descripcion); ?></div>
                    </div>
                </div>

                <?php if (!empty($this->model->cuentaOrigen)): ?>
                <div class="details-row">
                    <div class="details-cell full-width">
                        <label class="detail-label">Cuenta Origen</label>
                        <div class="detail-value"><?php echo htmlspecialchars($this->model->cuentaOrigen); ?></div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if (!empty($this->model->cuentaDestino)): ?>
                <div class="details-row">
                    <div class="details-cell full-width">
                        <label class="detail-label">Cuenta Destino</label>
                        <div class="detail-value"><?php echo htmlspecialchars($this->model->cuentaDestino); ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="details-column">
            <h3 class="details-section-title">Información de la Cuenta</h3>
            
            <div class="details-box">
                <div class="details-row">
                    <div class="details-cell">
                        <label class="detail-label">Número de Cuenta</label>
                        <div class="detail-value account-number"><?php echo htmlspecialchars($cuenta->nroCuenta); ?></div>
                    </div>
                    <div class="details-cell">
                        <label class="detail-label">Tipo de Cuenta</label>
                        <div class="detail-value">
                            <?php echo $cuenta->tipoCuenta == 1 ? 'Ahorro' : 'Corriente'; ?>
                        </div>
                    </div>
                </div>

                <div class="details-row">
                    <div class="details-cell full-width">
                        <label class="detail-label">Moneda</label>
                        <div class="detail-value">
                            <?php echo $cuenta->tipoMoneda == 1 ? 'Bolivianos (Bs)' : 'Dólares ($)'; ?>
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="details-section-title">Información del Cliente</h3>
            
            <div class="details-box">
                <div class="details-row">
                    <div class="details-cell full-width">
                        <label class="detail-label">Nombre Completo</label>
                        <div class="detail-value">
                            <?php echo htmlspecialchars($cliente->nombre . ' ' . $cliente->apellidoPaterno . ' ' . $cliente->apellidoMaterno); ?>
                        </div>
                    </div>
                </div>

                <div class="details-row">
                    <div class="details-cell full-width">
                        <label class="detail-label">CI / Documento</label>
                        <div class="detail-value"><?php echo htmlspecialchars($cliente->ci); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Botones de acción -->
    <div class="actions-container">
        <a href="index.php?controller=transaccion&action=comprobante&id=<?php echo $this->model->idTransaccion; ?>" class="action-main print-btn">
            <i class="fas fa-print"></i> Imprimir Comprobante
        </a>
        
        <a href="index.php?controller=transaccion&action=listar" class="action-main back-btn">
            <i class="fas fa-arrow-left"></i> Volver a la Lista
        </a>
    </div>
</div>