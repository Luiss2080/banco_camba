<!-- Enlace a la hoja de estilos principal -->
<link rel="stylesheet" href="assets/css/styleCrear.css">
<div class="client-card">
    <div class="card-header">
        <h2 class="title-with-line"><?php echo $lang['new_client']; ?></h2>
    </div>
    <div class="card-body">
        <form id="form-cliente" method="POST" action="index.php?controller=cliente&action=guardar" class="needs-validation" novalidate>
            <!-- Campo: Nombre -->
            <div class="form-group">
                <label for="nombre" class="form-label"><?php echo $lang['name']; ?><span class="required">*</span></label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
                <div class="invalid-feedback">
                    <?php echo $lang['name_required']; ?>
                </div>
            </div>
            
            <!-- Campo: Apellido Paterno -->
            <div class="form-group">
                <label for="apellidoPaterno" class="form-label"><?php echo $lang['paternal_last_name']; ?><span class="required">*</span></label>
                <input type="text" id="apellidoPaterno" name="apellidoPaterno" class="form-control" required>
                <div class="invalid-feedback">
                    <?php echo $lang['paternal_last_name_required']; ?>
                </div>
            </div>
            
            <!-- Campo: Apellido Materno -->
            <div class="form-group">
                <label for="apellidoMaterno" class="form-label"><?php echo $lang['maternal_last_name']; ?></label>
                <input type="text" id="apellidoMaterno" name="apellidoMaterno" class="form-control">
            </div>
            
            <!-- Campo: Dirección -->
            <div class="form-group">
                <label for="direccion" class="form-label"><?php echo $lang['address']; ?></label>
                <input type="text" id="direccion" name="direccion" class="form-control">
            </div>
            
            <!-- Campo: Teléfono -->
            <div class="form-group">
                <label for="telefono" class="form-label"><?php echo $lang['phone']; ?></label>
                <input type="text" id="telefono" name="telefono" class="form-control">
            </div>
            
            <!-- Campo: Email -->
            <div class="form-group">
                <label for="email" class="form-label"><?php echo $lang['email']; ?></label>
                <input type="email" id="email" name="email" class="form-control">
                <div class="invalid-feedback">
                    <?php echo $lang['valid_email_required']; ?>
                </div>
            </div>
            
            <!-- Campo: Fecha de Nacimiento -->
            <div class="form-group">
                <label for="fechaNacimiento" class="form-label"><?php echo $lang['birth_date']; ?></label>
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control">
            </div>
            
            <!-- Campo: CI (Cédula de Identidad) -->
            <div class="form-group">
                <label for="ci" class="form-label"><?php echo $lang['id_number']; ?><span class="required">*</span></label>
                <input type="text" id="ci" name="ci" class="form-control" required>
                <div class="invalid-feedback">
                    <?php echo $lang['id_number_required']; ?>
                </div>
            </div>
            
            <!-- Campo: Oficina -->
            <div class="form-group">
                <label for="idOficina" class="form-label"><?php echo $lang['branch']; ?><span class="required">*</span></label>
                <select id="idOficina" name="idOficina" class="form-control" required>
                    <option value=""><?php echo $lang['select_option']; ?></option>
                    <?php foreach ($oficinas as $oficina): ?>
                    <option value="<?php echo $oficina['idOficina']; ?>">
                        <?php echo $oficina['nombre']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?php echo $lang['branch_required']; ?>
                </div>
            </div>
            
            <div class="form-actions">
                <button type="submit" class="btn btn-primary"><?php echo $lang['save']; ?></button>
                <a href="index.php?controller=cliente&action=listar" class="btn btn-secondary"><?php echo $lang['cancel']; ?></a>
            </div>
        </form>
    </div>
</div>

<script>
// Validación del formulario con JavaScript
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('form-cliente');
    
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