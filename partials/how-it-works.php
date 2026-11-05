<?php
$steps = [
    [
        'color' => 'orange',
        'title' => 'Coloque a tag e crie o perfil',
        'text' => 'Prenda a tag na coleira e cadastre seu pet no app: fotos, características e os seus contatos.',
        'icon' => '<path d="M12 21s-7-4.5-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 11c0 5.5-7 10-7 10Z" fill="currentColor"/>',
    ],
    [
        'color' => 'cyan',
        'title' => 'Encontrou? É só aproximar',
        'text' => 'Com NFC basta encostar o celular na tag. Sem NFC, a câmera lê o QR Code. Ninguém precisa instalar nada.',
        'icon' => '<rect x="6" y="2" width="12" height="20" rx="3" fill="none" stroke="currentColor" stroke-width="2.4"/><path d="M10 18h4" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>',
    ],
    [
        'color' => 'green',
        'title' => 'Vocês se falam na hora',
        'text' => 'O cartão do pet abre com o botão “Falar com o Tutor”, direto no seu WhatsApp, na ligação ou no e-mail.',
        'icon' => '<path d="M4 5h16v11H8l-4 4V5Z" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/><path d="M8 10h8" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>',
    ],
];
?>
<section class="section" id="como-funciona" aria-labelledby="como-funciona-title">
  <div class="container">
    <div class="section-head section-head--center">
      <h2 id="como-funciona-title">Três passos entre o susto e o <span class="mark">reencontro</span></h2>
    </div>

    <div class="steps-wrap" data-draw>
    <svg class="steps__path" viewBox="0 0 1000 90" preserveAspectRatio="none" aria-hidden="true" focusable="false">
      <path d="M273 44 C 380 -14, 520 -6, 615 72 C 700 0, 860 -14, 957 44" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-dasharray="1 12" vector-effect="non-scaling-stroke"/>
    </svg>
    <ol class="steps">
      <?php foreach ($steps as $i => $step): ?>
        <li class="card step">
          <span class="step__number"><?= $i + 1 ?></span>
          <span class="icon-badge icon-badge--<?= e($step['color']) ?>">
            <svg viewBox="0 0 24 24" aria-hidden="true"><?= $step['icon'] ?></svg>
          </span>
          <h3><?= e($step['title']) ?></h3>
          <p><?= e($step['text']) ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
    </div>
  </div>
</section>
