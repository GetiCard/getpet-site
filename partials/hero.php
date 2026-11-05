<?php $brandLetters = preg_split('//u', 'Getpet', -1, PREG_SPLIT_NO_EMPTY); ?>
<section class="hero" aria-labelledby="hero-title">
  <div class="container hero__grid">
    <div class="hero__copy">
      <div class="brand-lockup">
        <img class="brand-lockup__mascot" src="assets/img/logo-mascot.webp" alt="" width="311" height="298">
        <h1 id="hero-title" class="hero__title">
          <span class="wordmark" aria-hidden="true"><?php foreach ($brandLetters as $i => $letter): ?><span class="wordmark__letter" style="--i:<?= $i ?>"><?= e($letter) ?></span><?php endforeach; ?></span>
          <span class="sr-only">Getpet:</span>
          <span class="hero__sub">Tag de identificação com NFC e QR Code para cães e gatos</span>
        </h1>
      </div>

      <p class="hero__tagline">Se ele se perder, o caminho de volta está na <span class="mark mark--green">coleira.</span></p>
      <p class="hero__lead lead">São <strong>3 modelos de tag</strong> para a coleira. Quem encontrar seu pet lê a tag com o celular e vê, na hora, como falar com você.</p>

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
        <li>Prontuário de saúde no app</li>
      </ul>
    </div>

    <div class="hero__visual">
      <div class="hero__blob" aria-hidden="true"></div>

      <!-- Momento focal: a tag encosta no celular e o cartão do pet abre -->
      <div class="phone">
        <div class="phone__notch" aria-hidden="true"></div>
        <div class="phone__screen">
          <div class="phone__lock" aria-hidden="true">
            <span class="phone__time">9:41</span>
            <span class="phone__date">sábado, 14 de junho</span>
            <span class="phone__nfc">
              <svg viewBox="0 0 24 24" width="30" height="30"><path fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" d="M8 8a6 6 0 0 0 0 8M5 5a10 10 0 0 0 0 14M16 8a6 6 0 0 1 0 8M19 5a10 10 0 0 1 0 14"/><circle cx="12" cy="12" r="1.8" fill="currentColor"/></svg>
              Aproxime a tag
            </span>
          </div>
          <div class="phone__card">
            <?php $profileVariant = 'compact'; include __DIR__ . '/mock-profile.php'; ?>
          </div>
        </div>
      </div>

      <div class="hero__tag">
        <span class="nfc-waves" aria-hidden="true"><i></i><i></i><i></i></span>
        <img src="assets/img/tags/tag-hero.webp" alt="Tag Getpet redonda com NFC e QR Code" width="339" height="344">
      </div>

      <div class="hero__toast" aria-hidden="true">
        <span class="hero__toast-icon">
          <svg viewBox="0 0 24 24" width="18" height="18"><path d="M4 5h16v11H9l-5 4V5Z" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/></svg>
        </span>
        <span><b>Encontrei o Paçoca!</b><small>Ele está bem, na praça do bairro.</small></span>
      </div>
    </div>
  </div>
</section>
