<?php /** Skripte am Seitenende (jQuery, webflow.js, Analytics) und Dokumentende. */ ?>
<script src="/assets/js/jquery-3.5.1.min.js" type="text/javascript"></script>
<script src="/assets/js/webflow.schunk.36b8fb49256177c8.js" type="text/javascript"></script>
<script src="/assets/js/webflow.schunk.0c10309b43963a53.js" type="text/javascript"></script>
<script src="/assets/js/<?= e($page['webflow_js']) ?>" type="text/javascript"></script><!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZQ6S5J0H2K">
</script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZQ6S5J0H2K');
</script><?= $page['body_extra'] ?? '' ?><?php foreach ($page['scripts'] ?? [] as $src): ?>
<script src="<?= e($src) ?>" defer></script><?php endforeach; ?></body></html>
