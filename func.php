<?php
function updateProductQuantity($Id, $pquantity, $conn) {

    $sql = "SELECT p_quantity FROM parts WHERE ID = $Id";
    $result = mysqli_query($conn, $sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $currentQuantity = $row['p_quantity'];
        
        $newQuantity = $currentQuantity - $pquantity;
        
        $updateSql = "UPDATE parts SET p_quantity = $newQuantity WHERE ID = $Id";
        if (mysqli_query($conn, $updateSql) === TRUE) {
            echo "Product quantity updated successfully.";
        } else {
            echo "Error updating product quantity: " . $conn->error;
        }
    } else {
        echo "Product not found.";
    }
}