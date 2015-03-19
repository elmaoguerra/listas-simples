<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminsentencia/actualizarAcc' : base_url().'index.php/adminsentencia/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdsentencia"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtid"></label>
     <input type="text" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtinstruccion"></label>
     <input type="text" name="txtinstruccion" id="txtinstruccion" value="<?php echo isset ($instruccion) && $instruccion != null ? $instruccion : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtejercicio_id"></label>
     <input type="text" name="txtejercicio_id" id="txtejercicio_id" value="<?php echo isset ($ejercicio_id) && $ejercicio_id != null ? $ejercicio_id : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 
