<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Create a file</title>
</head>

<body>
    <section>
        <h1> Details of users</h1>
        <form action="index.php" method="post">
            <input type="text" placeholder="First name" name="name">
            <input type="text" placeholder="Last name" name="surname">
            <input type="number" placeholder="Enter age" min="0" name="age">
            <input type="submit" name="submit">
        </form>
            <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] === "emptyInput"){
                        echo "<h3 class='center_align_error'>Please fill all fields!</h3>";
                    }
                }

                if(isset($_GET["success"])){
                    if($_GET["success"] === "submitted"){
                        echo "<h3 class='center_align_success'>Your details have been succesfully added!</h3>";
                    }
                }
            ?>
    </section>
    <?php
    if(isset($_POST["submit"])){

        if(!empty($_POST["name"]) && !empty($_POST["surname"]) && !empty($_POST["age"])){
        $myFile = fopen("file.txt", "a"); // use 'a' and not 'w' to avoid overriding the text

        $txt = "My name: " . $_POST["name"] . "\n" . "My surname: " . $_POST["surname"] . "\n" . "my age: " . $_POST["age"] . "\n" . "\n";
        
        fwrite($myFile, $txt); // write in the file.txt
        fclose($myFile);
        header("location: index.php?success=submitted");
            exit();
        }else{
            header("location: index.php?error=emptyInput");
            exit();
        }
    }
  

    
?>

</body>

</html>