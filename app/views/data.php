<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/data.css">
</head>
<body>
    <div>
        <form action="<?=site_url('user');?>" method="get" class="col-sm-4 float-end d-flex">
		<?php
		$q = '';
		if(isset($_GET['q'])) {
			$q = $_GET['q'];
		}
		?>
        <input class="form-control me-2" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn btn-primary" type="button">Search</button>
	</form>
    <h1>Welcome to Pet's Data</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Age</th>
            <th>Action</th>
        </tr>

        <?php foreach (html_escape($user) as $pet):?>
            <tr>
                <td><?=$pet['id'];?></td>
                 <td><?=$pet['name'];?></td>
                  <td><?=$pet['type'];?></td>
                   <td><?=$pet['age'];?></td>
                   <td><a href= "<?=site_url ('/pet/update/'.$pet['id']);?>">Update</a> |
                     <a href= "<?=site_url ('/pet/softdelete/'.$pet['id']);?>">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>    
    </table>
            <a href="<?=site_url('/pet/create');?>">Create</a>
    <?php
	echo $page;?>
      </div>
</body>
</html>