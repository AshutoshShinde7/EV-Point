<?php
// Function to update product quantity after a purchase
function updateProductQuantity($productId, $quantity) {
    global $conn;

    // Ensure quantityToSubtract is a positive integer
    $quantityToSubtract = max(0, (int)$quantity);

    // Check if quantityToSubtract is positive
    if ($quantityToSubtract <= 0) {
        echo "Error: Quantity to subtract must be a positive integer.";
        return;
    }

    // Update the product quantity in the database
    $sql = "UPDATE parts_sells SET Quantity = Quantity - $quantityToSubtract WHERE ID = $productId";

    if ($conn->query($sql) === TRUE) {
        echo "Product quantity updated successfully.";
    } else {
        echo "Error updating product quantity: " . $conn->error;
    }
}
?>