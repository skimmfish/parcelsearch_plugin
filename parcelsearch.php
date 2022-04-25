<?php

//clearing the cache

	/*	Plugin Name: Laposte Parcel Search service
	Plugin URI: https://expediteur-lrar.fr/
	description: This plugin lets you search for your parcel using the laposte.fr API endpoints seamlessly, When your search returns a valid result showing that the parcel truly exists with a 200 response code from the targeted endpoint
	You are to pay in order to receive your tracking information for the searched parcel, once your payment is successful, you are returned to a page that contains the parcel 
	tracking information which you receive also in your email as well see it displayed on the appropriate page
	Version: 1.0.1
	Author: Olabiyi Emmanuel
	Author URI: https://expediteur-lrar.fr/author
	License: GPL2
	*/
	
	
	/*
	*| This function searches the laposte.fr parcel service API through the exposed endpoint and first of all returns if the parcel is found	
	*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

wp_register_style('myStyleSheet', 'style.css');
wp_enqueue_style( 'myStyleSheet');

global $myTrackingID;
$plugin_name = 'parcel_search_service';

/**load these files in the header section of the plugin***/
if( !function_exists("load_bootstrap_cdn") ){
function load_bootstrap_cdn(){
require_once('assets.php');
}
add_action('wp_head', 'load_bootstrap_cdn');
}


//adding a menu for the plugin to the admin sidebar menu
add_action('admin_menu', 'parcel_search_admin_menu');

//settings_fields( 'parcel_search_settings' );
if( !function_exists("parcel_search_admin_menu") ){
function parcel_search_admin_menu()
{
add_menu_page( 'Parcel Tracker Settings Page', 'Expediteur Parcel Search Service', 'administrator', 'parcel_search_service', 'parcel_search_init' );	

//creating the columns in the wp_options table
//add_action( 'admin_init', 'lpss_create_options_column');
add_action( 'admin_init', 'update_parcel_search_settings');
}
}


/*this shows the admin settings 
page on the plugin page
*/
if( !function_exists("update_parcel_search_settings") ){
function update_parcel_search_settings(){
register_setting('parcel_search_settings','lpss_x-okapi-key');
register_setting('parcel_search_settings','lpss_app_mode');
register_setting('parcel_search_settings','lpss_locale');
register_setting('parcel_search_settings','lpss_parcel-found-page');
register_setting('parcel_search_settings','lpss_paypal_app_id');
register_setting('parcel_search_settings','lpss_parcel-not-found-page');
register_setting('parcel_search_settings','lpss_paypal_client_id');
register_setting('parcel_search_settings','lpss_paypal_secret_id');
register_setting('parcel_search_settings','lpss_paypal-notify-url');
register_setting('parcel_search_settings','lpss_tracking_fee');
register_setting( 'parcel_search_settings','lpss_payment_currency');
register_setting( 'parcel_search_settings','lpss_paypal-cancel-url');
register_setting('parcel_search_settings','lpss_paypal_action_url');
register_setting('parcel_search_settings','lpss_paypal-business-email');
register_setting('parcel_search_settings','lpss_paypal-username');
register_setting('parcel_search_settings','lpss_paypal-password');
register_setting('parcel_search_settings','lpss_tracking-info-pageid');
register_setting('parcel_search_settings','lpss_paypal-signature');
}
}

/*for validating settings entries
function validate_entries( $input ) {
	$newinput['api_key'] = trim( $input['api_key'] );
	if ( ! preg_match( '/^[a-z0-9]{32}$/i', $newinput['api_key'] ) ) {
	    $newinput['api_key'] = '';
	}
 
	return $newinput;
 }*/

/*
*this closure routine prevents redirect to the tracking page without being referred from paypal.com
*
*/

/*
*this function is initialized soon as the plugin is active, and it displays the settings page for the plugin on clicking it.
*/

if( !function_exists("parcel_search_init") ){
function parcel_search_init(){

//displaying error msgs and status msgs


echo "<div style='margin:35px 15px 20px 10px;'>";
//displaying errors and status messages on settings page save and updates
settings_errors();

echo "<b>Laposte Parcel Tracking Service API Settings</b><Br/><br/><br/>";
//displaying the settings page
parcel_search_settings_fields();
echo "</div>";
}
}

/*
*This function displays the tracking ID search form which is attached via a snippet 
*/
if( !function_exists("get_tracking_availability_form") ){
function get_tracking_availability_form(){	
require_once('parcel_tracking_form.php');
}
}

/*
*settings page fields
*fields - 
* 	@API key field
@language_Field for localization - options - fr_FR, en_GB, en_US
*
*/
/*parcel search settings fields*/
if( !function_exists("parcel_search_settings_fields") ){
function parcel_search_settings_fields(){
require_once('parcel-search-admin-settings.php');
}
}

/*
*This displays the form on the attached page in short_code
*@return - void
*/

if(!function_exists('add_tracking_form')){
function add_tracking_form(){
require_once('parcel_tracking_form.php');
}
//add this to the right hook to display it on a short_code / page
add_shortcode('tracker_form','add_tracking_form');
}


/*this function creates a shortcode to be added to the parcel_found page or any page for that matter*/
if(!function_exists('parcel_found')){
function parcel_found(){
require_once('parcel_found.php');
}
add_shortcode('parcel_found','parcel_found');
}

/*this function adds a shortcode for the parcelnotfound page***/

if(!function_exists('parcel_not_found')){
function parcel_not_found(){
require('parcelnotfound.php');
}
add_shortcode('parcel-not-found','parcel_not_found');
}


/*this function is hooked to the add_shortcode action 
for displaying the full tracking information for the tracking ID
*/

if(!function_exists('full_tracking_info')){
function full_tracking_info()
{
$myTrackingID = null;
if(isset($_GET['item_name'])){
$myTrackingID = explode("_",$_GET['item_name'])[1];
}else{
echo "<div class='div-center text-black '>Please go <a href='".home_url()."' class='text-info'>back to the home page</a>, you cannot access this page directly without adequate permissions!</div>";
return;
}

$responseData = get_availability($myTrackingID);

if(!isset($_GET['item_name']) && !isset($_GET['receiver_id'])) exit(); else

if($responseData!=NULL && $responseData['body']!=NULL){

?>
<div class="div-center padded_100">
<h4 class="text-center">Your Parcel Tracking Information</h4>
<h4 class="text-danger text-center" style="text-transform:uppercase;">Parcel No: <?php echo @$responseData['body']['shipment']['idShip'];?></h4>
<b class="text-xs text-center" style="color:#000;"><?php foreach(@$responseData['body']['shipment']['event'] as $xr){
echo "<div class='grid-column text-left text-xs'> -Le :" .@date('d/m/Y',strtotime($xr['date'])). ': '. $xr['label'] . "<b class='text-transform:uppercase'>" .$xr['code']."</b> </div>";
}?></b></div></div>
<?php }else{
echo "<div class='div-center'><p class='text-black' style='font-weight:600;'>Please check your parcel tracking number or your internet connection!</p></div>"; } 
}
//setting up the full tracking info plugin 
add_shortcode('my-tracking-info','full_tracking_info');
}

/*
*@param - trackingID to search for
*@returns - json Object containing body of API fetch
*/

if(!function_exists('get_availability')){
function get_availability($trackingID){
include "vendor/autoload.php";

$data = null;
$params = [
'headers'=>[
'Accept'=>'application/json',	 
'X-Okapi-Key'=> get_option('lpss_x-okapi-key'),
'X-Forwarded-For'=>get_option('site_url'),
'lang'=>get_option('lpss_locale'),
]
];

$httpClient = new \GuzzleHttp\Client();

$url = 'https://api.laposte.fr/suivi/v2/idships/'.$trackingID;

//creating a cache key for subsequent retrievals
$cacheKey=md5($url);
//saving the tracking ID in a session variable
$_SESSION['trackingID'] = $trackingID;

try{
$request = @$httpClient->request('GET',$url,$params);
$response =@$request->getBody()->getContents();
$jsonObj =@json_decode($response, true);
$data = ['body'=>$jsonObj, 'headers'=>$request->getHeaders()];

}catch(Exception $e){$error=$e->getMessage();}

//return data object containing the response body and the returned headers
return $data;
}
}

/*
*for displaying payment cancellation on paypal
*/
if(!function_exists('cancel_payment')){
function cancel_payment(){
echo "<div class='text-warning'>
<b style='font-family:Spartan,Work Sans;color:#000;font-weight:700;'>Oops! We are so sorry to see you leave, kindly try your transaction again if it's not what you expected! Thank you.</b>
</div>";
}
add_shortcode('cancel-transaction','cancel_payment');
}


/*this prevents bruteforce tracking information accessbility by non-paying visitors
*/

add_action('template_redirect', function() {
// ID of the thank you page
if (!is_page(get_option('lpss_tracking-info-pageid'))) {
return;
}

// coming from the form, so all is fine
if (wp_get_referer() ===get_option('site_url')) {
return;
}

// we are on thank you page
// visitor is not coming from form
// so redirect to home
wp_redirect(get_home_url());
exit;
});


?>