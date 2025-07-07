<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding-top: 50px;
            background: #f2f2f2;
        }

        .calc-container {
            background: #fff;
            padding: 20px;
            display: inline-block;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        input[type="text"] {
            width: 150px;
            padding: 8px;
            margin: 5px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            margin-top: 10px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background: #218838;
        }

        .result {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="calc-container">
        <h2>Simple Calculator by [Your Name]</h2>
        <form method="post">
            <input type="text" name="no1" placeholder="Enter first number"><br>
            <input type="text" name="no2" placeholder="Enter second number"><br>
            <input type="text" name="operator" placeholder="Enter operator (+, -, *, /)"><br>
            <input type="submit" name="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $no1 = $_POST['no1'];
            $no2 = $_POST['no2'];
            $operator = $_POST['operator'];

            if (is_numeric($no1) && is_numeric($no2)) {
                switch ($operator) {
                    case '+':
                        $result = $no1 + $no2;
                        echo "<div class='result'>Answer: $result</div>";
                        break;
                    case '-':
                        $result = $no1 - $no2;
                        echo "<div class='result'>Answer: $result</div>";
                        break;
                    case '*':
                        $result = $no1 * $no2;
                        echo "<div class='result'>Answer: $result</div>";
                        break;
                    case '/':
                        if ($no2 != 0) {
                            $result = $no1 / $no2;
                            echo "<div class='result'>Answer: $result</div>";
                        } else {
                            echo "<div class='error'>Error: Division by zero!</div>";
                        }
                        break;
                    default:
                        echo "<div class='error'>Error: Unsupported operator!</div>";
                }
            } else {
                echo "<div class='error'>Error: Please enter valid numbers!</div>";
            }
        }
        ?>
    </div>
</body>
</html>
