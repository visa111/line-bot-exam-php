<?php
   $accessToken = "SwnqHbfW+jBs4/VLDLVpvcUi6U537+gE2ClNh+WvUtZhQqX04EMQVRHJNtngZPV5dPsEqkMvaAfAkhI/6QSWnGQykChqgLeyj4fxQY9ZXeUGoSmbXbwuen8mbfOwAo6LN9+HqXXiDjBn7iM4bW6PegdB04t89/1O/w1cDnyilFU=";//copy ข้อความ Channel access token ตอนที่ตั้งค่า
   $content = file_get_contents('php://input');
   $arrayJson = json_decode($content, true);
   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";
   //รับข้อความจากผู้ใช้
   $message = $arrayJson['events'][0]['message']['text'];
   //รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];

$messageraw = $arrayJson['events'][0]['message'];
$typeMessage = $arrayJson['events'][0]['message']['type']; 
$idMessage = $arrayJson['events'][0]['message']['id']; 

switch ($typeMessage){
        case 'text':
         switch ($message) {
                case "สวัสดี":     
                     #ตัวอย่าง Message Type "Text + Sticker"
                        $arrayPostData['to'] = $id;
                        $arrayPostData['messages'][0]['type'] = "text";
                        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
                        $arrayPostData['messages'][1]['type'] = "sticker";
                        $arrayPostData['messages'][1]['packageId'] = "2";
                        $arrayPostData['messages'][1]['stickerId'] = "34";
                        $arrayPostData['messages'][2]['type'] = "text";
                        $arrayPostData['messages'][2]['text'] = $id;
                        pushMsg($arrayHeader,$arrayPostData);
                     break;
                  case "สวัสดีครับ": 
                        $arrayPostData['to'] = $id;
                        $arrayPostData['messages'][0]['type'] = "text";
                        $arrayPostData['messages'][0]['text'] = "สวัสดีจ้าาา";
                        $arrayPostData['messages'][1]['type'] = "sticker";
                        $arrayPostData['messages'][1]['packageId'] = "2";
                        $arrayPostData['messages'][1]['stickerId'] = "34";
                        $arrayPostData['messages'][2]['type'] = "text";
                        $arrayPostData['messages'][2]['text'] = $id;
                        pushMsg($arrayHeader,$arrayPostData);
                     break;
                   case "นับ 1-10": 
                        for($i=1;$i<=10;$i++){
                            $arrayPostData['to'] = $id;
                            $arrayPostData['messages'][0]['type'] = "text";
                            $arrayPostData['messages'][0]['text'] = $i;
                            pushMsg($arrayHeader,$arrayPostData);
                         }
                     break;
                  default:
                       $textReplyMessage = " คุณไม่ได้พิมพ์ ค่า ตามที่กำหนด";
                        $arrayPostData['to'] = $id;
                        $arrayPostData['messages'][0]['type'] = "text";
                        $arrayPostData['messages'][0]['text'] = $textReplyMessage;
                        pushMsg($arrayHeader,$arrayPostData);         
                       break; 
         }
      break;
      case 'image':
      ////////////////////// check file
               foreach ($messageraw as $key => $value) {
                   $messageraw_1 = $messageraw_1 . $key . ' => ' . $value.'<br>';
                        }
                        $arrayPostData['to'] = $id;
                        $arrayPostData['messages'][0]['type'] = "text";
                        $arrayPostData['messages'][0]['text'] = $typeMessage." : ". $idMessage." : ".$messageraw_1;
                        pushMsg($arrayHeader,$arrayPostData);
     ////////////////////// check file
     break;  
}
               

   function pushMsg($arrayHeader,$arrayPostData){
      $strUrl = "https://api.line.me/v2/bot/message/push";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,$strUrl);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);
   }
   exit;
?>
