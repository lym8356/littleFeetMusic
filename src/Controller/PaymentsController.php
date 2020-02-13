<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use SquareConnect\ApiException;

class PaymentsController extends AppController
{

    public function payment()
    {

        $itemArray = $this->request->getQuery('item_array');
        //pr($this->request->getData());pr($itemArray);die;

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

            foreach ($item as $it){

                if($it['name'] == 'Class Enrolment (Discounted)'){
                    $price = new \SquareConnect\Model\Money;
                    $price->setAmount((int)$it['price']);
                    $price->setCurrency('AUD');

                    $itemEach = new \SquareConnect\Model\OrderLineItem();
                    $itemEach->setName($it['name']);
                    $itemEach->setQuantity($it['qty']);
                    $itemEach->setBasePriceMoney($price);
                    $itemEach->setDiscounts($discounts);
                    array_push($lineItems, $itemEach);

                } else {
                    $price = new \SquareConnect\Model\Money;
                    $price->setAmount((int)$it['price']);
                    $price->setCurrency('AUD');

                    $itemEach = new \SquareConnect\Model\OrderLineItem();
                    $itemEach->setName($it['name']);
                    $itemEach->setQuantity($it['qty']);
                    $itemEach->setBasePriceMoney($price);
                    array_push($lineItems, $itemEach);
                }
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

        //return $this->redirect($targetUri);
        $this->set('checkoutUrl', $checkoutUrl);


    }

}

