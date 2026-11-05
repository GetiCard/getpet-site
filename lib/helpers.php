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
     * Sem número válido, aponta para a seção de modelos em vez de um link quebrado.
     */
    function wa_link(string $number, string $message): string
    {
        $digits = preg_replace('/\D+/', '', $number) ?? '';
        if ($digits === '') {
            return '#modelos';
        }
        return 'https://wa.me/' . $digits . '?text=' . rawurlencode($message);
    }
}
