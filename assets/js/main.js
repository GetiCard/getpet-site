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

  /* ---------- Caminho dos passos: desenha quando entra na tela ---------- */
  var revealItems = document.querySelectorAll('[data-draw]');
  if ('IntersectionObserver' in window) {
    var revealObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.12 });
    revealItems.forEach(function (el) { revealObserver.observe(el); });
  } else {
    revealItems.forEach(function (el) { el.classList.add('is-visible'); });
  }

  var sticky = document.querySelector('[data-sticky-cta]');
  var finalCta = document.getElementById('cta-final');
  /* ---------- CTA fixo: some enquanto o botão do hero ou o CTA final estão na tela ---------- */
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

  /* ---------- Pulso NFC do hero pausa fora da tela (loop não essencial) ---------- */
  var hero = document.querySelector('.hero');
  if (hero && 'IntersectionObserver' in window) {
    new IntersectionObserver(function (entries) {
      hero.classList.toggle('is-offscreen', !entries[0].isIntersecting);
    }).observe(hero);
  }

  /* ---------- Header compacto depois de rolar ---------- */
  var header = document.querySelector('.site-header');
  if (header) {
    var ticking = false;
    var updateHeader = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 24);
      ticking = false;
    };
    window.addEventListener('scroll', function () {
      if (!ticking) { ticking = true; window.requestAnimationFrame(updateHeader); }
    }, { passive: true });
    updateHeader();
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
