<?php



function currency($curr){
	switch ($curr) {
  case 'rupees':	
     return '₹';
    break;
  default:
   return '$';
    }
}
function ___mail_sender($email,$data) 
{
  $subject='Account Information';
      \Config::set(['host' => env('MAIL_HOST'),'port' => env('MAIL_PORT'),'username' => env('MAIL_FROM_ADDRESS'),'password' => env('MAIL_PASSWORD')]);
        $sender = ['subject' => $subject,'email' => $email,'name' => @$data['name'],'from' => ['address' => env('MAIL_FROM_ADDRESS','app@joom.com'),'name' => 'Joom']];
        if(!empty($email)){
                   //dd($sender);
            Mail::send('emails.account',$data, function($message) use ($sender){
              $message->to(
                 $sender['email'],
                 $sender['name']
             )
              ->subject($sender['subject'])
              ->from(
                 $sender['from']['address'],
                 $sender['from']['name']
             );
          });
            if (Mail::failures()) {
               return false;
           }else{
               return true;
           }
       }
}