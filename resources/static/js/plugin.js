;(function() {
    var MyPlugin = {};
    MyPlugin.install = function(Vue) {

        function getCookie(name) {
            var COOKIE = document.cookie.split("; ");
            var i;
            for (i in COOKIE) {
                var result = COOKIE[i].split("=");
                if (result.shift() === name) {
                    return result.toString();
                }
            }
            return null;
        }

        Vue.prototype.$getUserInfo = function (item, exp = 1209600000) {
            var key = 'userInfo';
            var data = {};
            if (localStorage.getItem(key)) {
                data = localStorage.getItem(key);
            } else if (getCookie(item)) {
                return getCookie(item);
            } else {
                return false;
            }

            var dataObj = JSON.parse(data);

            if (new Date().getTime() - dataObj.time > exp) {
                return null;
            } else {
                return dataObj.data[item];
            }
        };

        Vue.prototype.$getSexClass = function (sex) {
            var ret = "";
            switch(sex) {
                case "男":
                    ret = 'sex-boy';
                    break;
                case "女":
                    ret = 'sex-girl';
                    break;
                case "保密":
                    ret = 'sex-secret';
                    break;
                case "未知":
                    ret = 'sex-unknow';
                    break;
                default:
                    ret = 'sex-unknow';
            }
            return 'sex ' + ret;
        }
    };

    if (typeof exports == "object") {
        module.exports = MyPlugin;
    } else if (typeof define == "function" && define.amd) {
        define([], function(){ return MyPlugin })
    } else if (window.Vue) {
        window.MyPlugin = MyPlugin;
        Vue.use(MyPlugin);
    }
})();