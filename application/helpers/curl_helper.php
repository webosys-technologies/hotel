<?php

function curl_post_async($url, $params)
{
    foreach ($params as $key => &$val) {
        if (is_array($val)) $val = implode(',', $val);
        $post_params[] = $key.'='.urlencode($val);
    }
    $post_string = implode('&', $post_params);

    $parts=parse_url($url);

    $fp = fsockopen($parts['host'],
        isset($parts['port'])?$parts['port']:80,
        $errno, $errstr, 30);

    $out = "POST ".$parts['path']." HTTP/1.1\r\n";
    $out.= "Host: ".$parts['host']."\r\n";
    $out.= "Content-Type: application/x-www-form-urlencoded\r\n";
    $out.= "Content-Length: ".strlen($post_string)."\r\n";
    $out.= "Connection: Close\r\n\r\n";
    if (isset($post_string)) $out.= $post_string;

    $reqult = fwrite($fp, $out);
    fclose($fp);
    return $reqult;
}

function curl_get_async($url, $data) {
    $params = '';
    foreach($data as $key=>$value)
    $params .= $key.'='.$value.'&';
    $params = trim($params, '&');

    $requestURL = $url.'?'.$params;
    $output = file_get_contents($requestURL);
    $output = (array)json_decode($output, true);
    return $output;
}

function getCurlRecords($url) {
	ini_set('max_execution_time', 500); 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$result = curl_exec($ch);
	curl_close($ch);
	$obj = json_decode($result); 		
	return $obj;
}

function getParamRecord($url, $data) {
   
    $params = '';
    foreach($data as $key=>$value)
        $params .= $key.'='.$value.'&';
    $params = trim($params, '&');
    
    $requestURL = $url.'?'.$params;
    //debug($requestURL);
    $ch = curl_init();   
    curl_setopt($ch,CURLOPT_URL, $requestURL);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);	 
    $result=curl_exec($ch);	 
    curl_close($ch);
    $result = mb_convert_encoding($result,'UTF-8','UTF-8');
    $obj = json_decode($result, true);
    return $obj;
}

function curl_del($url)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    $result = mb_convert_encoding($result,'UTF-8','UTF-8');
    $obj = json_decode($result, true);
    return $obj;
}

function getRecordsByGetMethod($url) {
	$ch = curl_init();   
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);	 
	$result=curl_exec($ch);	 
	curl_close($ch);
	$result = mb_convert_encoding($result,'UTF-8','UTF-8');
	$obj = json_decode($result,true);
	return $obj;
}

function getValue($url, $name) {
	ini_set('max_execution_time', 300); 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_URL, $url);
	$response = curl_exec($ch);
	curl_close($ch);
	$results = mb_convert_encoding($response,'UTF-8','UTF-8'); 	
	$result = json_decode($results);
	return $result[$name];
}

function postJsonRecord($url, $json) {				
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_POST, 1); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
	$result = curl_exec($ch);		
	return $result;		
}


function postRecord($url, $data) {
    $curl = curl_init($url);
    ini_set('max_execution_time', 500);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    $result = curl_exec($curl);
    curl_close($curl);
    $result = mb_convert_encoding($result, 'UTF-8', 'UTF-8');
    return json_decode($result, true);
}

function postParamRecord($url, $data) {
    $params = '';
    foreach($data as $key=>$value)
        $params .= $key.'='.$value.'&';

    $params = trim($params, '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); //Remote Location URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser        
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, count($data)); //number of parameters sent
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //parameters data	    
    $result = curl_exec($ch);
    curl_close($ch);
    $result = mb_convert_encoding($result, 'UTF-8', 'UTF-8');
    return json_decode($result, true);
}
function postParamRecordNew($url, $data, $clinic_id) {
    $params = 'clinic_id='.$clinic_id.'&';
    foreach($data as $key=>$value)
        $params .= $key.'='.$value.'&';

    $params = trim($params, '&');
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); //Remote Location URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, count($data)); //number of parameters sent
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params); //parameters data
    $result = curl_exec($ch);
    curl_close($ch);
    $result = mb_convert_encoding($result, 'UTF-8', 'UTF-8');
    return json_decode($result, true);
}

function postFormData($url, $data) {  
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url); //Remote Location URL
	curl_setopt($ch, CURLOPT_POST, 1);  
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data')); 
	$result = curl_exec($ch);
	curl_close($ch);		
	return $result;    
}
	
function deleteRecord($url) {				
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE"); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
	$result = curl_exec($ch);
	curl_close($ch); 
	return $result;
}

function upload($url, $file) {
    $pic = "";
    if(!empty($file['tmp_name']))
    {
        ini_set('max_execution_time', 300);
        $userPic = new CURLFile($file['tmp_name'], $file['type'], $file['name']);
        $extension = explode(".", $file['name']);
        $ext = end($extension);
        $data = array('file' =>$userPic,'extension'=>$ext);
        $result = postReqWithParamsMultiPartForm(API_FILEUPLOAD, $data);
        if($result['status'] == 'success')
        {
            $pic = $result["data"]['url'];
        }
    }
    return $pic;
}

function postReqWithParamsMultiPartForm($url, $data) {
    ini_set('max_execution_time', 300);
    if($data['extension'] == 'mp4' || $data['extension'] == 'MP4'){
        ini_set('max_execution_time', 1200);
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url); //Remote Location URL
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data'));
    $result = curl_exec($ch);
    curl_close($ch);
    $result = mb_convert_encoding($result, 'UTF-8', 'UTF-8');
    return json_decode($result, true);
}