<style lang="sass" rel="scss" scoped>
    $toTop-size : 40px;
    $toTop-bg-size : 20px;

    #toTop {
        width: $toTop-size;
        height: $toTop-size;
        border-radius: 4px;
        background-color: rgba(0, 0, 0, .4);
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACa0lEQVR4Xu2b71ECMRDF93VgB2oH0oF0IB1ABWoFagVqBdIBdCAdiBVoCXawzs4cyDCXy2Yvf3Bm84UPCbns73Lv7eYA1LAx8xkRrQBMWy0DrS7cBf9ORFdEtASwaLGWlgDeiGh+EPQTgMfaEJoAYGYJ9KEn2AWAZU0I1QEws9x1uft97YeIpgC2tSBUBcDM8rzLcy/iF2oC4RKAfBZv1QB0ovcVCX4XsOwA2QnFIVQBcKT42rtaxRlqAVgR0Y028prOUBwAM78Q0a0h+N1XijpDUQARxU9hMinlDMUAdIr/kRJlxBkEwnem+fbTFAHAzBdEJMEP2V1qLEWcITsAo+JrYawBzLSDNeNKALAqvma9MuYVwJ12cGxcVgDMfFzgxK5v7c/mDNkAZFR8LZQszpAFADNfdzm+dvE5xmUpnEYDUBY4OQLum2O0M4wCUFjxtdA2Y47UxgKQ0la2f+tmLpzMACoqvhauyRlMABoovhaCnCFstINlXDKARoqvjSnZGZIANFZ8LYQkZ1AD6BRfChwpdE69bQFMNItMASDBy6Hmf2kqZ1ABOEHF196EewByIhVsUQDMLJXXs/aKJzhuBmAdWtcggE70BgkGJhadOC8A45OIUo/KZfw8dMQe3QGWIAZefVmmO/xOss/HLugAYoQs/b4Dwm9/LTz9ETgg4BqQWuzEtpyLYIyQpd9F0EUw+Bsgy4ZyF3AX+CPgNug2mHjoGRMdzwNihCz9ngd4HuB5QOjH0JYnyhMhT4Q8EdoT8EzQM0HPBNPe/8dsx1PhGCFLv6fCngp7KuypcOCPkRZJ8VrAawGvBcrVAr/h1EtQATO+kwAAAABJRU5ErkJggg==);
        background-repeat: no-repeat;
        background-size: $toTop-bg-size;
        background-position: ($toTop-size - $toTop-bg-size) / 2;
        position: fixed;
        bottom: 50px;
        transition: .4s;

        &:hover {
            background-color: rgba(0, 0, 0, .7);
        }
    }

    .bar-transition {
        opacity: 1;
    }

    .bar-enter, .bar-leave {
        opacity: 0;
    }
</style>

<template>
    <button id="toTop" v-show="show" transition="bar" @click="goToTop" ref="top"></button>
</template>

<script>

    export default {
        data () {
            return {
                show : false
            }
        },
        methods : {
            goToTop () {
                this.scrollToY(0, 1000, 'easeInOutQuint');
            },
            scrollToY (targetY, timer, ease) {
                // http://stackoverflow.com/questions/12199363/scrollto-with-animation
                var scrollY = window.scrollY,
                        scrollTargetY = targetY || 0,
                        speed = timer || 2000,
                        easing = ease || 'easeOutSine',
                        currentTime = 0;
                var time = Math.max(.1, Math.min(Math.abs(scrollY - scrollTargetY) / speed, .8));
                var PI_D2 = Math.PI / 2,
                        easingEquations = {
                            easeOutSine: function (pos) {
                                return Math.sin(pos * (Math.PI / 2));
                            },
                            easeInOutSine: function (pos) {
                                return (-0.5 * (Math.cos(Math.PI * pos) - 1));
                            },
                            easeInOutQuint: function (pos) {
                                if ((pos /= 0.5) < 1) {
                                    return 0.5 * Math.pow(pos, 5);
                                }
                                return 0.5 * (Math.pow((pos - 2), 5) + 2);
                            }
                        };
                function tick() {
                    currentTime += 1 / 60;
                    var p = currentTime / time;
                    var t = easingEquations[easing](p);
                    if (p < 1) {
                        requestAnimFrame(tick);
                        window.scrollTo(0, scrollY + ((scrollTargetY - scrollY) * t));
                    } else {
                        window.scrollTo(0, scrollTargetY);
                    }
                }
                tick();
            }
        },
        mounted () {
            var vm = this;
            vm.$refs.top.style.right = "50px";
            window.onscroll = function () {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTo;
                vm.show = scrollTop >= 200;
            };

            window.requestAnimFrame = (function (){
                return  window.requestAnimationFrame       ||
                        window.webkitRequestAnimationFrame ||
                        window.mozRequestAnimationFrame    ||
                        function( callback ){
                            window.setTimeout(callback, 1000 / 60);
                        };
            })();
        }
    }
</script>