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