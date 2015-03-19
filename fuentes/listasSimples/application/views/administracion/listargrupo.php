 
 
<!-- data table --> 
<link rel="stylesheet" href="<?php echo base_url();?>js/tinytable/style.css" /> 
 
<div id="tablewrapper"> 
		<div id="tableheader"> 
        	<div class="search"> 
                <select id="columns" onchange="sorter.search('query')"></select> 
                <input type="text" id="query" onkeyup="sorter.search('query')" /> 
            </div> 
            <span class="details"> 
				<div>Records <span id="startrecord"></span>-<span id="endrecord"></span> of <span id="totalrecords"></span></div> 
        		<div><a href="javascript:sorter.reset()">reset</a></div> 
        	</span> 
        </div> 
        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable"> 
            <thead> 
                <tr> 
                         <th><h3>id</h3></th>
     <th><h3>nombre</h3></th>
     <th><h3>metas</h3></th>
     <th><h3>autoreflexion</h3></th>
     <th align="center" class="nosort"><h3>Editar</h3></th>
    <th width="50" align="center" class="nosort"><h3>Eliminar</h3></th>
 
                </tr> 
            </thead> 
            <tbody> 
                
                 <?php  
					if(isset ($data)){ 
						if($data!=false){ 
							 
							foreach ($data->result() as $row) 
							{?> 
							 
						  <tr> 
							 
							     <td align="center"><?php echo $row->id; ?></td>
     <td align="center"><?php echo $row->nombre; ?></td>
     <td align="center"><?php echo $row->metas; ?></td>
     <td align="center"><?php echo $row->autoreflexion; ?></td>
     <td width="50" align="center"><a href="<?php echo base_url();?>index.php/admingrupo/actualizar/<?php echo $row->id;?>"><img src="<?php echo base_url();?>images/editar.png" width="21" height="21" style="border: none;" /></a></td>
    <td align="center"><a href="<?php echo base_url();?>index.php/admingrupo/eliminar/<?php echo $row->id;?>"><img src="<?php echo base_url();?>images/delete.png" width="21" height="21" style="border: none;" /></a></td>
 
							 
						  </tr>   
							<?php 
							} 
						} 
					} 
					?> 
 
            </tbody> 
        </table> 
        <div id="tablefooter"> 
          <div id="tablenav"> 
            	<div> 
                    <img src="<?php echo base_url();?>js/tinytable/images/first.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1,true)" /> 
                    <img src="<?php echo base_url();?>js/tinytable/images/previous.gif" width="16" height="16" alt="First Page" onclick="sorter.move(-1)" /> 
                    <img src="<?php echo base_url();?>js/tinytable/images/next.gif" width="16" height="16" alt="First Page" onclick="sorter.move(1)" /> 
                    <img src="<?php echo base_url();?>js/tinytable/images/last.gif" width="16" height="16" alt="Last Page" onclick="sorter.move(1,true)" /> 
                </div> 
                <div> 
                	<select id="pagedropdown"></select> 
				</div> 
                <div> 
                	<a href="javascript:sorter.showall()">view all</a> 
                </div> 
            </div> 
			<div id="tablelocation"> 
            	<div> 
                    <select onchange="sorter.size(this.value)"> 
                    <option value="5">5</option> 
                        <option value="10" selected="selected">10</option> 
                        <option value="20">20</option> 
                        <option value="50">50</option> 
                        <option value="100">100</option> 
                    </select> 
                    <span>Entries Per Page</span> 
                </div> 
                <div class="page">Page <span id="currentpage"></span> of <span id="totalpages"></span></div> 
            </div> 
        </div> 
    </div> 
	<script type="text/javascript" src="<?php echo base_url();?>js/tinytable/script.js"></script> 
	<script type="text/javascript"> 
	var sorter = new TINY.table.sorter('sorter','table',{ 
		headclass:'head', 
		ascclass:'asc', 
		descclass:'desc', 
		evenclass:'evenrow', 
		oddclass:'oddrow', 
		evenselclass:'evenselected', 
		oddselclass:'oddselected', 
		paginate:true, 
		size:10, 
		colddid:'columns', 
		currentid:'currentpage', 
		totalid:'totalpages', 
		startingrecid:'startrecord', 
		endingrecid:'endrecord', 
		totalrecid:'totalrecords', 
		hoverid:'selectedrow', 
		pageddid:'pagedropdown', 
		navid:'tablenav', 
		sortcolumn:1, 
		sortdir:1, 
		init:true 
	}); 
  </script> 
