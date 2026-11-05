<?php
$navLinks = [
    'como-funciona' => 'Como funciona',
    'cartao' => 'Cartão',
    'saude' => 'Saúde',
    'modelos' => 'Modelos',
    'duvidas' => 'Dúvidas',
];
?>
<header class="site-header">
  <div class="container">
    <div class="nav-bar">
      <a class="nav-logo" href="#conteudo" aria-label="Getpet, voltar ao início">
        <img src="assets/img/logo-getpet.webp" alt="Getpet" width="480" height="454">
      </a>

      <nav class="nav-menu" id="menu" data-menu aria-label="Principal">
        <ul class="nav-links">
          <?php foreach ($navLinks as $id => $label): ?>
            <li><a href="#<?= e($id) ?>"><?= e($label) ?></a></li>
          <?php endforeach; ?>
        </ul>
        <a class="nav-app" href="<?= e($config['app_url']) ?>" target="_blank" rel="noopener">Entrar no app</a>
      </nav>

      <a class="btn btn--primary btn--sm nav-cta" href="<?= e($wa) ?>" target="_blank" rel="noopener">Quero minha tag</a>

      <button class="nav-toggle" type="button" data-menu-toggle aria-controls="menu" aria-expanded="false">
        <span class="nav-toggle__bars" aria-hidden="true"></span>
        <span class="sr-only">Abrir menu</span>
      </button>
    </div>
  </div>
</header>
