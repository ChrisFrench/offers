<!DOCTYPE html>
<html lang="en" class="default <?php echo @$html_class; ?>" >
<head>
    <?php echo $this->renderLayout('common/head.php'); ?>
</head>
<body>
	<!-- PAGE -->
	<div data-role="page" style="background:#ccc!important" >
		<?php // <tmpl type="system.messages" /> ?>
         <tmpl type="view" />
		<!--/FOOTER -->
	</div>
	<!--/PAGE -->
	
<?php echo $this->renderLayout('common/footer.php'); ?>
</body>
</html>

