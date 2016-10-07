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
        Vue.prototype.$diffForHumans = function (time) {
            var timestamp = Date.parse(time.replace(/-/gi,"/"));
            var minute = 1000 * 60;
            var hour = minute * 60;
            var day = hour * 24;
            var month = day * 30;
            var now = new Date().getTime();
            var diffValue = now - timestamp;
            if (diffValue < 0) return;
            var monthC =diffValue / month;
            var weekC =diffValue / (7 * day);
            var dayC =diffValue / day;
            var hourC =diffValue / hour;
            var minC =diffValue / minute;
            var result = "";
            if (monthC >= 1) {
                result = "" + parseInt(monthC) + "月前";
            } else if (weekC >= 1) {
                result = "" + parseInt(weekC) + "周前";
            } else if (dayC >= 1) {
                result = "" + parseInt(dayC) + "天前";
            } else if (hourC >= 1) {
                result = "" + parseInt(hourC) + "小时前";
            } else if (minC >= 1) {
                result = "" + parseInt(minC) + "分钟前";
            } else {
                result = "刚刚";
            }
            return result;
        };
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