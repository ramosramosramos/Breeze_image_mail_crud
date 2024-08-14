<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      .btn{
        width: 200px;
        height: 40px;
        border-radius: 8x;
        outline: none;
        color: #ffffff;
        background-color: #333333;
       .btn:hover{
        background-color: #444444;
        }
      }
      
    </style>
</head>
<body style="background-color: #f8f9fa; font-family: Arial, sans-serif; margin: 0; padding: 0;">
  <div style="width: 100%; max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border: 1px solid #e9ecef; border-radius: 5px;">
    <h1 style="text-align: center; color: #333333;">Hello, welcome to mail!</h1>
    <div style="color: #333333; ">
      <p><strong>Thank you for registering :</strong> {{$item['name']}} !</p>
      <button class="btn">Ok</button>
    </div>
  </div>
</body>
</html>