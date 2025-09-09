<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/style.css">
</head>
<body>
    <h1>Pet's Information</h1>
    <h2>Please enter the details below:</h2>
    <form action="<?=site_url('/pet/create');?>" method = "post">
        <label for="name">🐾Name</label><br>
        <input type="text" name ="name" placeholder="Tasha" required><br>

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
        <input type="text" name="age" placeholder="2" required> <br>

       <button type='submit'>🐾Enter</button>
    </form>
</body>
</html>