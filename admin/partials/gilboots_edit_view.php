<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://hernandochaves.com
 * @since      1.0.0
 *
 * @package    Gilbert_boots
 * @subpackage Gilbert_boots/admin/partials
 */
$id = $_GET['id'];
$sql    = "SELECT * FROM " . GIL_TABLE . " WHERE id = $id"  ;
$result = $this->db->get_var( $sql );
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">
	<div class="row">
		<div class="col-md-9">
			<h3 class="text-left">Tabla con el ID <?php echo $id ?></h3>
			<a href="?page=gilboots"  class="btn btn-primary btn-sm mb-3 mt-2" >Regresar</a>
			<button id="modal_usuario" class="btn btn-success btn-sm mb-3 mt-2" >Crear Nuevo Usuario</button>
			<table class="table table bordered table-sm table-hover">
				<tr class="text-center">
					<th >Nombre</th>
					<th >Apellido</th>
					<th >Correo</th>
					<th>Acciones</th>
				</tr>
					<tr class="text-center">
						<td>Hernando</td>
						<td>Chaves</td>
						<td>chaza-hejo-strong@hotmail.com</td>
						<td>
							<button data-edit="<?php echo $id ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i> Editar </button>
							<button data-delete="<?php echo $id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Borrar </button>
						</td>
					</tr>

				
			</table>
		</div>
	</div>
</div>
<!-- modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Usuario</h5>
        <input type="hidden" value="<?php echo $id ?>">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<label for="">Nombre</label>
        <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Escribe aquí el nombre del usuario" autofocus>
      </div>

      <div class="modal-body">
      	<label for="">Apellido</label>
        <input id="apellido" type="text" name="apellido" class="form-control" placeholder="Escribe aquí el apellido del usuario">
      </div>

      <div class="modal-body">
      	<label for="">Correo</label>
        <input id="correo" type="email" name="correo" class="form-control" placeholder="Escribe aquí el correo del usuario">
      </div>

      <label class="custom-file">
        <input type="file" id="file" class="custom-file-input">
        <span class="custom-file-control"></span>
      </label>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" ><i class="fa fa-ban"></i> Cancelar</button>
        <button id="crearUsuario" type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-check-circle"></i> Crear Usuario</button>
      </div>
    </div>
  </div>
</div>
