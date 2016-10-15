<style lang="sass" rel="scss">
    @import '../../static/sass/variables';

    $new-height : 86px;
    $new-foot-height : 20px;
    $new-foot-margin : 8px;

    .comment-new {
        border: 1px solid $color-gray-hover;
        margin: 30px 0;
    }

    .reply-box {
        border: 1px solid $color-gray-hover;
        height: $new-height;
        margin: 20px 0 10px;
    }

    .comment-warp {
        display: flex;
        height: $new-foot-height;
        margin: 0 12px $new-foot-margin;
        justify-content: space-between;
    }

    .comment-text {
        font-size: 14px;
        height: $new-height - $new-foot-height - $new-foot-margin;
        line-height: 20px;
        color: #555555;
        border: none;
        width: 100%;
    }

    .comment-msg {
        color: $color-help;
        margin-left: 10px;
        font-size: 12px;
    }

    .comment-box {
        margin-left: 85px;
        position: relative;
        border-top: 1px solid $color-gray-hover;
        padding: 22px 0 14px 0;

        .uface {
            position: absolute;
            left: -85px;
            width: 48px;
            height: 48px;
            border: 1px solid $color-gray-hover;
        }

        &:first-child {
            border-top: none;
        }

        &:hover {
            .comment-hover {
                display: inline-block;
            }
        }
    }

    .comment-header {
        line-height: 18px;
        padding-bottom: 4px;
    }

    .comment-name {
        font-weight: bold;
        font-size: 12px;
    }

    .comment-content {
        line-height: 20px;
        padding: 2px 0;
        font-size: 14px;
        min-height: 24px;
        color: #222;
    }

    .comment-footer {
        line-height: 26px;
        color: $color-gray-word;
        font-size: 12px;

        button {
            color: $color-gray-word;
            padding: 0 5px;
            margin-left: 15px;
        }

        .comment-time {
            padding: 0 5px;
            margin-left: 15px;
        }
    }

    .comment-hover {
        display: none;
    }

    .comment-reply {
        padding-left: 85px;

        >div {
            margin-bottom: 10px;

            &:hover {
                .comment-hover {
                    display: inline-block;
                }
            }
        }

        .reply-header {
            display: flex;
            justify-content: flex-start;
            align-items: center;

            span {
                font-size: 12px;
            }
        }

        .uface {
            width: 24px;
            height: 24px;
            border: 1px solid $color-gray-hover;
            margin-right: 10px;
        }
    }

    .reply-footer {
        display: flex;
        flex-direction: column;

        img {
            width: 24px;
            height: 24px;
            border: 1px solid $color-gray-hover;
            border-radius: 50%;
            margin-right: 10px;
        }

        input {
            flex: 1;
            color: #555555;
            font-size: 14px;
        }

        >div {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;

            .gray-word {
                margin-left: 34px;
            }
        }
    }
</style>

<template>
    <div>
        <div class="comment-new" ref="news">
            <editor :width="665" :height="500" :content="content" v-if="rich"></editor>
            <textarea class="comment-text" maxlength="50" :placeholder="placeholder" @click="msg = ''" v-model="content" v-else></textarea>
            <div class="comment-warp">
                <div>
                    <span class="gray-word" v-if="!rich">{{ count(content) }} / 50</span>
                    <span class="comment-msg">{{ msg }}</span>
                </div>
                <button class="btn-bean btn-blue" @click="commentStore($event)">发表</button>
            </div>
        </div>
        <div class="comment-list">
            <div class="comment-item" v-for="(item, index) in list">
                <div class="comment-box">
                    <router-link class="uface" :to="'/people/' + item.uHome"><img :src="item.uFace"></router-link>
                    <div class="comment-header">
                        <router-link class="comment-name black-href" :to="'/people/' + item.uHome">{{ item.uName }}</router-link>
                        <span class="gray-word">{{ master === item.uHome ? '(楼主)' : '' }}</span>
                        <span class="dot" v-if="item.uWord"></span>
                        <span class="gray-word">{{ item.uWord }}</span>
                    </div>
                    <div class="comment-content article" v-html="item.content">
                    </div>
                    <div class="comment-footer">
                        <span>#{{ item.id }}</span>
                        <span class="comment-time">{{ item.time }}</span>
                        <button @click="agree($event, item)"><span>{{ item.hasLike ? '已赞' : '赞' }}</span>({{ item.like }})</button>
                        <button @click="getReplyList($event, item)">{{ item.show ? '收起回复' : item.talk ? item.talk + ' 条回复' : '添加回复' }}</button>
                        <button class="comment-hover" @click="destoryComment($event, item, index)" v-if="item.isMe">删除</button>
                    </div>
                </div>
                <div class="comment-reply" v-if="item.show">
                    <div v-for="(reply, dito) in item.replyList">
                        <div class="reply-header">
                            <router-link class="uface" :to="'/people/' + item.uHome"><img :src="reply.uFace"></router-link>
                            <router-link class="comment-name black-href" :to="'/people/' + reply.uHome">{{ reply.uName }}</router-link>
                            <span class="gray-word">{{ master === reply.uHome ? '(楼主)' : reply.uHome === item.uHome ? '(层主)' : '' }}</span>
                            <span class="gray-word">&nbsp;回复&nbsp;</span>
                            <router-link class="comment-name black-href" :to="'/people/' + reply.tHome">{{ reply.tName }}</router-link>
                            <span class="gray-word">{{ master === reply.tHome ? '&nbsp;(楼主)' : reply.tHome === item.uHome ? '&nbsp;(层主)' : '' }}</span>
                        </div>
                        <div class="comment-content article" v-html="reply.content">
                        </div>
                        <div class="comment-footer">
                            <span>{{ reply.time }}</span>
                            <button @click="agree($event, reply)"><span>{{ reply.hasLike ? '已赞' : '赞' }}</span>({{ reply.like }})</button>
                            <button class="comment-hover" @click="destoryReply($event, item, reply, dito)" v-if="reply.isMe">删除</button>
                            <button @click="reply.show = !reply.show" v-else>回复</button>
                        </div>
                        <div class="reply-footer" v-if="reply.show">
                            <div>
                                <img :src="$getUserInfo('avatar')">
                                <input type="text" maxlength="20" v-model="reply.replyText" autofocus="autofocus">
                            </div>
                            <div>
                                <span class="gray-word">{{ count(reply.replyText) }} / 20</span>
                                <div>
                                    <button class="btn-bean btn-gray" @click="reply.show = false">取消</button>
                                    <button class="btn-bean btn-blue" @click="reReply($event, item, reply)">发表</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="reply-box" v-if="!item.isMe">
                        <textarea class="comment-text" maxlength="50" placeholder="留下你的回复..." @click="item.msg = ''" v-model="item.replyText"></textarea>
                        <div class="comment-warp">
                            <div>
                                <span class="gray-word">{{ count(item.replyText) }} / 50</span>
                                <span class="comment-msg">{{ item.msg }}</span>
                            </div>
                            <button class="btn-bean btn-blue" @click="reply($event, item)">发表</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="babel">

    import editor from '../vue-input/editor.vue'

    export default {
        components : {
            editor
        },
        props: {
            placeholder: {
                default : "留下你的回复..."
            },
            master : {
                default : null
            },
            type : {
                type : String,
                required : true
            },
            id: {
                default : null,
                required : true
            },
            rich: {
                default : false
            }
        },
        watch: {
            '$route' () {
                this.init();
            }
        },
        data () {
            return {
                list : [],
                msg : "",
                content : ""
            }
        },
        created () {
            this.init();
        },
        methods: {
            count (item) {
                return item.length
            },
            init () {
                this.$http.post('/api/comment/list', {
                    id : this.id,
                    type : this.type
                }).then((res) => {
                    var i;
                    for (i in res.body.data) {
                        res.body.data[i].show = false;
                        res.body.data[i].replyList = [];
                        res.body.data[i].replyText = "";
                        res.body.data[i].msg = "";
                    }
                    this.list = res.body.data;
                });
            },
            getReplyList (el, item) {
                if (item.show) {
                    item.show = false;
                } else {
                    if (item.replyList.length || !item.talk) {
                        item.show = true;
                    } else {
                        var button = el.currentTarget;
                        button.setAttribute('disabled', 'disabled');
                        this.$http.post('/api/comment/list', {
                            id : item.id,
                            type : 'Comment'
                        }).then((res) => {
                            var i;
                            for (i in res.body.data) {
                                res.body.data[i].show = false;
                                res.body.data[i].replyText = "";
                                item.replyList.push(res.body.data[i])
                            }
                            item.show = true;
                            button.removeAttribute('disabled');
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，获取数据失败！"
                            });
                        });
                    }
                }
            },
            commentStore (el) {
                if (this.$store.getters.isLogin) {
                    if (this.content.length === 0) {
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "输入不能为空！"
                        });
                        return
                    }
                    if (this.content.length > 50 && !this.rich) {
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "输入过长！"
                        });
                        return
                    }
                    var button = el.currentTarget;
                    button.setAttribute('disabled', 'disabled');

                    this.$http.post('/api/comment/store', {
                        content : this.content.replace('\n','<br />'),
                        id : this.id,
                        type : this.type
                    }).then((res) => {
                        res.body.data.show = false;
                        res.body.data.replyList = [];
                        this.list.push(res.body.data);
                        this.content = "";
                        button.removeAttribute('disabled');
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，发送回复失败！"
                        });
                    });
                } else {
                    this.$root.$refs.navsign.showLogin();
                }
            },
            destoryComment (el, item, index) {
                if (this.$store.getters.isLogin) {
                    var btn = el.currentTarget;
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/comment/delete', {
                        id : item.id
                    }).then(() => {
                        this.list.splice(index, 1)
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，回复删除失败！"
                        });
                    });
                } else {
                    this.$root.$refs.navsign.showLogin();
                }
            },
            destoryReply (el, item, reply, index) {
                if (this.$store.getters.isLogin) {
                    var btn = el.currentTarget;
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/comment/delete', {
                        id : reply.id
                    }).then(() => {
                        item.replyList.splice(index, 1)
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，回复删除失败！"
                        });
                    });
                } else {
                    this.$root.$refs.navsign.showLogin();
                }
            },
            agree (el, item) {
                if (this.$store.getters.isLogin) {
                    if (item.isMe) {
                        this.$root.$refs.toast.open({
                            theme: "warning",
                            content: "不能为自己点赞！"
                        });
                    } else {
                        var button = el.currentTarget;
                        button.setAttribute('disabled', 'disabled');
                        item.hasLike ? item.like-- : item.like++;
                        item.hasLike = !item.hasLike;
                        this.$http.post('/api/like', {
                            id : item.id,
                            type : 'Comment'
                        }).then(() => {
                            button.removeAttribute('disabled');
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    }
                } else {
                    this.$root.$refs.navsign.showLogin();
                }
            },
            reply (el, item) {
                if (this.$store.getters.isLogin) {
                    if (item.replyText.length === 0) {
                        item.msg = "输入不能为空！"
                    } else if (item.replyText.length > 50) {
                        item.msg = "输入过长";
                    } else {
                        var button = el.currentTarget;
                        button.setAttribute('disabled', 'disabled');
                        this.$http.post('/api/comment/reply', {
                            content : item.replyText.replace('\n','<br />'),
                            id : item.id,
                            target : item.id
                        }).then((res) => {
                            item.replyList.push(res.body.data);
                            item.replyText = "";
                            button.removeAttribute('disabled');
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    }
                } else {
                    this.$root.$refs.navsign.showLogin();
                }
            },
            reReply (el, item, reply) {
                if (this.$store.getters.isLogin) {
                    if (reply.replyText.length !== 0 && reply.replyText.length < 21) {
                        var button = el.currentTarget;
                        button.setAttribute('disabled', 'disabled');
                        this.$http.post('/api/comment/reply', {
                            content : reply.replyText.replace('\n','<br />'),
                            id : item.id,
                            target : reply.id,
                            type : 'Comment'
                        }).then((res) => {
                            item.replyList.push(res.body.data);
                            reply.show = false;
                            reply.replyText = "";
                            button.removeAttribute('disabled');
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    }
                } else {
                    this.$root.$refs.navsign.showLogin();
                }
            }
        }
    }
</script>