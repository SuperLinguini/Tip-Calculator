<html>
<body>
    <h2>Tip Calculator</h2>
    <?php
        if(isset($_GET['subtotal']) && ((float)$_GET['subtotal']) > 0)
        {
            $tip = (float)$_GET["subtotal"] * (float)$_GET['tip'];
            $total = $tip + (float)$_GET["subtotal"];
        }
    ?>
    <form action="index.php" method="GET">
        Bill subtotal: $
        <input type="text" name="subtotal" value="<?php if(isset($_GET['subtotal'])) echo $_GET['subtotal']?>"><br>
        Tip percentage:
        <input type="radio" name="tip" value=".10" checked> 10%
        <input type="radio" name="tip" value=".15"> 15%
        <input type="radio" name="tip" value=".20"> 20% <br>
        <input type="submit" value="Submit">
    </form>
    <?php
        if(isset($tip) && isset($total) && is_float($tip) && is_float($total))
        { 
            echo "Tip: $tip<br>";
            echo "Total: $total dollars. <br>";
        }
    ?>
</body>
</html>