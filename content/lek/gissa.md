Gissa nummret
===========================

Detta innehåll är skrivet i markdown och du hittar innehållet i filen `content/lek/gissa.md`.

Tanken är att du kan ha en samlingssida där du kan länka till egna testsidor och testroutes, inom eller utom din me-sida.



Testssida i `content/` {#ts}
---------------------------

Här är en sida `content/lek/markdown.md`, bara för att visa hur du länkar till den och når den via `lek/markdown`.

* [Testsida `lek/markdown`](lek/markdown)



Testroute {#te}
---------------------------

Du kan skriva egna routes i filen `router/000_lek.php`, där finns några enklare routehanterare som du kan utgå ifrån när du bygger dina egna.

* [Gissa mitt nummer (utanför me-sidan)](guess)
* [Hello world som JSON](lek/hello-world-json)
* [Gissa mitt nummer (inuti me-sidan)](lek/hello-world-page)

Du kan även skapa nya filer under `router/`, de läses in i ordning.



Testfiler {#tf}
---------------------------

Du kan också lägga till vanlig PHP-kod i filer under katalogen `htdocs/`, de kan du köra som vanliga PHP-program och du länkar direkt till dem.

* [Ett demo skript](demo/demo.php)
* [PHP info, detaljer om installationen](demo/phpinfo.php)
