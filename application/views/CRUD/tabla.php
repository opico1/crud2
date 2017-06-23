<div class="row">
<div class="col-md-2"> </div>
<div class="col-md-8">
<table class="table table-bordered">
	<tr>
		<th>Usuario ID</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Usuario</th>
	</tr>
	<?php  
	foreach ($arrUsuario ->result() as $usuario) {
		echo "<tr>
		<td>".$usuario->IDUSUARIO."</td>
		<td>".$usuario->NOMBRE."</td>
		<td>".$usuario->APELLIDO."</td>
		<td>".$usuario->USUARIO."</td>
		</tr>";


	}
	?>
</table>
</div>
<div class="col-md-2"></div>
</div>