<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/data.css">
</head>
<body>

<div class="topnav">
    <h1>Welcome to Pet's Data</h1>
    <form action="<?=site_url('pet/show/');?>" method="get">
        <?php
        $q = '';
        if(isset($_GET['q'])) {
            $q = $_GET['q'];
        }
        ?>
        <input class="search" name="q" type="text" placeholder="Search" value="<?=html_escape($q);?>">
        <button type="submit" class="btn">Search</button>
    </form>
</div>

<h2>List of Pets</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Type</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php if(!empty($all)):?>
    <?php foreach (html_escape($all) as $pet):?>
        <tr>
            <td><?=$pet['id'];?></td>
            <td><?=$pet['name'];?></td>
            <td><?=$pet['type'];?></td>
            <td><?=$pet['age'];?></td>
            <td>
                <a href="<?=site_url('/pet/update/'.$pet['id']);?>">Update</a> |
                <a href="<?=site_url('/pet/softdelete/'.$pet['id']);?>">Delete</a>
            </td>
        </tr>
    <?php endforeach;?>    
    <?php else:?>
        <tr>
            <td colspan="5">No Records Found</td>
        </tr>
    <?php endif;?>
</table>

<?php echo $page;?>

<div class="actions">
    <a href="<?= site_url('/pet/create'); ?>" class="btn create">➕ Create</a>
    <a href="<?= site_url('/pet/restore'); ?>" class="btn create">🔄 Restore</a>
    <a href="<?= site_url('/'); ?>" class="btn create">🏰 Home</a>
</div>

<!-- ✅ Logout Button -->
<div class="logout-section" style="text-align:center; margin-bottom:40px;">
    <a href="<?= site_url('auth/logout'); ?>" class="btn-logout">🚪 Logout</a>
</div>

</body>
</html>
