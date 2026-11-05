<?php
$vetSteps = [
    ['title' => 'Gere um código', 'text' => 'Na consulta, abra o app e crie um código de acesso escolhendo por quanto tempo ele vale.'],
    ['title' => 'O veterinário registra', 'text' => 'Com o código, ele vê o histórico e anota atendimentos, vacinas, exames e receitas no prontuário.'],
    ['title' => 'Revogue quando quiser', 'text' => 'Você vê quem tem acesso e até quando. Um toque e o acesso termina.'],
];
?>
<section class="section section--band section--lilac" id="veterinario" aria-labelledby="vet-title">
  <div class="container split">
    <div class="split__copy">
      <div class="section-head">
        <h2 id="vet-title">O veterinário escreve no prontuário. <span class="mark mark--purple">Você decide</span> até quando.</h2>
        <p class="lead">O histórico do seu pet acompanha ele de clínica em clínica, e quem cuida dele registra tudo direto no app.</p>
      </div>

      <ol class="vet-steps">
        <?php foreach ($vetSteps as $i => $step): ?>
          <li class="vet-steps__item">
            <span class="vet-steps__n"><?= $i + 1 ?></span>
            <div>
              <h3><?= e($step['title']) ?></h3>
              <p><?= e($step['text']) ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>

      <p class="note">
        <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="M12 2 4 5v6c0 5 3.4 9.4 8 11 4.6-1.6 8-6 8-11V5l-8-3Z" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linejoin="round"/><path d="m8.5 12 2.5 2.5 4.5-5" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <span>Só veterinários com <strong>CRMV verificado</strong>: a equipe do Getpet confere o registro antes de liberar o acesso.</span>
      </p>
    </div>

    <div class="split__visual">
      <div class="vet-mock" aria-hidden="true">
        <div class="card vet-code">
          <p class="vet-code__label">Código para o veterinário</p>
          <p class="vet-code__value">PAÇ-7K4-29Q</p>
          <p class="vet-code__meta">Válido por 6 meses · ver e registrar</p>
        </div>

        <div class="card vet-access">
          <p class="vet-access__title">Com acesso agora (1)</p>
          <div class="vet-access__row">
            <span class="icon-badge icon-badge--purple">
              <svg viewBox="0 0 24 24"><path d="M6 3v6a4 4 0 0 0 8 0V3M10 13v3a4 4 0 0 0 8 0v-2" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><circle cx="18" cy="12" r="2" fill="none" stroke="currentColor" stroke-width="2.2"/></svg>
            </span>
            <div>
              <p class="vet-access__name">Dra. Ana Lima <span class="vet-access__status">Ativo</span></p>
              <p class="vet-access__meta">CRMV 0000-MA · Clínica Patinhas</p>
              <p class="vet-access__meta">Ver e registrar · até 30/06</p>
            </div>
          </div>
          <span class="vet-access__revoke">Revogar acesso</span>
        </div>

        <div class="card vet-entry">
          <span class="dot dot--purple"></span>
          <p><b>Consulta registrada</b> pela Dra. Ana · Otite leve, retorno em 15 dias</p>
        </div>
      </div>
    </div>
  </div>
</section>
