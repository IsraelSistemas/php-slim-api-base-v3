<?php 
	
	namespace App\Helpers;

    class CustomMessages {

	 	public function CustomResponse($code, $message) {
            return json_encode(array(
                "Code" 		=> $code,
                "Message" 	=> $message
            ));
        }

        public function MailSendedSuccessfully() {
            return json_encode(array(
                "Code" 		=> 200,
                "Message" 	=> "Email sended successfully"
            ));
        }

        public function AccessGranted() {
            return json_encode(array(
                "Code" 		=> 200,
                "Message" 	=> "Access granted"
            ));
        }

        public function AccessDenied() {
            return json_encode(array(
                "Code" 		=> 401,
                "Message" 	=> "Access Unauthorized Error"
            ));
        }

        public function NotFound() {
            return json_encode(array(
                "Code" 		=> 404,
                "Message" 	=> "Resource not found"
            ));   
        }

        public function InternalError() {
            return json_encode(array(
                "Code" 		=> 500,
                "Message" 	=> "Internal Error Server"
            ));
        }

    }