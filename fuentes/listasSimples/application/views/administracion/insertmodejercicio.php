<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminejercicio/actualizarAcc' : base_url().'index.php/adminejercicio/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdejercicio"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtid"></label>
     <input type="text" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtenunciado"></label>
     <input type="text" name="txtenunciado" id="txtenunciado" value="<?php echo isset ($enunciado) && $enunciado != null ? $enunciado : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtlista_inicial"></label>
     <input type="text" name="txtlista_inicial" id="txtlista_inicial" value="<?php echo isset ($lista_inicial) && $lista_inicial != null ? $lista_inicial : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtsolucion"></label>
     <input type="text" name="txtsolucion" id="txtsolucion" value="<?php echo isset ($solucion) && $solucion != null ? $solucion : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtoperacion_id"></label>
     <input type="text" name="txtoperacion_id" id="txtoperacion_id" value="<?php echo isset ($operacion_id) && $operacion_id != null ? $operacion_id : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 
