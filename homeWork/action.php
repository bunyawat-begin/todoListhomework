<?php

//connect to sql
$connect = new PDO("mysql:host=localhost;dbname=todo","root","");

//check
if($connect){
    //echo "conect complete";
}

//getJsonstring
$request_data=json_decode(file_get_contents("php://input"));
$data = array();

//insertDataToSQL
if($request_data -> action=="insert"){
    echo "inserted data";
    $data = array(":subject"=>$request_data -> subject , ":homeWork"=>$request_data -> homeWork);
    $query = "INSERT INTO users(subject,homeWork) VALUE(:subject,:homeWork)";
    $statement = $connect -> prepare($query);
    $statement -> execute($data);
    $output = array("messgae"=>"inserted complete");
    echo json_encode($output);
}

//showDatainPage
if($request_data -> action=="getAllUser"){
    $query= "SELECT * FROM users";
    $statement=$connect-> prepare($query);
    $statement-> execute();
    while($row=$statement-> fetch(PDO::FETCH_ASSOC)){
        $data[] = $row;
    }
    echo json_encode($data);
}

//editData
if($request_data->action=="getEditUser"){
    $query= "SELECT * FROM users WHERE id = $request_data->id";
    $statement=$connect-> prepare($query);
    $statement->execute();
    while($row=$statement-> fetch(PDO::FETCH_ASSOC)){
        $data['id']=$row['id'];
        $data['subject']=$row['subject'];
        $data['homeWork']=$row['homework'];
    }
    echo json_encode($data);
}

//updateData
if($request_data ->action=="updateData"){
    echo "inserted data";
    $data = array(":subject"=>$request_data -> subject , ":homeWork"=>$request_data -> homeWork, ":id"=>$request_data-> id);
    $query = "UPDATE users SET homework=:homeWork, subject=:subject WHERE id=:id ";
    $statement = $connect -> prepare($query);
    $statement -> execute($data);
    $output = array("messgae"=>"Update complete");
    echo json_encode($output);
}

//delete
if($request_data->action=="delete"){
    $query= "DELETE FROM users WHERE id = $request_data->id";
    $statement=$connect->prepare($query);
    $statement->execute();
    $output=array("message"=>"Delete Complete");
    echo json_encode($output);
}

?>