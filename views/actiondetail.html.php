<script type="text/javascript">

var actionDetails = new ActionScriptVM(<?php echo json_encode($ActionScript) ?>);

</script>

<div class="row">
  <div class="col s12 m6 l6">
    <div class="circle ratio square fontchar-color-red">
    

						<div class="valign center-align" style="width: 100%;" data-init-size="240">
						  <span>DO</span>
              <span>
                <i class="ico-btn material-icons" id="btnLoaded" data-bind="visible: Waiting(), css: Waiting() ? 'spinning' : '' ">loop</i>
              </span>
            </div>
						    
    
    </div>
  </div>
</div>
