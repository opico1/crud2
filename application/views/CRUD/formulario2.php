<!-- Modal -->
<div id="modModificar" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar Usuario</h4>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
        <div id="m-id">
          <label >Usuario ID</label>
          <input type="text" id="modId" class="form-control" readonly>
        </div>
        <div id="m-nombre">
          <label >Nombre</label>
          <input type="text" id="modnombre" class="form-control"  required="true">
        </div>
        <div id="m-apellido">
          <label >Apellido</label>
          <input type="text" id="modapellido" class="form-control" required="true" >
        </div>
        <div id="m-usurio">
          <label >Usuario</label>
          <input type="text" id="modusuario" class="form-control" required="true" >
        </div>
        <div id="m-contra">
          <label >Contraseña</label>
          <input type="password" id="modcontrasenia" class="form-control"  required="true">
        </div>
      </form>
      <div class="modal-footer">
        <button name="btnModificar" type="submit" value="btnModificar" class="btn btn-info" id="btnModificar" >Modificar</button>
        <button name="btnEliminar" value="btnEliminar" class="btn btn-warning" id="btnEliminar">Eliminar</button>
      </div>
    </div>

  </div>
</div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <div id="frmTabla">

        <table class="table table-striped table-hover" id="tabla">
        <tr>
          <th>Usuario ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Usuario</th>
          <th>Aciones</th>
        </tr>
      <?= form_close() ?>
    <?php 
    foreach ($arrUsuario ->result() as $usuario) {
       ?> 
    <?= form_open("#") ?>
    <?php 
    echo"<tr>
  <td>".$usuario->IDUSUARIO."<input type='text' name='idProc' hidden='true' value='".$usuario->IDUSUARIO."'></td>
  <td>".$usuario->NOMBRE."</td>
  <td>".$usuario->APELLIDO."</td>
  <td>".$usuario->USUARIO."</td>
  <td><button type='button' class='btn btn-info btn-sm' data-toggle='modal' data-target='#modModificar' id='btnModal'onClick=\"selecPersona('$usuario->IDUSUARIO','$usuario->NOMBRE','$usuario->APELLIDO','$usuario->USUARIO')\">accion</button></td>
  </tr>";//campo contraseña para ver que si esta enciptada sin entrar a la base
 ?> 
<?= form_close() ?>
<?php 
    }//cierre de foreach
 
     ?>
      </table>
      </div>
    </div>
    <div class="col-md-2"></div>
  </div> 
