<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminresultado/actualizarAcc' : base_url().'index.php/adminresultado/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdresultado"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtejercicio_id"></label>
     <input type="text" name="txtejercicio_id" id="txtejercicio_id" value="<?php echo isset ($ejercicio_id) && $ejercicio_id != null ? $ejercicio_id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtusuario"></label>
     <input type="text" name="txtusuario" id="txtusuario" value="<?php echo isset ($usuario) && $usuario != null ? $usuario : ''; ?>"></td></tr>
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
