<?php
declare(strict_types=1);

$root = dirname(__DIR__);
ob_start();
include $root . '/index.php';
$html = (string) ob_get_clean();
$c = require $root . '/config.php';

$failures = 0;
function check(string $name, bool $ok): void
{
    global $failures;
    echo ($ok ? 'PASS' : 'FAIL') . "  $name\n";
    if (!$ok) {
        $failures++;
    }
}

// Estrutura base
check('exatamente um <h1>', substr_count($html, '<h1') === 1);
check('lang pt-BR', str_contains($html, 'lang="pt-BR"'));
check('meta og:image', str_contains($html, 'og:image'));
check('link do WhatsApp comercial', str_contains($html, 'https://wa.me/5598983471218?text='));
check('link Entrar no app', str_contains($html, 'href="https://getpet.digital/login"'));

preg_match_all('/<a\b[^>]*target="_blank"[^>]*>/', $html, $blank);
$missingRel = array_filter($blank[0], fn ($tag) => !str_contains($tag, 'rel="noopener"'));
check('todo target=_blank tem rel=noopener (' . count($blank[0]) . ' links)', count($blank[0]) > 0 && $missingRel === []);

check('rodapé cita Geti Company e Getcard', str_contains($html, 'Geti Company') && str_contains($html, 'Getcard'));
check('barra fixa de CTA no mobile', str_contains($html, 'data-sticky-cta'));
check('menu mobile com aria-expanded', str_contains($html, 'data-menu-toggle') && str_contains($html, 'aria-expanded="false"'));

// Âncoras do menu apontam para seções existentes
foreach (['como-funciona', 'cartao', 'saude', 'modelos', 'duvidas'] as $id) {
    check("menu aponta para #$id", str_contains($html, 'href="#' . $id . '"'));
}

// Task 4 — hero, como funciona, cartão, pet perdido
preg_match('/<h1[^>]*>(.*?)<\/h1>/s', $html, $h1);
$h1Text = trim(preg_replace('/\s+/', ' ', strip_tags($h1[1] ?? '')));
check('h1 do hero', $h1Text === 'Se ele se perder, o caminho de volta está na coleira.');
foreach (['como-funciona', 'cartao'] as $id) {
    check("seção #$id existe", preg_match('/<section[^>]*id="' . $id . '"/', $html) === 1);
}
check('cartaz PROCURA-SE', str_contains($html, 'PROCURA-SE'));
check('sem âncoras provisórias', !str_contains($html, '<span id="'));

echo $failures === 0 ? "\nOK\n" : "\n$failures falha(s)\n";
exit($failures === 0 ? 0 : 1);
