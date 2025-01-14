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
echo"<h1 style='font-size:30px; position: absolute; font:Anton; top:3%; left: 9%; transform: translate(-50%, -50%); color:white; padding: 20px;color:#122f51'>Estatistica Futebol</h1>";
echo "<div style='text-decoration: none;padding:30px;background-color:#f7f4e8;border-radius:10px;text-align: center;color:#122f51'>
<a href='?' style='text-decoration: none;padding:10px;font-size:20px;'>Home</a>
<a href='?view=players' style='text-decoration: none;padding:10px;font-size:20px;'>Players</a>
<a href='?API=true' style='text-decoration: none;padding:10px;font-size:20px;'>API Details</a>
<a href='?estado=like' style='text-decoration: none;padding:10px;font-size:20px;'>Likes</a>
";

echo "
</div>";
?>