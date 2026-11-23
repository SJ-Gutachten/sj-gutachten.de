<?php
/** Dokumentkopf. Erwartet $page (siehe Seiten-Dateien im Hauptverzeichnis). */
require_once __DIR__ . '/funktionen.php';
$title = e($page['title']);
$desc  = isset($page['description']) ? e($page['description']) : null;
?>
<!DOCTYPE html><!-- Last Published: Thu Jan 22 2026 16:18:24 GMT+0000 (Coordinated Universal Time) --><html data-wf-domain="www.sj-gutachten.de" data-wf-page="<?= e($page['wf_page']) ?>" data-wf-site="67ee50c9927ae4a9464a69cd" lang="de-DE"><head>
<meta charset="utf-8"/>
<title><?= $title ?></title>
<?php if ($desc !== null): ?><meta content="<?= $desc ?>" name="description"/><?php endif; ?>
<meta content="<?= $title ?>" property="og:title"/>
<?php if ($desc !== null): ?><meta content="<?= $desc ?>" property="og:description"/><?php endif; ?>
<meta content="<?= $title ?>" name="twitter:title"/>
<?php if ($desc !== null): ?><meta content="<?= $desc ?>" name="twitter:description"/><meta property="og:type" content="website"/><meta content="summary_large_image" name="twitter:card"/><?php endif; ?>
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<link href="/assets/css/sj-gutachten.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous"/>
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
<script type="text/javascript">WebFont.load({  google: {    families: ["Exo:100,100italic,200,200italic,300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic","Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic","Droid Sans:400,700","Lato:100,100italic,300,300italic,400,400italic,700,700italic,900,900italic","Raleway:300,regular,500,600,700,800","Roboto:300,regular,500,700","Barlow:300,regular,500,600,700","Barlow Condensed:300,regular,500,600,700","Nunito:300,regular,600,700","Dosis:300,regular,500,600","Play:regular,700","Cinzel:regular,700,900","Source Serif Pro:regular,600,700","EB Garamond:regular,500,600,700,800"]  }});</script>
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

<!-- Google Tag Manager -->
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5C4P7F6Z');
</script>
<!-- End Google Tag Manager --><?= $page['head_extra'] ?? '' ?></head>
<body<?= isset($page['body_class']) ? ' class="' . e($page['body_class']) . '"' : '' ?>>
