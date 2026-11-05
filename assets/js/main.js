/* Getpet — interações da landing (sem dependências). */
(function () {
  'use strict';

  var root = document.documentElement;
  root.classList.add('js');

  /* ---------- Menu mobile ---------- */
  var toggle = document.querySelector('[data-menu-toggle]');
  var menu = document.querySelector('[data-menu]');

  function setMenu(open) {
    if (!toggle || !menu) return;
    toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    toggle.querySelector('.sr-only').textContent = open ? 'Fechar menu' : 'Abrir menu';
    menu.classList.toggle('is-open', open);
  }

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      setMenu(toggle.getAttribute('aria-expanded') !== 'true');
    });
    menu.addEventListener('click', function (event) {
      if (event.target.closest('a')) setMenu(false);
    });
    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        setMenu(false);
        toggle.focus();
      }
    });
    document.addEventListener('click', function (event) {
      if (toggle.getAttribute('aria-expanded') === 'true' && !event.target.closest('.nav-bar')) {
        setMenu(false);
      }
    });
  }

  /* ---------- Barra fixa do celular: é o único 'Quero minha tag' fixo (o cabeçalho do celular não tem botão).
     Some enquanto o botão do hero ou o CTA final estão na tela, para nunca haver dois iguais à vista. ---------- */
  var sticky = document.querySelector('[data-sticky-cta]');
  var finalCta = document.getElementById('cta-final');
  var heroActions = document.querySelector('.hero__actions');
  if (sticky && 'IntersectionObserver' in window) {
    var visibleCtas = new Set();
    var ctaObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) visibleCtas.add(entry.target);
        else visibleCtas.delete(entry.target);
      });
      sticky.classList.toggle('is-hidden', visibleCtas.size > 0);
    }, { threshold: 0.2 });
    [heroActions, finalCta].forEach(function (el) { if (el) ctaObserver.observe(el); });
  }

  /* ---------- Cartão do pet: interruptores mostram/escondem campos do mockup ---------- */
  var panel = document.querySelector('[data-tutor-panel]');
  if (panel) {
    var stage = panel.closest('.profile-stage');
    panel.addEventListener('click', function (event) {
      var button = event.target.closest('[data-toggle]');
      if (!button) return;
      var on = button.getAttribute('aria-checked') !== 'true';
      button.setAttribute('aria-checked', on ? 'true' : 'false');
      var field = stage && stage.querySelector('[data-field="' + button.getAttribute('data-toggle') + '"]');
      if (field) field.classList.toggle('is-off', !on);
    });
  }
})();
