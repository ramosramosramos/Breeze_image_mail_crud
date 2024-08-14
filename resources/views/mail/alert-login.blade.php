<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Alert</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container{
          text-align: center;
          background-color: rgb(64, 64, 64);
          color: bisque;
          buttons{
            display: flex;
            gap: 4;
          }
          button{
            width: 100px;
            border-radius: 8px;
            outline: none;  
            .yes{
                background-color: green;
                color: antiquewhite;
            }    
            .no{
                background-color: red;
                color: antiquewhite;
            }    
          }
          
        }
    </style>
</head>
<body>
    <div class="container">
        
    <h1><strong>Alert:Someone is login to your accounts , Is that you? {{$user['name']}} </strong></h1>
        <div class="buttons">
            <button class="yes">Yes,its me</button>
            <button class="no">No,its me</button>
        </div>
    </div>
    
</body>
</html>