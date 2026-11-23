<?php
http_response_code(404);
$page = [
    'path'        => '/404',
    'title'       => 'Not Found',
    'wf_page'     => '67ee50c9927ae4a9464a69d4',   // Webflow-Seiten-ID, steuert die Animationen in webflow.js
    'webflow_js'  => 'webflow.5281b070.a9ce8bfc3ea505ac.js',
];
require __DIR__ . '/includes/head.php';
?>
<div class="utility-page-wrap">
<div class="utility-page-content w-form">
<h3 class="_404-error">Die Seite konnte nicht gefunden werden</h3>
</div>
</div>
<?php
require __DIR__ . '/includes/scripts.php';
