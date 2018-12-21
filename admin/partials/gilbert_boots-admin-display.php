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

$sql    = "SELECT id,nombre FROM " . GIL_TABLE  ;
$result = $this->db->get_results( $sql );


?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="container">
	<div class="row">

		<div class="col-md-9">
			<h3 class="text-left">Gilbert Boots</h3>
			<button id="modal_table" class="btn btn-success btn-sm mb-3 mt-2" >Crear Nueva Tabla De Datos</button>
			<table class="table table bordered table-sm table-hover">
				<tr class="text-center">
					<th >Nombre</th>
					<th >Shortcode</th>
					<th>Acciones</th>
				</tr>
				<?php
				  foreach ($result as $k => $v): 
				  	$id     = $v->id;
				  	$nombre = $v->nombre;
				?>

					<tr class="text-center">
						<td><?php echo $nombre ?></td>
						<td>[gilbert_boots id='<?php echo $id ?>']</td>
						<td>
							<button data-edit="<?php echo $id ?>" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i> Editar </button>
							<button data-delete="<?php echo $id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash-alt"></i> Borrar </button>
						</td>
					</tr>

				<?php endforeach ?>
				
			</table>
		</div>
	</div>
</div>
<!-- modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalTabla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Tabla</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form class="has-danger ">
      		<label for="">Nombre de la tabla</label>
      		        <input id="nombreTabla" type="text" class="form-control " placeholder="Escribe aquí el nombre de la tabla" autofocus>
      		        <small class=" ">Introduce un nombre de al menos 4 caracteres</small>
      		        <!-- <small class="invalid-feedback d-none">Debes introducir un nombre para la tabla</small> -->
      	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger"><i class="fa fa-ban"></i> Cancelar</button>
        <button id="crearTabla" type="button" class="btn btn-primary "  data-dismiss="modal"><i class="fa fa-check-circle"></i> Crear Tabla</button>
      </div>
    </div>
  </div>
</div>
