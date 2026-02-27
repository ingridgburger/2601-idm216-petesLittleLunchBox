<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Account - Pete's Little Lunch Box</title>
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/account.css">
</head>

<body>
<div class="app-shell">
    <header class="app-header header--tall header--red has-cart">
        <section class="header-icons">
            <div></div>
            <a href="lunchbox.php" class="icon-btn cart-btn" aria-label="Lunchbox">
                <svg
                    width="36"
                    height="36"
                    viewBox="0 0 36 36"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                    d="M13.5 11.4502V9.45017C13.5 8.91974 13.7634 8.41103 14.2322 8.03596C14.7011 7.66089 15.337 7.45017 16 7.45017H21C21.663 7.45017 22.2989 7.66089 22.7678 8.03596C23.2366 8.41103 23.5 8.91974 23.5 9.45017V11.4502"
                    stroke="currentColor"
                    stroke-linecap="square"
                    stroke-linejoin="round"
                    />
                    <path
                    d="M15.5996 19.9499V26.6501C15.5995 27.1536 15.3998 27.6367 15.0439 27.9929C14.6877 28.3492 14.204 28.5495 13.7002 28.5495H8.90039C8.39648 28.5495 7.91296 28.3492 7.55664 27.9929C7.20062 27.6367 7.0001 27.1537 7 26.6501V19.9499H15.5996ZM30 19.9499V26.6501C29.9999 27.1537 29.7994 27.6367 29.4434 27.9929C29.087 28.3492 28.6035 28.5495 28.0996 28.5495H15.8877C16.3441 28.0239 16.5995 27.3508 16.5996 26.6501V19.9499H30ZM11.2998 12.7497C12.4401 12.7497 13.5344 13.2032 14.3408 14.0095C15.1469 14.8157 15.5994 15.9095 15.5996 17.0495V18.9499H7V17.0495C7.00018 15.9094 7.45352 14.8157 8.25977 14.0095C9.0661 13.2033 10.1596 12.7498 11.2998 12.7497ZM25.7002 12.7497C26.8404 12.7498 27.9339 13.2033 28.7402 14.0095C29.5465 14.8157 29.9998 15.9094 30 17.0495V18.9499H16.5996V17.0495C16.5994 15.6443 16.0415 14.2962 15.0479 13.3025C14.845 13.0996 14.6263 12.9152 14.3965 12.7497H25.7002Z"
                    fill="currentColor"
                    />
                </svg>
            </a>
        </section>
        <h1 class="header-title script white-text">account</h1>
    </header>

    <section class="account-header">
        <img src="app-images/misc/3-graphics.webp" alt="Decorative graphics" class="header-graphics">
        
        <div class="user-info">
            <h2 class="user-name">Kayla Liu</h2>
            <button class="edit-btn">Edit</button>
        </div>
    </section>

    <div class="divider">
        <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
    </div>

    <section class="account-menu">
        <a href="#" class="menu-item">
            <span>Contact Information</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>

        <div class="divider">
            <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
        </div>

        <a href="#" class="menu-item">
            <span>Payment Methods</span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M9 18L15 12L9 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>

        <div class="divider">
            <img src="app-images/misc/star.svg" alt="" class="divider-star-img">
        </div>
    </section>

    <?php $current_page = basename($_SERVER['PHP_SELF']); ?>

    <nav class="bottom-nav">
        <a href="home.php" class="<?= ($current_page == 'home.php' || $current_page == 'category.php' || $current_page == 'item.php') ? 'active' : '' ?>">
            <img src="app-images/nav/menu-<?= ($current_page == 'home.php' || $current_page == 'category.php' || $current_page == 'item.php') ? 'active' : 'inactive' ?>.svg" alt="Menu">
            <span>Menu</span>
        </a>
        <a href="orders.php" class="<?= ($current_page == 'orders.php') ? 'active' : '' ?>">
            <img src="app-images/nav/order-<?= ($current_page == 'orders.php') ? 'active' : 'inactive' ?>.svg" alt="Orders">
            <span>Orders</span>
        </a>
        <a href="account.php" class="<?= ($current_page == 'account.php') ? 'active' : '' ?>">
            <img src="app-images/nav/account-<?= ($current_page == 'account.php') ? 'active' : 'inactive' ?>.svg" alt="Account">
            <span>Account</span>
        </a>
    </nav>
</div>
</body>
</html>