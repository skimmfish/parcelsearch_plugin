<?php
if(!session_id()){
session_start();
}

include "vendor/autoload.php";
include "src/Payment/payment.php";
use Payment\Payment;
$payment = new Payment;
$trackingID = $_SESSION['trackingID'];

?>

<!--main home page-->
<div class="row-fluid" style="display:block;text-align:center;">

<div class="div-center padded_100" style="display:grid;grid-template-column:1;grid-gap:25px;justify-content:Center;margin:auto;">

<h4>Your parcel has been found.  </h4>

<div style="margin-bottom:20px;"><small class="small">To show more information, click on the button below to pay &#x20AC;2.</small></div>

<button type="button" class="btn btn-primary btn-tomato" data-toggle="modal" data-target="#exampleModal">Pay</button>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select payment method</h5>
        <button type="button" class="close close-btn" data-dismiss="modal"  aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="paypal_modal">

<div style="display:block;margin:auto;text-align:center;"><b class="text-center modal-heading">How do you wish to pay? Please select an option</b>
<Br/><br/>
<!--using paypal to make payment-->
<form method="POST" action="<?php echo get_option('lpss_paypal_action_url');?>">
<input value="<?php echo get_option('lpss_payment-currency');?>" name="currency_code"  type="hidden" />
<input value="<?php echo get_option('lpss_tracking_fee');?>" name="amount"  type="hidden" />
<input type="hidden" name="desc" value="Parcel Tracking Information Service" />
<input value="<?php echo get_option('lpss_paypal-notify-url');?>"  name="notify_url" type="hidden" />
<input value="<?php echo get_option('lpss_paypal-cancel-url');?>"  name="cancel_url" type="hidden" />
<input value="<?php echo get_option('lpss_paypal-notify-url');?>"  name="return" type="hidden" />
<input type="hidden" name="cmd" value="_xclick">
<input type='hidden' name='no_shipping' value='1'>
<input type='hidden' name='business' value='<?php echo get_option('lpss_paypal-business-email');?>'>
<input type='hidden' name='item_name' value="PARCELTRACKINGINFO_<?php echo $trackingID;?>" />
<input type='hidden' name='item_number' value='P124TRACK'>

<button name="pay_now" class="btn btn-primary btn-tomato" style="display:block;margin:auto;width:90%;background-color:#0099cc !important;" target="_blank">
Pay With PayPal</button>
</form>
</div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!--end of modal-->
</div>
</div>


