<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/StyleVerCuenta.css">
<!-- Contenedor principal sin márgenes laterales -->
<div class="content-wrapper">
    <!-- Encabezado con título y badge de modo visualización -->
    <div class="header-container">
        <h2 class="page-title">Detalles de Cuenta</h2>
        <div class="mode-visualizacion">
            <span class="mode-icon">👁️</span> Modo Visualización
        </div>
    </div>

    <!-- Resumen de cuenta -->
    <div class="account-summary">
        <div class="avatar-box">
            <div class="account-avatar">
                <i class="fas fa-credit-card"></i>
            </div>
        </div>
        <div class="account-info">
            <h2 class="account-number"><?php echo htmlspecialchars($this->model->nroCuenta); ?></h2>
            <div class="account-balance">
                <?php 
                if ($this->model->tipoMoneda == 1) {
                    echo '<span class="currency-symbol">Bs.</span> ';
                    echo '<span class="balance-amount">' . number_format($this->model->saldo, 2) . '</span>';
                } else {
                    echo '<span class="currency-symbol">$</span> ';
                    echo '<span class="balance-amount">' . number_format($this->model->saldo, 2) . '</span>';
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Acciones rápidas para cuentas activas -->
    <?php if ($this->model->estado == 1): ?>
    <div class="quick-actions">
        <a href="index.php?controller=transaccion&action=depositar&idCuenta=<?php echo $this->model->idCuenta; ?>" class="quick-action-btn deposit">
            <i class="fas fa-arrow-down"></i> Depositar
        </a>
        <a href="index.php?controller=transaccion&action=retirar&idCuenta=<?php echo $this->model->idCuenta; ?>" class="quick-action-btn withdraw">
            <i class="fas fa-arrow-up"></i> Retirar
        </a>
        <a href="index.php?controller=transaccion&action=transferir&idCuentaOrigen=<?php echo $this->model->idCuenta; ?>" class="quick-action-btn transfer">
            <i class="fas fa-exchange-alt"></i> Transferir
        </a>
        <a href="index.php?controller=cuenta&action=extracto&id=<?php echo $this->model->idCuenta; ?>" class="quick-action-btn statement">
            <i class="fas fa-file-alt"></i> Extracto
        </a>
    </div>
    <?php endif; ?>

    <!-- Información de la cuenta en dos columnas -->
    <div class="details-container">
        <div class="details-column">
            <div class="details-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> Información de la Cuenta
                </h3>
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-label">Número de Cuenta</div>
                        <div class="detail-value"><?php echo htmlspecialchars($this->model->nroCuenta); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Tipo de Cuenta</div>
                        <div class="detail-value">
                            <?php echo $this->model->tipoCuenta == 1 ? 'Cuenta de Ahorro' : 'Cuenta Corriente'; ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Moneda</div>
                        <div class="detail-value">
                            <?php echo $this->model->tipoMoneda == 1 ? 'Bolivianos (Bs)' : 'Dólares ($)'; ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Saldo Actual</div>
                        <div class="detail-value highlight-value">
                            <?php 
                            if ($this->model->tipoMoneda == 1) {
                                echo 'Bs. ' . number_format($this->model->saldo, 2);
                            } else {
                                echo '$ ' . number_format($this->model->saldo, 2);
                            }
                            ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Fecha de Apertura</div>
                        <div class="detail-value">
                            <?php echo date('d/m/Y', strtotime($this->model->fechaApertura)); ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Estado</div>
                        <div class="detail-value">
                            <?php if ($this->model->estado == 1): ?>
                            <span class="status-badge active">Activa</span>
                            <?php else: ?>
                            <span class="status-badge inactive">Inactiva</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="details-column">
            <div class="details-section">
                <h3 class="section-title">
                    <i class="fas fa-user"></i> Información del Cliente
                </h3>
                <div class="details-grid">
                    <div class="detail-item">
                        <div class="detail-label">Nombre</div>
                        <div class="detail-value"><?php echo htmlspecialchars($clienteModel->nombre); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Apellidos</div>
                        <div class="detail-value">
                            <?php echo htmlspecialchars($clienteModel->apellidoPaterno . ' ' . $clienteModel->apellidoMaterno); ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">CI / Documento</div>
                        <div class="detail-value"><?php echo htmlspecialchars($clienteModel->ci); ?></div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Teléfono</div>
                        <div class="detail-value">
                            <?php echo !empty($clienteModel->telefono) ? htmlspecialchars($clienteModel->telefono) : '—'; ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Email</div>
                        <div class="detail-value">
                            <?php echo !empty($clienteModel->email) ? htmlspecialchars($clienteModel->email) : '—'; ?>
                        </div>
                    </div>
                    
                    <div class="detail-item">
                        <div class="detail-label">Ver Cliente</div>
                        <div class="detail-value">
                            <a href="index.php?controller=cliente&action=ver&id=<?php echo $clienteModel->idPersona; ?>" class="view-client-btn">
                                <i class="fas fa-external-link-alt"></i> Ver detalles del cliente
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sección de transacciones recientes -->
    <div class="transactions-section">
        <div class="section-header">
            <h3 class="section-title">
                <i class="fas fa-exchange-alt"></i> Transacciones Recientes
            </h3>
            <a href="index.php?controller=cuenta&action=extracto&id=<?php echo $this->model->idCuenta; ?>" class="view-all-btn">
                <i class="fas fa-file-alt"></i> Ver Extracto Completo
            </a>
        </div>
        
        <?php if (empty($transacciones)): ?>
        <div class="no-transactions">
            <div class="empty-state">
                <i class="fas fa-receipt empty-icon"></i>
                <p>No hay transacciones registradas para esta cuenta.</p>
            </div>
        </div>
        <?php else: ?>
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                        <th>Saldo Resultante</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $recentTransactions = array_slice($transacciones, 0, 10);
                    foreach ($recentTransactions as $transaccion): 
                    ?>
                    <tr>
                        <td><?php echo date('d/m/Y', strtotime($transaccion['fecha'])); ?></td>
                        <td><?php echo date('H:i:s', strtotime($transaccion['hora'])); ?></td>
                        <td>
                            <?php 
                            switch($transaccion['tipoTransaccion']) {
                                case 1:
                                    echo '<span class="transaction-type withdrawal">Retiro</span>';
                                    break;
                                case 2:
                                    echo '<span class="transaction-type deposit">Depósito</span>';
                                    break;
                                case 3:
                                    echo '<span class="transaction-type transfer-in">Transferencia Recibida</span>';
                                    break;
                                case 4:
                                    echo '<span class="transaction-type transfer-out">Transferencia Enviada</span>';
                                    break;
                                default:
                                    echo '<span class="transaction-type other">Otro</span>';
                            }
                            ?>
                        </td>
                        <td><?php echo htmlspecialchars($transaccion['descripcion']); ?></td>
                        <td class="amount-cell <?php echo in_array($transaccion['tipoTransaccion'], [1, 4]) ? 'negative' : 'positive'; ?>">
                            <?php 
                            $prefix = in_array($transaccion['tipoTransaccion'], [1, 4]) ? '-' : '+';
                            if ($this->model->tipoMoneda == 1) {
                                echo $prefix . ' Bs. ' . number_format($transaccion['monto'], 2);
                            } else {
                                echo $prefix . ' $ ' . number_format($transaccion['monto'], 2);
                            }
                            ?>
                        </td>
                        <td class="balance-cell">
                            <?php 
                            if ($this->model->tipoMoneda == 1) {
                                echo 'Bs. ' . number_format($transaccion['saldoResultante'], 2);
                            } else {
                                echo '$ ' . number_format($transaccion['saldoResultante'], 2);
                            }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        
        <?php if (count($transacciones) > 10): ?>
        <div class="view-more-container">
            <a href="index.php?controller=cuenta&action=extracto&id=<?php echo $this->model->idCuenta; ?>" class="view-more-btn">
                Ver todas las transacciones
            </a>
        </div>
        <?php endif; ?>
        <?php endif; ?>
    </div>

    <!-- Botones de acción -->
    <div class="actions-container">
        <a href="index.php?controller=cuenta&action=editar&id=<?php echo $this->model->idCuenta; ?>" class="action-main edit-btn">
            <i class="fas fa-edit"></i> Editar
        </a>
        
        <?php if ($this->model->estado == 1): ?>
        <a href="index.php?controller=cuenta&action=cerrar&id=<?php echo $this->model->idCuenta; ?>" class="action-main close-btn" onclick="return confirm('¿Está seguro que desea cerrar esta cuenta?');">
            <i class="fas fa-times-circle"></i> Cerrar Cuenta
        </a>
        <?php else: ?>
        <a href="index.php?controller=cuenta&action=reactivar&id=<?php echo $this->model->idCuenta; ?>" class="action-main activate-btn" onclick="return confirm('¿Está seguro que desea reactivar esta cuenta?');">
            <i class="fas fa-check-circle"></i> Reactivar Cuenta
        </a>
        <?php endif; ?>
        
        <a href="index.php?controller=cuenta&action=listar" class="action-main back-btn">
            <i class="fas fa-arrow-left"></i> Volver a la Lista
        </a>
    </div>
</div>