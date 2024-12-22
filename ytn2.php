<?php
//注意，使用前把http://XXXXXXXXXX换成你的服务器地址
$URL = "https://ytnw-mcdn.tving.com/ytnw/live2000.smil/chunklist_b2128000.m3u8";
$headers = [
        "cookie: CloudFront-Key-Pair-Id=APKAIXCIJCFRGOUEZDWA; CloudFront-Policy=eyJTdGF0ZW1lbnQiOiBbeyJSZXNvdXJjZSI6Iio6Ly95dG53LW1jZG4udHZpbmcuY29tL3l0bncvbGl2ZTIwMDAuc21pbCoiLCJDb25kaXRpb24iOnsiRGF0ZUxlc3NUaGFuIjp7IkFXUzpFcG9jaFRpbWUiOjE3MzQ5MDE0Mzh9LCJJcEFkZHJlc3MiOnsiQVdTOlNvdXJjZUlwIjoiMC4wLjAuMC8wIn19fV19; CloudFront-Signature=djpSNNeFmLtsa3r7QczB6~A1a~wD0U4NyoYXsrCg2dA0mgzWhHMh47quPuBiIqd2P3gI0bvTwmOcKdZTfRlD7UujaQWzpBYFxre7AGIDG9bcEtNjneH03qJcB2oWNKEzYdyIyzKhUHzglMrP0evxlAbRXKG2jifAXHrIx4V1IrBPwsyu-z9gQgeO8G08x~JIdkD5CIF860ei~AIkroUl7ZbL8Zr-I6Vlp0F9FlkTYHvRDCFk6FWWpVHHiyFljcR9TggVduYbrm4H1Ur6dmVcEykuOV3lNggurX8fFvgBycbvn5~zRofZ16zeaHscxPgy8MbrfKFY5qObyYXR1MbNDQ__;",
			"user-agent:Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36",
			"Accept-Encoding: identity"
            ];
if ($_GET['ts'] == ""){
 
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
    curl_setopt($ch, CURLOPT_NOSIGNAL, true);//libcurl支持毫秒
    curl_setopt($ch, CURLOPT_TIMEOUT_MS, 5000);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 5000);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    $data = curl_exec($ch);
    curl_close($ch);
    preg_match_all('|(.*?).ts|i',$data,$url);
    for($i=0;$i<count($url[0]);$i++){
        $data = str_replace($url[0][$i],'http://vip.ybeke.com/ytn.php?ts=https://ytnw-mcdn.tving.com/ytnw/live2000.smil/'.$url[0][$i],$data);
    }
        //var_dump($url);
    print_r($data);
}else{
    $urlplayurl = explode("ts=",$_SERVER['REQUEST_URI']);
    $playurl = $urlplayurl[1];
    tscurl($playurl,$headers);
}
function tscurl($URL,$headers){

    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1 );
    curl_setopt($ch, CURLOPT_NOSIGNAL, true);//libcurl支持毫秒
    curl_setopt($ch, CURLOPT_TIMEOUT_MS, 5000);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT_MS, 5000);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_exec($ch);
    curl_close($ch);
    // return $result;
}
?>