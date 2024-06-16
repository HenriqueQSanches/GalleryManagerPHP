<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Videos</title>
</head>
<body class="bg">

<nav class="navbar">
    <ul>
        <li><a href="index.php" aria-label="Início"><svg class="svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5"/>
        </svg>&nbsp;<span>INÍCIO</span></a></li>
        <li><a href="view.php" aria-label="Visualizar"><svg class="svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
        </svg>&nbsp;<span>GALERIA IMAGENS</span></a></li>
        <li><a href="view2.php" aria-label="Visualizar"><svg class="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels-fill" viewBox="0 0 16 16">
  <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M9 6a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
  <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2z"/>
</svg>&nbsp;<span>GALERIA VIDEOS</span></a></li>
        <li><a href="upload.php" aria-label="Upload"><svg class="svg" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 0a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 4.095 0 5.555 0 7.318 0 9.366 1.708 11 3.781 11H7.5V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11h4.188C14.502 11 16 9.57 16 7.773c0-1.636-1.242-2.969-2.834-3.194C12.923 1.999 10.69 0 8 0m-.5 14.5V11h1v3.5a.5.5 0 0 1-1 0"/>
        </svg>&nbsp;<span>UPLOAD</span></a></li>
    </ul>
</nav>

<h1 class="title">Galeria Videos</h1>

<section class="secao2">
  <header>
    <h2>O que já foi postado:</h2>
    <p class="title2">Para visualizar o vídeo você precisa baixa-lo clicando na opção do próprio vídeo.</p>
  </header>

<?php

$diretorioVideos = "videos/";

$arquivosVideos = scandir($diretorioVideos);

foreach ($arquivosVideos as $arquivo) {
  if (in_array($arquivo, array('.', '..'))) continue;

  // Verificar se o arquivo é um vídeo
  $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
  if (!in_array($extensao, array('mp4', 'webm', 'ogg'))) continue;

  $nomeVideo = pathinfo($arquivo, PATHINFO_FILENAME);

  $caminhoVideo = $diretorioVideos . $arquivo;

  // Abrir arquivo de descrição
  $arquivoDescricao = $diretorioVideos . $nomeVideo . ".mp4.txt";
  if (file_exists($arquivoDescricao)) {
    $descricaoVideo = file_get_contents($arquivoDescricao);
  } else {
    $descricaoVideo = "Descrição abaixo";
  }

  // Exibir o vídeo e sua descrição
  echo "<hr>";
  echo "<div class='item-postado'>";
  echo "<video controls width='400' height='400'>";
  echo "<source src='" . $caminhoVideo . "' type='video/" . $extensao . "'>";
  echo "Seu navegador não suporta a tag de vídeo.";
  echo "</video>";
  echo "<h3>" . "Descrição:" . "<br>" . ($descricaoVideo) . "</h3>";
  echo "</div>";
}

?>
</section>

</body>
</html>