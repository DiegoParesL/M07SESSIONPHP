<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pagina 3</title>
</head>
<body>
	<h1>ENDEVINA EL NOMBRE</h1>
		<?php
			session_start();
            //save numbers that we try, and save trys
			function formulari() {
				echo "<form method='POST'>";
				echo "<input type='number' name='endevina'>";
				echo "<input type='submit' value='ENDEVINA'>";
				echo "</form>";
			}
            
            if(!isset($numbers) ){
                $_SESSION['trys'] = 0 ;
                $numbers =array();
                $_SESSION['number']= 'numbers: ';
                $num = '';
            } else{
                
                if(isset($_SESSION['number'])){
                    $num ='';
                    foreach ( $numbers as $number ) {
                        if($number != 'numbers: ')
                            $num .= $number . ",";
                        }
                    }
                $_SESSION['trys'] += 1;
                
            }
            
            
            
            echo "<p>Intents: ". $_SESSION['trys']."</p>";
            if (empty($numbers)) {
                
                echo "<p>numbers:</p>";
            }else{
                echo "<p>numbers: ".$num."</p>";
                $_SESSION['number'] = $_POST['endevina'];
            }
			if (!isset($_POST['endevina'])) {
				formulari();
			} else {
				if ($_POST['endevina']===$_SESSION['ocult']) {
					echo "<h3>Felicitats</h3>";
					echo "<a href='ex41pagina1.php'>TORNAR A L'INICI</a>";
                    unset($_SESSION['trys']);
                    unset($_SESSION['number']);
				} elseif ($_POST['endevina']<$_SESSION['ocult']) {
					echo "<h3>El número que esteu buscant és major</h3>";
					formulari();
				} elseif ($_POST['endevina']>$_SESSION['ocult']) {
					echo "<h3>El número que esteu buscant és menor</h3>";
					formulari();
				}
			}
            array_push($numbers,$_SESSION['number']);
		?>
</body>
</html>