<?php $brandLetters = preg_split('//u', 'Getpet', -1, PREG_SPLIT_NO_EMPTY); ?>
<section class="hero" aria-labelledby="hero-title">
  <div class="container hero__grid">
    <div class="hero__copy">
      <div class="brand-lockup">
        <img class="brand-lockup__mascot" src="assets/img/logo-mascot.webp" alt="" width="477" height="318">
        <h1 id="hero-title" class="hero__title">
          <span class="wordmark" aria-hidden="true"><?php foreach ($brandLetters as $i => $letter): ?><span class="wordmark__letter" style="--i:<?= $i ?>"><?= e($letter) ?></span><?php endforeach; ?></span>
          <span class="sr-only">Getpet:</span>
          <span class="hero__sub">A identidade digital do seu pet</span>
        </h1>
      </div>

      <p class="hero__tagline">Se ele se perder, o caminho de volta está na <span class="mark mark--green">coleira.</span></p>
      <p class="hero__lead lead">Uma tag com <strong>NFC e QR Code</strong>: quem encontrar seu pet aproxima o celular e vê, na hora, como falar com você.</p>

      <div class="hero__actions">
        <a class="btn btn--primary" href="<?= e($wa) ?>"<?= link_attrs($wa) ?>>
          <?php include __DIR__ . '/icon-whatsapp.php'; ?>
          Quero minha tag
        </a>
        <a class="btn btn--ghost" href="#como-funciona">Ver como funciona</a>
      </div>

      <ul class="hero__checks">
        <li>Sem app para quem encontra</li>
        <li>Funciona em qualquer celular</li>
        <li>Você decide o que aparece</li>
      </ul>
    </div>

    <div class="hero__visual">
      <div class="hero__blob" aria-hidden="true"></div>

      <div class="phone">
        <div class="phone__notch" aria-hidden="true"></div>
        <div class="phone__screen">
          <?php $profileVariant = 'compact'; include __DIR__ . '/mock-profile.php'; ?>
        </div>
      </div>

      <div class="hero__tag">
        <span class="nfc-waves" aria-hidden="true"><i></i><i></i><i></i></span>
        <?php $tagVariant = 'round'; include __DIR__ . '/art-tag.php'; ?>
      </div>

      <div class="hero__toast" aria-hidden="true">
        <span class="hero__toast-icon">💬</span>
        <span><b>Encontrei o Paçoca!</b><small>Ele está bem, na praça do bairro.</small></span>
      </div>
    </div>
  </div>
</section>
