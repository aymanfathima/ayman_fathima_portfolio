<?php
declare(strict_types=1);

require_once __DIR__ . '/data/portfolio.php';
require_once __DIR__ . '/includes/icons.php';
require_once __DIR__ . '/includes/header.php';

$profile = $portfolio['profile'];
$brandPillars = $portfolio['brandPillars'];
$about = $portfolio['about'];
$skills = $portfolio['skills'];
$experience = $portfolio['experience'];
$projects = $portfolio['projects'];
$research = $portfolio['researchProject'];
$publication = $portfolio['publication'];
$education = $portfolio['education'];
$certifications = $portfolio['certifications'];
?>

<!-- HERO SECTION -->
<section id="home" class="hero-section">
  <div class="hero-grid-bg" aria-hidden="true"></div>
  <div class="hero-glow-violet" aria-hidden="true"></div>
  <div class="hero-glow-cyan" aria-hidden="true"></div>

  <div class="container hero-container">
    <div class="hero-grid">
      <!-- Left: Editorial Narrative & CTAs -->
      <div class="hero-left">
        <p class="hero-availability hero-enter" style="--delay: 0ms">
          <?= e($profile['availability']) ?>
        </p>

        <div class="hero-name-wrap hero-enter" style="--delay: 80ms">
          <h1 class="hero-name">
            AYMAN <span class="hero-name-accent">FATHIMA</span>
          </h1>
          <p class="hero-role"><?= e($profile['roleHeadline']) ?></p>
        </div>

        <h2 class="hero-headline hero-enter" style="--delay: 160ms">
          <?= e($profile['heroHeadline']) ?>
        </h2>

        <p class="hero-intro hero-enter" style="--delay: 240ms">
          <?= e($profile['heroIntro']) ?>
        </p>

        <div class="hero-cta-row hero-enter" style="--delay: 320ms">
          <div class="magnetic-wrap" data-magnetic data-strength="0.22" data-max-offset="7">
            <button
              type="button"
              class="btn-hero-primary"
              data-scroll-target="projects"
            >
              <span>Explore My Projects</span>
              <?= render_icon('arrow-right', 'icon-sm btn-arrow') ?>
            </button>
          </div>

          <div class="magnetic-wrap" data-magnetic data-strength="0.2" data-max-offset="7">
            <a
              href="<?= e($profile['cvPdfPath']) ?>"
              download="Ayman_Fathima_CV.pdf"
              class="btn-hero-secondary"
            >
              <?= render_icon('download', 'icon-sm text-cyan') ?>
              <span>Download My Resume</span>
            </a>
          </div>
        </div>

        <div class="hero-socials hero-enter" style="--delay: 400ms">
          <a
            href="<?= e($profile['githubUrl']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="social-link"
          >
            <?= render_icon('github', 'icon-sm') ?>
            <span>GitHub</span>
          </a>
          <a
            href="<?= e($profile['linkedinUrl']) ?>"
            target="_blank"
            rel="noopener noreferrer"
            class="social-link"
          >
            <?= render_icon('linkedin', 'icon-sm') ?>
            <span>LinkedIn</span>
          </a>
          <a
            href="mailto:<?= e($profile['email']) ?>"
            class="social-link social-link-email"
          >
            <?= render_icon('mail', 'icon-sm') ?>
            <span>Email</span>
          </a>
        </div>
      </div>

      <!-- Right: Unobstructed Portrait in Glassmorphism Frame -->
      <div class="hero-right hero-enter-portrait" id="hero-portrait-stage">
        <div class="portrait-aura" aria-hidden="true"></div>

        <div class="floating-tech-chip" aria-hidden="true">
          <span>next.ts · node.js · mysql</span>
        </div>

        <div class="portrait-glass-frame" id="portrait-glass-frame">
          <div class="portrait-inner">
            <img
              src="<?= e($profile['heroImage']) ?>"
              alt="<?= e($profile['name']) ?> — Full-Stack Developer &amp; Software Engineer"
              referrerpolicy="no-referrer"
              class="portrait-img"
            />
          </div>
        </div>

        <div class="floating-pillars-card" id="floating-pillars-card">
          <ul class="pillars-list">
            <?php foreach ($brandPillars as $idx => $pillar): ?>
              <li class="pillar-item">
                <span><?= e($pillar) ?></span>
                <span class="pillar-index">0<?= $idx + 1 ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT & SKILLS SECTION -->
<section id="about" class="section-bordered">
  <div class="container">
    <div class="about-grid reveal" data-reveal>
      <div class="about-side">
        <p class="eyebrow">About</p>
        <h2 class="section-title">Background</h2>
        <p class="about-languages">
          Fluent in <?= e($profile['languages']) ?>.
        </p>
      </div>

      <div class="about-paragraphs">
        <?php foreach ($about['paragraphs'] as $paragraph): ?>
          <p><?= e($paragraph) ?></p>
        <?php endforeach; ?>
      </div>
    </div>

    <div id="skills" class="skills-block">
      <div class="reveal" data-reveal>
        <p class="eyebrow">Capabilities</p>
        <h2 class="section-title">Technical Skills</h2>
      </div>

      <dl class="skills-list">
        <?php foreach ($skills as $idx => $category): ?>
          <div class="skill-row reveal" data-reveal style="--stagger: <?= $idx * 45 ?>ms">
            <dt class="skill-title"><?= e($category['title']) ?></dt>
            <dd class="skill-items"><?= e(implode(' · ', $category['items'])) ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </div>
  </div>
</section>

<!-- EXPERIENCE SECTION -->
<section id="experience" class="section-bordered">
  <div class="container">
    <div class="reveal" data-reveal>
      <p class="eyebrow">Career</p>
      <h2 class="section-title">Experience</h2>
    </div>

    <div class="experience-list">
      <?php foreach ($experience as $idx => $item): ?>
        <article class="experience-card reveal" data-reveal style="--stagger: <?= $idx * 70 ?>ms">
          <div class="experience-meta">
            <h3 class="card-title"><?= e($item['role']) ?></h3>
            <p class="experience-org"><?= e($item['organization']) ?></p>
            <p class="experience-period">
              <?= e($item['period']) ?>
              <?= !empty($item['location']) ? ' · ' . e($item['location']) : '' ?>
            </p>
          </div>

          <div class="experience-body">
            <p class="experience-desc"><?= e($item['description']) ?></p>
            <ul class="dash-list">
              <?php foreach ($item['responsibilities'] as $resp): ?>
                <li>
                  <span class="dash-mark" aria-hidden="true">—</span>
                  <span><?= e($resp) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects" class="section-bordered">
  <div class="container">
    <div class="section-intro reveal" data-reveal>
      <p class="eyebrow">Work</p>
      <h2 class="section-title">Selected Projects</h2>
      <p class="section-subtitle">
        Client web platforms engineered with Next.js, TypeScript, Node.js,
        and relational databases.
      </p>
    </div>

    <div class="projects-grid">
      <?php foreach ($projects as $idx => $project): ?>
        <?php
        $projectJson = json_encode($project, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
        ?>
        <div class="project-cell reveal" data-reveal style="--stagger: <?= $idx * 65 ?>ms">
          <div class="magnetic-wrap magnetic-card-wrap" data-magnetic data-strength="0.04" data-max-offset="6">
            <article class="project-card">
              <?php if (!empty($project['image'])): ?>
                <button
                  type="button"
                  class="project-thumb-btn"
                  data-open-project='<?= $projectJson ?>'
                  aria-label="View details for <?= e($project['title']) ?>"
                >
                  <img
                    src="<?= e($project['image']) ?>"
                    alt="<?= e($project['imageAlt'] ?: $project['title']) ?>"
                    referrerpolicy="no-referrer"
                    class="project-thumb-img"
                  />
                  <span class="project-thumb-fade" aria-hidden="true"></span>
                </button>
              <?php endif; ?>

              <div class="project-card-body">
                <div>
                  <p class="project-category"><?= e($project['category']) ?></p>
                  <h3 class="project-title"><?= e($project['title']) ?></h3>
                  <p class="project-desc"><?= e($project['shortDescription']) ?></p>
                  <p class="project-stack"><?= e(implode(' · ', $project['stack'])) ?></p>
                </div>

                <div class="project-links">
                  <button
                    type="button"
                    class="project-case-btn"
                    data-open-project='<?= $projectJson ?>'
                  >
                    <span>View Case Study</span>
                    <?= render_icon('arrow-up-right', 'icon-xs') ?>
                  </button>

                  <?php if (!empty($project['liveUrl'])): ?>
                    <a
                      href="<?= e($project['liveUrl']) ?>"
                      target="_blank"
                      rel="noopener noreferrer"
                      class="project-live-link"
                    >
                      <?= render_icon('external-link', 'icon-xs') ?>
                      <span>Live Site</span>
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </article>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- RESEARCH SECTION -->
<section id="research" class="section-bordered">
  <div class="container">
    <div class="reveal" data-reveal>
      <p class="eyebrow">AI &amp; Research</p>
      <h2 class="section-title"><?= e($research['projectName']) ?></h2>
      <p class="research-subtitle"><?= e($research['subtitle']) ?></p>
    </div>

    <div class="research-panel reveal" data-reveal style="--stagger: 80ms">
      <p class="research-desc"><?= e($research['description']) ?></p>

      <ul class="dash-list research-notes">
        <?php foreach ($research['methodologyNotes'] as $note): ?>
          <li>
            <span class="dash-mark" aria-hidden="true">—</span>
            <span><?= e($note) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>

      <div class="research-footer">
        <p class="research-symposium">
          <?= e($publication['symposium']) ?> · <?= e($publication['status']) ?>
        </p>
      </div>
    </div>
  </div>
</section>

<!-- EDUCATION SECTION -->
<section id="education" class="section-bordered">
  <div class="container">
    <div class="education-grid">
      <div class="education-side reveal" data-reveal>
        <p class="eyebrow">Academic</p>
        <h2 class="section-title">Education</h2>
      </div>

      <div class="education-list">
        <?php foreach ($education as $idx => $edu): ?>
          <div class="education-item reveal <?= $idx === 0 ? 'education-item-first' : '' ?>" data-reveal style="--stagger: <?= $idx * 65 ?>ms">
            <div class="education-head">
              <h3 class="education-degree"><?= e($edu['degree']) ?></h3>
              <span class="education-period"><?= e($edu['period']) ?></span>
            </div>
            <p class="education-meta">
              <?= e($edu['institution']) ?><?= !empty($edu['faculty']) ? ' — ' . e($edu['faculty']) : '' ?> · <?= e($edu['status']) ?>
            </p>
          </div>
        <?php endforeach; ?>

        <div class="education-item education-certs reveal" data-reveal style="--stagger: 140ms">
          <h3 class="certs-title">Certifications</h3>
          <p class="certs-list"><?= e(implode(' · ', $certifications)) ?></p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
