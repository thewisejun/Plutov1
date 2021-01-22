<?php

class Email {
    public $email;
   

    function __construct($email){
        $this->email=$email;
       
    }

    function lookup() {

        $url = "https://api.hunter.io/v1/search?domain={$this->email}&api_key=713ca4c1e4cfadf84959d7add5bfb3a2482201fa";
        $get = file_get_contents($url);

        $decode = json_decode($get,true);
        
        $loop=  $decode["results"];
        for ($x=0; $x<$loop; $x+=1){
            echo "<h1>";
        echo $decode["emails"][$x]["value"] ."</br>";
        echo "</h1>";
        echo "<p>";
        echo $decode["emails"][$x]["type"] ."</br>";
        echo "</p>";
        }
        
    }
}

?>