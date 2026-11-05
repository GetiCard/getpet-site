<?php
/*
 * QR Code decorativo (ilustração, não é escaneável).
 * Gera um padrão determinístico com os três marcadores de canto.
 */
if (!function_exists('getpet_art_qr')) {
    function getpet_art_qr(int $seed = 7, int $n = 25): string
    {
        mt_srand($seed);
        $cells = '';
        $isFinder = static function (int $x, int $y) use ($n): bool {
            foreach ([[0, 0], [$n - 7, 0], [0, $n - 7]] as [$fx, $fy]) {
                if ($x >= $fx - 1 && $x <= $fx + 7 && $y >= $fy - 1 && $y <= $fy + 7) {
                    return true;
                }
            }
            return false;
        };
        for ($y = 0; $y < $n; $y++) {
            for ($x = 0; $x < $n; $x++) {
                if (!$isFinder($x, $y) && mt_rand(0, 99) < 48) {
                    $cells .= "M{$x} {$y}h1v1h-1z";
                }
            }
        }
        $finders = '';
        foreach ([[0, 0], [$n - 7, 0], [0, $n - 7]] as [$fx, $fy]) {
            $finders .= "<rect x=\"" . ($fx + 0.5) . "\" y=\"" . ($fy + 0.5) . "\" width=\"6\" height=\"6\" rx=\"1.2\" fill=\"none\" stroke=\"currentColor\"/>"
                . "<rect x=\"" . ($fx + 2) . "\" y=\"" . ($fy + 2) . "\" width=\"3\" height=\"3\" rx=\".6\" fill=\"currentColor\"/>";
        }
        mt_srand();
        return '<svg class="art-qr" viewBox="-1 -1 ' . ($n + 2) . ' ' . ($n + 2) . '" aria-hidden="true" focusable="false">'
            . '<path d="' . $cells . '" fill="currentColor"/>' . $finders . '</svg>';
    }
}
