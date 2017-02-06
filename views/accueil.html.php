<script type="text/javascript">

var servicesArray = new Array();

</script>

<div class="row">
    
<?php foreach($Model as $Service): ?>

	<script type="text/javascript">

	servicesArray["<?php echo $Service->ServiceName ?>"] = new ServiceVM(<?php echo json_encode($Service) ?>);

	</script>
	
    <div class="col s6 m4 l2">
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
				<span class="left-align">
					<i class="material-icons" id="btnLoaded">done</i>
				</span>
				<span class="right-align">
					<i class="material-icons" id="btnRun" data-bind="click:ToggleService">stop</i>
					<i class="material-icons" id="btnStop">play_arrow</i>
				</span>
            </div>
        </div>
    </div>        
<?php endforeach; ?>
    
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
<?php foreach($Model as $Service): ?>
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
});

</script>
