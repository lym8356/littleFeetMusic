<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\ORM\Behavior\TimestampBehavior;
use SquareConnect\ApiException;

/**
 * Enrolments Controller
 *
 * @property \App\Model\Table\EnrolmentsTable $Enrolments
 *
 * @method \App\Model\Entity\Enrolment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnrolmentsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Terms']
        ];
        $enrolments = $this->paginate($this->Enrolments);

        $this->set(compact('enrolments'));
    }

    /**
     * View method
     *
     * @param string|null $id Enrolment id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $enrolment = $this->Enrolments->get($id, [
            'contain' => ['Terms']
        ]);

        $this->set('enrolment', $enrolment);
    }

    private function payment($itemArray){

        $access_token = 'EAAAEHND9hsKev-_M94G0qZAP3N560UizdQ8wzEQeyQSEaBgjzj6wEenwidQWtda';
        $location_id = 'SZM300NX9NJNM';
        $end_point = 'https://connect.squareupsandbox.com';

        $api_config = new \SquareConnect\Configuration();
        $api_config->setHost($end_point);
        # Initialize the authorization for Square
        $api_config->setAccessToken($access_token);
        $api_client = new \SquareConnect\ApiClient($api_config);

        $lineItems = [];

        $discounts = [];
        $discounts_item = new \SquareConnect\Model\OrderLineItemDiscount();
        $discounts_item->setName('Sibling Discount');
        $discounts_item->setPercentage('25');
        $discounts_item->setScope('LINE_ITEM');
        array_push($discounts, $discounts_item);

        foreach ($itemArray as $item) {

            if($item['name'] == 'Class Enrolment (Discounted)'){
                $price = new \SquareConnect\Model\Money;
                $price->setAmount((int)$item['price']);
                $price->setCurrency('AUD');

                $itemEach = new \SquareConnect\Model\OrderLineItem();
                $itemEach->setName($item['name']);
                $itemEach->setQuantity($item['qty']);
                $itemEach->setBasePriceMoney($price);
                $itemEach->setDiscounts($discounts);
                array_push($lineItems, $itemEach);
            }else {
                $price = new \SquareConnect\Model\Money;
                $price->setAmount((int)$item['price']);
                $price->setCurrency('AUD');

                $itemEach = new \SquareConnect\Model\OrderLineItem();
                $itemEach->setName($item['name']);
                $itemEach->setQuantity($item['qty']);
                $itemEach->setBasePriceMoney($price);
                array_push($lineItems, $itemEach);
            }
        }

        $order = new \SquareConnect\Model\CreateOrderRequest();
        $order->setLineItems($lineItems);

        try {
            $checkout_api = new \SquareConnect\Api\CheckoutApi($api_client);
            $checkout = new \SquareConnect\Model\CreateCheckoutRequest();
            $checkout->setIdempotencyKey(uniqid());
            $checkout->setOrder($order);
            $redirectUrl = Router::url(['controller' => 'Enrolments', 'action' => 'success'], TRUE);
            $checkout->setRedirectUrl($redirectUrl);
            $response = $checkout_api->createCheckout($location_id, $checkout);
            $checkoutId = $response->getCheckout()->getId();

        } catch (ApiException $e){
            pr($e->getMessage());
            exit();
        }

        $checkoutUrl = $response->getCheckout()->getCheckoutPageUrl();

        return $checkoutUrl;
        //$this->set('checkoutUrl', $checkoutUrl);

    }

    private function saveTermEnrolment($enrol_id, $term_id){

        $now = date('Y-m-d');
        $lfmdataQuery=TableRegistry::getTableLocator()->get('Lfmclasses')->find('all',
            ['conditions'=>['Lfmclasses.terms_id'=>$term_id,"Lfmclasses.class_date>='$now'"]])
            ->order(['class_date'=>'ASC'])->toArray();


        foreach($lfmdataQuery as $lfm){
            $enrolTable = TableRegistry::getTableLocator()->get('Enrol');

            $enrolArray=[];
            $enrolArray['enrolments_id'] = $enrol_id;
            $enrolArray['lfmclass_id'] = $lfm['id'];
            $enrolArray['attendance'] = 'unknown';

            $enrol_entity = $enrolTable->newEntity($enrolArray);
            $enrol_result = $enrolTable->save($enrol_entity);
        }
    }

    private function saveCasualEnrolment($enrol_id, $term_id, $dateArray){

        for($i=0;$i<sizeof($dateArray);$i++){

            $formattedDate = date('Y-m-d', strtotime(str_replace('/', '-', $dateArray[$i])));

            $lfmdataQuery=TableRegistry::getTableLocator()->get('Lfmclasses')->find('all',
                ['conditions'=>['Lfmclasses.class_date'=>$formattedDate, 'Lfmclasses.terms_id'=>$term_id]])->first()->toArray();


            $enrolTable = TableRegistry::getTableLocator()->get('Enrol');
            $enrolArray=[];
            $enrolArray['enrolments_id'] = $enrol_id;
            $enrolArray['lfmclass_id'] = $lfmdataQuery['id'];
            $enrolArray['attendance'] = 'unknown';

            $enrol_entity = $enrolTable->newEntity($enrolArray);
            $enrol_result = $enrolTable->save($enrol_entity);
        }

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addTerm()
    {
        if((!empty($this->request->getQuery('term_id')))){
            $requestdata = $this->request->getQuery('term_id');
            $termsArray=explode("-",$requestdata);

            $termid=$termsArray[0];
            $lfmid=$termsArray[1];
            $termData=TableRegistry::get('Terms')->find('all',
                ['conditions'=>['Terms.id'=>$termid]])->contain('Locations')->first();

            $lfmData=TableRegistry::get('Lfmclasses')->find('all',
                ['conditions'=>['Lfmclasses.id'=>$lfmid]])->first();
            $this->request->data['price'] = $lfmData['price'];
            $this->request->data['class_time'] = date("G:i", strtotime($termData['start_time'])).'-'.
                date("G:i", strtotime($termData['end_time']));
            $this->request->data['location'] = $termData['location']['street_address'].', '.$termData['location']['name'];
            $this->request->data['age_group'] = $termData['age_group'];
            $this->request->data['term_id'] = $termid;
        }else{
            $itemArray = $this->request->getData('item_array');
            $returnUrl = strval($this->payment($itemArray));
            //pr("'".$returnUrl."'");die;
            //$returnUrl = 'https://connect.squareupsandbox.com/v2/checkout?c=CBASEFI3IoURI7rvPaITefWKo2g&l=SZM300NX9NJNM';


            $submittedForm = $this->request->data['formSerialized'];
            $formattedForm = array();
            parse_str($submittedForm, $formattedForm);

            $userArray = array();
            $userArray['f_name'] = $formattedForm['user_first_name'];
            $userArray['l_name'] = $formattedForm['user_last_name'];
            $userArray['email'] = $formattedForm['user_email'];
            $userArray['phone'] = $formattedForm['user_phone'];
            $userArray['postcode'] = $formattedForm['user_postcode'];

            $usersTable = TableRegistry::getTableLocator()->get('users');
            $user_entity = $usersTable->newEntity($userArray);
            $user_results = $usersTable->save($user_entity);

            $childArray = array();
            for($i=0;$i<count($formattedForm['child_first_name']);$i++){

                $childTable = TableRegistry::getTableLocator()->get('childs');
                $childArray['first_name'] = $formattedForm['child_first_name'][$i];
                $childArray['last_name'] = $formattedForm['child_last_name'][$i];
                $childArray['dob'] = date("Y-m-d",strtotime($formattedForm['child_dob'][$i]));
                $childArray['note'] = $formattedForm['child_note'][$i];

                $child_entity = $childTable->newEntity($childArray);
                $child_results = $childTable->save($child_entity);

                $user_child_relation=[];
                $user_child_relation['user_id']=$user_results->id;
                $user_child_relation['child_id']=$child_results->id;
                $user_child_relation['relationship']=$formattedForm['relation'];

                $user_childTable = TableRegistry::getTableLocator()->get('users_childs');
                $user_child_entity = $user_childTable->newEntity($user_child_relation);
                $user_child_result = $user_childTable->save($user_child_entity);

                $enrolmentArray=[];
                $enrolmentArray['term_id'] = $formattedForm['term_id'];
                $enrolmentArray['enrolment_cost'] = $formattedForm['price'];
                $enrolmentArray['guardian_id'] = $user_results->id;
                $enrolmentArray['child_id'] = $child_results->id;
                $enrolmentArray['enrolment_type'] = 'Term';
                $enrolmentArray['payment_method'] = 'Square';
                $enrolmentArray['payment_status'] = 'Pending';
                $enrolmentArray['comment'] = '';

                $enrolment_entity = $this->Enrolments->newEntity($enrolmentArray);
                $enrolment_result = $this->Enrolments->save($enrolment_entity);

                $this->saveTermEnrolment($enrolment_result->id,$formattedForm['term_id']);
            }
            return $this->redirect($returnUrl);

            //$returnUrl = 'https://connect.squareupsandbox.com/v2/checkout?c=CBASEFI3IoURI7rvPaITefWKo2g&l=SZM300NX9NJNM';
        }

    }

    public function addCasual(){

        $returnUrl = '';
        if((!empty($this->request->getQuery('term_id')))){
            $requestTermID = $this->request->getQuery('term_id');
            $now = date('Y-m-d');
            $conditions = array(
                'Lfmclasses.terms_id' => $requestTermID,
                "Lfmclasses.class_date>='$now'"
            );

            $lfmdata = TableRegistry::get('Lfmclasses')->find('all',['conditions' => $conditions]);

            $this->set('classData',$lfmdata);

            $termData=TableRegistry::get('Terms')->find('all',['conditions'=>['Terms.id'=>$requestTermID]])->contain('Locations')->first();

            $this->request->data['price'] = $termData['casual_rate'];
            $this->request->data['class_time'] = date("G:i", strtotime($termData['start_time'])).'-'.date("G:i", strtotime($termData['end_time']));
            $this->request->data['location'] = $termData['location']['street_address'].', '.$termData['location']['name'];
            $this->request->data['age_group'] = $termData['age_group'];
            $this->request->data['term_id'] = $requestTermID;
        }else{

            $submittedForm = $this->request->data['formSerialized'];
            $formattedForm = array();
            parse_str($submittedForm, $formattedForm);

            $userArray = array();
            $userArray['f_name'] = $formattedForm['user_first_name'];
            $userArray['l_name'] = $formattedForm['user_last_name'];
            $userArray['email'] = $formattedForm['user_email'];
            $userArray['phone'] = $formattedForm['user_phone'];
            $userArray['postcode'] = $formattedForm['user_postcode'];

            $usersTable = TableRegistry::getTableLocator()->get('users');
            $user_entity = $usersTable->newEntity($userArray);
            $user_results = $usersTable->save($user_entity);

            $childArray = array();
            for($i=0;$i<count($formattedForm['child_first_name']);$i++){

                $childTable = TableRegistry::getTableLocator()->get('childs');
                $childArray['first_name'] = $formattedForm['child_first_name'][$i];
                $childArray['last_name'] = $formattedForm['child_last_name'][$i];
                $childArray['dob'] = date("Y-m-d",strtotime($formattedForm['child_dob'][$i]));
                $childArray['note'] = $formattedForm['child_note'][$i];

                $child_entity = $childTable->newEntity($childArray);
                $child_results = $childTable->save($child_entity);

                $user_child_relation=[];
                $user_child_relation['user_id']=$user_results->id;
                $user_child_relation['child_id']=$child_results->id;
                $user_child_relation['relationship']=$formattedForm['relation'];

                $user_childTable = TableRegistry::getTableLocator()->get('users_childs');
                $user_child_entity = $user_childTable->newEntity($user_child_relation);
                $user_child_result = $user_childTable->save($user_child_entity);

                $enrolmentArray=[];
                $termInfo = TableRegistry::getTableLocator()->get('Terms')->find('all',['conditions'=>['id'=>$formattedForm['term_id']]])->first();

                $enrolmentArray['enrolment_cost'] = $termInfo->casual_rate * sizeof($formattedForm['date']);
                $enrolmentArray['term_id'] = $formattedForm['term_id'];
                $enrolmentArray['guardian_id'] = $user_results->id;
                $enrolmentArray['child_id'] = $child_results->id;
                $enrolmentArray['enrolment_type'] = 'Casual';
                $enrolmentArray['payment_method'] = 'Square';
                $enrolmentArray['payment_status'] = 'Pending';
                $enrolmentArray['comment'] = '';

                $enrolment_entity = $this->Enrolments->newEntity($enrolmentArray);
                $enrolment_result = $this->Enrolments->save($enrolment_entity);


                $this->saveCasualEnrolment($enrolment_result->id, $formattedForm['term_id'], $formattedForm['date']);
            }

            $itemArray = $this->request->getData('item_array');
            $returnUrl = $this->payment($itemArray);
        }

        return $this->redirect($returnUrl);
    }

    /**
     * Edit method
     *
     * @param string|null $id Enrolment id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $enrolment = $this->Enrolments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $enrolment = $this->Enrolments->patchEntity($enrolment, $this->request->getData());
            if ($this->Enrolments->save($enrolment)) {
                $this->Flash->success(__('The enrolment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The enrolment could not be saved. Please, try again.'));
        }
        $terms = $this->Enrolments->Terms->find('list', ['limit' => 200]);
        $this->set(compact('enrolment', 'terms'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Enrolment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $enrolment = $this->Enrolments->get($id);
        if ($this->Enrolments->delete($enrolment)) {
            $this->Flash->success(__('The enrolment has been deleted.'));
        } else {
            $this->Flash->error(__('The enrolment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function success(){



    }
}
