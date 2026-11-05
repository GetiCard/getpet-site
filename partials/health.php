<?php
// Itens do prontuário, na mesma ordem e com os mesmos nomes da tela GetPet Saúde do app.
// "status" é o dado de exemplo do pet fictício mostrado no mockup.
$healthItems = [
    ['color' => 'red', 'title' => 'Alergias e condições', 'status' => '1 alergia: picada de pulga',
        'icon' => '<path d="M12 3 2.5 20h19L12 3Z" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/><path d="M12 10v4m0 3v.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>'],
    ['color' => 'cyan', 'title' => 'Vacinas e prevenção', 'status' => 'V10 em dia · reforço em mar/27',
        'icon' => '<path d="m18 3 3 3m-1.5-1.5L14 10m-5 9-4 2 2-4m8-11 4 4-9 9-4-4 9-9Z" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>'],
    ['color' => 'yellow', 'title' => 'Medicamentos', 'status' => 'Nenhum em uso',
        'icon' => '<rect x="3" y="8" width="18" height="8" rx="4" transform="rotate(-35 12 12)" fill="none" stroke="currentColor" stroke-width="2.4"/><path d="m9.5 8.5 5 7" stroke="currentColor" stroke-width="2.4"/>'],
    ['color' => 'purple', 'title' => 'Consultas e exames', 'status' => 'Última consulta em 28/04',
        'icon' => '<path d="M6 3v6a4 4 0 0 0 8 0V3M10 13v3a4 4 0 0 0 8 0v-2" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><circle cx="18" cy="12" r="2" fill="none" stroke="currentColor" stroke-width="2.2"/>'],
    ['color' => 'green', 'title' => 'Peso e diário', 'status' => '12,4 kg em 15/05',
        'icon' => '<rect x="3" y="4" width="18" height="16" rx="4" fill="none" stroke="currentColor" stroke-width="2.4"/><path d="M8 11a4 4 0 0 1 8 0M12 11l2-2" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>'],
    ['color' => 'orange', 'title' => 'Documentos', 'status' => 'Hemograma e receita (PDF)',
        'icon' => '<path d="M6 2h8l4 4v16H6V2Z" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/><path d="M9 12h6M9 16h6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>'],
];
$timeline = [
    ['date' => '12 mar', 'label' => 'Vacina V10', 'color' => 'cyan'],
    ['date' => '28 abr', 'label' => 'Consulta de rotina', 'color' => 'purple'],
    ['date' => '02 mai', 'label' => 'Hemograma anexado', 'color' => 'orange'],
    ['date' => '15 mai', 'label' => 'Pesagem: 12,4 kg', 'color' => 'green'],
];
?>
<section class="section" id="saude" aria-labelledby="saude-title">
  <div class="container split">
    <div class="split__copy">
      <div class="section-head">
        <h2 id="saude-title"><span class="mark mark--red">Prontuário de saúde</span> do pet no app</h2>
        <p class="lead">Chega de carteirinha perdida e exame no e-mail. Tudo sobre a saúde dele fica organizado no app, pronto para mostrar em qualquer consulta.</p>
      </div>

      <ul class="health-topics">
        <?php foreach ($healthItems as $item): ?>
          <li><span class="dot dot--<?= e($item['color']) ?>" aria-hidden="true"></span><?= e($item['title']) ?></li>
        <?php endforeach; ?>
      </ul>

      <div class="health-timeline">
        <h3>Linha do tempo</h3>
        <p>Todo o prontuário em ordem de data, do primeiro ao último registro.</p>
        <ol class="timeline" aria-label="Exemplo de linha do tempo">
          <?php foreach ($timeline as $event): ?>
            <li class="timeline__item">
              <span class="dot dot--<?= e($event['color']) ?>" aria-hidden="true"></span>
              <span class="timeline__date"><?= e($event['date']) ?></span>
              <span><?= e($event['label']) ?></span>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </div>

    <div class="split__visual">
      <div class="health-app" aria-hidden="true">
        <div class="health-app__bar">
          <span class="health-app__back">
            <svg viewBox="0 0 24 24" width="16" height="16"><path d="m14 6-6 6 6 6" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
          <span><b>GetPet Saúde</b><small>Prontuário do Paçoca</small></span>
        </div>
        <div class="health-app__pet">
          <span class="health-app__avatar"><?php include __DIR__ . '/art-pacoca.php'; ?></span>
          <span><b>Paçoca</b><small>Cachorro · Vira-lata · 3 anos</small></span>
        </div>
        <ul class="health-app__list">
          <?php foreach ($healthItems as $item): ?>
            <li class="health-app__row">
              <span class="health-app__icon health-app__icon--<?= e($item['color']) ?>">
                <svg viewBox="0 0 24 24"><?= $item['icon'] ?></svg>
              </span>
              <span class="health-app__text"><b><?= e($item['title']) ?></b><small><?= e($item['status']) ?></small></span>
              <svg class="health-app__chev" viewBox="0 0 24 24" width="16" height="16"><path d="m10 6 6 6-6 6" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</section>
