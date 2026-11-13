(() => {
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // 1. Top Scroll Progress Bar
  const progressFill = document.getElementById('scroll-progress-fill');
  const updateScrollProgress = () => {
    if (!progressFill) return;
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const ratio = docHeight > 0 ? Math.min(Math.max(scrollTop / docHeight, 0), 1) : 0;
    progressFill.style.transform = `scaleX(${ratio})`;
  };
  window.addEventListener('scroll', updateScrollProgress, { passive: true });
  window.addEventListener('resize', updateScrollProgress, { passive: true });
  updateScrollProgress();

  // 2. Mobile Navigation Drawer
  const mobileToggle = document.getElementById('mobile-menu-toggle');
  const mobileDrawer = document.getElementById('mobile-navigation');
  const openIcon = mobileToggle?.querySelector('.menu-icon-open');
  const closeIcon = mobileToggle?.querySelector('.menu-icon-close');

  const setMobileMenu = (open) => {
    if (!mobileToggle || !mobileDrawer) return;
    mobileToggle.setAttribute('aria-expanded', String(open));
    mobileToggle.setAttribute('aria-label', open ? 'Close navigation menu' : 'Open navigation menu');
    mobileDrawer.hidden = !open;
    if (openIcon) openIcon.hidden = open;
    if (closeIcon) closeIcon.hidden = !open;
  };

  mobileToggle?.addEventListener('click', () => {
    const isOpen = mobileToggle.getAttribute('aria-expanded') === 'true';
    setMobileMenu(!isOpen);
  });

  // Smooth section navigation
  document.querySelectorAll('[data-scroll-target]').forEach((el) => {
    el.addEventListener('click', (event) => {
      const targetId = el.getAttribute('data-scroll-target');
      if (!targetId) return;
      const target = document.getElementById(targetId);
      if (!target) return;
      event.preventDefault();
      setMobileMenu(false);
      target.scrollIntoView({ behavior: prefersReducedMotion ? 'auto' : 'smooth' });
    });
  });

  document.getElementById('back-to-top-btn')?.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
  });

  // 3. Scroll Reveal Observer
  const revealEls = document.querySelectorAll('[data-reveal]');
  if (prefersReducedMotion || !('IntersectionObserver' in window)) {
    revealEls.forEach((el) => el.classList.add('is-visible'));
  } else {
    const observer = new IntersectionObserver(
      (entries, obs) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 }
    );
    revealEls.forEach((el) => observer.observe(el));
  }

  // 4. Magnetic Hover Interaction (Desktop mouse only)
  if (!prefersReducedMotion) {
    document.querySelectorAll('[data-magnetic]').forEach((el) => {
      const strength = parseFloat(el.getAttribute('data-strength') || '0.2');
      const maxOffset = parseFloat(el.getAttribute('data-max-offset') || '7');

      el.addEventListener('pointermove', (e) => {
        if (e.pointerType !== 'mouse') return;
        const rect = el.getBoundingClientRect();
        const relX = e.clientX - (rect.left + rect.width / 2);
        const relY = e.clientY - (rect.top + rect.height / 2);
        const x = Math.max(-maxOffset, Math.min(maxOffset, relX * strength));
        const y = Math.max(-maxOffset, Math.min(maxOffset, relY * strength));
        el.style.transform = `translate3d(${x.toFixed(2)}px, ${y.toFixed(2)}px, 0)`;
      });

      el.addEventListener('pointerleave', () => {
        el.style.transform = 'translate3d(0, 0, 0)';
      });
    });

    // Subtle Hero Portrait Mouse Parallax
    const heroSection = document.getElementById('home');
    const portraitFrame = document.getElementById('portrait-glass-frame');
    const pillarsCard = document.getElementById('floating-pillars-card');

    if (heroSection && portraitFrame && pillarsCard) {
      heroSection.addEventListener('pointermove', (e) => {
        if (e.pointerType !== 'mouse') return;
        const rect = heroSection.getBoundingClientRect();
        const nx = (e.clientX - rect.left) / rect.width - 0.5;
        const ny = (e.clientY - rect.top) / rect.height - 0.5;
        portraitFrame.style.transform = `translate3d(${(nx * 14).toFixed(2)}px, ${(ny * 14).toFixed(2)}px, 0)`;
        pillarsCard.style.transform = `translate3d(${(nx * -16).toFixed(2)}px, ${(ny * -16).toFixed(2)}px, 0)`;
      });

      heroSection.addEventListener('pointerleave', () => {
        portraitFrame.style.transform = 'translate3d(0, 0, 0)';
        pillarsCard.style.transform = 'translate3d(0, 0, 0)';
      });
    }
  }

  // 5. Copy Email Action
  const copyEmailBtn = document.getElementById('copy-email-btn');
  if (copyEmailBtn) {
    const defaultSpan = copyEmailBtn.querySelector('.copy-default');
    const doneSpan = copyEmailBtn.querySelector('.copy-done');
    let timer = null;

    copyEmailBtn.addEventListener('click', async () => {
      const email = copyEmailBtn.getAttribute('data-email') || '';
      try {
        await navigator.clipboard.writeText(email);
        if (defaultSpan) defaultSpan.hidden = true;
        if (doneSpan) doneSpan.hidden = false;
        if (timer) clearTimeout(timer);
        timer = setTimeout(() => {
          if (defaultSpan) defaultSpan.hidden = false;
          if (doneSpan) doneSpan.hidden = true;
        }, 2000);
      } catch {
        window.location.href = `mailto:${email}`;
      }
    });
  }

  // 6. Project Case Study Modal
  const modalBackdrop = document.getElementById('project-modal-backdrop');
  const modalDialog = document.getElementById('project-modal-dialog');
  const modalCloseBtn = document.getElementById('project-modal-close');
  const modalCategory = document.getElementById('project-modal-category');
  const modalImgWrap = document.getElementById('project-modal-image-wrap');
  const modalImg = document.getElementById('project-modal-image');
  const modalTitle = document.getElementById('project-modal-title');
  const modalDesc = document.getElementById('project-modal-description');
  const modalFeatures = document.getElementById('project-modal-features');
  const modalStack = document.getElementById('project-modal-stack');
  const modalActions = document.getElementById('project-modal-actions');
  const modalLive = document.getElementById('project-modal-live');
  const modalRepo = document.getElementById('project-modal-repo');

  const closeModal = () => {
    if (!modalBackdrop) return;
    modalBackdrop.hidden = true;
    document.body.style.overflow = '';
  };

  const openModal = (project) => {
    if (!modalBackdrop) return;
    if (modalCategory) modalCategory.textContent = project.category || '';
    if (modalTitle) modalTitle.textContent = project.title || '';
    if (modalDesc) modalDesc.textContent = project.shortDescription || '';

    if (modalImgWrap && modalImg) {
      if (project.image) {
        modalImg.src = project.image;
        modalImg.alt = project.imageAlt || project.title || '';
        modalImgWrap.hidden = false;
      } else {
        modalImgWrap.hidden = true;
      }
    }

    if (modalFeatures) {
      modalFeatures.innerHTML = '';
      (project.features || []).forEach((feat) => {
        const li = document.createElement('li');
        const dash = document.createElement('span');
        dash.className = 'dash-mark';
        dash.setAttribute('aria-hidden', 'true');
        dash.textContent = '—';
        const text = document.createElement('span');
        text.textContent = feat;
        li.appendChild(dash);
        li.appendChild(text);
        modalFeatures.appendChild(li);
      });
    }

    if (modalStack) {
      modalStack.textContent = (project.stack || []).join(' · ');
    }

    const hasLive = Boolean(project.liveUrl);
    const hasRepo = Boolean(project.repoUrl);
    if (modalLive) {
      modalLive.hidden = !hasLive;
      if (hasLive) modalLive.href = project.liveUrl;
    }
    if (modalRepo) {
      modalRepo.hidden = !hasRepo;
      if (hasRepo) modalRepo.href = project.repoUrl;
    }
    if (modalActions) {
      modalActions.hidden = !hasLive && !hasRepo;
    }

    modalBackdrop.hidden = false;
    document.body.style.overflow = 'hidden';
  };

  document.querySelectorAll('[data-open-project]').forEach((btn) => {
    btn.addEventListener('click', () => {
      const raw = btn.getAttribute('data-open-project');
      if (!raw) return;
      try {
        const project = JSON.parse(raw);
        openModal(project);
      } catch {
        // Ignore malformed payload
      }
    });
  });

  modalCloseBtn?.addEventListener('click', closeModal);
  modalBackdrop?.addEventListener('click', closeModal);
  modalDialog?.addEventListener('click', (e) => e.stopPropagation());

  window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      setMobileMenu(false);
      closeModal();
    }
  });
})();
