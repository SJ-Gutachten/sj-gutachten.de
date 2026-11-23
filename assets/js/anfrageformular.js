/**
 * Kontaktformular auf /anfrage: sendet die Eingaben an /anfrage-senden.php.
 * Bei Erfolg geht es weiter zur Seite /success, bei Fehlern erscheint die Fehlermeldung im Formular.
 * Ohne JavaScript funktioniert das Formular weiterhin über eine normale Weiterleitung.
 */
(function () {
  var form = document.getElementById('wf-form-Kontaktformular');
  if (!form || !window.fetch || !window.FormData) return;

  var fail = form.parentNode.querySelector('.w-form-fail');
  var button = form.querySelector('input[type="submit"]');
  var label = button.value;

  if (/[?&]fehler=1/.test(window.location.search)) fail.style.display = 'block';

  form.addEventListener('submit', function (event) {
    event.preventDefault();
    button.value = button.getAttribute('data-wait') || label;
    button.disabled = true;
    fail.style.display = 'none';

    fetch(form.action, { method: 'POST', body: new FormData(form), headers: { Accept: 'application/json' } })
      .then(function (response) {
        return response.json().then(function (data) {
          if (!response.ok || !data.ok) throw new Error(data.grund || 'fehler');
        });
      })
      .then(function () {
        window.location.href = '/success';
      })
      .catch(function () {
        fail.style.display = 'block';
        button.value = label;
        button.disabled = false;
      });
  });
})();
