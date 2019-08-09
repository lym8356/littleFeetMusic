<?php
namespace App\Controller;
use Cake\Datasource\ConnectionManager;

class PropertiesController extends AppController
{

    public function index()
    {
        $this->loadModel('Properties');

        // Load all properties from the database which are not yet sold.
        $unsoldProperties = $this->Properties->find()->where(['sold_price IS' => null]);

        // Pass these to the view so that they can be shown to the user. Make them available
        // to the view in a variable called 'properties'.
        $this->set('properties', $unsoldProperties);

        // At the end of this function, CakePHP will render the template in src/Templates/Properties/index.ctp.
    }

    public function details($id)
    {
        $currentProperty = $this->Properties->find()->where(['id' => $id]);

        $this->set('cPY', $currentProperty);

//        $sql = "ALTER table `properties` ADD COLUMN `property_desc` text;";
//        $connection = ConnectionManager::get('default');
//        $connection->execute($sql);

    }

}
