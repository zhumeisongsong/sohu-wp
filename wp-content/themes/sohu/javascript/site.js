(function (window, document) {
    var App = window.App = {};
    var Util = App.Util = {};
    var Api = App.Api = {};
    var Config = App.Config = {};
    var Page = App.Page = {};
    var Route = App.Route = {
        top: 'sohu/',
        select: 'select',
        activities: 'activities',
        person: 'person',
        score: 'selectscore',
        input: 'selectinput',
    };
    /*
     * on domContentLoaded
     */
    $(function () {
        var pathname = window.location.href.match(".+/(.+?)([\?#;].*)?$")[1];
        //nav active
        console.log(pathname)
        Util.active(pathname);

        /*
         * all
         */
        Util.dispatcher('.', function () {
            Page.all.init();
        });

        /*
         * each page
         */
        if (pathname == Route.top) {
            Util.dispatcher(Route.top, function () {
                Config.currentPage = Route.top;
                Page.index.init();
            });
        } else if (pathname == Route.activities) {
            Util.dispatcher(Route.activities, function () {
                Config.currentPage = Route.activities;
                Page.activities.init();
            });
        } else if (pathname == Route.select) {
            Util.dispatcher(Route.select, function () {
                Config.currentPage = Route.select;
                Page.select.init();
            });
        } else if (pathname == Route.input) {
            Util.dispatcher(Route.input, function () {
                Config.currentPage = Route.input;
                Page.input.init();
            });
        }
        else if (pathname == Route.score) {
            Util.dispatcher(Route.score, function () {
                Config.currentPage = Route.score;
                Page.score.init();
            });
        }

        // dispatch
        Util.dispatcher(pathname);
    });

    Page.all = (function () {
        var init = function () {
            Util.string.path_join();
        };
        return {
            init: init
        };
    })();

    Page.index = (function () {
        var init = function () {
            mui.init();
            mui.ready(function () {
                Util.swiper();
                var ias = $.ias({
                    container: '.list-con',
                    item: '.list-item',
                    pagination: '.pagenavi-btn',
                    next: '.next-btn',
                    loader: '<img src="index.png">',
                });
                ias.extension(new IASTriggerExtension({
                    text: '加载更多',
                    // offset:0
                }));

                ias.extension(new IASSpinnerExtension());

                ias.extension(new IASNoneLeftExtension({
                    text:'没有更多数据了'
                }));
                render();
            })
        };

        var render = function () {
            Util.scroll();
            Util.go_to_detail($('.swiper-slide'));
            Util.go_to_detail($('.scroll-cell'));
            Util.go_to_detail($('.list-tap'));
        };
        return {
            init: init
        };

    })();

    Page.select = (function () {
        var init = function () {
            mui.init();
            mui.ready(function () {
                render();
            })
        };
        var render = function () {
            Util.go_to_detail($('.submit-btn'));
        };
        return {
            init: init
        };
    })();

    Page.activities = (function () {
        var init = function () {
            mui.init({
                pullRefresh: {
                    container: '#pullrefresh',
                    down: {
                        contentdown: ' ',
                        contentover: ' ',
                        contentrefresh: ' ',
                        callback: Util.refresh().pulldownRefresh
                    },
                    up: {
                        contentdown: '',
                        contentover: '',
                        contentrefresh: '',
                        callback: Util.refresh().pullupRefresh
                    }
                }
            });
            mui.ready(function () {
                mui('#pullrefresh').pullRefresh().pullupLoading();
                mui('#pullrefresh').pullRefresh().scrollTo(0, 0);
                window.scrollTo(0, 0);
                render()
            });
        };
        var render = function () {
            Util.go_to_detail($('.mui-table-view-cell'));
        };
        return {
            init: init
        };

    })();

    Page.input = (function () {
        var init = function () {
            mui.init();
            mui.ready(function () {
                render();
            })
        };
        var render = function () {
            Util.go_to_detail($('.submit-btn'));
        };
        return {
            init: init
        };
    })();

    Page.score = (function () {
        var init = function () {
            mui.init();
            mui.ready(function () {
                // var score = localStorage.getItem(select.score);
                var score = 3;
                var score_star = function (score) {
                    var i = 0;
                    var $score_key = $('.score-key');
                    var $score_info = $('.score-info');
                    var score_test = [
                        {
                            "key": "还不错",
                            "info": "快买个房子奔小康！"
                        },
                        {
                            "key": "超强",
                            "info": "财大气粗的主儿，成都70%新盘您随便选！"
                        },
                        {
                            "key": "无与伦比",
                            "info": "全城楼盘任您选，壕，我挑你肿么样！"
                        }
                    ];
                    for (i = 0; i < score; i++) {
                        $('.mui-icon-star').eq(i).addClass('mui-icon-star-filled')

                    }
                    $score_key.text(score_test[score - 3].key);
                    $score_info.text(score_test[score - 3].info);
                };
                score_star(score);
                render();
            })
        };
        var render = function () {
        };
        return {
            init: init
        };
    })();

    /*
     * dispatcher
     */
    Util.dispatcher = function (path, callback) {
        this.path_func = this.path_func || [];

        if (callback) return this.path_func.push([path, callback]);

        for (var i = 0, l = this.path_func.length; i < l; ++i) {
            var func = this.path_func[i];
            var match = path.match(func[0]);
            match && func[1](match);
        }
    };
    /*
     *active
     */
    Util.active = function (pathname) {
        if (pathname == Route.top) {
            $('.img-index').addClass('item-active')
        } else if (pathname == Route.activities) {
            $('.img-activities').addClass('item-active')
        } else if (pathname == Route.select) {
            $('.img-select').addClass('item-active')
        } else if (pathname == Route.person) {
            $('.img-person').addClass('item-active')
        }
    };
    /*
     *scroll
     */
    Util.scroll = function () {
        var scroll = function () {
            (function ($) {
                $.fn.myScroll = function (options) {
                    //默认配置
                    var defaults = {
                        speed: 40,  //滚动速度,值越大速度越慢
                        rowHeight: 24 //每行的高度
                    };

                    var opts = $.extend({}, defaults, options), intId = [];

                    function marquee(obj, step) {

                        obj.find("section").animate({
                            marginTop: '-=1'
                        }, 0, function () {
                            var s = Math.abs(parseInt($(this).css("margin-top")));
                            if (s >= step) {
                                $(this).find("div").slice(0, 1).appendTo($(this));
                                $(this).css("margin-top", 0);
                            }
                        });
                    }

                    this.each(function (i) {
                        var sh = opts["rowHeight"], speed = opts["speed"], _this = $(this);
                        intId[i] = setInterval(function () {
                            if (_this.find("section").height() <= _this.height()) {
                                clearInterval(intId[i]);
                            } else {
                                marquee(_this, sh);
                            }
                        }, speed);

                        _this.hover(function () {
                            clearInterval(intId[i]);
                        }, function () {
                            intId[i] = setInterval(function () {
                                if (_this.find("section").height() <= _this.height()) {
                                    clearInterval(intId[i]);
                                } else {
                                    marquee(_this, sh);
                                }
                            }, speed);
                        });

                    });

                }

            })(jQuery);
            var $container = $('#scroll_con');
            $container.myScroll({
                speed: 70, //数值越大，速度越慢
                rowHeight: 24 //li的高度
            });
        };
        return {
            scroll: scroll()
        }
    };
    /*
     *search
     */
    Util.search = function ($) {
        var search = function () {
            $('.nav-search').on('tap', function () {
                mui.openWindow({
                    url: 'search.html',
                    id: 'search',
                    extras: {
                        'type': "news"
                    }
                })
            });
        };
        return {
            search: search
        };
    }(jQuery);
    /*
     *refresh
     */
    Util.refresh = function () {
        /**
         * 下拉刷新具体业务实现
         */
        var pulldownRefresh = function () {
            window.location.reload();
            mui('#pullrefresh').pullRefresh().endPulldownToRefresh();
        };
        var count = 0;
        /**
         * 上拉加载具体业务实现
         */
        var pullupRefresh = function () {

            //list_old = content_list;
            var up_count = 3;
            mui('#pullrefresh').pullRefresh().endPullupToRefresh((++count > up_count)); //参数为true代表没有更多数据了。
        };
        return {
            pullupRefresh: pullupRefresh,
            pulldownRefresh: pulldownRefresh
        }
    };
    /*
     *swiper
     */
    Util.swiper = function () {
        var swiper_init = function () {
            var mySwiper = new Swiper('.swiper-container', {
                autoplay: 5000,
                pagination: '.swiper-pagination',
                // loop : true,
                preloadImages: false,
                updateOnImagesReady: true,
                observer: true,
                observeParents: true,
                lazyLoading: true,
                lazyLoadingOnTransitionStart: true,
                lazyLoadingInPrevNext: true
            })
        };
        return {
            swiper_init: swiper_init()
        }
    };
    /*
     * String helper
     */
    Util.string = (function () {
        return {
            path_join: function () {
                String.prototype.path_join = function () {
                    var current = this,
                        args = Array.prototype.slice.call(arguments);

                    args.forEach(function (elem, i) {

                        var ending = current[current.length - 1],
                            starting = elem[0];

                        if (ending !== '/')
                            current = current + '/';

                        if (starting === '/')
                            current += elem.substring(1);
                        else
                            current += elem
                    });

                    return current
                };
            },
            format: function () {
                String.prototype.format = function () {
                    var formatted = this;
                    for (var i = 0; i < arguments.length; i++) {
                        var regexp = new RegExp('\\{' + i + '\\}', 'gi');
                        formatted = formatted.replace(regexp, arguments[i])
                    }
                    return formatted
                };
            },
            insert: function () {
                Array.prototype.insert = function (index, item) {
                    this.splice(index, 0, item);
                };
            }
        }

    })();
    Util.url = (function () {

        return {
            /*
             * @param {Object} hash
             */
            getHash: function () {
                var path = location.hash,
                    hash = {},
                    param = [],
                    tmp = [];
                if (!path || !/^\#.*=.*/.test(path)) {
                    return hash;
                }

                path = path.substr(1);
                param = path.split(/&/g);

                _.each(param, function (item) {
                    tmp = item.split(/=/);
                    hash[tmp[0]] = decodeURI(tmp[1]);
                    // query[tmp[0]] = tmp[1];
                });

                return hash;
            },

            /*
             * @param {String} path
             * @param {Object} query
             */
            getQuery: function (path) {
                var query = {},
                    param = [],
                    tmp = [];

                if (!path || !/^\?.*=.*/.test(path)) {
                    return query;
                }

                path = path.substr(1);
                param = path.split(/&/g);

                _.each(param, function (item, index) {
                    tmp = item.split(/=/);
                    query[tmp[0]] = decodeURI(tmp[1]);
                    // query[tmp[0]] = tmp[1];
                });

                return query;
            },
            /*
             * @param {Object} query
             * @param {String} path
             */
            setQuery: function (query) {
                var path = "?";
                _.each(query, function (value, key, index) {
                    path += key + '=' + value + '&';
                });
                path = path.substr(0, (path.length - 1));
                return path;
            },


            getLastPath: function () {
                return location.pathname.split('/').pop();
            },

            /*
             *
             */
            concatPath: function (path1, path2) {
                var path1Flag = path1.substr(-1, 1) === '/' ? true : false,
                    path2Flag = path2.substr(0, 1) === '/' ? true : false,
                    concatPath = '';

                if (path1Flag === true && path2Flag === true) {
                    concatPath = path1 + path2.substr(1);
                } else if (path1Flag === true || path2Flag === true) {
                    concatPath = path1 + path2;
                } else {
                    concatPath = path1 + '/' + path2;
                }

                return concatPath;
            }

        };
    })();
    /*
     *detail
     */
    Util.go_to_detail = function ($cell) {
        $cell.on('tap', function () {
            event.stopPropagation();
            var url = $(this).data('href');
            mui.openWindow({
                url: url,
                id: 'detail'
            })
        });
    };

})(window, document);

