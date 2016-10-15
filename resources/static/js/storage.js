export function setLocalStorageForce(key, value) {
    var curTime = new Date().getTime();
    localStorage.setItem(key, JSON.stringify({data:value, time:curTime}));
}

export function setLocalStorageIfNotExist(key, value) {
    var data = localStorage.getItem(key);
    if (data) {
        return false;
    } else {
        setLocalStorageForce(key, value);
    }
}

export function setUserInfo(infoObject, remember) {
    if (remember) {
        setLocalStorageForce('userInfo', infoObject);
    } else {
        var key;
        for (key in infoObject) {
            setCookie(key, infoObject[key]);
        }
    }
}

export function setUserInfoItem(key, value) {
    if (isRemember()) {
        var userInfo = JSON.parse(localStorage.getItem("userInfo")).data;
        userInfo[key] = value;
        setLocalStorageForce('userInfo', userInfo);
    } else {
        setCookie(key, value);
    }
}

function isRemember () {
    return getCookie('zone') === null;
}

export function clearUserInfo() {
    localStorage.removeItem('userInfo');
}

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

function setCookie(name, value) {
    document.cookie = name + '=' + value;
}