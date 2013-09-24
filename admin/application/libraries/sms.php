<?php
class CI_sms {
	
    // base http url
    private  $BASE_HTTP_URL = "http://www.payam-resan.com.com/APISend.aspx?";
 
  public function send($text, $tell) {
		 $USERNAME = "af6900";  // your username (fill it with your username)
		 $PASSWORD = "654321"; // your password (fill it with your password)
		 $senderNumber = "30007546"; // [FILL] sender number ; which is your 3000xxx number
         $recipientNumber = $tell; // [FILL] recipient number; the mobile number which will receive the message (e.g 0912XXXXXXX)
         $message = urlencode($text); // [FILL] the content of the message; (in url-encoded format !)
      
        // creating the url based on the information above
        // sending the request via http call
		$url = "http://www.payam-resan.com/APISend.aspx?Username=".$USERNAME."&Password=".$PASSWORD."&From=".$senderNumber."&To=".$recipientNumber.
		"&Text=".$message."";
        $result = $this->call($url);
        // Now you can compare the response with 0 or 1
     }

    // this method provides a simple way of calling a url
    private function call($url){
        return file_get_contents($url);
    }

}
