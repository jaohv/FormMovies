<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST['nome']) || empty($_POST['mes_ano']) || empty($_POST['idade']) || empty($_POST['genero'])) {
        echo "Por favor, preencha todos os campos obrigatórios!";
    } else {
        $file = fopen('filmes.csv', 'a');

        $data = array(
            $_POST['nome'],
            $_POST['mes_ano'],
            $_POST['legendado'],
            $_POST['idade'],
            implode(', ', $_POST['genero']),
            ''
        );
        fputcsv($file, $data);

        fclose($file);

		$file = fopen('filmes.csv', 'r');

		echo '<table>';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Nome</th>';
		echo '<th>Ano</th>';
		echo '<th>Legendado</th>';
		echo '<th>Idade</th>';
		echo '<th>Gênero</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';

		while(($data = fgetcsv($file)) !== FALSE) {
			echo '<tr>';
			echo '<td>' . $data[0] . '</td>';
			echo '<td>' . $data[1] . '</td>';
			echo '<td>' . $data[2] . '</td>';
			echo '<td>' . $data[3] . '</td>';
			echo '<td>' . $data[4] . '</td>';
			echo '</tr>';
		}

		echo '</tbody>';
		echo '</table>';
		fclose($file);
			}
		}
?>
