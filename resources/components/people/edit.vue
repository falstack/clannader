<style lang="sass" rel="scss" scoped>

    .pc-warp {
        input[type=file] {
            width: 288px;
        }

        .msg-info {
            width: 395px;
        }

        .line-label {
            display: inline-block;
            width: 266px;
            line-height: 39px;
        }

        .name-input {
            width: 225px;
        }

        .autograph-input {
            width: 293px;
        }
    }

    .m-warp {
        input[type=file] {
            width: 248px;
        }

        .msg-info {
            width: 355px;
        }

        .line-label {
            display: inline-block;
            width: 226px;
            line-height: 39px;
        }

        .name-input {
            width: 200px;
        }

        .autograph-input {
            width: 200px;
        }
    }

    .edit-item {
        margin: 16px 0;
        height: 39px;

        form {
            display: inline-block;
        }

        label, input {
            color: #333;
            font-size: 12px;
        }

        input {
            border-left: none;
            border-top: none;
            border-right: none;
        }

        input[type=date] {
            height: 39px;
        }

        button {
            margin-left: 10px;
        }
    }
</style>

<template>
    <div :class="[ $root.$data.isMobile ? 'm-warp' : 'pc-warp' ]">
        <div class="edit-item">
            <label>昵称：<input type="text" class="name-input" placeholder="2-12个字符组成" v-model="form.name" @keyup.enter="setUserName"></label>
            <button class="btn-bean btn-blue" @click="setUserName">确认</button>
        </div>
        <div class="edit-item">
            <label>简介：<input type="text" class="autograph-input" placeholder="请缩减至20字以内..." v-model="form.autograph" @keyup.enter="setSummary"></label>
            <button class="btn-bean btn-blue" @click="setSummary">确认</button>
            <span class="gray-word">&nbsp;&nbsp;&nbsp;{{ form.autograph.length }} / 20</span>
        </div>
        <div class="edit-item">
            <form enctype="multipart/form-data" ref="avatarForm">
                <label>头像：</label>
                <input type="file" name="file" @change="previewAvatar($event)" ref="avatarInput">
            </form>
            <button class="btn-bean btn-gray" v-show="upAvatar" @click="cancelAvatar">取消</button>
            <button class="btn-bean btn-blue" @click="setUserAvatar">确认</button>
        </div>
        <div class="edit-item">
            <form enctype="multipart/form-data" ref="bannerForm">
                <label>背景：</label>
                <input type="file" name="file" @change="previewBanner($event)" ref="bannerInput">
            </form>
            <button class="btn-bean btn-gray" v-show="upBanner" @click="cancelBanner">取消</button>
            <button class="btn-bean btn-blue" @click="setUserBanner">确认</button>
        </div>
        <div class="edit-item">
            <span class="line-label">
                <label>性别：</label>
                <label><input type="radio" name="sex" v-model="form.sex" value="1">男</label>
                <label><input type="radio" name="sex" v-model="form.sex" value="2">女</label>
            </span>
            <label>保密：<input type="checkbox" v-model="form.sexSecret"></label>
            <button class="btn-bean btn-blue" @click="setUserSex">确认</button>
        </div>
        <div class="edit-item">
            <span class="line-label">
                <label>生日：<input type="date" placeholder="0000-00-00" v-model="form.birthday" @keyup.enter="setBirthday"></label>
            </span>
            <label>保密：<input type="checkbox" v-model="form.birSecret"></label>
            <button class="btn-bean btn-blue" @click="setBirthday">确认</button>
        </div>
        <div class="msg-info">
            <p><strong>生日</strong>和<strong>性别</strong>用于为番剧的详细分类和排名做基础。</p>
            <p>如：《火影忍者》的评分是9.3分，但评分者中男生占70%，女生占30%，并且男生评分普标高于女生，那么这部番将更有可能推荐给喜欢热血动漫的男生。</p>
            <p>如果你不想让别人看到你的性别和生日，只需要在填写的同时勾选<strong>保密</strong>即可。</p>
        </div>
    </div>
</template>

<script lang="babel">

    import { setUserInfoItem } from '../../static/js/storage'

    export default {
        data () {
            return {
                form : {
                    name : "",
                    autograph : "",
                    birthday : null,
                    birSecret : 0,
                    sex : null,
                    sexSecret : false
                },
                upAvatar : false,
                upBanner : false
            }
        },
        created () {
            this.getUserReally()
        },
        methods: {
            getUserReally () {
                this.$http.post('/api/people/edit/really').then(function (res) {
                    this.form.sex = res.data.data.sex;
                    this.form.birthday = res.data.data.birthday;
                    this.form.sexSecret = res.data.data.sexSecret;
                    this.form.birSecret = res.data.data.birSecret;
                });
            },
            setUserName (e) {
                var regName = /^(\w|[\u4e00-\u9fa5])+$/g;
                var match = this.form.name.replace(/([\u4e00-\u9fa5])/g,'aa').trim().length;
                if (this.form.name == "") {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "请输入昵称！"
                    });
                } else if (match > 12 || match < 2) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "昵称长度不符！"
                    });
                } else if (!regName.test(this.form.name)) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "昵称不合法！"
                    });
                } else {
                    var btn = e.currentTarget;
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/people/edit/timeline', {
                        content : this.form.name,
                        type : 'name'
                    }).then(() => {
                        this.$root.$refs.navbar.$data.user.name = this.form.name;
                        this.$parent.$data.people.uName = this.form.name;
                        setUserInfoItem('name', this.form.name);
                        document.title = this.form.name + ' - CLANNADer';
                        this.form.name = "";
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "昵称修改成功！"
                        });
                    btn.removeAttribute('disabled');
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，发送数据失败！"
                        });
                    });
                }
            },
            setSummary (e) {
                if (this.form.autograph.length > 20) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "请缩减至20字以内！"
                    });
                } else if (this.form.autograph.length === 0) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "简介不能为空！"
                    });
                } else {
                    var btn = e.currentTarget;
                    this.$http.post('/api/people/edit/timeline', {
                        content : this.form.autograph,
                        type : 'autograph'
                    }).then(() => {
                        this.$parent.$data.people.uWord = this.form.autograph;
                        setUserInfoItem('autograph', this.form.autograph);
                        this.form.autograph = "";
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "简介设置成功！"
                        });
                        btn.removeAttribute('disabled');
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，发送数据失败！"
                        });
                    });
                }
            },
            setBirthday (e) {
                if (this.form.birthday === null) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "日期不能为空！"
                    });
                } else {
                    var btn = e.currentTarget;
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/people/edit/birthday', {
                        birthday : this.form.birthday,
                        birSecret : this.form.birSecret ? 1 : 0
                    }).then(() => {
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "生日已修改成功！"
                        });
                        setUserInfoItem('birthday', this.form.birSecret == 1 ? '0000-00-00' : this.form.birthday);
                        btn.removeAttribute('disabled');
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，发送数据失败！"
                        });
                    });
                }
            },
            setUserSex (e) {
                if (this.form.sex === null) {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "请选择性别！"
                    });
                } else {
                    var btn = e.currentTarget;
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/people/edit/sex', {
                        sex : parseInt(this.form.sex) + (this.form.sexSecret ? 2 : 0)
                    }).then((res) => {
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "性别设置成功！"
                        });
                        setUserInfoItem('sex', res.data.data);
                        this.$parent.$data.people.sex = res.data.data;
                        btn.removeAttribute('disabled');
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "服务器异常，发送数据失败！"
                        });
                    });
                }
            },
            previewAvatar (e) {
                this.upAvatar = true;
                var reader = new FileReader();
                var vm = this;
                reader.onload = function(evt) {
                    vm.$root.$refs.navbar.$data.user.face = evt.target.result;
                    vm.$parent.$data.people.uFace = evt.target.result;
                };
                reader.readAsDataURL(e.target.files[0]);
            },
            cancelAvatar () {
                this.$refs.avatarInput.value = "";
                this.$root.$refs.navbar.$data.user.face = this.$getUserInfo('avatar');
                this.$parent.$data.people.uFace = this.$getUserInfo('avatar');
                this.upAvatar = false;
            },
            previewBanner (e) {
                this.upBanner = true;
                var reader = new FileReader();
                var vm = this;
                reader.onload = function(evt) {
                    vm.$parent.$refs.banner.style.backgroundImage = 'url(' + evt.target.result + ')';
                };
                reader.readAsDataURL(e.target.files[0]);
            },
            cancelBanner () {
                this.$refs.bannerInput.value = "";
                this.$parent.$refs.banner.style.backgroundImage = 'url(' + this.$getUserInfo('banner') + ')';
                this.upBanner = false;
            },
            setUserAvatar (e) {
                if (this.$refs.avatarInput.value == "") {
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "还未选择图片！"
                    });
                } else {
                    var btn = e.currentTarget;
                    this.$root.$refs.toast.open({
                        theme: "info",
                        content: "头像上传中，请稍候！"
                    });
                    btn.setAttribute('disabled', 'disabled');
                    var formData = new FormData(this.$refs.avatarForm);
                    formData.append('token', this.$root.$data.uptoken);
                    this.$http.post('http://upload.qiniu.com/', formData).then((res) => {
                        this.$http.post('/api/people/edit/timeline', {
                            content : res.data.key,
                            type : 'avatar'
                        }).then((res) => {
                            this.upAvatar = false;
                            this.$root.$refs.toast.open({
                                theme: "success",
                                content: "头像更新成功！"
                            });
                            setUserInfoItem('avatar', res.data.data);
                            btn.removeAttribute('disabled');
                            this.$refs.avatarInput.value = "";
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "第三方存储服务异常，发送数据失败！"
                        });
                    });
                }
            },
            setUserBanner (e) {
                if (this.$refs.bannerInput.value == "") {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "还未选择图片！"
                    });
                } else {
                    var btn = e.currentTarget;
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "背景上传中，请稍候！"
                    });
                    btn.setAttribute('disabled', 'disabled');
                    var formData = new FormData(this.$refs.bannerForm);
                    formData.append('token', this.$root.$data.uptoken);
                    this.$http.post('http://upload.qiniu.com/', formData).then((res) => {
                        this.$http.post('/api/people/edit/timeline', {
                            content : res.data.key,
                            type : 'banner'
                        }).then((res) => {
                            this.upBanner = false;
                            this.$root.$refs.toast.open({
                                theme: "success",
                                content: "背景上传成功！"
                            });
                            setUserInfoItem('banner', res.data.data);
                            btn.removeAttribute('disabled');
                            this.$refs.bannerInput.value = "";
                        }, () => {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，发送数据失败！"
                            });
                        });
                    }, () => {
                        this.$root.$refs.toast.open({
                            theme: "error",
                            content: "第三方存储服务异常，发送数据失败！"
                        });
                    });
                }
            }
        }
    }
</script>