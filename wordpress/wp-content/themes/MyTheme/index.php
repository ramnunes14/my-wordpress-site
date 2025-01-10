<?php
session_start();
if($_REQUEST==null){
    require 'header.php';
    echo "<body style='background-color:#122f51'>";


echo '<div class="centered" style="font-size:40px; position: absolute; top:50%; left: 50%; transform: translate(-50%, -50%); color:white; padding: 20px;">
		<form  method="POST">';
echo"
			<label style='font-size:50px;position: absolute; left: 6%;top:2%;'>Procurar por KeyName</label><br>
			<label style='font-size:20px;position: absolute; left: 7%;'>all | goals | assists | cards | player | minutes | names | rank</label><br>
			<input style='padding:10px;font-size:25px;height: 50px;width: 495px;' name='player' placeholder='Nome do Player'></input><br></br>
			<button style='padding:10px;background-color:white;color:#122f51;border-radius:10px;height: 50px;width: 498px;position: absolute;top:70%;left:4%' type='submit'>Submit</button>
		</form>
	</div>";
}
echo"</body>";
        
?>
