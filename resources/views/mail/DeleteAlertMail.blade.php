<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <style>
        .container{
            background-color: black;
            color: aliceblue;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .message{
            text-align: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h1>Hello !</h1>
            <h1>Did you delete this account?:</h1>
            <div class="message">
                <h1>{{$user['name']}}</h1>    
                <h1>{{$user['email']}}</h1>    
            </div>
        </div>
    </div>
    
</body>
</html>