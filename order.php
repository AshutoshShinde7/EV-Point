<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Order</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' media='screen' href='order.css'>
    <!-- <script src='main.js'></script> -->
</head>

<body>
    <section class="container">
        <?php
        include 'connect.php';
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];
            $sql = "SELECT * FROM parts WHERE ID = '$id'";

            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);

            $pname = $data['p_name'];
            $pprice = $data['p_price'];
            // $pquantity = $data['p_quantity'];
            $dcharge = 50;
            $tprice = $pprice + $dcharge;
            $tprice *= $pquantity;
            $pimg = $data['Image'];
        } else {
            echo "No Product found";
        }
        ?>
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5">
                <h2 class="text-center p-2 text-primary">Fill the details to complete your order</h2>
                <h3>Product Deatails</h3>
                <table class="table table-bordered" width="" 500px>
                    <tr>
                        <th>Product Name : </th>
                        <td>
                            <?php echo $pname; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Product Price : </th>
                        <td>₹
                            <?php echo $pprice; ?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <th>Product Quantity : </th>
                        <td><?php echo $pquantity; ?></td>
                    </tr> -->
                    <tr>
                        <th>Delivery Charge : </th>
                        <td>₹
                            <?php echo $dcharge; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Amount to Pay : </th>
                        <td>₹
                            <?php echo $tprice; ?>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
    </section>
</body>

</html>