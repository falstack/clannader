function setLocalStorageForce(key, value) {
    var curTime = new Date().getTime();
    localStorage.setItem(key, JSON.stringify({data:value, time:curTime}));
}

export function setUserInfo(infoObject, remember) {
    if (remember) {
        setLocalStorageForce('userInfo', infoObject);
    } else {
        $.each(infoObject, function (key, value) {
            setCookie(key, value);
        });
    }
}

export function getUserInfo(item, exp = 1209600000) {
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

export function clearUserInfo() {
    localStorage.removeItem('userInfo');
}

function setCookie(name, value) {
    document.cookie = name + '=' + value;
}

function getCookie(name) {
    var COOKIE = document.cookie.split("; ");
    for (var i=0; i < COOKIE.length; i++) {
        var result = COOKIE[i].split("=");
        if (result.shift() === name) {
            return result;
        }
    }
    return null;
}