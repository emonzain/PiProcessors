<script type="text/javascript">

var actionDetails = new ActionScriptVM(<?php echo json_encode($Model) ?>);

</script>


<div class="row">
  <div class="action-desc col s12 m4 l2 offset-l5 offset-m4" id="action-<?php echo $Model->ActionCode ?>">
	<div class="center-align">
		<h2><?php echo $Model->ActionName ?></h2>
	  </div>
    <div class="ico-btn disabled circle ratio square fontchar-color-red" data-bind="click: RunAction(), css: Waiting() ? 'disabled' : 'enabled'">
    
	
	<div class="valign-wrapper" style="width: 100%;" data-init-size="240">
	      <div data-bind="visible: !Waiting()" class="center-align" style="width: 100%">DO</div>
              <div data-bind="visible: Waiting()" class="center-align" style="width: 100%">
                <i class="ico-btn material-icons" id="btnLoaded" data-bind="css: Waiting() ? 'spinning' : '' ">loop</i>
              </div>
        </div>
						    
    
    </div>
  </div>
</div>


<script type="text/javascript">
$(document).ready(function()
{
	$(".action-desc").each( function() 
	{
		var $this = $(this);
		var datakey = $this.data("model");
		
		ko.applyBindings(actionDetails, document.getElementById($this.attr('id')));
	});
});
</script>
