<?php
declare(strict_types=1);

$navItems = [
    ['id' => 'about', 'label' => 'About'],
    ['id' => 'experience', 'label' => 'Experience'],
    ['id' => 'projects', 'label' => 'Projects'],
    ['id' => 'research', 'label' => 'Research'],
    ['id' => 'contact', 'label' => 'Contact'],
];
?>
<!doctype html>
<html lang="en" class="dark">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ayman Fathima — Full-Stack Developer &amp; Software Engineer</title>
    <meta
      name="description"
      content="Portfolio of Ayman Fathima, Software Engineer &amp; Full-Stack Developer building production web apps with Next.js, Node.js, MySQL, and AI adaptive learning research."
    />
    <meta
      name="keywords"
      content="Ayman Fathima, Full-Stack Developer, Software Engineer, Next.js, React, TypeScript, Node.js, AI Research, ProgFlex Tutor, Sri Lanka"
    />
    <meta name="author" content="Ayman Fathima" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Ayman Fathima Portfolio" />
    <meta
      property="og:title"
      content="Ayman Fathima — Full-Stack Developer &amp; Software Engineer"
    />
    <meta
      property="og:description"
      content="Full-Stack Developer with production web engineering experience and academic AI/ML research in adaptive learning systems."
    />
    <meta name="twitter:card" content="summary_large_image" />
    <meta
      name="twitter:title"
      content="Ayman Fathima — Full-Stack Developer &amp; Software Engineer"
    />
    <meta
      name="twitter:description"
      content="Building scalable web applications and exploring intelligent solutions through AI and Machine Learning."
    />
    <link rel="icon" type="image/svg+xml" href="assets/images/favicon.svg" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,400..600;1,9..40,400..600&family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Ayman Fathima",
        "jobTitle": "Software Engineer & Full-Stack Developer",
        "email": "mailto:aymnfathm12@gmail.com",
        "alumniOf": {
          "@type": "CollegeOrUniversity",
          "name": "University of Colombo"
        },
        "sameAs": [
          "https://github.com/aymanfathima",
          "https://www.linkedin.com/in/ayman-fathima-ayman12"
        ],
        "knowsAbout": [
          "Full-Stack Web Development",
          "Next.js",
          "React",
          "TypeScript",
          "Node.js",
          "MySQL",
          "PostgreSQL",
          "Reinforcement Learning",
          "Q-learning",
          "Bayesian Knowledge Tracing"
        ]
      }
    </script>
  </head>
  <body>
    <!-- Subtle Top-of-Screen Scroll Progress Bar -->
    <div class="scroll-progress-track" aria-hidden="true">
      <div class="scroll-progress-fill" id="scroll-progress-fill"></div>
    </div>

    <!-- Sticky 3-Zone Header -->
    <header class="site-header">
      <div class="container header-inner">
        <a href="#home" class="brand-link" data-scroll-target="home">
          <?= e($portfolio['profile']['name']) ?>
        </a>

        <nav class="desktop-nav" aria-label="Primary navigation">
          <?php foreach ($navItems as $item): ?>
            <a
              href="#<?= e($item['id']) ?>"
              class="nav-link"
              data-scroll-target="<?= e($item['id']) ?>"
            >
              <?= e($item['label']) ?>
            </a>
          <?php endforeach; ?>
        </nav>

        <div class="header-actions">
          <div class="magnetic-wrap desktop-cv-wrap" data-magnetic data-strength="0.22" data-max-offset="6">
            <a
              href="<?= e($portfolio['profile']['cvPdfPath']) ?>"
              download="Ayman_Fathima_CV.pdf"
              class="btn-cv-sm"
            >
              <?= render_icon('download', 'icon-sm') ?>
              <span>Download CV</span>
            </a>
          </div>

          <button
            type="button"
            id="mobile-menu-toggle"
            class="mobile-menu-btn"
            aria-expanded="false"
            aria-controls="mobile-navigation"
            aria-label="Open navigation menu"
          >
            <span class="menu-icon-open"><?= render_icon('menu', 'icon-md') ?></span>
            <span class="menu-icon-close" hidden><?= render_icon('x', 'icon-md') ?></span>
          </button>
        </div>
      </div>

      <div id="mobile-navigation" class="mobile-drawer" hidden>
        <nav class="mobile-nav-list" aria-label="Mobile navigation">
          <?php foreach ($navItems as $item): ?>
            <a
              href="#<?= e($item['id']) ?>"
              class="mobile-nav-link"
              data-scroll-target="<?= e($item['id']) ?>"
            >
              <?= e($item['label']) ?>
            </a>
          <?php endforeach; ?>
          <a
            href="<?= e($portfolio['profile']['cvPdfPath']) ?>"
            download="Ayman_Fathima_CV.pdf"
            class="btn-cv-mobile"
          >
            <?= render_icon('download', 'icon-sm') ?>
            <span>Download CV</span>
          </a>
        </nav>
      </div>
    </header>

    <main>
