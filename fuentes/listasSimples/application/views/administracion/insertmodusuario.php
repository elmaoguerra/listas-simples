<form action="<?php echo isset ($codigo) && $codigo != null ?  base_url().'index.php/adminusuariocontroller/actualizarAcc' : base_url().'index.php/adminusuariocontroller/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdusuario"> 
  <table width="600" border="1" align="center" cellspacing="0"> 
	 
	     <tr><td>Codigo</td><td><label for="txtcodigo"></label>
     <input type="text" name="txtcodigo" id="txtcodigo" <?php echo isset ($codigo) && $codigo != null ? "readonly" : ''; ?>    value="<?php echo isset ($codigo) && $codigo != null ? $codigo : ''; ?>"></td></tr>
     <tr><td>Nombre</td><td><label for="txtnombre"></label>
     <input type="text" name="txtnombre" id="txtnombre" value="<?php echo isset ($nombre) && $nombre != null ? $nombre : ''; ?>"></td></tr>
     <tr><td>Email</td><td><label for="txtemail"></label>
     <input type="text" name="txtemail" id="txtemail" value="<?php echo isset ($email) && $email != null ? $email : ''; ?>"></td></tr>
     <tr><td>Password</td><td><label for="txtpassword"></label>
     <input type="password" name="txtpassword1" id="txtpassword1" value=""></td></tr>
     <tr><td>Re-Password</td><td><label for="txtpassword"></label>
     <input type="password" name="txtpassword2" id="txtpassword2" value=""></td></tr>
     <tr><td>Ultima Conexion</td><td><label for="txtconexion"></label>
     <input type="text" name="txtconexion" id="txtconexion" readonly value="<?php echo isset ($conexion) && $conexion != null ? $conexion : ''; ?>"></td></tr>
     <tr><td>Grupo</td><td><label for="txtgrupo_id"></label>
     <input type="text" name="txtgrupo_id" id="txtgrupo_id" value="<?php echo isset ($grupo_id) && $grupo_id != null ? $grupo_id : ''; ?>"></td></tr>
 
	 
    <tr> 
      <td>&nbsp;</td> 
      <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($codigo) && $codigo != null ?  'Actualizar' : 'Registrar'; ?>" /></td> 
    </tr> 
  </table> 
</form> 

