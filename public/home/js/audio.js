(function (b, e, c) {
    var d = function () {
        for (var f = /audio(.min)?.js.*/, g = document.getElementsByTagName("script"), j = 0, i = g.length; j < i; j++) {
            var h = g[j].getAttribute("src");
            if (f.test(h)) {
                return h.replace(f, "")
            }
        }
    }();
    c[b] = {
        instanceCount: 0,
        instances: {},
        flashSource: '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="$1" width="1" height="1" name="$1" style="position: absolute; left: -1px;">         <param name="movie" value="$2?playerInstance=' + b + '.instances[\'$1\']&datetime=$3">         <param name="allowscriptaccess" value="always">         <embed name="$1" src="$2?playerInstance=' + b + '.instances[\'$1\']&datetime=$3" width="1" height="1" allowscriptaccess="always"></object>',
        settings: {
            autoplay: true,
            loop: false,
            preload: true,
            imageLocation: "",
            swfLocation: d + "audiojs.swf",
            useFlash: function () {
                var f = document.createElement("audio");
                return !(f.canPlayType && f.canPlayType("audio/mpeg;").replace(/no/, ""))
            }(),
            hasFlash: function () {
                if (navigator.plugins && navigator.plugins.length && navigator.plugins["Shockwave Flash"]) {
                    return true
                } else {
                    if (navigator.mimeTypes && navigator.mimeTypes.length) {
                        var f = navigator.mimeTypes["application/x-shockwave-flash"];
                        return f && f.enabledPlugin
                    } else {
                        try {
                            new ActiveXObject("ShockwaveFlash.ShockwaveFlash");
                            return true
                        } catch (g) { }
                    }
                }
                return false
            }(),
            createPlayer: {
                markup: '<div class="play-pause" style="display:none"><p class="play"></p><p class="pause"></p>             <p class="loading"></p>             <p class="error"></p>           </div>           <div class="scrubber">             <div class="progress"></div>             <div class="loaded"></div>           </div>           <div class="time" style="display:none;">             <em class="played">00:00</em>/<strong class="duration">00:00</strong>           </div>           <div class="error-message"></div>',
                playPauseClass: "play-pause",
                scrubberClass: "scrubber",
                progressClass: "progress",
                loaderClass: "loaded",
                timeClass: "time",
                durationClass: "duration",
                playedClass: "played",
                errorMessageClass: "error-message",
                playingClass: "playing",
                loadingClass: "loading",
                errorClass: "error"
            },
            css: '.audiojs audio { position: absolute; left: -1px; }         .audiojs { width: 400px; height: 65px; }         .audiojs .play-pause { width: 25px; height: 40px; padding: 4px 6px; margin: 0px; float: left; overflow: hidden; }         .audiojs p { display: none; width: 25px; height: 40px; margin: 0px; cursor: pointer; }         .audiojs .play { display: block; }         .audiojs .scrubber { position: relative; float: left; width: 0px; background: #5a5a5a; height: 14px; margin: 10px; border-top: 1px solid #3f3f3f; border-left: 0px; border-bottom: 0px; overflow: hidden; }         .audiojs .progress { position: absolute; top: 0px; left: 0px; height: 14px; width: 0px; background: #ccc; z-index: 1;           background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #ccc), color-stop(0.5, #ddd), color-stop(0.51, #ccc), color-stop(1, #ccc));           background-image: -moz-linear-gradient(center top, #ccc 0%, #ddd 50%, #ccc 51%, #ccc 100%); }         .audiojs .loaded { position: absolute; top: 0px; left: 0px; height: 14px; width: 0px; background: #000;           background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #222), color-stop(0.5, #333), color-stop(0.51, #222), color-stop(1, #222));           background-image: -moz-linear-gradient(center top, #222 0%, #333 50%, #222 51%, #222 100%); }         .audiojs .time { float: left; height: 36px; line-height: 36px; margin: 0px 0px 0px 6px; padding: 0px 6px 0px 12px; border-left: 1px solid #000; color: #ddd; text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.5); }         .audiojs .time em { padding: 0px 2px 0px 0px; color: #f9f9f9; font-style: normal; }         .audiojs .time strong { padding: 0px 0px 0px 2px; font-weight: normal; }         .audiojs .error-message { display: none; margin: 0px 10px; height: 36px; width: 400px; overflow: hidden; line-height: 36px; white-space: nowrap; color: #fff;           text-overflow: ellipsis; -o-text-overflow: ellipsis; -icab-text-overflow: ellipsis; -khtml-text-overflow: ellipsis; -moz-text-overflow: ellipsis; -webkit-text-overflow: ellipsis; }         .audiojs .error-message a { color: #eee; text-decoration: none; padding-bottom: 1px; border-bottom: 1px solid #999; white-space: wrap; }                 .audiojs .play { background: url("$1") -2px -1px no-repeat; }         .audiojs .loading { background: url("$1") -2px -31px no-repeat; }         .audiojs .error { background: url("$1") -2px -61px no-repeat; }         .audiojs .pause { background: url("$1") -2px -91px no-repeat; }                 .playing .play, .playing .loading, .playing .error { display: none; }         .playing .pause { display: block; }                 .loading .play, .loading .pause, .loading .error { display: none; }         .loading .loading { display: block; }                 .error .time, .error .play, .error .pause, .error .scrubber, .error .loading { display: none; }         .error .error { display: block; }         .error .play-pause p { cursor: auto; }         .error .error-message { display: block; }',
            trackEnded: function () { },
            flashError: function () {
                var f = this.settings.createPlayer,
                    g = a(f.errorMessageClass, this.wrapper),
                    h = 'Missing <a href="http://get.adobe.com/flashplayer/">flash player</a> plugin.';
                if (this.mp3) {
                    h += ' <a href="' + this.mp3 + '">Download audio file</a>.'
                }
                c[b].helpers.removeClass(this.wrapper, f.loadingClass);
                c[b].helpers.addClass(this.wrapper, f.errorClass);
                g.innerHTML = h
            },
            loadError: function () {
                var f = this.settings.createPlayer,
                    g = a(f.errorMessageClass, this.wrapper);
                c[b].helpers.removeClass(this.wrapper, f.loadingClass);
                c[b].helpers.addClass(this.wrapper, f.errorClass);
                g.innerHTML = 'Error loading: "' + this.mp3 + '"'
            },
            init: function () {
                c[b].helpers.addClass(this.wrapper, this.settings.createPlayer.loadingClass)
            },
            loadStarted: function () {
                var f = this.settings.createPlayer,
                    g = a(f.durationClass, this.wrapper),
                    i = Math.floor(this.duration / 60),
                    h = Math.floor(this.duration % 60);
                c[b].helpers.removeClass(this.wrapper, f.loadingClass);
                g.innerHTML = (i < 10 ? "0" : "") + i + ":" + (h < 10 ? "0" : "") + h
            },
            loadProgress: function (f) {
                var g = this.settings.createPlayer,
                    h = a(g.scrubberClass, this.wrapper);
                a(g.loaderClass, this.wrapper).style.width = h.offsetWidth * f + "px"
            },
            playPause: function () {
                this.playing ? this.settings.play() : this.settings.pause()
            },
            play: function () {
                c[b].helpers.addClass(this.wrapper, this.settings.createPlayer.playingClass)
            },
            pause: function () {
                c[b].helpers.removeClass(this.wrapper, this.settings.createPlayer.playingClass)
            },
            updatePlayhead: function (f) {
                var g = this.settings.createPlayer,
                    h = a(g.scrubberClass, this.wrapper);
                a(g.progressClass, this.wrapper).style.width = h.offsetWidth * f + "px";
                g = a(g.playedClass, this.wrapper);
                h = this.duration * f;
                f = Math.floor(h / 60);
                h = Math.floor(h % 60);
                g.innerHTML = (f < 10 ? "0" : "") + f + ":" + (h < 10 ? "0" : "") + h
            }
        },
        create: function (f, g) {
            g = g || {};
            return f.length ? this.createAll(g, f) : this.newInstance(f, g)
        },
        createAll: function (f, g) {
            var l = g || document.getElementsByTagName("audio"),
                k = [];
            f = f || {};
            for (var j = 0, h = l.length; j < h; j++) {
                k.push(this.newInstance(l[j], f))
            }
            return k
        },
        newInstance: function (f, g) {
            var j = this.helpers.clone(this.settings),
                i = "audiojs" + this.instanceCount,
                h = "audiojs_wrapper" + this.instanceCount;
            this.instanceCount++;
            if (f.getAttribute("autoplay") != null) {
                j.autoplay = true
            }
            if (f.getAttribute("loop") != null) {
                j.loop = true
            }
            if (f.getAttribute("preload") == "none") {
                j.preload = false
            }
            g && this.helpers.merge(j, g);
            if (j.createPlayer.markup) {
                f = this.createPlayer(f, j.createPlayer, h)
            } else {
                f.parentNode.setAttribute("id", h)
            }
            h = new c[e](f, j);
            j.css && this.helpers.injectCss(h, j.css);
            if (j.useFlash && j.hasFlash) {
                this.injectFlash(h, i);
                this.attachFlashEvents(h.wrapper, h)
            } else {
                j.useFlash && !j.hasFlash && this.settings.flashError.apply(h)
            }
            if (!j.useFlash || j.useFlash && j.hasFlash) {
                this.attachEvents(h.wrapper, h)
            }
            return this.instances[i] = h
        },
        createPlayer: function (f, g, j) {
            var i = document.createElement("div"),
                h;
            i.setAttribute("class", "audiojs");
            i.setAttribute("className", "audiojs");
            i.setAttribute("id", j);
            if (f.outerHTML && !document.createElement("audio").canPlayType) {
                h = f.cloneNode(true);
                h = this.helpers.cloneHtml5Node(f);
                i.innerHTML = g.markup;
                i.appendChild(h);
                f.outerHTML = i.outerHTML;
                i = document.getElementById(j)
            } else {
                h = f.outerHTML;
                h = h.replace(/_src/i, 'src');
                i.innerHTML = h + g.markup;
                f.parentNode.replaceChild(i, f)
            }
            return i.getElementsByTagName("audio")[0]
        },
        attachEvents: function (f, g) {
            if (g.settings.createPlayer) {
                var j = g.settings.createPlayer,
                    i = a(j.playPauseClass, f),
                    h = a(j.scrubberClass, f);
                c[b].events.addListener(i, "click", function () {
                    g.playPause.apply(g)
                });
                c[b].events.addListener(h, "click", function (m) {
                    m = m.clientX;
                    var n = this,
                        l = 0;
                    if (n.offsetParent) {
                        do {
                            l += n.offsetLeft
                        } while (n = n.offsetParent)
                    }
                    g.skipTo((m - l) / h.offsetWidth)
                });
                if (!g.settings.useFlash) {
                    c[b].events.trackLoadProgress(g);
                    c[b].events.addListener(g.element, "timeupdate", function () {
                        g.updatePlayhead.apply(g)
                    });
                    c[b].events.addListener(g.element, "ended", function () {
                        g.trackEnded.apply(g)
                    });
                    c[b].events.addListener(g.source, "error", function () {
                        clearInterval(g.readyTimer);
                        clearInterval(g.loadTimer);
                        g.settings.loadError.apply(g)
                    })
                }
            }
        },
        attachFlashEvents: function (f, g) {
            g.swfReady = false;
            g.load = function (h) {
                g.mp3 = h;
                g.swfReady && g.element.load(h)
            };
            g.loadProgress = function (i, h) {
                g.loadedPercent = i;
                g.duration = h;
                g.settings.loadStarted.apply(g);
                g.settings.loadProgress.apply(g, [i])
            };
            g.skipTo = function (h) {
                if (!(h > g.loadedPercent)) {
                    g.updatePlayhead.call(g, [h]);
                    g.element.skipTo(h)
                }
            };
            g.updatePlayhead = function (h) {
                g.settings.updatePlayhead.apply(g, [h])
            };
            g.play = function () {
                if (!g.settings.preload) {
                    g.settings.preload = true;
                    g.element.init(g.mp3)
                }
                g.playing = true;
                g.element.play();
                g.settings.play.apply(g)
            };
            g.pause = function () {
                g.playing = false;
                g.element.ppause();
                g.settings.pause.apply(g)
            };
            g.setVolume = function (h) {
                g.element.setVolume(h)
            };
            g.loadStarted = function () {
                g.swfReady = true;
                g.settings.preload && g.element.init(g.mp3);
                g.settings.autoplay && g.play.apply(g)
            }
        },
        injectFlash: function (f, g) {
            var j = this.flashSource.replace(/\$1/g, g);
            j = j.replace(/\$2/g, f.settings.swfLocation);
            j = j.replace(/\$3/g, +new Date + Math.random());
            var i = f.wrapper.innerHTML,
                h = document.createElement("div");
            h.innerHTML = j + i;
            f.wrapper.innerHTML = h.innerHTML;
            f.element = this.helpers.getSwf(g)
        },
        helpers: {
            merge: function (f, g) {
                for (attr in g) {
                    if (f.hasOwnProperty(attr) || g.hasOwnProperty(attr)) {
                        f[attr] = g[attr]
                    }
                }
            },
            clone: function (f) {
                if (f == null || typeof f !== "object") {
                    return f
                }
                var g = new f.constructor,
                    h;
                for (h in f) {
                    g[h] = arguments.callee(f[h])
                }
                return g
            },
            addClass: function (f, g) {
                RegExp("(\\s|^)" + g + "(\\s|$)").test(f.className) || (f.className += " " + g)
            },
            removeClass: function (f, g) {
                f.className = f.className.replace(RegExp("(\\s|^)" + g + "(\\s|$)"), " ")
            },
            injectCss: function (g, h) {
                for (var p = "", o = document.getElementsByTagName("style"), n = h.replace(/\$1/g, g.settings.imageLocation), l = 0, m = o.length; l < m; l++) {
                    var j = o[l].getAttribute("title");
                    if (j && ~j.indexOf("audiojs")) {
                        m = o[l];
                        if (m.innerHTML === n) {
                            return
                        }
                        p = m.innerHTML;
                        break
                    }
                }
                o = document.getElementsByTagName("head")[0];
                l = o.firstChild;
                m = document.createElement("style");
                if (o) {
                    m.setAttribute("type", "text/css");
                    m.setAttribute("title", "audiojs");
                    if (m.styleSheet) {
                        m.styleSheet.cssText = p + n
                    } else {
                        m.appendChild(document.createTextNode(p + n))
                    }
                    l ? o.insertBefore(m, l) : o.appendChild(styleElement)
                }
            },
            cloneHtml5Node: function (f) {
                var g = document.createDocumentFragment(),
                    h = g.createElement ? g : document;
                h.createElement("audio");
                h = h.createElement("div");
                g.appendChild(h);
                h.innerHTML = f.outerHTML;
                return h.firstChild
            },
            getSwf: function (f) {
                f = document[f] || window[f];
                return f.length > 1 ? f[f.length - 1] : f
            }
        },
        events: {
            memoryLeaking: false,
            listeners: [],
            addListener: function (f, g, h) {
                if (f.addEventListener) {
                    f.addEventListener(g, h, false)
                } else {
                    if (f.attachEvent) {
                        this.listeners.push(f);
                        if (!this.memoryLeaking) {
                            window.attachEvent("onunload", function () {
                                if (this.listeners) {
                                    for (var j = 0, i = this.listeners.length; j < i; j++) {
                                        c[b].events.purge(this.listeners[j])
                                    }
                                }
                            });
                            this.memoryLeaking = true
                        }
                        f.attachEvent("on" + g, function () {
                            h.call(f, window.event)
                        })
                    }
                }
            },
            trackLoadProgress: function (f) {
                if (f.settings.preload) {
                    var g, i;
                    f = f;
                    var h = /(ipod|iphone|ipad)/i.test(navigator.userAgent);
                    g = setInterval(function () {
                        if (f.element.readyState > -1) {
                            h || f.init.apply(f)
                        }
                        if (f.element.readyState > 1) {
                            f.settings.autoplay && f.play.apply(f);
                            clearInterval(g);
                            i = setInterval(function () {
                                f.loadProgress.apply(f);
                                f.loadedPercent >= 1 && clearInterval(i)
                            })
                        }
                    }, 10);
                    f.readyTimer = g;
                    f.loadTimer = i
                }
            },
            purge: function (f) {
                var g = f.attributes,
                    h;
                if (g) {
                    for (h = 0; h < g.length; h += 1) {
                        if (typeof f[g[h].name] === "function") {
                            f[g[h].name] = null
                        }
                    }
                }
                if (g = f.childNodes) {
                    for (h = 0; h < g.length; h += 1) {
                        purge(f.childNodes[h])
                    }
                }
            },
            ready: function () {
                return function (w) {
                    var x = window,
                        v = false,
                        u = true,
                        t = x.document,
                        p = t.documentElement,
                        s = t.addEventListener ? "addEventListener" : "attachEvent",
                        o = t.addEventListener ? "removeEventListener" : "detachEvent",
                        j = t.addEventListener ? "" : "on",
                        l = function (f) {
                            if (!(f.type == "readystatechange" && t.readyState != "complete")) {
                                (f.type == "load" ? x : t)[o](j + f.type, l, false);
                                if (!v && (v = true)) {
                                    w.call(x, f.type || f)
                                }
                            }
                        },
                        h = function () {
                            try {
                                p.doScroll("left")
                            } catch (f) {
                                setTimeout(h, 50);
                                return
                            }
                            l("poll")
                        };
                    if (t.readyState == "complete") {
                        w.call(x, "lazy")
                    } else {
                        if (t.createEventObject && p.doScroll) {
                            try {
                                u = !x.frameElement
                            } catch (g) { }
                            u && h()
                        }
                        t[s](j + "DOMContentLoaded", l, false);
                        t[s](j + "readystatechange", l, false);
                        x[s](j + "load", l, false)
                    }
                }
            }()
        }
    };
    c[e] = function (f, g) {
        this.element = f;
        this.wrapper = f.parentNode;
        this.source = f.getElementsByTagName("source")[0] || f;
        this.mp3 = function (i) {
            var h = i.getElementsByTagName("source")[0];
            return i.getAttribute("src") || (h ? h.getAttribute("src") : null)
        }(f);
        this.settings = g;
        this.loadStartedCalled = false;
        this.loadedPercent = 0;
        this.duration = 1;
        this.playing = false
    };
    c[e].prototype = {
        updatePlayhead: function () {
            this.settings.updatePlayhead.apply(this, [this.element.currentTime / this.duration])
        },
        skipTo: function (f) {
            if (!(f > this.loadedPercent)) {
                this.element.currentTime = this.duration * f;
                this.updatePlayhead()
            }
        },
        load: function (f) {
            this.loadStartedCalled = false;
            this.source.setAttribute("src", f);
            this.element.load();
            this.mp3 = f;
            c[b].events.trackLoadProgress(this)
        },
        loadError: function () {
            this.settings.loadError.apply(this)
        },
        init: function () {
            this.settings.init.apply(this)
        },
        loadStarted: function () {
            if (!this.element.duration) {
                return false
            }
            this.duration = this.element.duration;
            this.updatePlayhead();
            this.settings.loadStarted.apply(this)
        },
        loadProgress: function () {
            if (this.element.buffered != null && this.element.buffered.length) {
                if (!this.loadStartedCalled) {
                    this.loadStartedCalled = this.loadStarted()
                }
                this.loadedPercent = this.element.buffered.end(this.element.buffered.length - 1) / this.duration;
                this.settings.loadProgress.apply(this, [this.loadedPercent])
            }
        },
        playPause: function () {
            this.playing ? this.pause() : this.play()
        },
        play: function () {
            /(ipod|iphone|ipad)/i.test(navigator.userAgent) && this.element.readyState == 0 && this.init.apply(this);
            if (!this.settings.preload) {
                this.settings.preload = true;
                this.element.setAttribute("preload", "auto");
                c[b].events.trackLoadProgress(this)
            }
            this.playing = true;
            this.element.play();
            this.settings.play.apply(this)
        },
        pause: function () {
            this.playing = false;
            this.element.pause();
            this.settings.pause.apply(this)
        },
        setVolume: function (f) {
            this.element.volume = f
        },
        trackEnded: function () {
            this.skipTo.apply(this, [0]);
            this.settings.loop || this.pause.apply(this);
            this.settings.trackEnded.apply(this)
        }
    };
    var a = function (g, h) {
        var n = [];
        h = h || document;
        if (h.getElementsByClassName) {
            n = h.getElementsByClassName(g)
        } else {
            var m, l, j = h.getElementsByTagName("*"),
                k = RegExp("(^|\\s)" + g + "(\\s|$)");
            m = 0;
            for (l = j.length; m < l; m++) {
                k.test(j[m].className) && n.push(j[m])
            }
        }
        return n.length > 1 ? n : n[0]
    }
})("audiojs", "audiojsInstance", this);