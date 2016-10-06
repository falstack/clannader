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

export function clearUserInfo() {
    localStorage.removeItem('userInfo');
}

function setCookie(name, value) {
    document.cookie = name + '=' + value;
}