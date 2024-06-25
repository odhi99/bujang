    <!-- HEADER -->
    <header class="header">
        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo">BuJang <i class="fas fa-mug-hot"></i></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#menu">menu</a>
        </nav>

        <div class="actions">
            <?= (isset($_SESSION['id']) && $_SESSION['id'] != '') ? '<a class="btn" href="logout.php">Logout</a>' : '<a class="btn" href="login.php">Masuk</a>' ?>
        </div>


    </header>