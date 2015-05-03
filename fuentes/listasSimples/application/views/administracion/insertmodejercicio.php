<form action="<?php echo isset ($id) && $id != null ?  base_url().'index.php/adminejerciciocontroller/actualizarAcc' : base_url().'index.php/adminejerciciocontroller/insertarAcc'; ?>" method="post" enctype="multipart/form-data" name="formInsUpdejercicio">
  
  <div style="height:450px;">
  
  <table width="70%" border="0" align="center">
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="left"><h2><?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?> Ejercicio</h2></td>
    </tr>
    <tr>
      <td><table width="600" border="0" align="center" cellspacing="0">
        <tr>
          <td width="169" align="left" valign="top">Enunciado</td>
          <td width="421" align="left"><label for="txtenunciado"></label>
            <input type="hidden" name="txtid" id="txtid" value="<?php echo isset ($id) && $id != null ? $id : ''; ?>" />
            <textarea name="txtaEnunciado" id="txtaEnunciado" cols="60" rows="5"><?php echo isset ($enunciado) && $enunciado != null ? $enunciado : ''; ?></textarea></td>
        </tr>
        <tr>
          <td align="left">Lista Inicial</td>
          <td align="left"><label for="txtlista_inicial"></label>
            <input type="text" name="txtlista_inicial" id="txtlista_inicial" value="<?php echo isset ($lista_inicial) && $lista_inicial != null ? $lista_inicial : ''; ?>" /></td>
        </tr>
        <tr>
          <td align="left">operacion</td>
          <td align="left"><label for="txtoperacion_id"></label>
            <select name="txtoperacion_id">
              <option <?php echo $operacionSel== 0 ? "selected":"" ?> value="0">Seleccione ...</option>
              <?php  
					if(isset ($operacionesAsoc)){ 
						if($operacionesAsoc!=false){ 
							 
							foreach ($operacionesAsoc->result() as $row) 
							{?>
              <option <?php echo $operacionSel == $row->id  ? "selected":"" ?>  value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
              <?php }
						}
					}
					?>
            </select></td>
        </tr>
        <tr>
          <td align="left" valign="top">Lineas</td>
          <td align="left"><label for="txtaLienas"></label>
            <textarea name="txtaLienas" id="txtaLienas" cols="60" rows="5"><?php echo isset ($lineas) && $lineas != null ? $lineas : ''; ?></textarea></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="right"><input type="submit" name="btnInsertar" id="btnInsertar" value="<?php echo isset ($id) && $id != null ?  'Actualizar' : 'Registrar'; ?>" /></td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="right">&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>

</form> 

