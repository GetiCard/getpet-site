<?php
$profileFeatures = [
    ['color' => 'orange', 'title' => 'Fotos e galeria', 'text' => 'Quem encontrou confere na hora que é mesmo o seu pet.'],
    ['color' => 'cyan', 'title' => 'Características', 'text' => 'Espécie, porte, peso, pelagem, marcas e o número do microchip.'],
    ['color' => 'yellow', 'title' => 'Temperamento e favoritos', 'text' => 'Petisco preferido, brinquedo, se adora crianças: ajuda a acalmar seu pet até você chegar.'],
    ['color' => 'green', 'title' => 'Seus contatos, do seu jeito', 'text' => 'Tutor principal, co-tutores e contato de emergência, com a sua preferência: WhatsApp, ligação ou e-mail.'],
];
?>
<section class="section section--band" id="cartao" aria-labelledby="cartao-title">
  <div class="container split">
    <div class="split__copy">
      <div class="section-head reveal">
        <span class="pill pill--orange">GetPet Identificação</span>
        <h2 id="cartao-title">Um cartão que fala <span class="mark">pelo seu pet</span></h2>
        <p class="lead">Quando alguém lê a tag, abre o perfil público dele: quem ele é, como cuidar dele por alguns minutos e como encontrar você.</p>
      </div>

      <ul class="feature-list">
        <?php foreach ($profileFeatures as $i => $feature): ?>
          <li class="feature-list__item reveal" data-delay="<?= min($i, 3) ?>">
            <span class="dot dot--<?= e($feature['color']) ?>" aria-hidden="true"></span>
            <div>
              <h3><?= e($feature['title']) ?></h3>
              <p><?= e($feature['text']) ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="split__visual reveal">
      <div class="profile-stage">
        <?php $profileVariant = 'full'; include __DIR__ . '/mock-profile.php'; ?>
        <span class="sticker sticker--yellow sticker--a" aria-hidden="true">Sem app pra quem encontra</span>
        <span class="sticker sticker--lilac sticker--b" aria-hidden="true">Atualize quando quiser</span>
      </div>
    </div>
  </div>
</section>
