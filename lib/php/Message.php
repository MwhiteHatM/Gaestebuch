<?php

// require MessageRepository 
@require_once 'MessageRepository.php';

class Message
{
    private $id;
    private $date;
    private $name;
    private $message;
    private $email;
    private $messageRepository;
    private $consumerKey;
    private $consumerSecret;
    private $accessToken;
    private $accessTokenSecret;
    /**
     * Message constructor.
     * obj von MessageRepository
     */
    public function __construct()
    {   
        
        $this->messageRepository = new MessageRepository();
        // bitte schreiben Sie Ihre Twitter Daten hier
        $this->consumerKey = "Your_consumerKey";  
        $this->consumerSecret = "Your_consumerSecret";
        $this->accessToken = "Your_accessToken";
        $this->accessTokenSecret = "Your_accessTokenSecret";
        
    }
    // func for add a new message 
    public function addMessage()
    {   
        
        $result =  $this->messageRepository->addMessage($this->name, $this->message);
        $result2 = $this->addTweet($this->name, $this->message);
        return $result.$result2;
        
        
    }
    // func get all messages from DB
    public function getAllMessages()
    {
        $result =   $this->messageRepository->getAll();
        $messagesObjectsArray = array();
        foreach ($result as $row)
        {
            $newMessage = new Message();
            $newMessage->date = $row['date'];
            $newMessage->name = $row['name'];
            $newMessage->message = $row['message'];
            array_push($messagesObjectsArray,$newMessage);
        }
        return $messagesObjectsArray;
    }
    // get date value
    public function getDate()
    {
        return $this->date;
    }
    // set Date value
    public function setDate($date)
    {
        $this->date = $date;
    }
    //get name value
    public function getName()
    {
        return $this->name;
    }
    //set name value
    public function setName($name)
    {
        $this->name = $name;
    }
    //get message 
    public function getMessage()
    {
        return $this->message;
    }
    // set message
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    //func add Tweet
    public function addTweet($name, $message){
        
        //require_once("lib\codebird\codebird.php");

        \Codebird\Codebird::setConsumerKey($this->consumerKey, $this->consumerSecret);
        $cb = \Codebird\Codebird::getInstance();
        $cb->setToken($this->accessToken, $this->accessTokenSecret);

        $params = array(
            'status' => $name." wrote about us: ".$message
        );
        $reply = $cb->statuses_update($params);
    }

}