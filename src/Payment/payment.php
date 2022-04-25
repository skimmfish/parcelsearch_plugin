<?php

namespace Payment;
use Omnipay\Omnipay;

class Payment{

/**
*@return mixed
*/

public function gateway(){

//email-id : sb-k47quq520975@business.example.com
//First name:
//John
//Last name:
//Doe
//Email ID:
//sb-k47quq520975@business.example.com
//System Generated Password:
//6C1?'eO%
//account id - FZWTM97T6QVM4

$gateway = Omnipay::create('PayPal_Express');

$gateway->setUsername(get_option('lpss_paypal-username'));
$gateway->setPassword(get_option('lpss_paypal-password'));
$gateway->setSignature(get_option('lpss_paypal-signature'));

if(get_option('lpss_app_mode')=='sandbox'){
$gateway->setTestMode(true);
}else{
$gateway->setTestMode(false);
}
return $gateway;

   }

   /**

    * @param array $parameters

    * @return mixed

    */

   public function purchase(array $parameters)

   {

       $response = $this->gateway()
           ->purchase($parameters)
           ->send();

       return $response;

   }

   /**

    * @param array $parameters

    */

   public function complete(array $parameters)

   {

       $response = $this->gateway()
           ->completePurchase($parameters)
           ->send();

       return $response;
   }

   /**

    * @param $amount

    */

   public function formatAmount($amount)

   {
       return number_format($amount, 2, '.', '');
   }

   /**

    * @param $order

    */

public function getCancelUrl($order = ""){
return $this->route(get_option('lpss_paypal-cancel-url'), $order);
}

/**
* @param $order
*/

public function getReturnUrl($order = "")
{
return $this->route(get_option('lpss_paypal-return-url'), $order);
}

public function route($name, $params)
{
return $name; // ya change hua hai
}
}
?>