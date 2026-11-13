# Ayman Fathima Portfolio — HTML / CSS / PHP Version

This directory contains a complete, zero-build **HTML + CSS + PHP** version of the portfolio with all data, layout, dark aesthetic, animations, CV download, and real uploaded images preserved identically.

## Folder Structure

- `index.php` — Main portfolio page rendering all sections
- `data/portfolio.php` — All portfolio content, experience, projects, research, education, and links
- `includes/header.php` — `<head>` SEO/OpenGraph metadata, scroll progress bar, and sticky navbar
- `includes/footer.php` — Contact card, footer links, and Project Case Study modal
- `includes/icons.php` — HTML escaping helper `e()` and inline SVG icons
- `assets/css/style.css` — Pure standalone CSS (no Tailwind, no Node.js required)
- `assets/js/main.js` — Vanilla JS for scroll progress, magnetic hover, parallax, copy-email, mobile menu, and modal
- `assets/images/` — Portrait photograph, all 4 live website screenshots, and `favicon.svg`
- `assets/files/Ayman_Fathima_CV.pdf` — Downloadable resume PDF

## How to Run / Deploy

### Local PHP Server (PHP 7.4+ or 8.x)
```bash
cd php-project
php -S localhost:8000
```
Then open `http://localhost:8000` in your browser.

### Shared Hosting / Hostinger / cPanel / XAMPP
Upload the contents of `php-project/` directly into `public_html/` (or `htdocs/portfolio` for XAMPP). No `npm install` or build step is needed.
