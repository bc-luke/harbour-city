/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
(function ($) {
    $("[data-toggle]").click(function () {
        $($(this).data("toggle")).toggle();
    });
})(jQuery);