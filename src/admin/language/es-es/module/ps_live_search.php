<?php
// Heading
$_['heading_title']                        = 'Playful Sparkle - Live Search';
$_['heading_fix']                          = 'Corregir errores comunes';
$_['heading_getting_started']              = 'Comenzando';
$_['heading_setup']                        = 'Configurando Live Search';
$_['heading_troubleshot']                  = 'Solución de problemas comunes';
$_['heading_faq']                          = 'Preguntas Frecuentes';
$_['heading_contact']                      = 'Contactar Soporte';

// Text
$_['text_extension']                       = 'Extensiones';
$_['text_success']                         = 'Éxito: ¡Has modificado el módulo Live Search!';
$_['text_filter_success']                  = 'Éxito: ¡Los filtros no utilizados fueron eliminados correctamente!';
$_['text_edit']                            = 'Editar módulo Live Search';
$_['text_getting_started']                 = '<p><strong>Resumen:</strong> Playful Sparkle - Live Search es una extensión de búsqueda avanzada para OpenCart 4, diseñada para mostrar los resultados de búsqueda de forma dinámica en un menú desplegable mientras el usuario escribe. Soporta búsquedas de productos, categorías, fabricantes y páginas de información, con tamaños de miniaturas personalizables, longitudes de descripciones y configuraciones de retraso para una experiencia de usuario óptima.</p><p><strong>Requisitos:</strong> OpenCart 4.x+, PHP 7.4+ o superior</p>';
$_['text_setup']                           = '<ul><li><strong>Ajustes generales:</strong> Configura el retraso de entrada (por defecto: 100 ms) para controlar el tiempo entre las pulsaciones de teclas y la visualización de los resultados de búsqueda.</li><li><strong>Ajustes de productos:</strong><ul><li>Habilitar/Deshabilitar resultados de búsqueda de productos.</li><li>Habilitar/Deshabilitar la visualización de descripciones de productos; establece la longitud máxima de la descripción (por defecto: 100 caracteres).</li><li>Habilitar/Deshabilitar miniaturas de productos; establece el ancho y la altura de las miniaturas (mín.: 16 px, máx.: 128 px).</li></ul></li><li><strong>Ajustes de categorías:</strong><ul><li>Habilitar/Deshabilitar resultados de búsqueda de categorías.</li><li>Habilitar/Deshabilitar miniaturas de categorías; establece las dimensiones de las miniaturas (mín.: 16 px, máx.: 128 px).</li></ul></li><li><strong>Ajustes de fabricantes:</strong><ul><li>Habilitar/Deshabilitar resultados de búsqueda de fabricantes.</li><li>Habilitar/Deshabilitar miniaturas de fabricantes; establece las dimensiones de las miniaturas (mín.: 16 px, máx.: 128 px).</li></ul></li><li><strong>Ajustes de páginas de información:</strong><ul><li>Habilitar/Deshabilitar resultados de búsqueda de páginas de información.</li></ul></li></ul>';
$_['text_troubleshot']                     = '<ul><li><strong>La búsqueda en vivo no funciona:</strong> Haz clic en el botón "Corregir manejador de eventos", verifica la configuración del retraso de entrada y asegúrate de que el módulo esté habilitado.</li><li><strong>Faltan resultados específicos (Producto, Categoría, Fabricante, Información):</strong> Confirma que la categoría de resultados relevante esté habilitada en los ajustes.</li></ul>';
$_['text_faq']                             = '<details><summary>¿Cuál es el retraso de entrada por defecto?</summary> El retraso de entrada por defecto está configurado en 100 milisegundos.</details><details><summary>¿Cómo puedo establecer el tamaño máximo de las miniaturas?</summary> El tamaño de las miniaturas se puede configurar dentro de un rango de 16 a 128 píxeles tanto para el ancho como para la altura.</details><details><summary>¿Cómo puedo limitar la longitud de la descripción del producto?</summary> La longitud de la descripción se puede ajustar en los ajustes; el valor predeterminado es 100 caracteres.</details><details><summary>¿Por qué no aparecen algunos resultados en el menú desplegable?</summary> Asegúrate de que el tipo de resultado específico (Producto, Categoría, Fabricante o Información) esté habilitado en los ajustes del módulo.</details>';
$_['text_contact']                         = '<p>Para más asistencia, por favor contacta a nuestro equipo de soporte:</p><ul><li><strong>Contacto:</strong> <a href="mailto:%s">%s</a></li><li><strong>Documentación:</strong> <a href="%s" target="_blank" rel="noopener noreferrer">Documentación del usuario</a></li></ul>';

// Tab
$_['tab_general']                          = 'General';
$_['tab_products']                         = 'Productos';
$_['tab_categories']                       = 'Categorías';
$_['tab_manufacturers']                    = 'Fabricantes';
$_['tab_informations']                     = 'Informaciones';
$_['tab_help_and_support']                 = 'Ayuda y Soporte';

// Entry
$_['entry_status']                         = 'Estado';
$_['entry_input_delay']                    = 'Retraso de entrada';
$_['entry_product_status']                 = 'Mostrar productos';
$_['entry_category_status']                = 'Mostrar categorías';
$_['entry_category_image']                 = 'Mostrar imagen de categoría';
$_['entry_category_image_size']            = 'Tamaño de imagen de categoría (An x Al)';
$_['entry_manufacturer_status']            = 'Mostrar fabricantes';
$_['entry_manufacturer_image']             = 'Mostrar imagen de fabricante';
$_['entry_manufacturer_image_size']        = 'Tamaño de imagen de fabricante (An x Al)';
$_['entry_information_status']             = 'Mostrar informaciones';
$_['entry_product_description']            = 'Mostrar descripción del producto';
$_['entry_product_description_length']     = 'Longitud de la descripción del producto';
$_['entry_product_image']                  = 'Mostrar imagen del producto';
$_['entry_product_image_size']             = 'Tamaño de imagen del producto (An x Al)';
$_['entry_width']                          = 'Ancho';
$_['entry_height']                         = 'Alto';
$_['entry_input_min_chars']                = 'Mín. caracteres de entrada';

// Button
$_['button_fix_event_handler']             = 'Corregir manejador de eventos';

// Help
$_['help_input_delay']                     = 'Este ajuste especifica el tiempo de retraso (en milisegundos) entre cuando el usuario presiona una tecla y cuando los datos son enviados al servidor. Aumentar este retraso puede ayudar a reducir la cantidad de solicitudes enviadas durante una entrada rápida, mejorando el rendimiento y los tiempos de respuesta del servidor.';
$_['help_product_description_length']      = 'Especifica el número máximo de caracteres para la descripción del producto. Este ajuste determina cuántos caracteres se mostrarán en los resultados de búsqueda en vivo.';
$_['help_input_min_chars']                 = 'Especifica el número mínimo de caracteres requeridos antes de que se envíe una consulta de búsqueda al servidor.';

// Error
$_['error_permission']                     = 'Advertencia: ¡No tienes permiso para modificar el módulo Live Search!';
$_['error_form']                           = 'El formulario contiene errores. Por favor, corrige los campos marcados.';
$_['error_input_delay_min']                = 'El retraso de entrada debe ser al menos 100 milisegundos.';
$_['error_product_description_length_min'] = 'La longitud de la descripción del producto no puede ser menor que 0 caracteres.';
$_['error_product_description_length_max'] = 'La longitud de la descripción del producto no puede superar los 200 caracteres.';
$_['error_product_image_width_min']        = 'El ancho de la imagen del producto debe ser al menos 16 píxeles.';
$_['error_product_image_width_max']        = 'El ancho de la imagen del producto no puede ser mayor a 128 píxeles.';
$_['error_product_image_height_min']       = 'La altura de la imagen del producto debe ser al menos 16 píxeles.';
$_['error_product_image_height_max']       = 'La altura de la imagen del producto no puede ser mayor a 128 píxeles.';
$_['error_category_image_width_min']       = 'El ancho de la imagen de la categoría debe ser al menos 16 píxeles.';
$_['error_category_image_width_max']       = 'El ancho de la imagen de la categoría no puede ser mayor a 128 píxeles.';
$_['error_category_image_height_min']      = 'La altura de la imagen de la categoría debe ser al menos 16 píxeles.';
$_['error_category_image_height_max']      = 'La altura de la imagen de la categoría no puede ser mayor a 128 píxeles.';
$_['error_manufacturer_image_width_min']   = 'El ancho de la imagen del fabricante debe ser al menos 16 píxeles.';
$_['error_manufacturer_image_width_max']   = 'El ancho de la imagen del fabricante no puede ser mayor a 128 píxeles.';
$_['error_manufacturer_image_height_min']  = 'La altura de la imagen del fabricante debe ser al menos 16 píxeles.';
$_['error_manufacturer_image_height_max']  = 'La altura de la imagen del fabricante no puede ser mayor a 128 píxeles.';
$_['error_input_min_chars']                = 'La longitud mínima de entrada no puede ser inferior a 1 carácter.';
