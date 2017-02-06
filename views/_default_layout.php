<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Raspi - Webcontrol</title>
	
  	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  	<link rel="stylesheet" href="/assets/css/materialize.min.css">
  	<link rel="stylesheet" href="/assets/css/site.css">
  	<link rel="stylesheet" href="/assets/css/site-animation.css">
  	<link rel="stylesheet" href="/assets/css/CurtissFont.css">

  	<!-- Compiled and minified JavaScript -->
  	<script src="/assets/js/jquery-3.1.1.min.js"></script>	
  	<script src="/assets/js/materialize.min.js"></script>	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.1/knockout-min.js"></script>
	
	<script src="/scripts/rendering.js"></script>
	
	<script src="/scripts/ViewModels/ServiceVM.js"></script>
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
