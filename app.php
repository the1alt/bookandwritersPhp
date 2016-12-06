<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
    <?php

    include 'src/App/Trait/StarTrait.php';
    include 'src/App/Trait/HTMLTrait.php';

    include 'src/App/Abstract/AbstractLike.php';

    include 'src/App/Exception/CPException.php';
    include 'src/App/Exception/SiretException.php';

    include 'src/App/Interface/DateFrInterface.php';
    include 'src/App/Interface/NotationInterface.php';

    include 'src/App/MetaData.php';
    include 'src/App/Book.php';
    include 'src/App/Ecrivain.php';
    include 'src/App/Edition.php';



    echo "coucou"."\n";


    $conjur = new Book('La conjuration primitive', 'du sang du sexe et des scoubidous', 12.50, 'Pocket', 150, '12/10/1999', 'Maxime Chatam', true);

    $sangTemp = new Book('Le sang du temps', 'du sang du sexe et du temps', 16.50, 'Pocket', 400, '12/10/1990', 'Maxime Chatam', true);

    $azeert = new Book('qsdqs dsq qs', 'qsdqs dsqdqsdsqdqsdsq', 16.50, 'Pocket', 400, '12/10/1990', 'Maxime Chatam', true);

    $chatam = new Ecrivain('Maxime Chatam', 'maxime@chatam.fr', 'Paris', '2 allée du jardin', 75012, 'France', '1987-09-23 16:12', '123 123 456 1234', [12, 15]);

    $katam = new Ecrivain('Maxime katam', 'maxime@katam.fr', 'Paris', '2 allée du jardin', 75012, 'France', '1987-09-23 16:12', '123 123 456 1234', [12, 15]);

    $conjur->addNote(12);
    $sangTemp->addNote(10);

    $chatam->addBook($sangTemp);
    $chatam->addBook($conjur);

    $conjur->displayList($conjur);

    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>
</body>
</html>
