<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Gyakori hibák javítása';
$_['heading_getting_started']              = 'Kezdő lépések';
$_['heading_setup']                        = 'Live Search beállítása';
$_['heading_troubleshot']                  = 'Gyakori hibakeresési lépések';
$_['heading_faq']                          = 'GYIK';
$_['heading_contact']                      = 'Kapcsolatfelvétel a támogatással';

// Text
$_['text_extension']                       = 'Bővítmények';
$_['text_success']                         = 'Siker: A Live Search modul módosítása megtörtént!';
$_['text_filter_success']                  = 'Siker: A felhasználatlan szűrők sikeresen eltávolítva!';
$_['text_edit']                            = 'Live Search Modul szerkesztése';
$_['text_getting_started']                 = '<p><strong>Áttekintés:</strong> A Playful Sparkle - Live Search egy fejlett keresési bővítmény az OpenCart 4-hez, amely a felhasználó gépelése közben dinamikusan jeleníti meg a keresési eredményeket egy legördülő menüben. Támogatja a termékek, kategóriák, gyártók és információs oldalak keresését, testreszabható miniatűr méretekkel, leírás hosszúságokkal és késleltetési beállításokkal a felhasználói élmény optimalizálása érdekében.</p><p><strong>Előfeltételek:</strong> OpenCart 4.x+, PHP 7.4+ vagy újabb</p>';
$_['text_setup']                           = '<ul><li><strong>Általános beállítások:</strong> Állítsa be a bemeneti késleltetést (alapértelmezett: 100 ms), hogy szabályozza az egyes billentyűleütések és a keresési eredmények megjelenítése közötti időt.</li><li><strong>Termékbeállítások:</strong><ul><li>Termék keresési eredmények engedélyezése/kikapcsolása.</li><li>Termékleírások megjelenítése engedélyezése/kikapcsolása; maximális leírási hossz beállítása (alapértelmezett: 100 karakter).</li><li>Termék miniatűrök engedélyezése/kikapcsolása; miniatűr szélesség és magasság beállítása (min: 16 px, max: 128 px).</li></ul></li><li><strong>Kategória beállítások:</strong><ul><li>Kategória keresési eredmények engedélyezése/kikapcsolása.</li><li>Kategória miniatűrök engedélyezése/kikapcsolása; miniatűr méretek beállítása (min: 16 px, max: 128 px).</li></ul></li><li><strong>Gyártó beállítások:</strong><ul><li>Gyártó keresési eredmények engedélyezése/kikapcsolása.</li><li>Gyártó miniatűrök engedélyezése/kikapcsolása; miniatűr méretek beállítása (min: 16 px, max: 128 px).</li></ul></li><li><strong>Információs oldalak beállítások:</strong><ul><li>Információs oldal keresési eredmények engedélyezése/kikapcsolása.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>A live keresés nem működik:</strong> Kattintson a "Fix Event Handler" gombra, ellenőrizze a bemeneti késleltetési beállítást, és győződjön meg róla, hogy a modul engedélyezve van.</li><li><strong>Hiányzó konkrét eredmények (Termék, Kategória, Gyártó, Információ):</strong> Ellenőrizze, hogy a megfelelő eredménykategória engedélyezve van-e a beállításokban.</li></ul>';
$_['text_faq']                             = '<details><summary>Mi az alapértelmezett bemeneti késleltetés?</summary> Az alapértelmezett bemeneti késleltetés 100 milliszekundumra van beállítva.</details><details><summary>Hogyan állíthatom be a maximális miniatűr méretet?</summary> A miniatűr méreteket 16 és 128 pixel közötti tartományban állíthatjuk be szélesség és magasság tekintetében.</details><details><summary>Hogyan korlátozhatom a termékleírás hosszát?</summary> A leírás hosszát a beállításokban lehet módosítani; az alapértelmezett 100 karakter.</details><details><summary>Miért nem jelenik meg néhány eredmény a legördülő menüben?</summary> Győződjön meg róla, hogy a konkrét eredménytípus (Termék, Kategória, Gyártó vagy Információ) engedélyezve van a modul beállításaiban.</details>';
$_['text_contact']                         = '<p>További segítségért kérjük, lépjen kapcsolatba támogatási csapatunkkal:</p><ul><li><strong>Kapcsolat:</strong> <a href="mailto:%s">%s</a></li><li><strong>Dokumentáció:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Felhasználói dokumentáció</a></li></ul>';

// Tab
$_['tab_general']                          = 'Általános';
$_['tab_products']                         = 'Termékek';
$_['tab_categories']                       = 'Kategóriák';
$_['tab_manufacturers']                    = 'Gyártók';
$_['tab_informations']                     = 'Információk';
$_['tab_help_and_support']                 = 'Segítség &amp; Támogatás';

// Entry
$_['entry_status']                         = 'Állapot';
$_['entry_input_delay']                    = 'Bemeneti késleltetés';
$_['entry_product_status']                 = 'Termékek megjelenítése';
$_['entry_category_status']                = 'Kategóriák megjelenítése';
$_['entry_category_image']                 = 'Kategória kép megjelenítése';
$_['entry_category_image_size']            = 'Kategória kép mérete (Sz x M)';
$_['entry_manufacturer_status']            = 'Gyártók megjelenítése';
$_['entry_manufacturer_image']             = 'Gyártó kép megjelenítése';
$_['entry_manufacturer_image_size']        = 'Gyártó kép mérete (Sz x M)';
$_['entry_information_status']             = 'Információk megjelenítése';
$_['entry_product_description']            = 'Termékleírás megjelenítése';
$_['entry_product_description_length']     = 'Termékleírás hossza';
$_['entry_product_image']                  = 'Termék kép megjelenítése';
$_['entry_product_image_size']             = 'Termék kép mérete (Sz x M)';
$_['entry_width']                          = 'Szélesség';
$_['entry_height']                         = 'Magasság';
$_['entry_input_min_chars']                = 'Min. karakter';

// Button
$_['button_fix_event_handler']             = 'Eseménykezelő javítása';

// Help
$_['help_input_delay']                     = 'Ez a beállítás meghatározza a késleltetési időt (ezredmásodpercben), amely a felhasználó billentyűleütése és az adatok kiszolgálóhoz történő küldése között telik el. Ennek a késleltetésnek a növelése csökkentheti a gyors gépelés során küldött kérések számát, javítva a teljesítményt és a kiszolgáló válaszidejét.';
$_['help_product_description_length']      = 'Adja meg a termékleírás maximális karakter számát. Ez a beállítás határozza meg, hogy hány karakter jelenik meg a live search eredmények között.';
$_['help_input_min_chars']                 = 'Adja meg a minimum karakterek számát, amely szükséges, mielőtt a keresési lekérdezés a szerverre kerülne.';

// Error
$_['error_permission']                     = 'Figyelmeztetés: Nincs engedélye a Live Search modul módosítására!';
$_['error_form']                           = 'A űrlap hibákat tartalmaz. Kérjük, javítsa ki a kiemelt mezőket.';
$_['error_input_delay_min']                = 'A bemeneti késleltetésnek legalább 100 milliszekundumnak kell lennie.';
$_['error_product_description_length_min'] = 'A termékleírás hossza nem lehet kevesebb, mint 0 karakter.';
$_['error_product_description_length_max'] = 'A termékleírás hossza nem haladhatja meg a 200 karaktert.';
$_['error_product_image_width_min']        = 'A termék képének szélessége legalább 16 pixel kell, hogy legyen.';
$_['error_product_image_width_max']        = 'A termék képének szélessége legfeljebb 128 pixel lehet.';
$_['error_product_image_height_min']       = 'A termék képének magassága legalább 16 pixel kell, hogy legyen.';
$_['error_product_image_height_max']       = 'A termék képének magassága legfeljebb 128 pixel lehet.';
$_['error_category_image_width_min']       = 'A kategória képének szélessége legalább 16 pixel kell, hogy legyen.';
$_['error_category_image_width_max']       = 'A kategória képének szélessége legfeljebb 128 pixel lehet.';
$_['error_category_image_height_min']      = 'A kategória képének magassága legalább 16 pixel kell, hogy legyen.';
$_['error_category_image_height_max']      = 'A kategória képének magassága legfeljebb 128 pixel lehet.';
$_['error_manufacturer_image_width_min']   = 'A gyártó képének szélessége legalább 16 pixel kell, hogy legyen.';
$_['error_manufacturer_image_width_max']   = 'A gyártó képének szélessége legfeljebb 128 pixel lehet.';
$_['error_manufacturer_image_height_min']  = 'A gyártó képének magassága legalább 16 pixel kell, hogy legyen.';
$_['error_manufacturer_image_height_max']  = 'A gyártó képének magassága legfeljebb 128 pixel lehet.';
$_['error_input_min_chars']                = 'A karakterek minimális hossza nem lehet kevesebb mint 1 karakter.';
