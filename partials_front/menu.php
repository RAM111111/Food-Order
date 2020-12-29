
<?php include 'conf/constants.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                  <!-- <h1 class="img-responsive">RAM</h1> -->
                    <img src="images/logo.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo URL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo URL; ?>order.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->
