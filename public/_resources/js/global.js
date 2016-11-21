/* Bjørnar Hagen - 2016 */

(function(window) {
    window.onload = ready;

    function ready() {
        navigationScroll();
    };

    function navigationScroll() {
        var nav = document.querySelector("#nav-main");
        var navClasses = nav.getAttribute("class");
        var isTransparent = true;
        var delay = 300;
        var delayer;

        window.onscroll = function() {
            clearTimeout(delayer);

            delayer = setTimeout(function() {
                var awayFromTop = (window.pageYOffset || document.documentElement.scrollTop)  - (document.documentElement.clientTop || 0);

                if (awayFromTop > 300 && isTransparent) {
                    delay *= 2;
                    isTransparent = false;
                    nav.setAttribute("class", navClasses.replace("transparent", ""));
                } else if (awayFromTop < 300 && !isTransparent) {
                    isTransparent = true;
                    nav.setAttribute("class", navClasses);
                    delay = 300;
                }
            }, delay);
        }
    }
})(window);