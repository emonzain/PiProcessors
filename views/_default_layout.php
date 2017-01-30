<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Raspi - Webcontrol</title>
	
  	<!-- Compiled and minified CSS -->
  	<link rel="stylesheet" href="/assets/css/materialize.min.css">

  	<!-- Compiled and minified JavaScript -->
  	<script src="/assets/js/materialize.min.js"></script>	
</head>
<body>
  <div id="header">
    <h1><?php echo $Title; ?></h1>
  </div>
  
  <div id="content">
    <?php echo error_notices_render(); ?>
    <div id="main">
      <?php echo $content;?>
      <hr class="space">
    </div>
  </div>

</body>
</html>
