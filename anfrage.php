<?php
$page = [
    'path'        => '/anfrage',
    'title'       => 'KFZ Gutachter München – Jetzt kostenloses Unfallgutachten anfordern',
    'description' => 'Unfall gehabt? Als unabhängiger KFZ-Sachverständiger in München erstellen wir Ihr Gutachten schnell & kostenlos. Jetzt unverbindlich anfragen',
    'wf_page'     => '680a1e0eb4361f9f21f0ff5c',   // Webflow-Seiten-ID, steuert die Animationen in webflow.js
    'webflow_js'  => 'webflow.5281b070.a9ce8bfc3ea505ac.js',
    // Zusätzlicher Code im <head> nur dieser Seite
    'head_extra'  => <<<'HTML'
<!-- Canonical Tag -->
<link rel="canonical" href="https://www.sj-gutachten.de/anfrage" />

<!-- Open Graph Tags für bessere Darstellung auf Social Media -->
<meta property="og:title" content="KFZ Gutachter München – Jetzt kostenloses Unfallgutachten anfordern" />
<meta property="og:description" content="Unfall gehabt? Wir erstellen Ihr unabhängiges KFZ-Gutachten in München – schnell & kostenlos. Jetzt unverbindlich anfragen!" />
<meta property="og:url" content="https://www.sj-gutachten.de/anfrage" />
<meta property="og:type" content="website" />
<meta property="og:image" content="https://www.sj-gutachten.de/images/og-image.jpg" /> <!-- Bild-URL anpassen -->

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="KFZ Gutachter München – Jetzt kostenloses Unfallgutachten anfordern" />
<meta name="twitter:description" content="Wir erstellen Ihr unabhängiges Unfallgutachten – schnell & kostenlos." />
<meta name="twitter:image" content="https://www.sj-gutachten.de/images/og-image.jpg" />

<!-- Favicon -->
<link rel="icon" href="/favicon.ico" type="image/x-icon" />

<!-- Ladezeitoptimierung -->
<link rel="preload" as="image" href="/images/hero-gutachten.jpg"> <!-- Beispielbild -->
HTML,
    // Zusätzlicher Code am Seitenende nur dieser Seite
    'body_extra'  => <<<'HTML'
<!-- Google Analytics (GA4) – Tracking (wenn nicht vorhanden) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX'); // Ersetze G-XXXXXXXXXX mit deiner Google Analytics ID
</script>

<!-- Scroll to Top Smooth Behavior -->
<script>
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      document.querySelector(this.getAttribute("href")).scrollIntoView({ behavior: "smooth" });
    });
  });
</script>
HTML,
    'scripts'     => ['/assets/js/anfrageformular.js'],
];
header('Cache-Control: no-store'); // das Formular enthält ein zeitgebundenes Token
require __DIR__ . '/includes/head.php';
require __DIR__ . '/includes/header.php';
?>
<div id="kontakt" class="anfrage-section neue-seite">
<div class="maxwidth">
<div class="w-layout-blockcontainer container-anfrage-seite w-container">
<h2 class="heading-26">Kostenloses Beratungsgespräch </h2>
<p class="paragraph-58">Bitte füllen Sie das Formular aus, damit ich Sie kontaktieren kann.</p>
</div>
<div class="inhalt-nebeneinander1">
<div class="inhalt-untereinander1 left">
<h4 class="heading-links1 heading-1">Kontaktieren Sie uns</h4>
<p class="flie-text abstand">Am Ausbesserungswerk 8<br/>Motorworld<br/>80939 München<br/><br/>Telefon: <a href="tel:017632150533" class="link-12">017632150533</a><br/>E-mail: <a href="mailto:info@sj-gutachten.de" class="link-13">info@sj-gutachten.de</a></p>
<div class="form-text-3">Die mit einem * markierten Felder sind Pflichtfelder</div>
<div id="Kontaktformular" class="form-block-3 w-form">
<form id="wf-form-Kontaktformular" name="wf-form-Kontaktformular" data-name="Kontaktformular" method="post" action="/anfrage-senden.php" class="form">
<p class="paragraph-55">* Name</p><input class="neues-textfeld w-input" maxlength="256" name="Name-2" data-name="Name 2" placeholder="" type="text" id="Name-2" required=""/>
<p class="paragraph-55">* Email:</p><input class="neues-textfeld w-input" maxlength="256" name="Email-2" data-name="Email 2" placeholder="" type="email" id="Email-2" required=""/>
<p class="paragraph-55">* Telefon:</p><input class="neues-textfeld w-input" maxlength="256" name="Telefonnummer-2" data-name="Telefonnummer 2" placeholder="" type="tel" id="Telefonnummer-2" required=""/>
<p class="paragraph-55">*Nachricht</p>
<textarea required="" maxlength="5000" id="Nachricht-2" name="Nachricht-2" data-name="Nachricht 2" placeholder="" class="neues-textfeld nachricht w-input"></textarea><label class="w-checkbox checkbox-field">
<div class="w-checkbox-input w-checkbox-input--inputType-custom checkbox">
</div><input type="checkbox" id="Datenschutz-4" name="Datenschutz-4" data-name="Datenschutz 4" required="" style="opacity:0;position:absolute;z-index:-1"/><span for="Datenschutz-4" class="form-text-3 w-form-label">*Ich habe die <a href="/datenschutz" class="link-formular farbe-der-headings">Datenschutzerklärung</a> zur Kenntnis genommen.<br/>Ich stimme zu, dass meine Angaben zur Kontaktaufnahme und für Rückfragen dauerhaft gespeichert werden.</span></label><input type="submit" data-wait="Einen Moment bitte..." class="submit-button1 highlights flie-text w-button" value="Senden"/>
<?php /* Spamschutz: verstecktes Feld (muss leer bleiben) und Zeitstempel-Token, siehe anfrage-senden.php */ ?>
<div aria-hidden="true" style="position:absolute;left:-9999px;width:1px;height:1px;overflow:hidden"><label for="website">Bitte dieses Feld leer lassen</label><input type="text" name="website" id="website" tabindex="-1" autocomplete="off"/></div><input type="hidden" name="_ts" value="<?= e(form_token()) ?>"/>
</form>
<div class="w-form-done">
<div>Danke für Ihre Meldung! Wir werden Ihr Anliegen möglichst bald bearbeiten.</div>
</div>
<div class="w-form-fail">
<div>Oops! Etwas ist schiefgelaufen... Überprüfen Sie nochmal Ihre Eingaben oder versuchen Sie es später erneut.</div>
</div>
</div>
</div>
<div class="maps1"><a href="https://maps.app.goo.gl/rCpufY4j8qf7CUg1A" target="_blank" class="adresse w-inline-block"><img src="/assets/img/karte-standort.png" loading="lazy" sizes="100vw" srcset="/assets/img/karte-standort-p-500.png 500w, /assets/img/karte-standort-p-800.png 800w, /assets/img/karte-standort-p-1080.png 1080w, /assets/img/karte-standort.png 1474w" alt="" class="image-satandort"/></a>
</div>
</div>
</div>
</div>
<?php
require __DIR__ . '/includes/footer-gross.php';
require __DIR__ . '/includes/scripts.php';
