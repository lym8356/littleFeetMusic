<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Acl\Controller\Component\AclComponent;
use Cake\Controller\ComponentRegistry;
use Cake\Datasource\ConnectionManager;
class LfmclassHelper extends Helper {



    public function getLfm($termid=null){
        $now = date('Y-m-d');
        $lfmdata=TableRegistry::get('Lfmclasses')->find('all',['conditions'=>['Lfmclasses.terms_id'=>$termid,"Lfmclasses.class_date>='$now'"]])->
        order(['class_date'=>'ASC'])->limit(1)->toArray();


        return $lfmdata;
    }

}
?>
