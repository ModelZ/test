<?php
session_start();
isset($_SESSION['stop'])?$access_token = NULL:$access_token = '6W2OTEsmOrywElp+4VOXXOhvkRK8JzxpMLpD/Ev/6r5JpOhjP3CR+s9l0rrj6sRziSHyq5qTtNEnFavVecf4BwV+jZ0BvFhCb13unniqRMhfnBFL8/l0OLQYNGjw6wzjVT65ZVWNKJnj3TRjSngnIAdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event

	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		
	if($event['message']['text'] == 'หยุดไอ้บอท'){
		$_SESSION['stop'] = 1;
	}
		
		if ($event['type'] == 'message' && $event['message']['type'] == 'text' && $event['message']['text'] != 'หยุดไอ้บอท') {
			// Get text sent
			$event['message']['text'] = str_replace("อี","**",$event['message']['text']);
			$event['message']['text'] = str_replace("ควย","***",$event['message']['text']);
			$event['message']['text'] = str_replace("สัส","***",$event['message']['text']);
			$event['message']['text'] = str_replace("เหี้ย","***",$event['message']['text']);
			$event['message']['text'] = str_replace("ดอก","***",$event['message']['text']);
			$event['message']['text'] = str_replace("หี","**",$event['message']['text']);
			$event['message']['text'] = str_replace("ควย","***",$event['message']['text']);
			$event['message']['text'] = str_replace("รึเปล่าครับ","รึเปล่าคะ",$event['message']['text']);
			$event['message']['text'] = str_replace("ไหมครับ","ไหมคะ",$event['message']['text']);
			$event['message']['text'] = str_replace("ครับ","ค่ะ",$event['message']['text']);
			$event['message']['text'] = str_replace("ผม","หนู",$event['message']['text']);
			$ch = $event['message']['text'];
			switch($ch){
				case "พี่ไวท์" : $text = "พี่ไวท์ผู้กินมากเกินไป";
					break;
				case "โก้" : $text = "พี่โก้เกรียนแตก";
					break;
				case "โมเดล" : $text = "ราชาcommand";
					break;
				case "รินคุง" : $text = $event['message']['text'].'จ๋า~~~';
					break;
				case "สวัสดี" : $text = "สวัสดีค่า ^^";
					break;
				case "ชื่ออะไรอ่ะ" : $text = "เราชื่อบอทเทพอ่ะ คนเทพสร้างขึ้นมาแหละ555";
					break;
				case "บี" : $text = "มายูริกับเราไหมคะ ^^";
					break;
				default : $text = $event['message']['text'];
					break;
			}
			// Get replyToken
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}else {
			$text = "ส่ง สติ้ก/รูป มาทำไม??";
			
			$replyToken = $event['replyToken'];

			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
		}
			
	}
}
echo "OK THEN";
