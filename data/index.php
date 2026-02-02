<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pete's Little Lunch Box | Data</title>
    <link rel="icon" type="image/svg+xml" href="../images/flare-logos/favicon.png">
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>

    <?php require_once 'includes/db.php'; ?>

    <?php require_once 'includes/header.php';?>

    <main>
        <section class="hero">
            <img src="../images/petes-logos/petes-logo.svg" alt="Pete's Little Lunch Box Logo" class="petes-logo">
            <h1 class="page-title">Database Dump</h1>
        </section>
        <section id="menu-categories"><?php include 'includes/menu-categories.php'; ?></section>
        <section id="menu-items"><?php include 'includes/menu-items.php'; ?></section>
        <section id="bagel"><?php include 'includes/bagel-options.php'; ?></section>
        <section id="bread"><?php include 'includes/bread-options.php'; ?></section>
        <section id="cheese"><?php include 'includes/cheese-options.php'; ?></section>
        <section id="toppings"><?php include 'includes/topping-options.php'; ?></section>
        <section id="dressing"><?php include 'includes/dressing-options.php'; ?></section>
        <section id="size"><?php include 'includes/size-options.php'; ?></section>
    </main>
    <a href="#top" class="back-to-top-btn">Back to Top?</a>
    
    <footer class="site-footer">
        <img src="../images/flare-logos/flare-logo-light.svg" alt="Flare Logo">
    </footer>
    <?php require_once 'includes/close-db.php'; ?>
    <script src="../data/script/close-menu.js"></script>
    <script src="../data/script/table-pagination.js"></script>
</body>
</html>
