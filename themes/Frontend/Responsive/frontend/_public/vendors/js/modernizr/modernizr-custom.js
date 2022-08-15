/*! modernizr 3.12.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-cssanimations-history-localstorage-sessionstorage-domprefixes-hasevent-mq-setclasses-testallprops-testprop-teststyles !*/
!function (e, n, t, r) {
    function o(e, n) {
        return typeof e === n
    }

    function i() {
        return "function" != typeof t.createElement ? t.createElement(arguments[0]) : b ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments)
    }

    function s() {
        var e = t.body;
        return e || (e = i(b ? "svg" : "body"), e.fake = !0), e
    }

    function a(e, n, r, o) {
        var a, l, u, f, c = "modernizr", d = i("div"), p = s();
        if (parseInt(r, 10)) for (; r--;) u = i("div"), u.id = o ? o[r] : c + (r + 1), d.appendChild(u);
        return a = i("style"), a.type = "text/css", a.id = "s" + c, (p.fake ? p : d).appendChild(a), p.appendChild(d), a.styleSheet ? a.styleSheet.cssText = e : a.appendChild(t.createTextNode(e)), d.id = c, p.fake && (p.style.background = "", p.style.overflow = "hidden", f = w.style.overflow, w.style.overflow = "hidden", w.appendChild(p)), l = n(d, e), p.fake && p.parentNode ? (p.parentNode.removeChild(p), w.style.overflow = f, w.offsetHeight) : d.parentNode.removeChild(d), !!l
    }

    function l(e, t, r) {
        var o;
        if ("getComputedStyle" in n) {
            o = getComputedStyle.call(n, e, t);
            var i = n.console;
            if (null !== o) r && (o = o.getPropertyValue(r)); else if (i) {
                var s = i.error ? "error" : "log";
                i[s].call(i, "getComputedStyle returning null, its possible modernizr test results are inaccurate")
            }
        } else o = !t && e.currentStyle && e.currentStyle[r];
        return o
    }

    function u(e, n) {
        return !!~("" + e).indexOf(n)
    }

    function f(e) {
        return e.replace(/([A-Z])/g, function (e, n) {
            return "-" + n.toLowerCase()
        }).replace(/^ms-/, "-ms-")
    }

    function c(e, t) {
        var o = e.length;
        if ("CSS" in n && "supports" in n.CSS) {
            for (; o--;) if (n.CSS.supports(f(e[o]), t)) return !0;
            return !1
        }
        if ("CSSSupportsRule" in n) {
            for (var i = []; o--;) i.push("(" + f(e[o]) + ":" + t + ")");
            return i = i.join(" or "), a("@supports (" + i + ") { #modernizr { position: absolute; } }", function (e) {
                return "absolute" === l(e, null, "position")
            })
        }
        return r
    }

    function d(e) {
        return e.replace(/([a-z])-([a-z])/g, function (e, n, t) {
            return n + t.toUpperCase()
        }).replace(/^-/, "")
    }

    function p(e, n, t, s) {
        function a() {
            f && (delete N.style, delete N.modElem)
        }

        if (s = !o(s, "undefined") && s, !o(t, "undefined")) {
            var l = c(e, t);
            if (!o(l, "undefined")) return l
        }
        for (var f, p, m, v, h, y = ["modernizr", "tspan", "samp"]; !N.style && y.length;) f = !0, N.modElem = i(y.shift()), N.style = N.modElem.style;
        for (m = e.length, p = 0; p < m; p++) if (v = e[p], h = N.style[v], u(v, "-") && (v = d(v)), N.style[v] !== r) {
            if (s || o(t, "undefined")) return a(), "pfx" !== n || v;
            try {
                N.style[v] = t
            } catch (e) {
            }
            if (N.style[v] !== h) return a(), "pfx" !== n || v
        }
        return a(), !1
    }

    function m(e, n) {
        return function () {
            return e.apply(n, arguments)
        }
    }

    function v(e, n, t) {
        var r;
        for (var i in e) if (e[i] in n) return !1 === t ? e[i] : (r = n[e[i]], o(r, "function") ? m(r, t || n) : r);
        return !1
    }

    function h(e, n, t, r, i) {
        var s = e.charAt(0).toUpperCase() + e.slice(1), a = (e + " " + A.join(s + " ") + s).split(" ");
        return o(n, "string") || o(n, "undefined") ? p(a, n, r, i) : (a = (e + " " + _.join(s + " ") + s).split(" "), v(a, n, t))
    }

    function y(e, n, t) {
        return h(e, r, r, n, t)
    }

    var g = [], S = {
        _version: "3.12.0",
        _config: {classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0},
        _q: [],
        on: function (e, n) {
            var t = this;
            setTimeout(function () {
                n(t[e])
            }, 0)
        },
        addTest: function (e, n, t) {
            g.push({name: e, fn: n, options: t})
        },
        addAsyncTest: function (e) {
            g.push({name: null, fn: e})
        }
    }, Modernizr = function () {
    };
    Modernizr.prototype = S, Modernizr = new Modernizr;
    var C = [], w = t.documentElement, b = "svg" === w.nodeName.toLowerCase(), x = "Moz O ms Webkit",
        _ = S._config.usePrefixes ? x.toLowerCase().split(" ") : [];
    S._domPrefixes = _;
    var z = function () {
        function e(e, t) {
            var o;
            return !!e && (t && "string" != typeof t || (t = i(t || "div")), e = "on" + e, o = e in t, !o && n && (t.setAttribute || (t = i("div")), t.setAttribute(e, ""), o = "function" == typeof t[e], t[e] !== r && (t[e] = r), t.removeAttribute(e)), o)
        }

        var n = !("onblur" in w);
        return e
    }();
    S.hasEvent = z;
    var P = function () {
        var e = n.matchMedia || n.msMatchMedia;
        return e ? function (n) {
            var t = e(n);
            return t && t.matches || !1
        } : function (e) {
            var n = !1;
            return a("@media " + e + " { #modernizr { position: absolute; } }", function (e) {
                n = "absolute" === l(e, null, "position")
            }), n
        }
    }();
    S.mq = P;
    var A = S._config.usePrefixes ? x.split(" ") : [];
    S._cssomPrefixes = A;
    var E = {elem: i("modernizr")};
    Modernizr._q.push(function () {
        delete E.elem
    });
    var N = {style: E.elem.style};
    Modernizr._q.unshift(function () {
        delete N.style
    }), S.testAllProps = h, S.testAllProps = y;
    S.testProp = function (e, n, t) {
        return p([e], r, n, t)
    }, S.testStyles = a;
    Modernizr.addTest("history", function () {
        var e = navigator.userAgent;
        return !!e && ((-1 === e.indexOf("Android 2.") && -1 === e.indexOf("Android 4.0") || -1 === e.indexOf("Mobile Safari") || -1 !== e.indexOf("Chrome") || -1 !== e.indexOf("Windows Phone") || "file:" === location.protocol) && (n.history && "pushState" in n.history))
    }), Modernizr.addTest("cssanimations", y("animationName", "a", !0)), Modernizr.addTest("localstorage", function () {
        var e = "modernizr";
        try {
            return localStorage.setItem(e, e), localStorage.removeItem(e), !0
        } catch (e) {
            return !1
        }
    }), Modernizr.addTest("sessionstorage", function () {
        var e = "modernizr";
        try {
            return sessionStorage.setItem(e, e), sessionStorage.removeItem(e), !0
        } catch (e) {
            return !1
        }
    }), function () {
        var e, n, t, r, i, s, a;
        for (var l in g) if (g.hasOwnProperty(l)) {
            if (e = [], n = g[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) for (t = 0; t < n.options.aliases.length; t++) e.push(n.options.aliases[t].toLowerCase());
            for (r = o(n.fn, "function") ? n.fn() : n.fn, i = 0; i < e.length; i++) s = e[i], a = s.split("."), 1 === a.length ? Modernizr[a[0]] = r : (Modernizr[a[0]] && (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean) || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = r), C.push((r ? "" : "no-") + a.join("-"))
        }
    }(), function (e) {
        var n = w.className, t = Modernizr._config.classPrefix || "";
        if (b && (n = n.baseVal), Modernizr._config.enableJSClass) {
            var r = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");
            n = n.replace(r, "$1" + t + "js$2")
        }
        Modernizr._config.enableClasses && (e.length > 0 && (n += " " + t + e.join(" " + t)), b ? w.className.baseVal = n : w.className = n)
    }(C), delete S.addTest, delete S.addAsyncTest;
    for (var T = 0; T < Modernizr._q.length; T++) Modernizr._q[T]();
    e.Modernizr = Modernizr
}(window, window, document);
