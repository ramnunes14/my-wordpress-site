<?php

echo "<h1 style='font-size:40px;color:white;'>Iniciar Sessao</h1>";
echo "<form method='POST'>";
echo "
<label style='color:white'>Nome</label></br>
<input style='padding:10px;' name='username' placeholder='Ex: ramnunes14'></br></br>
<label style='color:white'>Palavra-Passe</label></br>
<input style='padding:10px;' name='passe' placeholder='Ex: 12345678'></br></br>
<button style='width:207px;height:50px;' type='submit'>Iniciar Sessao</button>
";
echo "</form>";




if(isset($_POST['username'])){

    $sql = "SELECT id FROM usuario WHERE nome = '" . mysqli_real_escape_string($conn, $_POST['username']) . "'";


    $result = mysqli_query($conn, $sql);


    if ($result === false) {
        
        die('Error in query: ' . mysqli_error($conn));
    }


    if (mysqli_num_rows($result) == 0) 
    {
        echo "<span style='color:white'>Nao Existe Nenhum Usuario</span>";
    } 
    else 
    {
        $_SESSION['log']=true;
    }
}
?>

