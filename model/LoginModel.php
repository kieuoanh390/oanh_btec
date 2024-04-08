<?php
//query data
require 'model/database.php';

//write a function to check user login
//check if the login account exists in the database 

function checkLoginUser($username,$password){
    //username and password is the data the user enters from the login form
    $db = connectionDb();  // get connection from database
    // write query sql statement
    $sql = "SELECT a.*,u.`full_name`, u.`email`, u.`phone` FROM `accounts` AS a 
    INNER JOIN `users` AS u ON a.user_id = u.id 
    WHERE `username` = :user AND `password` = :pass AND a.`status` = 1 LIMIT 1";
    $statement =$db->prepare($sql); //test sql statementl
    $dataUser =[];//empty array containing user information
if($statement){
    //Check the parameters passed to sql
    $statement->bindParam(':user', $username,PDO::PARAM_STR);
    $statement->bindParam(':pass', $password,PDO::PARAM_STR);

    // execute the command
    if($statement->execute()){
        //check if sql query has returned data or not
        if($statement->rowCount() > 0 ){
            // There is data in the database, get the data out
            $dataUser=$statement ->fetch(PDO::FETCH_ASSOC);

        }
    }

   }
   disconnectDb($db);  // close the database connection
   return $dataUser; // Returns data containing user information

}