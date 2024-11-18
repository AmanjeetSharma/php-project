<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping KART</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
        }

        .home-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 65vh;
            color: black;
            font-size:20px ;
            color: black;
            text-align: center;
        }

        .background {
            background-color: rgb(100 175 145 / 83%);            ;
            height: 70%;
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        .header h1 {
            font-size: 4em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 1.5em;
        }

        .about-us {
            background-image: url('./images/background.jpg');
            background-size: cover;
            background-position: center;
            padding: 0px 20px;
            background-color: #f8f8f8;
            width: 100%;
            text-align: center;
        }

        .about-us h2 {
            font-size: 2.5em;
            color: #bf7e50;
            margin-bottom: 20px;
        }

        .about-us p {
            font-size: 1.2em;
            color: black;
            line-height: 1.8;
            max-width: 800px;
            margin: 0 auto 20px;
        }

        .cta {
            margin-top: 30px;
        }

        .cta-button {
            font-size: 1.5em;
            padding: 15px 30px;
            background-color: #3b6554;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="home-container">
        <div class="background">
            <div class="header">
                <h1>Shopping KART</h1>
            </div>
        </div>

        <div class="about-us">
            <h2>About Us</h2>
            <p>At Shopping KART, we bring you the best deals on the finest products. From fashion to gadgets,
                we've got it all, and we're here to make your shopping experience unforgettable!</p>
            <p>"Why shop anywhere else when you have everything you need right here?"</p>
            <p>Our mission is to make your shopping experience smooth, affordable, and fun. With exclusive discounts, 
               a wide range of products, and hassle-free delivery, Shopping KART is the place for you!</p>
        </div>

        <div class="cta">
            <a href="login.php" class="cta-button">Login to Start Shopping</a>
        </div>
    </div>
</body>

</html>