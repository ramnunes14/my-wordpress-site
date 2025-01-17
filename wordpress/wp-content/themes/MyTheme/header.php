<?php
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<!DOCTYPE html><html>';
 echo '<head>
 <title>&raquo; '.is_front_page() ? bloginfo('description') : wp_title('').'</title>
 <meta charset="'.bloginfo( 'charset' ).'">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="'.bloginfo('stylesheet_url').'">'.
 wp_head().'
</head>';
echo"<h1 style='font-size:30px; position: absolute; font:Anton; top:3.9%; left: 12%; transform: translate(-50%, -50%); color:white; padding: 20px;color:#122f51'>Estatistica Futebol</h1>";
echo "<div style='text-decoration: none;padding:30px;background-color:#f7f4e8;border-radius:10px;text-align: center;color:#122f51'>
<a href='?' style='text-decoration: none;padding:10px;font-size:20px;'>Home</a>
<a href='?view=players' style='text-decoration: none;padding:10px;font-size:20px;'>Players</a>
<a href='?API=true' style='text-decoration: none;padding:10px;font-size:20px;'>API Details</a>
<a href='?view=matches' style='text-decoration: none;padding:10px;font-size:20px;'>Matches</a>
";
if(is_user_logged_in()){
    echo  "<a href='?estado=like' style='text-decoration: none;padding:10px;font-size:20px;'>Likes</a>
";
}
if (is_user_logged_in()) {
    // Botão de Logout
    echo '<svg width="100" height="100" style="position: absolute; top:11.3%; left: 98%; transform: translate(-50%, -50%);"><a href="/wp-admin/options-general.php">
        <circle cx="20" cy="20" r="20" fill="black"/>
        <a></svg>';
    $logout_url = wp_logout_url(home_url());
    echo '<a href="' . esc_url($logout_url) . '" style="font-size:20px;text-decoration: none; position: absolute; font:Anton; top:7%; left: 92%; transform: translate(-50%, -50%);">Logout</a>';
} else {
    // Botão de Login
    $login_url = wp_login_url(home_url());
    echo '<a href="' . esc_url($login_url) . '" style="font-size:20px;text-decoration: none; position: absolute; font:Anton; top:7%; left: 95%; transform: translate(-50%, -50%);">Login</a>';
}


echo "
</div>";

?>

