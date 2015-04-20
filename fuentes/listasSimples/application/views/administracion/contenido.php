<html>
<head>

<!-- fancy box -->
<script src="<?php echo base_url();?>js/fancybox/jquery-1.4.3.min.js"></script>	
<script type="text/javascript" src="<?php echo base_url();?>js/fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>js/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" href="<?php echo base_url();?>js/fancybox/style.css" />	
<script type="text/javascript">
		$(document).ready(function() {

			$("a[rel=fancy_group]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});

		});
</script>

</head>
<body>



<table width="100%" border="0">
  <tr>
    <td width="75%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="center">
          <?php if(isset ($titulo)){
		echo  $titulo;
	}?>
          </div></td>
        </tr>
      <?php if(isset ($notificacion)){ ?>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><div align="center"><?php echo $notificacion; ?></div></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        </tr>
      <?php }?>
      <tr>
        <td><div align="center">
          <?php if(isset ($contenidoInt)){
		echo  $contenidoInt;
	}?>
          </div></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>