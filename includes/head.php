<?php
/** Dokumentkopf. Erwartet $page (siehe Seiten-Dateien im Hauptverzeichnis). */
require_once __DIR__ . '/funktionen.php';
$title = e($page['title']);
$desc  = isset($page['description']) ? e($page['description']) : null;
$basis = 'https://www.sj-gutachten.de';
?>
<!DOCTYPE html><!-- Last Published: Thu Jan 22 2026 16:18:24 GMT+0000 (Coordinated Universal Time) --><html data-wf-domain="www.sj-gutachten.de" data-wf-page="<?= e($page['wf_page']) ?>" data-wf-site="67ee50c9927ae4a9464a69cd" lang="de-DE"><head>
<meta charset="utf-8"/>
<title><?= $title ?></title>
<?php if ($desc !== null): ?><meta content="<?= $desc ?>" name="description"/><?php endif; ?>
<meta content="<?= $title ?>" property="og:title"/>
<?php if ($desc !== null): ?><meta content="<?= $desc ?>" property="og:description"/><?php endif; ?>
<meta content="<?= $title ?>" name="twitter:title"/>
<?php if ($desc !== null): ?><meta content="<?= $desc ?>" name="twitter:description"/><meta property="og:type" content="website"/><meta content="summary_large_image" name="twitter:card"/><?php endif; ?>
<?php if (!empty($page['noindex'])): ?><meta name="robots" content="noindex"/>
<?php else: ?><link rel="canonical" href="<?= e($basis . ($page['path'] === '/' ? '/' : $page['path'])) ?>"/>
<?php endif; ?><meta property="og:image" content="<?= $basis ?>/assets/img/logo-sj-gutachten.jpg"/>
<meta name="twitter:image" content="<?= $basis ?>/assets/img/logo-sj-gutachten.jpg"/>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<link href="<?= e(asset('/assets/css/sj-gutachten.css')) ?>" rel="stylesheet" type="text/css"/>
<link href="<?= e(asset('/assets/css/schriften.css')) ?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript">!function(o,c){var n=c.documentElement,t=" w-mod-";n.className+=t+"js",("ontouchstart"in o||o.DocumentTouch&&c instanceof DocumentTouch)&&(n.className+=t+"touch")}(window,document);</script>
<link href="/assets/img/wordpress-transparent-32x32.png" rel="shortcut icon" type="image/x-icon"/>
<link href="/assets/img/favicon-transparent.ico" rel="apple-touch-icon"/>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<style>
  /* ====== Dein Barrierefrei-CSS (bereinigt) ====== */
  body {
    font-family: Arial, sans-serif;
    background-color: #ffffff;
    color: #222222; /* hoher Kontrast */
    margin: 0;

    /* WICHTIG: padding am body macht IMMER Rand -> Seite wirkt nie vollflächig */
    padding: 0;
  }

  nav {
    background-color: #005fa3; /* starker Kontrast */
    padding: 10px;
  }

  nav ul {
    list-style: none;
    display: flex;
    gap: 15px;
    padding: 0;
    margin: 0;
  }

  nav a {
    color: #ffffff;
    text-decoration: none;
    font-weight: bold;
  }

  nav a:focus,
  nav a:hover {
    text-decoration: underline;
  }

  .menu-button {
    background-color: #007b33;
    color: #ffffff;
    border: none;
    padding: 10px 16px;
    font-size: 1rem;
    cursor: pointer;
  }

  .menu-button:focus {
    outline: 3px solid #ffcc00;
  }

  .icon-only {
    font-size: 1.2rem;
  }

  .visually-hidden {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border: 0;
  }

  /* ====== Fix: Fullscreen + kein Side-Scroll auf Mobile ====== */
  html, body {
    height: 100%;
    margin: 0;
    padding: 0;
  }

  body {
    overflow-x: hidden;
  }

  img, video, iframe, canvas, svg {
    max-width: 100%;
    height: auto;
  }

  .startseite-1.neuer-hintergrund {
    width: 100%;
    max-width: none;

    /* besser als 100vh auf Mobile */
    min-height: 100svh;

    /* du hattest margin-top:112px -> macht "nicht voll". Wir nutzen padding-top */
    margin-top: 0;
    padding-top: 112px;

    /* background muss cover sein */
    background-size: cover, cover;
    background-position: center, center;
    background-repeat: no-repeat, no-repeat;

    box-sizing: border-box;
  }

  @media screen and (max-width: 479px) {
    /* vorher waren hier 800px Breiten -> Side-Scroll */
    .feature-image {
      width: 100% !important;
      max-width: 100% !important;
      height: auto !important;
    }

    .bildcover-100-1 {
      width: 100% !important;
      max-width: 100% !important;
      height: 100% !important;
      object-fit: cover;
    }

    /* dein Mobile-Navbar-Offset aus deinem CSS */
    .startseite-1.neuer-hintergrund {
      padding-top: 57px;
    }
  }
</style>

<!-- Statistik: lädt erst nach Zustimmung, siehe assets/js/einwilligung.js -->
<script>window.EINWILLIGUNG = { ga: 'G-ZQ6S5J0H2K', dienste: 'Google Analytics' };</script>
<script src="<?= e(asset('/assets/js/einwilligung.js')) ?>" defer></script><?= $page['head_extra'] ?? '' ?></head>
<body<?= isset($page['body_class']) ? ' class="' . e($page['body_class']) . '"' : '' ?>>
