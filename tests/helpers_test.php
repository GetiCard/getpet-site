<?php
declare(strict_types=1);

$root = dirname(__DIR__);
require $root . '/lib/helpers.php';
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

// e()
check('e escapa tags, aspas e &', e('<b>"Mel" & \'Bob\'</b>') === '&lt;b&gt;&quot;Mel&quot; &amp; &#039;Bob&#039;&lt;/b&gt;');
check('e(null) vira string vazia', e(null) === '');

// wa_link()
check('wa_link com mascara completa', wa_link('+55 (98) 9 8347-1218', 'Oi') === 'https://wa.me/5598983471218?text=Oi');
check('wa_link sem DDI adiciona 55 (celular, 11 digitos)', wa_link('(98) 9 8347-1218', 'Oi') === 'https://wa.me/5598983471218?text=Oi');
check('wa_link sem DDI adiciona 55 (fixo, 10 digitos)', wa_link('(98) 3232-1234', 'Oi') === 'https://wa.me/559832321234?text=Oi');
check('wa_link aceita numero como int', wa_link(5598983471218, 'Oi') === 'https://wa.me/5598983471218?text=Oi');

// link_attrs(): só links externos abrem em nova aba
check('link_attrs para https abre nova aba', link_attrs('https://wa.me/55?text=x') === ' target="_blank" rel="noopener"');
check('link_attrs para ancora nao abre nova aba', link_attrs('#modelos') === '');
check('wa_link com numero vazio cai em #modelos', wa_link('', 'Oi') === '#modelos');
check('wa_link com numero sem digitos cai em #modelos', wa_link('abc', 'Oi') === '#modelos');
check(
    'wa_link codifica acentos, &, ? e emoji',
    str_ends_with(wa_link('5598983471218', 'Olá & tchau? 🐾'), '?text=Ol%C3%A1%20%26%20tchau%3F%20%F0%9F%90%BE')
);

// config
check('config tem o WhatsApp comercial', $c['whatsapp'] === '5598983471218');
check('config tem 3 modelos', count($c['models']) === 3);
check('ids dos modelos', array_column($c['models'], 'id') === ['basic', 'nfc', 'location']);
foreach ($c['models'] as $m) {
    check("mensagem do modelo {$m['id']} cita o nome", str_contains($m['message'], $m['name']));
}
check('app_url aponta para o login', $c['app_url'] === 'https://getpet.digital/login');

echo $failures === 0 ? "\nOK\n" : "\n$failures falha(s)\n";
exit($failures === 0 ? 0 : 1);
