<?php
// Set the payment amount
$amount = 50;

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the payment amount matches the entered amount
    if ($_POST['amount'] != $amount) {
        echo "Payment amount does not match. Please try again.";
    } else {
        // Process the payment
        // ...
        echo "Payment successful!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Gym Payment</title>
</head>
<body>
    <h1>Gym Payment</h1>
    <p>Please enter your payment information:</p>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br><br>
        <label for="card">Card Number:</label>
        <input type="text" name="card" id="card" required><br><br>
        <label for="expiry">Expiry Date:</label>
        <input type="month" name="expiry" id="expiry" required><br><br>
        <label for="cvv">CVV:</label>
        <input type="text" name="cvv" id="cvv" required><br><br>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" id="amount" value="<?php echo $amount; ?>" readonly><br><br>
        <input type="submit" value="Pay">
    </form>
</body>
</html>
