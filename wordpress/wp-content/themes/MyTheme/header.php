<?php
echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '<!DOCTYPE html><html>';
 echo '<head>
 <title>&raquo; '.is_front_page() ? bloginfo('description') : wp_title('').'</title>
 <meta charset="'.bloginfo( 'charset' ).'">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="'.bloginfo('stylesheet_url').'">'.
 wp_head().'
</head>';

echo "<div style='text-decoration: none;padding:30px;background-color:#f7f4e8;border-radius:10px;text-align: center;color:#122f51'>
<span style='font-size:30px; position: absolute;left: 12%;color:white;color:#122f51'>Estatistica Futebol</span>
<a href='/wp-content/plugins/estatistica/parts/home.php' style='text-decoration: none;padding:10px;font-size:20px;'>Home</a>";
if(is_user_logged_in()){
    echo "<a href='" . admin_url('admin.php?page=players') . "' style='text-decoration: none;padding:10px;font-size:20px;'>Players</a>";
    echo "<a href='" . admin_url('admin.php?page=matches') . "' style='text-decoration: none;padding:10px;font-size:20px;'>Today Matches</a>";
    echo "<a href='" . admin_url('admin.php?page=leagues') . "' style='text-decoration: none;padding:10px;font-size:20px;'>Leagues</a>";
    

    echo  "<a href='?estado=like' style='text-decoration: none;padding:10px;font-size:20px;'>Likes</a>
";
}
if (is_user_logged_in()) {
    $logout_url = wp_logout_url(home_url());
    echo '<a href="' . esc_url($logout_url). '" style="font-size:20px;color:red;text-decoration: none; position: absolute; left: 94%;">Logout</a>';
} 
else {
    $login_url = wp_login_url(home_url());
    echo '<a href="' . esc_url($login_url) . '" style="font-size:20px;text-decoration: none; position: absolute;  left: 95%;">Login</a>';
}
if (is_user_logged_in()) {
echo "<a href='?API=true' style='text-decoration: none;padding:10px;font-size:20px;'>API Details</a>";
}
echo "
</div>";

?>

