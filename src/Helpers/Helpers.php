<?php 
	
	namespace App\Helpers;

	use \Firebase\JWT\JWT;
	use App\Helpers\CustomMessages;

    class Helpers extends CustomMessages {

	     public function SendMail($data) {
            $to = $data["To"];
            $from = MAILER;
            $subject = $data["Subject"];
            $body = $data["Body"]; // This should be a constant with the template 
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From:$from\r\n";
            // $headers .= "Reply-To: othermail@gmail.com"; // This is optional
            $response = "";

            $mailSuccess = mail($to, $subject, $body, $headers);

            if ($mailSuccess) {
                $response = $this->MailSendedSuccessfully();
            } else {
                $response = $this->CustomResponse(500, "Something went wrong");
            }

            return $response;
        }


        public function GetRequestHeaders() {
            $headers = null;
    
            if (function_exists("apache_request_headers")) {
                $requestHeaders = apache_request_headers();

                $requestHeaders = array_combine(array_map("ucwords", array_keys($requestHeaders)), array_values($requestHeaders));

                if (isset($requestHeaders["Authorization"])) {
                    $headers = trim($requestHeaders["Authorization"]);
                }
            }

            return $headers;
        }

        public function GetBearerToken() {
            $headers = $this->GetRequestHeaders();

            if (!empty($headers)) {
                if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                    return $matches[1];
                }
            } else {
                return null;
            }
        }

        public function GetCurrentUserId() {
            $token = $this->GetBearerToken();

            if ($token != null) {
                $currentUserId = $this->DecodeAccessToken($token);   

                if ($currentUserId != "expired_token") {
                    $currentUserId = $currentUserId->{"userId"};
                } else {
                    $this->AccessDenied();
                }
            } else {
                $this->AccessDenied();
            }

            return $currentUserId;         
        }

    	public function GenerateAccessToken($container) {
            $tokenDuration = (60 * 60) * 24;

            $payload = array(
                "iat" => time(),
                "iss" => "localhost",
                "exp" => time() + $tokenDuration,
                "userId" => 1//$data["UserId"]
            );

            $jwtToken = JWT::encode(
            	$payload,
            	$container->get("app_settings")->secretToken
           	);
 		
            return $jwtToken;
        }

 		public function DecodeAccessToken($token) {
            try {
                $decoded = JWT::decode($token, SECRET_KEY, array('HS256'));

                return $decoded;
            } catch(\Firebase\JWT\ExpiredException $e){
                return "expired_token";
            }   
        }

        public function AllowAccess() {
            $token = $this->GetBearerToken();
            $tokenDecoded = null;
            $response = null;

            if ($token != null) {
                $tokenDecoded = $this->DecodeAccessToken($token);

                if ($tokenDecoded != "expired_token") {
                    $response = $this->AccessGranted();
                } else {
                    $response = $this->AccessDenied();
                }
            } else {
                $response = $this->AccessDenied();
            }

            $response = json_decode($response, true);

            return $response;
        }

    }