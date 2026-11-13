<?php
declare(strict_types=1);
?>
      <section id="contact" class="section-contact">
        <div class="container">
          <div class="contact-card reveal" data-reveal>
            <div class="contact-grid">
              <div class="contact-left">
                <p class="eyebrow">Get in Touch</p>
                <h2 class="section-title">Let's Build Something Meaningful.</h2>
                <p class="contact-location"><?= e($portfolio['profile']['location']) ?></p>
              </div>

              <div class="contact-right">
                <p class="contact-summary">
                  Open to full-stack software engineering roles, remote teams,
                  and AI/ML engineering opportunities.
                </p>

                <div class="contact-cta-row">
                  <div class="magnetic-wrap" data-magnetic data-strength="0.2" data-max-offset="6">
                    <a
                      href="mailto:<?= e($portfolio['profile']['email']) ?>"
                      class="btn-primary-md"
                    >
                      <?= render_icon('mail', 'icon-sm') ?>
                      <span>Email Me</span>
                    </a>
                  </div>

                  <div class="magnetic-wrap" data-magnetic data-strength="0.18" data-max-offset="6">
                    <button
                      type="button"
                      id="copy-email-btn"
                      data-email="<?= e($portfolio['profile']['email']) ?>"
                      class="btn-secondary-md"
                    >
                      <span class="copy-default">
                        <?= render_icon('copy', 'icon-sm') ?>
                        <span><?= e($portfolio['profile']['email']) ?></span>
                      </span>
                      <span class="copy-done" hidden>
                        <?= render_icon('check', 'icon-sm text-cyan') ?>
                        <span>Copied</span>
                      </span>
                    </button>
                  </div>

                  <div class="magnetic-wrap" data-magnetic data-strength="0.2" data-max-offset="6">
                    <a
                      href="<?= e($portfolio['profile']['cvPdfPath']) ?>"
                      download="Ayman_Fathima_CV.pdf"
                      class="btn-secondary-md"
                    >
                      <?= render_icon('download', 'icon-sm') ?>
                      <span>CV</span>
                    </a>
                  </div>
                </div>

                <div class="contact-socials">
                  <a
                    href="<?= e($portfolio['profile']['linkedinUrl']) ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="social-link"
                  >
                    <?= render_icon('linkedin', 'icon-sm') ?>
                    <span>LinkedIn</span>
                  </a>
                  <a
                    href="<?= e($portfolio['profile']['githubUrl']) ?>"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="social-link"
                  >
                    <?= render_icon('github', 'icon-sm') ?>
                    <span>GitHub</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="site-footer">
      <div class="container footer-inner">
        <p>&copy; <?= date('Y') ?> <?= e($portfolio['profile']['name']) ?></p>
        <div class="footer-links">
          <button type="button" class="footer-link-btn" data-scroll-target="projects">
            Projects
          </button>
          <button type="button" class="footer-link-btn" data-scroll-target="research">
            Research
          </button>
          <button type="button" class="footer-link-btn" id="back-to-top-btn">
            Back to top
          </button>
        </div>
      </div>
    </footer>

    <!-- Project Case Study Modal -->
    <div
      id="project-modal-backdrop"
      class="modal-backdrop"
      role="dialog"
      aria-modal="true"
      aria-labelledby="project-modal-title"
      hidden
    >
      <div class="modal-dialog" id="project-modal-dialog">
        <div class="modal-header">
          <p id="project-modal-category" class="modal-category"></p>
          <button
            type="button"
            id="project-modal-close"
            class="modal-close-btn"
            aria-label="Close project details"
          >
            <?= render_icon('x', 'icon-sm') ?>
          </button>
        </div>

        <div id="project-modal-image-wrap" class="modal-image-wrap">
          <img
            id="project-modal-image"
            src=""
            alt=""
            referrerpolicy="no-referrer"
            class="modal-image"
          />
        </div>

        <div class="modal-body">
          <div>
            <h3 id="project-modal-title" class="modal-title"></h3>
            <p id="project-modal-description" class="modal-description"></p>
          </div>

          <div>
            <h4 class="modal-subtitle">Key Features</h4>
            <ul id="project-modal-features" class="modal-features"></ul>
          </div>

          <div>
            <h4 class="modal-subtitle">Technologies</h4>
            <p id="project-modal-stack" class="modal-stack"></p>
          </div>

          <div id="project-modal-actions" class="modal-actions" hidden>
            <div class="magnetic-wrap" data-magnetic data-strength="0.2" data-max-offset="6">
              <a
                id="project-modal-live"
                href="#"
                target="_blank"
                rel="noopener noreferrer"
                class="btn-modal-primary"
                hidden
              >
                <?= render_icon('external-link', 'icon-xs') ?>
                <span>Visit Live Site</span>
              </a>
            </div>

            <div class="magnetic-wrap" data-magnetic data-strength="0.2" data-max-offset="6">
              <a
                id="project-modal-repo"
                href="#"
                target="_blank"
                rel="noopener noreferrer"
                class="btn-modal-secondary"
                hidden
              >
                <?= render_icon('code', 'icon-xs') ?>
                <span>Source Code</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="assets/js/main.js" defer></script>
  </body>
</html>
