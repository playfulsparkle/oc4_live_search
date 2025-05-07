+(function ($) {
  $.fn.pslivesearch = function (option) {
    var defaults = {
      options: {
        input_min_chars: 1,
        input_delay: 100
      },
      translations: {},
      source: null
    };

    /**
     * Check if object has valid property
     * @param {object} obj - Object to check
     * @param {string} prop - Property name
     * @return {boolean} - True if property exists and is not null/undefined
     */
    function hasValidProp(obj, prop) {
      return obj && typeof obj === 'object' && Object.prototype.hasOwnProperty.call(obj, prop)
    }

    /**
     * Get safe translation
     * @param {object} translations - Translations object
     * @param {string} key - Translation key
     * @return {string} - Translation or empty string
     */
    function getTranslation(translations, key) {
      return hasValidProp(translations, key) ? translations[key] : key;
    }

    return this.each(function () {
      var element = this;
      var $element = $(element);
      var config = $.extend(true, {}, defaults, option);
      $.extend(element, config);

      var $dropdown = $("#" + $element.attr("data-live-search-target"));
      var debounceTimer;
      var currentIndex = -1;
      var $items = [];
      var canRunFocus = true;

      // ARIA attributes setup
      $element.attr({
        "autoComplete": "off",
        "aria-autocomplete": "list",
        "aria-expanded": "false",
        "aria-owns": $element.attr("data-live-search-target"),
        role: "combobox"
      });

      // Event handlers
      $element.on("focusin.psls", function () {
        if (canRunFocus) element.request();
      });

      $element.on("focusout.psls", function (e) {
        if (!$dropdown.has(e.relatedTarget).length && e.relatedTarget !== element) {
          element.closeDropdown();
        }
      });

      $dropdown.on('keydown.psls', '.ps-live-search-item', handleDropdownNavigation);
      $element.on("keydown.psls", handleInputNavigation);
      $element.on("input.psls", handleInput);

      function handleInputNavigation(e) {
        switch (e.key) {
          case 'ArrowDown':
          case 'Down':
            e.preventDefault();
            if ($items.length > 0) {
              currentIndex = 0;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            }
            break;
          case 'ArrowUp':
          case 'Up':
            e.preventDefault();
            if ($items.length > 0) {
              currentIndex = $items.length - 1;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            }
            break;
          case 'Escape':
          case 'Esc':
            e.preventDefault();
            element.closeDropdown();
            break;
        }
      }

      function handleDropdownNavigation(e) {
        switch (e.key) {
          case 'ArrowDown':
          case 'Down':
            e.preventDefault();
            if (currentIndex < $items.length - 1) {
              currentIndex++;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            } else {
              element.focusToInput();
            }
            break;
          case 'ArrowUp':
          case 'Up':
            e.preventDefault();
            if (currentIndex > 0) {
              currentIndex--;
              $items.eq(currentIndex).attr('tabindex', '0').focus();
            } else {
              element.focusToInput();
            }
            break;
          case 'Enter':
            e.preventDefault();
            if (currentIndex > -1) {
              $items.eq(currentIndex)[0].click();
            }
            break;
        }
      }

      function handleInput() {
        var query = $element.val();

        if (typeof query !== 'string') {
          throw new Error('Query must be a string');
        }

        if (query.length < element.options.input_min_chars) {
          element.closeDropdown();

          return;
        }

        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(element.request, element.options.input_delay);
      }

      // Plugin methods
      element.focusToInput = function () {
        currentIndex = -1;
        canRunFocus = false;
        $element.trigger('focus');
        setTimeout(() => canRunFocus = true, 100);
      };

      element.closeDropdown = function () {
        $dropdown.removeClass("show").html("");

        $element.attr("aria-expanded", "false");
      };

      element.showDropdown = function () {
        currentIndex = -1;

        $dropdown
          .html('<li><span class="ps-live-search-item-loading"><i class="fa fa-circle-notch fa-spin"></i></span></li>')
          .addClass("show");

        $element.attr("aria-expanded", "true");
      };

      element.request = function () {
        var query = $element.val();

        if (query.length > 0 && hasValidProp(element, 'source') && typeof element.source === 'function') {
          element.showDropdown();

          element.source(query, $.proxy(element.response, element));
        }
      };

      element.response = function (json) {
        if (!json || typeof json !== 'object') {
          throw new Error('Invalid JSON response structure');
        }

        for (var section of ['products', 'categories', 'manufacturers', 'informations']) {
          if (!hasValidProp(json, section)) {
            throw new Error(`Missing required section: ${section}`);
          }
        }

        var query = $element.val();
        var html = "";
        var url_more = $('base').attr('href') + 'index.php?route=product/search&language=' +
          $dropdown.attr('data-lang') + '&search=' + encodeURIComponent(query);

        html += '<li><span class="ps-live-search-subheader">' + getTranslation(this.translations, 'text_showing_results') + '</span></li>';

        if (hasValidProp(json.products, 'status') && json.products.status) {
          html += '<li><h3 class="ps-live-search-header">' + getTranslation(this.translations, 'heading_products') + '</h3></li>';

          var show_price = hasValidProp(json.products, 'show_price') ? json.products.show_price : false;

          if (
            hasValidProp(json.products, 'data') &&
            Array.isArray(json.products.data) &&
            json.products.data.length > 0
          ) {
            for (var product of json.products.data) {
              for (var section of ['href', 'name', 'description', 'price', 'special', 'tax', 'thumb', 'thumb_width', 'thumb_height']) {
                if (!hasValidProp(product, section)) {
                  throw new Error(`Missing required product section: ${section}`);
                }
              }

              html += '<li><a href="' + product.href + '" class="ps-live-search-item">';
              if (product.thumb) {
                html += '<img class="thumb" src="' + product.thumb + '" alt="' + product.name + '" width="' + Number(product.thumb_width) + '" height="' + Number(product.thumb_height) + '">';
              }
              html += '<span class="info"><strong class="name">' + product.name + '</strong>';
              if (product.description) {
                html += '<span class="description">' + product.description + '</span>';
              }
              html += '</span>';
              if (show_price) {
                html += '<span class="prices">';
                if (!product.special) {
                  html += '<span class="price-new">' + product.price + '</span>';
                } else {
                  html += '<span class="price-old">' + product.price + '</span>';
                  html += '<span class="price-new">' + product.special + '</span>';
                }
                if (product.tax) {
                  html += '<span class="price-tax">' + product.tax + '</span>';
                }
                html += '</span>';
              }
              html += '</a></li>';
            }
          } else {
            html += '<li><span class="ps-live-search-item-text">' + getTranslation(this.translations, 'text_no_results') + '</span></li>';
          }
        }

        if (hasValidProp(json.categories, 'status') && json.categories.status) {
          html += '<li><h3 class="ps-live-search-header">' + getTranslation(this.translations, 'heading_categories') + '</h3></li>';

          if (
            hasValidProp(json.categories, 'data') &&
            Array.isArray(json.categories.data) &&
            json.categories.data.length > 0
          ) {
            for (var category of json.categories.data) {
              for (var section of ['href', 'name', 'thumb', 'thumb_width', 'thumb_height']) {
                if (!hasValidProp(category, section)) {
                  throw new Error(`Missing required category section: ${section}`);
                }
              }

              html += '<li><a href="' + category.href + '" class="ps-live-search-item">';
              if (category.thumb) {
                html += '<img class="thumb" src="' + category.thumb + '" alt="' + category.name + '" width="' + Number(category.thumb_width) + '" height="' + Number(category.thumb_height) + '">';
              }
              html += '<span class="info"><span class="name">' + category.name + '</span></span></a></li>';
            }
          } else {
            html += '<li><span class="ps-live-search-item-text">' + getTranslation(this.translations, 'text_no_results') + '</span></li>';
          }
        }

        if (hasValidProp(json.manufacturers, 'status') && json.manufacturers.status) {
          html += '<li><h3 class="ps-live-search-header">' + getTranslation(this.translations, 'heading_manufacturers') + '</h3></li>';

          if (
            hasValidProp(json.manufacturers, 'data') &&
            Array.isArray(json.manufacturers.data) &&
            json.manufacturers.data.length > 0
          ) {
            for (var manufacturer of json.manufacturers.data) {
              for (var section of ['href', 'name', 'thumb', 'thumb_width', 'thumb_height']) {
                if (!hasValidProp(manufacturer, section)) {
                  throw new Error(`Missing required manufacturer section: ${section}`);
                }
              }

              html += '<li><a href="' + manufacturer.href + '" class="ps-live-search-item">';
              if (manufacturer.thumb) {
                html += '<img class="thumb" src="' + manufacturer.thumb + '" alt="' + manufacturer.name + '" width="' + Number(manufacturer.thumb_width) + '" height="' + Number(manufacturer.thumb_height) + '">';
              }
              html += '<span class="info"><span class="name">' + manufacturer.name + '</span></span></a></li>';
            }
          } else {
            html += '<li><span class="ps-live-search-item-text">' + getTranslation(this.translations, 'text_no_results') + '</span></li>';
          }
        }

        if (hasValidProp(json.informations, 'status') && json.informations.status) {
          html += '<li><h3 class="ps-live-search-header">' + getTranslation(this.translations, 'heading_informations') + '</h3></li>';

          if (
            hasValidProp(json.informations, 'data') &&
            Array.isArray(json.informations.data) &&
            json.informations.data.length > 0
          ) {
            for (var information of json.informations.data) {
              for (var section of ['href', 'name']) {
                if (!hasValidProp(information, section)) {
                  throw new Error(`Missing required information section: ${section}`);
                }
              }

              html += '<li><a href="' + information.href + '" class="ps-live-search-item">' + information.name + '</a></li>';
            }
          } else {
            html += '<li><span class="ps-live-search-item-text">' + getTranslation(this.translations, 'text_no_results') + '</span></li>';
          }
        }

        if (hasValidProp(json.products, 'status') && json.products.status) {
          if (
            hasValidProp(json.products, 'data') &&
            Array.isArray(json.products.data) &&
            json.products.data.length > 0
          ) {
            html += '<li><a href="' + url_more + '" class="ps-live-search-more">' + getTranslation(this.translations, 'text_all_product_results') + ' <i class="fa-solid fa-caret-down"></i></a></li>';
          } else {
            html += '<li><span class="ps-live-search-more">' + getTranslation(this.translations, 'text_all_product_results') + ' <i class="fa-solid fa-caret-down"></i></span></li>';
          }
        }

        $dropdown.html(html);

        $dropdown.find('.ps-live-search-subheader > output').text(query);

        $items = $dropdown.find(".ps-live-search-item");

        $items.attr('tabindex', '-1');
      };
    });
  };
})(jQuery);
