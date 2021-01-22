<?php

class quote {
    public $url;
    public $random;

    function __construct() {

        $this->url = "https://type.fit/api/quotes";
        $this->random = rand(1,100);
    }

    function Api (){

        $content = file_get_contents($this->url);

        $decode = json_decode($content,true);

        echo $decode[$this->random]['text'];
        
    }
}
?>