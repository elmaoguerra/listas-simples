<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminejerciciocontroller/actualizarAcc' : base_url().'index.php/adminejerciciocontroller/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdejercicio"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
     <tr><td width="169" valign="top">Enunciado</td><td width="421"><label for="txtenunciado"></label>
        <input type="hidden" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>">
        <textarea name="txtaEnunciado" id="txtaEnunciado" cols="60" rows="5"><?php echo isset ($enunciado) && $enunciado != null ? $enunciado : ''; ?></textarea>
     </td></tr>
     
     <tr><td>Lista Inicial</td><td><label for="txtlista_inicial"></label>
     <input type="text" name="txtlista_inicial" id="txtlista_inicial" value="<?php echo isset ($lista_inicial) && $lista_inicial != null ? $lista_inicial : ''; ?>"></td></tr>
     
     <tr><td>operacion</td><td><label for="txtoperacion_id"></label>
     <input type="text" name="txtoperacion_id" id="txtoperacion_id" value="<?php echo isset ($operacion_id) && $operacion_id != null ? $operacion_id : ''; ?>"></td></tr>
 
	 
    <tr>
      <td valign="top">Lineas</td>
       <td align="left"><label for="txtaLienas"></label>
       <textarea name="txtaLienas" id="txtaLienas" cols="60" rows="5"><?php echo isset ($lineas) && $lineas != null ? $lineas : ''; ?></textarea></td>
    </tr>
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 

