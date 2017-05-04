<div class="navwrap">
    <div id="nav">
        <a href="index.php" id="logo">
            <p>Inyoung Hong</p>
        </a>
        <div class="menuwrap">
            <!-- Hidden portion -->
            <div class="menu_icon" id="menu_icon" onclick="
            toggleMenu()">Menu <img src="http://www.simplydevio.us/images/menu.png" alt="menu"></div>
            <!-- Menu links -->
            <div class="menulinks">
                <?php
                $menu_links = array(
                    'About' => 'about.php',
                    'Projects' => 'projects.php',
                    'Artwork' => 'art.php',
                    'Contact' => 'contact.php',
                );
                // Writes the html for each page link
                foreach ($menu_links as $name => $link){
                    echo "<a href='$link'>$name</a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

