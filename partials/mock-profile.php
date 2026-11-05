<?php
/*
 * Mockup do cartão público do pet (pet fictício "Paçoca").
 * $profileVariant: 'compact' (dentro do celular, no hero) ou 'full' (seção Cartão).
 */
$profileVariant = $profileVariant ?? 'compact';
?>
<div class="mock-profile mock-profile--<?= e($profileVariant) ?>" aria-hidden="true">
  <div class="mock-profile__cover">
    <span class="mock-profile__chip">Cartão do pet</span>
  </div>
  <div class="mock-profile__avatar"><?php include __DIR__ . '/art-pacoca.php'; ?></div>
  <p class="mock-profile__name">Paçoca <span class="paw">🐾</span></p>
  <p class="mock-profile__meta">Vira-lata caramelo • 3 anos</p>
  <span class="mock-profile__call">
    <svg viewBox="0 0 24 24" width="18" height="18"><path fill="currentColor" d="M6.6 10.8a15.1 15.1 0 0 0 6.6 6.6l2.2-2.2a1 1 0 0 1 1-.25 11.4 11.4 0 0 0 3.6.57 1 1 0 0 1 1 1V20a1 1 0 0 1-1 1A17 17 0 0 1 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.25.2 2.46.57 3.6a1 1 0 0 1-.25 1Z"/></svg>
    Falar com o Tutor
  </span>
  <div class="mock-profile__attrs">
    <span class="attr attr--cyan"><small>Sexo</small>Macho</span>
    <span class="attr attr--yellow"><small>Peso</small>12 kg</span>
    <span class="attr attr--orange"><small>Porte</small>Médio</span>
  </div>
  <div class="mock-profile__box">
    <p class="mock-profile__box-title">🦴 Sobre mim</p>
    <p>Sou brincalhão e muito dócil. Se me encontrar, fale comigo com calma: eu adoro um carinho atrás da orelha.</p>
    <?php if ($profileVariant === 'full'): ?>
      <p class="mock-profile__small"><b>Pelagem:</b> curta e caramelo · <b>Marcas:</b> mancha branca na testa</p>
    <?php endif; ?>
  </div>
  <?php if ($profileVariant === 'full'): ?>
    <div class="mock-profile__box">
      <p class="mock-profile__box-title">💛 Gostos & hábitos</p>
      <ul class="mock-profile__likes">
        <li><span>🍗</span>Petisco: frango</li>
        <li><span>🎾</span>Brinquedo: bolinha</li>
        <li><span>🌳</span>Ama passear no parque</li>
      </ul>
    </div>
  <?php endif; ?>
</div>
