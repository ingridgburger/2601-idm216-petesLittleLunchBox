<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout</title>

  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/components.css">
  <link rel="stylesheet" href="css/item.css">
  <link rel="stylesheet" href="css/category.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/lunchbox.css">
  <link rel="stylesheet" href="css/checkout.css">
</head>

<body>
<div class="app-shell" style="padding: 0;">

<header class="app-header header--tall header--red has-back has-cart">
  <section class="header-icons">
    <button class="icon-btn back-btn" onclick="history.back()" aria-label="Go back">
      <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor"><path d="m112.77-480 308.61 308.62q8.85 8.84 8.74 21.15-.12 12.31-8.97 21.15-8.84 8.85-21.15 8.85-12.31 0-21.15-8.85L73.15-434.54q-9.69-9.69-14.15-21.61-4.46-11.93-4.46-23.85 0-11.92 4.46-23.85 4.46-11.92 14.15-21.61l305.7-305.69q8.84-8.85 21.27-8.73 12.42.11 21.26 8.96 8.85 8.84 8.85 21.15 0 12.31-8.85 21.15L112.77-480Z"/></svg>
    </button>
    <button class="icon-btn cart-btn" aria-label="Lunchbox">
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
    </button>
  </section>
  <h1 class="header-title">
    Checkout
  </h1>
  <section class="pickup-section">
    <p>Pickup at 11 N 33rd St Philadelphia, PA 19104</p>
    <div class="option-btn-group">
        <button class="option--selected">3:30 PM</button>
        <button class="option-btn">3:40 PM</button>
        <button class="option-btn">3:50 PM</button>
        <button class="option-btn">4:00 PM</button>
        <button class="option-btn">4:10 PM</button>
    </div>
  </section>
</header>

<main class="container" style="margin-bottom: 48px; margin-top: 0;">
    <section class="empty-cart-section" style="display: none;">
        <h4 class="cart-empty-message" style="text-align: center;">
            Nothing here yet.
        </h4>
        <p class="cart-empty-submessage" style="text-align: center; margin-bottom: 36px;">
            Add something delicious to your lunchbox and we'll get cooking!
        </p>
    </section>

    <section class="cart-section">
    </section>

    <?php include 'includes/divider.php'; ?>
    <section class="tip-section" style="margin-top: 32px;">
        <h4 class="cart-empty-message" style="text-align: center;">
            Leave a tip?
        </h4>
        <div class="option-btn-group" style="text-align: center; justify-content: center; margin-bottom: 32px;">
        <button class="option-btn" style="color: var(--black); border-color: var(--black);">10%</button>
        <button class="option-btn" style="color: var(--black); border-color: var(--black);">15%</button>
        <button class="option-btn" style="color: var(--black); border-color: var(--black);">20%</button>
        <button class="option-btn" style="color: var(--black); border-color: var(--black);">Custom</button>
    </div>

    </section>
    <?php include 'includes/divider.php'; ?>
    <section class="total-section">
        <div class="total-details">
            <p>Subtotal</p>
            <p class="subtotal-amount">$0.00</p>
        </div>

        <div class="total-details">
            <p>Tax</p>
            <p class="tax-amount">$0.00</p>
        </div>

        <div class="total-details">
            <p>Tip</p>
            <p class="tip-amount">$0.00</p>
        </div>

        <div class="total-details">
            <h4>Total</h4>
            <span class="price total-amount">$0.00</span>
        </div>
    </section>
</main>

<?php $current_page = basename($_SERVER['PHP_SELF']); ?>

<section class="wide-btn-wrapper" style="position: relative; ">
    <a class="primary-btn--checkout-btn--active center">
        Order with Credit Card
    </a>
    <a href="#" class="primary-btn--checkout-btn--active apple-pay-btn center" style="background-color: var(--black); color: var(--white);"> Buy with
        <svg width="58" height="24" viewBox="0 0 58 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_2487_941)">
            <path d="M10.5976 3.08281C9.91791 3.89039 8.83018 4.52758 7.74257 4.43647C7.60663 3.34453 8.13905 2.18411 8.76221 1.46741C9.4419 0.637081 10.6316 0.0454976 11.5946 0C11.7079 1.13755 11.266 2.25236 10.5976 3.08281ZM11.5834 4.6527C10.0085 4.56171 8.66037 5.55128 7.9126 5.55128C7.15362 5.55128 6.00925 4.6982 4.76305 4.72095C3.14301 4.7437 1.63614 5.66502 0.809077 7.13255C-0.890368 10.0675 0.36728 14.4131 2.00997 16.8019C2.81438 17.985 3.77739 19.2818 5.04625 19.2363C6.24726 19.1908 6.72304 18.4514 8.17326 18.4514C9.63471 18.4514 10.054 19.2363 11.3228 19.2135C12.637 19.1908 13.4641 18.0306 14.2685 16.8474C15.1861 15.5051 15.56 14.1969 15.5827 14.1286C15.56 14.1059 13.0449 13.139 13.0223 10.2267C12.9996 7.79238 15.0049 6.63208 15.0955 6.56383C13.9625 4.88019 12.1952 4.6982 11.5834 4.6527ZM20.681 1.35367V19.0885H23.4226V13.0253H27.218C30.6847 13.0253 33.1206 10.6364 33.1206 7.17816C33.1206 3.72 30.7301 1.35378 27.3086 1.35378L20.681 1.35367ZM23.4226 3.67439H26.5835C28.9628 3.67439 30.3222 4.94844 30.3222 7.18942C30.3222 9.43041 28.9628 10.7159 26.5722 10.7159H23.4226V3.67439ZM38.1281 19.2249C39.8502 19.2249 41.4476 18.3491 42.1727 16.9612H42.2293V19.0884H44.7672V10.2609C44.7672 7.70138 42.7279 6.05187 39.5896 6.05187C36.6779 6.05187 34.5253 7.72413 34.446 10.022H36.9159C37.1198 8.92993 38.128 8.21323 39.5103 8.21323C41.187 8.21323 42.1274 8.99818 42.1274 10.443V11.4212L38.7058 11.6259C35.5223 11.8193 33.8003 13.1275 33.8003 15.4028C33.8003 17.7006 35.5789 19.2249 38.1281 19.2249ZM38.8644 17.1204C37.4031 17.1204 36.474 16.4152 36.474 15.3344C36.474 14.2197 37.369 13.5713 39.0798 13.4689L42.1274 13.2755V14.2765C42.1274 15.9374 40.7226 17.1204 38.8646 17.1204M48.1548 23.9117C50.8285 23.9117 52.0861 22.888 53.185 19.7824L57.9999 6.22248H55.2129L51.984 16.6994H51.9274L48.6985 6.22248H45.8321L50.4771 19.1339L50.2279 19.9189C49.8088 21.2498 49.129 21.7617 47.9167 21.7617C47.7015 21.7617 47.2824 21.739 47.1123 21.7162V23.8435C47.2709 23.889 47.9506 23.9117 48.1546 23.9117" fill="currentColor"/>
        </g>
        <defs>
            <clipPath id="clip0_2487_941">
                <rect width="58" height="24" fill="white"/>
            </clipPath>
        </defs>
    </svg>
    </a>
    <a class="primary-btn--checkout-btn--active center" style="background-color: var(--highlight-2);">
        <svg width="70" height="14" viewBox="0 0 70 14" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M63.5017 9.89625C62.7229 9.89625 62.3904 9.16417 62.3933 7.98583C62.3933 6.43125 62.7463 3.39208 64.47 3.39208C65.2487 3.39208 65.5113 4.10084 65.5113 5.13625C65.5113 6.69084 65.1321 9.89625 63.5017 9.89625ZM64.9658 0.0466661C60.0746 0.0466661 57.9512 3.79458 57.9512 7.79917C57.9512 10.8383 59.1792 13.265 62.8892 13.265C67.8971 13.265 70 9.16417 70 5.20625C70 2.21667 68.6525 0.0466661 64.9658 0.0466661ZM53.7863 0.0466661C52.1588 0.0466661 50.9746 0.5425 49.7233 1.43792C49.2742 0.635833 48.3758 0.0466661 47.005 0.0466661C45.4242 0.0466661 44.2429 0.685417 43.3679 1.32125L43.2513 0.259583H39.4917L37.485 12.9587H41.8775L43.2746 4.05417C43.6508 3.86458 44.2167 3.605 44.7854 3.605C45.2083 3.605 45.5642 3.74792 45.5642 4.38375C45.5642 4.54708 45.5175 4.80667 45.4942 5.01958L44.2429 12.9587H48.6121L50.0063 4.05417C50.4088 3.84125 50.9513 3.605 51.4938 3.605C51.9196 3.605 52.2754 3.74792 52.2754 4.38375C52.2754 4.54708 52.2258 4.80667 52.2025 5.01958L50.9513 12.9587H55.3233L56.6679 4.47708C56.7408 4.03083 56.8108 3.34542 56.8108 2.87583C56.8108 1.17833 56.0321 0.0466661 53.7863 0.0466661ZM33.7458 0.0466661C32.0687 0.0466661 30.8875 0.685417 29.9921 1.27458L29.9425 0.259583H26.1392L24.1296 12.9587H28.525L29.9192 4.05417C30.2983 3.86458 30.8642 3.605 31.43 3.605C31.8588 3.605 32.2117 3.74792 32.2117 4.31084C32.2117 4.54709 32.1417 4.97292 32.1183 5.18292L30.8875 12.9587H35.2596L36.6071 4.47708C36.6771 4.03083 36.75 3.34542 36.75 2.87583C36.75 1.17833 35.9683 0.0466661 33.7458 0.0466661ZM17.3221 5.39583C17.4417 3.98125 18.5267 2.9925 19.355 2.9925C19.8275 2.9925 20.2271 3.27542 20.2271 3.84125C20.2271 5.01958 18.1475 5.39583 17.3221 5.39583ZM19.7808 0.0466661C15.1025 0.0466661 12.8333 4.10083 12.8333 7.91583C12.8333 10.8617 14.2275 13.2154 18.1242 13.2154C19.6613 13.2154 21.245 12.8858 22.26 12.3929L22.8025 8.71792C21.3617 9.44708 20.2533 9.73 19.0954 9.73C18.0308 9.73 17.2288 9.16417 17.2288 7.72625C19.6379 7.70292 23.7971 6.71417 23.7971 3.48833C23.7971 1.48458 22.3563 0.0466661 19.7808 0.0466661ZM7.41708 0.825417C7.67667 1.36792 7.84292 2.02708 7.84292 2.9925C7.84292 4.76 6.59167 7.35 5.57667 9.00083L4.48875 0.282917L0 0.70875L2.05625 12.9587H7.18083C9.42667 10.0129 12.1917 5.81875 12.1917 2.59292C12.1917 1.58083 11.9788 0.77875 11.5063 0L7.41708 0.825417Z" fill="white"/>
    </svg>
    </a>
</section>

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

<div id="apple-pay-container" style="display: none;">
    <div id="apple-pay-overlay"></div>
    <div id="apple-pay-popup">
        <img src="app-images/misc/apple-pay-popup.png" alt="Apple Pay">
    </div>
</div>

<script src="js/item-page.js"></script>
<script src="js/checkout.js"></script>
</body>
</html>