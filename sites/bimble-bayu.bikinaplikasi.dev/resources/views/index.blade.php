<!DOCTYPE html>
<html dir="ltr" xml:lang="en" class="yui3-js-enabled js no-touch csstransitions" lang="en">
<head>
    <title>{{ env('APP_OBJECT_NAME') }}</title>
    <link rel="shortcut icon"
          href="//demo.createdbycocoon.com/moodle/edumy/1/theme/image.php/edumy/theme/1583195737/favicon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="moodle, Edumy">
    <link rel="stylesheet" type="text/css"
          href="//demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.css">

    <style>
        #ccn_floater_container {
            display: none;
        }
    </style>

    <script async="" src="Edumy_files/google-analytics_analytics.js"></script>
    <script charset="utf-8" id="yui_3_17_2_1_1670485720659_8"
            src="//demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?m/1583195737/core/event/event-debug.js&amp;m/1583195737/filter_mathjaxloader/loader/loader-debug.js"
            async=""></script>
    <script charset="utf-8" id="yui_3_17_2_1_1670485720659_20"
            src="//demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?3.17.2/event-mousewheel/event-mousewheel.js&amp;3.17.2/event-resize/event-resize.js&amp;3.17.2/event-hover/event-hover.js&amp;3.17.2/event-touch/event-touch.js&amp;3.17.2/event-move/event-move.js&amp;3.17.2/event-flick/event-flick.js&amp;3.17.2/event-valuechange/event-valuechange.js&amp;3.17.2/event-tap/event-tap.js"
            async=""></script>
    <script id="firstthemesheet"
            type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script>
    <link rel="stylesheet" type="text/css"
          href="//demo.createdbycocoon.com/moodle/edumy/1/theme/styles.php/edumy/1583195737_1/all">
    <script type="text/javascript">
        //<![CDATA[
        var M = {};
        M.yui = {};
        M.pageloadstarttime = new Date();
        M.cfg = {
            "wwwroot": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1",
            "sesskey": "A8ZgvXVT3L",
            "themerev": "1583195737",
            "slasharguments": 1,
            "theme": "edumy",
            "iconsystemmodule": "core\/icon_system_fontawesome",
            "jsrev": "1583195737",
            "admin": "admin",
            "svgicons": true,
            "usertimezone": "Europe\/London",
            "contextid": 2,
            "developerdebug": true
        };
        var yui1ConfigFn = function (me) {
            if (/-skin|reset|fonts|grids|base/.test(me.name)) {
                me.type = 'css';
                me.path = me.path.replace(/\.js/, '.css');
                me.path = me.path.replace(/\/yui2-skin/, '/assets/skins/sam/yui2-skin')
            }
        };
        var yui2ConfigFn = function (me) {
            var parts = me.name.replace(/^moodle-/, '').split('-'), component = parts.shift(), module = parts[0],
                min = '-min';
            if (/-(skin|core)$/.test(me.name)) {
                parts.pop();
                me.type = 'css';
                min = ''
            }
            if (module) {
                var filename = parts.join('-');
                me.path = component + '/' + module + '/' + filename + min + '.' + me.type
            } else {
                me.path = component + '/' + component + '.' + me.type
            }
        };
        YUI_config = {
            "debug": true,
            "base": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/yuilib\/3.17.2\/",
            "comboBase": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
            "combine": true,
            "filter": "RAW",
            "insertBefore": "firstthemesheet",
            "groups": {
                "yui2": {
                    "base": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/yuilib\/2in3\/2.9.0\/build\/",
                    "comboBase": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
                    "combine": true,
                    "ext": false,
                    "root": "2in3\/2.9.0\/build\/",
                    "patterns": {"yui2-": {"group": "yui2", "configFn": yui1ConfigFn}}
                },
                "moodle": {
                    "name": "moodle",
                    "base": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?m\/1583195737\/",
                    "combine": true,
                    "comboBase": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
                    "ext": false,
                    "root": "m\/1583195737\/",
                    "patterns": {"moodle-": {"group": "moodle", "configFn": yui2ConfigFn}},
                    "filter": "DEBUG",
                    "modules": {
                        "moodle-core-languninstallconfirm": {"requires": ["base", "node", "moodle-core-notification-confirm", "moodle-core-notification-alert"]},
                        "moodle-core-blocks": {"requires": ["base", "node", "io", "dom", "dd", "dd-scroll", "moodle-core-dragdrop", "moodle-core-notification"]},
                        "moodle-core-event": {"requires": ["event-custom"]},
                        "moodle-core-handlebars": {"condition": {"trigger": "handlebars", "when": "after"}},
                        "moodle-core-lockscroll": {"requires": ["plugin", "base-build"]},
                        "moodle-core-popuphelp": {"requires": ["moodle-core-tooltip"]},
                        "moodle-core-checknet": {"requires": ["base-base", "moodle-core-notification-alert", "io-base"]},
                        "moodle-core-chooserdialogue": {"requires": ["base", "panel", "moodle-core-notification"]},
                        "moodle-core-notification": {"requires": ["moodle-core-notification-dialogue", "moodle-core-notification-alert", "moodle-core-notification-confirm", "moodle-core-notification-exception", "moodle-core-notification-ajaxexception"]},
                        "moodle-core-notification-dialogue": {"requires": ["base", "node", "panel", "escape", "event-key", "dd-plugin", "moodle-core-widget-focusafterclose", "moodle-core-lockscroll"]},
                        "moodle-core-notification-alert": {"requires": ["moodle-core-notification-dialogue"]},
                        "moodle-core-notification-confirm": {"requires": ["moodle-core-notification-dialogue"]},
                        "moodle-core-notification-exception": {"requires": ["moodle-core-notification-dialogue"]},
                        "moodle-core-notification-ajaxexception": {"requires": ["moodle-core-notification-dialogue"]},
                        "moodle-core-tooltip": {"requires": ["base", "node", "io-base", "moodle-core-notification-dialogue", "json-parse", "widget-position", "widget-position-align", "event-outside", "cache-base"]},
                        "moodle-core-actionmenu": {"requires": ["base", "event", "node-event-simulate"]},
                        "moodle-core-maintenancemodetimer": {"requires": ["base", "node"]},
                        "moodle-core-dragdrop": {"requires": ["base", "node", "io", "dom", "dd", "event-key", "event-focus", "moodle-core-notification"]},
                        "moodle-core-formchangechecker": {"requires": ["base", "event-focus", "moodle-core-event"]},
                        "moodle-core_availability-form": {"requires": ["base", "node", "event", "event-delegate", "panel", "moodle-core-notification-dialogue", "json"]},
                        "moodle-backup-backupselectall": {"requires": ["node", "event", "node-event-simulate", "anim"]},
                        "moodle-backup-confirmcancel": {"requires": ["node", "node-event-simulate", "moodle-core-notification-confirm"]},
                        "moodle-course-formatchooser": {"requires": ["base", "node", "node-event-simulate"]},
                        "moodle-course-modchooser": {"requires": ["moodle-core-chooserdialogue", "moodle-course-coursebase"]},
                        "moodle-course-categoryexpander": {"requires": ["node", "event-key"]},
                        "moodle-course-dragdrop": {"requires": ["base", "node", "io", "dom", "dd", "dd-scroll", "moodle-core-dragdrop", "moodle-core-notification", "moodle-course-coursebase", "moodle-course-util"]},
                        "moodle-course-management": {"requires": ["base", "node", "io-base", "moodle-core-notification-exception", "json-parse", "dd-constrain", "dd-proxy", "dd-drop", "dd-delegate", "node-event-delegate"]},
                        "moodle-course-util": {
                            "requires": ["node"],
                            "use": ["moodle-course-util-base"],
                            "submodules": {
                                "moodle-course-util-base": {},
                                "moodle-course-util-section": {"requires": ["node", "moodle-course-util-base"]},
                                "moodle-course-util-cm": {"requires": ["node", "moodle-course-util-base"]}
                            }
                        },
                        "moodle-form-dateselector": {"requires": ["base", "node", "overlay", "calendar"]},
                        "moodle-form-shortforms": {"requires": ["node", "base", "selector-css3", "moodle-core-event"]},
                        "moodle-form-passwordunmask": {"requires": []},
                        "moodle-question-preview": {"requires": ["base", "dom", "event-delegate", "event-key", "core_question_engine"]},
                        "moodle-question-searchform": {"requires": ["base", "node"]},
                        "moodle-question-chooser": {"requires": ["moodle-core-chooserdialogue"]},
                        "moodle-availability_completion-form": {"requires": ["base", "node", "event", "moodle-core_availability-form"]},
                        "moodle-availability_date-form": {"requires": ["base", "node", "event", "io", "moodle-core_availability-form"]},
                        "moodle-availability_grade-form": {"requires": ["base", "node", "event", "moodle-core_availability-form"]},
                        "moodle-availability_group-form": {"requires": ["base", "node", "event", "moodle-core_availability-form"]},
                        "moodle-availability_grouping-form": {"requires": ["base", "node", "event", "moodle-core_availability-form"]},
                        "moodle-availability_profile-form": {"requires": ["base", "node", "event", "moodle-core_availability-form"]},
                        "moodle-mod_assign-history": {"requires": ["node", "transition"]},
                        "moodle-mod_forum-subscriptiontoggle": {"requires": ["base-base", "io-base"]},
                        "moodle-mod_quiz-modform": {"requires": ["base", "node", "event"]},
                        "moodle-mod_quiz-questionchooser": {"requires": ["moodle-core-chooserdialogue", "moodle-mod_quiz-util", "querystring-parse"]},
                        "moodle-mod_quiz-quizbase": {"requires": ["base", "node"]},
                        "moodle-mod_quiz-toolboxes": {"requires": ["base", "node", "event", "event-key", "io", "moodle-mod_quiz-quizbase", "moodle-mod_quiz-util-slot", "moodle-core-notification-ajaxexception"]},
                        "moodle-mod_quiz-autosave": {"requires": ["base", "node", "event", "event-valuechange", "node-event-delegate", "io-form"]},
                        "moodle-mod_quiz-dragdrop": {"requires": ["base", "node", "io", "dom", "dd", "dd-scroll", "moodle-core-dragdrop", "moodle-core-notification", "moodle-mod_quiz-quizbase", "moodle-mod_quiz-util-base", "moodle-mod_quiz-util-page", "moodle-mod_quiz-util-slot", "moodle-course-util"]},
                        "moodle-mod_quiz-util": {
                            "requires": ["node", "moodle-core-actionmenu"],
                            "use": ["moodle-mod_quiz-util-base"],
                            "submodules": {
                                "moodle-mod_quiz-util-base": {},
                                "moodle-mod_quiz-util-slot": {"requires": ["node", "moodle-mod_quiz-util-base"]},
                                "moodle-mod_quiz-util-page": {"requires": ["node", "moodle-mod_quiz-util-base"]}
                            }
                        },
                        "moodle-message_airnotifier-toolboxes": {"requires": ["base", "node", "io"]},
                        "moodle-filter_glossary-autolinker": {"requires": ["base", "node", "io-base", "json-parse", "event-delegate", "overlay", "moodle-core-event", "moodle-core-notification-alert", "moodle-core-notification-exception", "moodle-core-notification-ajaxexception"]},
                        "moodle-filter_mathjaxloader-loader": {"requires": ["moodle-core-event"]},
                        "moodle-editor_atto-rangy": {"requires": []},
                        "moodle-editor_atto-editor": {"requires": ["node", "transition", "io", "overlay", "escape", "event", "event-simulate", "event-custom", "node-event-html5", "node-event-simulate", "yui-throttle", "moodle-core-notification-dialogue", "moodle-core-notification-confirm", "moodle-editor_atto-rangy", "handlebars", "timers", "querystring-stringify"]},
                        "moodle-editor_atto-plugin": {"requires": ["node", "base", "escape", "event", "event-outside", "handlebars", "event-custom", "timers", "moodle-editor_atto-menu"]},
                        "moodle-editor_atto-menu": {"requires": ["moodle-core-notification-dialogue", "node", "event", "event-custom"]},
                        "moodle-report_eventlist-eventfilter": {"requires": ["base", "event", "node", "node-event-delegate", "datatable", "autocomplete", "autocomplete-filters"]},
                        "moodle-report_loglive-fetchlogs": {"requires": ["base", "event", "node", "io", "node-event-delegate"]},
                        "moodle-gradereport_grader-gradereporttable": {"requires": ["base", "node", "event", "handlebars", "overlay", "event-hover"]},
                        "moodle-gradereport_history-userselector": {"requires": ["escape", "event-delegate", "event-key", "handlebars", "io-base", "json-parse", "moodle-core-notification-dialogue"]},
                        "moodle-tool_capability-search": {"requires": ["base", "node"]},
                        "moodle-tool_lp-dragdrop-reorder": {"requires": ["moodle-core-dragdrop"]},
                        "moodle-tool_monitor-dropdown": {"requires": ["base", "event", "node"]},
                        "moodle-assignfeedback_editpdf-editor": {"requires": ["base", "event", "node", "io", "graphics", "json", "event-move", "event-resize", "transition", "querystring-stringify-simple", "moodle-core-notification-dialog", "moodle-core-notification-alert", "moodle-core-notification-warning", "moodle-core-notification-exception", "moodle-core-notification-ajaxexception"]},
                        "moodle-atto_accessibilitychecker-button": {"requires": ["color-base", "moodle-editor_atto-plugin"]},
                        "moodle-atto_accessibilityhelper-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_align-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_bold-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_charmap-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_clear-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_collapse-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_emoticon-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_equation-button": {"requires": ["moodle-editor_atto-plugin", "moodle-core-event", "io", "event-valuechange", "tabview", "array-extras"]},
                        "moodle-atto_html-beautify": {},
                        "moodle-atto_html-button": {"requires": ["promise", "moodle-editor_atto-plugin", "moodle-atto_html-beautify", "moodle-atto_html-codemirror", "event-valuechange"]},
                        "moodle-atto_html-codemirror": {"requires": ["moodle-atto_html-codemirror-skin"]},
                        "moodle-atto_image-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_indent-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_italic-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_link-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_managefiles-usedfiles": {"requires": ["node", "escape"]},
                        "moodle-atto_managefiles-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_media-button": {"requires": ["moodle-editor_atto-plugin", "moodle-form-shortforms"]},
                        "moodle-atto_noautolink-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_orderedlist-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_recordrtc-recording": {"requires": ["moodle-atto_recordrtc-button"]},
                        "moodle-atto_recordrtc-button": {"requires": ["moodle-editor_atto-plugin", "moodle-atto_recordrtc-recording"]},
                        "moodle-atto_rtl-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_strike-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_subscript-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_superscript-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_table-button": {"requires": ["moodle-editor_atto-plugin", "moodle-editor_atto-menu", "event", "event-valuechange"]},
                        "moodle-atto_title-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_underline-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_undo-button": {"requires": ["moodle-editor_atto-plugin"]},
                        "moodle-atto_unorderedlist-button": {"requires": ["moodle-editor_atto-plugin"]}
                    }
                },
                "gallery": {
                    "name": "gallery",
                    "base": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/yuilib\/gallery\/",
                    "combine": true,
                    "comboBase": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
                    "ext": false,
                    "root": "gallery\/1583195737\/",
                    "patterns": {"gallery-": {"group": "gallery"}}
                }
            },
            "modules": {
                "core_filepicker": {
                    "name": "core_filepicker",
                    "fullpath": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/javascript.php\/1583195737\/repository\/filepicker.js",
                    "requires": ["base", "node", "node-event-simulate", "json", "async-queue", "io-base", "io-upload-iframe", "io-form", "yui2-treeview", "panel", "cookie", "datatable", "datatable-sort", "resize-plugin", "dd-plugin", "escape", "moodle-core_filepicker", "moodle-core-notification-dialogue"]
                },
                "core_comment": {
                    "name": "core_comment",
                    "fullpath": "\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/javascript.php\/1583195737\/comment\/comment.js",
                    "requires": ["base", "io-base", "node", "json", "yui2-animation", "overlay", "escape"]
                },
                "mathjax": {
                    "name": "mathjax",
                    "fullpath": "https:\/\/cdnjs.cloudflare.com\/ajax\/libs\/mathjax\/2.7.2\/MathJax.js?delayStartupUntil=configured"
                }
            }
        };
        M.yui.loader = {modules: {}};

        //]]>
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/bootstrap.min.css">
    <link rel="stylesheet" href="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/cocoon.css">
    <link rel="stylesheet" href="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/responsive.css">
    <link rel="stylesheet" href="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/cocoon-mdl.css">
    <link rel="stylesheet" href="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/cocoon-dashboard.css">
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'UA-61019949-7', 'auto');
        ga('send', 'pageview');
    </script>
    <style data-styled="active" data-styled-version="5.3.1"></style>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link rel="stylesheet" href="Edumy_files/css2.css">
    <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="core/first"
            src="//demo.createdbycocoon.com/moodle/edumy/1/lib/requirejs.php/1583195737/core/first.js"></script>
    <script type="text/x-mathjax-config">
MathJax.Hub.Config({
    config: ["Accessible.js", "Safe.js"],
    errorSettings: { message: ["!"] },
    skipStartupTypeset: true,
    messageStyle: "none"
});

    
    
    
    
    
    
    
    
    </script>
    <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="jquery"
            src="//demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/jquery/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" charset="UTF-8" src="Edumy_files/common.js"></script>
    <script type="text/javascript" charset="UTF-8" src="Edumy_files/util.js"></script>
</head>

<body id="page-site-index"
      class="format-site course path-site gecko dir-ltr lang-en yui-skin-sam yui3-skin-sam demo-createdbycocoon-com--moodle-edumy-1 pagelayout-frontpage course-1 context-2 ccn_header_style_1 ccn_footer_style_1 ccn_blog_style_1 ccn_course_list_style_1 role-standard jsenabled">
<span id="user-notifications"></span>
<nav id="menu" class="stylehome1 mm-menu mm-menu_offcanvas" aria-hidden="true">
    <div class="mm-panels">
        <div id="mm-1" class="mm-panel mm-panel_has-navbar mm-panel_opened">
            <div class="mm-navbar"><a class="mm-navbar__title">Menu</a></div>
            <ul class="mm-listview">
                <li class="mm-listitem">
                    <a id="drop-down-6391963c2f0e56391963c25f737" href="{{ url('register') }}"
                       class="mm-listitem__text">
                        Registrasi
                    </a>

                </li>

                <li class="mm-listitem">
                    <a id="drop-down-6391963c2f3c56391963c25f7311" href="#jenjang" class="block_cocoon_tstmnls">
                        Jenjang
                    </a>

                </li>

                <li class="mm-listitem">
                    <a id="drop-down-6391963c2f1dc6391963c25f738" href="#mapel" class="mm-listitem__text">
                        Mapel
                    </a>

                </li>
                {{--                <li class="mm-listitem">--}}
                {{--                    <a id="drop-down-6391963c2f28d6391963c25f739" href="#" class="mm-listitem__text">--}}
                {{--                        Kelas--}}
                {{--                    </a>--}}

                {{--                </li>--}}
                <li class="mm-listitem">
                    <a id="drop-down-6391963c2f3366391963c25f7310" href="#fasilitas" class="mm-listitem__text">
                        Fasilitas
                    </a>

                </li>
                {{--                <li class="mm-listitem">--}}
                {{--                    <a id="drop-down-6391963c2f3c56391963c25f7311" href="#" class="mm-listitem__text">--}}
                {{--                        Guru--}}
                {{--                    </a>--}}

                {{--                </li>--}}
                <li class="mm-listitem">
                    <a id="drop-down-6391963c2f3c56391963c25f7311" href="#review" class="mm-listitem__text">
                        Review
                    </a>

                </li>

                <li class="mm-listitem">
                    <a id="drop-down-6391963c2f3c56391963c25f7311" href="#tentang" class="mm-listitem__text">
                        Tentang
                    </a>

                </li>
            </ul>
        </div>
        <div id="ccn-drop-down-menu-6391963c2f0e56391963c25f737" class="mm-panel mm-hidden mm-panel_has-navbar"
             aria-hidden="true">
            <div class="mm-navbar"><a class="mm-btn mm-btn_prev mm-navbar__btn" href="#mm-1" aria-owns="mm-1"
                                      aria-haspopup="true"><span class="mm-sronly">Close submenu</span></a><a
                    class="mm-navbar__title" href="#mm-1">
                    Home
                </a></div>
            <ul class="sub-menu mm-listview">
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/"
                                           class="mm-listitem__text"><span class="title"> Home 1</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/2/"
                                           class="mm-listitem__text"><span class="title"> Home 2</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/3/"
                                           class="mm-listitem__text"><span class="title"> Home 3</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/4/"
                                           class="mm-listitem__text"><span class="title"> Home 4</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/5/"
                                           class="mm-listitem__text"><span class="title"> Home 5</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/6/"
                                           class="mm-listitem__text"><span class="title"> Home 6 (University)</span></a>
                </li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/7/"
                                           class="mm-listitem__text"><span class="title"> Home 7 (College)</span></a>
                </li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/8/"
                                           class="mm-listitem__text"><span
                            class="title"> Home 8 (Kindergarden)</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/9/" target="_blank" "=""
                    class="mm-listitem__text"><span class="title"> Home Video</span></a></li>
            </ul>
        </div>
        <div id="ccn-drop-down-menu-6391963c2f1dc6391963c25f738" class="mm-panel mm-hidden mm-panel_has-navbar"
             aria-hidden="true">
            <div class="mm-navbar"><a class="mm-btn mm-btn_prev mm-navbar__btn" href="#mm-1" aria-owns="mm-1"
                                      aria-haspopup="true"><span class="mm-sronly">Close submenu</span></a><a
                    class="mm-navbar__title" href="#mm-1">
                    Courses
                </a></div>
            <ul class="sub-menu mm-listview">
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/course/index.php?categoryid=3"
                        class="mm-listitem__text"><span class="title"> Courses v1</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/2/course/index.php?categoryid=4"
                        class="mm-listitem__text"><span class="title"> Courses v2</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/2/course/index.php?categoryid=3"
                        class="mm-listitem__text"><span class="title"> Courses v3</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/course/view.php?id=11"
                                           class="mm-listitem__text"><span class="title"> Single v1</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/course/view.php?id=8"
                                           class="mm-listitem__text"><span class="title"> Single v2</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/course/view.php?id=7"
                                           class="mm-listitem__text"><span class="title"> Single v3</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/course/view.php?id=11"
                                           class="mm-listitem__text"><span class="title"> Topics Format</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/course/view.php?id=10"
                                           class="mm-listitem__text"><span class="title"> Social Format</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/course/view.php?id=9"
                                           class="mm-listitem__text"><span class="title"> Weekly Format</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=14"
                        class="mm-listitem__text"><span class="title"> Instructors</span></a></li>
            </ul>
        </div>
        <div id="ccn-drop-down-menu-6391963c2f28d6391963c25f739" class="mm-panel mm-hidden mm-panel_has-navbar"
             aria-hidden="true">
            <div class="mm-navbar"><a class="mm-btn mm-btn_prev mm-navbar__btn" href="#mm-1" aria-owns="mm-1"
                                      aria-haspopup="true"><span class="mm-sronly">Close submenu</span></a><a
                    class="mm-navbar__title" href="#mm-1">
                    Events
                </a></div>
            <ul class="sub-menu mm-listview">
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=86"
                        class="mm-listitem__text"><span class="title">Event List</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=87"
                        class="mm-listitem__text"><span class="title">Event Single</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/calendar/view.php?view=month&amp;time=1575158400"
                        class="mm-listitem__text"><span class="title">Calendar</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/calendar/view.php?view=month&amp;time=1575158400"
                        class="mm-listitem__text"><span class="title"> Month view</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/calendar/view.php?view=day&amp;time=1577491200"
                        class="mm-listitem__text"><span class="title"> Day view</span></a></li>
            </ul>
        </div>
        <div id="ccn-drop-down-menu-6391963c2f3366391963c25f7310" class="mm-panel mm-hidden mm-panel_has-navbar"
             aria-hidden="true">
            <div class="mm-navbar"><a class="mm-btn mm-btn_prev mm-navbar__btn" href="#mm-1" aria-owns="mm-1"
                                      aria-haspopup="true"><span class="mm-sronly">Close submenu</span></a><a
                    class="mm-navbar__title" href="#mm-1">
                    Pages
                </a></div>
            <ul class="sub-menu mm-listview">
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=16"
                        class="mm-listitem__text"><span class="title"> About Us</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=15"
                        class="mm-listitem__text"><span class="title"> Gallery</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=81"
                        class="mm-listitem__text"><span class="title"> FAQ</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/login/index.php"
                                           class="mm-listitem__text"><span class="title"> Login</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/login/signup.php"
                                           class="mm-listitem__text"><span class="title"> Register</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=1"
                                           class="mm-listitem__text"><span
                            class="title"> Become an Instructor</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/admin/tool/dataprivacy/summary.php"
                        class="mm-listitem__text"><span class="title"> Terms &amp; Conditions</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/mod/page/view.php?id=2"
                                           class="mm-listitem__text"><span class="title"> UI Elements</span></a></li>
            </ul>
        </div>
        <div id="ccn-drop-down-menu-6391963c2f3c56391963c25f7311" class="mm-panel mm-hidden mm-panel_has-navbar"
             aria-hidden="true">
            <div class="mm-navbar"><a class="mm-btn mm-btn_prev mm-navbar__btn" href="#mm-1" aria-owns="mm-1"
                                      aria-haspopup="true"><span class="mm-sronly">Close submenu</span></a><a
                    class="mm-navbar__title" href="#mm-1">
                    Blog
                </a></div>
            <ul class="sub-menu mm-listview">
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/1/blog/index.php"
                                           class="mm-listitem__text"><span class="title"> Blog List 1</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/2/blog/index.php"
                                           class="mm-listitem__text"><span class="title"> Blog List 2</span></a></li>
                <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/3/blog/index.php"
                                           class="mm-listitem__text"><span class="title"> Blog List 3</span></a></li>
                <li class="mm-listitem"><a
                        href="https://demo.createdbycocoon.com/moodle/edumy/1/blog/index.php?entryid=2"
                        class="mm-listitem__text"><span class="title"> Blog Single</span></a></li>
            </ul>
        </div>
    </div>

</nav>
<div class="mm-page mm-slideout" id="mm-0">
    <div class="preloader" style="display: none;"></div>
    <div class="wrapper" id="yui_3_17_2_1_1670485720659_28">
        <header
            class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu scroll-to-fixed-fixed slideIn animated"
            style="z-index: 1000; position: fixed; top: 0px; margin-left: 0px; width: 1920px; left: 0px;"
            id="yui_3_17_2_1_1670485720659_27">
            <div class="container-fluid" id="yui_3_17_2_1_1670485720659_26">
                <!-- Ace Responsive Menu -->
                <nav id="yui_3_17_2_1_1670485720659_25">
                    <!-- Menu Toggle btn-->
                    <div class="menu-toggle">
                        <img  width="50"  class="nav_logo_img img-fluid" src="{{ url(json_decode($pengaturan->logo)->gambar) }}" alt="Edumy">
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <a href="{{ url('') }}" class="navbar_brand float-left dn-smd">
                        <img  width="50"  class="logo1 img-fluid" src="{{ url(json_decode($pengaturan->logo)->gambar) }}" alt="Edumy">
                        <img  width="50"  class="logo2 img-fluid" src="{{ url(json_decode($pengaturan->logo)->gambar) }}" alt="Edumy">
                        <span>Hanifah</span>
                    </a>
                    <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
                        <li class="mm-listitem">
                            <a id="drop-down-6391963c2f0e56391963c25f737" href="{{ url('register') }}"
                               class="mm-listitem__text">
                                Registrasi
                            </a>

                        </li>

                        <li class="mm-listitem">
                            <a id="drop-down-6391963c2f3c56391963c25f7311" href="#jenjang" class="block_cocoon_tstmnls">
                                Jenjang
                            </a>

                        </li>

                        <li class="mm-listitem">
                            <a id="drop-down-6391963c2f1dc6391963c25f738" href="#mapel" class="mm-listitem__text">
                                Mapel
                            </a>

                        </li>
                        {{--                <li class="mm-listitem">--}}
                        {{--                    <a id="drop-down-6391963c2f28d6391963c25f739" href="#" class="mm-listitem__text">--}}
                        {{--                        Kelas--}}
                        {{--                    </a>--}}

                        {{--                </li>--}}
                        <li class="mm-listitem">
                            <a id="drop-down-6391963c2f3366391963c25f7310" href="#fasilitas" class="mm-listitem__text">
                                Fasilitas
                            </a>

                        </li>
                        {{--                <li class="mm-listitem">--}}
                        {{--                    <a id="drop-down-6391963c2f3c56391963c25f7311" href="#" class="mm-listitem__text">--}}
                        {{--                        Guru--}}
                        {{--                    </a>--}}

                        {{--                </li>--}}
                        <li class="mm-listitem">
                            <a id="drop-down-6391963c2f3c56391963c25f7311" href="#review" class="mm-listitem__text">
                                Review
                            </a>

                        </li>

                        <li class="mm-listitem">
                            <a id="drop-down-6391963c2f3c56391963c25f7311" href="#tentang" class="mm-listitem__text">
                                Tentang
                            </a>

                        </li>
                        <ul class="header_user_notif ccn-frontend-header_user_notif pull-right dn-smd sub-menu"
                            id="yui_3_17_2_1_1670485720659_24">

                            <li class="user_setting">
                                @if(!auth()->user())
                                    <div class="dropdown">
                                        <a id="drop-down-6391963c2f0e56391963c25f737" href="{{ url('login') }}"
                                           class="mm-listitem__text">
                                            <h4 class="text-white" style="margin-top: 16px;">Login</h4>
                                        </a>
                                    </div>
                                @else
                                    <div class="dropdown">
                                        <a id="drop-down-6391963c2f0e56391963c25f737" href="{{ url('logout') }}"
                                           class="mm-listitem__text">
                                            <h4 class="text-white" style="margin-top: 16px;">Login</h4>
                                        </a>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </ul>

                </nav>
            </div>
        </header>
        <div style="display: block; width: 1920px; height: 1px; float: none;"></div>
        <div id="page" class="stylehome1 h0">
            <div class="mobile-menu">
                <div class="header stylehome1">
                    <div class="main_logo_home2">
                        <img  width="50"  class="nav_logo_img img-fluid float-left mt20" src="{{ url(json_decode($pengaturan->logo)->gambar) }}"
                             alt="Edumy">
                        <span>Edumy</span>
                    </div>
                    <ul class="menu_bar_home2">
                        <li class="list-inline-item">
                        </li>
                        <li class="list-inline-item"><a href="#menu"><span></span></a></li>
                    </ul>
                </div>
            </div><!-- /.mobile-menu -->

        </div>


        <div class="sign_up_modal modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home">
                            <div class="login_form">
                                <div class="heading">
                                    <h3 class="text-center">Login to your account</h3>
                                </div>
                                <aside id="block-region-login" class="block-region" data-blockregion="login"
                                       data-droptarget="1">
                                    <div id="inst41" class=" block_cocoon_login block " role="complementary"
                                         data-block="cocoon_login" aria-label="[Cocoon] Login">


                                        <div class="">

                                            <form class="loginform" id="login" method="post"
                                                  action="//demo.createdbycocoon.com/moodle/edumy/1/login/index.php">
                                                <div class="form-group"><input type="text" name="username"
                                                                               placeholder="Username"
                                                                               id="login_username" class="form-control"
                                                                               autocomplete="username"></div>
                                                <div class="form-group"><input type="password" name="password"
                                                                               id="login_password"
                                                                               placeholder="Password"
                                                                               class="form-control" value=""
                                                                               autocomplete="current-password"></div>
                                                <div class="form-group custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           name="rememberusername" id="rememberusername">
                                                    <label class="custom-control-label" for="rememberusername">Remember
                                                        username</label>
                                                    <a class="tdu btn-fpswd float-right"
                                                       href="//demo.createdbycocoon.com/moodle/edumy/1/login/forgot_password.php">Lost
                                                        password?</a>
                                                </div>
                                                <button type="submit" class="btn btn-log btn-block btn-thm2">Log in
                                                </button>
                                                <input type="hidden" name="logintoken"
                                                       value="6rbdPMKhOGS9DBVmB0ozUs8Co922HQfH"></form>


                                        </div>


                                    </div>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search_overlay">
            <div class="mk-fullscreen-search-overlay" id="mk-search-overlay">
                <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i class="fa fa-times"></i></a>
                <div id="mk-fullscreen-search-wrapper">
                    <div id="ccn_mk-fullscreen-search-wrapper" style="top: 477.5px;">
                        <aside id="block-region-search" class="block-region" data-blockregion="search"
                               data-droptarget="1">
                            <div id="inst40" class=" block_cocoon_globalsearch block " role="complementary"
                                 data-block="cocoon_globalsearch" aria-label="[Cocoon] Global search">


                                <div class="">
                                    <form class="ccn-mk-fullscreen-searchform"
                                          action="//demo.createdbycocoon.com/moodle/edumy/1/search/index.php">
                                        <fieldset><input id="searchform_search" name="q"
                                                         class="ccn-mk-fullscreen-search-input"
                                                         placeholder="Search courses..." type="text" size="15"><input
                                                type="hidden" name="context" value="2"><i
                                                class="flaticon-magnifying-glass fullscreen-search-icon"><input value=""
                                                                                                                type="submit"
                                                                                                                id="searchform_button"></i>
                                        </fieldset>
                                    </form>


                                </div>


                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div id="inst96" class=" block_cocoon_slider_1 block " role="complementary" data-block="cocoon_slider_1">

            <a href="#sb-2" class="sr-only sr-only-focusable">Skip Slider 1</a>


            <div class="" id="yui_3_17_2_1_1670485720659_41">
                <div class="home1-mainslider" id="yui_3_17_2_1_1670485720659_40">
                    <div class="container-fluid p0" id="yui_3_17_2_1_1670485720659_39">
                        <div class="row" id="yui_3_17_2_1_1670485720659_38">
                            <div class="col-lg-12" id="yui_3_17_2_1_1670485720659_37">
                                <div class="main-banner-wrapper" id="yui_3_17_2_1_1670485720659_36">
                                    <div
                                        class="banner-style-one owl-theme owl-carousel banner-style-one--single owl-loaded owl-text-select-on"
                                        id="yui_3_17_2_1_1670485720659_35">

                                        <div class="owl-stage-outer" id="yui_3_17_2_1_1670485720659_34">
                                            <div class="owl-stage"
                                                 style="transform: translate3d(0px, 0px, 0px); transition: all 0s ease 0s; width: 1903px;"
                                                 id="yui_3_17_2_1_1670485720659_33">
                                                <div class="owl-item active" style="width: 1903px; margin-right: 0px;"
                                                     id="yui_3_17_2_1_1670485720659_32">
                                                    <div class="slide slide-one"
                                                         style="background-image: url({{ url(collect(json_decode($pengaturan->hero_section))->first()->gambar) }}); height: 95vh;"
                                                         id="yui_3_17_2_1_1670485720659_31">
                                                        <div class="container" id="yui_3_17_2_1_1670485720659_30">
                                                            <div class="home-content"
                                                                 id="yui_3_17_2_1_1670485720659_29">
                                                                <div class="home-content-inner text-center"
                                                                     id="yui_3_17_2_1_1670485720659_42"><h3
                                                                        class="banner-title">Belajar Super
                                                                        Menyenangkan</h3>
                                                                    <p>Belajar lebih menyenangkan dan mengasikkan di
                                                                        RUMAH BELAJAR HANIFAH</p>
                                                                    <div class="btn-block"
                                                                         id="yui_3_17_2_1_1670485720659_44"><a
                                                                            href="{{ url('register') }}"
                                                                            class="banner-btn"
                                                                            id="yui_3_17_2_1_1670485720659_43">Registrasi</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="owl-controls">
                                            <div class="owl-nav">
                                                <div class="owl-prev" style="display: none;">prev</div>
                                                <div class="owl-next" style="display: none;">next</div>
                                            </div>
                                            <div style="display: none;" class="owl-dots"></div>
                                        </div>
                                    </div>
                                </div><!-- /.main-banner-wrapper -->
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <span id="sb-2"></span>

        </div>
        <div id="ccn-page-wrapper">
            <div>
                <a class="sr-only sr-only-focusable" href="#maincontent">Skip to main content</a>
            </div>
            <script type="text/javascript"
                    src="//demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.js"></script>
            <script type="text/javascript"
                    src="//demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/javascript-static.js"></script>
            <script type="text/javascript">
                //<![CDATA[
                document.body.className += ' jsenabled';
                //]]>
            </script>


            <div id="yui_3_17_2_1_1670485720659_51">
                <div class="container ccn_breadcrumb_widgets clearfix">
                </div>
                <aside id="block-region-fullwidth-top" class="block-region" data-blockregion="fullwidth-top"
                       data-droptarget="1">
                    <div id="inst67" class=" block_cocoon_course_categories block list_block " role="navigation"
                         data-block="cocoon_course_categories">

                        <a href="#sb-3" class="sr-only sr-only-focusable">Skip [Cocoon] Course categories</a>


                        <div class="" id="yui_3_17_2_1_1670485720659_50">


                            <section id="our-courses" class="our-courses pt90 pt650-992">
                                <div class="container" id="yui_3_17_2_1_1670485720659_49">
                                    <div class="row" id="yui_3_17_2_1_1670485720659_48">
                                        <div class="col-lg-12" id="yui_3_17_2_1_1670485720659_47">
                                            <a href="#our-courses" id="yui_3_17_2_1_1670485720659_46">
                                                <div class="mouse_scroll" id="yui_3_17_2_1_1670485720659_45">
                                                    <div class="icon"><span class="flaticon-download-arrow"></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="container" id="jenjang">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="main-title text-center">
                                                <h3 class="mt0">Jenjang Pendidikan</h3>
                                                <p>Beberapa jejang pendidikan yang ada di RUMAH BELAJAR HANIFAH</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row  justify-content-center">
                                        @foreach($jenjang as $item)
                                            <div class="col-sm-6 col-lg-3">
                                                <a class="img_hvr_box"
                                                   style="background-image: url({{ url($item->gambar) }});">
                                                    <div class="overlay">
                                                        <div class="details">
                                                            <h5>{{ $item->nama }}</h5>
                                                            <p>Total {{ $item->siswas->count() }} Siswa</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>


                        </div>

                        <span id="sb-3"></span>

                    </div>
                    <div id="inst64" class=" block_cocoon_parallax block " role="complementary"
                         data-block="cocoon_parallax">

                        <a href="#sb-4" class="sr-only sr-only-focusable">Skip Enhance your skills with best Online
                            courses</a>


                        <div class="">


                            <section class="divider parallax bg-img2" data-stellar-background-ratio="0.3"
                                     style="background-image:url(//demo.createdbycocoon.com/moodle/edumy/1/pluginfile.php/89/block_cocoon_parallax/content/2.jpg);background-size:cover;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2 text-center">
                                            <div class="divider-one">
                                                <p class="color-white">SEGERA MULAI BELAJAR DISINI!</p>
                                                <h1 class="color-white text-uppercase">TINGKATKAN NILAI DAN PRESTASI MU
                                                    BERSAMA KAMI!</h1>
                                                <a class="btn btn-transparent divider-btn" href="#">Registrasi</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>

                        <span id="sb-4"></span>

                    </div>
                    <div id="inst80" class=" block_cocoon_featuredcourses block " role="complementary"
                         data-block="cocoon_featuredcourses">

                        <a href="#sb-5" class="sr-only sr-only-focusable">Skip [Cocoon] Featured courses</a>


                        <div class="">
                            <section id="our-top-courses" class="our-courses">
                                <div class="container" id="mapel">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="main-title text-center">
                                                <h3 class="mt0">Lihat berbagai mata pelajaran kami</h3>
                                                <p>Berbagai mata pelajaran yang bisa meningkatkan prestasimu
                                                    disekolah</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($mapel as $item)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="top_courses">
                                                    <a>
                                                        <div class="thumb">

                                                            <img class="img-whp" src="{{ url($item->gambar) }}"
                                                                 alt="Fashion Photography From Professional">
                                                        </div>
                                                        <div class="details">
                                                            <div class="tc_content">
                                                                <p>{{ \Carbon\Carbon::parse($item->updated_at)->format("d-m-y") }}</p>
                                                                <h5>{{ $item->nama }}</h5>
                                                                <ul class="tc_review">
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tc_footer">
                                                                <ul class="tc_meta float-left">
                                                                    <li class="list-inline-item"><i
                                                                            class="flaticon-profile"></i></li>
                                                                    <li class="list-inline-item">2</li>
                                                                    <li class="list-inline-item"><i
                                                                            class="flaticon-comment"></i></li>
                                                                    <li class="list-inline-item">5</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>


                        </div>

                        <span id="sb-5"></span>

                    </div>

                    <div id="inst80" class=" block_cocoon_featuredcourses block " role="complementary"
                         data-block="cocoon_featuredcourses">

                        <a href="#sb-5" class="sr-only sr-only-focusable">Skip [Cocoon] Featured courses</a>


                        <div class="">
                            <section id="our-top-courses" class="our-courses">
                                <div class="container" id="fasilitas">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="main-title text-center">
                                                <h3 class="mt0">Fasilitas yang kami miliki</h3>
                                                <p>Berbagai macam fasilitas untuk mendukung kegiatan belajarmu</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach($fasilitas as $item)
                                            <div class="col-md-6 col-lg-4 col-xl-3">
                                                <div class="top_courses">
                                                    <a>
                                                        <div class="thumb">

                                                            <img class="img-whp" src="{{ url($item->gambar) }}"
                                                                 alt="Fashion Photography From Professional">
                                                        </div>
                                                        <div class="details">
                                                            <div class="tc_content">
                                                                <p>{{ \Carbon\Carbon::parse($item->updated_at)->format("d-m-y") }}</p>
                                                                <h5>{{ $item->nama }}</h5>
                                                                <ul class="tc_review">
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                    <li class="list-inline-item"><i
                                                                            class="fa fa-star"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="tc_footer">
                                                                <ul class="tc_meta float-left">
                                                                    <li class="list-inline-item"><i
                                                                            class="flaticon-profile"></i></li>
                                                                    <li class="list-inline-item">2</li>
                                                                    <li class="list-inline-item"><i
                                                                            class="flaticon-comment"></i></li>
                                                                    <li class="list-inline-item">5</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </section>


                        </div>

                        <span id="sb-5"></span>

                    </div>
{{-- 
                    <div id="inst95" class=" block_cocoon_tstmnls block " role="complementary"
                         data-block="cocoon_tstmnls">

                        <a href="#sb-6" class="sr-only sr-only-focusable">Skip What People Say</a>


                        <div class="">
                            <section id="our-testimonials" class="our-testimonials">
                                <div class="container" id="review">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="main-title text-center">
                                                <h3 class="mt0">Apa yang orang lain katakan?</h3>
                                                <p>Beberapa review dari klien yang kami ajar</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <style>
                                            .testimonial-four blockquote:hover::after, .section-arrow-primary-color.section-arrow--bottom-center:after {
                                                border-right-color: #0cb4ce;
                                            }

                                            .section-arrow-primary-color.section-arrow--bottom-center:after {
                                                background-color: #0cb4ce;
                                                border-right-color: #0cb4ce;
                                                border-bottom-color: #0cb4ce;
                                            }

                                            .section-arrow--bottom-center:after {
                                                z-index: 1;
                                                position: absolute;
                                                left: 50%;
                                                margin-left: -15px;
                                                content: "";
                                                position: absolute;
                                                bottom: -15px;
                                                width: 30px;
                                                height: 30px;
                                                border-right: 1px solid #262626;
                                                border-bottom: 1px solid #262626;
                                                -webkit-transform: rotate(45deg);
                                                -moz-transform: rotate(45deg);
                                                -ms-transform: rotate(45deg);
                                                -o-transform: rotate(45deg);
                                                transform: rotate(45deg);
                                                background-color: #262626;
                                            }

                                            .text-white h1, .text-white h2, .text-white h3, .text-white h4, .text-white h5, .text-white h6 {
                                                color: white !important;
                                            }

                                            .section-title {
                                                font-size: 32px;
                                                font-weight: 600;
                                                margin-top: 0.45em;
                                                margin-bottom: 0.35em;
                                                color: #303133;
                                                font-family: Poppins;
                                                letter-spacing: -0.02em;
                                            }

                                            .section-sub-title {
                                                font-size: 18px;
                                                margin-bottom: 20px;
                                                font-weight: 400;
                                                font-family: Poppins;
                                            }

                                            .section-arrow-primary-color.section-arrow--bottom-center:after {
                                                border-bottom-color: #0cb4ce;
                                            }

                                            .section-arrow-primary-color.section-arrow--bottom-center:after {
                                                background-color: #0cb4ce;
                                            }

                                            .special-heading.line span:before, .special-heading.line span:after, .footer.footer-minimal, .t-bordered {
                                                border-top-color: #eaeaea;
                                            }

                                            .t-bordered {
                                                border-top: 1px solid #eaeaea;
                                            }

                                            .section-primary {
                                                padding: 75px 0px;
                                            }

                                            section {
                                                position: relative;
                                            }


                                            .testimonial-two {
                                                padding: 20px;
                                                border: 2px solid #0cb4ce;
                                                border-radius: 2px;
                                            }


                                            .testimonial-two blockquote p:before {
                                                font-family: 'Playfair Display';
                                                font-size: 54px;
                                                color: #0cb4ce;
                                                font-weight: 900;
                                                left: 10px;
                                                color: #FFF;
                                                content: "“";
                                                font-style: normal;
                                                line-height: 1;
                                                position: absolute;
                                                top: 5px;
                                                font-size: 45px;
                                            }

                                            .testimonial-two blockquote p:after {
                                                font-family: 'Playfair Display';
                                                font-size: 54px;
                                                color: #0cb4ce;
                                                content: "”";
                                                font-size: 80px;
                                                font-style: normal;
                                                line-height: 1;
                                                position: absolute;
                                                bottom: -0.5em;
                                                right: 10px;
                                                font-weight: 900;
                                                transform: scaleY(-1);
                                                font-size: 45px;
                                                bottom: -5px;
                                            }


                                            .testimonial-two blockquote {
                                                padding: 15px 15px 15px 48px;
                                                position: relative;
                                            }

                                            .testimonial-two blockquote p:before,
                                            .testimonial-two blockquote p:after {
                                                color: #0cb4ce;
                                                font-weight: 900;
                                            }

                                            .testimonial-two blockquote p {
                                                font-size: inherit;
                                                font-weight: inherit;
                                            }

                                            .testimonial-two .testimonial-author p {
                                                color: #999;
                                                margin: 0 0 0 25px;
                                                text-align: left;
                                            }

                                            .testimonial-two .testimonial-author strong {
                                                display: block;
                                                padding-top: 10px;
                                                margin-bottom: -2px;
                                                font-weight: 500;
                                                font-size: 14px;
                                                color: #444;
                                            }

                                            .testimonial-two .testimonial-author span {
                                                color: #666;
                                                display: block;
                                                font-size: 12px;
                                            }

                                            .testimonial-two .testimonial-author .testimonial-author-thumbnail {
                                                float: left;
                                                margin-right: 15px;
                                                width: auto;
                                            }

                                            .testimonial-two .testimonial-author img {
                                                max-width: 55px;
                                            }

                                            .testimonial-two .testimonial-author {
                                                margin-left: 12px;
                                                margin-bottom: 15px;
                                            }


                                            .testimonial-two .owl-theme .owl-nav.disabled + .owl-dots {
                                                margin-top: 0px;
                                            }

                                            .testimonial-two .owl-theme .owl-dots {
                                                text-align: left;
                                                margin-left: 50px;
                                            }

                                            .testimonial-two .owl-carousel .owl-dots .owl-dot.active span,
                                            .testimonial-two .owl-carousel .owl-dots .owl-dot:hover span {
                                                border-color: #0cb4ce;
                                            }

                                            .testimonial-two .owl-carousel .owl-dots .owl-dot.active span:before,
                                            .testimonial-two .owl-carousel .owl-dots .owl-dot:hover span:before {
                                                background-color: #0cb4ce;
                                            }


                                            .testimonial-three .testimonial-image {
                                                float: left;
                                                margin: 0 20px 0 0;
                                                width: 80px;
                                                height: 80px;
                                                border-radius: 100px;
                                                overflow: hidden;
                                            }

                                            .testimonial-three .testimonial-content {
                                                overflow: hidden;
                                            }

                                            .testimonial-three .testimonial-meta {
                                                position: relative;
                                                overflow: hidden;
                                                margin-left: 100px;
                                            }


                                            .testimonial-three .testimonial-name {
                                                display: block;
                                            }


                                            .testimonial-three .testimonial-three-col {
                                                padding-bottom: 35px;
                                            }

                                            .testimonial-three .testimonial-three-col {
                                                border-right-style: dashed;
                                                border-right-width: 1px;
                                                border-bottom-style: dashed;
                                                border-bottom-width: 1px;
                                                border-right-color: #ddd;
                                                border-bottom-color: #ddd;
                                                padding: 25px;
                                            }

                                            .testimonial-three .testimonial-three-col:hover {
                                                background-color: #f7f7f7;
                                            }

                                            .alternate-color .testimonial-three .testimonial-three-col:hover {
                                                background-color: white;
                                            }

                                            .testimonial-three.testimonial-three--col-two .testimonial-three-col:nth-child(2n) {
                                                border-right: none;
                                            }

                                            .testimonial-three.testimonial-three--col-two .testimonial-three-col:nth-last-child(-n+2),
                                            .testimonial-three.testimonial-three--col-two .testimonial-three-col:last-child {
                                                border-bottom: none;
                                            }

                                            .testimonial-three.testimonial-three--col-three .testimonial-three-col:nth-child(3n) {
                                                border-right: none;
                                            }

                                            .testimonial-three.testimonial-three--col-three .testimonial-three-col:nth-last-child(-n+3),
                                            .testimonial-three.testimonial-three--col-three .testimonial-three-col:nth-last-child(-n+2),
                                            .testimonial-three.testimonial-three--col-three .testimonial-three-col:last-child {
                                                border-bottom: none;
                                            }


                                            .testimonial-four .testimonial-author .testimonial-author-thumbnail {
                                                float: left;
                                                margin-right: 15px;
                                                width: auto;
                                            }

                                            .testimonial-four .testimonial-author img {
                                                max-width: 55px;
                                            }

                                            .testimonial-four .testimonial-author strong {
                                                display: block;
                                                padding-top: 10px;
                                                margin-bottom: -2px;
                                                font-weight: 500;
                                                font-size: 14px;
                                                color: #444;
                                            }

                                            .testimonial-four .testimonial-author span {
                                                color: #666;
                                                display: block;
                                                font-size: 12px;
                                            }

                                            .testimonial-four blockquote {
                                                padding: 30px;
                                                width: 100%;
                                                border-radius: 4px;
                                                position: relative;
                                                margin-bottom: 20px;
                                                padding-bottom: 25px;
                                                border: 2px solid #eaeaea;
                                            }

                                            .testimonial-four blockquote::after {
                                                content: "";
                                                border-right: 2px solid #eaeaea;
                                                border-bottom: 2px solid #eaeaea;
                                                -webkit-transform: rotate(55deg);
                                                -moz-transform: rotate(55deg);
                                                -ms-transform: rotate(55deg);
                                                -o-transform: rotate(55deg);
                                                transform: rotate(55deg);
                                                position: absolute;
                                                left: 55px;
                                                bottom: -12px;
                                                width: 15px;
                                                height: 21px;
                                                overflow: hidden;
                                                background: white;
                                            }

                                            .testimonial-four .owl-theme .owl-nav.disabled + .owl-dots {
                                                position: absolute;
                                                float: right;
                                                text-align: right;
                                                right: 3px;
                                                bottom: 40px;
                                            }

                                            .testimonial-four .testimonial-author {
                                                position: relative;
                                                overflow: hidden;
                                            }

                                            .testimonial-four blockquote:hover::after {
                                                border-right: 2px solid #0cb4ce;
                                                border-bottom: 2px solid #0cb4ce;
                                            }

                                            .testimonial-four blockquote:hover {
                                                border: 2px solid #0cb4ce;
                                            }


                                            .testimonial-five blockquote p {
                                                font-weight: 400;
                                                font-size: 14.58px;
                                                line-height: 1.6;
                                                margin-bottom: 0;
                                            }

                                            .testimonial-five .testimonial-author .testimonial-author-thumbnail {
                                                float: left;
                                                margin-right: 15px;
                                                width: auto;
                                            }

                                            .testimonial-five .testimonial-author img {
                                                max-width: 55px;
                                            }

                                            .testimonial-five .testimonial-author strong {
                                                display: block;
                                                padding-top: 10px;
                                                margin-bottom: -2px;
                                                font-weight: 600;
                                                font-size: 13px;
                                            }

                                            .testimonial-five .testimonial-author span {
                                                color: #666;
                                                display: block;
                                                font-size: 12px;
                                            }

                                            .testimonial-five blockquote {
                                                padding: 32px 41px 37px;
                                                width: 100%;
                                                border-radius: 4px;
                                                position: relative;
                                                margin-bottom: 30px;
                                                border: 0px solid #eaeaea;
                                                background-color: #f7f7f7;
                                            }

                                            .testimonial-five blockquote::after {
                                                content: "";
                                                border-right: 0px solid #eaeaea;
                                                border-bottom: 0px solid #eaeaea;
                                                -webkit-transform: rotate(55deg);
                                                -moz-transform: rotate(55deg);
                                                -ms-transform: rotate(55deg);
                                                -o-transform: rotate(55deg);
                                                transform: rotate(55deg);
                                                position: absolute;
                                                left: 55px;
                                                bottom: -10px;
                                                width: 15px;
                                                height: 21px;
                                                overflow: hidden;
                                                background: #f7f7f7;
                                            }

                                            .testimonial-five.testimonial-light blockquote {
                                                background-color: white;
                                            }

                                            .testimonial-five.testimonial-light blockquote::after {
                                                background: white;
                                            }


                                            .testimonial-five .owl-theme .owl-nav.disabled + .owl-dots {
                                                position: absolute;
                                                float: right;
                                                text-align: right;
                                                right: 3px;
                                                bottom: 40px;
                                            }

                                            .testimonial-five .testimonial-author {
                                                position: relative;
                                                overflow: hidden;
                                            }

                                            .testimonial-five blockquote:before {
                                                content: "“";
                                                speak: none;
                                                font-style: normal;
                                                font-weight: normal;
                                                font-variant: normal;
                                                text-transform: none;
                                                line-height: 1;
                                                -webkit-font-smoothing: antialiased;
                                                -moz-osx-font-smoothing: grayscale;
                                                font-size: 170px;
                                                color: rgba(189, 189, 189, 0.2);
                                                position: absolute;
                                                top: 10px;
                                                left: 20px;
                                            }

                                            img {
                                                max-width: 100%;
                                                height: auto;
                                            }
                                        </style>


                                        <section class="section-primary t-bordered">
                                            <div class="container">
                                                <div class="row testimonial-three testimonial-three--col-three">
                                                    @foreach(json_decode($pengaturan->review) as $item)
                                                        <div class="col-md-4 testimonial-three-col">
                                                            <div class="testimonial-inner">
                                                                <div class="testimonial-image" itemprop="image">
                                                                    <img width="180" height="180"
                                                                         src="{{ url($item->gambar) }}">
                                                                </div>
                                                                <div class="testimonial-content">
                                                                    <p>
                                                                        {{ $item->isi }}
                                                                    </p>
                                                                </div>
                                                                <div class="testimonial-meta">
                                                                    <strong class="testimonial-name" itemprop="name">{{ \App\Models\Siswa::find($item->siswa_id)->nama }}</strong>
                                                                    <span class="testimonial-job-title"
                                                                          itemprop="jobTitle">Siswa</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>


                                    </div>
                                </div>
                            </section>


                        </div>

                        <span id="sb-6"></span>

                    </div> --}}
                    <div id="inst196" class=" block_cocoon_parallax_apps block " role="complementary"
                         data-block="cocoon_parallax_apps">

                        <a href="#sb-8" class="sr-only sr-only-focusable">Skip Download &amp;amp; Enjoy</a>


                        <div class="">
                            <section class="home1-divider2 parallax" data-stellar-background-ratio="0.3"
                                     style="background-image:url(//demo.createdbycocoon.com/moodle/edumy/1/pluginfile.php/314/block_cocoon_parallax_apps/images/1/3.jpg);">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-7 col-lg-7">
                                            <div class="app_grid">
                                                <h1 class="mt0">Download &amp; Enjoy</h1>
                                                <p>Access your courses anywhere, anytime &amp; prepare with practice
                                                    tests.</p>
                                                <a class="ccn-app-grid-btn" href="#">
                                                    <button class="apple_btn btn-transparent">
							<span class="icon">
								<span class="flaticon-apple"></span>
							</span>
                                                        <span class="title">App Store</span>
                                                        <span class="subtitle">Available on the</span>
                                                    </button>
                                                </a>
                                                <a class="ccn-app-grid-btn" href="#">
                                                    <button class="play_store_btn btn-transparent">
							<span class="icon">
								<span class="flaticon-google-play"></span>
							</span>
                                                        <span class="title">Google Play</span>
                                                        <span class="subtitle">Get it on</span>
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-lg-5">
                                            <div class="phone_img">
                                                <img class="img-fluid" src="Edumy_files/phone_home.png"
                                                     alt="phone_home.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>

                        <span id="sb-8"></span>

                    </div>
                    <div id="inst65" class=" block_cocoon_partners block " role="complementary"
                         data-block="cocoon_partners">

                        <a href="#sb-9" class="sr-only sr-only-focusable">Skip Need To Train Your Team?</a>


                        <div class="">


                            <section id="our-partners" class="our-partners">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="main-title text-center">
                                                <h3 class="mt0">Partner yang bekerja sama dengan kami</h3>
                                                <p>Beberapa partner besar yang telah bergabung dengan kami!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2">
                                            <div class="row">

                                                @foreach(json_decode($pengaturan->logo_kerjasama) as $item)
                                                    <div class="col-sm-6 col-md-4 col-lg">
                                                        <div class="our_partner">
                                                            <img class="img-fluid" src="{{ url($item->gambar) }}"
                                                                 alt="1.png">
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>


                        </div>

                        <span id="sb-9"></span>

                    </div>
                </aside>
                <div id="ccn-main-region" style="padding-top: 0px; padding-bottom: 0px;">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div aria-label="Content">
                                    <aside id="block-region-above-content" class="block-region"
                                           data-blockregion="above-content" data-droptarget="1"></aside>

                                    <aside id="block-region-below-content" class="block-region"
                                           data-blockregion="below-content" data-droptarget="1"></aside>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="footer_one  ">
                <div class="container" id="tentang">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
                            <div class="footer_contact_widget  ">
                                <h4>TENTANG</h4>
                                {{ $pengaturan->tentang }}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
                            <div class="footer_company_widget  ">
                                <h4>RUMAH BELAJAR</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                    <li><a href="#">Become a Teacher</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
                            <div class="footer_program_widget  ">
                                <h4>PROGRAM</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Nanodegree Plus</a></li>
                                    <li><a href="#">Veterans</a></li>
                                    <li><a href="#">Georgia</a></li>
                                    <li><a href="#">Self-Driving Car</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
                            <div class="footer_support_widget  ">
                                <h4>BANTUAN</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Documentation</a></li>
                                    <li><a href="#">Forums</a></li>
                                    <li><a href="#">Language Packs</a></li>
                                    <li><a href="#">Release Status</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-md-3 col-lg-3">
                            <div class="footer_apps_widget  ">
                                <h4>MOBILE</h4>
                                <div class="app_grid">
                                    <button class="apple_btn btn-dark">
<span class="icon">
<span class="flaticon-apple"></span>
</span>
                                        <span class="title">App Store</span>
                                        <span class="subtitle">Available now on the</span>
                                    </button>
                                    <button class="play_store_btn btn-dark">
<span class="icon">
<span class="flaticon-google-play"></span>
</span>
                                        <span class="title">Google Play</span>
                                        <span class="subtitle">Get in on</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="footer_middle_area p0  ">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 col-md-3 col-lg-3 col-xl-2 pb15 pt15">
                            <div class="logo-widget  home1    ">
                                <img class="img-fluid" src="Edumy_files/header-logo.png" alt="Edumy">
                                <span>Edumy</span>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-5 col-lg-6 col-xl-6 pb25 pt25 brdr_left_right">
                            <div class="footer_menu_widget">
                                <ul>
                                    <li class="list-inline-item"><a href="#">Home</a></li>
                                    <li class="list-inline-item"><a href="#">Privacy</a></li>
                                    <li class="list-inline-item"><a href="#">Terms</a></li>
                                    <li class="list-inline-item"><a href="#">Sitemap</a></li>
                                    <li class="list-inline-item"><a href="#">Purchase</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-3 col-xl-4 pb15 pt15">
                            <div class="footer_social_widget mt15">
                                <ul>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="footer_bottom_area pt25 pb25  ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="copyright-widget text-center">
                                <p>Copyright © 2020 Edumy Moodle Theme by Cocoon. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div id="ccn_floater_root"></div>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery-3.3.1.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery-migrate-3.0.0.min.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/cocoon.preprocess.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery.mmenu.all.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/ace-responsive-menu.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/bootstrap-select.min.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/isotop.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/snackbar.min.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/simplebar.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/parallax.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/scrollto.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery-scrolltofixed-min.js"></script>
            <script
                src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery.counterup.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/wow.min.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/progressbar.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/slider.js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/timepicker.js"></script>
            <script src="Edumy_files/js"></script>
            <script src="//demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/script.js"></script>
            <script src="Edumy_files/js.js"></script>

            <script type="text/javascript">
                //<![CDATA[
                var require = {
                    baseUrl: '//demo.createdbycocoon.com/moodle/edumy/1/lib/requirejs.php/1583195737/',
                    // We only support AMD modules with an explicit define() statement.
                    enforceDefine: true,
                    skipDataMain: true,
                    waitSeconds: 0,

                    paths: {
                        jquery: '//demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/jquery/jquery-3.2.1.min',
                        jqueryui: '//demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/jquery/ui-1.12.1/jquery-ui.min',
                        jqueryprivate: '//demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/requirejs/jquery-private'
                    },

                    // Custom jquery config map.
                    map: {
                        // '*' means all modules will get 'jqueryprivate'
                        // for their 'jquery' dependency.
                        '*': {jquery: 'jqueryprivate'},
                        // Stub module for 'process'. This is a workaround for a bug in MathJax (see MDL-60458).
                        '*': {process: 'core/first'},

                        // 'jquery-private' wants the real jQuery module
                        // though. If this line was not here, there would
                        // be an unresolvable cyclic dependency.
                        jqueryprivate: {jquery: 'jquery'}
                    }
                };

                //]]>
            </script>
            <script type="text/javascript"
                    src="//demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/requirejs/require.min.js"></script>
            <script type="text/javascript">
                //<![CDATA[
                M.util.js_pending("core/first");
                require(['core/first'], function () {
                    ;
                    require(["media_videojs/loader"], function (loader) {
                        loader.setUp(function (videojs) {
                            videojs.options.flash.swf = "//demo.createdbycocoon.com/moodle/edumy/1/media/player/videojs/videojs/video-js.swf";
                            videojs.addLanguage("en", {
                                "Audio Player": "Audio Player",
                                "Video Player": "Video Player",
                                "Play": "Play",
                                "Pause": "Pause",
                                "Replay": "Replay",
                                "Current Time": "Current Time",
                                "Duration Time": "Duration Time",
                                "Remaining Time": "Remaining Time",
                                "Stream Type": "Stream Type",
                                "LIVE": "LIVE",
                                "Loaded": "Loaded",
                                "Progress": "Progress",
                                "Progress Bar": "Progress Bar",
                                "progress bar timing: currentTime={1} duration={2}": "{1} of {2}",
                                "Fullscreen": "Fullscreen",
                                "Non-Fullscreen": "Non-Fullscreen",
                                "Mute": "Mute",
                                "Unmute": "Unmute",
                                "Playback Rate": "Playback Rate",
                                "Subtitles": "Subtitles",
                                "subtitles off": "subtitles off",
                                "Captions": "Captions",
                                "captions off": "captions off",
                                "Chapters": "Chapters",
                                "Descriptions": "Descriptions",
                                "descriptions off": "descriptions off",
                                "Audio Track": "Audio Track",
                                "Volume Level": "Volume Level",
                                "You aborted the media playback": "You aborted the media playback",
                                "A network error caused the media download to fail part-way.": "A network error caused the media download to fail part-way.",
                                "The media could not be loaded, either because the server or network failed or because the format is not supported.": "The media could not be loaded, either because the server or network failed or because the format is not supported.",
                                "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.": "The media playback was aborted due to a corruption problem or because the media used features your browser did not support.",
                                "No compatible source was found for this media.": "No compatible source was found for this media.",
                                "The media is encrypted and we do not have the keys to decrypt it.": "The media is encrypted and we do not have the keys to decrypt it.",
                                "Play Video": "Play Video",
                                "Close": "Close",
                                "Close Modal Dialog": "Close Modal Dialog",
                                "Modal Window": "Modal Window",
                                "This is a modal window": "This is a modal window",
                                "This modal can be closed by pressing the Escape key or activating the close button.": "This modal can be closed by pressing the Escape key or activating the close button.",
                                ", opens captions settings dialog": ", opens captions settings dialog",
                                ", opens subtitles settings dialog": ", opens subtitles settings dialog",
                                ", opens descriptions settings dialog": ", opens descriptions settings dialog",
                                ", selected": ", selected",
                                "captions settings": "captions settings",
                                "subtitles settings": "subititles settings",
                                "descriptions settings": "descriptions settings",
                                "Text": "Text",
                                "White": "White",
                                "Black": "Black",
                                "Red": "Red",
                                "Green": "Green",
                                "Blue": "Blue",
                                "Yellow": "Yellow",
                                "Magenta": "Magenta",
                                "Cyan": "Cyan",
                                "Background": "Background",
                                "Window": "Window",
                                "Transparent": "Transparent",
                                "Semi-Transparent": "Semi-Transparent",
                                "Opaque": "Opaque",
                                "Font Size": "Font Size",
                                "Text Edge Style": "Text Edge Style",
                                "None": "None",
                                "Raised": "Raised",
                                "Depressed": "Depressed",
                                "Uniform": "Uniform",
                                "Dropshadow": "Dropshadow",
                                "Font Family": "Font Family",
                                "Proportional Sans-Serif": "Proportional Sans-Serif",
                                "Monospace Sans-Serif": "Monospace Sans-Serif",
                                "Proportional Serif": "Proportional Serif",
                                "Monospace Serif": "Monospace Serif",
                                "Casual": "Casual",
                                "Script": "Script",
                                "Small Caps": "Small Caps",
                                "Reset": "Reset",
                                "restore all settings to the default values": "restore all settings to the default values",
                                "Done": "Done",
                                "Caption Settings Dialog": "Caption Settings Dialog",
                                "Beginning of dialog window. Escape will cancel and close the window.": "Beginning of dialog window. Escape will cancel and close the window.",
                                "End of dialog window.": "End of dialog window."
                            });

                        });
                    });
                    ;

                    M.util.js_pending('theme_boost/loader');
                    require(['theme_boost/loader'], function () {
                        M.util.js_complete('theme_boost/loader');
                    });
                    M.util.js_pending('theme_boost/drawer');
                    require(['theme_boost/drawer'], function (mod) {
                        mod.init();
                        M.util.js_complete('theme_boost/drawer');
                    });
                    ;
                    M.util.js_pending('core/notification');
                    require(['core/notification'], function (amd) {
                        amd.init(2, []);
                        M.util.js_complete('core/notification');
                    });
                    ;
                    M.util.js_pending('core/log');
                    require(['core/log'], function (amd) {
                        amd.setConfig({"level": "trace"});
                        M.util.js_complete('core/log');
                    });
                    ;
                    M.util.js_pending('core/page_global');
                    require(['core/page_global'], function (amd) {
                        amd.init();
                        M.util.js_complete('core/page_global');
                    });
                    M.util.js_complete("core/first");
                });
                //]]>
            </script>
            <script type="text/javascript">
                //<![CDATA[
                M.str = {
                    "moodle": {
                        "lastmodified": "Last modified",
                        "name": "Name",
                        "error": "Error",
                        "info": "Information",
                        "yes": "Yes",
                        "no": "No",
                        "cancel": "Cancel",
                        "confirm": "Confirm",
                        "areyousure": "Are you sure?",
                        "closebuttontitle": "Close",
                        "unknownerror": "Unknown error"
                    },
                    "repository": {
                        "type": "Type",
                        "size": "Size",
                        "invalidjson": "Invalid JSON string",
                        "nofilesattached": "No files attached",
                        "filepicker": "File picker",
                        "logout": "Logout",
                        "nofilesavailable": "No files available",
                        "norepositoriesavailable": "Sorry, none of your current repositories can return files in the required format.",
                        "fileexistsdialogheader": "File exists",
                        "fileexistsdialog_editor": "A file with that name has already been attached to the text you are editing.",
                        "fileexistsdialog_filemanager": "A file with that name has already been attached",
                        "renameto": "Rename to \"{$a}\"",
                        "referencesexist": "There are {$a} alias\/shortcut files that use this file as their source",
                        "select": "Select"
                    },
                    "admin": {
                        "confirmdeletecomments": "You are about to delete comments, are you sure?",
                        "confirmation": "Confirmation"
                    }
                };
                //]]>
            </script>
            <script type="text/javascript">
                //<![CDATA[
                (function () {
                    Y.use("moodle-filter_mathjaxloader-loader", function () {
                        M.filter_mathjaxloader.configure({
                            "mathjaxconfig": "\nMathJax.Hub.Config({\n    config: [\"Accessible.js\", \"Safe.js\"],\n    errorSettings: { message: [\"!\"] },\n    skipStartupTypeset: true,\n    messageStyle: \"none\"\n});\n",
                            "lang": "en"
                        });
                    });
                    M.util.help_popups.setup(Y);
                    M.util.js_pending('random6391963c25f7312');
                    Y.on('domready', function () {
                        M.util.js_complete("init");
                        M.util.js_complete('random6391963c25f7312');
                    });
                })();
                //]]>
            </script>

        </div>


    </div>
</div>
<div class="mm-wrapper__blocker mm-slideout"><a href="#mm-0"><span class="mm-sronly">Close menu</span></a></div>
</body>
</html>


{{--<!doctype html>--}}
{{--<html lang="en">--}}

{{--<head>--}}

{{--    <!--====== Required meta tags ======-->--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta http-equiv="x-ua-compatible" content="ie=edge">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}

{{--    <!--====== Title ======-->--}}
{{--    <title>{{ env('APP_NAME') }} - {{ env('APP_OBJECT_NAME') }} </title>--}}

{{--    <!--====== Favicon Icon ======-->--}}
{{--    <link rel="shortcut icon" href="{{ url('') }}/images/favicon.png" type="image/png">--}}

{{--    <!--====== Slick css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/slick.css">--}}

{{--    <!--====== Animate css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/animate.css">--}}

{{--    <!--====== Nice Select css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/nice-select.css">--}}

{{--    <!--====== Nice Number css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/jquery.nice-number.min.css">--}}

{{--    <!--====== Magnific Popup css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/magnific-popup.css">--}}

{{--    <!--====== Bootstrap css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/bootstrap.min.css">--}}

{{--    <!--====== Fontawesome css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/font-awesome.min.css">--}}

{{--    <!--====== Default css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/default.css">--}}

{{--    <!--====== Style css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/style.css">--}}

{{--    <!--====== Responsive css ======-->--}}
{{--    <link rel="stylesheet" href="{{ url('') }}/css/responsive.css">--}}


{{--</head>--}}

{{--<body>--}}

{{--<!--====== PRELOADER PART START ======-->--}}

{{--<div class="preloader">--}}
{{--    <div class="loader rubix-cube">--}}
{{--        <div class="layer layer-1"></div>--}}
{{--        <div class="layer layer-2"></div>--}}
{{--        <div class="layer layer-3 color-1"></div>--}}
{{--        <div class="layer layer-4"></div>--}}
{{--        <div class="layer layer-5"></div>--}}
{{--        <div class="layer layer-6"></div>--}}
{{--        <div class="layer layer-7"></div>--}}
{{--        <div class="layer layer-8"></div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!--====== PRELOADER PART START ======-->--}}

{{--<!--====== HEADER PART START ======-->--}}

{{--<header id="header-part">--}}

{{--    <div class="header-top d-none d-md-block">--}}
{{--        <div class="container">--}}
{{--            <div class="row align-items-center">--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="header-contact text-lg-left text-center">--}}
{{--                        <ul>--}}
{{--                            <li><img src="images/all-icon/call.png"--}}
{{--                                     alt="icon"><span>{{ env('APP_OBJECT_PHONE_NUMBER') }}</span></li>--}}
{{--                            <li><img src="images/all-icon/email.png"--}}
{{--                                     alt="icon"><span>{{ env('APP_OBJECT_EMAIL') }}</span></li>--}}
{{--                            <li><img src="images/all-icon/map.png"--}}
{{--                                     alt="icon"><span>{{ env('APP_OBJECT_LOCATION') }}</span></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="header-social text-lg-right text-center">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <a href="{{ url('login') }}" class="btn btn-outline-info btn-sm">Login</a>&nbsp;|&nbsp;--}}
{{--                            </li>--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-facebook-f"></i></a></li>--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div> <!-- row -->--}}
{{--        </div> <!-- container -->--}}
{{--    </div> <!-- header top -->--}}

{{--    <div class="navigation navigation-2">--}}
{{--        <div class="container">--}}
{{--            <div class="row no-gutters">--}}
{{--                <div class="col-lg-11 col-md-10 col-sm-9 col-9">--}}
{{--                    <nav class="navbar navbar-expand-lg">--}}
{{--                        <a class="navbar-brand" href="{{ url('') }}/index-3.html">--}}
{{--                            <img src="{{ url($logoGambar) }}" alt="Logo" WIDTH="64">--}}
{{--                        </a>--}}
{{--                        <button class="navbar-toggler" type="button" data-toggle="collapse"--}}
{{--                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"--}}
{{--                                aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                            <span class="icon-bar"></span>--}}
{{--                            <span class="icon-bar"></span>--}}
{{--                            <span class="icon-bar"></span>--}}
{{--                        </button>--}}

{{--                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">--}}
{{--                            <ul class="navbar-nav ml-auto">--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#registrasi">Registrasi</a>--}}
{{--                                </li>--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#mapel">Mapel</a>--}}
{{--                                </li>--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#kelas">Kelas</a>--}}
{{--                                </li>--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#fasilitas">Fasilitas</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#guru">Guru</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#review">Review</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#jenjang">Jenjang</a>--}}
{{--                                    <ul class="sub-menu">--}}
{{--                                        @forelse($jenjang as $item)--}}
{{--                                            <li><a href="#">{{ $item->nama }} - {{ $item->keterangan }}</a></li>--}}
{{--                                        @empty--}}
{{--                                            <strong>Belum ada jenjang</strong>--}}
{{--                                        @endforelse--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#tentang">Tentang</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{ url('') }}/#prestasi">Prestasi</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </nav> <!-- nav -->--}}
{{--                </div>--}}

{{--            </div> <!-- row -->--}}
{{--        </div> <!-- container -->--}}
{{--    </div>--}}

{{--</header>--}}

{{--<!--====== HEADER PART ENDS ======-->--}}

{{--<!--====== SEARCH BOX PART START ======-->--}}

{{--<div class="search-box">--}}
{{--    <div class="serach-form">--}}
{{--        <div class="closebtn">--}}
{{--            <span></span>--}}
{{--            <span></span>--}}
{{--        </div>--}}
{{--        <form action="#">--}}
{{--            <input type="text" placeholder="Search by keyword">--}}
{{--            <button><i class="fa fa-search"></i></button>--}}
{{--        </form>--}}
{{--    </div> <!-- serach form -->--}}
{{--</div>--}}

{{--<!--====== SEARCH BOX PART ENDS ======-->--}}

{{--<!--====== SLIDER PART START ======-->--}}

{{--<section id="slider-part" class="slider-active">--}}
{{--    @forelse(json_decode($pengaturan->hero_section) as $item)--}}
{{--        <div class="single-slider slider-2 bg_cover" style="background-image: url('{{ url("$item->gambar") }}')"--}}
{{--             data-overlay="4">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-9 col-lg-10">--}}
{{--                        <div class="slider-cont">--}}
{{--                            <h1 data-animation="bounceInLeft" data-delay="1s">{{ $item->judul }}</h1>--}}
{{--                            <a data-animation="fadeInUp" data-delay="1.3s" href="{{ url('') }}/#" class="main-btn">Registrasi--}}
{{--                                sekarang</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @empty--}}
{{--        <strong>Belum Ada Hero Section</strong>--}}
{{--    @endforelse--}}
{{--</section>--}}

{{--<section id="category-2-part">--}}
{{--    <div class="container">--}}
{{--        <div class="row" id="mapel">--}}
{{--            <div class="col-lg-6">--}}
{{--                <h1 style="margin-top: 40px;" id="mapel">Mapel</h1>--}}
{{--                <div class="category-2-items pt-10">--}}
{{--                    <div class="row">--}}


{{--                        @forelse($mapels as $item)--}}

{{--                            <div class="col-md-6">--}}
{{--                                <div class="singel-items text-center mt-30">--}}
{{--                                    <div class="items-image"--}}
{{--                                         style="width: 100%; height: 200px; color: #07294D; background-color: white; border-radius: 20px solid #07294D; margin-bottom: 20px;">--}}

{{--                                    </div>--}}
{{--                                    <div class="items-cont">--}}
{{--                                        <a href="{{ url('') }}/#">--}}
{{--                                            <h5>{{ ucwords($item->nama) }}</h5>--}}
{{--                                            <span>{{ $item->mapel_details->unique('guru_id')->count() }} guru</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @empty--}}
{{--                            <strong>Belum ada mapel</strong>--}}
{{--                        @endforelse--}}
{{--                    </div>--}}
{{--                </div>--}}


{{--                <h1 id="kelas" style="margin-top: 40px;">Kelas</h1>--}}
{{--                <div class="category-2-items pt-10">--}}
{{--                    <div class="row">--}}


{{--                        @forelse($kelass as $item)--}}

{{--                            <div class="col-md-6">--}}
{{--                                <div class="singel-items text-center mt-30">--}}
{{--                                    <div class="items-image"--}}
{{--                                         style="width: 100%; height: 200px; color: #07294D; background-color: white; border-radius: 20px solid #07294D; margin-bottom: 20px;">--}}

{{--                                    </div>--}}
{{--                                    <div class="items-cont">--}}
{{--                                        <a href="{{ url('') }}/#">--}}
{{--                                            <h5>{{ strtoupper($item->nama) }}</h5>--}}
{{--                                            <span>{{ $item->kelas_details->count() }} Siswa</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @empty--}}
{{--                            <strong>Belum ada mapel</strong>--}}
{{--                        @endforelse--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-5 offset-lg-1">--}}
{{--                <div class="category-form" id="registrasi">--}}
{{--                    <div class="form-title text-center">--}}
{{--                        <h3>Biaya sangat terjangkau!</h3>--}}
{{--                        <span>Registrasi sekarang</span>--}}
{{--                    </div>--}}
{{--                    <div class="main-form">--}}
{{--                        @if(session()->has("error"))--}}
{{--                            <div class="alert alert-danger" role="alert">--}}
{{--                                {{ session()->get("error") }}--}}
{{--                            </div>--}}
{{--                        @elseif(session()->has("success"))--}}
{{--                            <div class="alert alert-success" role="alert">--}}
{{--                                {{ session()->get("success") }}--}}
{{--                            </div>--}}
{{--                        @elseif(session()->has("warning"))--}}
{{--                            <div class="alert alert-warning" role="alert">--}}
{{--                                {{ session()->get("warning") }}--}}
{{--                            </div>--}}
{{--                        @endif--}}

{{--                        <form action="{{ url('') }}" method="get" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="from_cek" value="Ya">--}}

{{--                            <div class="singel-form">--}}
{{--                                <label for="nama" class="control-label">{{ ucwords('Cek Status Registrasi') }}</label>--}}
{{--                                <p>--}}

{{--                                    <input placeholder="Nomor Registrasi, Ex: 8"--}}
{{--                                           class="form-control form-control-line @error('nomor_registrasi') is-invalid @enderror"--}}
{{--                                           name="nomor_registrasi"--}}
{{--                                           type="text" id="nomor_registrasi"--}}
{{--                                           value="{{ isset($siswa->nomor_registrasi) ? $siswa->nomor_registrasi : old('nomor_registrasi') }}"--}}
{{--                                           required>--}}

{{--                                    @error('nomor_registrasi')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="singel-form">--}}
{{--                                <button class="btn btn-outline-warning" type="submit">Cek</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}

{{--                        <hr>--}}

{{--                        <div class="tex-center">Atau Registrasi, Jadwal--}}
{{--                            Pendaftaran: {{ $pengaturan->batas_awal_registrasi }}--}}
{{--                            s/d {{ $pengaturan->batas_akhir_registrasi }}</div>--}}

{{--                        <hr>--}}

{{--                        <form action="{{ route('siswa.store') }}" method="post" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            <input type="hidden" name="from_register" value="Ya">--}}

{{--                            <div class="singel-form">--}}
{{--                                <select name="jenjang_id" class="form-control form-control-line" id="jenjang_id"--}}
{{--                                        required>--}}
{{--                                    @foreach ($jenjang->pluck('nama', 'id') as $optionKey => $optionValue)--}}
{{--                                        <option--}}
{{--                                            value="{{ $optionKey }}" {{ (isset($siswa->jenjang_id) && $siswa->jenjang_id == $optionKey) || old('jenjang_id') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}

{{--                                @error('jenjang_id')--}}
{{--                                <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="singel-form">--}}
{{--                                <input placeholder="nama"--}}
{{--                                       class="form-control form-control-line @error('nama') is-invalid @enderror"--}}
{{--                                       name="nama"--}}
{{--                                       type="text" id="nama"--}}
{{--                                       value="{{ isset($siswa->nama) ? $siswa->nama : old('nama') }}" required>--}}

{{--                                @error('nama')--}}
{{--                                <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="singel-form">--}}
{{--                                <select name="jenis_kelamin" class="form-control form-control-line" id="jenis_kelamin"--}}
{{--                                        required>--}}
{{--                                    @foreach (["Laki - Laki" => "Laki - Laki", "Perempuan" => "Perempuan"] as $optionKey => $optionValue)--}}
{{--                                        <option--}}
{{--                                            value="{{ $optionKey }}" {{ (isset($siswa->jenis_kelamin) && $siswa->jenis_kelamin == $optionKey) || old('jenis_kelamin') == $optionKey ? 'selected' : ''}}>{{ $optionValue }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}

{{--                                @error('jenis_kelamin')--}}
{{--                                <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="singel-form">--}}
{{--                                <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat"--}}
{{--                                          placeholder="alamat"--}}
{{--                                          required>{{ isset($siswa->alamat) ? $siswa->alamat : old('alamat')}}</textarea>--}}

{{--                                @error('alamat')--}}
{{--                                <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="singel-form">--}}
{{--                                <input placeholder="no_hp"--}}
{{--                                       class="form-control form-control-line @error('no_hp') is-invalid @enderror"--}}
{{--                                       name="no_hp" type="text" id="no_hp"--}}
{{--                                       value="{{ isset($siswa->no_hp) ? $siswa->no_hp : old('no_hp') }}"--}}
{{--                                       required>--}}

{{--                                @error('no_hp')--}}
{{--                                <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="singel-form">--}}
{{--                                <label for="nama"--}}
{{--                                       class="control-label">{{ ucwords('Berkas Zip (foto 3x4 2 lembar dan ijazah)') }}</label>--}}
{{--                                <p>--}}
{{--                                    <input placeholder="berkas"--}}
{{--                                           class="@error('berkas') is-invalid @enderror"--}}
{{--                                           name="berkas" type="file" id="berkas"--}}
{{--                                           value="{{ isset($siswa->berkas) ? $siswa->berkas : old('berkas') }}"--}}
{{--                                           required>--}}

{{--                                    @error('berkas')--}}
{{--                                    <span class="invalid-feedback text-danger" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}

{{--                            <div class="singel-form">--}}
{{--                                <button class="main-btn" type="submit">Registrasi</button>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div> <!-- row -->--}}
{{--    </div> <!-- container -->--}}
{{--</section>--}}


{{--<section id="course-part" class="pt-115 pb-115">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="section-title pb-45">--}}
{{--                    <h5 id="fasilitas">Fasilitas</h5>--}}
{{--                    <h2>Fasilitas terbaik kami </h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row course-slied mt-30">--}}

{{--            @forelse($fasilitas as $item)--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="singel-course-2">--}}
{{--                        <div class="thum">--}}
{{--                            <div class="image">--}}
{{--                                <img src="{{ url($item->gambar) }}" alt="Course">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="cont">--}}
{{--                            <a href="{{ url('') }}/#"><h4>{{ $item->nama }}</h4></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--                <strong>Fasilitas Belum Ada</strong>--}}
{{--            @endforelse--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section id="course-part" class="pt-115 pb-115">--}}
{{--    <div class="container" id="prestasi">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="section-title pb-45">--}}
{{--                    <h5 id="fasilitas">Prestasi</h5>--}}
{{--                    <h2>Prestasi yang kami raih selama ini</h2>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row course-slied mt-30">--}}

{{--            @forelse(json_decode($pengaturan->prestasi) as $item)--}}
{{--                <div class="col-lg-4">--}}
{{--                    <div class="singel-course-2">--}}
{{--                        <div class="thum">--}}
{{--                            <div class="image">--}}
{{--                                <img--}}
{{--                                    src="{{ url($item->gambar) }}"--}}
{{--                                    alt="Course">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="cont">--}}
{{--                            <a href="{{ url('') }}/#"><h4>{{ $item->judul }}</h4></a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--                <strong>Prestasi Belum Ada</strong>--}}
{{--            @endforelse--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

{{--<section id="teachers-part" class="pt-65 pb-120 gray-bg">--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--                <div class="section-title mt-50 pb-25">--}}
{{--                    <h5 id="guru">Guru</h5>--}}
{{--                    <h2>Guru terbaik</h2>--}}
{{--                </div> <!-- section title -->--}}
{{--                <div class="teachers-2">--}}
{{--                    <div class="row">--}}

{{--                        <style>--}}

{{--                            .name {--}}
{{--                                font-size: 22px;--}}
{{--                                font-weight: bold--}}
{{--                            }--}}

{{--                            .idd {--}}
{{--                                font-size: 14px;--}}
{{--                                font-weight: 600--}}
{{--                            }--}}

{{--                            .idd1 {--}}
{{--                                font-size: 12px--}}
{{--                            }--}}

{{--                            .number {--}}
{{--                                font-size: 22px;--}}
{{--                                font-weight: bold--}}
{{--                            }--}}

{{--                            .follow {--}}
{{--                                font-size: 12px;--}}
{{--                                font-weight: 500;--}}
{{--                                color: #444444--}}
{{--                            }--}}

{{--                            .btn1 {--}}
{{--                                height: 40px;--}}
{{--                                width: 150px;--}}
{{--                                border: none;--}}
{{--                                background-color: #000;--}}
{{--                                color: #aeaeae;--}}
{{--                                font-size: 15px--}}
{{--                            }--}}

{{--                            .text span {--}}
{{--                                font-size: 13px;--}}
{{--                                color: #545454;--}}
{{--                                font-weight: 500--}}
{{--                            }--}}

{{--                            .icons i {--}}
{{--                                font-size: 19px--}}
{{--                            }--}}

{{--                            hr .new1 {--}}
{{--                                border: 1px solid--}}
{{--                            }--}}

{{--                            .join {--}}
{{--                                font-size: 14px;--}}
{{--                                color: #a0a0a0;--}}
{{--                                font-weight: bold--}}
{{--                            }--}}

{{--                            .date {--}}
{{--                                background-color: #ccc--}}
{{--                            }--}}
{{--                        </style>--}}

{{--                        @forelse($guru as $item)--}}
{{--                            <div class="col-md-6">--}}
{{--                                <div class="teachers-2-singel mt-30">--}}
{{--                                    <div class="thum">--}}
{{--                                        <img src="{{ url("$item->foto") }}" alt="Teacher" width="80" height="80"--}}
{{--                                             data-toggle="modal" data-target="#exampleModalCenter-{{ $item->id }}">--}}
{{--                                    </div>--}}
{{--                                    <div class="cont">--}}
{{--                                        <a href="{{ url('') }}/teachers-singel.html"><h5>{{ $item->nama }}</h5></a>--}}
{{--                                        <p>--}}
{{--                                            @php--}}
{{--                                                $mapels = \App\Models\Mapel::whereIn('id', $item->mapel_details->unique('mapel_id')->pluck('mapel_id')->toArray())->pluck('nama')->toArray();--}}

{{--                                                echo implode(", ", $mapels);--}}
{{--                                                --}}
{{--                                                if(!count($mapels)) {--}}
{{--                                                    echo "-";--}}
{{--                                                }--}}
{{--                                            @endphp--}}
{{--                                        </p>--}}
{{--                                        <span><i class="fa fa-book"></i>{{ $item->mapel_details->unique('kelas_id')->count() }} Kelas</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="modal fade" id="exampleModalCenter-{{ $item->id }}" tabindex="-1" role="dialog"--}}
{{--                                 aria-labelledby="exampleModalCenterTitle"--}}
{{--                                 aria-hidden="true">--}}
{{--                                <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">--}}
{{--                                                <div class="card p-4">--}}
{{--                                                    <div--}}
{{--                                                        class=" image d-flex flex-column justify-content-center align-items-center">--}}
{{--                                                        <button class="btn btn-secondary"><img--}}
{{--                                                                src="{{ url($item->foto) }}" height="100"--}}
{{--                                                                width="100"/></button>--}}
{{--                                                        <span class="name mt-3">{{ $item->nama }}</span>--}}

{{--                                                        <div--}}
{{--                                                            class="d-flex flex-row justify-content-center align-items-center mt-3"><span--}}
{{--                                                                class="number">{{ $item->mapel_details->unique('kelas_id')->count() }} <span--}}
{{--                                                                    class="follow">Kelas</span></span></div>--}}

{{--                                                        <div--}}
{{--                                                            class="d-flex flex-row justify-content-center align-items-center mt-3"><span--}}
{{--                                                                class="number">{{ $item->mapel_details->unique('mapel_id')->count() }} <span--}}
{{--                                                                    class="follow">Mapel</span></span></div>--}}

{{--                                                        <div class="text mt-3"><span>{{ $item->lulusan }}</span>--}}
{{--                                                        </div>--}}

{{--                                                        <div class="text mt-3"><span>{{ $item->jenis_kelamin }}</span>--}}
{{--                                                        </div>--}}

{{--                                                        <div class=" d-flex mt-2">--}}
{{--                                                            <button class="btn1 btn-dark">Nip: {{ $item->nip }}</button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        @empty--}}
{{--                            <strong>Guru belum ditambahkan</strong>--}}
{{--                        @endforelse--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6 ">--}}
{{--                <div class="happy-student mt-55">--}}
{{--                    <div class="happy-title">--}}
{{--                        <h3 id="review">Review</h3>--}}
{{--                    </div>--}}
{{--                    <div class="student-slied">--}}
{{--                        @forelse(json_decode($pengaturan->review) as $item)--}}
{{--                            <div class="singel-student">--}}
{{--                                <img src="{{ url($item->gambar) }}" alt="Quote" height="300">--}}
{{--                                <p>{{ $item->isi }}</p>--}}
{{--                                <h6>{{ $siswa->where('id', $item->siswa_id)->first()->nama }}</h6>--}}
{{--                                <span>{{ $siswa->where('id', $item->siswa_id)->first()->kelas_detail ? $siswa->where('id', $item->siswa_id)->first()->kelas_detail->kelas->nama : "" }}</span>--}}
{{--                            </div>--}}
{{--                        @empty--}}
{{--                            <strong>Review belum ditambahkan</strong>--}}
{{--                        @endforelse--}}
{{--                    </div>--}}
{{--                    <div class="student-image">--}}
{{--                        --}}{{--                        <img src="images/teachers/teacher-2/happy.png" alt="Image">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-lg-6 ">--}}
{{--                <div class="mt-55">--}}
{{--                    <canvas id="myChart" width="400" height="400"></canvas>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}


{{--<div id="patnar-logo" class="pt-40 pb-80 gray-bg">--}}
{{--    <div class="container">--}}
{{--        <div class="row patnar-slied">--}}
{{--            @forelse(json_decode($pengaturan->logo_kerjasama) as $item)--}}
{{--                <div class="col-lg-12">--}}
{{--                    <div class="singel-patnar text-center mt-40">--}}
{{--                        <img src="{{ url($item->gambar) }}" alt="Logo" height="200">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @empty--}}
{{--                <strong>Logo kerjasama belum ditambahkan</strong>--}}
{{--            @endforelse--}}

{{--        </div> <!-- row -->--}}
{{--    </div> <!-- container -->--}}
{{--</div>--}}

{{--<!--====== PATNAR LOGO PART ENDS ======-->--}}

{{--<!--====== FOOTER PART START ======-->--}}

{{--<footer id="footer-part">--}}
{{--    <div class="footer-top pt-40 pb-70">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="footer-about mt-40">--}}
{{--                        <div class="logo">--}}
{{--                            <a href="{{ url('') }}/#"><img src="{{ url($logoGambar) }}" alt="Logo"></a>--}}
{{--                        </div>--}}

{{--                        <ul class="mt-20">--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-facebook-f"></i></a></li>--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-google-plus"></i></a></li>--}}
{{--                            <li><a href="{{ url('') }}/#"><i class="fa fa-instagram"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div> <!-- footer about -->--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6 col-sm-6">--}}
{{--                    <div class="footer-link mt-40">--}}
{{--                        <div class="footer-title pb-25">--}}
{{--                            <h6 id="#tentang">Tentang</h6>--}}
{{--                        </div>--}}
{{--                        <span class="text-white">{{ $pengaturan->tentang }}</span>--}}
{{--                    </div> <!-- footer link -->--}}
{{--                </div>--}}
{{--                <div class="col-lg-2 col-md-6 col-sm-6">--}}
{{--                    <div class="footer-link support mt-40">--}}
{{--                        <div class="footer-title pb-25">--}}
{{--                            <h6 id="jenjang">Jenjang</h6>--}}
{{--                        </div>--}}
{{--                        <ul>--}}
{{--                            @forelse($jenjang as $item)--}}
{{--                                <li><a href="{{ url('') }}/#"><i class="fa fa-angle-right"></i>{{ $item->nama }}--}}
{{--                                        - {{ $item->keterangan }}</a></li>--}}
{{--                            @empty--}}
{{--                                <strong>Belum ada jenjang</strong>--}}
{{--                            @endforelse--}}
{{--                        </ul>--}}
{{--                    </div> <!-- support -->--}}
{{--                </div>--}}
{{--                <div class="col-lg-3 col-md-6">--}}
{{--                    <div class="footer-address mt-40">--}}
{{--                        <div class="footer-title pb-25">--}}
{{--                            <h6>Kontak</h6>--}}
{{--                        </div>--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <div class="icon">--}}
{{--                                    <i class="fa fa-home"></i>--}}
{{--                                </div>--}}
{{--                                <div class="cont">--}}
{{--                                    <p>{{ env('APP_OBJECT_LOCATION') }}</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="icon">--}}
{{--                                    <i class="fa fa-phone"></i>--}}
{{--                                </div>--}}
{{--                                <div class="cont">--}}
{{--                                    <p>{{ env('app_object_phone') }}</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="icon">--}}
{{--                                    <i class="fa fa-envelope-o"></i>--}}
{{--                                </div>--}}
{{--                                <div class="cont">--}}
{{--                                    <p>{{ env('app_object_email') }}</p>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div> <!-- footer address -->--}}
{{--                </div>--}}
{{--            </div> <!-- row -->--}}
{{--        </div> <!-- container -->--}}
{{--    </div> <!-- footer top -->--}}

{{--    <div class="footer-copyright pt-10 pb-25">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-8">--}}
{{--                    <div class="copyright text-md-left text-center pt-15">--}}
{{--                        <p>Copyright &copy; {{ date('Y') }} - {{ env('APP_OBJECT_NAME') }}</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-4">--}}
{{--                    <div class="copyright text-md-right text-center pt-15">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div> <!-- row -->--}}
{{--        </div> <!-- container -->--}}
{{--    </div> <!-- footer copyright -->--}}
{{--</footer>--}}

{{--<!--====== FOOTER PART ENDS ======-->--}}

{{--<!--====== BACK TO TP PART START ======-->--}}

{{--<a href="{{ url('') }}/#" class="back-to-top"><i class="fa fa-angle-up"></i></a>--}}

{{--<!--====== BACK TO TP PART ENDS ======-->--}}


{{--<!--====== jquery js ======-->--}}
{{--<script src="{{ url('') }}/js/vendor/modernizr-3.6.0.min.js"></script>--}}
{{--<script src="{{ url('') }}/js/vendor/jquery-1.12.4.min.js"></script>--}}

{{--<!--====== Bootstrap js ======-->--}}
{{--<script src="{{ url('') }}/js/bootstrap.min.js"></script>--}}

{{--<!--====== Slick js ======-->--}}
{{--<script src="{{ url('') }}/js/slick.min.js"></script>--}}

{{--<!--====== Magnific Popup js ======-->--}}
{{--<script src="{{ url('') }}/js/jquery.magnific-popup.min.js"></script>--}}

{{--<!--====== Counter Up js ======-->--}}
{{--<script src="{{ url('') }}/js/waypoints.min.js"></script>--}}
{{--<script src="{{ url('') }}/js/jquery.counterup.min.js"></script>--}}

{{--<!--====== Nice Select js ======-->--}}
{{--<script src="{{ url('') }}/js/jquery.nice-select.min.js"></script>--}}

{{--<!--====== Nice Number js ======-->--}}
{{--<script src="{{ url('') }}/js/jquery.nice-number.min.js"></script>--}}

{{--<!--====== Count Down js ======-->--}}
{{--<script src="{{ url('') }}/js/jquery.countdown.min.js"></script>--}}

{{--<!--====== Validator js ======-->--}}
{{--<script src="{{ url('') }}/js/validator.min.js"></script>--}}

{{--<!--====== Ajax Contact js ======-->--}}
{{--<script src="{{ url('') }}/js/ajax-contact.js"></script>--}}

{{--<!--====== Main js ======-->--}}
{{--<script src="{{ url('') }}/js/main.js"></script>--}}

{{--<!--====== Map js ======-->--}}
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>--}}
{{--<script src="{{ url('') }}/js/map-script.js"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>--}}


{{--@php--}}
{{--    $angkatans = $siswa->unique('angkatan')->sortByDesc('angkatan')->take(5)->reverse()->pluck('angkatan');--}}
{{--@endphp--}}

{{--<div id="labels">{{ json_encode($angkatans->toArray()) }}</div>--}}

{{--<script>--}}
{{--    const ctx = document.getElementById('myChart').getContext('2d');--}}

{{--    const labels = JSON.parse(document.getElementById('labels').innerText);--}}
{{--    document.getElementById('labels').remove();--}}

{{--    const data = {--}}
{{--        labels: labels,--}}
{{--        datasets: [{--}}
{{--            label: 'Grafik Pendaftaran Siswa Perangkatan',--}}
{{--            backgroundColor: ['#142F43', '#FFAB4C', '#FF5F7E', '#B000B9'],--}}
{{--            borderColor: 'rgb(255, 99, 132)',--}}
{{--            data: [--}}
{{--                @foreach($angkatans as $key => $item)--}}
{{--                @php $data[] = $siswa->where('angkatan', $item)->count(); if($key == 4) { break; } @endphp--}}
{{--                @endforeach--}}

{{--                {{ implode(",", $data) }}--}}
{{--            ],--}}
{{--        }]--}}
{{--    };--}}

{{--    const config = {--}}
{{--        type: 'bar',--}}
{{--        data: data,--}}
{{--        options: {}--}}
{{--    };--}}

{{--    const myChart = new Chart(--}}
{{--        document.getElementById('myChart'),--}}
{{--        config--}}
{{--    );--}}
{{--</script>--}}

{{--</body>--}}

{{--</html>--}}
