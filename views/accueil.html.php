
<div class="row">
    
<?php foreach($Model as $Service): ?>
    <div class="col s6 m4 l2">
        <div class="card">
            <div class="card-image">
		<div class="image-block">
		    <div class="circle ratio square fontchar-color-red">
		        <div class="size140 valign-wrapper">
			<?php echo FontChar::GetChar(substr($Service->ServiceName, 0, 1), "valign"); ?>
		        </div>
		    </div>
		</div>
                <span class="card-title"><?php echo $Service->ServiceName; ?></span>                
            </div>
            <div class="card-content">
                <p><?php echo $Service->ServiceDesc; ?></p>
            </div>
            <div class="card-action">
                <a href="#"></a>
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
