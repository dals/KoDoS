To extend your model class from Doctrine generated models do:
1. Include "Base_" class (generated wit Doctrine):
    put "include_once('base/Modelname.php');" at the top of your model
2. Set your class Model as extends from "Base_Modelname".

Example.

Your new Model class has a content:

===== Begin file /models/Model.php =====
<?php
class Model {
    // Your stuff here...
}
?>
===== End file /models/Model.php =====



To extends from Doctrine (if used), rewrite content above as example below:

===== Begin file /models/Model.php =====
<?php
include_once('base/Model.php');
class Model extends Base_Model {
    // Your stuff here...
}
?>
===== End file /models/Model.php =====