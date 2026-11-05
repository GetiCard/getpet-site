<?php
/*
 * Ilustração de tag Getpet.
 * $tagVariant: 'round' (NFC), 'bone' (Basic) ou 'dark' (Localização).
 */
require_once __DIR__ . '/art-qr.php';
$tagVariant = $tagVariant ?? 'round';
?>
<div class="tag tag--<?= e($tagVariant) ?>" aria-hidden="true">
  <span class="tag__hole"></span>
  <?php if ($tagVariant === 'bone'): ?>
    <svg class="tag__bone" viewBox="0 0 220 120"><path d="M48 18c-18-14-46 0-40 22 2 8 8 13 14 15v10c-6 2-12 7-14 15-6 22 22 36 40 22 4-3 7-7 8-12h108c1 5 4 9 8 12 18 14 46 0 40-22-2-8-8-13-14-15V55c6-2 12-7 14-15 6-22-22-36-40-22-4 3-7 7-8 12H56c-1-5-4-9-8-12Z" fill="#7FD0F5" stroke="#2D3436" stroke-width="5" stroke-linejoin="round"/></svg>
    <img class="tag__logo" src="assets/img/logo-getpet.webp" alt="" width="480" height="454" loading="lazy">
    <span class="tag__qr"><?= getpet_art_qr(11, 21) ?></span>
  <?php else: ?>
    <span class="tag__face">
      <img class="tag__logo" src="assets/img/logo-getpet.webp" alt="" width="480" height="454" loading="lazy">
      <span class="tag__label">
        <svg viewBox="0 0 24 24" width="12" height="12"><path fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" d="M8 8a6 6 0 0 0 0 8M5 5a10 10 0 0 0 0 14M16 8a6 6 0 0 1 0 8M19 5a10 10 0 0 1 0 14"/></svg>
        Getcard
      </span>
    </span>
  <?php endif; ?>
</div>
