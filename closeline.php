<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
 <head>
  <title> New Document </title>
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
 </head>

 <body>

  <?php
$client_id = "1592037842";
$client_secret = "3c5ab86a3b4b98f2f909cde82a59686d";
$redirect_uri = "closeline.php";
$token = "";

function getToken($code){
    global $client_id, $client_secret,$redirect_uri;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v1/oauth/accessToken",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "grant_type=authorization_code&code=".$code."&client_id=".$client_id."&client_secret=".$client_secret."&redirect_uri=".$redirect_uri,
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/x-www-form-urlencoded"
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

function getProfile(){
    global $token;

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.line.me/v1/profile",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "authorization: Bearer ".$token,
            "cache-control: no-cache"
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    return $response;
}

$obj = json_decode(getToken($_GET['code']),true);
$token = $obj['access_token'];
$obj_profile = json_decode(getProfile(),true);
?>

<script>
window.opener.loginCallback("<?php echo $token ?>","<?php echo $obj_profile['displayName'] ?>","<?php echo $obj_profile['mid'] ?>","<?php echo $obj_profile['pictureUrl'] ?>","<?php echo $obj_profile['statusMessage'] ?>");
window.close();
</script>

 </body>
</html>
