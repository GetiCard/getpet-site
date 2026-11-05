<?php
$title = 'Getpet — A identidade digital do seu pet | Tag com NFC e QR Code';
$description = 'Tag com NFC e QR Code para a coleira: quem encontrar seu pet aproxima o celular e fala com você na hora. Perfil do pet, prontuário de saúde e acesso para o veterinário em um só app.';
$base = rtrim($config['site_url'], '/');
$ogImage = ($base !== '' ? $base . '/' : '') . 'assets/img/og-image.jpg';
?>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($description) ?>">
<meta name="theme-color" content="#FFF9E6">

<meta property="og:type" content="website">
<meta property="og:locale" content="pt_BR">
<meta property="og:site_name" content="Getpet">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($description) ?>">
<meta property="og:image" content="<?= e($ogImage) ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<?php if ($base !== ''): ?>
<meta property="og:url" content="<?= e($base . '/') ?>">
<link rel="canonical" href="<?= e($base . '/') ?>">
<?php endif; ?>
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" type="image/png" href="assets/img/favicon.png">
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fredoka:wght@500;600;700&family=Nunito:wght@600;700;800;900&display=swap">
<link rel="stylesheet" href="assets/css/style.css">
</head>
