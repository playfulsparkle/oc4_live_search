<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Wyszukiwanie na żywo';
$_['heading_fix']                          = 'Napraw powszechne błędy';
$_['heading_getting_started']              = 'Pierwsze kroki';
$_['heading_setup']                        = 'Konfiguracja Wyszukiwania na żywo';
$_['heading_troubleshot']                  = 'Częste problemy';
$_['heading_faq']                          = 'FAQ';
$_['heading_contact']                      = 'Kontakt z pomocą techniczną';

// Text
$_['text_extension']                       = 'Rozszerzenia';
$_['text_success']                         = 'Sukces: Zmodyfikowano moduł Wyszukiwania na żywo!';
$_['text_filter_success']                  = 'Sukces: Nieużywane filtry zostały pomyślnie usunięte!';
$_['text_edit']                            = 'Edytuj moduł Wyszukiwania na żywo';
$_['text_getting_started']                 = '<p><strong>Przegląd:</strong> Playful Sparkle - Wyszukiwanie na żywo to zaawansowane rozszerzenie wyszukiwania dla OpenCart 4, zaprojektowane do dynamicznego wyświetlania wyników wyszukiwania w rozwijanym menu podczas pisania przez użytkownika. Obsługuje wyszukiwanie produktów, kategorii, producentów i stron informacyjnych, z konfigurowalnymi rozmiarami miniatur, długościami opisów i ustawieniami opóźnienia dla optymalnego doświadczenia użytkownika.</p><p><strong>Wymagania:</strong> OpenCart 4.x+, PHP 7.4+ lub nowszy</p>';
$_['text_setup']                           = '<ul><li><strong>Ustawienia ogólne:</strong> Skonfiguruj opóźnienie wprowadzania (domyślnie: 100 ms), aby kontrolować czas między naciśnięciami klawiszy a wyświetlaniem wyników wyszukiwania.</li><li><strong>Ustawienia produktów:</strong><ul><li>Włącz/Wyłącz wyniki wyszukiwania produktów.</li><li>Włącz/Wyłącz wyświetlanie opisów produktów; ustaw maksymalną długość opisu (domyślnie: 100 znaków).</li><li>Włącz/Wyłącz miniatury produktów; ustaw szerokość i wysokość miniatury (min: 16 px, max: 128 px).</li></ul></li><li><strong>Ustawienia kategorii:</strong><ul><li>Włącz/Wyłącz wyniki wyszukiwania kategorii.</li><li>Włącz/Wyłącz miniatury kategorii; ustaw wymiary miniatur (min: 16 px, max: 128 px).</li></ul></li><li><strong>Ustawienia producentów:</strong><ul><li>Włącz/Wyłącz wyniki wyszukiwania producentów.</li><li>Włącz/Wyłącz miniatury producentów; ustaw wymiary miniatur (min: 16 px, max: 128 px).</li></ul></li><li><strong>Ustawienia stron informacyjnych:</strong><ul><li>Włącz/Wyłącz wyniki wyszukiwania stron informacyjnych.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>Wyszukiwanie na żywo nie działa:</strong> Kliknij przycisk "Napraw obsługę zdarzeń", sprawdź ustawienie opóźnienia wprowadzania i upewnij się, że moduł jest włączony.</li><li><strong>Brakuje określonych wyników (Produkt, Kategoria, Producent, Informacje):</strong> Sprawdź, czy odpowiednia kategoria wyników jest włączona w ustawieniach.</li></ul>';
$_['text_faq']                             = '<details><summary>Jakie jest domyślne opóźnienie wprowadzania?</summary> Domyślne opóźnienie wprowadzania jest ustawione na 100 milisekund.</details><details><summary>Jak ustawić maksymalny rozmiar miniatur?</summary> Rozmiary miniatur można ustawić w zakresie od 16 do 128 pikseli szerokości i wysokości.</details><details><summary>Jak ograniczyć długość opisu produktu?</summary> Długość opisu można dostosować w ustawieniach; domyślna to 100 znaków.</details><details><summary>Dlaczego niektóre wyniki nie są wyświetlane w rozwijanym menu?</summary> Upewnij się, że określony typ wyniku (Produkt, Kategoria, Producent lub Informacje) jest włączony w ustawieniach modułu.</details>';
$_['text_contact']                         = '<p>Aby uzyskać dalszą pomoc, skontaktuj się z naszym zespołem wsparcia:</p><ul><li><strong>Kontakt:</strong> <a href="mailto:%s">%s</a></li><li><strong>Dokumentacja:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Dokumentacja użytkownika</a></li></ul>';

// Tab
$_['tab_general']                          = 'Ogólne';
$_['tab_products']                         = 'Produkty';
$_['tab_categories']                       = 'Kategorie';
$_['tab_manufacturers']                    = 'Producenci';
$_['tab_informations']                     = 'Informacje';
$_['tab_help_and_support']                 = 'Pomoc i wsparcie';

// Entry
$_['entry_status']                         = 'Status';
$_['entry_input_delay']                    = 'Opóźnienie wprowadzania';
$_['entry_product_status']                 = 'Pokaż produkty';
$_['entry_category_status']                = 'Pokaż kategorie';
$_['entry_category_image']                 = 'Pokaż obraz kategorii';
$_['entry_category_image_size']            = 'Rozmiar obrazu kategorii (S x W)';
$_['entry_manufacturer_status']            = 'Pokaż producentów';
$_['entry_manufacturer_image']             = 'Pokaż obraz producenta';
$_['entry_manufacturer_image_size']        = 'Rozmiar obrazu producenta (S x W)';
$_['entry_information_status']             = 'Pokaż informacje';
$_['entry_product_description']            = 'Pokaż opis produktu';
$_['entry_product_description_length']     = 'Długość opisu produktu';
$_['entry_product_image']                  = 'Pokaż obraz produktu';
$_['entry_product_image_size']             = 'Rozmiar obrazu produktu (S x W)';
$_['entry_product_price']                  = 'Pokaż cenę produktu';
$_['entry_width']                          = 'Szerokość';
$_['entry_height']                         = 'Wysokość';
$_['entry_input_min_chars']                = 'Min. znaków';

// Button
$_['button_fix_event_handler']             = 'Napraw obsługę zdarzeń';

// Help
$_['help_input_delay']                     = 'To ustawienie określa czas opóźnienia (w milisekundach) między naciśnięciem klawisza przez użytkownika a wysłaniem danych na serwer. Zwiększenie tego opóźnienia może pomóc zmniejszyć liczbę żądań wysyłanych podczas szybkiego wprowadzania tekstu, poprawiając wydajność i czas odpowiedzi serwera.';
$_['help_product_description_length']      = 'Określ maksymalną liczbę znaków opisu produktu. To ustawienie określa, ile znaków będzie wyświetlanych w wynikach wyszukiwania na żywo.';
$_['help_input_min_chars']                 = 'Określ minimalną liczbę znaków wymaganych przed wysłaniem zapytania do serwera.';

// Error
$_['error_permission']                     = 'Ostrzeżenie: Nie masz uprawnień do modyfikowania modułu Wyszukiwania na żywo!';
$_['error_form']                           = 'Formularz zawiera błędy. Popraw zaznaczone pola.';
$_['error_input_delay_min']                = 'Opóźnienie wprowadzania musi wynosić co najmniej 100 milisekund.';
$_['error_product_description_length_min'] = 'Długość opisu produktu nie może być mniejsza niż 0 znaków.';
$_['error_product_description_length_max'] = 'Długość opisu produktu nie może przekraczać 200 znaków.';
$_['error_product_image_width_min']        = 'Szerokość obrazu produktu musi wynosić co najmniej 16 pikseli.';
$_['error_product_image_width_max']        = 'Szerokość obrazu produktu nie może przekraczać 128 pikseli.';
$_['error_product_image_height_min']       = 'Wysokość obrazu produktu musi wynosić co najmniej 16 pikseli.';
$_['error_product_image_height_max']       = 'Wysokość obrazu produktu nie może przekraczać 128 pikseli.';
$_['error_category_image_width_min']       = 'Szerokość obrazu kategorii musi wynosić co najmniej 16 pikseli.';
$_['error_category_image_width_max']       = 'Szerokość obrazu kategorii nie może przekraczać 128 pikseli.';
$_['error_category_image_height_min']      = 'Wysokość obrazu kategorii musi wynosić co najmniej 16 pikseli.';
$_['error_category_image_height_max']      = 'Wysokość obrazu kategorii nie może przekraczać 128 pikseli.';
$_['error_manufacturer_image_width_min']   = 'Szerokość obrazu producenta musi wynosić co najmniej 16 pikseli.';
$_['error_manufacturer_image_width_max']   = 'Szerokość obrazu producenta nie może przekraczać 128 pikseli.';
$_['error_manufacturer_image_height_min']  = 'Wysokość obrazu producenta musi wynosić co najmniej 16 pikseli.';
$_['error_manufacturer_image_height_max']  = 'Wysokość obrazu producenta nie może przekraczać 128 pikseli.';
$_['error_input_min_chars']                = 'Minimalna długość wprowadzania nie może być mniejsza niż 1 znak.';
