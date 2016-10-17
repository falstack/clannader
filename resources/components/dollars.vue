<style lang="sass" rel="scss" scoped>
    $window-width : 720px;
    $avatar-length : 100px;
    $chat-height : 300px;

    .chat {
        width: 100%;
        height: $chat-height;
        background: linear-gradient(0deg, #ccc, #fff);
        z-index: 10;
        position: absolute;
    }

    .content {
        position: absolute;
        left: 50%;
        margin-left: -262px;
        margin-top: 100px;
        background-color: #FFF;
        border: 2px solid #555;
        width: $window-width - $avatar-length * 2 + 4px;
        height: 100px;
        padding: 10px;
        border-radius: 10px;
    }

    .submit {
        position: absolute;
        top: 220px;
        left: 50%;
        margin-left: -100px;
        width: 200px;
        font-size: 12px;
        padding: 3px;
        border: 2px solid #333;
        border-radius: 10px;
        background: linear-gradient(0deg, #CCC, #FFF);

        &:active {
            font-weight: bold;
        }
    }

    .window {
        background: #000;
        width: 100%;
        min-height: 100%;
        position: absolute;
        padding-top: $chat-height + 30px;
        top: 0;
        box-sizing: border-box;
    }

    .chat-item {
        width: $window-width;
        position: relative;
        margin: 0 auto 12px;
        float: none;

        .user {
            position: absolute;

            .name {
                color: #fff;
                text-align: center;
                width: 80px;
                display: block;
            }
        }

        .avatar {
            width: 48px;
            margin: 0 14px 4px;
            height: 48px;
            overflow: hidden;
            border: 2px solid #FFF;
            cursor: pointer;

            img {
                width: 100%;
                height: auto;
            }
        }

        .msg-warp {
            color: #fff;
            padding: 0 $avatar-length;
            overflow: hidden;
            zoom: 1;
        }

        .msg-box {
            border: 4px solid #FFF;
            border-radius: 10px;
            max-width: $window-width - $avatar-length * 2;
            display: inline-block;
            position: relative;
        }

        .msg-text {
            font-size: 15px;
            letter-spacing: 3px;
            padding: 17px 20px;
            min-height: 60px;
            line-height: 2;
            border-radius: 10px;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAEsCAYAAAALu3mvAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAK8AAACvABQqw0mAAAABx0RVh0U29mdHdhcmUAQWRvYmUgRmlyZXdvcmtzIENTNAay06AAAAAWdEVYdENyZWF0aW9uIFRpbWUAMjAxMC41LjFnFYq1AAAA3UlEQVRYhe2YSw6DMAxE7cjX48pddMNhKGdIV2zIVJrI5OMqbJCe4nicDCag+/u1ye1Kd/Cf0HKeUFKpKXR2y0LOaWBgP/F8uAldEShITOhEtD+hJGc4L6mNbcCcEyZy2htDNGeNJLxHKDtKVGMGl+t8i/xDPFt7TUXPd7Cq3Rz7ILDhtJd4fzZpVr7wCdtvv1dkL51RzktRJFWIT6nkeORxfBA8S6iqjkQLPgudx+wWJ//QsNt6ht6j0Ks09sM2Cgz94htrb+cvhdC1R4GrVS64oB+agGZnqnrB665fJiKclhVotn4AAAAASUVORK5CYII=);
            background-repeat: repeat-x;
            background-position: 0 50%;
        }
    }

    .arraw {
        position: absolute;
        top: 15px;
        width: 0;
        height: 0;
        border-bottom: 16px solid #fff;

        em {
            position: absolute;
            top: 5px;
            width: 0;
            height: 0;
            border-bottom-width: 8px;
            border-bottom-style: solid;
        }
    }

    .arraw-left {
        left: -22px;
        border-left: 22px solid transparent;

        em {
            border-left: 11px solid transparent;
            right: 0;
        }
    }

    .arraw-right {
        right: -22px;
        border-right: 22px solid transparent;

        em {
            border-right: 11px solid transparent;
            left: 0;
        }
    }

    .user-left {
        .user {
            left: 0;
        }

        .msg-box {
            float: left;
        }
    }

    .user-right {
        .user {
            right: 0;
        }

        .msg-box {
            float: right;
        }
    }
</style>

<template>
    <div>
        <div class="chat">
            <textarea class="content" v-model="content" @keyup.enter="post(1)" ref="input"></textarea>
            <button class="submit" @click="post(0)">{{ success ? "POST!" : "Sending..." }}</button>
        </div>
        <ul class="window">
            <li v-for="item in orderList" :class="[ 'chat-item', zone === item.userHome ? 'user-right' : 'user-left' ]">
                <div class="user">
                    <div class="avatar" @click="at(item.userName)"><img :src="item.userFace"></div>
                    <router-link class="name" :to="'/people/' + item.userHome">{{ item.userName }}</router-link>
                </div>
                <div class="msg-warp">
                    <div class="msg-box" :style="{ backgroundColor : myColor(item.userHome) }">
                        <div :class="[ 'arraw', zone === item.userHome ? 'arraw-right' : 'arraw-left' ]">
                            <em :style="{ borderBottomColor : myColor(item.userHome) }"></em>
                        </div>
                        <div class="msg-text" :style="{ backgroundColor : myColor(item.userHome) }">
                            {{ item.content }}
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>

    export default {
        watch : {
            '$store.getters.isLogin' (val) {
                if (val) {
                    this.link()
                }
            }
        },
        data () {
            return {
                content : "",
                socket : {},
                list : [],
                zone : "",
                success : true,
                colors : [
                    '#82ae46', '#ba2636', '#fda500', '#333', '#e6de29', '#1d7abb', '#e2b600', '#df36fa', '#4dbdea',
                    '#797130', '#59a259', '#ab1d19', '#5554a7'
                ],
                userColor : []
            }
        },
        beforeCreate () {
            this.$root.$data.load = false;
            document.title = "聊天室 - CLANNADer";
        },
        computed: {
            orderList () {
                return _.orderBy(this.list, 'time', 'desc')
            }
        },
        methods: {
            post (arg) {
                if (this.$store.getters.isLogin) {
                    if (this.content.length !== arg && this.success) {
                        this.success = false;
                        this.$http.post('/api/dollars', {
                            content : this.content
                        }).then(() => {
                            this.content = "";
                            this.success = true;
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    } else {
                        if (arg) {
                            this.content = "";
                        }
                    }
                } else {
                    this.$root.$refs.navsign.showLogin()
                }
            },
            at (userName) {
                this.content += '@' + userName + ' ';
                this.$refs.input.focus();
            },
            getColor () {
                var n = Math.floor(Math.random() * this.colors.length + 1) - 1;
                return this.colors[n];
            },
            myColor (userHome) {
                var i = 0;
                while (this.userColor[i].user != userHome) {
                    i++
                }
                return this.userColor[i].color
            },
            selectColor (userHome) {
                for (var i=0; i<this.userColor.length; i++) {
                    if (this.userColor[i].user === userHome) {
                        return
                    }
                }
                this.userColor.push({
                    user : userHome,
                    color : this.getColor()
                });
            },
            link () {
                var vm = this;
                this.zone = this.$getUserInfo('zone');
                this.$root.$refs.navbar.$refs.navmsg.$data.socket.on('0.0.0.0:dollars',function(data) {
                    console.log(data);
                    vm.list.push(data);
                    vm.selectColor(data.userHome);
                });
            }
        },
        mounted () {
            if (this.$store.getters.isLogin) {
                this.link()
            } else {
                this.$root.$refs.navsign.showLogin()
            }
        }
    }
</script>