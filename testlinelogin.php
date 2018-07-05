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
  
<a onclick="loginLine()"><img src="https://www.itsm.com/images/logo01.png"></a>
<script>
function loginLine(){
    var win = window.open("https://access.line.me/dialog/oauth/weblogin?response_type=code&client_id=1592037842&redirect_url=http://ils.itsm-th.com",'Popup','height=500,width=480');
    win.window.focus();
}



function loginCallback(token,displayName,mid,pictureUrl,statusMessage){
    var _html = '';
    _html += '<img src="'+pictureUrl+'"><br>';
    _html += 'Name : '+displayName+'<br>';
    _html += 'statusMessage : '+statusMessage+'<br>';
    _html += 'token : '+token+'<br>';
    _html += 'mid : '+mid+'<br>';

    $("#result").html(_html);
    $("#login_div").hide();
}
</script>


</body>
</html>
