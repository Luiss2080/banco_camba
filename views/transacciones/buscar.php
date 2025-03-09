<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda de Transacciones - Banco Mercantil</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Variables globales */
        :root {
            --primary: #0f6e14;
            --secondary: #f4c01e;
            --light-green: #e9f5ea;
            --gray-light: #f5f5f5;
            --gray: #dddddd;
            --text-dark: #333333;
            --badge-retiro: #f0ad4e;
            --badge-deposito: #5cb85c;
            --badge-transferencia-in: #5bc0de;
            --badge-transferencia-out: #0275d8;
            --badge-otro: #6c757d;
        }
        
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
            background-color: #f9f9f9;
            line-height: 1.6;
        }
        
        /* Contenedor principal */
        .main-content {
            padding: 20px;
            max-width: 100%;
        }
        
        /* Estilos del formulario de búsqueda */
        .search-card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .search-header {
            background-color: var(--primary);
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }
        
        .search-header h2 {
            font-size: 1.2rem;
            font-weight: 600;
            margin: 0;
        }
        
        .search-header i {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .search-body {
            padding: 20px;
        }
        
        .search-form {
            background-color: var(--light-green);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
        }
        
        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        
        .form-group {
            padding: 0 10px;
            margin-bottom: 15px;
            flex: 1 1 25%;
            min-width: 200px;
        }
        
        .form-group:last-child {
            margin-bottom: 0;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid var(--gray);
            border-radius: 4px;
            font-size: 0.9rem;
            background-color: white;
        }
        
        .form-group select:focus,
        .form-group input:focus {
            outline: none;
            border-color: var(--primary);
        }
        
        .btn-search {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 38px;
            margin-top: 24px;
            transition: background-color 0.2s;
        }
        
        .btn-search:hover {
            background-color: #0a5510;
        }
        
        .btn-search i {
            margin-right: 8px;
        }
        
        /* Tabla de resultados */
        .results-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin: 15px 0;
            color: var(--primary);
            border-bottom: 2px solid var(--primary);
            padding-bottom: 8px;
            display: flex;
            align-items: center;
        }
        
        .results-title i {
            margin-right: 10px;
        }
        
        .table-container {
            overflow-x: auto;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .transactions-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            font-size: 0.9rem;
        }
        
        .transactions-table th {
            background-color: var(--primary);
            color: white;
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
            white-space: nowrap;
        }
        
        .transactions-table tr:nth-child(even) {
            background-color: var(--gray-light);
        }
        
        .transactions-table td {
            padding: 12px 15px;
            border-top: 1px solid var(--gray);
            vertical-align: middle;
        }
        
        .transactions-table tr:hover {
            background-color: rgba(15, 110, 20, 0.05);
        }
        
        /* Badges para tipos de transacción */
        .badge {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
            color: white;
            text-align: center;
        }
        
        .badge-warning {
            background-color: var(--badge-retiro);
        }
        
        .badge-success {
            background-color: var(--badge-deposito);
        }
        
        .badge-info {
            background-color: var(--badge-transferencia-in);
        }
        
        .badge-primary {
            background-color: var(--badge-transferencia-out);
        }
        
        .badge-secondary {
            background-color: var(--badge-otro);
        }
        
        /* Botones de acción */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-action {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            color: white;
        }
        
        .btn-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        
        .btn-view {
            background-color: var(--badge-transferencia-in);
        }
        
        .btn-receipt {
            background-color: var(--primary);
        }
        
        /* Estilos de montos */
        .amount {
            font-weight: 600;
            text-align: right;
            font-family: 'Consolas', monospace;
        }
        
        /* Footer con botones */
        .footer-actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        
        .btn-footer {
            padding: 8px 20px;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: none;
            font-size: 0.9rem;
            transition: background-color 0.2s;
        }
        
        .btn-footer i {
            margin-right: 8px;
        }
        
        .btn-print {
            background-color: var(--primary);
            color: white;
        }
        
        .btn-print:hover {
            background-color: #0a5510;
        }
        
        .btn-back {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-back:hover {
            background-color: #5a6268;
        }
        
        /* Mensajes de alerta */
        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid transparent;
        }
        
        .alert-info {
            background-color: #d9edf7;
            border-color: #bce8f1;
            color: #31708f;
        }
        
        /* Estilos para impresión */
        @media print {
            .search-form, 
            .footer-actions, 
            .btn-action {
                display: none !important;
            }
            
            body {
                background-color: white;
            }
            
            .search-card {
                box-shadow: none;
                margin: 0;
            }
            
            .transactions-table th {
                background-color: white !important;
                color: black;
                border-bottom: 2px solid black;
            }
            
            .badge {
                border: 1px solid #ddd;
                background-color: transparent !important;
                color: black;
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .form-group {
                flex: 0 0 100%;
            }
            
            .footer-actions {
                flex-direction: column;
            }
            
            .btn-footer {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="main-content">
        <div class="search-card">
            <div class="search-header">
                <i class="fas fa-search"></i>
                <h2>Búsqueda de Transacciones</h2>
            </div>
            
            <div class="search-body">
                <!-- Formulario de búsqueda -->
                <form method="GET" action="index.php" class="search-form">
                    <input type="hidden" name="controller" value="transaccion">
                    <input type="hidden" name="action" value="buscar">
                    
                    <div class="form-row">
                        <!-- Selector de cuenta -->
                        <div class="form-group">
                            <label for="idCuenta"><i class="fas fa-wallet"></i> Cuenta</label>
                            <select id="idCuenta" name="idCuenta">
                                <option value="0">Todas las cuentas</option>
                                <option value="1">1234567901 - Jorge Martínez</option>
                                <option value="2">1234567902 - Lucía Rodríguez</option>
                                <option value="3">1234567903 - Mario Sánchez</option>
                                <option value="4">1234567904 - Admin Sistema</option>
                            </select>
                        </div>
                        
                        <!-- Selector de tipo de transacción -->
                        <div class="form-group">
                            <label for="tipoTransaccion"><i class="fas fa-exchange-alt"></i> Tipo de Transacción</label>
                            <select id="tipoTransaccion" name="tipoTransaccion">
                                <option value="0">Todos los tipos</option>
                                <option value="1">Retiro</option>
                                <option value="2">Depósito</option>
                                <option value="3">Transferencia recibida</option>
                                <option value="4">Transferencia enviada</option>
                            </select>
                        </div>
                        
                        <!-- Fechas -->
                        <div class="form-group">
                            <label for="fechaInicio"><i class="far fa-calendar-alt"></i> Fecha Inicio</label>
                            <input type="date" id="fechaInicio" name="fechaInicio">
                        </div>
                        
                        <div class="form-group">
                            <label for="fechaFin"><i class="far fa-calendar-alt"></i> Fecha Fin</label>
                            <input type="date" id="fechaFin" name="fechaFin">
                        </div>
                        
                        <!-- Botón de búsqueda -->
                        <div class="form-group">
                            <button type="submit" class="btn-search">
                                <i class="fas fa-search"></i> Buscar
                            </button>
                        </div>
                    </div>
                </form>
                
                <!-- Resultados de la búsqueda -->
                <h3 class="results-title"><i class="fas fa-list"></i> Resultados de la Búsqueda</h3>
                
                <div class="table-container">
                    <table class="transactions-table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Tipo</th>
                                <th>Número de Cuenta</th>
                                <th>Cliente</th>
                                <th>Descripción</th>
                                <th>Monto</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15/01/2023</td>
                                <td>00:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567904</td>
                                <td>Admin Sistema Banco</td>
                                <td>Retiro en cajero</td>
                                <td class="amount">$ 450.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>14/01/2023</td>
                                <td>23:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567903</td>
                                <td>Mario Sánchez Pérez</td>
                                <td>Depósito en ventanilla</td>
                                <td class="amount">$ 800.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>13/01/2023</td>
                                <td>22:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567902</td>
                                <td>Lucía Rodríguez Sánchez</td>
                                <td>Retiro en cajero</td>
                                <td class="amount">$ 400.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>12/01/2023</td>
                                <td>21:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567901</td>
                                <td>Jorge Martínez Rodríguez</td>
                                <td>Depósito en ventanilla</td>
                                <td class="amount">$ 700.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>11/01/2023</td>
                                <td>20:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567900</td>
                                <td>Carmen García Martínez</td>
                                <td>Retiro en cajero</td>
                                <td class="amount">$ 350.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>10/01/2023</td>
                                <td>19:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567899</td>
                                <td>Diego López García</td>
                                <td>Depósito en ventanilla</td>
                                <td class="amount">$ 600.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>09/01/2023</td>
                                <td>18:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567898</td>
                                <td>Sofía Gómez López</td>
                                <td>Retiro en cajero</td>
                                <td class="amount">$ 300.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>08/01/2023</td>
                                <td>17:00:00</td>
                                <td><span class="badge badge-secondary">OTRO</span></td>
                                <td>1234567897</td>
                                <td>Pedro Fernández Gómez</td>
                                <td>Depósito en ventanilla</td>
                                <td class="amount">$ 500.00</td>
                                <td>
                                    <div class="action-buttons">
                                        <button class="btn-action btn-view" title="Ver">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                        <button class="btn-action btn-receipt" title="Comprobante">
                                            <i class="fas fa-file-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Botones de acción -->
                <div class="footer-actions">
                    <button type="button" class="btn-footer btn-print" onclick="window.print();">
                        <i class="fas fa-print"></i> Imprimir
                    </button>
                    <a href="index.php?controller=transaccion&action=listar" class="btn-footer btn-back">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>