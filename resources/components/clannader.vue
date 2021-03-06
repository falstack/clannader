<style lang="sass" rel="scss" scoped>
    #app {
        display: flex;
        min-height: 100vh;
        background-color: #fff;
        flex-direction: column;
    }
</style>

<template>
    <div id="app">
        <navbar ref="navbar"></navbar>
        <banner v-show="load" ref="banner"></banner>
        <router-view></router-view>
        <bottom v-show="load && !isMobile" ref="bottom"></bottom>

        <music v-if="lazy && !isMobile" :source="source" ref="music"></music>
        <navsign v-if="lazy" ref="navsign"></navsign>
        <toast v-if="lazy" ref="toast"></toast>
        <top v-if="lazy && !isMobile"></top>
        <create v-if="lazy && isMobile"></create>
        <post v-if="lazy" ref="post"></post>
    </div>
</template>

<script lang="babel">

    Vue.http.options.root = "http://" + window.location.host;

    import top from './tools/top.vue'
    import toast from './tools/toast.vue'
    import navbar from './nav/navbar.vue'
    import banner from './nav/nav-banner.vue'
    import navsign from './nav/nav-sign.vue'
    import bottom from './tools/bottom.vue'
    import music from './vue-media/music.vue'
    import create from './tools/create.vue'
    import post from './post/create.vue'

    export default {
        components: {
            top, toast, navbar, banner, navsign, bottom, music, create, post
        },
        watch: {
            '$store.getters.isLogin' (val) {
                this.setAuthHeader(val);
                this.getUpToken(val);
            }
        },
        data () {
            return {
                lazy : false,
                load : true,
                uptoken : null,
                isMobile : null,
                source: [
                    {
                        id : 1,
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/2581c16ff9a07997c0a4e9d26427ff7a/5800e0ce/resource/a2/48/55/72/3743317910.aac",
                        img : "https://ss0.baidu.com/73x1bjeh1BF3odCf/it/u=1895382595,3961079290&fm=85&s=938543A65337079C1C4B73B20300F01A",
                        player : "Origa",
                        name : "Inner Universe"
                    },
                    {
                        id : 2,
                        src : "http://ip.h5.rf03.sycdn.kuwo.cn/a818f7290b61e4ca34cb8f1c19756ec3/580cb797/resource/a3/27/73/2660804116.aac",
                        img : "http://p3.music.126.net/4hhcI_Elp8nknnvtvOekhQ==/7884597883392048.jpg?param=130y130",
                        player : "Donna Burke",
                        name : "Glassy sky"
                    },
                    {
                        id : 3,
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/96d2fba33272db6c83f6fddb6b5e91b2/580d6082/resource/a3/48/77/7/1231856582.aac",
                        img : "https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=3532494881,3489311661&fm=58",
                        player : "高橋洋子",
                        name : "残酷天使的行动纲领"
                    },
                    {
                        id : 4,
                        src : "http://ip.h5.rv03.sycdn.kuwo.cn/58e05748f597ea146dfe1ed5ba733add/580c182c/resource/a3/14/40/311454290.aac",
                        img : "https://ss0.baidu.com/73t1bjeh1BF3odCf/it/u=401076776,2742246545&fm=85&s=AD97815ADAE2EE4D4A0FC7AC0300E04A",
                        player : "山本润子",
                        name : "翼をください"
                    },
                    {
                        id : 5,
                        src : "http://ip.h5.rb03.sycdn.kuwo.cn/dc5327c29d9201f0759993a777ecf532/580cb701/resource/a2/9/4/38847848.aac",
                        img : "http://img1.kuwo.cn/star/starheads/240/93/38/518470327.jpg",
                        player : "広橋真紀子",
                        name : "いのちの名前"
                    },
                    {
                        id : 6,
                        name : "時雨",
                        player : "川嶋あい",
                        src : "http://ip.h5.rh03.sycdn.kuwo.cn/eb10d10a5ab966534e278b8978fabe5e/580c1a35/resource/a1/21/95/2035879402.aac",
                        img : "https://ss0.baidu.com/73x1bjeh1BF3odCf/it/u=2057334100,848181386&fm=85&s=CEF08D56532478AAD2489CC30300A0B0"
                    },
                    {
                        id : 7,
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/9a97a0eb4dcece8dfaef0c9a6952cc3a/580cb664/resource/a1/48/46/81/2196659701.aac",
                        img : "https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=992590722,947736457&fm=58",
                        player : "KOKIA",
                        name : "ありがとう"
                    },
                    {
                        id : 8,
                        img : "https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=4278710545,1130476452&fm=58",
                        name : "Life Is Like A Boat",
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/9324bdb5a688bf5259d99cfd11a92ba1/580cb6bf/resource/a2/48/74/43/1754866078.aac",
                        player : "Rie fu"
                    },
                    {
                        id : 9,
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/dd6a1e1cd34206e3752bb56872f5e420/580c1c36/resource/a3/48/80/29/883227969.aac",
                        img : "https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=189055273,1230914480&fm=58",
                        player : "Lia",
                        name : "鸟之诗"
                    },
                    {
                        id : 10,
                        player : "松泽由美",
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/d2d6fc3b6e08ca235964c5bd20785aab/580cb7ea/resource/a3/48/50/37/1797466515.aac",
                        name : "地球仪",
                        img : "https://ss0.baidu.com/73t1bjeh1BF3odCf/it/u=2103269090,4291149936&fm=96"
                    },
                    {
                        id : 11,
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/653a1f6ee345f1f413a5af99a568ff93/580cb88e/resource/a1/57/16/4109199843.aac",
                        img : "http://img4.imgtn.bdimg.com/it/u=4283983956,3392286656&fm=21&gp=0.jpg",
                        name : "Memories",
                        player : "大槻真希"
                    },
                    {
                        id : 12,
                        src : "http://ip.h5.re03.sycdn.kuwo.cn/d595a27f4c80bd53c4fefd207b2ef6c4/580cb9a7/resource/a2/80/42/677634484.aac",
                        img : "http://img.xiami.net/images/album/img10/89610/5317001465801929_2.jpg",
                        name : "歳月-云流れ-",
                        player : "Foxtail-Grass Studio"
                    },
                    {
                        id : 13,
                        name : "One More Time，One More Chance",
                        src : "http://ip.h5.rh03.sycdn.kuwo.cn/fa6df1b7c203f6c34de201c1b969681e/580cba6e/resource/a3/46/72/3911608828.aac",
                        img : "https://ss0.baidu.com/73x1bjeh1BF3odCf/it/u=1510007095,1060268610&fm=85&s=CF846089105493DECDB72597030050AB",
                        player : "山崎まさよし"
                    },
                    {
                        id : 14,
                        src : "http://ip.h5.ra03.sycdn.kuwo.cn/f2a6a07235dcc634074ed9537d3f4e33/580cbae3/resource/a1/43/51/1936674992.aac",
                        img : "https://ss0.baidu.com/6ONWsjip0QIZ8tyhnq/it/u=2630152203,3669016822&fm=58",
                        player : "Key Sounds Label",
                        name : "潮鳴り"
                    },
                    {
                        id : 15,
                        src : "http://ip.h5.re03.sycdn.kuwo.cn/da76d89e6153cb7fbf75e6387508fead/580cbb31/resource/a3/61/4/1141712876.aac",
                        img : "http://img.xiami.net/images/album/img42/62242/3103841472630198_2.jpg",
                        name : "町， 時の流れ， 人",
                        player : "Key Sounds Label"
                    },
                    {
                        id : 16,
                        src : "http://ip.h5.re03.sycdn.kuwo.cn/8a2f9e789208e77aaca5730694e1cc6d/580cbb95/resource/a1/40/67/157696700.aac",
                        img : "http://img.xiami.net/images/album/img42/62242/3103841472630198_2.jpg",
                        name : "空に光る",
                        player : "Key Sounds Label"
                    },
                    {
                        id : 17,
                        name : "Gamble Rumble",
                        src : "http://ip.h5.re03.sycdn.kuwo.cn/aba5946aa5f94f23d21734ec460f60b0/580cbc9f/resource/a1/90/56/937982610.aac",
                        img : "http://img3.kuwo.cn/star/starheads/240/9/58/1999698343.jpg",
                        player : "m.o.v.e"
                    }
                ]
            }
        },
        created () {
            this.userAngent();
            this.checkLogin();
            this.lazy = true;
        },
        methods: {
            setAuthHeader (val) {
                if (val) {
                    Vue.http.headers.common['Authorization'] = 'Bearer ' + this.$getUserInfo('token');
                } else {
                    Vue.http.headers.common['Authorization'] = 'null';
                }
            },
            checkLogin() {
                let bool = document.getElementById('_auth').getAttribute('content') == 1;
                this.$store.dispatch('setLogin', { bool });
                this.setAuthHeader(bool);
                this.getUpToken(bool);
            },
            userAngent() {
                var userAgentInfo = navigator.userAgent;
                var Agents = ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"];
                var bool = false;
                for (var v = 0; v < Agents.length; v++) {
                    if (userAgentInfo.indexOf(Agents[v]) > 0) {
                        bool = true;
                        break;
                    }
                }
                this.isMobile = bool;
            },
            getUpToken(bool) {
                if (bool && this.uptoken === null) {
                    this.$http.post('/api/uptoken').then((res) => {
                        this.uptoken = res.body.uptoken
                    });
                }
            }
        }
    }
</script>