<?php
$faq = [
    [
        'q' => 'A tag precisa de bateria?',
        'a' => 'Os modelos Basic e NFC não usam bateria: o QR Code é impresso e o NFC é alimentado pelo próprio celular que encosta na tag. Só o GetPet Localização usa bateria, para o Bluetooth e o sinal sonoro.',
    ],
    [
        'q' => 'Quem encontra meu pet precisa ter o app?',
        'a' => 'Não. O cartão do pet abre direto no navegador do celular de quem encontrou, sem instalar nada e sem criar conta.',
    ],
    [
        'q' => 'Funciona em qualquer celular?',
        'a' => 'O QR Code funciona com a câmera de praticamente qualquer smartphone. A leitura por aproximação (NFC) funciona na maioria dos celulares atuais, Android e iPhone.',
    ],
    [
        'q' => 'Meus dados ficam expostos?',
        'a' => 'Você decide o que aparece no cartão público do pet. O prontuário de saúde não fica público: só você e os veterinários que você autorizar têm acesso, e você pode revogar quando quiser.',
    ],
    [
        'q' => 'Quanto custa?',
        'a' => 'Os valores serão divulgados no lançamento. Chame a gente no WhatsApp para saber primeiro e garantir a sua tag.',
    ],
    [
        'q' => 'Como eu compro?',
        'a' => 'Pelo WhatsApp: toque em “Quero minha tag”, diga qual modelo prefere e a nossa equipe te atende.',
    ],
];
?>
<section class="section section--band" id="duvidas" aria-labelledby="duvidas-title">
  <div class="container faq-wrap">
    <div class="section-head">
      <h2 id="duvidas-title">Perguntas frequentes</h2>
      <p class="lead">Não achou a sua? <a class="link" href="<?= e($wa) ?>"<?= link_attrs($wa) ?>>Chame no WhatsApp</a>.</p>
    </div>

    <div class="faq">
      <?php foreach ($faq as $item): ?>
        <details class="faq__item">
          <summary><?= e($item['q']) ?></summary>
          <p><?= e($item['a']) ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
