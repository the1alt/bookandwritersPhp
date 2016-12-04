<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php


    include 'src/App/MetaData.php';
    include 'src/App/Book.php';
    include 'src/App/Ecrivain.php';
    include 'src/App/Edition.php';

    $aze = new MetaData('qskldsjq', '12345', 'FRANCE', '04/12/1966', '123 456 789 1234', [12, 15]);

    $conjur = new Book('La conjuration primitive', 'du sang du sexe et des scoubidous', 12.50, 'Pocket', 150, '12/10/1999', 'Maxime Chatam', true);

    $sangTemp = new Book('Le sang du temps', 'du sang du sexe et du temps', 16.50, 'Pocket', 400, '12/10/1990', 'Maxime Chatam', true);

    $azeert = new Book('qsdqs dsq qs', 'qsdqs dsqdqsdsqdqsdsq', 16.50, 'Pocket', 400, '12/10/1990', 'Maxime Chatam', true);

    $chatam = new Ecrivain('Maxime Chatam', 'maxime@chatam.fr', 'Paris');
    $lkj = new Ecrivain('pierre', 'pazeoiaze@gmail.com', 'Londre');

    $chatam->addBook($sangTemp);
    $chatam->addBook($conjur);

    $lkj->addBook($azeert);

    $chatam->giveCollec($lkj);

    var_dump($lkj);


    ?>
</body>
</html>
