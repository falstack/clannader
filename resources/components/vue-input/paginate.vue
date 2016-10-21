<style lang="sass" rel="scss">
    $page-item-size: 30px;

    $color-gray-light: #f6f9fa;
    $color-gray-word : #99a2aa;

    $color-blue: #00bfef;
    $color-blue-hover: #00a7de;

    #vue-paginate {

        #total-sort {
            padding: 10px 0;
            margin-bottom: 10px;
            line-height: 24px;
            display: flex;

            .total {
                font-weight: 700;
                font-size: 14px;
                color: #000;
            }

            .sort {
                position: absolute;
                right: 9px;
                color: $color-gray-word;
                font-size: 13px;
                line-height: 24px;

                &:hover {
                    border-color: $color-gray-light;
                }
            }
        }

        #paginate {
            display: flex;
            justify-content: center;
            margin-top: 10px;

            div {
                display: flex;
                box-sizing: border-box;
            }

            .block {
                width: $page-item-size;
                height: $page-item-size;
                margin-right: 5px;
                border: 1px solid #fff;
            }

            .warp {
                width: 37px * 5;
                overflow: hidden;
                position: relative;
            }

            .box {
                position: absolute;
            }

            span {
                display: block;
                width: $page-item-size;
                height: $page-item-size;
                border-radius: 50%;
                background-color: #fff;
                border-width: 1px;
                border-style: solid;
                border-color: $color-blue;
                color: $color-blue;
                cursor: pointer;
                text-align: center;
                font-size: 12px;
                line-height: $page-item-size;
                transition: .2s;
                flex-shrink: 0;
                margin: 0 5px 0 0;
                padding: 0;

                &:hover {
                    border-color: $color-blue-hover;
                    background-color: $color-blue-hover;
                    color: #fff;
                    transition: 0s;
                }
            }

            .now {
                border-color: $color-blue-hover;
                background-color: $color-blue-hover;
                color: #fff;
            }

            em {
                height: $page-item-size;
                width: $page-item-size;
                border: 1px solid $color-blue;
                color: $color-blue;
                line-height: $page-item-size;
                margin-right: 5px;
                border-radius: 50%;
                text-align: center;
                cursor: default;
                font-style: normal;
            }
        }
    }
</style>

<script lang="babel">

    export default {
        props: {
            template : {
                required : true,
                default : null,
                type : String
            },
            init : {
                required : true,
                type : Object
            }
        },
        template:
        "<div id='vue-paginate'>" +
            "<div v-if='total' id='total-sort'>" +
                "<span class='total'>共 {{ total }} {{ words }}</span>" +
                "<select class='sort' v-model='sortby' @change='listReset' v-if='sorts.length'>" +
                    "<option v-for='item in sorts' :value='item.val'>{{ item.name }}</option>" +
                "</select>" +
            "</div>" +
            "<item></item>" +
            "<div id='paginate' v-if='page'>" +
                "<span v-if='now !== 1' @click='jumpPage(now - 1)'>«</span>" +
                "<div class='block' v-else></div>" +
                "<em v-if='5 < page && now + 1 > page / 2'>···</em>" +
                "<div class='warp' v-if='page > 5' ref='pageswarp'>" +
                    "<div class='box' ref='pages'>" +
                        "<span :class=\"now === item ? 'now' : ''\" v-for='item in page' @click='jumpPage(item)'>{{ item }}</span>" +
                    "</div>" +
                "</div>" +
                "<div v-else>" +
                    "<span :class=\"now === item ? 'now' : ''\" v-for='item in page' @click='jumpPage(item)'>{{ item }}</span>" +
                "</div>" +
                "<em v-if='5 < page && now < page / 2'>···</em>" +
                "<span v-if='now !== page' @click='jumpPage(now + 1)'>»</span>" +
                "<div class='block' v-else></div>" +
            "</div>" +
        "</div>",
        data () {
            return {
                list : [],
                total : 0,
                page : 0,
                now : 1,
                max : 1,
                order : 'desc',
                sortby : 'updated_at',
                limit : 10,
                id : undefined,
                api : null,
                sorts : [
                    {
                        val : "updated_at",
                        name : "最新动态"
                    },
                    {
                        val : "like",
                        name : "最多喜欢"
                    },
                    {
                        val : "talk",
                        name : "最多回复"
                    }
                ],
                type : undefined,
                res : {
                    data : 'data',
                    total : 'meta.total'
                },
                words : "篇",
                isGet : true
            }
        },
        watch: {
            '$route' () {
                this.getDatas(this.limit)
            }
        },
        created () {
            if (this.initData(this.init)) {
                this.getDatas(this.limit)
            }
        },
        computed: {
            orderFilter () {
                let limit = this.limit;
                let now = this.now;
                return _.orderBy(this.list, this.sortby, this.order).slice(limit * (now - 1), limit * now)
            }
        },
        methods: {
            postFilter (val) {
                let pics = val.match(/<img(\w|\W)*?\/>/g);
                // 没有图片, 正常显示
                if (pics === null) {
                    return val;
                // 有图片, 格式处理
                } else {
                    let str = "<ul>";
                    let i;
                    for (i in pics) {
                        str += "<li>" + pics[i] + "</li>"
                    }
                     str += "</ul>";
                    // 图片前有文字
                    if (val.split('<p><img').shift().length) {
                        return val.split('<p><img').shift() + str;
                    // 图片前没有文字
                    } else {
                        return str
                    }
                }
            },
            initData (obj) {

                if (this.template === null) {
                    console.error('vue-paginate: ' + '没有传递模板');
                    return false
                }

                this.$options.template = this.$options.template.split('<item>').shift() + this.template + this.$options.template.split('</item>').pop();

                if (obj === undefined) {
                    console.error('vue-paginate: ' + '未定义初始化数据');
                    return false
                }

                if (typeof obj.api === 'string') {
                    this.api = obj.api
                } else {
                    console.error('vue-paginate: ' + '未定义数据请求接口');
                    return false
                }

                if (typeof obj.sorts === 'object') {
                    this.sorts = obj.sorts
                }
                
                if (['desc', 'asc'].indexOf(obj.order) !== -1) {
                    this.order = obj.order
                }
                
                if (obj.sortby !== undefined) {
                    this.sortby = obj.sortby;
                }

                if (typeof obj.words === 'string') {
                    this.words = obj.words
                }

                if (typeof obj.limit === 'number' && obj.limit > 0) {
                    this.limit = obj.limit
                }

                if (typeof obj.isGet === 'boolean') {
                    this.isGet = obj.isGet
                }

                this.id = obj.id;

                this.type = obj.type;

                return true
            },
            getDatas (limit) {
                if (this.isGet) {
                    this.$http.get(this.api, { params : {
                        id : this.id,
                        type : this.type,
                        limit : limit,
                        offset : this.list.length,
                        sortby : this.sortby,
                        order : this.order
                    }}).then((res) => {
                        this.loadData(res)
                    }, (res) => {
                        if (res.status === 404) {
                            console.error('vue-paginate: ' + '后台数据接口地址错误')
                        }
                        else if (res.status === 500) {
                            console.error('vue-paginate: ' + '后台数据接口参数有误')
                        }
                    });
                } else {
                    this.$http.post(this.api, {
                        id : this.id,
                        type : this.type,
                        limit : limit,
                        offset : this.list.length,
                        sortby : this.sortby,
                        order : this.order
                    }).then((res) => {
                        this.loadData(res)
                    }, (res) => {
                        if (res.status === 404) {
                            console.error('vue-paginate: ' + '后台数据接口地址错误')
                        }
                        else if (res.status === 500) {
                            console.error('vue-paginate: ' + '后台数据接口参数有误')
                        }
                    });
                }
            },
            loadData (res) {
                if (this.list.length) {
                    let i;
                    for (i in res.body.data) {
                        this.list.push(res.body.data[i])
                    }
                } else {
                    if (Object.getByKeyChain(res.body, this.res.data) === undefined) {
                        console.error('vue-paginate: ' + 'data解析格式不正确');
                        return
                    }

                    if (Object.getByKeyChain(res.body, this.res.total) === undefined) {
                        console.error('vue-paginate: ' + 'total解析格式不正确');
                        return
                    }

                    this.list = Object.getByKeyChain(res.body, this.res.data);
                    this.total = Object.getByKeyChain(res.body, this.res.total);
                    let temp = this.total / this.limit;
                    this.page = temp > 1 ? (temp) % 1 === 0 ? temp : parseInt(temp) + 1 : 0;

                    if (this.sorts !== null && res.body.data.length) {
                        let j;
                        for (j in this.sorts) {
                            let key = this.sorts[j].val;
                            if (this.list[0][key] === undefined) {
                                console.error('vue-paginate: ' + '自定义排序字段不存在[' + key + ']')
                            }
                        }
                    }
                }
            },
            jumpPage (arg) {
                // 如果点击的按钮是当前页 return
                if (arg === this.now) return;
                // 保存之前的页值和差值
                let old = this.now;
                let page = this.page;
                let flag = arg - old;
                // 大于5页时数字移动, 左边省略号显示, 并且向上翻页
                if (5 < page && old + 1 > page / 2 && flag < 0 && old < parseInt(this.total / this.limit)) {
                    // 向下翻页
                    let box = this.$refs.pages;
                    box.style.left = box.offsetLeft - this.$refs.pageswarp.offsetWidth / 5 * (arg - old) + "px";
                }
                // 如果前进
                if (arg > old && arg > this.max) {
                    // 获取数据的数量
                    this.getDatas(flag * this.limit);
                    // 修改最大获取量
                    this.max = arg;
                }
                // 修改目前页
                this.now = arg;
                // 大于5页时数字移动, 左边省略号显示, 并且向下翻页
                if (5 < page && arg + 1 > page / 2 && flag > 0 && arg < parseInt(this.total / this.limit)) {
                    let box = this.$refs.pages;
                    box.style.left = box.offsetLeft - this.$refs.pageswarp.offsetWidth / 5 * (arg - old) + "px";
                }
            },
            listReset () {
                // 跳到第一页
                this.now = 1;
                // 若未获取到全部的数据
                if (this.list.length < this.total) {
                    // 重置最大获取量
                    this.max = 1;
                    // 清空list
                    this.list = [];
                    // 初始化数据
                    this.getDatas(this.limit)
                }
            }
        }
    }

    // by Tomoe
    Object.getByKeyChain = function(obj, keyChain) {
        var keys = keyChain.split('.');
        for (var i = 0, n = keys.length; i < n; ++i) {
            var key = keys[i];
            if (key in obj) {
                obj = obj[key];
            } else {
                return;
            }
        }
        return obj;
    }
</script>