

<div class="container-fluid">

<h1>E-Commerce Package Tracking Solution</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<div class="grid_x" style="display:grid;grid-template-columns:80% 20%;grid-gap:2px;">

<div class="form-group">
<input type="text" name="tracking_ID" placeholder="Enter your parcel tracking ID here"  style="height:55px;font-size:12px;width:99.5%;border-radius:5px;border:1px solid #dfdfdf;" class="form-control input-lg input-text" required />
</div>

<div class="form-group">
<button name="__track" type="submit" class="btn btn-primary btn-tomato" style="height:55px;color:#fff;background:#FF4450;font-size:12px;border-radius:5px;border:0;padding-left:25px;padding-right:25px;"><i class="fa fa-search"></i> Track </button>
</div>
</div>
</form>
</div>
<!--this scripts gets the availability of a parcel and return the user to a page from where to continue his  journey on retrieving the parcel-->

<?php
if(!session_id()){
session_start();
}

require 'vendor/autoload.php';
use GuzzleHttp\Client;

if(isset($_POST['__track'])){
$trackingID = $_POST['tracking_ID'];
//saving the tracking id in a session variable

$_SESSION['trackingID'] = $trackingID;
$jsonBody = get_availability($trackingID);

//checking if the json object has null value or not
if($jsonBody!=NULL && $jsonBody['body']!=NULL){

$returnCode =  $jsonBody['body']['returnCode'];

if($returnCode==200){
$url_o=get_option('lpss_parcel-found-page');
//wp_redirect( $url,301,'Wordpress');
//exit();

header("location:".$url_o);
exit();
//echo do_shortcode('[parcel_found]');

}

}else{
$url =get_option('lpss_parcel-not-found-page');
//wp_redirect( $url );
header("location:".$url);
exit();
//echo do_shortcode('[parcel-not-found]');

}
}
?>