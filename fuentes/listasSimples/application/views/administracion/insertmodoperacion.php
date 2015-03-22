<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminoperacioncontroller/actualizarAcc' : base_url().'index.php/adminoperacioncontroller/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdoperacion"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
     <tr><td>Nombre</td><td><label for="txtname"></label>
     <input type="hidden" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>" />
     <input type="text" name="txtname" id="txtname" value="<?php echo isset ($name) && $name != null ? $name : ''; ?>" /></td></tr>
     <tr><td>Descripcion</td><td><label for="txtdescripcion"></label>
     <input type="text" name="txtdescripcion" id="txtdescripcion" value="<?php echo isset ($descripcion) && $descripcion != null ? $descripcion : ''; ?>" /></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 

