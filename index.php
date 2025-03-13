<?php

require_once 'vendor/autoload.php';
use Aries\Dbmodel\Models\Todo;

$todo = new Todo();

// Add a new to-do (CREATE)
if (isset($_POST['submit'])) {
    if (!empty($_POST['todo'])) {
        $todo->createTodo(['todo_name' => $_POST['todo']]);
        header("Location: index.php"); // Refresh page after adding
        exit();
    }
}

// Delete a to-do (DELETE)
if (isset($_POST['delete']) && !empty($_POST['id'])) {
    $todo->deleteTodo($_POST['id']);
    header("Location: index.php");
    exit();
}

// Update a to-do (UPDATE)
if (isset($_POST['update']) && !empty($_POST['id']) && !empty($_POST['todo_name'])) {
    $todo->updateTodo($_POST['id'], ['todo_name' => $_POST['todo_name']]);
    header("Location: index.php");
    exit();
}

// Get all to-do items (READ)
$todos = $todo->getTodos();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO LIST</title>
</head>
<body>

<h1>My To-Do List</h1>

<!-- Form to add a new task -->
<form method="POST" action="index.php">
    <input type="text" name="todo" placeholder="Enter a task" required>
    <input type="submit" value="Add Task" name="submit">
</form>

<!-- Display the to-do list with Update and Delete options -->
<ul>
    <?php if (!empty($todos)): ?>
        <?php foreach ($todos as $task): ?>
            <li>
                <!-- Update Form -->
                <form method="POST" action="index.php" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                    <input type="text" name="todo_name" value="<?php echo htmlspecialchars($task['todo_name']); ?>" required>
                    <button type="submit" name="update">Update</button>
                </form>

                <!-- Delete Form -->
                <form method="POST" action="index.php" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
                    <button type="submit" name="delete">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>No tasks found.</li>
    <?php endif; ?>
</ul>

</body>
</html>
