Packagist.org

Les class sont dans src/App/ et s'écrivent avec le nom de la classe avec la 1ère lettre en majuscule.
dans le fichier index ou app, on "include" le fichier class


/**------------------Class.php----------------------*/
<?php

namespace App; //permet d'éviter les doublons de classe

class Class
{

	/**
	 * @var
	 */
   protected attribut



}




?>
/**-----------app.php ou index.php---------------------*/


html...

<body>
<?php

include "src/App/Class.php"

use App\Class;






//débogage avec embellissement :

echo"<pre>";
var_dump($quelquechose);
echo"</pre>";



?>


</body>
