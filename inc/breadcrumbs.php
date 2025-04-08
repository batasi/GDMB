<ol class="breadcrumb">
    <?php
    if (isset($p)) {
        // Clean the path
        $p_cleaned = str_replace('auth/la/', '', $p);
        $breadcrumbs = explode("/", strtolower($p_cleaned)); // change to "/" if you're using path-like pages

        // First breadcrumb: Home
        echo '<li><a href="./?p=home">Home</a></li>';

        $url = "#";
        foreach ($breadcrumbs as $index => $crumb) {
            $crumb = ucfirst($crumb);
            $url .= ($index > 0 ? '/' : '') . urlencode(strtolower($crumb));

            // Last item is active (not a link)
            if ($index == count($breadcrumbs) - 1) {
                echo '<li class="active">' . $crumb . '</li>';
            } else {
                echo '<li><a href="' . $url . '">' . $crumb . '</a></li>';
            }
        }
    }
    ?>
</ol>
