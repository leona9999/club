<?php
    include_once 'classes.php';

    $visitorsCount = 19;

    $pf   = new PersonFactory();
    $mf   = new MusicFactory();
    $club = new Club($mf);

    for ($i = 0; $i < $visitorsCount; $i++) {
        $person = $pf->randomCreatePerson($club);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Club</title>
    <style>
        .container {
            width: 900px;
            margin: 10px auto;
        }
        
        .block {
            display: inline-table;
            width: 30%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="block">
            <?php $club->playMusic(); ?>
        </div>
        <div class="block">
            <?php $club->playMusic(); ?>
        </div>
        <div class="block">
            <?php $club->playMusic(); ?>
        </div>
    </div>
</body>
</html>



