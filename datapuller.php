<!--this scripts gets the availability of a parcel and return the user to a page from where to continue his  journey on retrieving the parcel-->
<?php 

require 'vendor/autoload.php';
use GuzzleHttp\Client;

if(isset($_POST['__track'])){
$trackingID = $_POST['tracking_ID'];
$jsonBody = getAvailability($trackindID);

print_r($jsonBody);
}


/*
*@params - string trackingID
*@returns - json Object
*/
function getAvailability($trackindID){

$params = [
'headers'=>[
'Accept'=>'application/json',	 
'X-Okapi-Key'=> get_option('x-okapi-key'),
'X-Forwarded-For'=>'127.0.0.1',
'lang'=>get_option('locale'),
]
];


$httpClient = new \GuzzleHttp\Client();

$url = 'https://api.laposte.fr/suivi/v2/idships/'.$trackindID;

//creating a cache key for subsequent retrievals
$cacheKey = md5($url); 


try{
$request = $httpClient->request('GET',$url,$params);
$response = $request->getBody()->getContents();
$jsonObj = json_decode($response, true);
$data = ['body'=>$jsonObj, 'headers'=>$request->getHeaders()];

}catch(Exception $e){echo $e->getMessage();}

//return data object containing the response body and the returned headers
return $data;
}


?>