<?php
  class Contrl extends Model{
    private $ciphering = "AES-128-CTR";
    private $encryption_iv = '1234567891011121';
    private $encryption_key;

    // set uploaded files
    public function fileUpload($object){
      $sql = "INSERT INTO files(fullName,patientName,fileDir,service,Byuser) VALUES(?,?,?,?,?);";
      $this->set($sql,$object);
      $bool = true;
      return $bool ;
    }

    public function signup($mail,$user,$pwd){
      $sql = "INSERT INTO accounts(mail,username,passcode,token,blocked) VALUES(?,?,?,?,?);";

      $this->encryption_key = $pwd; // declare encryption key with password
      $password = password_hash($pwd,PASSWORD_DEFAULT);
      $OriginalKey = bin2hex(random_bytes(16));
      $token = $this->encrypt($OriginalKey);
      $decryption = $this->decrypt($token);


      // echo "<br> *" . $OriginalKey . "<br> @" . $token . "<br><br> #".$decryption;
      // echo "<br>".$password;
      // if(password_verify("admin",$password))
      //   echo "--> GOOD";
      // else
      //   echo "--> BAD";


      $object = array($mail,$user,$password,$token,0);
      $this->set($sql,$object);
    }

    public function login($user,$pwd){
      $sql = "SELECT * FROM accounts WHERE username = ?";

      $userInfo = $this->check($sql,$user);
      if(count($userInfo) < 1)
        return false;

      else{
        foreach ($userInfo as $value) {
          if(password_verify($pwd,$value["passcode"]))
            return true;
          else
            return false;
        }
      }

    }



    private function encrypt($string){
      return openssl_encrypt($string, $this->ciphering,
            $this->encryption_key, 0, $this->encryption_iv);
    }
    private function decrypt($string){
      return openssl_decrypt ($string, $this->ciphering,
            $this->encryption_key, 0, $this->encryption_iv);
    }
  }
