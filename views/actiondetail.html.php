<script type="text/javascript">

var actionDetails = new ActionScriptVM(<?php echo json_encode($ActionScript) ?>);

</script>

<div class="row">
  <div class="action-desc col s12 m4 l2 offset-l5 offset-m4" id="action-<?php echo $ActionScript->ActionCode ?>">
    <div class="ico-btn circle ratio square fontchar-color-red" data-bind="click: RunAction()">
    

						<div class="valign center-align" style="width: 100%;" data-init-size="240">
						  <span data-bind="visible: !Waiting()">DO</span>
              <span>
                <i class="ico-btn material-icons" id="btnLoaded" data-bind="visible: Waiting(), css: Waiting() ? 'spinning' : '' ">loop</i>
              </span>
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
