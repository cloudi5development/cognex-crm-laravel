!(function () {
    var e = document.querySelector(".navbar-menu").innerHTML,
        t = 7;
    function a() {
        var e;
        document.querySelectorAll(".navbar-nav .collapse") &&
            ((e = document.querySelectorAll(".navbar-nav .collapse")),
            Array.from(e).forEach(function (e) {
                var t = new bootstrap.Collapse(e, { toggle: !1 });
                e.addEventListener("show.bs.collapse", function (a) {
                    a.stopPropagation(),
                        (a = e.parentElement.closest(".collapse"))
                            ? ((a = a.querySelectorAll(".collapse")),
                              Array.from(a).forEach(function (e) {
                                  (e = bootstrap.Collapse.getInstance(e)) !==
                                      t && e.hide();
                              }))
                            : ((a = (function (e) {
                                  for (
                                      var t = [], a = e.parentNode.firstChild;
                                      a;

                                  )
                                      1 === a.nodeType && a !== e && t.push(a),
                                          (a = a.nextSibling);
                                  return t;
                              })(e.parentElement)),
                              Array.from(a).forEach(function (e) {
                                  2 < e.childNodes.length &&
                                      e.firstElementChild.setAttribute(
                                          "aria-expanded",
                                          "false"
                                      ),
                                      (e = e.querySelectorAll("*[id]")),
                                      Array.from(e).forEach(function (e) {
                                          e.classList.remove("show"),
                                              2 < e.childNodes.length &&
                                                  ((e =
                                                      e.querySelectorAll(
                                                          "ul li a"
                                                      )),
                                                  Array.from(e).forEach(
                                                      function (e) {
                                                          e.hasAttribute(
                                                              "aria-expanded"
                                                          ) &&
                                                              e.setAttribute(
                                                                  "aria-expanded",
                                                                  "false"
                                                              );
                                                      }
                                                  ));
                                      });
                              }));
                }),
                    e.addEventListener("hide.bs.collapse", function (t) {
                        t.stopPropagation(),
                            (t = e.querySelectorAll(".collapse")),
                            Array.from(t).forEach(function (e) {
                                (childCollapseInstance =
                                    bootstrap.Collapse.getInstance(e)).hide();
                            });
                    });
            }));
    }
    function n() {
        var t,
            a = document.documentElement.getAttribute("data-layout"),
            o = sessionStorage.getItem("defaultAttribute");
        !(o = JSON.parse(o)) ||
            ("twocolumn" != a && "twocolumn" != o["data-layout"]) ||
            (document.querySelector(".navbar-menu") &&
                (document.querySelector(".navbar-menu").innerHTML = e),
            ((t = document.createElement("ul")).innerHTML = ""),
            Array.from(
                document
                    .getElementById("navbar-nav")
                    .querySelectorAll(".menu-link")
            ).forEach(function (e) {
                t.className = "twocolumn-iconview";
                var a = document.createElement("li"),
                    o = e;
                o.querySelectorAll("span").forEach(function (e) {
                    e.classList.add("d-none");
                }),
                    e.parentElement.classList.contains("twocolumn-item-show") &&
                        e.classList.add("active"),
                    a.appendChild(o),
                    t.appendChild(a),
                    o.classList.contains("nav-link") &&
                        o.classList.replace("nav-link", "nav-icon"),
                    o.classList.remove("collapsed", "menu-link");
            }),
            (a = (a =
                "/" == location.pathname
                    ? "javascript:void(0)"
                    : location.pathname.substring(1)).substring(
                a.lastIndexOf("/") + 1
            )) &&
                (o = document
                    .getElementById("navbar-nav")
                    .querySelector('[href="' + a + '"]')) &&
                (a = o.closest(".collapse.menu-dropdown")) &&
                (a.classList.add("show"),
                a.parentElement.children[0].classList.add("active"),
                a.parentElement.children[0].setAttribute(
                    "aria-expanded",
                    "true"
                ),
                a.parentElement.closest(".collapse.menu-dropdown")) &&
                (a.parentElement.closest(".collapse").classList.add("show"),
                a.parentElement.closest(".collapse").previousElementSibling &&
                    a.parentElement
                        .closest(".collapse")
                        .previousElementSibling.classList.add("active"),
                a.parentElement.parentElement.parentElement.parentElement.closest(
                    ".collapse.menu-dropdown"
                )) &&
                (a.parentElement.parentElement.parentElement.parentElement
                    .closest(".collapse")
                    .classList.add("show"),
                a.parentElement.parentElement.parentElement.parentElement.closest(
                    ".collapse"
                ).previousElementSibling) &&
                a.parentElement.parentElement.parentElement.parentElement
                    .closest(".collapse")
                    .previousElementSibling.classList.add("active"),
            (document.getElementById("two-column-menu").innerHTML =
                t.outerHTML),
            Array.from(
                document
                    .querySelector("#two-column-menu ul")
                    .querySelectorAll("li a")
            ).forEach(function (e) {
                var t = (t =
                    "/" == location.pathname
                        ? "javascript:void(0)"
                        : location.pathname.substring(1)).substring(
                    t.lastIndexOf("/") + 1
                );
                e.addEventListener("click", function (a) {
                    var o;
                    (t != "/" + e.getAttribute("href") ||
                        e.getAttribute("data-bs-toggle")) &&
                        document.body.classList.contains("twocolumn-panel") &&
                        document.body.classList.remove("twocolumn-panel"),
                        document
                            .getElementById("navbar-nav")
                            .classList.remove("twocolumn-nav-hide"),
                        document
                            .querySelector(".hamburger-icon")
                            .classList.remove("open"),
                        ((a.target && a.target.matches("a.nav-icon")) ||
                            (a.target && a.target.matches("i"))) &&
                            (null !==
                                document.querySelector(
                                    "#two-column-menu ul .nav-icon.active"
                                ) &&
                                document
                                    .querySelector(
                                        "#two-column-menu ul .nav-icon.active"
                                    )
                                    .classList.remove("active"),
                            (a.target.matches("i")
                                ? a.target.closest("a")
                                : a.target
                            ).classList.add("active"),
                            0 <
                                (o = document.getElementsByClassName(
                                    "twocolumn-item-show"
                                )).length &&
                                o[0].classList.remove("twocolumn-item-show"),
                            (o = (
                                a.target.matches("i")
                                    ? a.target.closest("a")
                                    : a.target
                            )
                                .getAttribute("href")
                                .slice(1)),
                            document.getElementById(o)) &&
                            document
                                .getElementById(o)
                                .parentElement.classList.add(
                                    "twocolumn-item-show"
                                );
                }),
                    t != "/" + e.getAttribute("href") ||
                        e.getAttribute("data-bs-toggle") ||
                        (e.classList.add("active"),
                        document
                            .getElementById("navbar-nav")
                            .classList.add("twocolumn-nav-hide"),
                        document.querySelector(".hamburger-icon") &&
                            document
                                .querySelector(".hamburger-icon")
                                .classList.add("open"));
            }),
            "horizontal" !==
                document.documentElement.getAttribute("data-layout") &&
                ((o = new SimpleBar(document.getElementById("navbar-nav"))) &&
                    o.getContentElement(),
                (a = new SimpleBar(
                    document.getElementsByClassName("twocolumn-iconview")[0]
                ))) &&
                a.getContentElement());
    }
    function s(e) {
        if (e) {
            var t = e.offsetTop,
                a = e.offsetLeft,
                o = e.offsetWidth,
                n = e.offsetHeight;
            if (e.offsetParent)
                for (; e.offsetParent; )
                    (t += (e = e.offsetParent).offsetTop), (a += e.offsetLeft);
            return (
                t >= window.pageYOffset &&
                a >= window.pageXOffset &&
                t + n <= window.pageYOffset + window.innerHeight &&
                a + o <= window.pageXOffset + window.innerWidth
            );
        }
    }
    function d() {
        ("vertical" != document.documentElement.getAttribute("data-layout") &&
            "semibox" !=
                document.documentElement.getAttribute("data-layout")) ||
            ((document.getElementById("two-column-menu").innerHTML = ""),
            document.querySelector(".navbar-menu") &&
                (document.querySelector(".navbar-menu").innerHTML = e),
            document
                .getElementById("scrollbar")
                .setAttribute("data-simplebar", ""),
            document
                .getElementById("navbar-nav")
                .setAttribute("data-simplebar", ""),
            document.getElementById("scrollbar").classList.add("h-100")),
            "twocolumn" ==
                document.documentElement.getAttribute("data-layout") &&
                (document
                    .getElementById("scrollbar")
                    .removeAttribute("data-simplebar"),
                document.getElementById("scrollbar").classList.remove("h-100")),
            "horizontal" ==
                document.documentElement.getAttribute("data-layout") && u();
    }
    function i() {
        feather.replace();
        var e =
            ((e = document.documentElement.clientWidth) < 1025 && 767 < e
                ? (document.body.classList.remove("twocolumn-panel"),
                  "twocolumn" == sessionStorage.getItem("data-layout") &&
                      (document.documentElement.setAttribute(
                          "data-layout",
                          "twocolumn"
                      ),
                      document.getElementById("customizer-layout03") &&
                          document
                              .getElementById("customizer-layout03")
                              .click(),
                      n(),
                      m(),
                      a()),
                  "vertical" == sessionStorage.getItem("data-layout") &&
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          "sm"
                      ),
                  "semibox" == sessionStorage.getItem("data-layout") &&
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          "sm"
                      ),
                  document.querySelector(".hamburger-icon") &&
                      document
                          .querySelector(".hamburger-icon")
                          .classList.add("open"))
                : 1025 <= e
                ? (document.body.classList.remove("twocolumn-panel"),
                  "twocolumn" == sessionStorage.getItem("data-layout") &&
                      (document.documentElement.setAttribute(
                          "data-layout",
                          "twocolumn"
                      ),
                      document.getElementById("customizer-layout03") &&
                          document
                              .getElementById("customizer-layout03")
                              .click(),
                      n(),
                      m(),
                      a()),
                  "vertical" == sessionStorage.getItem("data-layout") &&
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          sessionStorage.getItem("data-sidebar-size")
                      ),
                  "semibox" == sessionStorage.getItem("data-layout") &&
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          sessionStorage.getItem("data-sidebar-size")
                      ),
                  document.querySelector(".hamburger-icon") &&
                      document
                          .querySelector(".hamburger-icon")
                          .classList.remove("open"))
                : e <= 767 &&
                  (document.body.classList.remove("vertical-sidebar-enable"),
                  document.body.classList.add("twocolumn-panel"),
                  "twocolumn" == sessionStorage.getItem("data-layout") &&
                      (document.documentElement.setAttribute(
                          "data-layout",
                          "vertical"
                      ),
                      g("vertical"),
                      a()),
                  "horizontal" != sessionStorage.getItem("data-layout") &&
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          "lg"
                      ),
                  document.querySelector(".hamburger-icon")) &&
                  document
                      .querySelector(".hamburger-icon")
                      .classList.add("open"),
            document.querySelectorAll("#navbar-nav > li.nav-item"));
        Array.from(e).forEach(function (e) {
            e.addEventListener("click", l.bind(this), !1),
                e.addEventListener("mouseover", l.bind(this), !1);
        });
    }
    function l(e) {
        if (e.target && e.target.matches("a.nav-link span"))
            if (0 == s(e.target.parentElement.nextElementSibling)) {
                e.target.parentElement.nextElementSibling.classList.add(
                    "dropdown-custom-right"
                ),
                    e.target.parentElement.parentElement.parentElement.parentElement.classList.add(
                        "dropdown-custom-right"
                    );
                var t = e.target.parentElement.nextElementSibling;
                Array.from(t.querySelectorAll(".menu-dropdown")).forEach(
                    function (e) {
                        e.classList.add("dropdown-custom-right");
                    }
                );
            } else if (
                1 == s(e.target.parentElement.nextElementSibling) &&
                1848 <= window.innerWidth
            )
                for (
                    var a = document.getElementsByClassName(
                        "dropdown-custom-right"
                    );
                    0 < a.length;

                )
                    a[0].classList.remove("dropdown-custom-right");
        if (e.target && e.target.matches("a.nav-link"))
            if (0 == s(e.target.nextElementSibling))
                e.target.nextElementSibling.classList.add(
                    "dropdown-custom-right"
                ),
                    e.target.parentElement.parentElement.parentElement.classList.add(
                        "dropdown-custom-right"
                    ),
                    (t = e.target.nextElementSibling),
                    Array.from(t.querySelectorAll(".menu-dropdown")).forEach(
                        function (e) {
                            e.classList.add("dropdown-custom-right");
                        }
                    );
            else if (
                1 == s(e.target.nextElementSibling) &&
                1848 <= window.innerWidth
            )
                for (
                    a = document.getElementsByClassName(
                        "dropdown-custom-right"
                    );
                    0 < a.length;

                )
                    a[0].classList.remove("dropdown-custom-right");
    }
    function r() {
        var e = document.documentElement.clientWidth;
        767 < e &&
            document.querySelector(".hamburger-icon").classList.toggle("open"),
            "horizontal" ===
                document.documentElement.getAttribute("data-layout") &&
                (document.body.classList.contains("menu")
                    ? document.body.classList.remove("menu")
                    : document.body.classList.add("menu")),
            "vertical" ===
                document.documentElement.getAttribute("data-layout") &&
                (e <= 1025 && 767 < e
                    ? (document.body.classList.remove(
                          "vertical-sidebar-enable"
                      ),
                      "sm" ==
                      document.documentElement.getAttribute("data-sidebar-size")
                          ? document.documentElement.setAttribute(
                                "data-sidebar-size",
                                ""
                            )
                          : document.documentElement.setAttribute(
                                "data-sidebar-size",
                                "sm"
                            ))
                    : 1025 < e
                    ? (document.body.classList.remove(
                          "vertical-sidebar-enable"
                      ),
                      "lg" ==
                      document.documentElement.getAttribute("data-sidebar-size")
                          ? document.documentElement.setAttribute(
                                "data-sidebar-size",
                                "sm"
                            )
                          : document.documentElement.setAttribute(
                                "data-sidebar-size",
                                "lg"
                            ))
                    : e <= 767 &&
                      (document.body.classList.add("vertical-sidebar-enable"),
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          "lg"
                      ))),
            "semibox" ===
                document.documentElement.getAttribute("data-layout") &&
                (767 < e
                    ? "show" ==
                      document.documentElement.getAttribute(
                          "data-sidebar-visibility"
                      )
                        ? "lg" ==
                          document.documentElement.getAttribute(
                              "data-sidebar-size"
                          )
                            ? document.documentElement.setAttribute(
                                  "data-sidebar-size",
                                  "sm"
                              )
                            : document.documentElement.setAttribute(
                                  "data-sidebar-size",
                                  "lg"
                              )
                        : (document
                              .getElementById("sidebar-visibility-show")
                              .click(),
                          document.documentElement.setAttribute(
                              "data-sidebar-size",
                              document.documentElement.getAttribute(
                                  "data-sidebar-size"
                              )
                          ))
                    : e <= 767 &&
                      (document.body.classList.add("vertical-sidebar-enable"),
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          "lg"
                      ))),
            "twocolumn" ==
                document.documentElement.getAttribute("data-layout") &&
                (document.body.classList.contains("twocolumn-panel")
                    ? document.body.classList.remove("twocolumn-panel")
                    : document.body.classList.add("twocolumn-panel"));
    }
    function m() {
        feather.replace();
        var e,
            t,
            a =
                "/" == location.pathname
                    ? "javascript:void(0)"
                    : location.pathname.substring(1);
        (a = a.substring(a.lastIndexOf("/") + 1)) &&
            ("twocolumn-panel" == document.body.className &&
                document
                    .getElementById("two-column-menu")
                    .querySelector('[href="' + a + '"]')
                    .classList.add("active"),
            (a = document
                .getElementById("navbar-nav")
                .querySelector('[href="' + a + '"]'))
                ? (a.classList.add("active"),
                  (t = (
                      (e = a.closest(".collapse.menu-dropdown")) &&
                      e.parentElement.closest(".collapse.menu-dropdown")
                          ? (e.classList.add("show"),
                            e.parentElement.children[0].classList.add("active"),
                            e.parentElement
                                .closest(".collapse.menu-dropdown")
                                .parentElement.classList.add(
                                    "twocolumn-item-show"
                                ),
                            e.parentElement.parentElement.parentElement.parentElement.closest(
                                ".collapse.menu-dropdown"
                            ) &&
                                ((t =
                                    e.parentElement.parentElement.parentElement.parentElement
                                        .closest(".collapse.menu-dropdown")
                                        .getAttribute("id")),
                                e.parentElement.parentElement.parentElement.parentElement
                                    .closest(".collapse.menu-dropdown")
                                    .parentElement.classList.add(
                                        "twocolumn-item-show"
                                    ),
                                e.parentElement
                                    .closest(".collapse.menu-dropdown")
                                    .parentElement.classList.remove(
                                        "twocolumn-item-show"
                                    ),
                                document
                                    .getElementById("two-column-menu")
                                    .querySelector('[href="#' + t + '"]')) &&
                                document
                                    .getElementById("two-column-menu")
                                    .querySelector('[href="#' + t + '"]')
                                    .classList.add("active"),
                            e.parentElement.closest(".collapse.menu-dropdown"))
                          : (a
                                .closest(".collapse.menu-dropdown")
                                .parentElement.classList.add(
                                    "twocolumn-item-show"
                                ),
                            e)
                  ).getAttribute("id")),
                  document
                      .getElementById("two-column-menu")
                      .querySelector('[href="#' + t + '"]') &&
                      document
                          .getElementById("two-column-menu")
                          .querySelector('[href="#' + t + '"]')
                          .classList.add("active"))
                : document.body.classList.add("twocolumn-panel"));
    }
    function c() {
        var e =
            "/" == location.pathname
                ? "javascript:void(0)"
                : location.pathname.substring(1);
        (e = e.substring(e.lastIndexOf("/") + 1)) &&
            (e = document
                .getElementById("navbar-nav")
                .querySelector('[href="' + e + '"]')) &&
            (e.classList.add("active"),
            (e = e.closest(".collapse.menu-dropdown"))) &&
            (e.classList.add("show"),
            e.parentElement.children[0].classList.add("active"),
            e.parentElement.children[0].setAttribute("aria-expanded", "true"),
            e.parentElement.closest(".collapse.menu-dropdown")) &&
            (e.parentElement.closest(".collapse").classList.add("show"),
            e.parentElement.closest(".collapse").previousElementSibling &&
                e.parentElement
                    .closest(".collapse")
                    .previousElementSibling.classList.add("active"),
            e.parentElement.parentElement.parentElement.parentElement.closest(
                ".collapse.menu-dropdown"
            )) &&
            (e.parentElement.parentElement.parentElement.parentElement
                .closest(".collapse")
                .classList.add("show"),
            e.parentElement.parentElement.parentElement.parentElement.closest(
                ".collapse"
            ).previousElementSibling) &&
            (e.parentElement.parentElement.parentElement.parentElement
                .closest(".collapse")
                .previousElementSibling.classList.add("active"),
            "horizontal" ==
                document.documentElement.getAttribute("data-layout")) &&
            e.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.closest(
                ".collapse"
            ) &&
            e.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement
                .closest(".collapse")
                .previousElementSibling.classList.add("active");
    }
    function s(e) {
        if (e) {
            var t = e.offsetTop,
                a = e.offsetLeft,
                o = e.offsetWidth,
                n = e.offsetHeight;
            if (e.offsetParent)
                for (; e.offsetParent; )
                    (t += (e = e.offsetParent).offsetTop), (a += e.offsetLeft);
            return (
                t >= window.pageYOffset &&
                a >= window.pageXOffset &&
                t + n <= window.pageYOffset + window.innerHeight &&
                a + o <= window.pageXOffset + window.innerWidth
            );
        }
    }
    function u() {
        (document.getElementById("two-column-menu").innerHTML = ""),
            document.querySelector(".navbar-menu") &&
                (document.querySelector(".navbar-menu").innerHTML = e),
            document
                .getElementById("scrollbar")
                .removeAttribute("data-simplebar"),
            document
                .getElementById("navbar-nav")
                .removeAttribute("data-simplebar"),
            document.getElementById("scrollbar").classList.remove("h-100");
        var a = t,
            o = document.querySelectorAll("ul.navbar-nav > li.nav-item"),
            n = "",
            s = "";
        Array.from(o).forEach(function (e, t) {
            t + 1 === a && (s = e),
                a < t + 1 && ((n += e.outerHTML), e.remove()),
                t + 1 === o.length &&
                    s.insertAdjacentHTML &&
                    s.insertAdjacentHTML(
                        "afterend",
                        '<li class="nav-item">\t\t\t\t\t\t<a class="nav-link" href="#sidebarMore" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMore">\t\t\t\t\t\t\t<i class="ri-briefcase-2-line"></i> <span data-key="t-more">More</span>\t\t\t\t\t\t</a>\t\t\t\t\t\t<div class="collapse menu-dropdown" id="sidebarMore"><ul class="nav nav-sm flex-column">' +
                            n +
                            "</ul></div>\t\t\t\t\t</li>"
                    );
        });
    }
    function g(t) {
        "vertical" == t
            ? ((document.getElementById("two-column-menu").innerHTML = ""),
              document.querySelector(".navbar-menu") &&
                  (document.querySelector(".navbar-menu").innerHTML = e),
              document.getElementById("theme-settings-offcanvas") &&
                  ((document.getElementById("sidebar-size").style.display =
                      "block"),
                  (document.getElementById("sidebar-view").style.display =
                      "block"),
                  (document.getElementById("sidebar-color").style.display =
                      "block"),
                  document.getElementById("sidebar-img") &&
                      (document.getElementById("sidebar-img").style.display =
                          "block"),
                  (document.getElementById("layout-position").style.display =
                      "block"),
                  (document.getElementById("layout-width").style.display =
                      "block"),
                  (document.getElementById("sidebar-visibility").style.display =
                      "none")),
              d(),
              c(),
              b(),
              E())
            : "horizontal" == t
            ? (u(),
              document.getElementById("theme-settings-offcanvas") &&
                  ((document.getElementById("sidebar-size").style.display =
                      "none"),
                  (document.getElementById("sidebar-view").style.display =
                      "none"),
                  (document.getElementById("sidebar-color").style.display =
                      "none"),
                  document.getElementById("sidebar-img") &&
                      (document.getElementById("sidebar-img").style.display =
                          "none"),
                  (document.getElementById("layout-position").style.display =
                      "block"),
                  (document.getElementById("layout-width").style.display =
                      "block"),
                  (document.getElementById("sidebar-visibility").style.display =
                      "none")),
              c())
            : "twocolumn" == t
            ? (document
                  .getElementById("scrollbar")
                  .removeAttribute("data-simplebar"),
              document.getElementById("scrollbar").classList.remove(""),
              document.getElementById("theme-settings-offcanvas") &&
                  ((document.getElementById("sidebar-size").style.display =
                      "none"),
                  (document.getElementById("sidebar-view").style.display =
                      "none"),
                  (document.getElementById("sidebar-color").style.display =
                      "block"),
                  document.getElementById("sidebar-img") &&
                      (document.getElementById("sidebar-img").style.display =
                          "block"),
                  (document.getElementById("layout-position").style.display =
                      "none"),
                  (document.getElementById("layout-width").style.display =
                      "none"),
                  (document.getElementById("sidebar-visibility").style.display =
                      "none")))
            : "semibox" == t &&
              ((document.getElementById("two-column-menu").innerHTML = ""),
              document.querySelector(".navbar-menu") &&
                  (document.querySelector(".navbar-menu").innerHTML = e),
              document.getElementById("theme-settings-offcanvas") &&
                  ((document.getElementById("sidebar-size").style.display =
                      "block"),
                  (document.getElementById("sidebar-view").style.display =
                      "none"),
                  (document.getElementById("sidebar-color").style.display =
                      "block"),
                  document.getElementById("sidebar-img") &&
                      (document.getElementById("sidebar-img").style.display =
                          "block"),
                  (document.getElementById("layout-position").style.display =
                      "block"),
                  (document.getElementById("layout-width").style.display =
                      "none"),
                  (document.getElementById("sidebar-visibility").style.display =
                      "block")),
              d(),
              c(),
              b(),
              E());
    }
    function b() {
        document
            .getElementById("vertical-hover")
            .addEventListener("click", function () {
                "sm-hover" ===
                document.documentElement.getAttribute("data-sidebar-size")
                    ? document.documentElement.setAttribute(
                          "data-sidebar-size",
                          "sm-hover-active"
                      )
                    : (document.documentElement.getAttribute(
                          "data-sidebar-size"
                      ),
                      document.documentElement.setAttribute(
                          "data-sidebar-size",
                          "sm-hover"
                      ));
            });
    }
    function y(e) {
        if (e == e) {
            switch (e["data-theme"]) {
                case "default":
                default:
                    x("data-theme", "default"),
                        sessionStorage.setItem("data-theme", "default"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "default"
                        );
                    break;
                case "minimal":
                case "minimal":
                    x("data-theme", "minimal"),
                        sessionStorage.setItem("data-theme", "minimal"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "minimal"
                        );
                    break;
                case "saas":
                    x("data-theme", "saas"),
                        sessionStorage.setItem("data-theme", "saas"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "saas"
                        );
                    break;
                case "corporate":
                    x("data-theme", "corporate"),
                        sessionStorage.setItem("data-theme", "corporate"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "corporate"
                        );
                    break;
                case "galaxy":
                    x("data-theme", "galaxy"),
                        sessionStorage.setItem("data-theme", "galaxy"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "galaxy"
                        ),
                        (document.getElementById("body-img").style.display =
                            "block");
                    break;
                case "material":
                    x("data-theme", "material"),
                        sessionStorage.setItem("data-theme", "material"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "material"
                        );
                    break;
                case "creative":
                    x("data-theme", "creative"),
                        sessionStorage.setItem("data-theme", "creative"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "creative"
                        );
                    break;
                case "modern":
                    x("data-theme", "modern"),
                        sessionStorage.setItem("data-theme", "modern"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "modern"
                        );
                    break;
                case "interactive":
                    x("data-theme", "interactive"),
                        sessionStorage.setItem("data-theme", "interactive"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "interactive"
                        );
                    break;
                case "classic":
                    x("data-theme", "classic"),
                        sessionStorage.setItem("data-theme", "classic"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "classic"
                        );
                    break;
                case "vintage":
                    x("data-theme", "vintage"),
                        sessionStorage.setItem("data-theme", "vintage"),
                        document.documentElement.setAttribute(
                            "data-theme",
                            "vintage"
                        );
            }
            switch (e["data-layout"]) {
                case "vertical":
                    x("data-layout", "vertical"),
                        sessionStorage.setItem("data-layout", "vertical"),
                        document.documentElement.setAttribute(
                            "data-layout",
                            "vertical"
                        ),
                        g("vertical"),
                        a();
                    break;
                case "horizontal":
                    x("data-layout", "horizontal"),
                        sessionStorage.setItem("data-layout", "horizontal"),
                        document.documentElement.setAttribute(
                            "data-layout",
                            "horizontal"
                        ),
                        g("horizontal");
                    break;
                case "twocolumn":
                    x("data-layout", "twocolumn"),
                        sessionStorage.setItem("data-layout", "twocolumn"),
                        document.documentElement.setAttribute(
                            "data-layout",
                            "twocolumn"
                        ),
                        g("twocolumn");
                    break;
                case "semibox":
                    x("data-layout", "semibox"),
                        sessionStorage.setItem("data-layout", "semibox"),
                        document.documentElement.setAttribute(
                            "data-layout",
                            "semibox"
                        ),
                        g("semibox");
                    break;
                default:
                    "vertical" == sessionStorage.getItem("data-layout") &&
                    sessionStorage.getItem("data-layout")
                        ? (x("data-layout", "vertical"),
                          sessionStorage.setItem("data-layout", "vertical"),
                          document.documentElement.setAttribute(
                              "data-layout",
                              "vertical"
                          ),
                          g("vertical"),
                          a())
                        : "horizontal" == sessionStorage.getItem("data-layout")
                        ? (x("data-layout", "horizontal"),
                          sessionStorage.setItem("data-layout", "horizontal"),
                          document.documentElement.setAttribute(
                              "data-layout",
                              "horizontal"
                          ),
                          g("horizontal"))
                        : "twocolumn" == sessionStorage.getItem("data-layout")
                        ? (x("data-layout", "twocolumn"),
                          sessionStorage.setItem("data-layout", "twocolumn"),
                          document.documentElement.setAttribute(
                              "data-layout",
                              "twocolumn"
                          ),
                          g("twocolumn"))
                        : "semibox" == sessionStorage.getItem("data-layout") &&
                          (x("data-layout", "semibox"),
                          sessionStorage.setItem("data-layout", "semibox"),
                          document.documentElement.setAttribute(
                              "data-layout",
                              "semibox"
                          ),
                          g("semibox"));
            }
            switch (e["data-topbar"]) {
                case "light":
                    x("data-topbar", "light"),
                        sessionStorage.setItem("data-topbar", "light"),
                        document.documentElement.setAttribute(
                            "data-topbar",
                            "light"
                        );
                    break;
                case "dark":
                    x("data-topbar", "dark"),
                        sessionStorage.setItem("data-topbar", "dark"),
                        document.documentElement.setAttribute(
                            "data-topbar",
                            "dark"
                        );
                    break;
                default:
                    "dark" == sessionStorage.getItem("data-topbar")
                        ? (x("data-topbar", "dark"),
                          sessionStorage.setItem("data-topbar", "dark"),
                          document.documentElement.setAttribute(
                              "data-topbar",
                              "dark"
                          ))
                        : (x("data-topbar", "light"),
                          sessionStorage.setItem("data-topbar", "light"),
                          document.documentElement.setAttribute(
                              "data-topbar",
                              "light"
                          ));
            }
            switch (
                ("hidden" === e["data-sidebar-visibility"]
                    ? (x("data-sidebar-visibility", "hidden"),
                      sessionStorage.setItem(
                          "data-sidebar-visibility",
                          "hidden"
                      ),
                      document.documentElement.setAttribute(
                          "data-sidebar-visibility",
                          "hidden"
                      ))
                    : (x("data-sidebar-visibility", "show"),
                      sessionStorage.setItem("data-sidebar-visibility", "show"),
                      document.documentElement.setAttribute(
                          "data-sidebar-visibility",
                          "show"
                      )),
                e["data-layout-style"])
            ) {
                case "default":
                    x("data-layout-style", "default"),
                        sessionStorage.setItem("data-layout-style", "default"),
                        document.documentElement.setAttribute(
                            "data-layout-style",
                            "default"
                        );
                    break;
                case "detached":
                    x("data-layout-style", "detached"),
                        sessionStorage.setItem("data-layout-style", "detached"),
                        document.documentElement.setAttribute(
                            "data-layout-style",
                            "detached"
                        );
                    break;
                default:
                    "detached" == sessionStorage.getItem("data-layout-style")
                        ? (x("data-layout-style", "detached"),
                          sessionStorage.setItem(
                              "data-layout-style",
                              "detached"
                          ),
                          document.documentElement.setAttribute(
                              "data-layout-style",
                              "detached"
                          ))
                        : (x("data-layout-style", "default"),
                          sessionStorage.setItem(
                              "data-layout-style",
                              "default"
                          ),
                          document.documentElement.setAttribute(
                              "data-layout-style",
                              "default"
                          ));
            }
            switch (e["data-sidebar-size"]) {
                case "lg":
                    x("data-sidebar-size", "lg"),
                        document.documentElement.setAttribute(
                            "data-sidebar-size",
                            "lg"
                        ),
                        sessionStorage.setItem("data-sidebar-size", "lg");
                    break;
                case "sm":
                    x("data-sidebar-size", "sm"),
                        document.documentElement.setAttribute(
                            "data-sidebar-size",
                            "sm"
                        ),
                        sessionStorage.setItem("data-sidebar-size", "sm");
                    break;
                case "md":
                    x("data-sidebar-size", "md"),
                        document.documentElement.setAttribute(
                            "data-sidebar-size",
                            "md"
                        ),
                        sessionStorage.setItem("data-sidebar-size", "md");
                    break;
                case "sm-hover":
                    x("data-sidebar-size", "sm-hover"),
                        document.documentElement.setAttribute(
                            "data-sidebar-size",
                            "sm-hover"
                        ),
                        sessionStorage.setItem("data-sidebar-size", "sm-hover");
                    break;
                default:
                    "sm" == sessionStorage.getItem("data-sidebar-size")
                        ? (document.documentElement.setAttribute(
                              "data-sidebar-size",
                              "sm"
                          ),
                          x("data-sidebar-size", "sm"),
                          sessionStorage.setItem("data-sidebar-size", "sm"))
                        : "md" == sessionStorage.getItem("data-sidebar-size")
                        ? (document.documentElement.setAttribute(
                              "data-sidebar-size",
                              "md"
                          ),
                          x("data-sidebar-size", "md"),
                          sessionStorage.setItem("data-sidebar-size", "md"))
                        : "sm-hover" ==
                          sessionStorage.getItem("data-sidebar-size")
                        ? (document.documentElement.setAttribute(
                              "data-sidebar-size",
                              "sm-hover"
                          ),
                          x("data-sidebar-size", "sm-hover"),
                          sessionStorage.setItem(
                              "data-sidebar-size",
                              "sm-hover"
                          ))
                        : (document.documentElement.setAttribute(
                              "data-sidebar-size",
                              "lg"
                          ),
                          x("data-sidebar-size", "lg"),
                          sessionStorage.setItem("data-sidebar-size", "lg"));
            }
            switch (e["data-bs-theme"]) {
                case "light":
                    x("data-bs-theme", "light"),
                        document.documentElement.setAttribute(
                            "data-bs-theme",
                            "light"
                        ),
                        sessionStorage.setItem("data-bs-theme", "light");
                    break;
                case "dark":
                    x("data-bs-theme", "dark"),
                        document.documentElement.setAttribute(
                            "data-bs-theme",
                            "dark"
                        ),
                        sessionStorage.setItem("data-bs-theme", "dark");
                    break;
                default:
                    sessionStorage.getItem("data-bs-theme") &&
                    "dark" == sessionStorage.getItem("data-bs-theme")
                        ? (sessionStorage.setItem("data-bs-theme", "dark"),
                          document.documentElement.setAttribute(
                              "data-bs-theme",
                              "dark"
                          ),
                          x("data-bs-theme", "dark"))
                        : (sessionStorage.setItem("data-bs-theme", "light"),
                          document.documentElement.setAttribute(
                              "data-bs-theme",
                              "light"
                          ),
                          x("data-bs-theme", "light"));
            }
            switch (e["data-layout-width"]) {
                case "fluid":
                    x("data-layout-width", "fluid"),
                        document.documentElement.setAttribute(
                            "data-layout-width",
                            "fluid"
                        ),
                        sessionStorage.setItem("data-layout-width", "fluid");
                    break;
                case "boxed":
                    x("data-layout-width", "boxed"),
                        document.documentElement.setAttribute(
                            "data-layout-width",
                            "boxed"
                        ),
                        sessionStorage.setItem("data-layout-width", "boxed");
                    break;
                default:
                    "boxed" == sessionStorage.getItem("data-layout-width")
                        ? (sessionStorage.setItem("data-layout-width", "boxed"),
                          document.documentElement.setAttribute(
                              "data-layout-width",
                              "boxed"
                          ),
                          x("data-layout-width", "boxed"))
                        : (sessionStorage.setItem("data-layout-width", "fluid"),
                          document.documentElement.setAttribute(
                              "data-layout-width",
                              "fluid"
                          ),
                          x("data-layout-width", "fluid"));
            }
            switch (e["data-sidebar"]) {
                case "light":
                    x("data-sidebar", "light"),
                        sessionStorage.setItem("data-sidebar", "light"),
                        document.documentElement.setAttribute(
                            "data-sidebar",
                            "light"
                        );
                    break;
                case "dark":
                    x("data-sidebar", "dark"),
                        sessionStorage.setItem("data-sidebar", "dark"),
                        document.documentElement.setAttribute(
                            "data-sidebar",
                            "dark"
                        );
                    break;
                case "gradient":
                    x("data-sidebar", "gradient"),
                        sessionStorage.setItem("data-sidebar", "gradient"),
                        document.documentElement.setAttribute(
                            "data-sidebar",
                            "gradient"
                        );
                    break;
                case "gradient-2":
                    x("data-sidebar", "gradient-2"),
                        sessionStorage.setItem("data-sidebar", "gradient-2"),
                        document.documentElement.setAttribute(
                            "data-sidebar",
                            "gradient-2"
                        );
                    break;
                case "gradient-3":
                    x("data-sidebar", "gradient-3"),
                        sessionStorage.setItem("data-sidebar", "gradient-3"),
                        document.documentElement.setAttribute(
                            "data-sidebar",
                            "gradient-3"
                        );
                    break;
                case "gradient-4":
                    x("data-sidebar", "gradient-4"),
                        sessionStorage.setItem("data-sidebar", "gradient-4"),
                        document.documentElement.setAttribute(
                            "data-sidebar",
                            "gradient-4"
                        );
                    break;
                default:
                    sessionStorage.getItem("data-sidebar") &&
                    "light" == sessionStorage.getItem("data-sidebar")
                        ? (sessionStorage.setItem("data-sidebar", "light"),
                          x("data-sidebar", "light"),
                          document.documentElement.setAttribute(
                              "data-sidebar",
                              "light"
                          ))
                        : "dark" == sessionStorage.getItem("data-sidebar")
                        ? (sessionStorage.setItem("data-sidebar", "dark"),
                          x("data-sidebar", "dark"),
                          document.documentElement.setAttribute(
                              "data-sidebar",
                              "dark"
                          ))
                        : "gradient" == sessionStorage.getItem("data-sidebar")
                        ? (sessionStorage.setItem("data-sidebar", "gradient"),
                          x("data-sidebar", "gradient"),
                          document.documentElement.setAttribute(
                              "data-sidebar",
                              "gradient"
                          ))
                        : "gradient-2" == sessionStorage.getItem("data-sidebar")
                        ? (sessionStorage.setItem("data-sidebar", "gradient-2"),
                          x("data-sidebar", "gradient-2"),
                          document.documentElement.setAttribute(
                              "data-sidebar",
                              "gradient-2"
                          ))
                        : "gradient-3" == sessionStorage.getItem("data-sidebar")
                        ? (sessionStorage.setItem("data-sidebar", "gradient-3"),
                          x("data-sidebar", "gradient-3"),
                          document.documentElement.setAttribute(
                              "data-sidebar",
                              "gradient-3"
                          ))
                        : "gradient-4" ==
                              sessionStorage.getItem("data-sidebar") &&
                          (sessionStorage.setItem("data-sidebar", "gradient-4"),
                          x("data-sidebar", "gradient-4"),
                          document.documentElement.setAttribute(
                              "data-sidebar",
                              "gradient-4"
                          ));
            }
            switch (e["data-sidebar-image"]) {
                case "none":
                    x("data-sidebar-image", "none"),
                        sessionStorage.setItem("data-sidebar-image", "none"),
                        document.documentElement.setAttribute(
                            "data-sidebar-image",
                            "none"
                        );
                    break;
                case "img-1":
                    x("data-sidebar-image", "img-1"),
                        sessionStorage.setItem("data-sidebar-image", "img-1"),
                        document.documentElement.setAttribute(
                            "data-sidebar-image",
                            "img-1"
                        );
                    break;
                case "img-2":
                    x("data-sidebar-image", "img-2"),
                        sessionStorage.setItem("data-sidebar-image", "img-2"),
                        document.documentElement.setAttribute(
                            "data-sidebar-image",
                            "img-2"
                        );
                    break;
                case "img-3":
                    x("data-sidebar-image", "img-3"),
                        sessionStorage.setItem("data-sidebar-image", "img-3"),
                        document.documentElement.setAttribute(
                            "data-sidebar-image",
                            "img-3"
                        );
                    break;
                case "img-4":
                    x("data-sidebar-image", "img-4"),
                        sessionStorage.setItem("data-sidebar-image", "img-4"),
                        document.documentElement.setAttribute(
                            "data-sidebar-image",
                            "img-4"
                        );
                    break;
                default:
                    sessionStorage.getItem("data-sidebar-image") &&
                    "none" == sessionStorage.getItem("data-sidebar-image")
                        ? (sessionStorage.setItem("data-sidebar-image", "none"),
                          x("data-sidebar-image", "none"),
                          document.documentElement.setAttribute(
                              "data-sidebar-image",
                              "none"
                          ))
                        : "img-1" ==
                          sessionStorage.getItem("data-sidebar-image")
                        ? (sessionStorage.setItem(
                              "data-sidebar-image",
                              "img-1"
                          ),
                          x("data-sidebar-image", "img-1"),
                          document.documentElement.setAttribute(
                              "data-sidebar-image",
                              "img-2"
                          ))
                        : "img-2" ==
                          sessionStorage.getItem("data-sidebar-image")
                        ? (sessionStorage.setItem(
                              "data-sidebar-image",
                              "img-2"
                          ),
                          x("data-sidebar-image", "img-2"),
                          document.documentElement.setAttribute(
                              "data-sidebar-image",
                              "img-2"
                          ))
                        : "img-3" ==
                          sessionStorage.getItem("data-sidebar-image")
                        ? (sessionStorage.setItem(
                              "data-sidebar-image",
                              "img-3"
                          ),
                          x("data-sidebar-image", "img-3"),
                          document.documentElement.setAttribute(
                              "data-sidebar-image",
                              "img-3"
                          ))
                        : "img-4" ==
                              sessionStorage.getItem("data-sidebar-image") &&
                          (sessionStorage.setItem(
                              "data-sidebar-image",
                              "img-4"
                          ),
                          x("data-sidebar-image", "img-4"),
                          document.documentElement.setAttribute(
                              "data-sidebar-image",
                              "img-4"
                          ));
            }
            switch (e["data-layout-position"]) {
                case "fixed":
                    x("data-layout-position", "fixed"),
                        sessionStorage.setItem("data-layout-position", "fixed"),
                        document.documentElement.setAttribute(
                            "data-layout-position",
                            "fixed"
                        );
                    break;
                case "scrollable":
                    x("data-layout-position", "scrollable"),
                        sessionStorage.setItem(
                            "data-layout-position",
                            "scrollable"
                        ),
                        document.documentElement.setAttribute(
                            "data-layout-position",
                            "scrollable"
                        );
                    break;
                default:
                    sessionStorage.getItem("data-layout-position") &&
                    "scrollable" ==
                        sessionStorage.getItem("data-layout-position")
                        ? (x("data-layout-position", "scrollable"),
                          sessionStorage.setItem(
                              "data-layout-position",
                              "scrollable"
                          ),
                          document.documentElement.setAttribute(
                              "data-layout-position",
                              "scrollable"
                          ))
                        : (x("data-layout-position", "fixed"),
                          sessionStorage.setItem(
                              "data-layout-position",
                              "fixed"
                          ),
                          document.documentElement.setAttribute(
                              "data-layout-position",
                              "fixed"
                          ));
            }
            switch (e["data-preloader"]) {
                case "disable":
                    x("data-preloader", "disable"),
                        sessionStorage.setItem("data-preloader", "disable"),
                        document.documentElement.setAttribute(
                            "data-preloader",
                            "disable"
                        );
                    break;
                case "enable":
                    x("data-preloader", "enable"),
                        sessionStorage.setItem("data-preloader", "enable"),
                        document.documentElement.setAttribute(
                            "data-preloader",
                            "enable"
                        ),
                        (t = document.getElementById("preloader")) &&
                            window.addEventListener("load", function () {
                                (t.style.opacity = "0"),
                                    (t.style.visibility = "hidden");
                            });
                    break;
                default:
                    var t;
                    sessionStorage.getItem("data-preloader") &&
                    "disable" == sessionStorage.getItem("data-preloader")
                        ? (x("data-preloader", "disable"),
                          sessionStorage.setItem("data-preloader", "disable"),
                          document.documentElement.setAttribute(
                              "data-preloader",
                              "disable"
                          ))
                        : "enable" == sessionStorage.getItem("data-preloader")
                        ? (x("data-preloader", "enable"),
                          sessionStorage.setItem("data-preloader", "enable"),
                          document.documentElement.setAttribute(
                              "data-preloader",
                              "enable"
                          ),
                          (t = document.getElementById("preloader")) &&
                              window.addEventListener("load", function () {
                                  (t.style.opacity = "0"),
                                      (t.style.visibility = "hidden");
                              }))
                        : document.documentElement.setAttribute(
                              "data-preloader",
                              "disable"
                          );
            }
            switch (e["data-theme-colors"]) {
                case "default":
                default:
                    x("data-theme-colors", "default"),
                        sessionStorage.setItem("data-theme-colors", "default"),
                        document.documentElement.setAttribute(
                            "data-theme-colors",
                            "default"
                        );
                    break;
                case "green":
                    x("data-theme-colors", "green"),
                        sessionStorage.setItem("data-theme-colors", "green"),
                        document.documentElement.setAttribute(
                            "data-theme-colors",
                            "green"
                        );
                    break;
                case "purple":
                    x("data-theme-colors", "purple"),
                        sessionStorage.setItem("data-theme-colors", "purple"),
                        document.documentElement.setAttribute(
                            "data-theme-colors",
                            "purple"
                        );
                    break;
                case "blue":
                    x("data-theme-colors", "blue"),
                        sessionStorage.setItem("data-theme-colors", "blue"),
                        document.documentElement.setAttribute(
                            "data-theme-colors",
                            "blue"
                        );
            }
            switch (e["data-body-image"]) {
                case "img-1":
                    x("data-body-image", "img-1"),
                        sessionStorage.setItem("data-body-image", "img-1"),
                        document.documentElement.setAttribute(
                            "data-body-image",
                            "img-1"
                        ),
                        document.getElementById("theme-settings-offcanvas") &&
                            document.documentElement.removeAttribute(
                                "data-sidebar-image"
                            );
                    break;
                case "img-2":
                    x("data-body-image", "img-2"),
                        sessionStorage.setItem("data-body-image", "img-2"),
                        document.documentElement.setAttribute(
                            "data-body-image",
                            "img-2"
                        );
                    break;
                case "img-3":
                    x("data-body-image", "img-3"),
                        sessionStorage.setItem("data-body-image", "img-3"),
                        document.documentElement.setAttribute(
                            "data-body-image",
                            "img-3"
                        );
                    break;
                case "none":
                    x("data-body-image", "none"),
                        sessionStorage.setItem("data-body-image", "none"),
                        document.documentElement.setAttribute(
                            "data-body-image",
                            "none"
                        );
                    break;
                default:
                    sessionStorage.getItem("data-body-image") &&
                    "img-1" == sessionStorage.getItem("data-body-image")
                        ? (sessionStorage.setItem("data-body-image", "img-1"),
                          x("data-body-image", "img-1"),
                          document.documentElement.setAttribute(
                              "data-body-image",
                              "img-1"
                          ),
                          document.getElementById("theme-settings-offcanvas") &&
                              document.getElementById("sidebar-img") &&
                              ((document.getElementById(
                                  "sidebar-img"
                              ).style.display = "none"),
                              document.documentElement.removeAttribute(
                                  "data-sidebar-image"
                              )))
                        : "img-2" == sessionStorage.getItem("data-body-image")
                        ? (sessionStorage.setItem("data-body-image", "img-2"),
                          x("data-body-image", "img-2"),
                          document.documentElement.setAttribute(
                              "data-body-image",
                              "img-2"
                          ))
                        : "img-3" == sessionStorage.getItem("data-body-image")
                        ? (sessionStorage.setItem("data-body-image", "img-3"),
                          x("data-body-image", "img-3"),
                          document.documentElement.setAttribute(
                              "data-body-image",
                              "img-3"
                          ))
                        : (sessionStorage.setItem("data-body-image", "none"),
                          x("data-body-image", "none"),
                          document.documentElement.setAttribute(
                              "data-body-image",
                              "none"
                          ));
            }
        }
    }
    function E() {
        setTimeout(function () {
            var e,
                t,
                a = document.getElementById("navbar-nav");
            a &&
                ((a = a.querySelector(".nav-item .active")),
                300 < (e = a ? a.offsetTop : 0)) &&
                (t = document.getElementsByClassName("app-menu")
                    ? document.getElementsByClassName("app-menu")[0]
                    : "") &&
                t.querySelector(".simplebar-content-wrapper") &&
                setTimeout(function () {
                    t.querySelector(".simplebar-content-wrapper").scrollTop =
                        330 == e ? e + 85 : e;
                }, 0);
        }, 250);
    }
    var p,
        h,
        v,
        f,
        S,
        I,
        w,
        A,
        L,
        k,
        B,
        z,
        q = new Event("resize");
    function x(e, t) {
        Array.from(document.querySelectorAll("input[name=" + e + "]")).forEach(
            function (s) {
                t == s.value ? (s.checked = !0) : (s.checked = !1),
                    s.addEventListener("change", function () {
                        document.documentElement.setAttribute(e, s.value),
                            sessionStorage.setItem(e, s.value),
                            o(),
                            "data-layout-width" == e && "boxed" == s.value
                                ? (document.documentElement.setAttribute(
                                      "data-sidebar-size",
                                      "sm-hover"
                                  ),
                                  sessionStorage.setItem(
                                      "data-sidebar-size",
                                      "sm-hover"
                                  ),
                                  (document.getElementById(
                                      "sidebar-size-small-hover"
                                  ).checked = !0))
                                : "data-layout-width" == e &&
                                  "fluid" == s.value &&
                                  (document.documentElement.setAttribute(
                                      "data-sidebar-size",
                                      "lg"
                                  ),
                                  sessionStorage.setItem(
                                      "data-sidebar-size",
                                      "lg"
                                  ),
                                  (document.getElementById(
                                      "sidebar-size-default"
                                  ).checked = !0)),
                            "data-layout" == e &&
                                ("vertical" == s.value
                                    ? (g("vertical"), a(), feather.replace())
                                    : "horizontal" == s.value
                                    ? (document.getElementById(
                                          "sidebarimg-none"
                                      ) &&
                                          document
                                              .getElementById("sidebarimg-none")
                                              .click(),
                                      g("horizontal"),
                                      feather.replace())
                                    : "twocolumn" == s.value
                                    ? (g("twocolumn"),
                                      document.documentElement.setAttribute(
                                          "data-layout-width",
                                          "fluid"
                                      ),
                                      document
                                          .getElementById("layout-width-fluid")
                                          .click(),
                                      n(),
                                      m(),
                                      a(),
                                      feather.replace())
                                    : "semibox" == s.value &&
                                      (g("semibox"),
                                      document.documentElement.setAttribute(
                                          "data-layout-width",
                                          "fluid"
                                      ),
                                      document
                                          .getElementById("layout-width-fluid")
                                          .click(),
                                      document.documentElement.setAttribute(
                                          "data-layout-style",
                                          "default"
                                      ),
                                      document
                                          .getElementById(
                                              "sidebar-view-default"
                                          )
                                          .click(),
                                      a(),
                                      feather.replace()));
                        var t,
                            d = "block";
                        "semibox" ==
                            document.documentElement.getAttribute(
                                "data-layout"
                            ) &&
                            ("hidden" ==
                            document.documentElement.getAttribute(
                                "data-sidebar-visibility"
                            )
                                ? (document.documentElement.removeAttribute(
                                      "data-sidebar"
                                  ),
                                  document.documentElement.removeAttribute(
                                      "data-sidebar-image"
                                  ),
                                  document.documentElement.removeAttribute(
                                      "data-sidebar-size"
                                  ),
                                  (d = "none"))
                                : (document.documentElement.setAttribute(
                                      "data-sidebar",
                                      sessionStorage.getItem("data-sidebar")
                                  ),
                                  document.documentElement.setAttribute(
                                      "data-sidebar-image",
                                      sessionStorage.getItem(
                                          "data-sidebar-image"
                                      )
                                  ),
                                  document.documentElement.setAttribute(
                                      "data-sidebar-size",
                                      sessionStorage.getItem(
                                          "data-sidebar-size"
                                      )
                                  ))),
                            (document.getElementById(
                                "sidebar-size"
                            ).style.display = d),
                            (document.getElementById(
                                "sidebar-color"
                            ).style.display = d),
                            document.getElementById("sidebar-img") &&
                                (document.getElementById(
                                    "sidebar-img"
                                ).style.display = d),
                            "data-preloader" == e && "enable" == s.value
                                ? (document.documentElement.setAttribute(
                                      "data-preloader",
                                      "enable"
                                  ),
                                  (t = document.getElementById("preloader")) &&
                                      setTimeout(function () {
                                          (t.style.opacity = "0"),
                                              (t.style.visibility = "hidden");
                                      }, 1e3),
                                  document
                                      .getElementById("customizerclose-btn")
                                      .click())
                                : "data-preloader" == e &&
                                  "disable" == s.value &&
                                  (document.documentElement.setAttribute(
                                      "data-preloader",
                                      "disable"
                                  ),
                                  document
                                      .getElementById("customizerclose-btn")
                                      .click()),
                            ("data-bs-theme" != e &&
                                "data-theme" != e &&
                                "data-theme-colors" != e) ||
                                window.dispatchEvent(q),
                            "data-theme" == e &&
                                (document.documentElement.setAttribute(
                                    "data-theme",
                                    s.value
                                ),
                                (document.getElementById(
                                    "body-img"
                                ).style.display =
                                    "galaxy" === s.value ? "block" : "none"),
                                "galaxy" === s.value
                                    ? (document.documentElement.setAttribute(
                                          "data-sidebar",
                                          "dark"
                                      ),
                                      document.documentElement.setAttribute(
                                          "data-bs-theme",
                                          "dark"
                                      ))
                                    : (document.documentElement.setAttribute(
                                          "data-sidebar",
                                          sessionStorage.getItem("data-sidebar")
                                      ),
                                      document.documentElement.setAttribute(
                                          "data-bs-theme",
                                          sessionStorage.getItem(
                                              "data-bs-theme"
                                          )
                                      ))),
                            ("data-theme-colors" != e && "data-theme" != e) ||
                                setTimeout(() => {
                                    window.dispatchEvent(q);
                                }, 200);
                    });
            }
        ),
            document.getElementById("collapseBgGradient") &&
                Array.from(
                    document.querySelectorAll(
                        "#collapseBgGradient .form-check input"
                    )
                ).forEach(function (e) {
                    var t = document.getElementById("collapseBgGradient");
                    1 == e.checked &&
                        new bootstrap.Collapse(t, { toggle: !1 }).show(),
                        document.querySelector(
                            "[data-bs-target='#collapseBgGradient']"
                        ) &&
                            document
                                .querySelector(
                                    "[data-bs-target='#collapseBgGradient']"
                                )
                                .addEventListener("click", function (e) {
                                    document
                                        .getElementById(
                                            "sidebar-color-gradient"
                                        )
                                        .click();
                                });
                }),
            document.querySelectorAll(
                "[data-bs-target='#collapseBgGradient.show']"
            ) &&
                Array.from(
                    document.querySelectorAll(
                        "[data-bs-target='#collapseBgGradient.show']"
                    )
                ).forEach(function (e) {
                    e.addEventListener("click", function () {
                        var e = document.getElementById("collapseBgGradient");
                        new bootstrap.Collapse(e, { toggle: !1 }).hide();
                    });
                }),
            Array.from(
                document.querySelectorAll("[name='data-sidebar']")
            ).forEach(function (e) {
                document.querySelector(
                    "[data-bs-target='#collapseBgGradient']"
                ) &&
                    (document.querySelector(
                        "#collapseBgGradient .form-check input:checked"
                    )
                        ? document
                              .querySelector(
                                  "[data-bs-target='#collapseBgGradient']"
                              )
                              .classList.add("active")
                        : document
                              .querySelector(
                                  "[data-bs-target='#collapseBgGradient']"
                              )
                              .classList.remove("active"),
                    e.addEventListener("change", function () {
                        document.querySelector(
                            "#collapseBgGradient .form-check input:checked"
                        )
                            ? document
                                  .querySelector(
                                      "[data-bs-target='#collapseBgGradient']"
                                  )
                                  .classList.add("active")
                            : document
                                  .querySelector(
                                      "[data-bs-target='#collapseBgGradient']"
                                  )
                                  .classList.remove("active");
                    }));
            });
    }
    function T(e, t, a, o) {
        var n = document.getElementById(a);
        o.setAttribute(e, t), n && document.getElementById(a).click();
    }
    function C() {
        document.webkitIsFullScreen ||
            document.mozFullScreen ||
            document.msFullscreenElement ||
            document.body.classList.remove("fullscreen-enable");
    }
    function F() {
        var e = 0;
        Array.from(document.getElementsByClassName("cart-item-price")).forEach(
            function (t) {
                e += parseFloat(t.innerHTML);
            }
        ),
            document.getElementById("cart-item-total") &&
                (document.getElementById("cart-item-total").innerHTML =
                    "$" + e.toFixed(2));
    }
    function H() {
        var e;
        "horizontal" !== document.documentElement.getAttribute("data-layout") &&
            (document.getElementById("navbar-nav") &&
                (e = new SimpleBar(document.getElementById("navbar-nav"))) &&
                e.getContentElement(),
            document.getElementsByClassName("twocolumn-iconview")[0] &&
                (e = new SimpleBar(
                    document.getElementsByClassName("twocolumn-iconview")[0]
                )) &&
                e.getContentElement(),
            clearTimeout(z));
    }
    sessionStorage.getItem("defaultAttribute")
        ? (((p = {})["data-layout"] = sessionStorage.getItem("data-layout")),
          (p["data-sidebar-size"] =
              sessionStorage.getItem("data-sidebar-size")),
          (p["data-bs-theme"] = sessionStorage.getItem("data-bs-theme")),
          (p["data-layout-width"] =
              sessionStorage.getItem("data-layout-width")),
          (p["data-sidebar"] = sessionStorage.getItem("data-sidebar")),
          (p["data-sidebar-image"] =
              sessionStorage.getItem("data-sidebar-image")),
          (p["data-layout-position"] = sessionStorage.getItem(
              "data-layout-position"
          )),
          (p["data-layout-style"] =
              sessionStorage.getItem("data-layout-style")),
          (p["data-topbar"] = sessionStorage.getItem("data-topbar")),
          (p["data-preloader"] = sessionStorage.getItem("data-preloader")),
          (p["data-body-image"] = sessionStorage.getItem("data-body-image")),
          (p["data-theme"] = sessionStorage.getItem("data-theme")),
          (p["data-theme-colors"] =
              sessionStorage.getItem("data-theme-colors")),
          y(p))
        : ((A = document.documentElement.attributes),
          (p = {}),
          Array.from(A).forEach(function (e) {
              var t;
              e &&
                  e.nodeName &&
                  "undefined" != e.nodeName &&
                  ((t = e.nodeName),
                  (p[t] = e.nodeValue),
                  sessionStorage.setItem(t, e.nodeValue));
          }),
          sessionStorage.setItem("defaultAttribute", JSON.stringify(p)),
          y(p),
          (A = document.querySelector(
              '.btn[data-bs-target="#theme-settings-offcanvas"]'
          ))),
        document
            .getElementById("sidebarUserProfile")
            ?.addEventListener("click", function (e) {
                e.target.checked
                    ? document.documentElement.setAttribute(
                          "data-sidebar-user-show",
                          ""
                      )
                    : document.documentElement.removeAttribute(
                          "data-sidebar-user-show"
                      );
            }),
        n(),
        (h = document.getElementById("search-close-options")),
        (v = document.getElementById("search-dropdown")),
        (f = document.getElementById("search-options")) &&
            (f.addEventListener("focus", function () {
                0 < f.value.length
                    ? (v.classList.add("show"), h.classList.remove("d-none"))
                    : (v.classList.remove("show"), h.classList.add("d-none"));
            }),
            f.addEventListener("keyup", function (e) {
                var t, a;
                0 < f.value.length
                    ? (v.classList.add("show"),
                      h.classList.remove("d-none"),
                      (t = f.value.toLowerCase()),
                      (a = document.getElementsByClassName("notify-item")),
                      Array.from(a).forEach(function (e) {
                          var a,
                              o,
                              n = "";
                          e.querySelector("h6")
                              ? ((a = e
                                    .getElementsByTagName("span")[0]
                                    .innerText.toLowerCase()),
                                (n = (o = e
                                    .querySelector("h6")
                                    .innerText.toLowerCase()).includes(t)
                                    ? o
                                    : a))
                              : e.getElementsByTagName("span") &&
                                (n = e
                                    .getElementsByTagName("span")[0]
                                    .innerText.toLowerCase()),
                              n &&
                                  (e.style.display = n.includes(t)
                                      ? "block"
                                      : "none");
                      }))
                    : (v.classList.remove("show"), h.classList.add("d-none"));
            }),
            h.addEventListener("click", function () {
                (f.value = ""),
                    v.classList.remove("show"),
                    h.classList.add("d-none");
            }),
            document.body.addEventListener("click", function (e) {
                "search-options" !== e.target.getAttribute("id") &&
                    (v.classList.remove("show"), h.classList.add("d-none"));
            })),
        (S = document.getElementById("search-close-options")),
        (I = document.getElementById("search-dropdown-reponsive")),
        (w = document.getElementById("search-options-reponsive")),
        S &&
            I &&
            w &&
            (w.addEventListener("focus", function () {
                0 < w.value.length
                    ? (I.classList.add("show"), S.classList.remove("d-none"))
                    : (I.classList.remove("show"), S.classList.add("d-none"));
            }),
            w.addEventListener("keyup", function () {
                0 < w.value.length
                    ? (I.classList.add("show"), S.classList.remove("d-none"))
                    : (I.classList.remove("show"), S.classList.add("d-none"));
            }),
            S.addEventListener("click", function () {
                (w.value = ""),
                    I.classList.remove("show"),
                    S.classList.add("d-none");
            }),
            document.body.addEventListener("click", function (e) {
                "search-options" !== e.target.getAttribute("id") &&
                    (I.classList.remove("show"), S.classList.add("d-none"));
            })),
        (A = document.querySelector('[data-toggle="fullscreen"]')) &&
            A.addEventListener("click", function (e) {
                e.preventDefault(),
                    document.body.classList.toggle("fullscreen-enable"),
                    document.fullscreenElement ||
                    document.mozFullScreenElement ||
                    document.webkitFullscreenElement
                        ? document.cancelFullScreen
                            ? document.cancelFullScreen()
                            : document.mozCancelFullScreen
                            ? document.mozCancelFullScreen()
                            : document.webkitCancelFullScreen &&
                              document.webkitCancelFullScreen()
                        : document.documentElement.requestFullscreen
                        ? document.documentElement.requestFullscreen()
                        : document.documentElement.mozRequestFullScreen
                        ? document.documentElement.mozRequestFullScreen()
                        : document.documentElement.webkitRequestFullscreen &&
                          document.documentElement.webkitRequestFullscreen(
                              Element.ALLOW_KEYBOARD_INPUT
                          );
            }),
        document.addEventListener("fullscreenchange", C),
        document.addEventListener("webkitfullscreenchange", C),
        document.addEventListener("mozfullscreenchange", C),
        (L = document.getElementsByTagName("HTML")[0]),
        (B = document.querySelectorAll(".light-dark-mode")) &&
            B.length &&
            B[0].addEventListener("click", function (e) {
                L.hasAttribute("data-bs-theme") &&
                "dark" == L.getAttribute("data-bs-theme")
                    ? T("data-bs-theme", "light", "layout-mode-light", L)
                    : T("data-bs-theme", "dark", "layout-mode-dark", L),
                    window.dispatchEvent(q);
            }),
        (function () {
                window.addEventListener("resize", i),
                i(),
                document.addEventListener("scroll", function () {
                    var e;
                    (e = document.getElementById("page-topbar")) &&
                        (50 <= document.body.scrollTop ||
                        50 <= document.documentElement.scrollTop
                            ? e.classList.add("topbar-shadow")
                            : e.classList.remove("topbar-shadow"));
                }),
                window.addEventListener("load", function () {
                    var e;
                    ("twocolumn" ==
                        document.documentElement.getAttribute("data-layout")
                        ? m
                        : c)(),
                        (e =
                            document.getElementsByClassName(
                                "vertical-overlay"
                            )) &&
                            Array.from(e).forEach(function (e) {
                                e.addEventListener("click", function () {
                                    document.body.classList.remove(
                                        "vertical-sidebar-enable"
                                    ),
                                        "twocolumn" ==
                                        sessionStorage.getItem("data-layout")
                                            ? document.body.classList.add(
                                                  "twocolumn-panel"
                                              )
                                            : document.documentElement.setAttribute(
                                                  "data-sidebar-size",
                                                  sessionStorage.getItem(
                                                      "data-sidebar-size"
                                                  )
                                              );
                                });
                            }),
                        b();
                }),
                document.getElementById("topnav-hamburger-icon") &&
                    document
                        .getElementById("topnav-hamburger-icon")
                        .addEventListener("click", r);
            var e = sessionStorage.getItem("defaultAttribute"),
                t = ((e = JSON.parse(e)), document.documentElement.clientWidth);
            "twocolumn" == e["data-layout"] &&
                t < 767 &&
                Array.from(
                    document
                        .getElementById("two-column-menu")
                        .querySelectorAll("li")
                ).forEach(function (e) {
                    e.addEventListener("click", function (e) {
                        document.body.classList.remove("twocolumn-panel");
                    });
                });
        })(),
        (function () {
            var e = document.querySelectorAll(".counter-value");
            function t(e) {
                return e.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            e &&
                Array.from(e).forEach(function (e) {
                    !(function a() {
                        var o = +e.getAttribute("data-target"),
                            n = +e.innerText,
                            s = o / 250;
                        s < 1 && (s = 1),
                            n < o
                                ? ((e.innerText = (n + s).toFixed(0)),
                                  setTimeout(a, 1))
                                : (e.innerText = t(o)),
                            t(e.innerText);
                    })();
                });
        })(),
        d(),
        document.getElementsByClassName("dropdown-item-cart") &&
            ((k = document.querySelectorAll(".dropdown-item-cart").length),
            Array.from(
                document.querySelectorAll(
                    "#page-topbar .dropdown-menu-cart .remove-item-btn"
                )
            ).forEach(function (e) {
                e.addEventListener("click", function (e) {
                    k--,
                        this.closest(".dropdown-item-cart").remove(),
                        Array.from(
                            document.getElementsByClassName("cartitem-badge")
                        ).forEach(function (e) {
                            e.innerHTML = k;
                        }),
                        F(),
                        document.getElementById("empty-cart") &&
                            (document.getElementById(
                                "empty-cart"
                            ).style.display = 0 == k ? "block" : "none"),
                        document.getElementById("checkout-elem") &&
                            (document.getElementById(
                                "checkout-elem"
                            ).style.display = 0 == k ? "none" : "block");
                });
            }),
            Array.from(
                document.getElementsByClassName("cartitem-badge")
            ).forEach(function (e) {
                e.innerHTML = k;
            }),
            document.getElementById("empty-cart") &&
                (document.getElementById("empty-cart").style.display = "none"),
            document.getElementById("checkout-elem") &&
                (document.getElementById("checkout-elem").style.display =
                    "block"),
            F()),
        [].slice
            .call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            .map(function (e) {
                return new bootstrap.Tooltip(e);
            }),
        [].slice
            .call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            .map(function (e) {
                return new bootstrap.Popover(e);
            }),
        document.getElementById("reset-layout") &&
            document
                .getElementById("reset-layout")
                .addEventListener("click", function () {
                    sessionStorage.clear(), window.location.reload();
                }),
        (B = document.querySelectorAll("[data-toast]")),
        Array.from(B).forEach(function (e) {
            e.addEventListener("click", function () {
                var t = {},
                    a = e.attributes;
                a["data-toast-text"] &&
                    (t.text = a["data-toast-text"].value.toString()),
                    a["data-toast-gravity"] &&
                        (t.gravity = a["data-toast-gravity"].value.toString()),
                    a["data-toast-position"] &&
                        (t.position =
                            a["data-toast-position"].value.toString()),
                    a["data-toast-className"] &&
                        (t.className =
                            a["data-toast-className"].value.toString()),
                    a["data-toast-duration"] &&
                        (t.duration =
                            a["data-toast-duration"].value.toString()),
                    a["data-toast-close"] &&
                        (t.close = a["data-toast-close"].value.toString()),
                    a["data-toast-style"] &&
                        (t.style = a["data-toast-style"].value.toString()),
                    a["data-toast-offset"] &&
                        (t.offset = a["data-toast-offset"]),
                    Toastify({
                        newWindow: !0,
                        text: t.text,
                        gravity: t.gravity,
                        position: t.position,
                        className: "bg-" + t.className,
                        stopOnFocus: !0,
                        offset: { x: t.offset ? 50 : 0, y: t.offset ? 10 : 0 },
                        duration: t.duration,
                        close: "close" == t.close,
                        style:
                            "style" == t.style
                                ? {
                                      background:
                                          "linear-gradient(to right, var(--vz-success), var(--vz-primary))",
                                  }
                                : "",
                    }).showToast();
            });
        }),
        (B = document.querySelectorAll("[data-choices]")),
        Array.from(B).forEach(function (e) {
            var t = {},
                a = e.attributes;
            a["data-choices-groups"] &&
                (t.placeholderValue =
                    "This is a placeholder set in the config"),
                a["data-choices-search-false"] && (t.searchEnabled = !1),
                a["data-choices-search-true"] && (t.searchEnabled = !0),
                a["data-choices-removeItem"] && (t.removeItemButton = !0),
                a["data-choices-sorting-false"] && (t.shouldSort = !1),
                a["data-choices-sorting-true"] && (t.shouldSort = !0),
                a["data-choices-multiple-remove"] && (t.removeItemButton = !0),
                a["data-choices-limit"] &&
                    (t.maxItemCount = a["data-choices-limit"].value.toString()),
                a["data-choices-limit"] &&
                    (t.maxItemCount = a["data-choices-limit"].value.toString()),
                a["data-choices-editItem-true"] && (t.maxItemCount = !0),
                a["data-choices-editItem-false"] && (t.maxItemCount = !1),
                a["data-choices-text-unique-true"] &&
                    (t.duplicateItemsAllowed = !1),
                a["data-choices-text-disabled-true"] && (t.addItems = !1),
                a["data-choices-text-disabled-true"]
                    ? new Choices(e, t).disable()
                    : new Choices(e, t);
        }),
        (B = document.querySelectorAll("[data-provider]")),
        Array.from(B).forEach(function (e) {
            var t, a, o;
            "flatpickr" == e.getAttribute("data-provider")
                ? ((o = e.attributes),
                  ((t = {}).disableMobile = "true"),
                  o["data-date-format"] &&
                      (t.dateFormat = o["data-date-format"].value.toString()),
                  o["data-enable-time"] &&
                      ((t.enableTime = !0),
                      (t.dateFormat =
                          o["data-date-format"].value.toString() + " H:i")),
                  o["data-altFormat"] &&
                      ((t.altInput = !0),
                      (t.altFormat = o["data-altFormat"].value.toString())),
                  o["data-minDate"] &&
                      ((t.minDate = o["data-minDate"].value.toString()),
                      (t.dateFormat = o["data-date-format"].value.toString())),
                  o["data-maxDate"] &&
                      ((t.maxDate = o["data-maxDate"].value.toString()),
                      (t.dateFormat = o["data-date-format"].value.toString())),
                  o["data-deafult-date"] &&
                      ((t.defaultDate =
                          o["data-deafult-date"].value.toString()),
                      (t.dateFormat = o["data-date-format"].value.toString())),
                  o["data-multiple-date"] &&
                      ((t.mode = "multiple"),
                      (t.dateFormat = o["data-date-format"].value.toString())),
                  o["data-range-date"] &&
                      ((t.mode = "range"),
                      (t.dateFormat = o["data-date-format"].value.toString())),
                  o["data-inline-date"] &&
                      ((t.inline = !0),
                      (t.defaultDate = o["data-deafult-date"].value.toString()),
                      (t.dateFormat = o["data-date-format"].value.toString())),
                  o["data-disable-date"] &&
                      ((a = []).push(o["data-disable-date"].value),
                      (t.disable = a.toString().split(","))),
                  o["data-week-number"] &&
                      ((a = []).push(o["data-week-number"].value),
                      (t.weekNumbers = !0)),
                  flatpickr(e, t))
                : "timepickr" == e.getAttribute("data-provider") &&
                  ((a = {}),
                  (o = e.attributes)["data-time-basic"] &&
                      ((a.enableTime = !0),
                      (a.noCalendar = !0),
                      (a.dateFormat = "H:i")),
                  o["data-time-hrs"] &&
                      ((a.enableTime = !0),
                      (a.noCalendar = !0),
                      (a.dateFormat = "H:i"),
                      (a.time_24hr = !0)),
                  o["data-min-time"] &&
                      ((a.enableTime = !0),
                      (a.noCalendar = !0),
                      (a.dateFormat = "H:i"),
                      (a.minTime = o["data-min-time"].value.toString())),
                  o["data-max-time"] &&
                      ((a.enableTime = !0),
                      (a.noCalendar = !0),
                      (a.dateFormat = "H:i"),
                      (a.minTime = o["data-max-time"].value.toString())),
                  o["data-default-time"] &&
                      ((a.enableTime = !0),
                      (a.noCalendar = !0),
                      (a.dateFormat = "H:i"),
                      (a.defaultDate =
                          o["data-default-time"].value.toString())),
                  o["data-time-inline"] &&
                      ((a.enableTime = !0),
                      (a.noCalendar = !0),
                      (a.defaultDate = o["data-time-inline"].value.toString()),
                      (a.inline = !0)),
                  flatpickr(e, a));
        }),
        Array.from(
            document.querySelectorAll('.dropdown-menu a[data-bs-toggle="tab"]')
        ).forEach(function (e) {
            e.addEventListener("click", function (e) {
                e.stopPropagation(), bootstrap.Tab.getInstance(e.target).show();
            });
        }),
        a(),
        E(),
        window.addEventListener("resize", function () {
            z && clearTimeout(z), (z = setTimeout(H, 2e3));
        });
})();
var mybutton = document.getElementById("back-to-top");
function scrollFunction() {
    100 < document.body.scrollTop || 100 < document.documentElement.scrollTop
        ? (mybutton.style.display = "block")
        : (mybutton.style.display = "none");
}
function topFunction() {
    (document.body.scrollTop = 0), (document.documentElement.scrollTop = 0);
}
mybutton &&
    (window.onscroll = function () {
        scrollFunction();
    });

document
    .getElementById("customizer-layout02")
    .addEventListener("click", function () {
        if (this.checked) {
            location.reload();
        }
    });

    document.addEventListener("DOMContentLoaded", function () {
        let currentUrl = window.location.href;
    
        document.querySelectorAll(".menu-dropdown a").forEach(function (link) {
            if (link.href === currentUrl) {
                link.classList.add("active");
                let dropdown = link.closest(".menu-dropdown");
                if (dropdown) {
                    dropdown.classList.add("show");
                    let parentLink = dropdown.previousElementSibling;
                    if (parentLink) {
                        parentLink.classList.remove("collapsed");
                        parentLink.setAttribute("aria-expanded", "true");
                    }
                }
            }
        });
    });