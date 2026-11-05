<?php require_once __DIR__ . '/art-qr.php'; ?>
<section class="section section--red" id="pet-perdido" aria-labelledby="pet-perdido-title">
  <div class="container split split--reverse">
    <div class="split__copy">
      <div class="section-head reveal">
        <span class="pill pill--yellow">Pet perdido</span>
        <h2 id="pet-perdido-title">Se o pior acontecer, o cartaz já está pronto</h2>
        <p class="lead">Em um toque o Getpet monta um cartaz de busca com a foto, o QR Code e o seu telefone. É só postar.</p>
      </div>
      <ul class="check-list reveal">
        <li>Gerado na hora, a partir do perfil do pet</li>
        <li>QR Code no cartaz leva direto ao cartão do pet</li>
        <li>No formato certo para stories e grupos</li>
        <li>Link do perfil para compartilhar onde quiser</li>
      </ul>
    </div>

    <div class="split__visual reveal">
      <div class="poster" aria-hidden="true">
        <span class="poster__badge">🚨 PROCURA-SE / PET PERDIDO</span>
        <div class="poster__photo"><?php include __DIR__ . '/art-pacoca.php'; ?></div>
        <p class="poster__name">Paçoca</p>
        <p class="poster__meta">Vira-lata caramelo • 3 anos</p>
        <div class="poster__qr"><?= getpet_art_qr(23, 25) ?></div>
        <p class="poster__hint">Aponte a câmera para ver os contatos</p>
        <div class="poster__phone"><small>Telefone do tutor</small>(98) 9 0000-0000</div>
        <span class="poster__share">Compartilhar nos stories</span>
      </div>
    </div>
  </div>
</section>
