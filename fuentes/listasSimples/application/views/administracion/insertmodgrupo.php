<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/admingrupo/actualizarAcc' : base_url().'index.php/admingrupo/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdgrupo"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtid"></label>
     <input type="text" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtnombre"></label>
     <input type="text" name="txtnombre" id="txtnombre" value="<?php echo isset ($nombre) && $nombre != null ? $nombre : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtmetas"></label>
     <input type="text" name="txtmetas" id="txtmetas" value="<?php echo isset ($metas) && $metas != null ? $metas : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtautoreflexion"></label>
     <input type="text" name="txtautoreflexion" id="txtautoreflexion" value="<?php echo isset ($autoreflexion) && $autoreflexion != null ? $autoreflexion : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 
