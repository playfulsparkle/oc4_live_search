<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Исправление распространенных ошибок';
$_['heading_getting_started']              = 'Начало работы';
$_['heading_setup']                        = 'Настройка Live Search';
$_['heading_troubleshot']                  = 'Типичные проблемы';
$_['heading_faq']                          = 'Часто задаваемые вопросы';
$_['heading_contact']                      = 'Контакты службы поддержки';

// Text
$_['text_extension']                       = 'Расширения';
$_['text_success']                         = 'Успех: Вы успешно изменили модуль Live Search!';
$_['text_filter_success']                  = 'Успех: Неиспользуемые фильтры были успешно удалены!';
$_['text_edit']                            = 'Редактирование модуля Live Search';
$_['text_getting_started']                 = '<p><strong>Обзор:</strong> Playful Sparkle - Live Search — это расширение для OpenCart 4, предназначенное для динамического отображения результатов поиска в выпадающем списке по мере ввода. Оно поддерживает поиск по товарам, категориям, производителям и информационным страницам, с возможностью настройки размеров миниатюр, длины описания и задержки для оптимального пользовательского опыта.</p><p><strong>Требования:</strong> OpenCart 4.x+, PHP 7.4+ или выше</p>';
$_['text_setup']                           = '<ul><li><strong>Общие настройки:</strong> Настройте задержку ввода (по умолчанию: 100 мс), чтобы контролировать время между нажатиями клавиш и отображением результатов поиска.</li><li><strong>Настройки товаров:</strong><ul><li>Включить/Выключить результаты поиска по товарам.</li><li>Включить/Выключить отображение описаний товаров; установить максимальную длину описания (по умолчанию: 100 символов).</li><li>Включить/Выключить миниатюры товаров; задать ширину и высоту миниатюр (мин: 16 пикселей, макс: 128 пикселей).</li></ul></li><li><strong>Настройки категорий:</strong><ul><li>Включить/Выключить результаты поиска по категориям.</li><li>Включить/Выключить миниатюры категорий; задать размеры миниатюр (мин: 16 пикселей, макс: 128 пикселей).</li></ul></li><li><strong>Настройки производителей:</strong><ul><li>Включить/Выключить результаты поиска по производителям.</li><li>Включить/Выключить миниатюры производителей; задать размеры миниатюр (мин: 16 пикселей, макс: 128 пикселей).</li></ul></li><li><strong>Настройки информационных страниц:</strong><ul><li>Включить/Выключить результаты поиска по информационным страницам.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>Live Search не работает:</strong> Нажмите кнопку "Исправить обработчик событий", проверьте настройку задержки ввода и убедитесь, что модуль включен.</li><li><strong>Отсутствуют конкретные результаты (Товар, Категория, Производитель, Информация):</strong> Убедитесь, что соответствующий тип результата включен в настройках.</li></ul>';
$_['text_faq']                             = '<details><summary>Какова стандартная задержка ввода?</summary> Стандартная задержка ввода составляет 100 миллисекунд.</details><details><summary>Как установить максимальный размер миниатюр?</summary> Размер миниатюр можно установить в пределах от 16 до 128 пикселей по ширине и высоте.</details><details><summary>Как ограничить длину описания товара?</summary> Длину описания можно настроить в настройках, по умолчанию это 100 символов.</details><details><summary>Почему не отображаются некоторые результаты в выпадающем списке?</summary> Убедитесь, что конкретный тип результата (Товар, Категория, Производитель или Информация) включен в настройках модуля.</details>';
$_['text_contact']                         = '<p>Для получения дополнительной помощи, пожалуйста, свяжитесь с нашей службой поддержки:</p><ul><li><strong>Контакт:</strong> <a href="mailto:%s">%s</a></li><li><strong>Документация:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Документация пользователя</a></li></ul>';

// Tab
$_['tab_general']                          = 'Общие';
$_['tab_products']                         = 'Товары';
$_['tab_categories']                       = 'Категории';
$_['tab_manufacturers']                    = 'Производители';
$_['tab_informations']                     = 'Информация';
$_['tab_help_and_support']                 = 'Помощь и поддержка';

// Entry
$_['entry_status']                         = 'Статус';
$_['entry_input_delay']                    = 'Задержка ввода';
$_['entry_product_status']                 = 'Показывать товары';
$_['entry_category_status']                = 'Показывать категории';
$_['entry_category_image']                 = 'Показывать изображение категории';
$_['entry_category_image_size']            = 'Размер изображения категории (Ш x В)';
$_['entry_manufacturer_status']            = 'Показывать производителей';
$_['entry_manufacturer_image']             = 'Показывать изображение производителя';
$_['entry_manufacturer_image_size']        = 'Размер изображения производителя (Ш x В)';
$_['entry_information_status']             = 'Показывать информацию';
$_['entry_product_description']            = 'Показывать описание товара';
$_['entry_product_description_length']     = 'Длина описания товара';
$_['entry_product_image']                  = 'Показывать изображение товара';
$_['entry_product_image_size']             = 'Размер изображения товара (Ш x В)';
$_['entry_width']                          = 'Ширина';
$_['entry_height']                         = 'Высота';
$_['entry_input_min_chars']                = 'Минимум символов для ввода';

// Button
$_['button_fix_event_handler']             = 'Исправить обработчик событий';

// Help
$_['help_input_delay']                     = 'Эта настройка указывает время задержки (в миллисекундах) между тем, как пользователь нажимает клавишу, и моментом отправки данных на сервер. Увеличение задержки может помочь уменьшить количество запросов, отправляемых при быстром вводе, улучшая производительность и время отклика сервера.';
$_['help_product_description_length']      = 'Укажите максимальное количество символов для описания товара. Эта настройка определяет, сколько символов будет отображаться в результатах живого поиска.';
$_['help_input_min_chars']                 = 'Укажите минимальное количество символов, которое должно быть введено перед отправкой поискового запроса на сервер.';

// Error
$_['error_permission']                     = 'Предупреждение: У вас нет прав для изменения модуля Live Search!';
$_['error_form']                           = 'Форма содержит ошибки. Пожалуйста, исправьте выделенные поля.';
$_['error_input_delay_min']                = 'Задержка ввода должна быть не менее 100 миллисекунд.';
$_['error_product_description_length_min'] = 'Длина описания товара не может быть меньше 0 символов.';
$_['error_product_description_length_max'] = 'Длина описания товара не может превышать 200 символов.';
$_['error_product_image_width_min']        = 'Ширина изображения товара должна быть не менее 16 пикселей.';
$_['error_product_image_width_max']        = 'Ширина изображения товара не может превышать 128 пикселей.';
$_['error_product_image_height_min']       = 'Высота изображения товара должна быть не менее 16 пикселей.';
$_['error_product_image_height_max']       = 'Высота изображения товара не может превышать 128 пикселей.';
$_['error_category_image_width_min']       = 'Ширина изображения категории должна быть не менее 16 пикселей.';
$_['error_category_image_width_max']       = 'Ширина изображения категории не может превышать 128 пикселей.';
$_['error_category_image_height_min']      = 'Высота изображения категории должна быть не менее 16 пикселей.';
$_['error_category_image_height_max']      = 'Высота изображения категории не может превышать 128 пикселей.';
$_['error_manufacturer_image_width_min']   = 'Ширина изображения производителя должна быть не менее 16 пикселей.';
$_['error_manufacturer_image_width_max']   = 'Ширина изображения производителя не может превышать 128 пикселей.';
$_['error_manufacturer_image_height_min']  = 'Высота изображения производителя должна быть не менее 16 пикселей.';
$_['error_manufacturer_image_height_max']  = 'Высота изображения производителя не может превышать 128 пикселей.';
$_['error_input_min_chars']                = 'Минимальная длина ввода не может быть менее 1 символа.';
