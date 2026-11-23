<?php /** Seitenkopf mit Logo und Navigation. Auf der Startseite springen die Menüpunkte zu den Abschnitten der Seite. */
$start = $page['path'] === '/' ? '' : '/'; // auf Unterseiten zur Startseite springen
?>
<div id="top" class="navbar1">
<div id="w-node-c6693b0b-a1c5-932e-0311-781fed7cf581-ed7cf574" class="w-layout-layout quick-stack wf-layout-layout">
<div class="w-layout-cell cell">
<div class="logo-abstand1"><a href="<?= $page['path'] === '/' ? '#' : '/' ?>" class="logo w-inline-block"><img width="1200" height="150" alt="SJ Gutachten München " src="/assets/img/logo-sj-gutachten.jpg" loading="lazy" class="logo-bild handy"/></a>
</div>
</div>
<div class="w-layout-cell cell">
<div data-collapse="medium" data-animation="default" data-duration="400" data-easing="ease" data-easing2="ease" role="banner" class="navbar-6 hauptfarbe w-nav">
<div class="maxwidth flex-mittig">
<nav role="navigation" class="nav-men-1 hauptfarbe w-nav-menu"><a <?= nav_attrs('/', 'nav-link-3 flie-text current w-nav-link') ?>>Home</a><a href="<?= $start ?>#Einsatzgebiet" class="nav-link-3 flie-text current w-nav-link">Leistungen</a><a href="<?= $start ?>#ber-mich" class="nav-link-3 flie-text current w-nav-link">Über mich</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text current w-nav-link">SCHADENSGUTACHTEN</a><a href="<?= $start ?>#FAQ" class="nav-link-3 flie-text current w-nav-link">FAQ</a>
<div data-delay="0" data-hover="false" class="dropdown-2 w-dropdown">
<div class="dropdown-toggle-2 w-dropdown-toggle">
</div>
<nav class="dropdown-list-2 w-dropdown-list"><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Haar</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Neufahrn bei Freising</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Gräfelfing</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Pullach im Isarta</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Starnberg</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Dachau</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Germering</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Purchheim</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Karlsfeld</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Vaterstetten</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Kirchheim bei München</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Markt Schwaben</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Feldkirchen</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Freising</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Garching bei München</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Ismaning</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Ottobrunn</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Planegg</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Unterföhring</a><a href="<?= $start ?>#Schadensgutachten" class="nav-link-3 flie-text w-nav-link">Unterschleißheim</a>
</nav>
</div>
</nav>
<div class="men-buttton1 hauptfarbe w-nav-button">
<div class="men-icon1 w-icon-nav-menu">
</div>
</div>
</div>
</div>
</div>
<div class="w-layout-cell cell handy"><a href="tel:017632150533" class="termin-button heading-3 highlights _1 nummer handy w-button">Jetzt anrufen</a>
</div>
</div>
</div>
