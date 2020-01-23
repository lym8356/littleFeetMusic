<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use SquareConnect\ApiException;

class PaymentsController extends AppController
{

    public function payment()
    {
        $itemArray = $this->request->getQuery();

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
            $response = $checkout_api->createCheckout($location_id, $checkout);

        } catch (ApiException $e){
            pr($e->getMessage());
            exit();
        }

        $targetUrl = $response->getCheckout()->getCheckoutPageUrl();
        //return $this->redirect($targetUri);
        //pr($targetUri);die;
        $this->set('redirectUrl', $targetUrl);
//        try {
//            $checkout_api = new \SquareConnect\Api\CheckoutApi($api_client);
//            $request_body = new \SquareConnect\Model\CreateCheckoutRequest(
//                [
//                    "idempotency_key" => uniqid(),
//                    "order" => [
//                        "line_items" => [
//                            [
//                                "name" => "Test Item A",
//                                "quantity" => "1",
//                                "base_price_money" => [
//                                    "amount" => 500,
//                                    "currency" => "AUD"
//                                ]
//                            ],[
//                                "name" => "Test Item B",
//                                "quantity" => "3",
//                                "base_price_money" => [
//                                    "amount" => 1000,
//                                    "currency" => "AUD"
//                                ]
//                            ]]
//                    ]
//                ]
//            );
//            $response = $checkout_api->createCheckout($location_id, $request_body);
//        } catch (ApiException $e) {
//            // if an error occurs, output the message
//            pr ($e->getMessage());
//            exit();
//        }

    }

}

