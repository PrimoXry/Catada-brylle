<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
    <h1>Welcome to Update Pet's Information</h1>
    <h2>Please update the details below:</h2>
    <form action="<?=site_url('/pet/update/'.$pet['id']);?>" method="post">
        <label for="name">🐾Name</label><br>
        <input type="text" name="name" value="<?=html_escape($pet['name']);?>"><br>

        <label for="type">🐾Type</label><br>
       <select name="type" id="">
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
            <option value="Bird">Bird</option>
            <option value="Hamster">Hamster</option>
            <option value="Rabbit">Rabbit</option>
            <option value="Fish">Fish</option>
            <option value="Turtle">Turtle</option>
            <option value="Other">Other</option>
        </select>

        <label for="age">🐾Age</label><br>
        <input type="text" name="age" value="<?=html_escape($pet['age']);?>"><br>

        <button type='submit'>Update</button>
    </form>
</body>
</html>
