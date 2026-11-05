<?php
declare(strict_types=1);

if (!function_exists('e')) {
    /** Escapa um valor para saída segura em HTML (texto e atributos). */
    function e(?string $value): string
    {
        return htmlspecialchars($value ?? '', ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('wa_link')) {
    /**
     * Monta o link do WhatsApp com mensagem pronta.
     * Aceita número com ou sem máscara; sem DDI (10 ou 11 dígitos) assume Brasil (55).
     * Sem número válido, aponta para a seção de modelos em vez de um link quebrado.
     */
    function wa_link(string|int $number, string $message): string
    {
        $digits = preg_replace('/\D+/', '', (string) $number) ?? '';
        if ($digits === '') {
            return '#modelos';
        }
        if (strlen($digits) === 10 || strlen($digits) === 11) {
            $digits = '55' . $digits;
        }
        return 'https://wa.me/' . $digits . '?text=' . rawurlencode($message);
    }
}

if (!function_exists('link_attrs')) {
    /** Atributos de nova aba apenas para links externos (https). */
    function link_attrs(string $href): string
    {
        return str_starts_with($href, 'https://') ? ' target="_blank" rel="noopener"' : '';
    }
}
