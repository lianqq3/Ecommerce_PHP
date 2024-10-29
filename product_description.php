<!DOCTYPE html>
<html lang="en">

<head>
    <title>Product Description</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .product-info {
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }

        .product-info h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-info img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .product-info p {
            margin-bottom: 10px;
        }

        .back-button {
            margin-top: 20px;
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }

        .back-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="product-info">
            <?php
            // Database connection details
            $host = 'localhost'; // Hostname
            $dbname = 'perfume'; // Database name
            $username = 'root'; // Username
            $password = ''; // Password

            // Create a new database connection
            $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

            // Check if the product ID is provided in the URL
            if (isset($_GET['id'])) {
                $productID = $_GET['id'];

                // Prepare and execute the query to retrieve the product details
                $query = "SELECT * FROM menperfume WHERE ProductID = ?";
                $stmt = $db->prepare($query);
                $stmt->execute([$productID]);

                // Fetch the product information
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                // Check if the product exists
                if ($product) {
                    // Display the product information
                    echo "<h1>{$product['ProductName']}</h1>";
                    echo "<img src=\"data:image/jpeg;base64," . base64_encode($product['ProductImage']) . "\" alt=\"Product Image\"><br>";
                    echo "<p>Price: {$product['ProductPrice']}</p>";
                    echo "<p>Description: {$product['ProductDescription']}</p>";
                    // Add more details as needed
                } else {
                    echo "<p>Product not found.</p>";
                }
            } else {
                echo "<p>Invalid product ID.</p>";
            }
            ?>
        </div>
        <a href="shoppingcart.php" class="back-button">Back to Products</a>
    </div>
</body>

</html>
