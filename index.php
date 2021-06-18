<?php
require_once './library.php';

if(!empty($_POST) && isset($_POST['command']))
{
    switch($_POST['command'])   
    {
        case 'please scan dir':
            if (isset($_POST['addition'])) mprint(mscandir($_POST['addition']));
            else die('Path have not given');

            break;
        case 'please imgs to self dirs':
            $path = '';
            if (isset($_POST['addition'])) fileToSelfDir($_POST['addition']);
            else die('Path have not given');
            
            break;
        case 'please imgs to self dirs all':
            $path = '';
            if (isset($_POST['addition'])) fileToSelfDir($_POST['addition'], true);
            else die('Path have not given');
                
            break;
        
    }

    
    header('Location: '.$_SERVER["PHP_SELF"]);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            text-transform: uppercase;
        }
        form {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            margin: 30px auto;
            font-size: 14pt;
        }
        form input,label {
            width: 60%;
        }
        form input{
            margin-bottom: 30px;
            font-size: 18pt;
            padding: 0 5px;
            border-radius: 7px;
        }
        form label{
            padding-left: 70px;
            letter-spacing: 2px;
        }
        form button{
            width: 30%;
            margin: 0 auto;
            padding: 5px;
            font-size: 16pt;
            letter-spacing: 5px;
            font-weight: 800;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif, Helvetica, 'Times New Roman';

        }

        @media (max-width: 800px)
        {
            form button{
                width: 60%;
            }
            form input,label {
                width: 90%;
            }
        }
        
    </style>
</head>
<body>
    <br>
    <h1>don't forget about please</h1>
    <form method="post">
        <label for="command">Command</label>
        <input type="text" name="command" id="command">
        <label for="addition">Addition</label>
        <input type="text" name="addition" id="addition">
        <button type="submit">Send Request</button>
    </form>
</body>
</html>