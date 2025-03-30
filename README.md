# Semestrálny projekt na predmet WTECH
Pracujúci na projekte: Nikolas Kristín, Marek Penzeš
<br/><b>Názov obchodu:</b> Aura Attire
<br/><b>Rozdelenie zdrojového kódu:</b>
<br/><b>1. HTML </b> - obsahuje základný kód spolu aj s Javascriptom (neskôr aj JS bude v samostatných súboroch, ale nemáme toho veľa v JS, tak zatiaľ to máme takto)
<br/><b>2. CSS </b> - súbory obsahujúce štýlové úpravy šablón HTML a iných špecifikácií ako responzivita a pod.

<br/><b>Fungovanie jednotlivých šablón</b>
<br/><b>1. Main Page:</b> 
<br/> - obsahuje prekliky na iné stránky ako login/registrácia (login_reg), košík (shop_cart), všetky produkty (categories)...
<br/> - responzivita stránky
<br/><b>2. Categories:</b> 
<br/> - obsahuje prekliky na iné stránky ako login/registrácia (login_reg), košík (shop_cart), hlavnú stránku (main_page)...
<br/> - responzivita stránky
<br/> - obsahuje taktiež preklik na "singleitem" šablónu, kde je stránka adekvátne upravená pre každý produkt
<br/><b>3. Singleitem:</b> 
<br/> - obsahuje prekliky na iné stránky ako login/registrácia (login_reg), košík (shop_cart), hlavnú stránku (main_page)...
<br/> - responzivita stránky
<br/> - dá sa meniť veľkosť (farby a pridávanie do košíku až v 2. verzií)
<br/> - pri otvorení samostatnej šablóny neobsahuje ani obrázok ani meno, keďže je spravená pre produkt, ktorý otvoríte v "categories"
<br/><b>4. shop_cart:</b> 
<br/> - obsahuje rôzne prekliky na iné šablóny
<br/> - je tu zapracovaná mechanika pre zmenu počtov produktov, ich odstránenie alebo pridanie...
<br/><b>5. login_reg:</b> 
<br/> - obsahuje rôzne prekliky na iné šablóny
<br/> - na spodku stránky sa nachádza login pre admina, aby ste sa mohli dostať na profil admina (samozrejme toto vo finálnej verzií eshopu bude "tajný" údaj)
<br/><b>6.-8. Informácie o platbe:</b> 
<br/> - obsahuje rôzne prekliky na iné šablóny
<br/> - 3 šablóny, ktoré používateľ vidí pri objednávaní/platení za produkt
<br/> - pri zakliknutí možnosti "platba kartou" sa otvorí ďalšia stránka, kde užívateľ zadá online platobné údaje
<br/> - na koniec je tu finálne potvrdenie platby
<br/><b>9. admin_main:</b> 
<br/> - obsahuje rôzne prekliky na iné šablóny
<br/> - po zadaní potrebných údajov v login šablóne sa dostaneme na admin page, kde admin môže upravovať, pridávať alebo meniť produkty
<br/> - neskôr pridáme aj ďalšie potrebné funkcionality