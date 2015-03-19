<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminoperacion/actualizarAcc' : base_url().'index.php/adminoperacion/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdoperacion"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtid"></label>
     <input type="text" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtname"></label>
     <input type="text" name="txtname" id="txtname" value="<?php echo isset ($name) && $name != null ? $name : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtdescripcion"></label>
     <input type="text" name="txtdescripcion" id="txtdescripcion" value="<?php echo isset ($descripcion) && $descripcion != null ? $descripcion : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 
