<style lang="sass" rel="scss" scoped>
    @import "../../static/sass/variables";

    #mask {
        position: fixed;
        left: 0;
        top: 0;
        z-index: 4500;
        width: 100%;
        height: 100%;
        overflow: visible;
        background: #666;
        opacity: .5;
    }
    #warp {
        position: fixed;
        left: 0;
        top: 0;
        z-index: 5000;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
    }

    .box {
        height: 450px;
        border-radius: 8px;
        box-shadow: 0 0 80px 0 rgba(0,0,0,.4);
        background: #fff;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }

    .m-box {
        margin-top: 0;
        width: 100%;
    }

    .pc-box {
        margin-top: 14vh;
        width: 650px;
    }

    .head {
        height: 38px;
        background-color: $color-blue;
        padding: 10px 15px;
    }

    .name {
        font-size: 15px;
        font-weight: 700;
        color: #fff;
    }

    .close {
        width: 20px;
        height: 20px;
        display: block;
        float: right;
        border-radius: 50%;
        background-color: #fff;
        color: $color-blue;
        font-size: 20px;
        text-align: center;
        line-height: 20px;
        cursor: pointer;
    }

    .body {
        padding: 20px 15px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .title {
        position: relative;

        input {
            font-size: 13px;
            width: 100%;
            height: 40px;
            padding-right: 80px;
        }

        span {
            position: absolute;
            right: 20px;
            top: 13px;
        }
    }

    .foot {
        padding: 0 15px 20px;
        height: 55px;
        text-align: right;

        button {
            height: 35px;
            line-height: 35px;
            width: 60px;
            margin-left: 15px;
            border-radius: 3px;
            font-size: 13px;
        }
    }

    .content {
        border-radius: 4px;
        border: 1px solid #e5e9ef;
        flex: 1;
    }

    .tip {
        margin: 15px 0 5px 5px;
        font-size: 13px;
        color: #222;
        line-height: 1.7;
        display: flex;
        justify-content: space-between;
    }
</style>

<template>
    <div>
        <div id="mask" v-show="show">
        </div>
        <div id="warp" v-show="show">
            <div :class="[ 'box', $root.$data.isMobile ? 'm-box' : 'pc-box' ]">
                <div class="head">
                    <span class="name">发帖</span>
                    <span class="close" @click="close(false)">&times;</span>
                </div>
                <div class="body">
                    <div class="title">
                        <input type="text" placeholder="标题：请将标题缩减至20字以内！" v-model="title">
                        <span class="gray-word">{{ count === 0 ? '' : count + ' / ' + '20' }}</span>
                    </div>
                    <div class="tip">
                        <span>帖子详情<span class="gray-word">（可选）：</span></span>
                    </div>
                    <div class="content">
                        <editor :option="option" :height="158" :content="content"></editor>
                    </div>
                    <div class="tip">
                        <span>选择番剧<span class="gray-word" v-if="!$root.$data.isMobile">（从你关注的动漫中选择）：</span></span>
                        <select v-model="bid">
                            <option v-for="item in bangumiList" :value="item.id">{{ item.name }}</option>
                        </select>
                    </div>
                </div>
                <div class="foot">
                    <button class="btn-gray" @click="close(false)">取消</button>
                    <button class="btn-blue" @click="store()">发布</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import editor from '../vue-input/editor.vue'

    export default {
        components: {
            editor
        },
        data () {
            return {
                show : false,
                title : "",
                content : "",
                bid: null,
                bangumiList : [],
                new : true,
                option : ['link', 'img', 'video', 'fullscreen']
            }
        },
        watch: {
            '$store.getters.isLogin' () {
                this.new = true
            }
        },
        computed: {
            count () {
                return this.title.length;
            }
        },
        methods: {
            open () {
                this.show = true;
                if (this.new) {
                    this.new = false;
                    this.getUserBangumi()
                }
            },
            close (bool) {
                this.show = false;

                if (bool) {
                    this.title = "";
                    this.content = "";
                }
            },
            getUserBangumi () {
                this.$http.post('/api/bangumi/list', {
                    id : this.$getUserInfo('zone'),
                    type : 'User',
                    offset : 0,
                    limit : 1000,
                    sortby : 'id',
                    order : 'desc'
                }).then((res) => {
                    this.bangumiList = res.data.data;

                    if (res.data.data.length === 0) {
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "你尚未关注任何动漫，无法发帖！",
                            auto: false
                        });
                    }
                }, () => {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "服务器异常，获取番剧关注列表失败！"
                    });
                });
            },
            store () {
                if (this.title.length <= 1) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "题目不能为空！"
                    });
                    return
                } else if (this.title.length > 20) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "请将题目缩减至20字以内！"
                    });
                    return
                }

                if (this.content.length === 0) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "请输入帖子内容！"
                    });
                    return
                }

                if (typeof this.bid === 'undefined') {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "请选择要发帖的番剧！"
                    });
                    return
                }

                this.$http.post('/api/post/store', {
                    name : this.title,
                    content : this.content,
                    bid : this.bid
                }).then((res) => {
                    this.$root.$refs.toast.open({
                        theme: "success",
                        content: "问题发布成功！"
                    });
                    this.$router.push({ path: '/post/' + res.body.data });
                    this.close(true);
                }, () => {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "服务器异常，发送数据失败！"
                    });
                });
            }
        }
    }
</script>