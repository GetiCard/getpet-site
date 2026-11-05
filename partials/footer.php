<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <img src="assets/img/logo-getpet.webp" alt="Getpet" width="480" height="454" loading="lazy">
      <p>A identidade digital do seu pet. Tag com NFC e QR Code, perfil, saúde e veterinário em um só lugar.</p>
    </div>

    <nav class="footer-col" aria-label="Rodapé">
      <h2 class="footer-title">Navegue</h2>
      <ul>
        <li><a href="#como-funciona">Como funciona</a></li>
        <li><a href="#saude">GetPet Saúde</a></li>
        <li><a href="#modelos">Modelos</a></li>
        <li><a href="#duvidas">Dúvidas</a></li>
        <li><a href="<?= e($config['app_url']) ?>" target="_blank" rel="noopener">Entrar no app</a></li>
      </ul>
    </nav>

    <div class="footer-col">
      <h2 class="footer-title">Fale com a gente</h2>
      <ul>
        <li><a href="<?= e($wa) ?>"<?= link_attrs($wa) ?>>WhatsApp</a></li>
        <?php $instagram = ltrim((string) $config['instagram'], '@'); ?>
        <li><a href="https://instagram.com/<?= e($instagram) ?>" target="_blank" rel="noopener">@<?= e($instagram) ?></a></li>
        <li><a href="mailto:<?= e($config['support_email']) ?>"><?= e($config['support_email']) ?></a></li>
      </ul>
    </div>
  </div>

  <div class="container footer-bottom">
    <div class="footer-maker">
      <img src="assets/img/logo-geticompany.webp" alt="Geti Company" width="160" height="160" loading="lazy">
      <p>Uma solução <strong>Geti Company</strong> · tecnologia <strong>Getcard</strong></p>
    </div>
    <p class="footer-copy">© <?= date('Y') ?> Getpet. Feito com carinho para quem tem pet.</p>
  </div>
</footer>

<div class="sticky-cta" data-sticky-cta>
  <a class="btn btn--primary btn--block" href="<?= e($wa) ?>"<?= link_attrs($wa) ?>>
    <?php include __DIR__ . '/icon-whatsapp.php'; ?>
    Quero minha tag
  </a>
</div>

<script src="assets/js/main.js" defer></script>
