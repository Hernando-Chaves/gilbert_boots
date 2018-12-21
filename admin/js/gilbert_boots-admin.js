(function( $ ) {
	'use strict';

	var url_edit = '?page=gilboots&action=edit&id=';

	$('#modal_table').on('click',function(){
		$('#modalTabla').modal();
	});

	// CRER Tabla
	$('#crearTabla').on('click',function(e){
		e.preventDefault();
		var nombreTabla = $('#nombreTabla').val();
		if(nombreTabla.length <= 3)
		{
			$('#nombreTabla').addClass('is-invalid');
			$('.modal-body small:first').addClass('invalid-feedback');
			return false;
		}else {
			$('.modal-body small:first').addClass('d-none');
		}
			$.ajax({
			url : giltest.url,
			type : 'POST',
			dataType : 'json',
			data : {
				action :'gil_ajax_table',
				nonce : giltest.security,
				tipo : 'add',
				nombre : nombreTabla
			},
			success:function(data){
				swal({
					type : 'success',
					title: 'La Tabla ' + nombreTabla + ' Fue Creada Exitosamente',
					position:'top-end',
					timer : 1800,

				});
				setTimeout(function(){
					location.href = url_edit + data.insert_id;
				},200);
				
			},
			error: function(d,x,v){
                console.log(d);
                console.log(x);
                console.log(v);
            }
		})
		
	});
	/*EDITAR TABLA*/
	$(document).on('click','[data-edit]',function(){
		var id = $(this).attr('data-edit');
		location.href = url_edit + id;
	});
	/*CREAR USUARIO*/
	$('#modal_usuario').on('click',function(){
		$('#modalUsuario').modal();
	});
	

})( jQuery );
