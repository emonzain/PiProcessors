<script type="text/javascript">

var servicesArray = new Array();
var actionsArray = new Array();

<?php foreach($Model['actions'] as $ActionScript): ?>

	actionsArray["<?php echo $ActionScript->ActionCode ?>"] = new ActionScriptVM(<?php echo json_encode($ActionScript) ?>);

<?php endforeach; ?>
</script>

<div class="row">
    <div class="col s6 col m6 l6">
<?php foreach($Model['services'] as $Service): ?>

	<script type="text/javascript">

	servicesArray["<?php echo $Service->ServiceName ?>"] = new ServiceVM(<?php echo json_encode($Service) ?>);

	</script>
	
    <div class="col s6 m4 l4">
        <div class="card service-desc" id="service-<?php echo $Service->ServiceName ?>" data-model="<?php echo $Service->ServiceName ?>">
            <div class="card-image">
				<div class="image-block">
					<div class="circle ratio square fontchar-color-red">
						<div class="size140 valign-wrapper">
						<div class="valign center-align" style="width: 100%;" data-init-size="240">
						<?php echo FontChar::GetChar(substr($Service->ServiceName, 0, 1), "resizable-scale"); ?>
						</div>
						</div>
					</div>
							<span class="card-title"><?php echo $Service->ServiceName; ?></span>   
				</div>             
            </div>
            <div class="card-content">
                <p><?php echo $Service->ServiceDesc; ?></p>
            </div>
            <div class="card-action">
		<div class="row">
			<div class="col m6 left-align">
				<i class="ico-btn material-icons blue-text text-darken-3" id="btnLoaded" data-bind="css: IsActive() ? 'enabled' : 'disabled' ">done</i>
				<i class="ico-btn material-icons" id="btnLoaded" data-bind="click: Refresh, css: Waiting() ? 'spinning' : '' ">loop</i>
			</div>
			<div class="col m6 right-align">
				<i class="ico-btn material-icons red-text text-accent-4" id="btnRun" data-bind="click:ToggleService, css: IsRunning() ? 'enabled' : 'disabled' ">stop</i>
				<i class="ico-btn material-icons light-green-text text-accent-3" id="btnStop" data-bind="click:ToggleService, css: !IsRunning() ? 'enabled' : 'disabled'">play_arrow</i>
			</div>
		</div>
            </div>
        </div>   
    </div>   
    <?php endforeach; ?>
  
    </div>   
	
    <div class="col s6 col m6 l6">
		
    		<table class="responsive-table striped">   
        		<thead>
            			<tr>
							<th></th>
                			<th data-field="Name">Name</th>
                			<th data-field="File">Description</th>
							<th data-field="User">User</th>
							<th data-field="Target">Target</th>
            			</tr>
        		</thead>
			<tbody>
			<?php foreach($Model['actions'] as $ActionScript): ?>
				<tr class="actionscript-desc" id="actionscript-<?php echo $ActionScript->ActionCode ?>" data-model="<?php echo $ActionScript->ActionCode ?>">
					<td>
						<i class="ico-btn material-icons light-green-text text-accent-3 enabled" id="btnRunAction" data-bind="click:RunAction, visible: !Waiting()">play_arrow</i>
						<i class="ico-btn material-icons" id="btnLoaded" data-bind="visible: Waiting(), css: Waiting() ? 'spinning' : '' ">loop</i>
					</td>
					<td><?php echo $ActionScript->ActionName; ?></td>
					<td><?php echo $ActionScript->ScriptFile; ?></td>
					<td><?php echo $ActionScript->ActionUser; ?></td>
					<td><?php echo $ActionScript->ActionTarget; ?></td>
				</tr>
			<?php endforeach; ?>					
			</tbody>
		</table>
	</div>
	    
</div>

<div class="row">
    <table class="responsive-table striped">   
        <thead>
            <tr>
                <th data-field="Name">Name</th>
                <th data-field="Desc">Description</th>
                <th data-field="IsLoaded">Loaded</th>
                <th data-field="IsActive">Active</th>
                <th data-field="IsRunning">Running</th>
            </tr>
        </thead>
<?php foreach($Model['services'] as $Service): ?>
        <tbody>
            <tr>
                <td><?php echo $Service->ServiceName; ?></td>
                <td><?php echo $Service->ServiceDesc; ?></td>
                <td><?php echo $Service->IsLoaded; ?></td>
                <td><?php echo $Service->IsActive; ?></td>
                <td><?php echo $Service->IsRunning; ?></td>
            </tr>
        </tbody>
<?php endforeach; ?>
    </table>
</div>

<script type="text/javascript">

$(document).ready(function()
{
	$(".service-desc").each( function() 
	{
		var $this = $(this);
		var datakey = $this.data("model");
		
		ko.applyBindings(servicesArray[datakey], document.getElementById($this.attr('id')));
	});
	
	$(".actionscript-desc").each( function() 
	{
		var $this = $(this);
		var datakey = $this.data("model");
		
		ko.applyBindings(actionsArray[datakey], document.getElementById($this.attr('id')));
	});
});

</script>
