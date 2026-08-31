/* Archivo Nocturno: micro-interactions rapides, accessibles et sans dépendance. */
(function () {
  'use strict';

  const header = document.querySelector('[data-site-header]');
  const toggle = document.querySelector('[data-menu-toggle]');
  const nav = document.querySelector('[data-primary-nav]');

  const syncHeader = () => {
    if (header) header.classList.toggle('is-scrolled', window.scrollY > 20);
  };

  syncHeader();
  window.addEventListener('scroll', syncHeader, { passive: true });

  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const expanded = toggle.getAttribute('aria-expanded') === 'true';
      toggle.setAttribute('aria-expanded', String(!expanded));
      nav.classList.toggle('is-open', !expanded);
      document.body.classList.toggle('menu-is-open', !expanded);
    });

    nav.querySelectorAll('a').forEach((link) => {
      link.addEventListener('click', () => {
        toggle.setAttribute('aria-expanded', 'false');
        nav.classList.remove('is-open');
        document.body.classList.remove('menu-is-open');
      });
    });
  }

  const revealItems = document.querySelectorAll('[data-reveal]');
  if ('IntersectionObserver' in window && !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    revealItems.forEach((item) => observer.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add('is-visible'));
  }

  const dialog = document.querySelector('[data-lightbox]');
  const dialogImage = document.querySelector('[data-lightbox-image]');
  const closeDialog = document.querySelector('[data-lightbox-close]');
  document.querySelectorAll('[data-lightbox-src]').forEach((trigger) => {
    trigger.addEventListener('click', () => {
      if (!dialog || !dialogImage || !trigger.dataset.lightboxSrc) return;
      dialogImage.src = trigger.dataset.lightboxSrc;
      dialogImage.alt = trigger.dataset.lightboxAlt || '';

      // Move the custom cursor into the dialog BEFORE opening it.
      moveCursorIntoDialog(dialog);
      dialog.showModal();
    });
  });
  if (dialog && closeDialog) {
    closeDialog.addEventListener('click', () => dialog.close());
    dialog.addEventListener('click', (event) => {
      if (event.target === dialog) dialog.close();
    });
    dialog.addEventListener('close', () => {
      if (dialogImage) dialogImage.src = '';
      restoreCursorFromDialog();
    });
  }
}());

// Scroll progress + previous section
const progressBar = document.querySelector('.zion-scroll-progress-bar');
const backSection = document.querySelector('.zion-back-section');

const sections = Array.from(
  document.querySelectorAll('main section, section[id]')
).filter(section => section.offsetHeight > 0);

function updateScrollUI() {
  const scrollTop = window.scrollY;
  const docHeight = document.documentElement.scrollHeight - window.innerHeight;

  // Progress bar
  if (progressBar) {
    const progress = docHeight > 0
      ? (scrollTop / docHeight) * 100
      : 0;

    progressBar.style.width = progress + '%';
  }

  // Previous section button
  if (backSection) {
    backSection.classList.toggle('visible', scrollTop > 100);
  }
}

updateScrollUI();
window.addEventListener('scroll', updateScrollUI, { passive: true });

if (backSection) {
  backSection.addEventListener('click', () => {
    const currentScroll = window.scrollY;

    const previousSections = sections.filter(
      section => section.offsetTop < currentScroll - 80
    );

    if (previousSections.length) {
      const previous = previousSections[previousSections.length - 1];

      window.scrollTo({
        top: Math.max(0, previous.offsetTop - 20),
        behavior: 'smooth'
      });
    } else {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
  });
}


/* Keep the custom cursor inside modal dialogs (top layer). */
const zionCursorDot = document.querySelector('.zion-cursor-dot');
const zionCursorRing = document.querySelector('.zion-cursor-ring');

let zionCursorOriginalParent = null;

function moveCursorIntoDialog(dialog) {
  if (!dialog || !zionCursorDot || !zionCursorRing) return;

  zionCursorOriginalParent = zionCursorDot.parentNode;

  dialog.appendChild(zionCursorDot);
  dialog.appendChild(zionCursorRing);
}

function restoreCursorFromDialog() {
  if (!zionCursorOriginalParent || !zionCursorDot || !zionCursorRing) return;

  zionCursorOriginalParent.appendChild(zionCursorDot);
  zionCursorOriginalParent.appendChild(zionCursorRing);

  zionCursorOriginalParent = null;
}

/* Legal popups */
document.querySelectorAll('[data-legal-open]').forEach((trigger) => {
  trigger.addEventListener('click', (event) => {
    event.preventDefault();

    const type = trigger.getAttribute('data-legal-open');
    const dialog = document.querySelector('[data-legal-dialog="' + type + '"]');

    if (dialog) {
      moveCursorIntoDialog(dialog);
      dialog.showModal();
    }
  });
});

document.querySelectorAll('[data-legal-close]').forEach((button) => {
  button.addEventListener('click', () => {
    const dialog = button.closest('dialog');

    if (dialog) {
      dialog.close();
    }
  });
});

document.querySelectorAll('.legal-dialog').forEach((dialog) => {
  dialog.addEventListener('click', (event) => {
    if (event.target === dialog) {
      dialog.close();
    }
  });

  dialog.addEventListener('close', () => {
    restoreCursorFromDialog();
  });
});
