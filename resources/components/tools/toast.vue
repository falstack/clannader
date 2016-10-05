<style lang="sass" rel="scss" scoped>
    $item-width: 300px;
    $pos-top-down: 12px;
    $pos-rig-left: 12px;
    $icon-size: 14px;

    @mixin transition ($opacity, $visibility, $left) {
        opacity: $opacity;
        visibility: $visibility;
        left: $left;
    }

    @mixin theme ($bg, $color, $border, $data) {
        background-color: $bg;
        color: $color;
        border: 1px solid $border;

        &:hover {
            transition-duration: 0s;
            opacity: 1;
        }

        .alert-icon {
            background-image: $data;
        }
    }

    .alert-warp-left-top {
        left: $pos-rig-left;
        top: $pos-top-down;
    }

    .alert-warp-right-top {
        right: $pos-rig-left;
        top: $pos-top-down;
    }

    .alert-warp-right-bottom {
        right: $pos-rig-left;
        bottom: $pos-top-down;
    }

    .alert-warp-left-bottom {
        left: $pos-rig-left;
        bottom: $pos-top-down;
    }

    .alert-warp {
        position: fixed;
        pointer-events: none;
    }

    .alert-item {
        padding: 15px 10px;
        font-size: 14px;
        font-weight: 700;
        font-family: sans-serif;
        line-height: 1.1;
        text-align: center;
        border-radius: 4px;
        position: relative;
        margin-bottom: 10px;
        pointer-events: auto;
        width: $item-width;
        cursor: pointer;
        transition-duration: .4s;
        display: flex;
        @include transition(.8, visible, 0)
    }

    .alert-content {
        word-wrap: break-word;
        flex: 1;
    }

    .alert-icon {
        width: $icon-size;
        height: $icon-size;
        background-size: $icon-size;
        background-position: center;
        background-repeat: no-repeat;
        margin: 0 5px;
    }

    .alert-auto {
        width: $icon-size;
        height: $icon-size;
        margin: 0 5px;
    }

    .theme-info {
        @include theme(#d9edf7, #31708f, #bce8f1, url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAADaUlEQVRYR7VX4VnbMBB9NwFhgsIEVSYgnaAwQekEyF6gsEAsJmiYoGECwgQRExA2gAmu35PlWHGcyKZf9YuPyLp3d+/e3QlGHGOrSwDfAZwBmAhg+LkCHsA7gA1El74qH4c+K7mLxlY09gvApQCT3P0IiGCWAArvCv598BwFYGx1C+Bm17C+1R4LvU6Omjoi8qX5p9ZRcd4Vd4cQ9AIwtqKnT02Ia6/0ARA+1jG8+7SxlQHUCuRHAoTffOuLxh6A+oFgPIRboY+AWO+KzZDwN3fq1KkTCDlDnvD7q64DOwCi56+t8ZBDN8Zw966xlRWgSkBM00hsAXTDrsBP74rFvxhPonEtwO+mYrwrps1vKYBbqdnOcI3y3NjqGsAFRFe+Kh/6QHciceddQYIjAIiltmbomXPvStb7oMNKaYBH8AxxL1GNnS/JiVgd50xFBDBfNKxVgD8MJpyx85VALhLGk2jUgL1DRwV4barKu5KpAaZ2/g7ICUuN/xzkerzE8Lf51Wfvytmx742tnWUUvCtOhfIqwJ9c+I4/GkoXOY2I6aZgraO9K2kQAfq2diVld9CJvLkhheIHJO5RkWoeTiJ+TwAhh2PIZ+ycAkPj26PIh7+53JJRn2Vq59T1rwpsSyOTQwrTBJCFAE8t+cYAqCuHPUWmttKYjywAyrRAF2tXmjZ1NYQx2pGW7mgAse+zy20lOwI4zbXeNgWtdoxOQWTyVt/Tmh7E3lr4onjpy6dIOLXzTafvHxSfPlA7JEyEYeNdcZ7zwthqlpJvbPny/U4ZjhOiHukN5I0NiU6scqK1I0QdREelONXytvzAqM0EahUyyxExEb6PtSs52JIUw5rRfvhD+S0Fej7M+IFmxGFEoCTWCR/0rrjqJ0/7QCJA996VNsed6Ghox4B+KORs245jaQ0aSOrdQGeAsGUT7KDWfXQgSZpEkOUoLP9lJAP0hUra2NwbSptUBBCi1lfl/ZDwHrqTes6SVYjpHUoTmaTer8iHGIlmwxkU6uQdtvZKgDjeBeOXR8fy5GOSkiBCOiIQTsj3uZ4f9wpuU8lkpS+HqiS7mrG+m2hEIGxEFJvu8MG8UiWT/TGwndtUmID7zpDldFJvOAxlnZb8oWEup2Gj+vxy2jXUliA413EoiSliiMMiyipaHZqK+4D/BQyNBfAhGj+8AAAAAElFTkSuQmCC))
    }

    .theme-error {
        @include theme(#f2dede, #a94442, #ebccd1, url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAABiUlEQVRYR9WXTU7DMBCFZ6xWYkePwA3oEZxS1sCmghXlBnASuAHpqtANsKZqcoRyk7JDKvIgIyVqfj3jVDJkmdjvfR5nxmOEwA8G9ocKwIvWg20fj/tb+rhI082+AJt0CwCLUz0kgwkgDoBog4R3k9Uq7gqxGI2mhHSf6yqKJu/p2uoWAJ5PohgQr3cN0cBNF4hfcwWPu5oE9Ha5TM4rAE/j6BUBz8or9oWoM7fajQDzsdYKVFIXcilEk7nVNmCiq2WaViJgX7RN5EJINGrTUCJQjpZ0bmMdkAr5Rq+1EEkgJGMLWebKcY4wZ0yTD6sUtxkQQYwIU9/MYQG49tfXvDYN27akLRK+1ZMdgczABcGtFZne/wJwrT5fleAAY0eAay6FYAG0mhPNyke4BMIJwCkynDFehUgiLBnLKsU+gj5z/t5x7LOKLj1BIQLBW7LgTWnwtnyu9ZHqKXthOASATzRw2+VOUDrAHnJdNLr2YpJNsP/CwTes9301++rBsKzrrISulq3r9+AAP+vrYDBx5WG7AAAAAElFTkSuQmCC))
    }

    .theme-success {
        @include theme(#dff0d8, #3c763d, #d6e9c6, url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAACJUlEQVRYR+2WT07bQBTGv2c73VCpuUFzhCwhOMK9QTgB5ARQiUTsoLvKZpGeADhB6AmSyk5g13CDcgOQYBNiPzRuHE2M/4wBhw1ejt+895uZ730zhHf+6J3r4wNg5TuwfrheMwJjxwddX9ruxUoBGp1GXYM+AKEqtOfZLq0MIF4czH88x7NWArDRbbZ0xmm0cma+eXg06pPe8LZ0gEanuasRTqV2vwvYt8bOeCLGSgVIKA4E/M078YYRUGkAjY7Z04j2ZKMLGO2x457JY6UAbHabZwTsLBfnX2PH248775sDJBVn4Hxku7tJtv9mAPV9q/q5MuuDyJILMfj6YWpYQvGlAYjia5XZgIjqsSJ391O9llZ80QWRYJh54uuz7aufV/9Ub8ms4nK7peULj8DsNnkRwLj1CW3h03kQwt2I9D4BtXisD2yr5AgBkoQD8LFnez/SIJ5ZqxSY1G6ZOzDfxgkRfV0O5Iv7qdGOn2FW8SzFZ4owTEr633iQ0AUjaEfWmehu80nM+D1y3Fbe0aUakdk1jwE6epZgrgtiVGO+Lkknu90yj0D+aXbMIYi2iqwCQG67KQOEhvLJF234RRFi6XZTnLMIS3RC88C0oNFAJZlquynvQBSYqgcpEyP4PrJHPRXQwgChQWXooWi7vQjg/wu2Il4uy3qYv+des/Jobu5tGL7ngH40Ie92KwqVCyASRuYjivvarFXkssoDUgLIS/Ka/x8ATwoX+SE6YBZdAAAAAElFTkSuQmCC))
    }

    .theme-warning {
        @include theme(#fcf8e3, #8a6d3b, #faebcc, url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAC0klEQVRYR8WWsXLTQBCGd6UkRSjIG2A/AXaXyAXJGyRPgGkZeXCKSEOFUzESRZyxhhbzBJgniCmspENvEPMGpogLsLzMnSTPSdbpJBODGs9Yd7pv/9v9dxH+84N/c75rHr1h+y3v9nrT72wM4JhGDxHfRQfTK2vgDzeB2Ajgqts4+B0+uQeAg/jQ2a7+UD/vB7OqEBsBpKOPNSC6tD2/t3WA993Dmh7qLHogop/sFxGfAsAs1MPm2/7dtApEZQUcszVEhJcxwGUMwHOBCD7b3qS9NYAP5uExoX4T5R39sDy/xvNhsR8A4jP2d6iH9SoqVFLANVs3gHCczXy3Y7QB8FMEBmPLm5yUVaE0QCp6oG/WwI9BoqMcsxUgwnN+JRSeXHh34zIQpQGcjnGPgDXZAZnrCSzPbz4aQEpioK/WwD/N+7jbMcYA+KKKOSkVyJpOkmSsHLVQ4wm5p8+bzITc10YDdPwepQJN7YFfV6mgBBBNRywzUXLxzrNlqjKnQgAxemY6ezvzWmK3MgCuzEILEnNSWXQhQFE0MoCoIoRGRXRteX5XdhVSANFymens7swbYrMpAmDK/VrsT2MVCs1JCiAznSSSIgCuQqfVRYCr2LJHtuef5amQC5BnudnNKgC23jWNaWLRMnPKBRCjl20sA+CYR6eI2pcii14DyJjOmuUmSog1DyE1rY9+oDInouWZ7d2OxHVrAKLlFn2YS8yMh82EksPZO1GpPHNKAchMJy+ySF7k5YW07BU1n1Q5A5zbg0k/+eYKQGa5svqNfB+GRDRDxLasP7D9qZIGSM2PK4B09Or5jgGwyHmZodbLtucsuGsafUDkYzwJ8yMHyM55ouVKFeCNB6IhNIReUR6wJRlzWs2PHKDojlTdrMr7vBzDMqZT5RDVWtGcWJVh2nJV2x/5PcEYHdNgWczm+n/+sBaPzExIg9wRa9tEuISRciLaNsQfFAjn+xNADd0AAAAASUVORK5CYII=))
    }

    .right-top-enter-active, .right-bottom-enter-active, .right-top-leave-active, .right-bottom-leave-active {
        @include transition(0, hidden, $item-width)
    }

    .left-top-enter-active, .left-bottom-enter-active, .left-top-leave-active, .left-bottom-leave-active {
        @include transition(0, hidden, -$item-width)
    }

    .alert-fade-func-linear {
        transition-timing-function: linear;
    }

    .alert-fade-func-ease {
        transition-timing-function: ease;
    }

    .alert-fade-func-ease-in {
        transition-timing-function: ease-in;
    }

    .alert-fade-func-ease-in-out {
        transition-timing-function: ease-in-out;
    }
</style>

<template>
    <div :class="['alert-warp', 'alert-warp-' + position]" :style="{ zIndex : index }">
        <transition-group :name="position">
            <div :class="['alert-item', 'theme-' + item.theme, 'alert-fade-func-' + easing]" v-for="item in list" @click="close(item)" :key="item.time">
                <span :class="['alert-icon', 'icon-' + item.theme]" v-if="icon"></span>
                <span class="alert-content">{{ item.content }}</span>
                <span class="alert-auto" v-if="!item.auto">&times;</span>
            </div>
        </transition-group>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                theme : ['success', 'warning', 'error', 'info'],
                posArr : ['left-top', 'left-bottom', 'right-top', 'right-bottom'],
                fadeArr : ['linear', 'ease', 'ease-in', 'ease-in-out'],
                position : "right-bottom",
                easing : "ease",
                list : [],
                maxLength : 8,
                index : 999999,
                timeOut : 5000,
                timer : null,
                icon : true
            }
        },
        watch: {
            'list' (val) {
                if (val.length === 0) {
                    clearInterval(this.timer);
                    this.timer = null;
                }
            }
        },
        methods: {
            setTimer () {
                var vm = this;
                this.timer = setInterval(function () {
                    var temp = null;
                    for (var i=0; i<vm.list.length; i++) {
                        if (vm.list[i].auto) {
                            temp = vm.list[i];
                            break
                        }
                    }
                    if (temp === null) return;
                    if ((new Date().getTime() - temp.time) > vm.timeOut) {
                        vm.list.splice(i, 1)
                    }
                }, 400)
            },
            init (obj) {
                if (obj === undefined) return;

                if (this.fadeArr.indexOf(obj.transition) !== -1) {
                    this.easing = obj.easing
                }

                if (this.posArr.indexOf(obj.position) !== -1) {
                    this.position = obj.position
                }

                if (typeof obj.timeOut === 'number' && obj.timeOut > 0) {
                    this.timeOut = obj.timeOut
                }

                if (typeof obj.maxLength === 'number' && obj.maxLength > 0) {
                    this.maxLength = obj.maxLength
                }

                if (typeof obj.index === 'number' && obj.index > 0) {
                    this.index = obj.index
                }

                if (typeof obj.icon === 'boolean') {
                    this.icon = obj.icon
                }
            },
            open (obj) {
                if (obj === undefined) {
                    obj = {}
                }

                if (this.theme.indexOf(obj.theme) === -1) {
                    obj.theme = 'info'
                }

                if (obj.auto || obj.auto === undefined) {
                    obj.auto = true
                }

                if (obj.content === undefined) {
                    obj.content = 'undefined！'
                }

                obj.time = new Date().getTime();

                this.list.push(obj);

                if (obj.auto && this.timer === null) {
                    this.setTimer()
                }

                if (this.list.length > this.maxLength) {
                    this.list.shift()
                }
            },
            close (item) {
                var index = this.list.indexOf(item);
                this.list.splice(index, 1)
            }
        }
    }
</script>