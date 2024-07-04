/*!
   SpryMedia Ltd.

 This source file is free software, available under the following license:
   MIT license - http://datatables.net/license/mit

 This source file is distributed in the hope that it will be useful, but
 WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 or FITNESS FOR A PARTICULAR PURPOSE. See the license files for details.

 For details please refer to: http://www.datatables.net
 Responsive 2.3.0
 2014-2022 SpryMedia Ltd - datatables.net/license
*/
var $jscomp = $jscomp || {};
$jscomp.scope = {};
$jscomp.findInternal = function (b, k, m) {
    b instanceof String && (b = String(b));
    for (var n = b.length, p = 0; p < n; p++) {
        var y = b[p];
        if (k.call(m, y, p, b)) return {
            i: p,
            v: y
        }
    }
    return {
        i: -1,
        v: void 0
    }
};
$jscomp.ASSUME_ES5 = !1;
$jscomp.ASSUME_NO_NATIVE_MAP = !1;
$jscomp.ASSUME_NO_NATIVE_SET = !1;
$jscomp.SIMPLE_FROUND_POLYFILL = !1;
$jscomp.ISOLATE_POLYFILLS = !1;
$jscomp.defineProperty = $jscomp.ASSUME_ES5 || "function" == typeof Object.defineProperties ? Object.defineProperty : function (b, k, m) {
    if (b == Array.prototype || b == Object.prototype) return b;
    b[k] = m.value;
    return b
};
$jscomp.getGlobal = function (b) {
    b = ["object" == typeof globalThis && globalThis, b, "object" == typeof window && window, "object" == typeof self && self, "object" == typeof global && global];
    for (var k = 0; k < b.length; ++k) {
        var m = b[k];
        if (m && m.Math == Math) return m
    }
    throw Error("Cannot find global object");
};
$jscomp.global = $jscomp.getGlobal(this);
$jscomp.IS_SYMBOL_NATIVE = "function" === typeof Symbol && "symbol" === typeof Symbol("x");
$jscomp.TRUST_ES6_POLYFILLS = !$jscomp.ISOLATE_POLYFILLS || $jscomp.IS_SYMBOL_NATIVE;
$jscomp.polyfills = {};
$jscomp.propertyToPolyfillSymbol = {};
$jscomp.POLYFILL_PREFIX = "$jscp$";
var $jscomp$lookupPolyfilledValue = function (b, k) {
    var m = $jscomp.propertyToPolyfillSymbol[k];
    if (null == m) return b[k];
    m = b[m];
    return void 0 !== m ? m : b[k]
};
$jscomp.polyfill = function (b, k, m, n) {
    k && ($jscomp.ISOLATE_POLYFILLS ? $jscomp.polyfillIsolated(b, k, m, n) : $jscomp.polyfillUnisolated(b, k, m, n))
};
$jscomp.polyfillUnisolated = function (b, k, m, n) {
    m = $jscomp.global;
    b = b.split(".");
    for (n = 0; n < b.length - 1; n++) {
        var p = b[n];
        if (!(p in m)) return;
        m = m[p]
    }
    b = b[b.length - 1];
    n = m[b];
    k = k(n);
    k != n && null != k && $jscomp.defineProperty(m, b, {
        configurable: !0,
        writable: !0,
        value: k
    })
};
$jscomp.polyfillIsolated = function (b, k, m, n) {
    var p = b.split(".");
    b = 1 === p.length;
    n = p[0];
    n = !b && n in $jscomp.polyfills ? $jscomp.polyfills : $jscomp.global;
    for (var y = 0; y < p.length - 1; y++) {
        var z = p[y];
        if (!(z in n)) return;
        n = n[z]
    }
    p = p[p.length - 1];
    m = $jscomp.IS_SYMBOL_NATIVE && "es6" === m ? n[p] : null;
    k = k(m);
    null != k && (b ? $jscomp.defineProperty($jscomp.polyfills, p, {
        configurable: !0,
        writable: !0,
        value: k
    }) : k !== m && ($jscomp.propertyToPolyfillSymbol[p] = $jscomp.IS_SYMBOL_NATIVE ? $jscomp.global.Symbol(p) : $jscomp.POLYFILL_PREFIX + p, p =
        $jscomp.propertyToPolyfillSymbol[p], $jscomp.defineProperty(n, p, {
            configurable: !0,
            writable: !0,
            value: k
        })))
};
$jscomp.polyfill("Array.prototype.find", function (b) {
    return b ? b : function (k, m) {
        return $jscomp.findInternal(this, k, m).v
    }
}, "es6", "es3");
(function (b) {
    "function" === typeof define && define.amd ? define(["jquery", "datatables.net"], function (k) {
        return b(k, window, document)
    }) : "object" === typeof exports ? module.exports = function (k, m) {
        k || (k = window);
        m && m.fn.dataTable || (m = require("datatables.net")(k, m).$);
        return b(m, k, k.document)
    } : b(jQuery, window, document)
})(function (b, k, m, n) {
    function p(a, c, d) {
        var g = c + "-" + d;
        if (A[g]) return A[g];
        var f = [];
        a = a.cell(c, d).node().childNodes;
        c = 0;
        for (d = a.length; c < d; c++) f.push(a[c]);
        return A[g] = f
    }

    function y(a, c, d) {
        var g = c + "-" +
            d;
        if (A[g]) {
            a = a.cell(c, d).node();
            d = A[g][0].parentNode.childNodes;
            c = [];
            for (var f = 0, l = d.length; f < l; f++) c.push(d[f]);
            d = 0;
            for (f = c.length; d < f; d++) a.appendChild(c[d]);
            A[g] = n
        }
    }
    var z = b.fn.dataTable,
        u = function (a, c) {
            if (!z.versionCheck || !z.versionCheck("1.10.10")) throw "DataTables Responsive requires DataTables 1.10.10 or newer";
            this.s = {
                dt: new z.Api(a),
                columns: [],
                current: []
            };
            this.s.dt.settings()[0].responsive || (c && "string" === typeof c.details ? c.details = {
                    type: c.details
                } : c && !1 === c.details ? c.details = {
                    type: !1
                } : c &&
                !0 === c.details && (c.details = {
                    type: "inline"
                }), this.c = b.extend(!0, {}, u.defaults, z.defaults.responsive, c), a.responsive = this, this._constructor())
        };
    b.extend(u.prototype, {
        _constructor: function () {
            var a = this,
                c = this.s.dt,
                d = c.settings()[0],
                g = b(k).innerWidth();
            c.settings()[0]._responsive = this;
            b(k).on("resize.dtr orientationchange.dtr", z.util.throttle(function () {
                var f = b(k).innerWidth();
                f !== g && (a._resize(), g = f)
            }));
            d.oApi._fnCallbackReg(d, "aoRowCreatedCallback", function (f, l, h) {
                -1 !== b.inArray(!1, a.s.current) && b(">td, >th",
                    f).each(function (e) {
                    e = c.column.index("toData", e);
                    !1 === a.s.current[e] && b(this).css("display", "none")
                })
            });
            c.on("destroy.dtr", function () {
                c.off(".dtr");
                b(c.table().body()).off(".dtr");
                b(k).off("resize.dtr orientationchange.dtr");
                c.cells(".dtr-control").nodes().to$().removeClass("dtr-control");
                b.each(a.s.current, function (f, l) {
                    !1 === l && a._setColumnVis(f, !0)
                })
            });
            this.c.breakpoints.sort(function (f, l) {
                return f.width < l.width ? 1 : f.width > l.width ? -1 : 0
            });
            this._classLogic();
            this._resizeAuto();
            d = this.c.details;
            !1 !==
                d.type && (a._detailsInit(), c.on("column-visibility.dtr", function () {
                    a._timer && clearTimeout(a._timer);
                    a._timer = setTimeout(function () {
                        a._timer = null;
                        a._classLogic();
                        a._resizeAuto();
                        a._resize(!0);
                        a._redrawChildren()
                    }, 100)
                }), c.on("draw.dtr", function () {
                    a._redrawChildren()
                }), b(c.table().node()).addClass("dtr-" + d.type));
            c.on("column-reorder.dtr", function (f, l, h) {
                a._classLogic();
                a._resizeAuto();
                a._resize(!0)
            });
            c.on("column-sizing.dtr", function () {
                a._resizeAuto();
                a._resize()
            });
            c.on("column-calc.dt", function (f,
                l) {
                f = a.s.current;
                for (var h = 0; h < f.length; h++) {
                    var e = l.visible.indexOf(h);
                    !1 === f[h] && 0 <= e && l.visible.splice(e, 1)
                }
            });
            c.on("preXhr.dtr", function () {
                var f = [];
                c.rows().every(function () {
                    this.child.isShown() && f.push(this.id(!0))
                });
                c.one("draw.dtr", function () {
                    a._resizeAuto();
                    a._resize();
                    c.rows(f).every(function () {
                        a._detailsDisplay(this, !1)
                    })
                })
            });
            c.on("draw.dtr", function () {
                a._controlClass()
            }).on("init.dtr", function (f, l, h) {
                "dt" === f.namespace && (a._resizeAuto(), a._resize(), b.inArray(!1, a.s.current) && c.columns.adjust())
            });
            this._resize()
        },
        _columnsVisiblity: function (a) {
            var c = this.s.dt,
                d = this.s.columns,
                g, f = d.map(function (t, v) {
                    return {
                        columnIdx: v,
                        priority: t.priority
                    }
                }).sort(function (t, v) {
                    return t.priority !== v.priority ? t.priority - v.priority : t.columnIdx - v.columnIdx
                }),
                l = b.map(d, function (t, v) {
                    return !1 === c.column(v).visible() ? "not-visible" : t.auto && null === t.minWidth ? !1 : !0 === t.auto ? "-" : -1 !== b.inArray(a, t.includeIn)
                }),
                h = 0;
            var e = 0;
            for (g = l.length; e < g; e++) !0 === l[e] && (h += d[e].minWidth);
            e = c.settings()[0].oScroll;
            e = e.sY || e.sX ? e.iBarWidth :
                0;
            h = c.table().container().offsetWidth - e - h;
            e = 0;
            for (g = l.length; e < g; e++) d[e].control && (h -= d[e].minWidth);
            var r = !1;
            e = 0;
            for (g = f.length; e < g; e++) {
                var q = f[e].columnIdx;
                "-" === l[q] && !d[q].control && d[q].minWidth && (r || 0 > h - d[q].minWidth ? (r = !0, l[q] = !1) : l[q] = !0, h -= d[q].minWidth)
            }
            f = !1;
            e = 0;
            for (g = d.length; e < g; e++)
                if (!d[e].control && !d[e].never && !1 === l[e]) {
                    f = !0;
                    break
                } e = 0;
            for (g = d.length; e < g; e++) d[e].control && (l[e] = f), "not-visible" === l[e] && (l[e] = !1); - 1 === b.inArray(!0, l) && (l[0] = !0);
            return l
        },
        _classLogic: function () {
            var a =
                this,
                c = this.c.breakpoints,
                d = this.s.dt,
                g = d.columns().eq(0).map(function (h) {
                    var e = this.column(h),
                        r = e.header().className;
                    h = d.settings()[0].aoColumns[h].responsivePriority;
                    e = e.header().getAttribute("data-priority");
                    h === n && (h = e === n || null === e ? 1E4 : 1 * e);
                    return {
                        className: r,
                        includeIn: [],
                        auto: !1,
                        control: !1,
                        never: r.match(/\b(dtr\-)?never\b/) ? !0 : !1,
                        priority: h
                    }
                }),
                f = function (h, e) {
                    h = g[h].includeIn; - 1 === b.inArray(e, h) && h.push(e)
                },
                l = function (h, e, r, q) {
                    if (!r) g[h].includeIn.push(e);
                    else if ("max-" === r)
                        for (q = a._find(e).width,
                            e = 0, r = c.length; e < r; e++) c[e].width <= q && f(h, c[e].name);
                    else if ("min-" === r)
                        for (q = a._find(e).width, e = 0, r = c.length; e < r; e++) c[e].width >= q && f(h, c[e].name);
                    else if ("not-" === r)
                        for (e = 0, r = c.length; e < r; e++) - 1 === c[e].name.indexOf(q) && f(h, c[e].name)
                };
            g.each(function (h, e) {
                for (var r = h.className.split(" "), q = !1, t = 0, v = r.length; t < v; t++) {
                    var B = r[t].trim();
                    if ("all" === B || "dtr-all" === B) {
                        q = !0;
                        h.includeIn = b.map(c, function (w) {
                            return w.name
                        });
                        return
                    }
                    if ("none" === B || "dtr-none" === B || h.never) {
                        q = !0;
                        return
                    }
                    if ("control" === B || "dtr-control" ===
                        B) {
                        q = !0;
                        h.control = !0;
                        return
                    }
                    b.each(c, function (w, D) {
                        w = D.name.split("-");
                        var x = B.match(new RegExp("(min\\-|max\\-|not\\-)?(" + w[0] + ")(\\-[_a-zA-Z0-9])?"));
                        x && (q = !0, x[2] === w[0] && x[3] === "-" + w[1] ? l(e, D.name, x[1], x[2] + x[3]) : x[2] !== w[0] || x[3] || l(e, D.name, x[1], x[2]))
                    })
                }
                q || (h.auto = !0)
            });
            this.s.columns = g
        },
        _controlClass: function () {
            if ("inline" === this.c.details.type) {
                var a = this.s.dt,
                    c = b.inArray(!0, this.s.current);
                a.cells(null, function (d) {
                    return d !== c
                }, {
                    page: "current"
                }).nodes().to$().filter(".dtr-control").removeClass("dtr-control");
                a.cells(null, c, {
                    page: "current"
                }).nodes().to$().addClass("dtr-control")
            }
        },
        _detailsDisplay: function (a, c) {
            var d = this,
                g = this.s.dt,
                f = this.c.details;
            if (f && !1 !== f.type) {
                var l = "string" === typeof f.renderer ? u.renderer[f.renderer]() : f.renderer;
                f = f.display(a, c, function () {
                    return l(g, a[0], d._detailsObj(a[0]))
                });
                !0 !== f && !1 !== f || b(g.table().node()).triggerHandler("responsive-display.dt", [g, a, f, c])
            }
        },
        _detailsInit: function () {
            var a = this,
                c = this.s.dt,
                d = this.c.details;
            "inline" === d.type && (d.target = "td.dtr-control, th.dtr-control");
            c.on("draw.dtr", function () {
                a._tabIndexes()
            });
            a._tabIndexes();
            b(c.table().body()).on("keyup.dtr", "td, th", function (f) {
                13 === f.keyCode && b(this).data("dtr-keyboard") && b(this).click()
            });
            var g = d.target;
            d = "string" === typeof g ? g : "td, th";
            if (g !== n || null !== g) b(c.table().body()).on("click.dtr mousedown.dtr mouseup.dtr", d, function (f) {
                if (b(c.table().node()).hasClass("collapsed") && -1 !== b.inArray(b(this).closest("tr").get(0), c.rows().nodes().toArray())) {
                    if ("number" === typeof g) {
                        var l = 0 > g ? c.columns().eq(0).length +
                            g : g;
                        if (c.cell(this).index().column !== l) return
                    }
                    l = c.row(b(this).closest("tr"));
                    "click" === f.type ? a._detailsDisplay(l, !1) : "mousedown" === f.type ? b(this).css("outline", "none") : "mouseup" === f.type && b(this).trigger("blur").css("outline", "")
                }
            })
        },
        _detailsObj: function (a) {
            var c = this,
                d = this.s.dt;
            return b.map(this.s.columns, function (g, f) {
                if (!g.never && !g.control) return g = d.settings()[0].aoColumns[f], {
                    className: g.sClass,
                    columnIndex: f,
                    data: d.cell(a, f).render(c.c.orthogonal),
                    hidden: d.column(f).visible() && !c.s.current[f],
                    rowIndex: a,
                    title: null !== g.sTitle ? g.sTitle : b(d.column(f).header()).text()
                }
            })
        },
        _find: function (a) {
            for (var c = this.c.breakpoints, d = 0, g = c.length; d < g; d++)
                if (c[d].name === a) return c[d]
        },
        _redrawChildren: function () {
            var a = this,
                c = this.s.dt;
            c.rows({
                page: "current"
            }).iterator("row", function (d, g) {
                c.row(g);
                a._detailsDisplay(c.row(g), !0)
            })
        },
        _resize: function (a) {
            var c = this,
                d = this.s.dt,
                g = b(k).innerWidth(),
                f = this.c.breakpoints,
                l = f[0].name,
                h = this.s.columns,
                e, r = this.s.current.slice();
            for (e = f.length - 1; 0 <= e; e--)
                if (g <= f[e].width) {
                    l =
                        f[e].name;
                    break
                } var q = this._columnsVisiblity(l);
            this.s.current = q;
            f = !1;
            e = 0;
            for (g = h.length; e < g; e++)
                if (!1 === q[e] && !h[e].never && !h[e].control && !1 === !d.column(e).visible()) {
                    f = !0;
                    break
                } b(d.table().node()).toggleClass("collapsed", f);
            var t = !1,
                v = 0;
            d.columns().eq(0).each(function (B, w) {
                !0 === q[w] && v++;
                if (a || q[w] !== r[w]) t = !0, c._setColumnVis(B, q[w])
            });
            t && (this._redrawChildren(), b(d.table().node()).trigger("responsive-resize.dt", [d, this.s.current]), 0 === d.page.info().recordsDisplay && b("td", d.table().body()).eq(0).attr("colspan",
                v));
            c._controlClass()
        },
        _resizeAuto: function () {
            var a = this.s.dt,
                c = this.s.columns;
            if (this.c.auto && -1 !== b.inArray(!0, b.map(c, function (e) {
                    return e.auto
                }))) {
                b.isEmptyObject(A) || b.each(A, function (e) {
                    e = e.split("-");
                    y(a, 1 * e[0], 1 * e[1])
                });
                a.table().node();
                var d = a.table().node().cloneNode(!1),
                    g = b(a.table().header().cloneNode(!1)).appendTo(d),
                    f = b(a.table().body()).clone(!1, !1).empty().appendTo(d);
                d.style.width = "auto";
                var l = a.columns().header().filter(function (e) {
                    return a.column(e).visible()
                }).to$().clone(!1).css("display",
                    "table-cell").css("width", "auto").css("min-width", 0);
                b(f).append(b(a.rows({
                    page: "current"
                }).nodes()).clone(!1)).find("th, td").css("display", "");
                if (f = a.table().footer()) {
                    f = b(f.cloneNode(!1)).appendTo(d);
                    var h = a.columns().footer().filter(function (e) {
                        return a.column(e).visible()
                    }).to$().clone(!1).css("display", "table-cell");
                    b("<tr/>").append(h).appendTo(f)
                }
                b("<tr/>").append(l).appendTo(g);
                "inline" === this.c.details.type && b(d).addClass("dtr-inline collapsed");
                b(d).find("[name]").removeAttr("name");
                b(d).css("position",
                    "relative");
                d = b("<div/>").css({
                    width: 1,
                    height: 1,
                    overflow: "hidden",
                    clear: "both"
                }).append(d);
                d.insertBefore(a.table().node());
                l.each(function (e) {
                    e = a.column.index("fromVisible", e);
                    c[e].minWidth = this.offsetWidth || 0
                });
                d.remove()
            }
        },
        _responsiveOnlyHidden: function () {
            var a = this.s.dt;
            return b.map(this.s.current, function (c, d) {
                return !1 === a.column(d).visible() ? !0 : c
            })
        },
        _setColumnVis: function (a, c) {
            var d = this.s.dt,
                g = c ? "" : "none";
            b(d.column(a).header()).css("display", g).toggleClass("dtr-hidden", !c);
            b(d.column(a).footer()).css("display",
                g).toggleClass("dtr-hidden", !c);
            d.column(a).nodes().to$().css("display", g).toggleClass("dtr-hidden", !c);
            b.isEmptyObject(A) || d.cells(null, a).indexes().each(function (f) {
                y(d, f.row, f.column)
            })
        },
        _tabIndexes: function () {
            var a = this.s.dt,
                c = a.cells({
                    page: "current"
                }).nodes().to$(),
                d = a.settings()[0],
                g = this.c.details.target;
            c.filter("[data-dtr-keyboard]").removeData("[data-dtr-keyboard]");
            "number" === typeof g ? a.cells(null, g, {
                page: "current"
            }).nodes().to$().attr("tabIndex", d.iTabIndex).data("dtr-keyboard", 1) : ("td:first-child, th:first-child" ===
                g && (g = ">td:first-child, >th:first-child"), b(g, a.rows({
                    page: "current"
                }).nodes()).attr("tabIndex", d.iTabIndex).data("dtr-keyboard", 1))
        }
    });
    u.breakpoints = [{
        name: "desktop",
        width: Infinity
    }, {
        name: "tablet-l",
        width: 1024
    }, {
        name: "tablet-p",
        width: 768
    }, {
        name: "mobile-l",
        width: 480
    }, {
        name: "mobile-p",
        width: 320
    }];
    u.display = {
        childRow: function (a, c, d) {
            if (c) {
                if (b(a.node()).hasClass("parent")) return a.child(d(), "child").show(), !0
            } else {
                if (a.child.isShown()) return a.child(!1), b(a.node()).removeClass("parent"), !1;
                a.child(d(),
                    "child").show();
                b(a.node()).addClass("parent");
                return !0
            }
        },
        childRowImmediate: function (a, c, d) {
            if (!c && a.child.isShown() || !a.responsive.hasHidden()) return a.child(!1), b(a.node()).removeClass("parent"), !1;
            a.child(d(), "child").show();
            b(a.node()).addClass("parent");
            return !0
        },
        modal: function (a) {
            return function (c, d, g) {
                if (d) b("div.dtr-modal-content").empty().append(g());
                else {
                    var f = function () {
                            l.remove();
                            b(m).off("keypress.dtr")
                        },
                        l = b('<div class="dtr-modal"/>').append(b('<div class="dtr-modal-display"/>').append(b('<div class="dtr-modal-content"/>').append(g())).append(b('<div class="dtr-modal-close">&times;</div>').click(function () {
                            f()
                        }))).append(b('<div class="dtr-modal-background"/>').click(function () {
                            f()
                        })).appendTo("body");
                    b(m).on("keyup.dtr", function (h) {
                        27 === h.keyCode && (h.stopPropagation(), f())
                    })
                }
                a && a.header && b("div.dtr-modal-content").prepend("<h2>" + a.header(c) + "</h2>")
            }
        }
    };
    var A = {};
    u.renderer = {
        listHiddenNodes: function () {
            return function (a, c, d) {
                var g = b('<ul data-dtr-index="' + c + '" class="dtr-details"/>'),
                    f = !1;
                b.each(d, function (l, h) {
                    h.hidden && (b("<li " + (h.className ? 'class="' + h.className + '"' : "") + ' data-dtr-index="' + h.columnIndex + '" data-dt-row="' + h.rowIndex + '" data-dt-column="' + h.columnIndex + '"><span class="dtr-title">' +
                        h.title + "</span> </li>").append(b('<span class="dtr-data"/>').append(p(a, h.rowIndex, h.columnIndex))).appendTo(g), f = !0)
                });
                return f ? g : !1
            }
        },
        listHidden: function () {
            return function (a, c, d) {
                return (a = b.map(d, function (g) {
                    var f = g.className ? 'class="' + g.className + '"' : "";
                    return g.hidden ? "<li " + f + ' data-dtr-index="' + g.columnIndex + '" data-dt-row="' + g.rowIndex + '" data-dt-column="' + g.columnIndex + '"><span class="dtr-title">' + g.title + '</span> <span class="dtr-data">' + g.data + "</span></li>" : ""
                }).join("")) ? b('<ul data-dtr-index="' +
                    c + '" class="dtr-details"/>').append(a) : !1
            }
        },
        tableAll: function (a) {
            a = b.extend({
                tableClass: ""
            }, a);
            return function (c, d, g) {
                c = b.map(g, function (f) {
                    return "<tr " + (f.className ? 'class="' + f.className + '"' : "") + ' data-dt-row="' + f.rowIndex + '" data-dt-column="' + f.columnIndex + '"><td>' + f.title + ":</td> <td>" + f.data + "</td></tr>"
                }).join("");
                return b('<table class="' + a.tableClass + ' dtr-details" width="100%"/>').append(c)
            }
        }
    };
    u.defaults = {
        breakpoints: u.breakpoints,
        auto: !0,
        details: {
            display: u.display.childRow,
            renderer: u.renderer.listHidden(),
            target: 0,
            type: "inline"
        },
        orthogonal: "display"
    };
    var C = b.fn.dataTable.Api;
    C.register("responsive()", function () {
        return this
    });
    C.register("responsive.index()", function (a) {
        a = b(a);
        return {
            column: a.data("dtr-index"),
            row: a.parent().data("dtr-index")
        }
    });
    C.register("responsive.rebuild()", function () {
        return this.iterator("table", function (a) {
            a._responsive && a._responsive._classLogic()
        })
    });
    C.register("responsive.recalc()", function () {
        return this.iterator("table", function (a) {
            a._responsive && (a._responsive._resizeAuto(),
                a._responsive._resize())
        })
    });
    C.register("responsive.hasHidden()", function () {
        var a = this.context[0];
        return a._responsive ? -1 !== b.inArray(!1, a._responsive._responsiveOnlyHidden()) : !1
    });
    C.registerPlural("columns().responsiveHidden()", "column().responsiveHidden()", function () {
        return this.iterator("column", function (a, c) {
            return a._responsive ? a._responsive._responsiveOnlyHidden()[c] : !1
        }, 1)
    });
    u.version = "2.3.0";
    b.fn.dataTable.Responsive = u;
    b.fn.DataTable.Responsive = u;
    b(m).on("preInit.dt.dtr", function (a, c, d) {
        "dt" ===
        a.namespace && (b(c.nTable).hasClass("responsive") || b(c.nTable).hasClass("dt-responsive") || c.oInit.responsive || z.defaults.responsive) && (a = c.oInit.responsive, !1 !== a && new u(c, b.isPlainObject(a) ? a : {}))
    });
    return u
});
