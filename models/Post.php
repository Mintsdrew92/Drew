<?php

class POST
{
    private $conn;
    private $tabledata = 'secretdata';
    private $table = 'secrettable';


    // Properties
    public $id;
    public $objectkey;
    public $time_created;
    public $value1;
    public $value2;

    // Construct
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // GP
    public function read()
    {
        $sqlquery = 'SELECT 
                    s.id, 
                    s.objectkey,
                    s.time_created,
                    d.id,
                    d.value1,
                    d.value2 
                    FROM
                      ' . $this->tabledata . ' d 
                    LEFT JOIN 
                      secrettable s ON d.id = s.id 
                    ORDER BY
                      d.id DESC';

     
        $stment = $this->conn->prepare($sqlquery);

        $stment->execute();

        return $stment;
    }

    public function createPOST()
    {

      $sqlquery1 = 'INSERT INTO ' . $this->tabledata . '
        SET 
          value1 = :value1,
          value2 = :value2';
    
        $stment1 = $this->conn->prepare($sqlquery);

        $this->value1 = htmlspecialchars(striptags($this->value1));
        $this->value2 = htmlspecialchars(striptags($this->value2));

        $stment->bindParam(':value1', $this->value1);
        $stment->bindParam(':value2', $this->value2);

        if($stment->execute())
        {
          return true;
        }
        else
        {
          print_f("|Error: %s.\n", $stment->error);
          return false;
        }

        $sqlquery2 = 'INSERT INTO ' . $this->table . '
                      (objectkey,time_created)  
                      VALUES
                      (:objectkey, :time_created)';
        
          $stment2 = $this->conn->prepare($sqlquery2);
          $this->objectkey = htmlspecialchars(striptags($this->objectkey));
         
          $stment2->bindParam(':objectkey', $this->objectkey);
          $stment2->bindParam(':time_created', $this->time_created);

          $stment2->execute();

        if($stment2->execute())
        {
          return true;
        }
        else
        {
          print_f("|Error: %s.\n", $stment2->error);
          return false;
        }
    }

    public function showTwo()
    {
      $val2q =  'SELECT 
                 s.objectkey , 
                 d.value2
                FROM 
                ' . $this->table . ' d, secrettable s 
                ON d.id = s.id 
                WHERE
                s.objectkey = :key';
              

      $stment = $this->conn->prepare($val2q);
      $stment->bindParam(':key',$key);
      $stment->execute();

      $row = $stment3->fetch(PDO::FETCH_ASSOC);
      $newtime = $row['value2'];
      $formattime = new DateTime($newtime);
      $unixtime = $dateTime->format('U');
      echo json_encode($objectkey,$unixtime);
      return $row['value2'];
    }

    public function checkKey($key,$timestamp)
    {
      $checkQuery = 'SELECT 
                    objectkey, 
                    time_created
                    FROM 
                    ' . $this->table . '
                    WHERE
                    objectkey = ?';

      $stment3 = $this->conn->prepare($checkQuery);
      $stment3->bindParam(1, $key);
      $stment3->execute();
      
      $row = $stment3->fetch(PDO::FETCH_ASSOC);
      $rowArr = [];

      if(!$row)
      {
        return false;
      }
      else
      {
        return true;
      }
    }

    public function keyNtime()
    {
      $keytimeQ = 'SELECT FROM ' . $this->table . '
                  WHERE
                  objectkey = :objectkey
                  ';

      $stment4 = $this->conn->prepare($keytimeQ);
      $stment4->bindParam(':objectkey',$key);
      $stment4->execute();

      $row = $stment6->fetch(PDO::FETCH_ASSOC);
      if(!$row)
      {
        return false;
      }
      else
      {
        extract($row);
        $itemArr = array
            (
                'objectkey' => $objectkey,
                'time_created' => $time_created
            );
            $dateTime = new DateTime($timecreated);
            $unixtime = $dateTime->format('U');
            echo json_encode($objectkey,$unixtime);
      }           

    }

    public function updateKey($key)
    {
      $updateQ = 'UPDATE ' . $this->tabledata . ' d, secrettable s
                  SET
                  s.objectkey = :key,
                  d.value1 = :value1,
                  d.value2 = :value2';

      $stment5 = $this->conn->prepare($updateQ);
      $stment5->bindParam(':key',$key);
      $stment5->bindParam(':value1',$value1);
      $stment5->bindParam(':value2',$value2);

      $stment5->execute();
      
    }

    public function keyCheck($key)
    {
      $keycheckQ = 'SELECT FROM ' . $this->table . '
                    WHERE
                    objectkey = :objectkey
                    ';
      
      $stment6 = $this->conn->prepare($updateQ);
      $stment6->bindParam(':objectkey',$key);
      $stment6->execute();

      $row = $stment6->fetch(PDO::FETCH_ASSOC);
      if(!$row)
      {
        return false;
      }
      else
      {
        return true;
      }               
    }

    public function insertKey($key,$val1,$val2)
    {
      $updateQ = 'INSERT INTO ' . $this->tabledata . '
                  (value1,value2)
                  VALUES
                  (:value1,:value2)';

      $stment7 = $this->conn->prepare($updateQ);
      $stment7->bindParam(':value1',$value1);
      $stment7->bindParam(':value2',$value2);
      $stment7->execute();

      $updateQ2 = 'INSERT INTO ' . $this->table . '
                  (key)
                  VALUES
                  (:key)';

      $stment8 = $this->conn->prepare($updateQ);
      $stment8->bindParam(':key',$key);
      $stment8->execute();
      
    }

   
}