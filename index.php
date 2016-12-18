<html>
<body>
    <h2>Tip Calculator</h2>
    <?php
        if(isset($_GET['subtotal']))
        {
            $total = (float)$_GET["subtotal"] * (float)$_GET['tip'];
            $text = "Subtotal is $total dollars. <br>";
            echo $text;
        }
    ?>
    <form action="index.php" method="GET">
        Bill subtotal: $
        <input type="text" name="subtotal" value="<?php echo $total?>"><br>
        Tip percentage:
        <input type="radio" name="tip" value=".10" checked> 10%
        <input type="radio" name="tip" value=".15"> 15%
        <input type="radio" name="tip" value=".20"> 20%
        <input type="submit" value="Submit">
    </form>
</body>
</html>