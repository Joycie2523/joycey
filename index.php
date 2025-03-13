<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\Todo;

$todo = new Todo();

    if(isset($_POST['submit']))
        {
            $todo->createTodo(['todo_name'=> $_POST['todo']]);
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
</head>
<body>
<h1>My To-do List</h1>
        <form method="POST" action="index.php">
        <input type="text" name="todo" id="">
        <input type="submit" value="Submit" name="submit">
    </form>
    
        <?php 
    
    //For creating to-do list    
    // $todo = new Todo();
    // $todos = $todo->createTodo([
    //     'todo_name' => "Submit OOP Project this 12:00 am."
    // ]);


    //For getting the to-do list
    // $todos = $todo->getTodos();
    //         foreach ($todos as $key=>$value)
    //         {
    //         echo '<li>'.$value["todo_name"].'</li>';
    //         }

     //For getting To-do SPECIFICALLY       
        //     $todos = $todo->getTodo(1);
        //    echo '<li>'.$todos["todo_name"].'</li>';
            // }

                    
            
    //For deleting the to-do list
    //$todo = new Todo();
            // $result = $todo->deleteTodo(4);     
            //echo $result; 
            ?>
            
    </ul>
</body>
</html>
