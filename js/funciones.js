$(document).ready(function(){

	$("#btnAgregar").click(function(){

		var nombre=$('#nombre').val();
		var apellido=$('#apellido').val();
		var usuario=$('#usuario').val();
		var contrasenia=$('#contrasenia').val();
		var btnAgregar=$('#btnAgregar').val();
		$.ajax({
			'method' : 'POST',
			'url' : 'formulario',
			'data' : {nombre:nombre, apellido:apellido, usuario:usuario, contrasenia,contrasenia, btnAgregar:btnAgregar}
		})
		.done(function(){
			alert("Usuario agregado correctamente")
			$('#nombre').val("");
			$('#apellido').val("");
			$('#usuario').val("");
			$('#contrasenia').val("");
		})
	})
selecPersona= function(id,nombre,apellido,usuario)
{
	$('#modId').val(id);
	$('#modnombre').val(nombre);
	$('#modapellido').val(apellido);
	$('#modusuario').val(usuario);
}
$('#btnEliminar').click(function(){
	var id=$('#modId').val();
	var btnEliminar=$('#btnEliminar').val();
	$.ajax({
		'method' : 'POST',
		'url' : 'formulario',
		'data' : {id:id, btnEliminar:btnEliminar}
	})
	.done(function(respuesta){
		$('#modId').val("");
		$('#modnombre').val("");
		$('#modapellido').val("");
		$('#modusuario').val("");
		$('#modcontrasenia').val("");
		alert("Usuario eliminado correctamente");
		$('#modModificar').modal('toggle');
		$('#frmTabla').html("");
		$('#frmTabla').html(respuesta);
	})
})
$('#btnModificar').click(function(){
	var id=$('#modId').val();
	var nombre=$('#modnombre').val();
	var apellido=$('#modapellido').val();
	var usuario=$('#modusuario').val();
	var contrasenia=$('#modusuario').val();
	var btnModificar=$('#btnModificar').val();
	$.ajax({
		'method' : 'POST',
		'url' : 'formulario',
		'data' : {id:id, nombre:nombre, apellido:apellido, usuario:usuario, contrasenia:contrasenia, btnModificar:btnModificar}
	})
	.done(function(respuesta){
		$('#modId').val("");
		$('#modnombre').val("");
		$('#modapellido').val("");
		$('#modusuario').val("");
		$('#modcontrasenia').val("");
		alert("Usuario modifico correctamente");
		$('#modModificar').modal('toggle');
		$('#frmTabla').html("");
		$('#frmTabla').html(respuesta);
	})
})
})