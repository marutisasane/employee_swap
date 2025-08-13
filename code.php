<?php 
require 'config.php';

// GET department 

if (isset($_GET['action'])) 
{
    $stmt = $conn->prepare("SELECT DISTINCT department from employees");
    
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
}

if (isset($_POST['department'])) 
{
    $department = $_POST['department'];
    $stmt = $conn->prepare("SELECT * from employees where department = :department ");
    $stmt->execute([':department' => $department]);

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
}


if (isset($_POST['empId']) && $_POST['empId'] != "") 
{
    $bindings = [];
    $target = $_POST['target'] == "left" ? "1" : "0";
    $bindings['target'] = $target;
    
    foreach ($_POST['empId'] as $key => $value) 
    {
        $id[]= ":id".$key;
        $bindings['id'.$key] = $value; 
    }

    $id = implode(',',$id);
    
    $sql = "UPDATE employees SET target = :target WHERE id IN ($id)";

    $stmt = $conn->prepare($sql);

    if($stmt->execute($bindings))
    {
        echo json_encode(['status'=>"success", 'message' => "Employee transfer successfully"]);
        //  echo json_encode(['status' => "success" , 'message' => "Employee transfer successfully"]);
    }
}



?>