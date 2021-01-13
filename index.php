<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Emails</title>
	</head>
	<body>
		<p>Choose an email below to run the compiler.  This will preview the result and create a final.html file.</p>
		<ul>
			<?php

				$dirs = array_filter(glob(__DIR__.'/emails/*'), 'is_dir');
				foreach ($dirs as $dir) {
					$url_query = [
						'dir' => $dir,
						'uri' => str_replace(__DIR__, '', $dir),
						'markup' => $dir.'/markup.php',
						'final' => $dir.'/final.html',
					];
					echo '<li><a href="/compile.php?'.http_build_query($url_query).'">'.basename($dir).'</a></li>';
				}

			?>
		</ul>
	</body>
</html>