<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adventurer's Guild</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/data.css">
</head>
<body>
    <div class="header-row">
    <h1>Restore Data</h1>
</div>

    <table class="guild-table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Type</th>
            <th>Age</th>
            <th>Deleted At</th>
            <th>Action</th>
        </tr>
        <?php foreach($pets as $pet):?>
            <tr>
                <td><?= $pet['id']; ?></td>
                <td><?= $pet['name']; ?></td>
                <td><?= $pet['type']; ?></td>
                <td><?= $pet['age']; ?></td>
                <td><?= $pet['deleted_at']; ?></td>
                <td>
                    <a href="<?= site_url('/pet/retrieve/'.$pet['id']); ?>" class="btn">Restore</a> | 
                    <a href="<?= site_url('/pet/delete/'.$pet['id']); ?>" class="btn danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php
	echo $page;?>
	</div>

    <div class="actions">
        <a href="<?= site_url('/pet/show'); ?>" class="btn create">❌ Back</a>
    </div>
</body>
</html>
