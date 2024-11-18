<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="style.css">
    <style>
                body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: url('images/thankyou-bg.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
            text-align: center;
        }

        .thankyou-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
            animation: fadeIn 2s ease-in-out;
        }

        .thankyou-message {
            font-size: 3em;
            font-weight: bold;
            margin-bottom: 20px;
            animation: bounce 1.5s infinite;
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .return-btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 1.2em;
            color: #333;
            background: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .return-btn:hover {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="thankyou-container">
        <div class="thankyou-message">Thank You!</div>
        <p>Your purchase has been successfully completed.</p>
        <a href="products.php" class="return-btn">Return to Shop</a>
    </div>
</body>
</html>
