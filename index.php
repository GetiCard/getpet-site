<?php
declare(strict_types=1);

require __DIR__ . '/lib/helpers.php';
$config = require __DIR__ . '/config.php';

// Link padrão do WhatsApp (CTA "Quero minha tag").
$wa = wa_link($config['whatsapp'], $config['wa_message']);

$sections = [
    'hero',
    'how-it-works',
    'pet-card',
    'lost-pet',
    'health',
    'vet',
    'models',
    'faq',
    'final-cta',
];
?>
<!doctype html>
<html lang="pt-BR">
<?php include __DIR__ . '/partials/head.php'; ?>
<body>
<a class="skip-link" href="#conteudo">Pular para o conteúdo</a>
<?php include __DIR__ . '/partials/header.php'; ?>
<main id="conteudo">
<?php foreach ($sections as $section) {
    $file = __DIR__ . '/partials/' . $section . '.php';
    if (is_file($file)) { // TEMP: removido na Task 5, quando todas as seções existirem
        include $file;
    }
} ?>
</main>
<?php include __DIR__ . '/partials/footer.php'; ?>
</body>
</html>
