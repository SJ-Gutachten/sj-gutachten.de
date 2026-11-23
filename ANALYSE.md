# Analyse: sj-gutachten.de (Webflow-Stand vom 22.01.2026)

Bestandsaufnahme der bei Webflow veröffentlichten Website vor dem Umzug zu Hostinger.
Erhoben am 23.11.2026 über den Webflow-Connector (nur lesend) und die veröffentlichte Seite.
Der unveränderte Originalstand liegt im ersten Commit auf `main` („Webflow-Export (Original)“).

## 1. Herkunft der Daten und Vollständigkeit

| Quelle | Liefert | Liefert nicht |
|---|---|---|
| Webflow-Connector | Seitenliste mit SEO-Titeln und Descriptions, Formulardefinition, Custom Code (Head/Footer), CMS-Collections (keine vorhanden) | HTML, CSS und JavaScript der Seiten – ein Code-Export ist über den Connector nicht möglich |
| Veröffentlichte Seite | HTML aller 7 Seiten, 1 CSS-Datei, jQuery und webflow.js, 76 Bilder | Inhalte, die im Designer geändert, aber nicht veröffentlicht wurden |

Der Stand reicht aus, um die Seite 1:1 nachzubauen; die Export-ZIP aus dem Designer wurde nicht benötigt.

Einschränkung: Webflow meldet „zuletzt geändert 23.11.2026“, veröffentlicht wurde zuletzt am 22.01.2026.
Falls seitdem im Designer etwas geändert und nicht veröffentlicht wurde, fehlt es hier. Übernommen wurden
nur Dateien, die die Live-Seite tatsächlich verwendet.

## 2. Seiten

Alle Adressen unter `https://www.sj-gutachten.de` (mit `www`).

| URL | Titel | Meta-Description | In Sitemap |
|---|---|---|---|
| `/` | KFZ Gutachter München – SJ-Gutachten \| Unfallgutachten vom Experten | Unabhängiger KFZ-Sachverständiger in München: SJ-Gutachten erstellt Ihr Unfallgutachten kostenlos, schnell & rechtssicher. Jetzt Termin vereinbaren! | ja |
| `/anfrage` | KFZ Gutachter München – Jetzt kostenloses Unfallgutachten anfordern | Unfall gehabt? Als unabhängiger KFZ-Sachverständiger in München erstellen wir Ihr Gutachten schnell & kostenlos. Jetzt unverbindlich anfragen | ja |
| `/impressum` | Impressum \| Saša Jovanović - Ihr KFZ-Gutachter | Hier finden Sie unser Impressum für weitere Informationen stehen wir Ihnen gerne zur Verfügung. | ja |
| `/datenschutz` | Datenschutz \| Saša Jovanović - Ihr KFZ-Gutachter | Hier finden Sie unseren Datenschutz für weitere Informationen stehen wir Ihnen gerne zur Verfügung. | ja |
| `/success` | Success | – (keine) | ja |
| `/401` | Protected page | – (keine) | nein |
| `/404` und jede unbekannte Adresse | Not Found | eigene Webflow-Seite: „Die Seite konnte nicht gefunden werden“ | nein |

Die Startseite ist ein Onepager mit den Sprungmarken `#Einsatzgebiet`, `#ber-mich`, `#Schadensgutachten` und `#FAQ`.

## 3. CMS-Collections

Keine. Die Website besteht ausschließlich aus statischen Seiten.

## 4. Was ohne Webflow-Hosting nicht mehr läuft

| Funktion | Bisher | Nach dem Umzug |
|---|---|---|
| **Kontaktformular** (`/anfrage`) | Felder Name, E-Mail, Telefon, Nachricht, Datenschutz-Checkbox (alle Pflicht). Das Formular sendet nicht an Webflow, sondern an `https://www.sj-gutachten.de/formmail.php`. **Diese Datei existiert nicht (404) – das Formular ist derzeit defekt, Anfragen gehen verloren.** | Eigener PHP-Handler `anfrage-senden.php` mit Spamschutz; danach Weiterleitung auf `/success`, wie ursprünglich vorgesehen. |
| Empfänger | Im Formular steht als verstecktes Feld `recipients` der Wert `info&hey@sj-gutachten.de` (Schreibweise des alten FormMail-Skripts). | Voreingestellt ist `info@sj-gutachten.de`, Betreff unverändert „Neues Kontaktformular eingegangen!“. |
| **Passwortschutz** (`/401`) | Webflow-Standardseite | Entfällt, keine Seite ist geschützt. |
| **Suche** | nicht vorhanden | – |
| **404-Seite** | eigene Webflow-Seite | `404.php` mit gleichem Inhalt |
| **Sitemap / robots.txt** | von Webflow erzeugt | statische Dateien, Inhalt unverändert |
| **Bilder-CDN** | `cdn.prod.website-files.com` | lokal unter `assets/img` |
| **Weiterleitungen** | `http → https`, ohne `www` → mit `www`, `/seite/ → /seite` | gleiches Verhalten über `.htaccess` |

## 5. Externe Skripte, Tracking, Einbettungen

| Dienst | Wo | Einbindung | Anmerkung |
|---|---|---|---|
| Google Tag Manager `GTM-5C4P7F6Z` | alle Seiten | Custom Code im Head | lädt sofort, ohne Einwilligung abzuwarten |
| Google Analytics `G-ZQ6S5J0H2K` | alle Seiten | gtag.js im Footer | lädt sofort, ohne Einwilligung |
| Google Analytics `G-XXXXXXXXXX` | `/anfrage` | zweites gtag-Snippet | Platzhalter-Kennung aus einer Vorlage, ohne Funktion |
| Cookie-Banner / Consent-Tool | – | **nicht eingebunden** | Die Datenschutzerklärung nennt consentmanager, auf der Seite wird aber kein Consent-Skript geladen. |
| Google Fonts | alle Seiten | `webfont.js`, 15 Schriftfamilien | siehe Abschnitt 7 |
| Vimeo (über Embedly) | Startseite | `<iframe>` von `cdn.embedly.com`, Video `1081100840` | lädt sofort |
| Elfsight | Startseite, Abschnitt Referenzen | `static.elfsight.com/platform/platform.js`, Widget `17210ba1-c903-46d3-b124-f266f511c1f2` (lazy) | unabhängig vom Hoster; auf der neuen Adresse prüfen, ob das Widget an die Domain gebunden ist |
| WhatsApp | Startseite | Link `wa.me/4917632150533` | nur Link |
| Wikimedia | Startseite | ein Bild von `upload.wikimedia.org` | jetzt lokal gespeichert |
| Facebook, Instagram, Google Maps | Footer | nur Links | keine eingebetteten Skripte |
| `platzhalterabcd.de/customerpreview/saveToken.js` | nur `/401` | Skript-Einbindung | Domain nicht erreichbar; entfällt mit der 401-Seite |

Die Datenschutzerklärung nennt Google Fonts, Adobe Fonts und consentmanager. **Nicht geändert**, aber zu prüfen:
Sie sollte zu den tatsächlich eingesetzten Diensten passen (Google Tag Manager, Google Analytics, Vimeo/Embedly,
Elfsight; Adobe Fonts und consentmanager werden nicht verwendet) und den Hosting-Anbieter nennen.

## 6. Abhängigkeiten von webflow.js

webflow.js (rund 210 KB in drei Dateien) und jQuery (87 KB) werden gebraucht für:

| Funktion | Wo | Hinweis |
|---|---|---|
| Navigation mit Hamburger-Menü (`w-nav`) | alle Seiten | |
| Dropdown im Menü (`w-dropdown`) | alle Seiten | Liste der Einsatzorte |
| Einblend-Animationen (`data-w-id`) | Startseite, 7 Elemente starten unsichtbar | hängen an der Seiten-ID `data-wf-page` im `<html>`-Tag |
| Lightbox (`w-lightbox`) | Startseite, Galerie | funktioniert |
| Formular (`w-form`) | `/anfrage` | wurde wegen der eigenen Zieladresse nie von webflow.js verschickt |

Die Dateien wurden unverändert übernommen. Pro Seite wird eine von drei Varianten der dritten Datei geladen.

## 7. Ungenutztes, Dateigrößen

**Schriften.** Geladen werden 15 Familien (Exo, Open Sans, Ubuntu, Droid Sans, Lato, Raleway, Roboto, Barlow,
Barlow Condensed, Nunito, Dosis, Play, Cinzel, Source Serif Pro, EB Garamond) mit über 80 Schnitten. Das CSS
verwendet davon 7 (Exo, Open Sans, Ubuntu, Droid Sans, Lato, Raleway, Roboto). Die übrigen 8 werden nirgends
benutzt. Zusätzlich verlangt das CSS „Poiret One“, das nicht geladen wird.

**CSS.** Eine Datei, 68 KB. Von 244 eigenen Klassen kommen 59 auf keiner Seite vor (z. B. `speise-karte-downloaden`,
`essen-bild2`, `ffnungszeiten` – Reste einer Restaurant-Vorlage). Im Custom Code des Heads stehen Regeln für
`nav`, `nav ul`, `.menu-button`, die auf alle `<nav>`-Elemente wirken.

**JavaScript.** Rund 300 KB (jQuery + webflow.js).

**Custom Code.** Am Seitenende der Startseite erzwingt ein Block `* { pointer-events: auto !important; }` und
`overflow: auto !important` für `html, body` – offenbar ein Notbehelf gegen ein blockiertes Scrollen.

**Bilder.** 76 Dateien, 6,8 MB. Auffällig:

| Datei (neu) | Größe | Anmerkung |
|---|---|---|
| `galerie-7f23883e.webp` | 748 KB | Galeriebild in voller Auflösung; kleinere Varianten vorhanden |
| `karte-standort.png` | 619 KB | Kartenbild als PNG, 1474 px breit |
| `adobestock-17496330-visu.jpg` | 531 KB | Hintergrundbild aus dem CSS |
| `favicon-transparent.ico` | 279 KB | sehr großes Favicon |
| `logo-sj-gutachten.jpg` | – | Logo als JPG mit schwarzem Hintergrund, im HTML mit 1200 × 150 px angegeben |

## 8. SEO

- **Keine `<h1>`** auf Startseite, `/anfrage` und `/success`. Die Startseite beginnt mit `<h2>`.
- **Strukturierte Daten der Startseite enthalten Platzhalter:** Typ `AutoRepair` (Werkstatt statt Sachverständiger),
  Adresse „Musterstraße 1, 80331 München“, Telefon „+49-89-12345678“ statt Am Ausbesserungswerk 8, 80939 München
  und 0176 32150533.
- **Verweise auf nicht vorhandene Dateien** (alle 404): `/images/logo.png` (strukturierte Daten),
  `/images/og-image.jpg` (Vorschaubild für soziale Netzwerke auf `/anfrage`), `/images/hero-gutachten.jpg`
  (Preload auf `/anfrage`), `/favicon.ico` (zweite Favicon-Angabe auf `/anfrage`).
- **Canonical-Tag** nur auf `/anfrage`; dort stehen Open-Graph- und Twitter-Angaben doppelt (Webflow und Custom Code)
  mit unterschiedlichen Beschreibungen.
- **`/success` steht in der Sitemap**, Titel „Success“ ist englisch, keine Meta-Description.
- **Navigation auf Unterseiten defekt:** Auf `/anfrage`, `/impressum`, `/datenschutz` und `/success` zeigen
  „Leistungen“, „Über mich“ und „FAQ“ auf `#` statt auf die Abschnitte der Startseite. Der Menüpunkt
  „Schadensgutachten“ und alle Orte im Dropdown zeigen auf `#Schadensgutachten`, das es dort nicht gibt.
- **Logo-Link** führt auf `#` statt zur Startseite.
- **Sprungmarke `#ber-mich`** (aus „Über mich“, Umlaut verloren) – funktioniert, ist aber unschön.
- **Zwei Footer-Varianten:** Startseite und `/anfrage` haben den großen Footer, die übrigen Seiten einen kleinen.

## 9. Barrierefreiheit und Darstellung

- **Seite breiter als der Bildschirm auf dem Handy:** Bei 375 px Breite ist `/anfrage` 660 px breit und
  `/datenschutz` 406 px – man kann seitlich scrollen. (Im Nachbau unverändert so übernommen.)
- Formularfelder haben keine `<label>`, die Beschriftung steht in `<p>`-Absätzen ohne Zuordnung.
- Die Checkbox ist unsichtbar (`opacity:0`), die sichtbare Ersatz-Box ist ein `<div>`.
- Hamburger-Schaltfläche ohne beschriftenden Text.
- 9 von 59 Bildern mit leerem Alt-Text, 35 ohne `width`/`height`.
- 34 Links mit `href="#"` (siehe Navigation).

## 10. Bisherige URLs und Weiterleitungen

Alle Adressen bleiben erhalten, es sind **keine 301-Weiterleitungen auf neue Adressen nötig**.

| Bisherige URL | Status bisher | Nach dem Umzug |
|---|---|---|
| `/` | 200 | 200 (`index.php`) |
| `/anfrage` | 200 | 200 (`anfrage.php`) |
| `/impressum` | 200 | 200 (`impressum.php`) |
| `/datenschutz` | 200 | 200 (`datenschutz.php`) |
| `/success` | 200 | 200 (`success.php`) |
| `/success.html` (Ziel im alten Formular) | 404 | 301 → `/success` |
| `/404` | 200 | 404 (zeigt die 404-Seite) |
| `/401` | 200 | 404 (Seite entfällt, war nie verlinkt) |
| `/formmail.php` | 404 | 404 (ersetzt durch `/anfrage-senden.php`) |
| `/sitemap.xml`, `/robots.txt` | 200 | 200 |
| `/index.html` | 200 (Kopie der Startseite) | 301 → `/` |
| `/anfrage/` | 301 → `/anfrage` | 301 → `/anfrage` |
| `http://…` | 301 → `https://…` | 301 → `https://…` |
| `sj-gutachten.de/…` (ohne `www`) | 301 → `www.sj-gutachten.de/…` | 301 → `www.sj-gutachten.de/…` |

## 11. DNS-Ist-Zustand (23.11.2026, nur gelesen)

| Eintrag | Wert | Bedeutung |
|---|---|---|
| NS | `ns5.kasserver.com`, `ns6.kasserver.com` | DNS wird bei All-Inkl verwaltet |
| A `sj-gutachten.de` | `198.202.211.1` | Webflow |
| CNAME `www` | `cdn.webflow.com` | Webflow |
| MX | `w02011ed.kasserver.com` | E-Mail bei All-Inkl – **bleibt unverändert** |
| TXT (SPF) | `v=spf1 a mx include:spf.kasserver.com ~all` | **bleibt unverändert** |
| TXT `_dmarc` | `v=DMARC1; p=none;` | **bleibt unverändert** |
| TXT | `google-site-verification=…` | Google Search Console, bleibt |

Für den Umzug müssen nur der A-Eintrag der Hauptdomain und der Eintrag für `www` geändert werden.
