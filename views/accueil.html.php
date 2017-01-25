

<table>    
    <tr>
        <td>ServiceName</td>
        <td>ServiceDesc</td>
        <td>IsLoaded</td>
        <td>IsActive</td>
        <td>IsRunning</td>
    </tr>
<?php foreach($Model as $Service): ?>
    <tr>
        <td><?php echo $Service->ServiceName; ?></td>
        <td><?php echo $Service->ServiceDesc; ?></td>
        <td><?php echo $Service->IsLoaded; ?></td>
        <td><?php echo $Service->IsActive; ?></td>
        <td><?php echo $Service->IsRunning; ?></td>
    </tr>
<?php endforeach; ?>
</table>
