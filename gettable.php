<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="administrator.css">
    <style>
        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
            margin-top: 2%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: grey;
            color: white;
        }
    </style>
</head>

<body>

    <?php
    include('server.php');
    $q = intval($_GET['q']);
    if ($q == 1) {
        $var = "SELECT count(product_name), product_name  FROM lists group by id_product order by count(product_name) LIMIT 10";
        $sql = mysqli_query($db, $var);
        $count = mysqli_num_rows($sql);
        if ($count) {
            $file = fopen('top10lists.csv', 'w');
            $product_name = array();
            $name = array();
            $count = array();
            echo "<table>
            <tr>
            <th>Product name</th>
            <th>Quantity</th>   
            </tr>";
            while ($row = mysqli_fetch_array($sql)) {
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['count(product_name)'] . "</td>";
                echo "</tr>";
                $name[] = $row['product_name'];
                $count[] = $row['count(product_name)'];
            }
            echo "</table>";
            $product_name = array_map(null, $name, $count);
            //var_dump($product_name);
            foreach ($product_name as $fields) {
                fputcsv($file, $fields);
            }
        }
    } else if ($q == 2) {
        $var = "SELECT count(product_name), product_name  FROM favorites group by id_product order by count(product_name) LIMIT 10";
        $sql = mysqli_query($db, $var);
        $count = mysqli_num_rows($sql);
        if ($count) {
            $file = fopen('top10fav.csv', 'w');
            $product_name = array();
            $name = array();
            $count = array();
            echo "<table>
            <tr>
            <th>Product name</th>
            <th>Quantity</th>   
            </tr>";
            while ($row = mysqli_fetch_array($sql)) {
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['count(product_name)'] . "</td>";
                echo "</tr>";
                $name[] = $row['product_name'];
                $count[] = $row['count(product_name)'];
            }
            echo "</table>";
            $product_name = array_map(null, $name, $count);
            //var_dump($product_name);
            foreach ($product_name as $fields) {
                fputcsv($file, $fields);
            }
        }
    } else if ($q == 3) {
        $var = "SELECT id, product_name, description, price, category, ingredients, allergens, perishable, locations, season, product_date  FROM products order by id";
        $sql = mysqli_query($db, $var);
        $count = mysqli_num_rows($sql);
        if ($count) {
            $file = fopen('export_products.csv', 'w');
            $product_name = array();
            $id = array();
            $description = array();
            $price = array();
            $category = array();
            $ingredients = array();
            $allergens = array();
            $perishable = array();
            $locations = array();
            $season = array();
            $product_date = array();
            echo "<table>
            <tr>
            <th>Product ID</th> 
            <th>Product name</th>
            <th>Description</th>   
            <th>Price</th> 
            <th>Category</th> 
            <th>Ingredients</th> 
            <th>Allergens</th> 
            </tr>";
            while ($row = mysqli_fetch_array($sql)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td>" . $row['ingredients'] . "</td>";
                echo "<td>" . $row['allergens'] . "</td>";
                echo "</tr>";
                $id[] = $row['id'];
                $product_name[] = $row['product_name'];
                $description[] = $row['description'];
                $price[] = $row['price'];
                $category[] = $row['category'];
                $ingredients[] = $row['ingredients'];
                $allergens[] = $row['allergens'];
                $perishable[] = $row['perishable'];
                $locations[] = $row['locations'];
                $season[] = $row['season'];
                $product_date[] = $row['product_date'];
            }
            echo "</table>";
            $product_name = array_map(null, $id, $product_name, $description, $price, $category, $ingredients, $allergens, $perishable, $locations, $season, $product_date);
            foreach ($product_name as $fields) {
                fputcsv($file, $fields);
            }
        }
    } else if ($q == 4) {
        $var = "SELECT *  FROM users order by id";
        $sql = mysqli_query($db, $var);
        $count = mysqli_num_rows($sql);
        if ($count) {
            $file = fopen('export_users.csv', 'w');
            $full_name = array();
            $id = array();
            $email = array();
            $username = array();
            $password = array();
            $phone_number = array();
            $allergies = array();
            $groups = array();
            echo "<table>
        <tr>
        <th>User ID</th> 
        <th>Full name</th>
        <th>Email</th>   
        <th>Username</th> 
        <th>Phone number</th> 
        <th>Allergies</th> 
        </tr>";
            while ($row = mysqli_fetch_array($sql)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['full_name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['phone_number'] . "</td>";
                echo "<td>" . $row['allergies'] . "</td>";
                echo "</tr>";
                $id[] = $row['id'];
                $full_name[] = $row['full_name'];
                $email[] = $row['email'];
                $username[] = $row['username'];
                $password[] = $row['password'];
                $phone_number[] = $row['phone_number'];
                $allergies[] = $row['allergies'];
                $groups[] = $row['groups'];
            }
            echo "</table>";
            $full_name = array_map(null, $id, $full_name, $email, $username, $password, $phone_number, $allergies, $groups);
            foreach ($full_name as $fields) {
                fputcsv($file, $fields);
            }
        }
    
    }

        if (isset($month)) {
        var_dump($month);
        if(gettype($month)!="integer" || $month>12 || $month<1)
        {
            echo "Invalid";
        }else{
        $var = "SELECT product_name, product_date FROM products where extract(month from product_date) = $month";
        $sql = mysqli_query($db, $var);
        $count = mysqli_num_rows($sql);
        if ($count) {
            $file = fopen('monthly_products.csv', 'w');
            $product_name = array();
            $product_date = array();
            echo "<table>
            <tr>
            <th>Product name</th> 
            <th>Product date</th>
            </tr>";
            while ($row = mysqli_fetch_array($sql)) {
                echo "<tr>";
                echo "<td>" . $row['product_name'] . "</td>";
                echo "<td>" . $row['product_date'] . "</td>";
                echo "</tr>";
                $product_name[] = $row['product_name'];
                $product_date[] = $row['product_date'];
            }
            echo "</table>";
            $product_name = array_map(null, $product_name, $product_date);
            foreach ($product_name as $fields) {
                fputcsv($file, $fields);
            }
        }
    }
}

    ?>
</body>

</html>