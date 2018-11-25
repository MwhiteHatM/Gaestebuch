<?php
@require_once 'Message.php';
@require_once 'MessageRepository.php';

class MessageController
{

   public function addMessage()
    {
        if ($_POST["name"] != "" && $_POST["message"] != "") {
            $name = $_POST["name"];
            $message = $_POST["message"];
            //make obj from Message Class
            $messageObject = new Message();
            //use func setName und setMessage and give them values per _Post
            $messageObject->setName($name);
            $messageObject->setMessage($message);
            //insert data use addMessage()
            $result = $messageObject->addMessage();
            
            //if ok 
            if ($result) {
                echo 'Erfolgreich hinzugefügt!';
            } else {
                echo 'Fehler beim Hinzufügen, bitte versuchen Sie es erneut!'; //if not
            }
            
            

        } else {
            echo 'Bitte alle Felder ausfüllen!!'; //if empty
        }

    }

    // display our selct from table
    public function getAll()
    {
        $messageObject = new Message();
        $messagesObjects = $messageObject->getAllMessages();

        foreach ($messagesObjects as $messagesObject )
        {
            echo $messagesObject->getDate();
            echo " ".$messagesObject->getName()."<br>\n";
            echo $messagesObject->getMessage()."<br>\n<br><hr/>";
        }
    }
    
   
    
    

}

?>