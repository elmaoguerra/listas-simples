<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminusuario/actualizarAcc' : base_url().'index.php/adminusuario/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdusuario"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Titulo</td><td><label for="txtcodigo"></label>
     <input type="text" name="txtcodigo" id="txtcodigo" value="<?php echo isset ($codigo) && $codigo != null ? $codigo : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtnombre"></label>
     <input type="text" name="txtnombre" id="txtnombre" value="<?php echo isset ($nombre) && $nombre != null ? $nombre : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtemail"></label>
     <input type="text" name="txtemail" id="txtemail" value="<?php echo isset ($email) && $email != null ? $email : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtpassword"></label>
     <input type="text" name="txtpassword" id="txtpassword" value="<?php echo isset ($password) && $password != null ? $password : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtconexion"></label>
     <input type="text" name="txtconexion" id="txtconexion" value="<?php echo isset ($conexion) && $conexion != null ? $conexion : ''; ?>"></td></tr>
     <tr><td>Titulo</td><td><label for="txtgrupo_id"></label>
     <input type="text" name="txtgrupo_id" id="txtgrupo_id" value="<?php echo isset ($grupo_id) && $grupo_id != null ? $grupo_id : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 
