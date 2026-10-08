(function () {
  'use strict';
  document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.querySelector('.mrk-menu-toggle');
    var nav = document.getElementById('primary-site-navigation');
    if (!toggle || !nav) return;

    function setMenu(open) {
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
      nav.classList.toggle('mrk-menu-open', open);
      document.body.classList.toggle('mrk-nav-open', open);
      document.body.style.overflow = open ? 'hidden' : '';
    }

    toggle.addEventListener('click', function () {
      setMenu(toggle.getAttribute('aria-expanded') !== 'true');
    });

    nav.addEventListener('click', function (event) {
      if (event.target.closest('.closebtn') || event.target.closest('a:not(.closebtn)')) setMenu(false);
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') setMenu(false);
    });

    window.addEventListener('resize', function () {
      if (window.innerWidth > 991) setMenu(false);
    });
  });
}());
