<?php
// Ilustração usada por modelo
$tagByModel = ['basic' => 'bone', 'nfc' => 'round', 'location' => 'dark'];
?>
<section class="section" id="modelos" aria-labelledby="modelos-title">
  <div class="container">
    <div class="section-head section-head--center reveal">
      <span class="pill pill--cyan">Modelos</span>
      <h2 id="modelos-title">Escolha a tag do <span class="mark mark--cyan">seu jeito</span></h2>
      <p class="lead">Três modelos, todos ligados ao mesmo app. O lançamento está chegando: chame no WhatsApp e garanta a sua.</p>
    </div>

    <ul class="models">
      <?php foreach ($config['models'] as $i => $model): ?>
        <li class="card model<?= $model['badge'] ? ' model--featured' : '' ?> reveal" data-delay="<?= $i + 1 ?>">
          <?php if ($model['badge']): ?>
            <span class="model__badge"><?= e($model['badge']) ?></span>
          <?php endif; ?>
          <div class="model__art model__art--<?= e($model['color']) ?>">
            <?php $tagVariant = $tagByModel[$model['id']] ?? 'round'; include __DIR__ . '/art-tag.php'; ?>
          </div>
          <h3 class="model__name"><?= e($model['name']) ?></h3>
          <p class="model__tagline"><?= e($model['tagline']) ?></p>
          <ul class="model__features">
            <?php foreach ($model['features'] as $feature): ?>
              <li><?= e($feature) ?></li>
            <?php endforeach; ?>
          </ul>
          <div class="model__footer">
            <span class="model__soon">Em breve</span>
            <?php $modelHref = wa_link($config['whatsapp'], $model['message']); ?>
            <a class="btn btn--primary btn--block" href="<?= e($modelHref) ?>"<?= link_attrs($modelHref) ?>>
              <?php include __DIR__ . '/icon-whatsapp.php'; ?>
              Quero este
            </a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>

    <p class="models__note reveal">Todos os modelos se integram ao app: <strong>Identificação</strong>, <strong>Saúde</strong> e <strong>Vet</strong>.</p>
  </div>
</section>
