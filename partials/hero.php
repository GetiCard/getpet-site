<section class="hero" aria-labelledby="hero-title">
  <div class="container hero__grid">
    <div class="hero__copy">
      <span class="pill pill--yellow">
        <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" d="M8 8a6 6 0 0 0 0 8M5 5a10 10 0 0 0 0 14M16 8a6 6 0 0 1 0 8M19 5a10 10 0 0 1 0 14"/></svg>
        Identidade digital para pets
      </span>
      <h1 id="hero-title" class="hero__title">Se ele se perder, o caminho de volta está na <span class="mark mark--green">coleira.</span></h1>
      <p class="hero__lead lead">A tag Getpet tem <strong>NFC e QR Code</strong>. Quem encontrar seu pet aproxima o celular e, na hora, vê o cartão dele com o jeito certo de falar com você.</p>

      <div class="hero__actions">
        <a class="btn btn--primary" href="<?= e($wa) ?>"<?= link_attrs($wa) ?>>
          <?php include __DIR__ . '/icon-whatsapp.php'; ?>
          Quero minha tag
        </a>
        <a class="btn btn--ghost" href="#como-funciona">Ver como funciona</a>
      </div>

      <ul class="hero__checks">
        <li>Quem encontra não precisa de app</li>
        <li>Funciona com a câmera de qualquer celular</li>
        <li>Você decide o que aparece no cartão</li>
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
