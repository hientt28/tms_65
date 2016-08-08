var appBuilder = function () {

    this.tooltip = function (configs) {
        if (_.isNull(configs) || _.isUndefined(configs)) {
            return;
        } else {
            for (var k in configs) {
                var config = configs[k];
                var element = config.element ? config.element : null;
                if (_.isNull(element)) {
                    return;
                }

                if (_.isFunction(element.popup)) {
                    element.popup({
                        position: config.position ? config.position : 'right center',
                        content: config.content ? config.content : ''
                    })
                }
            }
        }
    };

    this.animate = function (configs) {
        for (var k in configs) {
            var config = configs[k];
            var animate = config.animate ? config.animate : null;
            if (_.isNull(animate)) {
                continue;
            } else {
                var callback = config.callack ? config.callback : undefined;
                if (_.isUndefined(callback)) {
                    setTimeout(function () {
                        animate.transition(config.animateName);
                    }, 400);
                } else {
                    callback();
                }
            }
        }
    }

    this.utils = new function () {
        var parent = this;
        /*format data send ajax from serialize data*/
        var processData = function (data) {
            if (_.contains(data, '&')) {
                data = data.split('&');
                var obj = {};
                for (var k in data) {
                    if (_.contains(data[k], '=')) {
                        var temp = data[k].split('=');
                        if (Array.isArray(temp)) {
                            obj[temp[0]] = temp[1];
                        }
                    }
                }
                return obj;
            }
            ;
            return data;
        };
        /*common method send request with ajax*/
        this.sendData = function (config) {
            var request = $.ajax({
                url: config.url ? config.url : '/login',
                data: processData(config.data ? config.data : null),
                dataType: config.dataType ? config.dataType : 'json',
                method: config.method ? config.method : 'POST',
                complete: function (res) {
                    setTimeout(function () {
                        loading('hide');
                    }, (config.delay || 1000));
                }
            });

            request.done(function (res) {
                if (typeof config.callback === 'function') {
                    config.callback(res);
                }
            })
        };

        this.loading = function (action, delay) {
            var _loading = $('.loadingArea');
            var _delay = delay ? delay : 1;
            if (action === 'show') {
                _loading.show(_delay);
            } else {
                _loading.hide(_delay);
            }
        };

    };

    this.bindEvent = function (callback) {
        return _.isFunction(callback) ? callback() : function () {
        };
    }

};

/*init Component*/
var loginBuilder = (function (appBuilder) {
    var appLogin = new appBuilder();

    return {
        tooltip: function () {
            var configs = [
                {
                    element: $('input[name="password"]'),
                    content: 'Please enter password to login with your"s account',
                },
                {
                    element: $('input[name="email"]'),
                    content: 'Please enter email to login with your"s account',
                },
            ];
            appLogin.tooltip(configs);
        },
        animate: function () {
            appLogin.animate([{
                animate: $('.navbar-header'),
                animateName: 'jiggle'
            }]);
        },
        bindEvent: function () {
            var btnLogin = $('.btn-login');
            if (!_.isEmpty(btnLogin)) {
                btnLogin.click(function (event) {
                    var _form = $('.form-login');
                    appLogin.utils.loading('show');
                    appLogin.utils.sendData({
                        url: 'login',
                        data: _form.serialize()
                    });
                });
            }
        },
        build: function () {
            this.tooltip();
            this.animate();
            this.bindEvent();
        }
    }

}(appBuilder))

$(document).ready(function () {
    loginBuilder.build();
})

//# sourceMappingURL=all.js.map

// add CSRF /////////////////////////////////////
$.ajaxSetup({
    headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
});

// select multi
$("#data_grid").on('click', '#checkAll', function () {
    $('.case').prop('checked', this.checked);
});

$(".case").click(function () {
    if ($(".case").length == $(".case:checked").length) {
        $("#checkAll").prop("checked", "checked");
    } else {
        $("#checkAll").removeAttr("checked");
    }
});

//  Delete multi subject
$('#btn_del_subject').click(function () {
    var ids = [];
    $('.case:checked').each(function () {
        ids.push($(this).val());
    });

    if (ids.length === 0) { //tell you if the array is empty
        alert("No subjects were selected?");
    } else {
        if (!confirm("Are you sure you want to delete this?")) {
            return false;
        } else {
            $.ajax({
                url: 'subjects/delete_multi',
                type: 'POST',
                data: {id: ids},
                dateType: 'json',
                success: function (response) {
                    $('#data_grid').html(response['view']);
                    alert("Delete multi subjects success!");
                }
            });

            return true;
        }
    }
});
