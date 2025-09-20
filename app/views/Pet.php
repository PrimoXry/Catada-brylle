<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet</title>
    <link rel="stylesheet" href="<?=base_url();?>public/css/pet.css">
</head>
<body>
    <!-- Hero -->
    <div class="hero">
        <h1>🐾 Welcome to Pet's Playground 🐾</h1>
        <p>
            Welcome to Pet’s Playground – the perfect spot where fun meets care! 🐶🐱 Here, your pets can run, play, 
            and enjoy a safe and happy environment designed just for them. From exciting play areas to cozy resting spots, 
            we make sure every wag, purr, and hop is filled with joy.
        </p>
    </div>

    <!-- Buttons -->
    <div class="buttons">
        <a href="<?=site_url('/pet/create');?>" class="btn checkin">🐶 Check In</a>
        <a href="<?=site_url('/pet/show');?>" class="btn list">📃 View List</a>
    </div>
</body>
</html>
