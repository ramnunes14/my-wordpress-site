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
<a href='?' style='text-decoration: none;padding:10px;font-size:20px;'>Home</a>";
if(is_user_logged_in()){
    echo "

<a href='?view=players' style='text-decoration: none;padding:10px;font-size:20px;'>Players</a>

<a href='?view=matches' style='text-decoration: none;padding:10px;font-size:20px;'>Matches</a>
";

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

