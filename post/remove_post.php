<?php
require_once('../partials/dbconnect.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $user_id = $_GET['user_id'];
}
if (isset($_POST['delete_post'])) {
    $user_id = $_POST['user_id'];
	$id = $_POST['id'];
    $sql = "DELETE FROM `post` WHERE `Id`=$id";
    $result = mysqli_query($conn, $sql);
	if ($result){
        header('location: ../users/profile.php?id='.$user_id);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
        <p>Are you sure you want to delete this record?</p>
        <form action="/forum/post/remove_post.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <button type="submit" name="delete_post">Yes</button>
            <a href="../users/profile.php?id=<?php echo $user_id?>">No</a>
        </form>
</body>
</html>