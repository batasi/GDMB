<?php 
    date_default_timezone_set('Africa/Nairobi');

    // require_once 'initialize.php';
    // require_once 'essentials.php';
    require_once 'inc/header.php';
    $p = isset($_GET['p']) ? $_GET['p'] : 'home'; 
?>
<body class="skin-orange">
		  
     <!-- preloader area start -->
   
        <?php
        //  require_once 'inc/sidebar.php';
         require_once 'inc/topnavbar.php';
         if (!file_exists($p . ".php") && !is_dir($p)) {
            include '404.html';
         } else {
            if (is_dir($p))
                include $p . '/index.php';
            else
                include $p . '.php';
         }
         require_once 'inc/footer.php';
        ?>
    <?php
        // require_once 'inc/modal.php';  
        require_once 'inc/script.php'; 

    ?>
    
  </body>
</html>