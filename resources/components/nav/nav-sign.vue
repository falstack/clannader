<style lang="sass" rel="scss" scoped>
    @import '../../static/sass/variables';

    #space {
        perspective: 800;
        -webkit-perspective: 800;
        perspective-origin: 50% 50%;
        -webkit-perspective-origin: 50% 50%;
        background-color: rgba(0, 0, 0, 0.3);
        z-index: 10000;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        visibility: visible;
    }

    .mask{
        -webkit-transform-style:preserve-3d;
        transform-style: preserve-3d;
        background-color: transparent;
        position: absolute;
        height: 100%;
        width: 100%;
        left: 0;
        top: 0;
    }

    .modal {
        width: 500px;
        height: 460px;
        padding: 50px 60px;
        background-color: #fff;
        border-radius: 4px;
        position: fixed;
        left: 50%;
        top: 50%;
        margin-left: -260px;
        margin-top: -300px;
        transition: .5s;
        font-size: 14px;
        visibility: visible;
        opacity: 1;
        display: flex;
        flex-direction: column;

        input[type="text"], input[type="password"], input[type="email"] {
            width: 100%;
            height: 40px;
            color: #a5a5a5;
            font-size: 12px;
        }

        button {
            height: 40px;
            width: 100%;
            color: #fff;
            border-radius: 3px;
            background-color: $color-blue;

            &:hover {
                background-color: $color-blue-hover;
            }
        }

        >div {
            margin-top: 15px;
        }

        span {
            margin-top: 15px;
            flex: 1;
            display: flex;
            align-items: center;
        }

        p {
            margin-top: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    }
</style>

<template>
    <div id="space" @click="hiddenSign" v-if="!$store.getters.isMobile">
        <div class="mask">
            <!--<div class="modal" @click.stop="">-->
                <!--<img src="data:image/jpeg;base64,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">-->
                <!--<div>-->
                    <!--<input name="username" type="text" v-model="signIn.name" placeholder="邮箱" @keyup.enter="login">-->
                <!--</div>-->
                <!--<div>-->
                    <!--<input name="password" type="password" v-model="signIn.password" placeholder="密码" @keyup.enter="login">-->
                <!--</div>-->
                <!--<span>-->
                    <!--<label>记住我<input type="checkbox" :checked="signIn.remember" v-model="signIn.remember"></label>-->
                <!--</span>-->
                <!--<div>-->
                    <!--<button>登录</button>-->
                <!--</div>-->
                <!--<p>-->
                    <!--<a>忘记密码?></a>-->
                    <!--<a @click="toRegister">点击注册»</a>-->
                <!--</p>-->
            <!--</div>-->
            <div class="modal" @click.stop="">
                <img src="data:image/jpeg;base64,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">
                <div>
                    <input type="text" v-model="signUp.name" placeholder="昵称（2-12个字符组成，1个汉字占2个字符）">
                </div>
                <div>
                    <input type="email" v-model="signUp.email" placeholder="邮箱（填写常用邮箱，用于登录）">
                </div>
                <div>
                    <input type="password" v-model="signUp.password" placeholder="密码（6-16个字符组成，区分大小写）">
                </div>
                <span>
                    <div ref="captcha"></div>
                </span>
                <p>
                    <a></a>
                    <a @click="toLogin">已有账号»</a>
                </p>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                signIn : {
                    remember : true,
                    method : "",
                    message : "",
                    form : {
                        name : "",
                        password : ""
                    }
                },
                signUp : {
                    confirm : false,
                    form : {
                        name : "",
                        password : "",
                        email : ""
                    },
                    message : {
                        email : "",
                        name : "",
                        password : "",
                        verify : ""
                    },
                    noCaptcha : true,
                    success : false,
                    validate : null,
                    mail : {
                        count : 30,
                        ok : false
                    },
                    token : null,
                    done : false
                }
            }
        },
        created () {
        },
        methods: {
            showSpace (show) {
                document.getElementById('space').style.visibility = show ? "visible" : "hidden";
            },
            hiddenBox (ele) {
                ele.style.transform = "rotateY(0deg)";
                ele.style.marginTop = "-300px";
                ele.style.opacity = 0;
                ele.style.visibility = "hidden";
            },
            switchBox (ele, bool) {
                ele.style.visibility = "hidden";
                ele.style.transform = bool ? "rotateY(180deg)" : "rotateY(-180deg)";
                ele.style.marginTop = "-200px";
                ele.style.opacity = 0;
            },
            showBox (ele) {
                ele.style.visibility = "visible";
                ele.style.transform = "rotateY(0deg)";
                ele.style.marginTop = "-200px";
                ele.style.opacity = 1;
            },
            showLogin () {
                this.showSpace(true);
                this.showBox(document.querySelector('.loginBox'));
                this.switchBox(document.querySelector('.registerBox'), true);
            },
            showRegister () {
                this.showSpace(true);
                this.showCaptcha();
                this.switchBox(document.querySelector('.loginBox'), false);
                this.showBox(document.querySelector('.registerBox'));
            },
            hiddenSign () {
                this.showSpace(false);
                this.hiddenBox(document.querySelector('.registerBox'));
                this.hiddenBox(document.querySelector('.loginBox'));
            },
            toRegister () {
                this.switchBox(document.querySelector('.loginBox'), false);
                this.showBox(document.querySelector('.registerBox'));
            },
            toLogin () {
                this.switchBox(document.querySelector('.registerBox'), true);
                this.showBox(document.querySelector('.loginBox'));
            },
            login () {
                var regEmail = /^\w+\@\w+\.\w{2,3}$/;
                var regPwd = /^\w{6,16}$/;

                if (this.signIn.form.name == "") {
                    this.signIn.message = "账号不能为空";
                    return
                } else if (!regEmail.test(this.signIn.form.name)) {
                    this.signIn.message = "账号错误";
                    return
                } else {
                    this.signIn.ok = true;
                    if (regEmail.test(this.signIn.form.name)) {
                        this.signIn.method = "email";
                    } else {
                        this.signIn.method = "phone";
                    }
                }

                if (this.signIn.form.password == "") {
                    this.signIn.message = "请输入密码";
                    return
                } else if (!regPwd.test(this.signIn.form.password)) {
                    this.signIn.message = "密码不合法";
                    return
                }

                var button = document.getElementById('loginBtn');
                button.setAttribute('disabled', 'disabled');
                this.$http.post('door/login', {
                    access : this.signIn.form.name,
                    secret : this.signIn.form.password,
                    method : this.signIn.method,
                    remember : this.signIn.remember
                }).then(function (res) {
                    this.signIn.message = "登录成功";
                    setUserInfo(res.data, this.signIn.remember);
                    this.hiddenSign();
                    this.setLogin(true);
                    this.makeLogin();
                    document.getElementById('_auth').setAttribute('content', 1);
                    this.signIn.form.name = "";
                    this.signIn.form.password = "";
                    this.signIn.method = "";
                    button.removeAttribute("disabled");

                    return true
                }, function (res) {
                    if (res.status === 422) {
                        this.signIn.message = res.data.message;
                        button.removeAttribute("disabled");
                    } else if (res.status === 429) {
                        this.signIn.message = "禁止登录三分钟";
                    } else if (res.status === 500) {
                        button.removeAttribute("disabled");
                        this.signIn.message = "服务器异常，请稍后再试";
                    }
                    return false
                });
            },
            register () {
                var regName = /^(\w|[\u4e00-\u9fa5])+$/g;
                var regPwd = /^\w{6,16}$/;
                var regEmail = /^\w+\@\w+\.\w{2,3}$/;
                var match = trim(this.signUp.form.name.replace(/([\u4e00-\u9fa5])/g,'aa')).length;
                if (this.signUp.form.name == "") {
                    this.signUp.message.name = "请输入昵称";
                    return
                } else if (match > 12 || match < 2) {
                    this.signUp.message.name = "昵称长度不符";
                    return
                } else if (!regName.test(this.signUp.form.name)) {
                    this.signUp.message.name = "昵称不合法";
                    return
                }

                if (this.signUp.form.password == "") {
                    this.signUp.message.password = "请输入密码";
                    return
                } else if (!regPwd.test(this.signUp.form.password)) {
                    this.signUp.message.password = "密码不合法";
                    return
                }

                if (this.signUp.form.email == "") {
                    this.signUp.message.email = "请输入邮箱";
                    return
                } else if (!regEmail.test(this.signUp.form.email)) {
                    this.signUp.message.email = "邮箱不合法";
                    return
                }

                this.$http.post('door/register/make', {
                    name : this.signUp.form.name,
                    email : this.signUp.form.email,
                    password : this.signUp.form.password
                }).then(function (res) {
                    this.signUp.success = true;
                    this.signUp.message.verify = res.data.message;
                    this.sendMailCount();
                    return true
                }, function (res) {
                    if (res.status === 422) {
                        if (res.data.email) {
                            this.signUp.message.email = res.data.email;
                        }
                        if (res.data.name) {
                            this.signUp.message.name = res.data.name;
                        }
                        if (res.data.password) {
                            this.signUp.message.password = res.data.password;
                        }
                    } else if (res.status === 429) {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "三分钟内禁止注册！"
                        });
                    } else if (res.status === 500) {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，请稍后再试！"
                        });
                    }
                    return false
                });
            },
            showCaptcha () {
                if (this.$refs.captcha.innerHTML === "") {
                    var vm = this;
                    var handler = function (captchaObj) {
                        captchaObj.appendTo(vm.$refs.captcha);

                        captchaObj.onSuccess(function () {
                            console.log('123');
                        });
                    };

                    this.$http.get('/api/captcha?rand=' + Math.round(Math.random() * 100)).then((res) => {
                        var temp = JSON.parse(res.body);
                        initGeetest({
                            gt: temp.gt,
                            challenge: temp.challenge,
                            product: "float",
                            offline: !temp.success
                        }, handler);
                    });
                } else {
                    console.log('456');
                }
            }
        },
        mounted () {
            this.showCaptcha()
        }
    }
</script>