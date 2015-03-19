<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminmeta/actualizarAcc' : base_url().'index.php/adminmeta/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdmeta"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtid"></label>
     <input type="text" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtnombre"></label>
     <input type="text" name="txtnombre" id="txtnombre" value="<?php echo isset ($nombre) && $nombre != null ? $nombre : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtmetacol"></label>
     <input type="text" name="txtmetacol" id="txtmetacol" value="<?php echo isset ($metacol) && $metacol != null ? $metacol : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 
