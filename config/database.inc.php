<?php

class database {

    private $host;
    private $user;
    private $password;
    private $dbname;


    function __construct(){
        $this->host='localhost';
        $this->user='root';
        $this->password='';
        $this->dbname="pluto";

        
    }

  public  function connect() {
        $sqli = new mysqli($this->host,$this->user,$this->password,$this->dbname);

        return $sqli;
    }

   
}

class sms_nj extends database {
    function search() {
        $sql = 'SELECT * FROM `smss` WHERE state = "NJ" and drivers >5
        ';

        $results = $this->connect()->query($sql);

       while ($row=$results->fetch_assoc()) {
           echo "
           <tr>
                                            
                                            <td>{$row['name']}</td>
                                            <td>{$row['sms_code']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['city']}</td>
                                            <td>{$row['state']}</td>
                                            <td>{$row['phonenumber']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['drivers']}</td>
                                            
                                        </tr>
           
           ";
       }
    }

    function download() {
        $randit = rand(1,1000);
        $bug = '"';
        $sql = "SELECT * FROM smss INTO OUTFILE 'C:/users/k/Desktop/pplist{$randit}.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '{$bug}' ESCAPED BY '' LINES TERMINATED BY 'n'  ";

        $query = $this->connect()->query($sql);

        echo "<script type='text/javascript'>
        alert('Download completed check your desktop')
        </script>
        ";
        header('Location: SMS_NJ.php');

    }
}


class pplist extends database {
    function search() {
        $sql = 'SELECT * FROM sales INNER JOIN pplist ON sales.name=pplist.name
        ';

        $results = $this->connect()->query($sql);

       while ($row=$results->fetch_assoc()) {
           echo "
           <tr>
                                            
                                            <td>{$row['name']}</td>
                                            <td>{$row['sms_code']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['city']}</td>
                                            <td>{$row['state']}</td>
                                            <td>{$row['phonenumber']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['drivers']}</td>
                                            <td>{$row['employee']}</td>
                                        </tr>
           
           ";
       }
    }
}

class lookup extends database{

   

    function sms($name) {
        $sql =  "SELECT * FROM cms WHERE cms.name LIKE '{$name}%'
        ";

        $results = $this->connect()->query($sql);

       while ($row=$results->fetch_assoc()) {
           echo "
           <tr>
                                            
                                            <td>{$row['name']}</td>
                                            <td>{$row['sms_code']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['city']}</td>
                                            <td>{$row['state']}</td>
                                            <td>{$row['phonenumber']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['drivers']}</td>
                                        </tr>
           
           ";
       }
    }
}
class grovel_beg extends database {
    function search() {
        $sql =' SELECT * FROM smss INNER JOIN modification ON smss.name=modification.name
        ';

        $results = $this->connect()->query($sql);

       while ($row=$results->fetch_assoc()) {
           echo "
           <tr>
                                            
                                            <td>{$row['name']}</td>
                                            <td>{$row['sms_code']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['city']}</td>
                                            <td>{$row['state']}</td>
                                            <td>{$row['phonenumber']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['drivers']}</td>
                                            <td>{$row['modnum']}</td>
                                            <td>{$row['code']}</td>
                                        </tr>
           
           ";
       }
    }
}

//


class prospect extends database {
    function search() {
        $sql ='SELECT * FROM smss INNER JOIN insurance ON smss.name=insurance.name 
        ';

        $results = $this->connect()->query($sql);

       while ($row=$results->fetch_assoc()) {
           echo "
           <tr>
                                            
                                            <td>{$row['name']}</td>
                                            <td>{$row['sms_code']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['city']}</td>
                                            <td>{$row['state']}</td>
                                            <td>{$row['phonenumber']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['drivers']}</td>
                                            <td>{$row['insurance']}</td>
                                            
                                        </tr>
           
           ";
       }
    }
}


class entire extends database {
    function search($state,$driver1,$driver2,$modnum) {

       
       
       
       
        $sql ="


        SELECT * FROM smss INNER JOIN modification ON smss.name=modification.name LEFT JOIN insurance ON smss.name = insurance.name1

WHERE smss.state = '{$state}' and smss.drivers >{$driver1} AND smss.drivers <{$driver2} AND modification.modnum < {$modnum}

        ";

       

        $results = $this->connect()->query($sql);

       while ($row=$results->fetch_assoc()) {
           

         
               
    
           echo "
           <tr>
                                            
                                            <td>{$row['name']}</td>
                                            <td>{$row['sms_code']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['city']}</td>
                                            <td>{$row['state']}</td>
                                            <td>{$row['phonenumber']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['drivers']}</td>
                                            <td>{$row['modnum']}</td>
                                            <td>{$row['insurance']}</td>
                                            
                                        </tr>
           
           ";
       }
    }
}
?>