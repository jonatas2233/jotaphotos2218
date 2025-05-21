<?php
$dir = '/images_clientes'; // Pasta onde as imagens estão armazenadas
$images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
$cliente = 'João da Silva'; // Nome do cliente
$images_per_page = 50; // Número de imagens por página
$total_images = count($images);
$total_pages = ceil($total_images / $images_per_page);
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $images_per_page;
$images_paginated = array_slice($images, $start, $images_per_page);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Fotos - <?php echo htmlspecialchars($cliente); ?></title>
    <link rel="stylesheet" href="cliente.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
</head>
<body>
    <header class="header">
        <h1 class="cliente-nome"> <?php echo htmlspecialchars($cliente); ?> </h1>
        <button class="btn-voltar" onclick="window.history.back();">Voltar</button>
    </header>
    
    <div class="gallery-container">
        <?php if (!empty($images_paginated)) : ?>
            <?php foreach ($images_paginated as $image) : ?>
                <div class="gallery-item">
                    <a href="<?php echo htmlspecialchars($image); ?>" data-lightbox="galeria" data-title="Foto da Galeria">
                        <img src="<?php echo htmlspecialchars($image); ?>" alt="Foto da Galeria">
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Nenhuma imagem encontrada.</p>
        <?php endif; ?>
    </div>
    
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="?page=<?php echo $page - 1; ?>" class="prev">&#9665; Anterior</a>
        <?php endif; ?>
        <span>Página <?php echo $page; ?> de <?php echo $total_pages; ?></span>
        <?php if ($page < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>" class="next">Próxima &#9655;</a>
        <?php endif; ?>
    </div>
</body>
</html>




