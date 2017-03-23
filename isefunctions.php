<?php
/* Do some operation here, like talk to the database, the file-session
 * The world beyond, limbo, the city of shimmers, and Canada.
 * 
 * AJAX generally uses strings, but you can output JSON, HTML and XML as well. 
 * It all depends on the Content-type header that you send with your AJAX
 * request. */
echo json_encode(42) . "\r\n"; //In the end, you need to echo the result. 
                      //All data should be json_encode()d.
                      //You can json_encode() any value in PHP, arrays, strings,
                      //even objects.
function iseMAC(){
  include 'restAuth.php';
  $name = $_GET['name'];
  $macAddress = $name;
  echo "Hello world!";
  //$macAddress = $_POST['name'];	
  echo "button 1 has been pressed" . '<br/>'; 
  echo "This is the MAC which will be used" . $macAddress . '<br/>'; 
  //iseAuth();
  $curl = curl_init();
  curl_setopt_array($curl, array(
     CURLOPT_SSL_VERIFYPEER => false,
     CURLOPT_URL => $iseAddress . $macAddress,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 300,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "GET",
     CURLOPT_HTTPHEADER => $iseAuth,
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $xml = new SimpleXMLElement($response);
    //echo $xml->asXML();
    $dom = new DOMDocument('1.0');
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    //echo $dom->saveXML();
    $json = json_encode($xml);
    $array = json_decode($json,TRUE);
    //echo print_r($array);
    echo $array['user_name'] . "<br/>";
    echo $array[$match[0]] . "<br/>";
    $match = array('user_name','passed','network_device_name','acs_server','authentication_method','authentication_protocol','identity_group','framed_ip_address','location','device_type');
    for ($i1 = 0; $i1 < 1; $i1++) {
      foreach ($match as $item) {
			echo $array[$item] . "<br/>";
		}
	}
}
}
?>
<?php

iseMAC();

34:17:EB:A6:28:E5 
?>
