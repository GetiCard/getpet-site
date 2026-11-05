<?php
$healthItems = [
    ['color' => 'red', 'title' => 'Alergias e condições', 'text' => 'O que ele não pode comer, tomar ou fazer, sempre à vista.',
        'icon' => '<path d="M12 3 2.5 20h19L12 3Z" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/><path d="M12 10v4m0 3v.5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>'],
    ['color' => 'cyan', 'title' => 'Vacinas e prevenção', 'text' => 'Vacinas, vermífugos e antipulgas com data da aplicação e do reforço.',
        'icon' => '<path d="m18 3 3 3m-1.5-1.5L14 10m-5 9-4 2 2-4m8-11 4 4-9 9-4-4 9-9Z" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>'],
    ['color' => 'yellow', 'title' => 'Medicamentos', 'text' => 'Remédios em uso, dose e por quanto tempo tomar.',
        'icon' => '<rect x="3" y="8" width="18" height="8" rx="4" transform="rotate(-35 12 12)" fill="none" stroke="currentColor" stroke-width="2.4"/><path d="m9.5 8.5 5 7" stroke="currentColor" stroke-width="2.4"/>'],
    ['color' => 'purple', 'title' => 'Consultas e exames', 'text' => 'Cada atendimento registrado, com o que foi visto e pedido.',
        'icon' => '<path d="M6 3v6a4 4 0 0 0 8 0V3M10 13v3a4 4 0 0 0 8 0v-2" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><circle cx="18" cy="12" r="2" fill="none" stroke="currentColor" stroke-width="2.2"/>'],
    ['color' => 'green', 'title' => 'Peso e diário', 'text' => 'Pesagens e anotações do dia a dia para acompanhar a evolução.',
        'icon' => '<rect x="3" y="4" width="18" height="16" rx="4" fill="none" stroke="currentColor" stroke-width="2.4"/><path d="M8 11a4 4 0 0 1 8 0M12 11l2-2" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>'],
    ['color' => 'orange', 'title' => 'Documentos', 'text' => 'Exames, receitas e laudos guardados em um só lugar.',
        'icon' => '<path d="M6 2h8l4 4v16H6V2Z" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linejoin="round"/><path d="M9 12h6M9 16h6" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/>'],
];
$timeline = [
    ['date' => '12 mar', 'label' => 'Vacina V10', 'color' => 'cyan'],
    ['date' => '28 abr', 'label' => 'Consulta de rotina', 'color' => 'purple'],
    ['date' => '02 mai', 'label' => 'Hemograma (PDF)', 'color' => 'orange'],
    ['date' => '15 mai', 'label' => 'Pesagem: 12,4 kg', 'color' => 'green'],
];
?>
<section class="section" id="saude" aria-labelledby="saude-title">
  <div class="container">
    <div class="section-head section-head--center reveal">
      <span class="pill pill--red">GetPet Saúde</span>
      <h2 id="saude-title">O prontuário do seu pet, <span class="mark mark--red">sempre no bolso</span></h2>
      <p class="lead">Chega de carteirinha perdida e exame no e-mail. Tudo sobre a saúde dele fica organizado no app, pronto para mostrar em qualquer consulta.</p>
    </div>

    <ul class="health-grid">
      <?php foreach ($healthItems as $i => $item): ?>
        <li class="card health-card reveal" data-delay="<?= $i % 3 + 1 ?>">
          <span class="icon-badge icon-badge--<?= e($item['color']) ?>">
            <svg viewBox="0 0 24 24" aria-hidden="true"><?= $item['icon'] ?></svg>
          </span>
          <div>
            <h3><?= e($item['title']) ?></h3>
            <p><?= e($item['text']) ?></p>
          </div>
        </li>
      <?php endforeach; ?>

      <li class="card health-card health-card--timeline reveal">
        <div class="health-card__intro">
          <span class="icon-badge icon-badge--lilac">
            <svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2.4"/><path d="M12 7v5l3 2" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/></svg>
          </span>
          <div>
            <h3>Linha do tempo</h3>
            <p>Todo o prontuário em ordem de data. A história de saúde dele, do primeiro ao último registro.</p>
          </div>
        </div>
        <ol class="timeline" aria-label="Exemplo de linha do tempo">
          <?php foreach ($timeline as $event): ?>
            <li class="timeline__item">
              <span class="dot dot--<?= e($event['color']) ?>" aria-hidden="true"></span>
              <time><?= e($event['date']) ?></time>
              <span><?= e($event['label']) ?></span>
            </li>
          <?php endforeach; ?>
        </ol>
      </li>
    </ul>
  </div>
</section>
