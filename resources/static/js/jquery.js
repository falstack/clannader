String.prototype.trim = function() {
    return this == null ? "" : (this + "").replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "");
};

export function sexClass(sex) {
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