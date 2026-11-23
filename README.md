# sj-gutachten.de

Website des KFZ-Sachverständigenbüros SJ-Gutachten, München. Ursprünglich in Webflow gebaut, im November 2026
als schlanke PHP-Seite für das Hosting bei Hostinger aufbereitet. Design und Texte entsprechen
dem Webflow-Stand vom 22.01.2026.

- `ANALYSE.md` – Bestandsaufnahme des Webflow-Stands, Auffälligkeiten, bisherige URLs, DNS
- `CLAUDE.md` – Arbeitsregeln für die Bearbeitung mit Claude

## Aufbau

```
index.php, anfrage.php, success.php,         eine Datei pro Seite: Seitendaten ($page) + Inhalt
impressum.php, datenschutz.php, 404.php
anfrage-senden.php                           Empfänger des Kontaktformulars (verschickt die E-Mail)
includes/
  head.php                                   <head>: Titel, Meta-Angaben, CSS, Tag Manager
  header.php                                 Logo, Navigation mit Dropdown, Anruf-Button
  footer-gross.php                           großer Footer (Startseite, Anfrage)
  footer-klein.php                           kleiner Footer (Impressum, Datenschutz, Success)
  scripts.php                                Skripte am Seitenende, Google Analytics
  funktionen.php                             Hilfsfunktionen (Ausgabe, aktive Navigation, Formular-Token)
  config.php                                 Einstellungen (E-Mail-Empfänger, Spamschutz)
assets/
  css/sj-gutachten.css                       gesamtes Styling (aus Webflow übernommen)
  js/                                        jQuery, webflow.js (Menü, Animationen, Lightbox), anfrageformular.js
  img/                                       alle Bilder
storage/                                     Laufzeitdaten des Formulars (nicht im Repository, per .htaccess gesperrt)
.htaccess                                    Adressen ohne .php, Weiterleitungen, Schutz, Cache
robots.txt, sitemap.xml
```

Das Hauptverzeichnis des Repositorys ist zugleich das Web-Verzeichnis (`public_html`).
Die Hauptadresse ist `https://www.sj-gutachten.de` (mit `www`).

## Eine Seite bearbeiten

Jede Seite beginnt mit einem Block `$page = [...]` (Adresse, Titel, Beschreibung, bei Bedarf zusätzlicher Code
für `<head>` und Seitenende). Darunter steht der Inhalt als HTML. Header, Footer und Skripte werden eingebunden
und stehen nur einmal in `includes/`.

Neue Seite anlegen:

1. Eine bestehende Seite kopieren, z. B. `success.php` → `preise.php`.
2. In `$page` `path` (`/preise`), `title` und `description` anpassen. `wf_page` und `webflow_js` übernehmen.
3. Die Seite ist unter `/preise` erreichbar. In `sitemap.xml` eintragen und bei Bedarf in `includes/header.php` verlinken.

## Kontaktformular

`anfrage.php` schickt die Eingaben an `anfrage-senden.php`; nach erfolgreichem Versand folgt die Seite `/success`.
Der Empfänger steht in `includes/config.php` (`mail_to`, voreingestellt `info@sj-gutachten.de`). Anfragen werden
nur per E-Mail verschickt und nicht auf dem Server gespeichert.

Spamschutz ohne Drittanbieter: verstecktes Feld, Mindestzeit von 3 Sekunden zwischen Seitenaufruf und
Absenden, höchstens 5 Anfragen je Besucher und Stunde, höchstens 3 Links in der Nachricht.

Abweichende Einstellungen für einen einzelnen Server gehören in eine Datei `config.local.php` im
Hauptverzeichnis. Sie wird nicht ins Repository übernommen.

## Lokal testen

Benötigt Apache mit `mod_rewrite` und PHP ab 7.4 (z. B. Laragon), Web-Verzeichnis ist der Repository-Ordner.
Damit lokal keine E-Mails verschickt werden, `config.local.php` anlegen:

```php
<?php return ['mail_dry_run' => true];
```

Testanfragen landen dann in `storage/testmail.txt`.

## Veröffentlichen

- `main` ist der veröffentlichte Stand. Hostinger übernimmt jeden Push auf `main` automatisch nach `public_html`.
- Gearbeitet wird auf einem eigenen Branch (aktuell `umbau`). Erst nach Prüfung wird nach `main` übernommen.
- Nach dem Veröffentlichen prüfen: Startseite, `/anfrage` mit einer Testanfrage, `/anfrage/` und `/index.html`
  (müssen weiterleiten), eine erfundene Adresse (muss die 404-Seite zeigen).

## Bewusste Abweichungen vom Webflow-Original

- Das Kontaktformular sendet an `anfrage-senden.php` statt an das nicht vorhandene `formmail.php`. Die versteckten
  Felder des alten FormMail-Skripts (Empfänger, Zieladressen, Betreff) sind entfernt, dafür gibt es zwei
  unsichtbare Spamschutz-Felder.
- Die Webflow-Seite `/401` (Passwortschutz) entfällt; sie wurde nirgends verwendet.
- `/404` liefert jetzt den Status 404 statt 200.
- CSS, JavaScript und Bilder liegen lokal statt auf dem Webflow-CDN; die Dateien haben sprechende Namen.
- `/index.html` und Adressen mit `.html` oder `.php` leiten auf die Adresse ohne Endung weiter.

## Verbesserungen nach dem Umzug (November 2026)

- **Navigation:** Auf Unterseiten führen die Menüpunkte und das Orte-Dropdown jetzt zu den Abschnitten der Startseite (`/#Einsatzgebiet` usw.), das Logo zur Startseite.
- **Handy-Darstellung:** `/anfrage` und `/datenschutz` sind nicht mehr breiter als der Bildschirm (feste Containerbreite aufgehoben, lange Internetadressen brechen um).
- **Schriften lokal:** Die im CSS verwendeten Schriften liegen unter `assets/fonts`; Google Fonts und `webfont.js` werden nicht mehr geladen.
- **Bilder:** Karte, Hintergrundfoto und große Galeriebilder als WebP bzw. neu komprimiert, fehlende Bildmaße ergänzt.
- **Suchmaschinen:** Canonical-Tag und Vorschaubild auf allen Seiten; eine `<h1>` auf Startseite und `/anfrage`; korrekte Firmendaten und Öffnungszeiten in den strukturierten Daten; `/success` aus der Sitemap genommen und auf „nicht indexieren“ gesetzt.
- **Aufgeräumt auf `/anfrage`:** Verweise auf nicht vorhandene Dateien, doppelte Vorschau-Angaben und das Platzhalter-Analytics (`G-XXXXXXXXXX`) entfernt; Formularfelder für Screenreader beschriftet.

Überschriften, deren Ebene geändert wurde, tragen die Klasse `wie-h2`, damit sie aussehen wie zuvor.

Unverändert sind Impressum, Datenschutzerklärung und der Tracking-Code (Google Tag Manager, Google Analytics).
Das Vorschaubild für soziale Netzwerke ist vorerst das Logo; ein eigenes Bild im Format 1200 × 630 px wäre besser.
