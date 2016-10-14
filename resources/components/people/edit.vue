<style lang="sass" rel="scss" scoped>
    .msg-info {
        width: 395px;
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

        input[type=file] {
            width: 288px;
        }

        input[type=date] {
            height: 39px;
        }

        button {
            margin-left: 10px;
        }

        .line-label {
            display: inline-block;
            width: 266px;
            line-height: 39px;
        }

        .name-input {
            width: 225px;
        }

        .summary-input {
            width: 293px;
        }
    }
</style>

<template>
    <div>
        <div class="edit-item">
            <label>昵称：<input type="text" class="name-input" placeholder="2-12个字符组成，1个汉字占2个字符" v-model="form.name" @keyup.enter="setUserName"></label>
            <button class="btn-bean btn-blue" @click="setUserName" id="name-btn">确认</button>
        </div>
        <div class="edit-item">
            <label>简介：<input type="text" class="summary-input" placeholder="请缩减至20字以内..." v-model="form.summary" @keyup.enter="setSummary"></label>
            <button class="btn-bean btn-blue" @click="setSummary" id="summary-btn">确认</button>
            <span class="gray-word">&nbsp;&nbsp;&nbsp;{{ form.summary.length }} / 20</span>
        </div>
        <div class="edit-item">
            <form id="avatarForm" enctype="multipart/form-data">
                <label>头像：</label>
                <input type="file" name="file" id="avatarInput" @change="previewAvatar($event)">
            </form>
            <button class="btn-bean btn-gray" v-show="upAvatar" @click="cancelAvatar">取消</button>
            <button class="btn-bean btn-blue" @click="setUserAvatar" id="avatar-btn">确认</button>
        </div>
        <div class="edit-item">
            <form id="bannerForm" enctype="multipart/form-data">
                <label>背景：</label>
                <input type="file" name="file" id="bannerInput" @change="previewBanner($event)">
            </form>
            <button class="btn-bean btn-gray" v-show="upBanner" @click="cancelBanner">取消</button>
            <button class="btn-bean btn-blue" @click="setUserBanner" id="banner-btn">确认</button>
        </div>
        <div class="edit-item">
            <span class="line-label">
                <label>性别：</label>
                <label><input type="radio" name="sex" v-model="form.sex" value="1">男</label>
                <label><input type="radio" name="sex" v-model="form.sex" value="2">女</label>
            </span>
            <label>保密：<input type="checkbox" v-model="form.sexSecret"></label>
            <button class="btn-bean btn-blue" @click="setUserSex" id="sex-btn">确认</button>
        </div>
        <div class="edit-item">
            <span class="line-label">
                <label>生日：<input type="date" placeholder="0000-00-00" v-model="form.birthday" @keyup.enter="setBirthday"></label>
            </span>
            <label>保密：<input type="checkbox" v-model="form.birSecret"></label>
            <button class="btn-bean btn-blue" @click="setBirthday" id="birthday-btn">确认</button>
        </div>
        <div class="msg-info">
            <p><strong>生日</strong>和<strong>性别</strong>用于为番剧的详细分类和排名做基础。</p>
            <p>如：《火影忍者》的评分是9.3分，但评分者中男生占70%，女生占30%，并且男生评分普标高于女生，那么这部番将更有可能推荐给喜欢热血动漫的男生。</p>
            <p>如果你不想让别人看到你的性别和生日，只需要在填写的同时勾选<strong>保密</strong>即可。</p>
        </div>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                form : {
                    name : "",
                    summary : "",
                    birthday : null,
                    birSecret : 0,
                    sex : null,
                    sexSecret : false
                },
                upAvatar : false,
                upBanner : false
            }
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
            setUserName () {
                var regName = /^(\w|[\u4e00-\u9fa5])+$/g;
                var match = trim(this.form.name.replace(/([\u4e00-\u9fa5])/g,'aa')).length;
                if (this.form.name == "") {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "请输入昵称！"
                    });
                } else if (match > 12 || match < 2) {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "昵称长度不符！"
                    });
                } else if (!regName.test(this.form.name)) {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "昵称不合法！"
                    });
                } else {
                    var btn = document.getElementById('name-btn');
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/people/edit/name', {
                        name : this.form.name
                    }).then(function () {
                        document.querySelector('.zone-name').innerText = this.form.name;
                        document.getElementById('userName').innerText = this.form.name;
                        setUserInfoItem('name', this.form.name);
                        document.title = this.form.name + ' - CLANNADer';
                        this.form.name = "";
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "昵称修改成功！"
                        });
                        btn.removeAttribute('disabled');
                    });
                }
            },
            setSummary () {
                if (this.form.summary.length > 20) {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "请缩减至20字以内！"
                    });
                } else if (this.form.summary.length === 0) {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "简介不能为空！"
                    });
                } else {
                    var btn = document.getElementById('summary-btn');
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/people/edit/summary', {
                        summary : this.form.summary
                    }).then(function () {
                        document.querySelector('.zone-summary').innerText = this.form.summary;
                        setUserInfoItem('summary', this.form.summary);
                        this.form.summary = "";
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "简介设置成功！"
                        });
                        btn.removeAttribute('disabled');
                    });
                }
            },
            setBirthday () {
                if (this.form.birthday === null) {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "日期不能为空！"
                    });
                } else {
                    var btn = document.getElementById('birthday-btn');
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/people/edit/birthday', {
                        birthday : this.form.birthday,
                        birSecret : this.form.birSecret ? 1 : 0
                    }).then(function () {
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "生日已修改成功！"
                        });
                        setUserInfoItem('birthday', this.form.birSecret == 1 ? '0000-00-00' : this.form.birthday);
                        btn.removeAttribute('disabled');
                    });
                }
            },
            setUserSex () {
                if (this.form.sex === null) {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "请选择性别！"
                    });
                } else {
                    var btn = document.getElementById('sex-btn');
                    btn.setAttribute('disabled', 'disabled');
                    this.$http.post('/api/people/edit/sex', {
                        sex : parseInt(this.form.sex) + (this.form.sexSecret ? 2 : 0)
                    }).then(function (res) {
                        this.$root.$refs.toast.open({
                            theme: "success",
                            content: "性别设置成功！"
                        });
                        setUserInfoItem('sex', res.data.data);
                        document.querySelector('.zone-sex').className = 'zone-sex ' + sexClass(res.data.data);
                        btn.removeAttribute('disabled');
                    });
                }
            },
            previewAvatar (e) {
                this.upAvatar = true;
                var reader = new FileReader();
                reader.onload = function(evt) {
                    document.querySelector('.zone-avatar').setAttribute('src', evt.target.result);
                    document.querySelector('.nav-avatar').setAttribute('src', evt.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            },
            cancelAvatar () {
                document.getElementById('avatarInput').value = "";
                document.querySelector('.zone-avatar').setAttribute('src', getUserInfo('avatar'));
                document.querySelector('.nav-avatar').setAttribute('src', getUserInfo('avatar'));
                this.upAvatar = false;
            },
            previewBanner (e) {
                this.upBanner = true;
                var reader = new FileReader();
                reader.onload = function(evt) {
                    document.querySelector('.zone-banner').style.backgroundImage = 'url(' + evt.target.result + ')';
                };
                reader.readAsDataURL(e.target.files[0]);
            },
            cancelBanner () {
                document.getElementById('bannerInput').value = "";
                document.querySelector('.zone-banner').style.backgroundImage = 'url(' + getUserInfo('banner') + ')';
                this.upBanner = false;
            },
            setUserAvatar () {
                if (document.getElementById('avatarInput').value == "") {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "还未选择图片！"
                    });
                } else {
                    var btn = document.getElementById('avatar-btn');
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "头像上传中，请稍候！"
                    });
                    btn.setAttribute('disabled', 'disabled');
                    var formData = new FormData(document.getElementById('avatarForm'));
                    formData.append('token', this.getQiniuToken);
                    this.$http.post('http://upload.qiniu.com/', formData).then(
                            function (res) {
                                this.$http.post('api/people/edit/avatar', {
                                    avatar : res.data.key
                                }).then(function (res) {
                                    this.upAvatar = false;
                                    this.$root.$refs.toast.open({
                                        theme: "success",
                                        content: "头像更新成功！"
                                    });
                                    setUserInfoItem('avatar', res.data.data);
                                    btn.removeAttribute('disabled');
                                }, function (res) {
                                    this.$root.$refs.toast.open({
                                        theme: "error",
                                        content: res.data
                                    });
                                });
                            },
                            function (res) {
                                console.log('来自七牛云的错误:' + res.data.error);
                            }
                    )
                }
            },
            setUserBanner () {
                if (document.getElementById('bannerInput').value == "") {
                    this.$root.$refs.toast.open({
                        theme: "error",
                        content: "还未选择图片！"
                    });
                } else {
                    var btn = document.getElementById('banner-btn');
                    this.$root.$refs.toast.open({
                        theme: "warning",
                        content: "背景上传中，请稍候！"
                    });
                    btn.setAttribute('disabled', 'disabled');
                    var formData = new FormData(document.getElementById('bannerForm'));
                    formData.append('token', this.getQiniuToken);
                    this.$http.post('http://upload.qiniu.com/', formData).then(
                        function (res) {
                            this.$http.post('api/people/edit/banner', {
                                banner : res.data.key
                            }).then(function (res) {
                                this.upBanner = false;
                                this.$root.$refs.toast.open({
                                    theme: "success",
                                    content: "背景上传成功！"
                                });
                                setUserInfoItem('banner', res.data.data);
                                btn.removeAttribute('disabled');
                            }, function (res) {
                                this.$root.$refs.toast.open({
                                    theme: "error",
                                    content: res.data
                                });
                            });
                        },
                        function (res) {
                            console.log('来自七牛云的错误:' + res.data.error);
                        }
                    )
                }
            }
        }
    }
</script>