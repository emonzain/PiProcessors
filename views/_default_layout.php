<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Raspi - Webcontrol</title>
</head>
<body>
  <div id="header">
    <h1>$content->Title</h1>
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
