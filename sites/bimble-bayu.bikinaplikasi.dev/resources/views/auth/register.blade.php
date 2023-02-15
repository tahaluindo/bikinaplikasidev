<!DOCTYPE html>
<html dir="ltr" xml:lang="en" class="yui3-js-enabled js no-touch csstransitions" lang="en">

<head>
    <title>{{ env('APP_OBJECT_NAME') }}</title>
    <link rel="shortcut icon"
        href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/image.php/edumy/theme/1583195737/favicon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="moodle, Edumy">
    <link rel="stylesheet" type="text/css"
        href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.css">

    <style>
        #ccn_floater_container {
            display: none;
        }
    </style>

    <script async="" src="Edumy_files/google-analytics_analytics.js"></script>
    <script charset="utf-8" id="yui_3_17_2_1_1670485720659_8"
        src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?m/1583195737/core/event/event-debug.js&amp;m/1583195737/filter_mathjaxloader/loader/loader-debug.js"
        async=""></script>
    <script charset="utf-8" id="yui_3_17_2_1_1670485720659_20"
        src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?3.17.2/event-mousewheel/event-mousewheel.js&amp;3.17.2/event-resize/event-resize.js&amp;3.17.2/event-hover/event-hover.js&amp;3.17.2/event-touch/event-touch.js&amp;3.17.2/event-move/event-move.js&amp;3.17.2/event-flick/event-flick.js&amp;3.17.2/event-valuechange/event-valuechange.js&amp;3.17.2/event-tap/event-tap.js"
        async=""></script>
    <script id="firstthemesheet"
            type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script>
    <link rel="stylesheet" type="text/css"
        href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/styles.php/edumy/1583195737_1/all">
    <script type="text/javascript">
        //<![CDATA[
        var M = {};
        M.yui = {};
        M.pageloadstarttime = new Date();
        M.cfg = {
            "wwwroot": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1",
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
        var yui1ConfigFn = function(me) {
            if (/-skin|reset|fonts|grids|base/.test(me.name)) {
                me.type = 'css';
                me.path = me.path.replace(/\.js/, '.css');
                me.path = me.path.replace(/\/yui2-skin/, '/assets/skins/sam/yui2-skin')
            }
        };
        var yui2ConfigFn = function(me) {
            var parts = me.name.replace(/^moodle-/, '').split('-'),
                component = parts.shift(),
                module = parts[0],
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
            "base": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/yuilib\/3.17.2\/",
            "comboBase": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
            "combine": true,
            "filter": "RAW",
            "insertBefore": "firstthemesheet",
            "groups": {
                "yui2": {
                    "base": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/yuilib\/2in3\/2.9.0\/build\/",
                    "comboBase": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
                    "combine": true,
                    "ext": false,
                    "root": "2in3\/2.9.0\/build\/",
                    "patterns": {
                        "yui2-": {
                            "group": "yui2",
                            "configFn": yui1ConfigFn
                        }
                    }
                },
                "moodle": {
                    "name": "moodle",
                    "base": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?m\/1583195737\/",
                    "combine": true,
                    "comboBase": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
                    "ext": false,
                    "root": "m\/1583195737\/",
                    "patterns": {
                        "moodle-": {
                            "group": "moodle",
                            "configFn": yui2ConfigFn
                        }
                    },
                    "filter": "DEBUG",
                    "modules": {
                        "moodle-core-languninstallconfirm": {
                            "requires": ["base", "node", "moodle-core-notification-confirm",
                                "moodle-core-notification-alert"
                            ]
                        },
                        "moodle-core-blocks": {
                            "requires": ["base", "node", "io", "dom", "dd", "dd-scroll", "moodle-core-dragdrop",
                                "moodle-core-notification"
                            ]
                        },
                        "moodle-core-event": {
                            "requires": ["event-custom"]
                        },
                        "moodle-core-handlebars": {
                            "condition": {
                                "trigger": "handlebars",
                                "when": "after"
                            }
                        },
                        "moodle-core-lockscroll": {
                            "requires": ["plugin", "base-build"]
                        },
                        "moodle-core-popuphelp": {
                            "requires": ["moodle-core-tooltip"]
                        },
                        "moodle-core-checknet": {
                            "requires": ["base-base", "moodle-core-notification-alert", "io-base"]
                        },
                        "moodle-core-chooserdialogue": {
                            "requires": ["base", "panel", "moodle-core-notification"]
                        },
                        "moodle-core-notification": {
                            "requires": ["moodle-core-notification-dialogue", "moodle-core-notification-alert",
                                "moodle-core-notification-confirm", "moodle-core-notification-exception",
                                "moodle-core-notification-ajaxexception"
                            ]
                        },
                        "moodle-core-notification-dialogue": {
                            "requires": ["base", "node", "panel", "escape", "event-key", "dd-plugin",
                                "moodle-core-widget-focusafterclose", "moodle-core-lockscroll"
                            ]
                        },
                        "moodle-core-notification-alert": {
                            "requires": ["moodle-core-notification-dialogue"]
                        },
                        "moodle-core-notification-confirm": {
                            "requires": ["moodle-core-notification-dialogue"]
                        },
                        "moodle-core-notification-exception": {
                            "requires": ["moodle-core-notification-dialogue"]
                        },
                        "moodle-core-notification-ajaxexception": {
                            "requires": ["moodle-core-notification-dialogue"]
                        },
                        "moodle-core-tooltip": {
                            "requires": ["base", "node", "io-base", "moodle-core-notification-dialogue", "json-parse",
                                "widget-position", "widget-position-align", "event-outside", "cache-base"
                            ]
                        },
                        "moodle-core-actionmenu": {
                            "requires": ["base", "event", "node-event-simulate"]
                        },
                        "moodle-core-maintenancemodetimer": {
                            "requires": ["base", "node"]
                        },
                        "moodle-core-dragdrop": {
                            "requires": ["base", "node", "io", "dom", "dd", "event-key", "event-focus",
                                "moodle-core-notification"
                            ]
                        },
                        "moodle-core-formchangechecker": {
                            "requires": ["base", "event-focus", "moodle-core-event"]
                        },
                        "moodle-core_availability-form": {
                            "requires": ["base", "node", "event", "event-delegate", "panel",
                                "moodle-core-notification-dialogue", "json"
                            ]
                        },
                        "moodle-backup-backupselectall": {
                            "requires": ["node", "event", "node-event-simulate", "anim"]
                        },
                        "moodle-backup-confirmcancel": {
                            "requires": ["node", "node-event-simulate", "moodle-core-notification-confirm"]
                        },
                        "moodle-course-formatchooser": {
                            "requires": ["base", "node", "node-event-simulate"]
                        },
                        "moodle-course-modchooser": {
                            "requires": ["moodle-core-chooserdialogue", "moodle-course-coursebase"]
                        },
                        "moodle-course-categoryexpander": {
                            "requires": ["node", "event-key"]
                        },
                        "moodle-course-dragdrop": {
                            "requires": ["base", "node", "io", "dom", "dd", "dd-scroll", "moodle-core-dragdrop",
                                "moodle-core-notification", "moodle-course-coursebase", "moodle-course-util"
                            ]
                        },
                        "moodle-course-management": {
                            "requires": ["base", "node", "io-base", "moodle-core-notification-exception", "json-parse",
                                "dd-constrain", "dd-proxy", "dd-drop", "dd-delegate", "node-event-delegate"
                            ]
                        },
                        "moodle-course-util": {
                            "requires": ["node"],
                            "use": ["moodle-course-util-base"],
                            "submodules": {
                                "moodle-course-util-base": {},
                                "moodle-course-util-section": {
                                    "requires": ["node", "moodle-course-util-base"]
                                },
                                "moodle-course-util-cm": {
                                    "requires": ["node", "moodle-course-util-base"]
                                }
                            }
                        },
                        "moodle-form-dateselector": {
                            "requires": ["base", "node", "overlay", "calendar"]
                        },
                        "moodle-form-shortforms": {
                            "requires": ["node", "base", "selector-css3", "moodle-core-event"]
                        },
                        "moodle-form-passwordunmask": {
                            "requires": []
                        },
                        "moodle-question-preview": {
                            "requires": ["base", "dom", "event-delegate", "event-key", "core_question_engine"]
                        },
                        "moodle-question-searchform": {
                            "requires": ["base", "node"]
                        },
                        "moodle-question-chooser": {
                            "requires": ["moodle-core-chooserdialogue"]
                        },
                        "moodle-availability_completion-form": {
                            "requires": ["base", "node", "event", "moodle-core_availability-form"]
                        },
                        "moodle-availability_date-form": {
                            "requires": ["base", "node", "event", "io", "moodle-core_availability-form"]
                        },
                        "moodle-availability_grade-form": {
                            "requires": ["base", "node", "event", "moodle-core_availability-form"]
                        },
                        "moodle-availability_group-form": {
                            "requires": ["base", "node", "event", "moodle-core_availability-form"]
                        },
                        "moodle-availability_grouping-form": {
                            "requires": ["base", "node", "event", "moodle-core_availability-form"]
                        },
                        "moodle-availability_profile-form": {
                            "requires": ["base", "node", "event", "moodle-core_availability-form"]
                        },
                        "moodle-mod_assign-history": {
                            "requires": ["node", "transition"]
                        },
                        "moodle-mod_forum-subscriptiontoggle": {
                            "requires": ["base-base", "io-base"]
                        },
                        "moodle-mod_quiz-modform": {
                            "requires": ["base", "node", "event"]
                        },
                        "moodle-mod_quiz-questionchooser": {
                            "requires": ["moodle-core-chooserdialogue", "moodle-mod_quiz-util", "querystring-parse"]
                        },
                        "moodle-mod_quiz-quizbase": {
                            "requires": ["base", "node"]
                        },
                        "moodle-mod_quiz-toolboxes": {
                            "requires": ["base", "node", "event", "event-key", "io", "moodle-mod_quiz-quizbase",
                                "moodle-mod_quiz-util-slot", "moodle-core-notification-ajaxexception"
                            ]
                        },
                        "moodle-mod_quiz-autosave": {
                            "requires": ["base", "node", "event", "event-valuechange", "node-event-delegate", "io-form"]
                        },
                        "moodle-mod_quiz-dragdrop": {
                            "requires": ["base", "node", "io", "dom", "dd", "dd-scroll", "moodle-core-dragdrop",
                                "moodle-core-notification", "moodle-mod_quiz-quizbase", "moodle-mod_quiz-util-base",
                                "moodle-mod_quiz-util-page", "moodle-mod_quiz-util-slot", "moodle-course-util"
                            ]
                        },
                        "moodle-mod_quiz-util": {
                            "requires": ["node", "moodle-core-actionmenu"],
                            "use": ["moodle-mod_quiz-util-base"],
                            "submodules": {
                                "moodle-mod_quiz-util-base": {},
                                "moodle-mod_quiz-util-slot": {
                                    "requires": ["node", "moodle-mod_quiz-util-base"]
                                },
                                "moodle-mod_quiz-util-page": {
                                    "requires": ["node", "moodle-mod_quiz-util-base"]
                                }
                            }
                        },
                        "moodle-message_airnotifier-toolboxes": {
                            "requires": ["base", "node", "io"]
                        },
                        "moodle-filter_glossary-autolinker": {
                            "requires": ["base", "node", "io-base", "json-parse", "event-delegate", "overlay",
                                "moodle-core-event", "moodle-core-notification-alert",
                                "moodle-core-notification-exception", "moodle-core-notification-ajaxexception"
                            ]
                        },
                        "moodle-filter_mathjaxloader-loader": {
                            "requires": ["moodle-core-event"]
                        },
                        "moodle-editor_atto-rangy": {
                            "requires": []
                        },
                        "moodle-editor_atto-editor": {
                            "requires": ["node", "transition", "io", "overlay", "escape", "event", "event-simulate",
                                "event-custom", "node-event-html5", "node-event-simulate", "yui-throttle",
                                "moodle-core-notification-dialogue", "moodle-core-notification-confirm",
                                "moodle-editor_atto-rangy", "handlebars", "timers", "querystring-stringify"
                            ]
                        },
                        "moodle-editor_atto-plugin": {
                            "requires": ["node", "base", "escape", "event", "event-outside", "handlebars",
                                "event-custom", "timers", "moodle-editor_atto-menu"
                            ]
                        },
                        "moodle-editor_atto-menu": {
                            "requires": ["moodle-core-notification-dialogue", "node", "event", "event-custom"]
                        },
                        "moodle-report_eventlist-eventfilter": {
                            "requires": ["base", "event", "node", "node-event-delegate", "datatable", "autocomplete",
                                "autocomplete-filters"
                            ]
                        },
                        "moodle-report_loglive-fetchlogs": {
                            "requires": ["base", "event", "node", "io", "node-event-delegate"]
                        },
                        "moodle-gradereport_grader-gradereporttable": {
                            "requires": ["base", "node", "event", "handlebars", "overlay", "event-hover"]
                        },
                        "moodle-gradereport_history-userselector": {
                            "requires": ["escape", "event-delegate", "event-key", "handlebars", "io-base", "json-parse",
                                "moodle-core-notification-dialogue"
                            ]
                        },
                        "moodle-tool_capability-search": {
                            "requires": ["base", "node"]
                        },
                        "moodle-tool_lp-dragdrop-reorder": {
                            "requires": ["moodle-core-dragdrop"]
                        },
                        "moodle-tool_monitor-dropdown": {
                            "requires": ["base", "event", "node"]
                        },
                        "moodle-assignfeedback_editpdf-editor": {
                            "requires": ["base", "event", "node", "io", "graphics", "json", "event-move",
                                "event-resize", "transition", "querystring-stringify-simple",
                                "moodle-core-notification-dialog", "moodle-core-notification-alert",
                                "moodle-core-notification-warning", "moodle-core-notification-exception",
                                "moodle-core-notification-ajaxexception"
                            ]
                        },
                        "moodle-atto_accessibilitychecker-button": {
                            "requires": ["color-base", "moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_accessibilityhelper-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_align-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_bold-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_charmap-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_clear-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_collapse-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_emoticon-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_equation-button": {
                            "requires": ["moodle-editor_atto-plugin", "moodle-core-event", "io", "event-valuechange",
                                "tabview", "array-extras"
                            ]
                        },
                        "moodle-atto_html-beautify": {},
                        "moodle-atto_html-button": {
                            "requires": ["promise", "moodle-editor_atto-plugin", "moodle-atto_html-beautify",
                                "moodle-atto_html-codemirror", "event-valuechange"
                            ]
                        },
                        "moodle-atto_html-codemirror": {
                            "requires": ["moodle-atto_html-codemirror-skin"]
                        },
                        "moodle-atto_image-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_indent-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_italic-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_link-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_managefiles-usedfiles": {
                            "requires": ["node", "escape"]
                        },
                        "moodle-atto_managefiles-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_media-button": {
                            "requires": ["moodle-editor_atto-plugin", "moodle-form-shortforms"]
                        },
                        "moodle-atto_noautolink-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_orderedlist-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_recordrtc-recording": {
                            "requires": ["moodle-atto_recordrtc-button"]
                        },
                        "moodle-atto_recordrtc-button": {
                            "requires": ["moodle-editor_atto-plugin", "moodle-atto_recordrtc-recording"]
                        },
                        "moodle-atto_rtl-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_strike-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_subscript-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_superscript-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_table-button": {
                            "requires": ["moodle-editor_atto-plugin", "moodle-editor_atto-menu", "event",
                                "event-valuechange"
                            ]
                        },
                        "moodle-atto_title-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_underline-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_undo-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        },
                        "moodle-atto_unorderedlist-button": {
                            "requires": ["moodle-editor_atto-plugin"]
                        }
                    }
                },
                "gallery": {
                    "name": "gallery",
                    "base": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/yuilib\/gallery\/",
                    "combine": true,
                    "comboBase": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/theme\/yui_combo.php?",
                    "ext": false,
                    "root": "gallery\/1583195737\/",
                    "patterns": {
                        "gallery-": {
                            "group": "gallery"
                        }
                    }
                }
            },
            "modules": {
                "core_filepicker": {
                    "name": "core_filepicker",
                    "fullpath": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/javascript.php\/1583195737\/repository\/filepicker.js",
                    "requires": ["base", "node", "node-event-simulate", "json", "async-queue", "io-base",
                        "io-upload-iframe", "io-form", "yui2-treeview", "panel", "cookie", "datatable",
                        "datatable-sort", "resize-plugin", "dd-plugin", "escape", "moodle-core_filepicker",
                        "moodle-core-notification-dialogue"
                    ]
                },
                "core_comment": {
                    "name": "core_comment",
                    "fullpath": "http:\/\/demo.createdbycocoon.com\/moodle\/edumy\/1\/lib\/javascript.php\/1583195737\/comment\/comment.js",
                    "requires": ["base", "io-base", "node", "json", "yui2-animation", "overlay", "escape"]
                },
                "mathjax": {
                    "name": "mathjax",
                    "fullpath": "https:\/\/cdnjs.cloudflare.com\/ajax\/libs\/mathjax\/2.7.2\/MathJax.js?delayStartupUntil=configured"
                }
            }
        };
        M.yui.loader = {
            modules: {}
        };

        //]]>
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/bootstrap.min.css">
    <link rel="stylesheet" href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/cocoon.css">
    <link rel="stylesheet" href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/responsive.css">
    <link rel="stylesheet" href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/cocoon-mdl.css">
    <link rel="stylesheet" href="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/style/cocoon-dashboard.css">
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
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
        src="http://demo.createdbycocoon.com/moodle/edumy/1/lib/requirejs.php/1583195737/core/first.js"></script>
    <script type="text/x-mathjax-config">
MathJax.Hub.Config({
    config: ["Accessible.js", "Safe.js"],
    errorSettings: { message: ["!"] },
    skipStartupTypeset: true,
    messageStyle: "none"
});

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </script>
    <script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="jquery"
        src="http://demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/jquery/jquery-3.2.1.min.js">
    </script>
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
                    {{--                <li class="mm-listitem"> --}}
                    {{--                    <a id="drop-down-6391963c2f28d6391963c25f739" href="#" class="mm-listitem__text"> --}}
                    {{--                        Kelas --}}
                    {{--                    </a> --}}

                    {{--                </li> --}}
                    <li class="mm-listitem">
                        <a id="drop-down-6391963c2f3366391963c25f7310" href="#fasilitas" class="mm-listitem__text">
                            Fasilitas
                        </a>

                    </li>
                    {{--                <li class="mm-listitem"> --}}
                    {{--                    <a id="drop-down-6391963c2f3c56391963c25f7311" href="#" class="mm-listitem__text"> --}}
                    {{--                        Guru --}}
                    {{--                    </a> --}}

                    {{--                </li> --}}
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
                        aria-haspopup="true"><span class="mm-sronly">Close submenu</span></a><a class="mm-navbar__title"
                        href="#mm-1">
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
                            class="mm-listitem__text"><span class="title"> Home 8 (Kindergarden)</span></a></li>
                    <li class="mm-listitem"><a href="https://demo.createdbycocoon.com/moodle/edumy/9/"
                            target="_blank" "=""
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
                        <img class="nav_logo_img img-fluid" src="{{ url(json_decode($pengaturan->logo)->gambar) }}"
                             alt="Edumy">
                        <button type="button" id="menu-btn">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <a href="{{ url('') }}" class="navbar_brand float-left dn-smd">
                        <img width="50" class="logo1 img-fluid" src="{{ url(json_decode($pengaturan->logo)->gambar) }}"
                             alt="Edumy">
                        <img width="50" class="logo2 img-fluid" src="{{ url(json_decode($pengaturan->logo)->gambar) }}"
                             alt="Edumy">
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
                        {{--                <li class="mm-listitem"> --}}
                        {{--                    <a id="drop-down-6391963c2f28d6391963c25f739" href="#" class="mm-listitem__text"> --}}
                        {{--                        Kelas --}}
                        {{--                    </a> --}}

                        {{--                </li> --}}
                        <li class="mm-listitem">
                            <a id="drop-down-6391963c2f3366391963c25f7310" href="#fasilitas" class="mm-listitem__text">
                                Fasilitas
                            </a>

                        </li>
                        {{--                <li class="mm-listitem"> --}}
                        {{--                    <a id="drop-down-6391963c2f3c56391963c25f7311" href="#" class="mm-listitem__text"> --}}
                        {{--                        Guru --}}
                        {{--                    </a> --}}

                        {{--                </li> --}}
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
                                                @if (!auth()->user())
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

    <script>
        $(document).ready(function() {
            var kelas_selector = $('#kelas_id')
            var kelas_selector_option = $('#kelas_id option');
            $(document).on('change', '#jenjang_id', function(e) {
                var nama_jenjang = $('#jenjang_id').find("option:selected").text().trim();

                kelas_selector.empty();
                if (nama_jenjang == "SD") {

                    let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                        return (item.label == "I" || item.label == "II" ||
                            item.label == "III" || item.label == "IV" || item.label ==
                            "V" || item.label == "VI")
                    })

                    $.each(kelas_selector_filtered, (index, item) => {
                        kelas_selector.append(item.outerHTML);
                    });
                } else if (nama_jenjang == "SMP") {
                    let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                        return (item.label == "VII" || item.label ==
                            "VIII" || item.label == "IX")
                    })

                    $.each(kelas_selector_filtered, (index, item) => {
                        kelas_selector.append(item.outerHTML);
                    });
                } else if (nama_jenjang == "SMA") {
                    let kelas_selector_filtered = kelas_selector_option.filter((index, item) => {

                        return (item.label == "X" || item.label == "XI" ||
                            item.label == "XII")
                    })

                    $.each(kelas_selector_filtered, (index, item) => {
                        kelas_selector.append(item.outerHTML);
                    });
                }
            });
        });
    </script>

    <style>
        .invalid-feedback {
            display: block;
        }
    </style>

    </header>
    <div style="display: block; width: 1920px; height: 1px; float: none;"></div>
    <div id="page" class="stylehome1 h0">
        <div class="mobile-menu">
            <div class="header stylehome1">
                <div class="main_logo_home2">
                    <img width="50" class="nav_logo_img img-fluid float-left mt20"
                        src="{{ url(json_decode($pengaturan->logo)->gambar) }}" alt="Edumy">
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
                                            action="http://demo.createdbycocoon.com/moodle/edumy/1/login/index.php">
                                            <div class="form-group"><input type="text" name="username"
                                                    placeholder="Username" id="login_username" class="form-control"
                                                    autocomplete="username"></div>
                                            <div class="form-group"><input type="password" name="password"
                                                    id="login_password" placeholder="Password" class="form-control"
                                                    value="" autocomplete="current-password"></div>
                                            <div class="form-group custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    name="rememberusername" id="rememberusername">
                                                <label class="custom-control-label" for="rememberusername">Remember
                                                    username</label>
                                                <a class="tdu btn-fpswd float-right"
                                                    href="http://demo.createdbycocoon.com/moodle/edumy/1/login/forgot_password.php">Lost
                                                    password?</a>
                                            </div>
                                            <button type="submit" class="btn btn-log btn-block btn-thm2">Log in
                                            </button>
                                            <input type="hidden" name="logintoken"
                                                value="6rbdPMKhOGS9DBVmB0ozUs8Co922HQfH">
                                        </form>


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
            <a href="#" class="mk-fullscreen-close" id="mk-fullscreen-close-button"><i
                    class="fa fa-times"></i></a>
            <div id="mk-fullscreen-search-wrapper">
                <div id="ccn_mk-fullscreen-search-wrapper" style="top: 477.5px;">
                    <aside id="block-region-search" class="block-region" data-blockregion="search"
                        data-droptarget="1">
                        <div id="inst40" class=" block_cocoon_globalsearch block " role="complementary"
                            data-block="cocoon_globalsearch" aria-label="[Cocoon] Global search">


                            <div class="">
                                <form class="ccn-mk-fullscreen-searchform"
                                    action="http://demo.createdbycocoon.com/moodle/edumy/1/search/index.php">
                                    <fieldset><input id="searchform_search" name="q"
                                            class="ccn-mk-fullscreen-search-input" placeholder="Search courses..."
                                            type="text" size="15"><input type="hidden" name="context"
                                            value="2"><i
                                            class="flaticon-magnifying-glass fullscreen-search-icon"><input
                                                value="" type="submit" id="searchform_button"></i>
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
                                <div class="banner-style-one owl-theme owl-carousel banner-style-one--single owl-loaded owl-text-select-on"
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
                                                        <div class="home-content" id="yui_3_17_2_1_1670485720659_29">
                                                            <div class="home-content-inner text-center"
                                                                id="yui_3_17_2_1_1670485720659_42">

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
            src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/yui_combo.php?rollup/3.17.2/yui-moodlesimple.js"></script>
        <script type="text/javascript"
            src="http://demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/javascript-static.js">
        </script>
        <script type="text/javascript">
            //<![CDATA[
            document.body.className += ' jsenabled';
            //]]>
        </script>


        <div>
            <div class="container ccn_breadcrumb_widgets clearfix">
            </div>
            <aside id="block-region-fullwidth-top" class="block-region" data-blockregion="fullwidth-top"
                data-droptarget="1">
                <div id="inst122" class=" block_cocoon_contact_form block " role="complementary"
                    data-block="cocoon_contact_form">

                    <a href="#sb-2" class="sr-only sr-only-focusable">Skip Send a Message</a>


                    <div class="">

                        <section class="our-contact">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="contact_localtion text-center">
                                            <div class="icon"><span class="flaticon-placeholder-1"></span></div>
                                            <h4>Lokasi Kami</h4>
                                            <p>{{ env('APP_OBJECT_LOCATION') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="contact_localtion text-center">
                                            <div class="icon"><span class="flaticon-phone-call"></span></div>
                                            <h4>Kontak Kami</h4>
                                            <p>No Hp: {{ env('APP_OBJECT_PHONE_NUMBER') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="contact_localtion text-center">
                                            <div class="icon"><span class="flaticon-email"></span></div>
                                            <h4>Email</h4>
                                            <p>{{ env('APP_OBJECT_EMAIL') }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="offset-lg-3">

                                    </div>
                                    <div class="col-lg-6 form_grid">
                                        <h4 class="mb5">Registrasi</h4>
                                        <div class="main-form">
                                            {{-- <form action="{{ url('register') }}" method="get"
                                                enctype="multipart/form-data">
                                                <input type="hidden" name="_token"
                                                    value="JDeRUHLEgI3ylbpSCtCz7CyUceOtHRpAOTetUHsI"> <input
                                                    type="hidden" name="from_cek" value="Ya">
                                                <div class="singel-form">
                                                    <label for="nama" class="control-label">Cek Status
                                                        Registrasi</label>
                                                    <p>
                                                        <input placeholder="Nomor Registrasi, Ex: 8"
                                                            class="form-control form-control-line "
                                                            name="nomor_registrasi" type="text"
                                                            id="nomor_registrasi"
                                                            value="{{ old('nomor_registrasi') }}" required="">
                                                    </p>
                                                </div>
                                                <div class="singel-form">
                                                    <button class="btn btn-outline-warning" type="submit">Cek
                                                    </button>
                                                </div>
                                            </form> --}}
                                            <hr>
                                            {{-- <div class="tex-center">Jadwal
                                                Pendaftaran: {{ $pengaturan->batas_awal_registrasi }}
                                                s/d {{ $pengaturan->batas_akhir_registrasi }}
                                            </div>
                                            <hr> --}}

                                            @if (session()->has('error'))
                                                <div class="alert alert-danger" role="alert">
                                                    {{ session()->get('error') }}
                                                </div>
                                            @elseif(session()->has('success'))
                                                <div class="alert alert-success" role="alert">
                                                    {!! session()->get('success') !!}
                                                </div>
                                            @elseif(session()->has('warning'))
                                                <div class="alert alert-warning" role="alert">
                                                    {{ session()->get('warning') }}
                                                </div>
                                            @endif





                                            <form action="{{ url('siswa') }}" method="post"
                                                enctype="multipart/form-data">
                                                <input type="hidden" name="_token"
                                                    value="JDeRUHLEgI3ylbpSCtCz7CyUceOtHRpAOTetUHsI"> <input
                                                    type="hidden" name="from_register" value="Ya">
                                                <div class="form-group">
                                                    <label>Jenjang</label>
                                                    <select name="jenjang_id" class="form-control form-control-line"
                                                        id="jenjang_id" required="">
                                                        <option value="">--Pilih Jenjang--</option>
                                                        @foreach ($jenjang as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if (old('jenjang_id') == $item->id) selected @endif>
                                                                {{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('jenjang_id')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select name="kelas_id" class="form-control form-control-line"
                                                        id="kelas_id" required="">
                                                        @foreach ($kelas as $item)
                                                            <option value="{{ $item->id }}"
                                                                @if (old('kelas_id') == $item->id) selected @endif>
                                                                {{ $item->nama }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kelas_id')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>

                                                    <input placeholder="email" class="form-control form-control-line "
                                                        name="email" type="email" id="email"
                                                        value="{{ old('email') }}" required="">

                                                    @error('email')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Password</label>

                                                    <input placeholder="password"
                                                        class="form-control form-control-line " name="password"
                                                        type="password" id="password" value="{{ old('password') }}"
                                                        required="">

                                                    @error('password')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama</label>

                                                    <input placeholder="nama" class="form-control form-control-line "
                                                        name="nama" type="text" id="nama"
                                                        value="{{ old('nama') }}" required="">

                                                    @error('nama')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Tanggal Lahir</label>

                                                    <input placeholder="tanggal_lahir"
                                                        class="form-control form-control-line " name="tanggal_lahir"
                                                        type="date" id="tanggal_lahir"
                                                        value="{{ old('tanggal_lahir') }}" required="">

                                                    @error('tanggal_lahir')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                    <select name="jenis_kelamin"
                                                        class="form-control form-control-line" id="jenis_kelamin"
                                                        required="">
                                                        <option value="Laki - Laki"
                                                            @if (old('jenis_kelamin') == 'Laki - Laki') selected @endif>
                                                            Laki - Laki
                                                        </option>
                                                        <option value="Perempuan"
                                                            @if (old('jenis_kelamin') == 'Perempuan') selected @endif>
                                                            Perempuan
                                                        </option>
                                                    </select>
                                                    @error('jenis_kelamin')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Agama</label>
                                                    <select name="agama" class="form-control form-control-line"
                                                        id="agama" required="">
                                                        <option value="Islam"
                                                            @if (old('agama') == 'Islam') selected @endif>
                                                            Islam
                                                        </option>
                                                        <option value="Kristen Katolik"
                                                            @if (old('agama') == 'Kristen Katolik') selected @endif>
                                                            Kristen Katolik
                                                        </option>
                                                        <option value="Kristen Protestan"
                                                            @if (old('agama') == 'Kristen Protestan') selected @endif>
                                                            Kristen Protestan
                                                        </option>
                                                        <option value="Hindu"
                                                            @if (old('agama') == 'Hindu') selected @endif>
                                                            Hindu
                                                        </option>
                                                        <option value="Budha"
                                                            @if (old('agama') == 'Budha') selected @endif>
                                                            Budha
                                                        </option>
                                                    </select>
                                                    @error('agama')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                    <textarea class="form-control" rows="5" name="alamat" type="textarea" id="alamat" placeholder="alamat"
                                                        required="">{{ old('alamat') }}</textarea>

                                                    @error('alamat')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>No Hp</label>
                                                    <input placeholder="no_hp" class="form-control form-control-line "
                                                        name="no_hp" type="text" id="no_hp"
                                                        value="{{ old('no_hp') }}" required="">

                                                    @error('no_hp')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                {{-- <hr>
                                                <strong>Data Orang Tua</strong>

                                                <div class="form-group">
                                                    <label>Nama Ibu</label>

                                                    <input placeholder="nama_ibu"
                                                        class="form-control form-control-line " name="nama_ibu"
                                                        type="text" id="nama_ibu" value="{{ old('nama_ibu') }}"
                                                        required="">

                                                    @error('nama_ibu')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Pekerjaan Ibu</label>

                                                    <input placeholder="pekerjaan_ibu"
                                                        class="form-control form-control-line " name="pekerjaan_ibu"
                                                        type="text" id="pekerjaan_ibu"
                                                        value="{{ old('pekerjaan_ibu') }}" required="">

                                                    @error('pekerjaan_ibu')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Ayah</label>

                                                    <input placeholder="nama_ayah"
                                                        class="form-control form-control-line " name="nama_ayah"
                                                        type="text" id="nama_ayah" value="{{ old('nama_ayah') }}"
                                                        required="">

                                                    @error('nama_ayah')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Pekerjaan Ayah</label>

                                                    <input placeholder="pekerjaan_ayah"
                                                        class="form-control form-control-line " name="pekerjaan_ayah"
                                                        type="text" id="pekerjaan_ayah"
                                                        value="{{ old('pekerjaan_ayah') }}" required="">

                                                    @error('pekerjaan_ayah')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>


                                                <div class="form-group">
                                                    <label>Alamat Orang Tua</label>

                                                    <input placeholder="alamat_orang_tua"
                                                        class="form-control form-control-line "
                                                        name="alamat_orang_tua" type="text" id="alamat_orang_tua"
                                                        value="{{ old('alamat_orang_tua') }}" required="">

                                                    @error('alamat_orang_tua')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>No Hp Orang Tua</label>

                                                    <input placeholder="no_hp_orang_tua"
                                                        class="form-control form-control-line " name="no_hp_orang_tua"
                                                        type="text" id="no_hp_orang_tua"
                                                        value="{{ old('no_hp_orang_tua') }}" required="">

                                                    @error('no_hp_orang_tua')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div> --}}

                                                <div class="form-group">
                                                    <label>Hari Kelas</label>
                                                    <select name="hari_kelas" class="form-control form-control-line"
                                                        id="hari_kelas" required="">
                                                        <option value="Senin,Rabu,Jum'at"
                                                            @if (old('hari_kelas') == 'Laki - Laki') selected @endif>
                                                            Senin,Rabu,Jum'at
                                                        </option>
                                                        <option value="Selasa,Kamis,Sabtu"
                                                            @if (old('hari_kelas') == 'Selasa,Kamis,Sabtu') selected @endif>
                                                            Selasa,Kamis,Sabtu
                                                        </option>
                                                    </select>
                                                    @error('hari_kelas')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Jam Kelas</label>
                                                    <select name="jam_kelas" class="form-control form-control-line"
                                                        id="jam_kelas" required="">
                                                        <option value="14.00 - 15.30"
                                                            @if (old('jam_kelas') == '14.00 - 15.30') selected @endif>
                                                            14.00 - 15.30
                                                        </option>
                                                        <option value="16.00 - 17.30"
                                                            @if (old('jam_kelas') == '16.00 - 17.30') selected @endif>
                                                            16.00 - 17.30
                                                        </option>
                                                    </select>
                                                    @error('jam_kelas')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label>Mapel Pilihan</label><br>

                                                    @foreach ($mapel as $item)
                                                        @foreach ($item->mapel_details as $itemMapelDetail)
                                                            <div class="mapel_piihans_div">
                                                                <input class="mapel_pilihans" type="checkbox"
                                                                name="mapel_pilihans[]"
                                                                value="{{ $itemMapelDetail->id }}"
                                                                data-kelas-id='{{ $itemMapelDetail->kelas_id }}' />
                                                                {{ $itemMapelDetail->mapel->nama }} (Kelas:
                                                                {{ $itemMapelDetail->kelas->nama }})<br>
                                                            </div>
                                                        @endforeach
                                                    @endforeach

                                                    @error('mapel_pilihan')
                                                        <span class="invalid-feedback text-danger" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <script>
                                                    var jenjang = $('#jenjang_id');
                                                    var kelas = $('#kelas_id');
                                                    var mapel_pilihans = $('.mapel_pilihans');
                                                    var mapel_pilihans_div = $('.mapel_piihans_div');



                                                    function changeMapel() {
                                                        mapel_pilihans_div.css({
                                                            display: "inline-block"
                                                        });
                                                        $.each(mapel_pilihans, (index, item) => {
                                                            console.log(mapel_pilihans_div.eq(index)[0])
                                                            
                                                            var kelas_id = mapel_pilihans.eq(index)[0].getAttribute('data-kelas-id');

                                                            if (kelas_id != kelas.val()) {
                                                                mapel_pilihans_div.eq(index)[0].style.display = "none";
                                                            }
                                                        });
                                                    }

                                                    changeMapel();
                                                    $(document).on('change', '#kelas_id', () => {
                                                        changeMapel();
                                                    });

                                                    $(document).on('change', '#jenjang_id', () => {
                                                        changeMapel();
                                                    });
                                                </script>

                                                <div class="form-group">
                                                    <label>Berkas (Tidak Wajib)</label><br>
                                                    <label for="nama" class="control-label">Berkas Zip (foto
                                                        3x4)</label>
                                                    <p>
                                                        <input placeholder="berkas" class="" name="berkas"
                                                            type="file" id="berkas" value="">
                                                    </p>
                                                </div>

                                                @error('berkas')
                                                    <span class="invalid-feedback text-danger" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <div class="form-group">
                                                    <button type="submit" id="submit"
                                                        class="btn dbxshad btn-lg btn-thm circle white">
                                                        Registrasi
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                (function($) {
                                    var MY_MAPTYPE_ID = 'style_KINESB';

                                    function initialize() {
                                        var featureOpts = [{
                                                "featureType": "administrative",
                                                "elementType": "labels.text.fill",
                                                "stylers": [{
                                                    "color": "#666666"
                                                }]
                                            },
                                            {
                                                "featureType": 'all',
                                                "elementType": 'labels',
                                                "stylers": [{
                                                    visibility: 'simplified'
                                                }]
                                            },
                                            {
                                                "featureType": "landscape",
                                                "elementType": "all",
                                                "stylers": [{
                                                    "color": "#e2e2e2"
                                                }]
                                            },
                                            {
                                                "featureType": "poi",
                                                "elementType": "all",
                                                "stylers": [{
                                                    "visibility": "off"
                                                }]
                                            },
                                            {
                                                "featureType": "road",
                                                "elementType": "all",
                                                "stylers": [{
                                                        "saturation": -100
                                                    },
                                                    {
                                                        "lightness": 45
                                                    },
                                                    {
                                                        "visibility": "off"
                                                    }
                                                ]
                                            },
                                            {
                                                "featureType": "road.highway",
                                                "elementType": "all",
                                                "stylers": [{
                                                    "visibility": "off"
                                                }]
                                            },
                                            {
                                                "featureType": "road.arterial",
                                                "elementType": "labels.icon",
                                                "stylers": [{
                                                    "visibility": "off"
                                                }]
                                            },
                                            {
                                                "featureType": "transit",
                                                "elementType": "all",
                                                "stylers": [{
                                                    "visibility": "off"
                                                }]
                                            },
                                            {
                                                "featureType": "water",
                                                "elementType": "all",
                                                "stylers": [{
                                                        "color": "#aadaff"
                                                    },
                                                    {
                                                        "visibility": "on"
                                                    }
                                                ]
                                            }
                                        ];
                                        var myGent = new google.maps.LatLng(40.6946703, -73.9280182);
                                        var Kine = new google.maps.LatLng(40.6946703, -73.9280182);
                                        var mapOptions = {
                                            zoom: 11,
                                            mapTypeControl: true,
                                            zoomControl: true,
                                            zoomControlOptions: {
                                                style: google.maps.ZoomControlStyle.SMALL,
                                                position: google.maps.ControlPosition.LEFT_TOP,
                                                mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
                                            },
                                            mapTypeId: MY_MAPTYPE_ID,
                                            scaleControl: false,
                                            streetViewControl: false,
                                            center: myGent
                                        }
                                        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
                                        var styledMapOptions = {
                                            name: 'style_KINESB'
                                        };

                                        var image =
                                            'http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/images/resource/mapmarker.png';
                                        var marker = new google.maps.Marker({
                                            position: Kine,
                                            map: map,
                                            animation: google.maps.Animation.DROP,
                                            title: ' Collin Street West, Victor 8007, Australia.  ',
                                            icon: image
                                        });

                                        var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);
                                        map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

                                    }

                                    google.maps.event.addDomListener(window, 'load', initialize);
                                }(jQuery));
                            }, false);
                        </script>


                    </div>

                    <span id="sb-2"></span>

                </div>
            </aside>
            <div id="ccn-main-region">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-xl-12">
                            <div aria-label="Content">
                                <aside id="block-region-above-content" class="block-region"
                                    data-blockregion="above-content" data-droptarget="1"></aside>
                                <div id="ccn-main">
                                    <span class="notifications" id="user-notifications"></span>
                                    <span id="maincontent"></span>
                                    <div class="box py-3 generalbox center clearfix">
                                        <div class="no-overflow">
                                            <p><br></p>
                                            <p><br></p>
                                        </div>
                                    </div>


                                </div>
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
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a>
                                </li>
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
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery-3.3.1.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery-migrate-3.0.0.min.js">
        </script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/cocoon.preprocess.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery.mmenu.all.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/ace-responsive-menu.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/bootstrap-select.min.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/isotop.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/snackbar.min.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/simplebar.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/parallax.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/scrollto.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery-scrolltofixed-min.js">
        </script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/jquery.counterup.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/wow.min.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/progressbar.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/slider.js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/timepicker.js"></script>
        <script src="Edumy_files/js"></script>
        <script src="http://demo.createdbycocoon.com/moodle/edumy/1/theme/edumy/javascript/script.js"></script>
        <script src="Edumy_files/js.js"></script>

        <script type="text/javascript">
            //<![CDATA[
            var require = {
                baseUrl: 'http://demo.createdbycocoon.com/moodle/edumy/1/lib/requirejs.php/1583195737/',
                // We only support AMD modules with an explicit define() statement.
                enforceDefine: true,
                skipDataMain: true,
                waitSeconds: 0,

                paths: {
                    jquery: 'http://demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/jquery/jquery-3.2.1.min',
                    jqueryui: 'http://demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/jquery/ui-1.12.1/jquery-ui.min',
                    jqueryprivate: 'http://demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/requirejs/jquery-private'
                },

                // Custom jquery config map.
                map: {
                    // '*' means all modules will get 'jqueryprivate'
                    // for their 'jquery' dependency.
                    '*': {
                        jquery: 'jqueryprivate'
                    },
                    // Stub module for 'process'. This is a workaround for a bug in MathJax (see MDL-60458).
                    '*': {
                        process: 'core/first'
                    },

                    // 'jquery-private' wants the real jQuery module
                    // though. If this line was not here, there would
                    // be an unresolvable cyclic dependency.
                    jqueryprivate: {
                        jquery: 'jquery'
                    }
                }
            };

            //]]>
        </script>
        <script type="text/javascript"
            src="http://demo.createdbycocoon.com/moodle/edumy/1/lib/javascript.php/1583195737/lib/requirejs/require.min.js">
        </script>
        <script type="text/javascript">
            //<![CDATA[
            M.util.js_pending("core/first");
            require(['core/first'], function() {
                ;
                require(["media_videojs/loader"], function(loader) {
                    loader.setUp(function(videojs) {
                        videojs.options.flash.swf =
                            "http://demo.createdbycocoon.com/moodle/edumy/1/media/player/videojs/videojs/video-js.swf";
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
                });;

                M.util.js_pending('theme_boost/loader');
                require(['theme_boost/loader'], function() {
                    M.util.js_complete('theme_boost/loader');
                });
                M.util.js_pending('theme_boost/drawer');
                require(['theme_boost/drawer'], function(mod) {
                    mod.init();
                    M.util.js_complete('theme_boost/drawer');
                });;
                M.util.js_pending('core/notification');
                require(['core/notification'], function(amd) {
                    amd.init(2, []);
                    M.util.js_complete('core/notification');
                });;
                M.util.js_pending('core/log');
                require(['core/log'], function(amd) {
                    amd.setConfig({
                        "level": "trace"
                    });
                    M.util.js_complete('core/log');
                });;
                M.util.js_pending('core/page_global');
                require(['core/page_global'], function(amd) {
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
            (function() {
                Y.use("moodle-filter_mathjaxloader-loader", function() {
                    M.filter_mathjaxloader.configure({
                        "mathjaxconfig": "\nMathJax.Hub.Config({\n    config: [\"Accessible.js\", \"Safe.js\"],\n    errorSettings: { message: [\"!\"] },\n    skipStartupTypeset: true,\n    messageStyle: \"none\"\n});\n",
                        "lang": "en"
                    });
                });
                M.util.help_popups.setup(Y);
                M.util.js_pending('random6391963c25f7312');
                Y.on('domready', function() {
                    M.util.js_complete("init");
                    M.util.js_complete('random6391963c25f7312');
                });
            })();
            //]]>
        </script>

    </div>


    </div>
    </div>
    <div class="mm-wrapper__blocker mm-slideout"><a href="#mm-0"><span class="mm-sronly">Close menu</span></a>
    </div>
</body>

</html>
