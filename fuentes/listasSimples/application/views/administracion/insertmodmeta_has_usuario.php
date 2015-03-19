<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminmeta_has_usuario/actualizarAcc' : base_url().'index.php/adminmeta_has_usuario/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdmeta_has_usuario"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtmeta_id"></label>
     <input type="text" name="txtmeta_id" id="txtmeta_id" value="<?php echo isset ($meta_id) && $meta_id != null ? $meta_id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtusuario_codigo"></label>
     <input type="text" name="txtusuario_codigo" id="txtusuario_codigo" value="<?php echo isset ($usuario_codigo) && $usuario_codigo != null ? $usuario_codigo : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtusuario_grupo_id"></label>
     <input type="text" name="txtusuario_grupo_id" id="txtusuario_grupo_id" value="<?php echo isset ($usuario_grupo_id) && $usuario_grupo_id != null ? $usuario_grupo_id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txttiempo"></label>
     <input type="text" name="txttiempo" id="txttiempo" value="<?php echo isset ($tiempo) && $tiempo != null ? $tiempo : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txteficiencia"></label>
     <input type="text" name="txteficiencia" id="txteficiencia" value="<?php echo isset ($eficiencia) && $eficiencia != null ? $eficiencia : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtfecha"></label>
     <input type="text" name="txtfecha" id="txtfecha" value="<?php echo isset ($fecha) && $fecha != null ? $fecha : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 
