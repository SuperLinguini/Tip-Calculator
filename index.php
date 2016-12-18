<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
        body {
            background-color: lightyellow;
            font-family: 'Open Sans', sans-serif;
        }
        .flex-container {
            display: flex;
             display: -webkit-flex;
            width: 400px;
            height: 250px;
            background-color: white;
            border: 1px solid black;
            margin: 0 auto;
            flex-direction: column;
        }
        .center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="flex-container">
    <h2 class="center">Tip Calculator</h2>
    <?php
        if(isset($_GET['subtotal']) && ((float)$_GET['subtotal']) > 0)
        {
            $tip = (float)$_GET["subtotal"] * (float)$_GET['tip'];
            $total = $tip + (float)$_GET["subtotal"];
        } else if(isset($_GET['subtotal']) && ((float)$_GET['subtotal']) == 0)
        {
            $error = true;
        }
    ?>
    <form action="index.php" method="GET">
        <span <?php if(isset($error) && $error) echo 'style="color:red;"'?>>Bill subtotal: $</span>
        <input type="text" name="subtotal" value="<?php if(isset($_GET['subtotal'])) echo $_GET['subtotal']?>"><br>
        Tip percentage:
        <?php 
            if(isset($_GET['tip']))
                $radioInput = (float)$_GET['tip'];
            else
                $radioInput = .10;
            $numArr = array(".10", ".15", ".20");
            for($i = 0; $i < 3; $i++)
            {
                if($numArr[$i] == $radioInput)
                    echo '<input type="radio" name="tip" value="'. $numArr[$i] .
                    '" checked>' . $numArr[$i] . '%';
                else
                    echo '<input type="radio" name="tip" value="'. $numArr[$i] .
                    '">' . $numArr[$i] . '%';
            }
        ?>
        <!--<input type="radio" name="tip" value=".10" checked> 10%
        <input type="radio" name="tip" value=".15"> 15%
        <input type="radio" name="tip" value=".20"> 20%--> <br>
        <input type="submit" value="Submit" style="margin: 0 auto">
    </form>
    <?php
        if(isset($tip) && isset($total) && is_float($tip) && is_float($total))
        { 
            echo "Tip: $" . number_format($tip, 2). "<br>";
            echo "Total: $" . number_format($total, 2). " <br>";
        }
    ?>
    </div>
</body>
</html>