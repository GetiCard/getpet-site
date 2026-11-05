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
// Topo com a marca primeiro: h1 = Getpet + o que é; a frase emocional vem depois
preg_match('/<h1[^>]*>(.*?)<\/h1>/s', $html, $h1);
preg_match('/<span class="sr-only">([^<]*)<\/span>/', $h1[1] ?? '', $srName);
check('h1 traz o nome Getpet para leitores de tela', trim($srName[1] ?? '') === 'Getpet:');
check('h1 nomeia a categoria vendida (Taste: copy-headline)', str_contains($h1[1] ?? '', 'Tag de identificação com NFC e QR Code para cães e gatos'));
check('primeira tela traz um fato com número (Taste: copy-fact)', str_contains($html, '3 modelos de tag'));
preg_match_all('/<h2[^>]*>(.*?)<\/h2>/s', $html, $h2s);
$h2Text = array_map(fn ($h) => trim(preg_replace('/\s+/', ' ', strip_tags($h))), $h2s[1]);
foreach (['Como a tag funciona, em 3 passos', 'O cartão que aparece para quem encontra seu pet', 'Cartaz de pet perdido pronto em um toque', 'Prontuário de saúde do pet no app', 'Acesso do veterinário ao prontuário, pelo tempo que você escolher', 'Três modelos de tag Getpet', 'Perguntas frequentes', 'A tag Getpet chega em breve'] as $title) {
    check("título de seção nomeia a coisa: $title", in_array($title, $h2Text, true));
}
check('letras do wordmark escondidas de leitores de tela', preg_match('/<span class="wordmark"[^>]*aria-hidden="true"/', $h1[1] ?? '') === 1);
check('mascote do logo acima do título', strpos($html, 'logo-mascot.webp') !== false && strpos($html, 'logo-mascot.webp') < strpos($html, '<h1'));
$tagPos = strpos($html, 'Se ele se perder, o caminho de volta está na');
check('frase "Se ele se perder" vem depois do h1', $tagPos !== false && $tagPos > strpos($html, '</h1>'));

// Cartão do pet: o visitante liga/desliga o que aparece
preg_match_all('/<button[^>]*role="switch"[^>]*aria-checked="true"[^>]*data-toggle="([a-z]+)"/', $html, $switches);
check('4 interruptores no cartão do pet', count($switches[1]) === 4);
foreach ($switches[1] as $field) {
    check("interruptor $field controla um campo do mockup", str_contains($html, 'data-field="' . $field . '"'));
}
foreach (['como-funciona', 'cartao'] as $id) {
    check("seção #$id existe", preg_match('/<section[^>]*id="' . $id . '"/', $html) === 1);
}
check('cartaz PROCURA-SE', str_contains($html, 'PROCURA-SE'));
check('sem âncoras provisórias', !str_contains($html, '<span id="'));

// Task 5 — saúde, vet, modelos, dúvidas, CTA final
foreach (['saude', 'veterinario', 'modelos', 'duvidas', 'cta-final'] as $id) {
    check("seção #$id existe", preg_match('/<section[^>]*id="' . $id . '"/', $html) === 1);
}
foreach ($c['models'] as $m) {
    check("botão do modelo {$m['id']} com mensagem própria", str_contains($html, e(wa_link($c['whatsapp'], $m['message']))));
}
check('modelo Localização com selo Mais completo', str_contains($html, 'Mais completo'));
check('6 perguntas no FAQ', substr_count($html, 'class="faq__item"') === 6);
check('"Em breve" nos 3 modelos', substr_count($html, 'Em breve') === 3);
check('nenhum preço exibido', !str_contains($html, 'R$'));
check('index sem guarda provisória', !str_contains((string) file_get_contents($root . '/index.php'), 'TEMP'));

// Fallback: sem número de WhatsApp, os botões rolam até #modelos na mesma aba
function render_with(array $config): string
{
    ob_start();
    include dirname(__DIR__) . '/index.php';
    return (string) ob_get_clean();
}
$empty = $c;
$empty['whatsapp'] = '';
$emptyHtml = render_with($empty);
check('sem número: nenhum link #modelos abre nova aba', preg_match('/href="#modelos"[^>]*target="_blank"/', $emptyHtml) === 0);
check('sem número: botões apontam para #modelos', substr_count($emptyHtml, 'href="#modelos"') >= 5);

// Ajustes menores
$noBadge = $c;
unset($noBadge['models'][0]['badge']);
set_error_handler(function (int $no, string $msg) { throw new ErrorException($msg); });
try {
    $ok = str_contains(render_with($noBadge), 'GetPet Basic');
} catch (Throwable $t) {
    $ok = false;
}
restore_error_handler();
check('modelo sem chave badge não gera aviso', $ok);

$_SERVER['HTTP_HOST'] = 'getpet.test:8000';
$hostHtml = render_with($c);
unset($_SERVER['HTTP_HOST']);
check('og:image absoluto quando site_url está vazio', str_contains($hostHtml, 'content="http://getpet.test:8000/assets/img/og-image.jpg"'));

foreach ($c['models'] as $m) {
    check("botão Quero este com nome do modelo {$m['id']} para leitor de tela", str_contains($html, 'Quero este<span class="sr-only"> ' . e($m['name']) . '</span>'));
}
check('linha do tempo sem <time> inválido', !str_contains($html, '<time>'));

$at = $c;
$at['instagram'] = '@geticompany';
$atHtml = render_with($at);
check('instagram com @ não duplica', !str_contains($atHtml, '@@') && str_contains($atHtml, 'instagram.com/geticompany"'));

// Revisão com Impeccable + Animate + taste skill
check('sem rótulo (pill) acima dos títulos', substr_count($html, 'class="pill') === 0);
check('sem reveal genérico de rolagem', preg_match('/class="[^"]*\breveal\b/', $html) === 0);
$heroHtml = substr($html, strpos($html, '<section class="hero"'), strpos($html, '</section>', strpos($html, '<section class="hero"')) - strpos($html, '<section class="hero"'));
check('hero usa a foto real da tag', str_contains($heroHtml, 'assets/img/tags/tag-hero.webp'));
check('hero começa com o celular bloqueado pedindo a tag', str_contains($heroHtml, 'phone__lock') && str_contains($heroHtml, 'Aproxime a tag'));
foreach (['basic', 'nfc', 'location'] as $id) {
    check("modelo $id com foto real da tag", str_contains($html, 'assets/img/tags/tag-' . $id . '.webp'));
}
check('Saúde mostrada como tela do app', str_contains($html, 'class="health-app') && !str_contains($html, 'health-grid'));
foreach (['💬', '👆', '🚨'] as $emoji) {
    check("sem emoji $emoji no lugar de ícone", !str_contains($html, $emoji));
}

// Dicas do usuário + Taste Skill
check('mascote em círculo completo (311x298)', str_contains($heroHtml, 'logo-mascot.webp" alt="" width="311" height="298"'));
preg_match('/<ul class="hero__checks">(.*?)<\/ul>/s', $html, $checks);
check('4 vantagens no topo (pares)', substr_count($checks[1] ?? '', '<li') === 4);
check('FAQ com todas as respostas abertas (sem sanfona)', !str_contains($html, '<details') && substr_count($html, 'class="faq__item"') === 6);
check('caminho dos passos estático (sem desenho na rolagem)', !str_contains($html, 'data-draw'));
check('tipo de página declarado para o verificador', str_contains($html, 'data-type="product"') && str_contains($html, '<meta name="page-type" content="product">') && str_contains($html, '<meta name="site-kind" content="tech">'));

echo $failures === 0 ? "\nOK\n" : "\n$failures falha(s)\n";
exit($failures === 0 ? 0 : 1);
