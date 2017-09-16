<?php 
namespace App\Sms;
use SoapClient; 

// $check = new sms();
//  //public function sendMessage($subject,$message,$groupids,$contactids,$mobile,$from)
// $check->sendMessage("hello","world",'','','0541243508','pann');
// var_dump($check->showkey());
 class sms{

    private $email = "obeng066@gmail.com";
    private $password = "harmony01";
    private $appId = "1500667633529";
    private $key = "";
    private $client = "";

    function __construct() {
         try{
        $wsdl_url='http://go.mytxtbuddy.com/ws/mtbservice?wsdl';
        $this->client = new \SOAPClient($wsdl_url);
        $params= array('email'=>$this->email,'password'=>sha1($this->password),'appId'=>$this->appId,); 
        $return = $this->client->login($params);
        $this->key = $return->return;   
        }
          catch(Exception $e) {
            return'Exception occurred: '.$e;
            die();
        }

}
      
   public function showkey(){
    return $this->key;
   }   

  public function checkBalance(){
    try {
      $params = array('sessionId' => $this->key->key,);
      $return = $this->client->checkBalance($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }

}

  public function getSenderIds(){
    try {
      $params = array('sessionId' => $this->key->key,);
      $return = $this->client->getSenderIds($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }

}


   public function countContacts(){
   try {
      $params = array('sessionId' => $this->key->key,);
      $return = $this->client->countContacts($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
   }

   public function addContact($fullname,$mobile){
         try {
      $params = array('fullname'=>$fullname,'mobile'=>$mobile,'sessionId' => $this->key->key,);
      $return = $this->client->addContact($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
   }
 
   public function editContact($contactid,$fullname,$mobile){
   		 try {
      $params = array('contactId'=>$contactid,'fullname'=>$fullname,'mobile'=>$mobile,'sessionId' => $this->key->key,);
      $return = $this->client->editContact($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
   		}

	public function addGroup($name){
   		 try {
      $params = array('name'=>$name,'sessionId' => $this->key->key,);
      $return = $this->client->addGroup($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
	} 

	public function editGroup($groupid,$name){
   			 try {
      $params = array('groupId'=>$groupid,'name'=>$name,'sessionId' => $this->key->key,);
      $return = $this->client->editGroup($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
	}

	public function addContactsToGroups($contactids,$groupids){
   		 try {
      $params = array('contactIds'=>$contactids,'groupIds'=>$groupids,'sessionId' => $this->key->key,);
      $return = $this->client->addContactsToGroups($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
	}

	public function removeContact($contactid){
   		 try {
      $params = array('contactId'=>$contactid,'sessionId' => $this->key->key,);
      $return = $this->client->removeContact($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
	}

  public function removeContacts($contactids){
       try {
      $params = array('contactIds'=>$contactid,'sessionId' => $this->key->key,);
      $return = $this->client->removeContacts($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
  }
     
     public function removeContactFromGroup($contactid,$groupid,$secid){
        	 try {
      $params = array('fullname'=>$fullname,'mobile'=>$mobile,'sessionId' => $this->key->key,);
      $return = $this->client->addContact($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
     }


     public function removeGroup($groupid,$secid){
         try {
      $params = array('fullname'=>$fullname,'mobile'=>$mobile,'sessionId' => $this->key->key,);
      $return = $this->client->addContact($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
     }

     public function sendMessage($subject,$message,$groupids,$contactids,$mobile,$from){
         try {
      $params = array('subject'=>$subject,'message'=>$message,'groupIds'=>$groupids,'contactIds'=>$contactids,'mobileNumbers'=>$mobile,'from'=>$from,'sessionId'=>$this->key->key,);
      $return = $this->client->sendMessage($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
     }


     public function getMessageStatuses($start,$end,$messageid,$secid){
         try {
      $params = array('fullname'=>$fullname,'mobile'=>$mobile,'sessionId' => $this->key->key,);
      $return = $this->client->addContact($params);
      return $return->return;
    } catch (Exception $e) {
      return $e;
    }
     }

	
 }


 