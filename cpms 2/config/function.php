<?php
session_start();

require 'dbcon.php';


//input field validation
function validate($inputData)
{
      global $conn;
      $validatedData= mysqli_real_escape_string($conn,$inputData);
      return trim($validatedData);
       
}


//redirect from 1 page to another with the message status

function redirect($url, $status)
{

      $_SESSION['status']= $status;
      header('Location:'. $url);
      exit(0);
}

//display messages or status after process

function alertMessage()
{

      if(isset($_SESSION['status' ]))
      {
           
            echo'   <div class="alert alert-warning alert-dismissible fade show" role="alert"><h6>'.$_SESSION['status'].'</h6> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ' ;
            unset($_SESSION['status']);
      }
}

//insert record using this function

function insert($tableName,$data)
{
      global $conn;
      $table= validate($tableName);
      $columns= array_keys($data);
      $values= array_values($data);

      $finalColumn= implode(',', $columns);
      $finalValues= "'".implode("', '", $values)."'";

      $query= "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
      $result= mysqli_query($conn,$query);
      return $result;

}
//update data using this function

function update($tableName, $id, $data)
{
      global $conn;
      $table= validate($tableName);
      $id= validate($id);

      $updateDataString= "";
      
      foreach($data as $column => $value)
      {
            $updateDataString .= $column.'='. "'$value',";
      }

      $finalUpdateData= substr(trim ($updateDataString),0,-1);

      $query= "UPDATE $table SET $finalUpdateData WHERE id='$id'";
      $result= mysqli_query($conn, $query);
      return $result;
       
}

function getAll($tableName, $status=NULL)
{
      global $conn;

      $table= validate($tableName);
      $status= validate($status);

      if($status== 'status')
      {
            $query= "SELECT * FROM $table WHERE status='0'";
      }

      else{
            $query= "SELECT * FROM $table";
      }
      return mysqli_query($conn, $query);
}

function getById($tableName, $id)
{
      global $conn;

      $table= validate($tableName);
      $id= validate($id);

      $query= "SELECT * FROM $table WHERE id='$id' LIMIT 1";
      $result= mysqli_query($conn,$query);

      if($result)
      {
            if(mysqli_num_rows($result)==1)
            {
            $row= mysqli_fetch_array($result);
            $response= [
                  'status' => 200,
                  'data' => $row,
                  'message' => 'Record Found'
            ];
            return $response;
            }

            else
            {
                  $response= [
                        'status' => 404,
                        'message' => 'No Record Found'
                  ];
                  return $response;
            }
      }
}

//dalete data from database using id

function delete($tableName, $id)
{
      global $conn;

      $table= validate($tableName);
      $id= validate($id);
      
      $query= "DELETE FROM $table WHERE id='$id' LIMIT 1";
      $result= mysqli_query($conn,$query);
      return $result;
}

function checkParamId($type)
{
if(isset($_GET[$type]))
{
      if($_GET[$type]!='')
      {
            return $_GET[$type];
      }
      else{
      return '<h5>NO ID FOUND</h5>';

      }
}
else{
      return '<h5>NO ID GIVEN</h5>';
}
}

function logoutSession()
{
unset($_SESSION['loggedIn']);
unset($_SESSION['loggedInUser']);

}


?>