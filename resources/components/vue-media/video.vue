<style lang="sass" rel="scss" scoped>
    $color-border : #e5e9ef;
    $color-over : #00a1d6;
    $color-load : #8adced;

    #vue-video {
        overflow: hidden;
        background-color: #000;
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        border-bottom: 1px solid $color-border;
        position: relative;

        .v-mask {
            position: relative;
            cursor: pointer;
            display: flex;
            flex: 1;
            align-items: center;
            background-color: #000;

            video {
                background-color: #000;
                width: 100%;
                height: 100%;
            }
        }

        .v-tool {
            height: 30px;
            background-color: #fff;
            border-left: 1px solid $color-border;
            border-right: 1px solid $color-border;
            font-size: 13px;
            display: flex;

            button {
                width: 40px;
                height: 100%;
                background-color: #fff;
                background-size: 20px;
                background-repeat: no-repeat;
                background-position: center;
                transition: background-color .3s;

                &:hover {
                    background-color: #e6e9f0;
                }
            }

            .v-range {
                background-color: $color-border;
                width: 100%;
                height: 100%;
                cursor: pointer;
                position: relative;
                border-radius: 4px;

                span {
                    border-radius: 4px;
                }
            }

            .v-dot {
                position: absolute;
                display: block;
                width: 14px;
                height: 14px;
                border-radius: 50%;
                background-color: #fff;
                border: 1px solid $color-border;
                cursor: pointer;
                box-sizing: border-box;
                transition: box-shadow .3s;

                &:hover {
                    box-shadow: 0 0 3px $color-over;
                }
            }
        }
    }

    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }

    .fade-enter, .fade-leave-active {
        transition: opacity .5s;
        opacity: 0
    }

    .v-tool-full {
        position: absolute;
        bottom: 0;
        left: 0;
        border: none;
        z-index: 2147483650;
        width: 100%;
    }

    .v-btn-playing {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABkklEQVR4Xu2awW0CMRREPxUkJdGNtSdCBaQErv+WVqgIaMCJkIjEBZ6lHWFLHq4D49mZZ067ick/m8mfP1yACZi8AV+ByQHwn6CvgK/A5A34CqwFIDO/I2IXEZ/gdam17pdl+Xn1PbUfPd9qAjLz3PDw/zlOpZQtFCD1e0cBv3TIg95SgNSPsikIkAbOTKmfC4AGTAAhQroaWbUf5TcB1BDp6sXUfpTfBFBDpKsXU/tRfhNADZGuXkztR/lNADVEunoxtR/lNwHUEOnqxdR+lN8EUEOkqxdT+1F+E0ANka5eTO1H+U0ANUS6ejG1H+U3AdQQ6erF1H6U3wRQQ6SrF1P7UX4TQA2Rrl5M7Uf5TQA1RLp6MbUf5TcB1BDp6sXUfpTfBFBDpKsXU/tRfhNADZGuXkztR/lNADVEunqxzLxExAede9fxnSPyURBwe03uQAdFxLXW+tX4mlyL3+3IfSnl2HD206+sLmDN4SP81gWMsELPDCagZ/sjnG0CRlihZwYT0LP9Ec42ASOs0DPD9AT8AYaCnFADEBKrAAAAAElFTkSuQmCC);

        &:hover {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABnklEQVR4Xu2aQU4CQRREf59Aj+SBIECcDbPRlWyIMZkLeBVPJF6AJgGiu3mTdJnupIttQXVN1WtWk6LzT+r8+cMFmIDOG/AV6BwA/wn6CvgKdN6Ar0ApAKthfE05NpHicdYrxyly7Kb3t8+576n96PmKCVg/j9/48L8p8td0PDzNhVL7/X8Bw5jpkD99QQFiP8pWToA48Frs5wKgARNAiJCuRlbtR/lNADVEunoxtR/lNwHUEOnqxdR+lN8EUEOkqxdT+1F+E0ANka5eTO1H+U0ANUS6ejG1H+U3AdQQ6erF1H6U3wRQQ6SrF1P7UX4TQA2Rrl5M7Uf5TQA1RLp6MbUf5TcB1BDp6sXUfpTfBFBDpKsXU/tRfhNADZGuXkztR/lNADVEunoxtR/lNwHUEOnqxdR+lN8EUEOkqxdT+1F+E0ANka5ebDXsTynSA5170/mdI/IpJuD6WlvECx2UI/+kc9ouek1ugd+9gN10PHzQ2XN6cQElh7fwWxfQwgo1M5iAmu23cLYJaGGFmhlMQM32WzjbBLSwQs0M3RNwAQRc6VBR5skLAAAAAElFTkSuQmCC);
        }
    }

    .v-btn-paused {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAC7ElEQVR4Xu2az5XbIBDGgQMck+1gO4g7yKaCtGBfjHSzK4jUgX2SdNK6A6eDdQVxOtjtIHv0hckbPylPb5MsSOgPYPkqJDM/vm+AAUpu/EdvPH4yA5gVcOMEWlmgLMuPl8vlM6V0AQBnIcRptVr98pmhMYCiKL4RQpK3wQLAoxBi6ysIIwB5npeU0uU7I40q2HHO976B0ALIsmzJGCtNZA4Az5TSREp5MGnvQhstgKIofhBCFm06CwBPAJDGcfzU5r0p2poAgK4dw/xQgXju+o2h3xsUQNV5p/PDGACuHFzND6MBaEj5rJTaupIfpgBQszhWICbND1MCqEEkU64fXACAIDBRbqZYP7gCoFbD6PnBNQD1jIELqVUcx4PnBycBNGYM3F+kQ+4vXAdwzQ8AkERRtB9iVegDgD8LqcoWve4vvAFQjz5utBhj2/V6fe5DEd4BaIDopRDjLYDmRktKmXZVg+8AmhutrZTy2BZEEABs8kNQABqjj2U5I1uECgBZoCV2OkuEDIBwzu90q8igAZioIHQAqZTyr8Ocpi1mALokURRF57K47ttDP1dKfdHVHoNVAAD8jKJIe6ATKoBXpdTCpKASHAAA+C6EWOqmv9p+wQBAyQPARuf5t3knBAAodwz8sUtS9R1Ayjnfmcr9X4B8BXBQSiUmSU6nCt8AnKrAe6sL+gLgpQq8k8/fU4HrAF6ru0dWPvcVQG8+9w1A7z73BcBLdULcurCpy/SuA7j6XLdvtwnSZQAHzvnGZiFjC2aqWeBEKd30dbxlA2FsADifL9tuWGwC1L07FgD0OdbqtWVqXYf7fj44AADYCyGSKX0+VRLE+RzlPvg1FxtVaBWQ5/mRUvq1xZ8453MrBWRZds8Yw8sIHzQQrAoTLQD32lSrAPy3LMseGGO4QvsfBOvCRK9RtfiYEYAKwj3O3YSQB0rpJ6zBEULwOtvOdZ9bWaAFTC+bGivAy+gMOj0DMIAUdJNZAUEPr0FwvwEUy7JQSJuGMAAAAABJRU5ErkJggg==);

        &:hover {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADDUlEQVR4Xu2aTXLaQBCFXyNFXia5QW4QbhDnBLkC3kOVlLBwsYnYgKsCKVFWsrV9A3IDOEHIDZwbkHWE2iXZ/FQce0Z/aGaALTOD+tN7Tz0jCAf+oQOvH0cARwUcOIFMFnBd/1Vs/30Xg5sN0KIRvZgHgb/UmaE0gHa395kA/1GxjGtr5Xi6gpAC0PnUuwKh9eSdZiyZENiRM9ENhBBA52OvhQaupGTOfBsD/rfx8EZqvAKDhADa3d5PAppZrpXBM4D74ehilmVeHWOFADrdHue+sDQf4n4QXNzmXqPiidUCSC5e8XyoHsD6DiqaD/sD8ACCgQUQe6rkw94BbAXBU3vFXt35UBuADQjAr7N/qB1ACoKxjMFuHf2DGgBqzAelAGxtwTM74rN95IOSALa9DwdWdNKvcn+hOICHRgrww/FgUkVTqD6AnUaKic/K7h/0AbAJSp7FRN73L4NFGYrQDsCm6JIOYvQFsLPRCkeDfl416A1gNx8ALxwPp1lBmAGgQD4YBWB3fyFrCyMB3INg73I0DESWMBgAYEXOa1EXaTQAGRUYDYCBfjgaPH6Zs+OLIwBRSBQ6FhctXvH3jPi9aO9grAKY+Vc4Hgpf6BgJgMF/7IibMgcqJgL4YUVOS/T4W7vPGACJ5EHsijz/b+xoDyCRO8XkXn4dXOfJVK0BJM95O3ICWbn/D5CWAJj5xl6xLxNyIlVoBoDnDPaz+vw5CFoAYMZvYvh5fa4tgCTgAEr+e1TI51oCKNPnmgEo3+daAEh8DrCb52BTlPRKA1j7XLRvL1KksgDufX7iFmlkioKp6THI8xWRW9brrSIQ9gog9TnFrTIbmSLFJ3P3AiDdsAC+zDF10YKyzq8cADMm9srx6/R5TSHIcyviVhkblqx3Nct4GQUkLxw/yC6qos8LKcB1z99ENi0I9PK5hYoeTMgCLnucUAHJD7a756cATZ+CUMbBRNmFya4nBSBZLFWC1XABPiWit+kZHGhmr+JAdZ8XsoAsSV3HSStA1wJF130EICJk+vdHBZh+h0X13QG5389QxD7b+gAAAABJRU5ErkJggg==);
        }
    }

    .v-btn-volume {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAABACAYAAACjgtGkAAAEmklEQVR4Xu2bzVXbQBDHteI9cQxUEFJBoIJABaGD2BdWOhEqCKkg5CQNFycVkFQQpwJIBZAKYo74sJs3fis/fcysZEmWLNn7Xi5BH7s/zfxndmYtnN1IERA7HmkCOyAZi+gcyGQyOZjP55da65EQ4sBxnKnneePxeDzrwno7BXJ7e3uslLoTQhxlFv9dSjnaKiBhGI5c151wi1ZKvQmC4KltKJ1YSBRFEyGE1QKUUmdBEEwHDcToxS/HcY6LFqqUGgdB8K3ouqb/3pqFoF5orREGCmeZ8VlKeV3mwiavaQWI0YsvK8DANQ4TCAAgiI8VvuKwgKBevLy8YEg9rQBjWBZiyS9WYTMMC6moFxSo/gOpoReNAzEhHhO/c8dxZkqpqzJhvJEo04BeNA4EAO4MjOWzy+Q2LJAwDI9c1710HAdFsTCRWkUcSl5by2UAQFPvKYJCAmnY9EuuP3dZXSC4W35FvHwmhDi7uLh4oCaWAwIA9x1ZRHZ+dYFg7oM5UG5orZ/29/dPqBJDCkgURTdCCHSTTRgsEAD4hPqgtZ65rnvFfW0AwL3QBwbKV9/3cwnjEojRjMdNIGHmQAKhPpoQ4oSDEkXRgxDiLaMnuR31EsiGWQebqTJiyeqCCb9YV8npidZ66vv+WRLWEsgGaUc8P9JCuOhh0wVbMSpbd0kCIcNUhy5U2mUSc2RLjwCAVvKaWE/qnt4BwQUV6AJZegzD8NR1XazH5IbneYdxxOklEKMLmEfkvjilCzEBDmQyWeslEFyg7YtzBWoucGitf/q+j3sep7dAcPIAgEXod1kf4NJzU8bExDM7ZlLKw94D4aJH8otnVw4AZEof60ivLcRoyT9KKKWU3D6Ns6pFktZrIDa32QHJmMmqwhrrTu8tJIqiH0KI94Swkp0/AMBeD24OU2MwQLhIw7kMF3rjFL73FsLtwbZSQ7iShdb6j+/7ZNmTs6hBhF1LHkIWf0xUojaxz1LKRc+51y4TRdEjcdjG4QpGAIDpOVbjU2MQqbulxvFXSpk9kbQAYCkpXkkpb3prIbajFbY2A2dRyZyldy5jmmL3lKvYxLTsvicJhOtjUFuFNv6PKyHmOnLxZLhjWDaIWYtKFpnJjK+NlTPvWKmmanMVLjulLCrZhrCeCuwADAeEsmS2llqgN3wbAhdsq1VuChBCC1gYpjyAvabcuTauZpKqGRiaWC+geqJtM2E7d6Z8iE14rHQtwiU1LK2VZ8/zjgpbmfjQDYJSq7dra7zZzsCSVSVjatj3xH9dWUstII0eh0ianzFP9EHrGRGt9TnXQ63oa40DKTobkspUK056eZuxKvRnstte4fm1gCRdBsOr1vqmtSNVycVyMb9tIPg+jEh7e3sP3MkAak6NnDHLPtiERrSWOvpTy0IqfIDFLWsB0lC0GhYQhGL2ENOKYjs8IDGU+XxeRWyHCST25QpiO2wgseq7rltWbIcPZEWxXZb1qkaMKvetLcrYJlNGbLfiN3dJSEWZ7Vb9KrNEZvtbSln1h0dVPGV5TycuQ2S2p0II3Flj+wCPXY+28pfdtT7lmm7eCAtZ09oqPfY/7gRUbmZDb1IAAAAASUVORK5CYII=);

        &:hover {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAABACAYAAACjgtGkAAAE0ElEQVR4Xu2bXXLTQAzHpSRDHyknoJwAOAHpCegNCK+MM3WJman9QnlJmCGhZpLhtXCCwgkaTtBygoYTEB7bSSLGzkcdR9rYXqepnfrZa3t/q/1LK8kI99ccAbznMU/gHkjIItYOxDSPtgel630kqgDgNgF1S8Ot16571F+H9a4VyJt3zrPiiE4BcSc4eSL63mk1KhsFpPrWqUABTqRJFwejJ677sXfbUNZiIdWacwIISgsgGO12mh+7uQYy0YszBHi2dKIjeN3+XP+29L6Ub7g1CxnrBZwBwnaUORDAh06zfhTl3jTvuRUgvl4gHEeF4U0wt0Cqln0MgGbcVcwdkLFeXJ0iYDkujNxZiBRfxAGTGwtJohccqFwASaoXqwDib9ni1Qki7gFBHwgOorjxVLyMrl6sAohRs099GMErQmwjAjHNw51hCfcJsBwpkIojEBHu1d0yVcsh9jVLoLBA0jT9CHNnb9EFYlh2HwEfLjycoD8swO7XT/UL7sULQAzLOV+HRYQ/ThdI1bJNADzmaVOvONx6zqUY5oAYNcdFhP2kq5rmOBUQw3LeA8AeAPVHiAfSahs1+xsivmI1iuBLp1VfCBhnQMaaUbhMc1I6z5KAcIs2RHiugHKBiE954V48Uc+A3CXrUEWqrFgqdGHiAXucnnjZuU6zsRuEdQPkjmjH9OMkCxG9B8m6oEpGhfMuMyDii3TsXmNsnC0zg6hIPRo1p4cIjxfEOzQmc0C8CRk1W9QFKfVoWIdlhMIZt0bFwYNHU4+TSSDjsPz6gl1xRhemEESQgWAtk0B8K1GuOJ+gVjiOn+1m3Q/zMwvE+/iqZXcB8MXCNhDCcz8tQXDORa/tVv1R9oHIpYzZiocnL4X0Ux3JtIV4WjIsXf/lhLLdrEvnNNaqpu4300BU2+YeSMhMRPcrndcmupMDC3F+AMDLxdMyX/kzLOcIAbzD4fyVHyC8p5G2jOR6c6MhUv5mIzVESlkQ0e9Oq8HWj6XYJRduVzrFkpD8GXulxVwrAf3rNBt+zTnTolqt2ZfhZhtvUlLCyKjZe4h4ysQt2Q/dFdbxp9Oqz3UkBQ53QkqRDtrNhptZC1G2VijKDJJFBWOWzG0ZP1wvXp1zW0UpphHPPYEUolDH0Mh66QyVM2ZMRW7yIqkNSwURQhYVtBA24tOZlM7Y2DlVxVaRolPOom6ALOkK1JlckrGihTAVOVUbp0pvOIsKFarkXGWSSemMES0ktHAqGOOtcn0ptHKxOZM5IB7NAlGXrYnqzC7BWHXl7rAMUCgjUH/qLrlXSGG9F4iVBls7S0uZ3kPvChTd2q6q8KbqgWWzSpN+UhOAzHVZiy6QVNshgubnZbeBcBsQ1c22RF5YzNZQE+wY7bZMFohOw0zcSUxamFyp2h73eboWEtwynntFQvfWWqrmLUrISMUkogvEP9m+dSrDIlxInQHcJ6XSYxZ+sPchVCBXR3/SABJzDfzbVwIkDW+VOyAelImudJOIbS6BBKDEFtvcApklZ6T0v7DRcw9kqvpRxXYjgMQT25u0XhJvkXTMyryM6oOiiO1G/HMXhLQsst2ovzKXR7b0q91sJPrxKOlWmY5by5YJf/SkPcokoh1E7BUHDyob+We37mquYvydsJBVTCzpM/8D6LpZbscd1k0AAAAASUVORK5CYII=);
        }
    }

    .v-btn-silent {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAABACAYAAACjgtGkAAADxElEQVR4Xu3by3HbMBAAUKwO0DFKB04FcQexK4g7iHUiebJdQZIKYp8I+CKnAisVRB1EqcAqQT5KB25mPaBCcfhZQByTgKUZnwxRwNNi8RWI42tPAI4e+wJHkFJE9A4ym80m2+32SghxgYgTAJhHUXTTV+T2CnJ/f3+aZdkjAJwUARDxLo7j6z5QegNJ0/RyNBrNahq9llJ+mE6n69dG6QVEKTUDgMumxmZZdp4kySJoEJMvfgshTtsaGjwI5QtEJIxJGwb9P2gQky9+cDGCBtFaE4T1iBFchFC+2Gw2NKSecbpIuUxQIHXzCxuYYEBc8kUVVBAgrvkiOBAzv6BZ54VNt/BqYpam6cloNLpCxFPXxHgIzqC6TJeh74oyGBCt9WOXoe81iFLqFgBob6L3V1WEpGl6BgBfTeVW4/H45pAVsdaankX7MGsAuIuiaL5b7Zqc8dS7hKlAGcSshf6U6reUUp7bojQsMm92IEOKjqq1jFJqDgCfK74wK5SWFfdyB6K1Jv3WZflrRVA5QrTWtDfyqebzWSiM7YfnIgi+VmM5n1MBQgtEWijWvRpRGBj03J/egFBtlVJLAPhoi8LBQMS/4/H4zCsQs4Je2KDYYFBy9gqEIsMGhcpvt9vGLcs8MvKRyjsQGxTTtWoHijIGlfcShCpu5k1LIcQ7TpIul6nC8BqEKm8mazQcW6HUYXgP4oLShBEEiA1KG0ZoIJwzn9YZrbdJNU+StgdgQohGFK9BHDByx1oUb0EOwGhE8RKEg4GIv8xecO2QjIiLOI7Pi3MU70A4GLRqjaLokjNPQcSHOI6nOYpXIDYYpaTbOHkrongD4oJhifJyjcsbEKXUU/kuWml98tJN6tY1nO5Dm1JFELrPZbUmcFlUcd9T3DFjbIA3YlhEyvfiJnPdJi63DZ2Wq9hCrNviZGEwUf7vurfcCuy0sZyHlUFqTgWsMFpQnqWUJ3u3EBl7lpy2dFKm6qBKa/1NCPFyASfLsockSR5cP4y6IQDQwdyEDqoQ8TpJktUeCCfxuFbA9n2DOdsdCspgQOibNDvVdA5Cf72MPIMCKYY3HTBzwt30x6YzE85jdmUGC8JthYmqWyHEF+57msp5D5I3zowE+ZUFZ5tgQEjAzGkoWpzzT1AghHLoaBUcSD5abTabtrPYym4VJEhhCLdOtsGCuCbb4EFsk+2bALFJtm8GhJts3xQIJ9lKKd/bXrd0ngUW3tjLrzKLFddaV12mc9r4CQKkkFcIhn7QvJJSXvcRHVSX3iOki2+1y2ccQUqa/wCiGWvOOsO2SAAAAABJRU5ErkJggg==);

        &:hover {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEQAAABACAYAAACjgtGkAAAD7klEQVR4Xu2bT1LbMBTGv5d4wrLpDdITlBs0nKDcoHTbiQfTuDPEm9INYQHFHbKHngB6AnID0hPAEcISJsnryPlTx3FsyclgS8Rby4708/c+PT0phM01R4A2POYJbIBEFJE7EMc5qg6s530Au8RcBeHm4rR9kJdycwXy5Zu3XR7xNYhqYQDM+NU5O3bygJIbEPurt4cSLmMHzeiXh5V3vn/Uf2kouQCxm94lCHtJg2WMdjqnJ12jgUz84paA7bSBGg9k7Be4BaGaBkPcNxpI4BeEc1kYRgOx3dY5QMozhnEKGfvF0zWB6jIhEm1jFJBl+YUKGGOAZPGLOFBGAMnqF8YBCfyi/HRJRLsqYaFVYuY4h7WhRfsMbGc1xlXgFCpk1in9rFAKA6TRbF2vU/paA2k0PZ8IojaR+xWnkIZ7WAfou+gcMT2Uh5WDVVbEDdcT79oFuI+g5NC+ma12x55Rus+dxKQDUSBBbsO4m6ubAD1rUNlRhbJ8kckHMyBFUkfcWsZ2vRsAHxczWjUoSStuBnr/gbjencyy/KUUFFWI7ba6AH2Iz1nkoKSVHxj8OANiux6/1GBlficGiAPQ+bJnxddNCp80GIEqmX9rA0R0uNFs9YjovSoUSRh/reFWXSsgk4y4qwJFBYYwZ62ACGWoQBHtB9ZzYsmSmQNlTGcq7YCoQAnylYT6bRTGpP04IotuqlHfEHnTwKIegd7ImPTCdB1RxvS+lgqZdl4kayXmriqUOGUYAUQMQhVKEgytQyYcArJQ0mAYBURmzycteTMCiPoGWHJGq72pyihDZUGoLRBVZchC0RKIJIw/DK4nTckM7nZO2zthWNoBkYEhVq2ds/ae1OzDuLo4O/6sZR6iAkMpeQtB0UYhWWCoQJke49IGiN1s3UfPooVjfxomy9Y1MuEjilKhEmKrr7omyLKokn0mXDFLK4CnwZBVCgM/wgqJLeLKDmDd7RZLiPElTlkYclBCVffEU4HrHq3E+6JA4nYFVGEkQREFZmuwVZs7hZhWs5QYx9qaxG9UeUcEHh/AGdHVxc/jq6w/OAlDH+AqQP3yYOT4/snDHBAZ48naAdXnCrO3WxQohQEivuSkUu0A7OQ18xQKSFje4w1miYvJT9oekHjDXJPCApEdyGR7QED5JPtMUjvtgUwH13DFTIDgyMIqlzFABASR03CJ/VX8xyggAsqqs5VxQGazVfkpcS92WVgZCSQERdlsjQWS1WyNB6Jqtq8CiIrZvhogsmb7qoDImG15UHmretxylURw+mwu/8oMd9x2WwuH6bIWfowAMvOVETtEqDHjwRpuOXmoQ/Qld4Ws46uu8x0bIBGa/wCgzz6+MCD5IQAAAABJRU5ErkJggg==);
        }
    }

    .v-screen {
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADAElEQVR4Xu2ay3HbMBCGsdSI0i1OBXEHsSqwXUGcDqKLQJ6SDuJ0kJxI6MKU4FQQpwLLHTgVRLrpMSIyOyPNKBLxICGJYLi8igLwf/ixALELrOUPtFw/IwDkgJYToCXQcgPog2CWZRer1eqtAdJsNBpNzglyPB5fMcZe6frsdrvPw+FwahpX4RJIkuQSADIAuDGJx3fqACClfDRBwHeklMM4jl9UOg4A4KwvFosnALj0Ufx2TOgCSwgvvV5voHLDAYA0Tb8CwEefxVeA8C2Kok9Fmg4ACCGeGGO4xlTPrA7bqwZj6YQJ53xgC0A2RXwZJ3DOC+NdkQNUALya+f1JMjnBFYDX4m2c4AKgEeJNEKoCsBK/sd9nxhieGy5Mhw/H3/Fw8wgAX1Tnj6LlUAlAnue3cRzjgUP5bDrDnePsDwAMVBCSJPkQBEG2HVRpAHme4wnqu0lVmqYPAPDO9N4pfpdS/oii6E7V9i6EUgBsxWPHQog/Z7C9SuOUc/5aB3cLwRoA/sFm5redCiF054ZTTPw/baqE7b6k0+R8H9AEALpZIACuHiUHNCAG0BLQEKAYQDHAkQAFQQqC/p8EaRegXUBNgLZBx00AP4e9/xqkGEAxgGKAkgAFQQqCjgT+u12g9ZeiOKMlr8W9PgeUvhbfWtoWgs9LoHJiZCcsvOecP+jChBACc3XagiXHMKP7+4xzXpiLdE6NbXqdAsCtrgjKx9RYUb7SOjNUYGkthBqTo4WZ6814fu6n61wAoBmMEPI8v9+U1Z16OcywOiwIgvt9Z6rEowBXAEYIJ1znVk3rxB8LgLcQTOJLAUjTdAIAuvJYY2C0mrIjvWQjXkr5HEVRYelf1UJJLyDYiEfOUkr7QkkslV0ul1j8/MYwSbVCsBXPGPsdhuGVdaksisZi6SAIsDzm2kcIJcT/CsPwTlc1rr0PQDfM53Nd2SzrdDrTOqrF1+u1thqt3+9PKpfLHyk+NaIZ5xuhRqg85aUoAWg4AVoCDZ9A5+GTA5wRNryB1jvgL+d2Il/7xWOVAAAAAElFTkSuQmCC);

        &:hover {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADRklEQVR4Xu2aX27TQBDGZ2JDeKOcgN6A5ASkJ6DcoH1FiYiaIFG/EF6cSiQoKBav7RHgBIQTNL1BewLcNwqxB63VSCXxrmfX+eMk68fEa+/3229n1zuDsOMX7rh+sACsA3acgJ0CO24AdRBsNjt70aO7FypIEeDt10/+eJUg37zzKg7QU9U7nb/lq8GgE2b1K3UKNJvv9ycuniNgTfUAArqNEWvrAFAiGiGgEgIBjdwJHQ8GZ9cyHXMAklF37i4Bcb+I4qd9Ei7gQACiaycqV2VumANQb3kDRHhbZPG6EIjgS9D3m2ma5gG0vUsEqMgArMv2sv5wnEAA46DnV1kAGm2PNkW8jhOGPT813s39KANQtJGfHaQsJ+QCUHTxHCcYA9gU8VkQjABwxSf2i+lDsm9A2MvafOT6nyAU63tcwo+y/UfadDAEEB8EvbORqsPJrozgMpcow8YRQlUGoXHiHUEJzqeP1gcQw/Hws3+R1bdG2/sGAK+y7lvS/9+HPf9Q9uyHEPQAMMWLFzda3q+l216+LofDvv9MBXcKgQ/gxDvijPz0pap9w5JG/b/HyoQ9vElAkGnKfR6wCQBUA2EB5LWpdYDi2yEvXE57TgywU0BBwMYAjs2U66ydAvLzg7xwOe1tDJAcdHDgiXtsDOCSkn5w2BhgY4D0EDWvuzjtbRC0QTD9uJvjHrsK2GXQ7gPsRsjuBGejpeoAMS2ybsKJkNahaCJI51i84Fth/WPxqSAmhCI7wDwxcu91Inod9Lsi8yO96u3TMKtWh7sp0b1P5C6DXjc1F5k/NSZ6QxBGJThQFUEVMTWWlq/kZ4Zm53QGhHUlR2WZ66Q/MfyYTdeZA2A44R5Ch4Bqy54OQjgCjiKEzqwzZeKFhHwAGBB05++i71eJXwyAAkPIEq8FoN46HSOivDyWERgXPbqq53HEE9FV0O+mlv4ZFUpyVodVQOCIT4yrUygpSmUnzp8xIjxXilizEzTE37jR4wq7VFaIFsXSkYsXAPiyiBC44gHopzMpH6qqxpVfg4kb3N/SslkBJ8ZSuJ5q8VhZjeZOnoyNy+VXMX+L8o7c5wFFEWLaDwvAlNy2tLMO2JaRNNVhHWBKblva7bwD/gHC/TJfpvyS+gAAAABJRU5ErkJggg==);
        }
    }

    .v-btn-voice:hover {
        & + .v-voice-bar {
            display: block;
        }
    }

    .v-voice-bar {
        display: none;
        background-color: #fff;
        position: absolute;
        width: 4px;
        height: 70px;
        bottom: 30px;
        right: 40px;
        border-radius: 5px 5px 0 0;
        border-top: 1px solid $color-border;
        border-left: 1px solid $color-border;
        border-right: 1px solid $color-border;
        padding: 15px 17px;
        box-sizing: content-box;

        &:hover {
            display: block;
        }

        .v-range {

            .v-current {
                display: block;
                position: absolute;
                left: 0;
                bottom: 0;
                background-color: $color-over;
                width: 100%;
            }

            .v-dot {
                left: -5px;
                top: -7px;
            }
        }
    }

    .v-tool-time {
        width: 98px;
        height: 100%;
        line-height: 30px;
        text-align: center;
        color: #999999;
    }

    .v-progress-bar {
        height: 100%;
        padding: 12px 0 12px 10px;
        flex: 1;

        .v-range {
            .v-loading {
                position: absolute;
                left: 0;
                top: 0;
                display: block;
                height: 100%;
                background-color: $color-load;
            }

            .v-current {
                position: absolute;
                left: 0;
                top: 0;
                display: block;
                height: 100%;
                background-color: $color-over;

                .v-dot {
                    top: -4px;
                    right: -7px;
                }
            }
        }
    }

    .v-load {
        position: absolute;
        width : 100%;
        height : 100%;
        left: 0;
        top: 0;
        background-color:#000;
        background-position: center;
        background-repeat: no-repeat;
        background-image: url(data:image/gif;base64,R0lGODlhZADCAPfQADIqKVVTUyMYFd/f3+rr68bHyFNRUL6/wH9+f9PT1Ofn5+zs7Ojo6UM/P4uLjP7+/kVCQd7e3/n5+efo6Pf390A8O/v7+/39/UdEQ8zMzfr6+nJxcuXm5vPz9CQZFsrLy+/v8E9MTOTk5Ly9vfHx8s7Pzzk0M9bW16enqJWVlrm6ujQuLN/g4Pj4+Pz8/JOUlG1tbTs2NeHh4qSlpba2t0xJSPPz80ZDQkRBQNjY2WdmZsbGx9nZ2u7v746Oj0tIR/Dw8E5LS6eoqZmZmVBNTUI+Pj05OD46OX19fTYvLiMZFjMsKrKztL/AwNLS03h3d8jJyVJQT3Nyc+Tl5aCgoaurrOnq6qOkpMLCw7q6u5CQkOvr6+7u7t3e3sfIyD87OqKjo2FgX4B/gFdVVZ2dnnp6emJhYTApJ7u8vCohH3x8fK2trnFwcbCwsSYcGXt7e6amp15cXIaGhuLi4kE9PKysrWVkZJqamm1sbCsjIOzt7fLy8omJiTw3NmhnZ5OTk25ubi0kIsvMzJGRkePj5PX19ikgHdna2oWFhcnJyqqrqygeHKGhoqmqqtbX156en4eHh2RjY4yMjcnKy76+v9XV1vHx8Xd2dpucnMXFxu3t7i8nJa6vr5SVlZydncHCwjcxL7S1tfT09E1KSTgyMY+PkJ+foISEhNPU1NTV1eLj40pGRs3Nzmxra19eXc/P0FxaWnBvcLW1ti4mJJaWl4ODg2NiYq+wsIiIiIGAgSUbGFlXV4qKi9DQ0c3OzsPExHl5eXV0dGloaPX19fb29qGiolZUVFtZWWBfXmZlZXZ1dXh4eNDR0VpYWJeXmP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C05FVFNDQVBFMi4wAwEAAAAh/wtYTVAgRGF0YVhNUDw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3MDg4OEU4N0U4NjFFNjExQjY3RUEwQzUxQzg3ODhGMiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo4M0ZDMEU1MTYzNTExMUU2QkM2Q0UwOTUzMEJEQUU2NSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo4M0ZDMEU1MDYzNTExMUU2QkM2Q0UwOTUzMEJEQUU2NSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjcwODg4RTg3RTg2MUU2MTFCNjdFQTBDNTFDODc4OEYyIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjcwODg4RTg3RTg2MUU2MTFCNjdFQTBDNTFDODc4OEYyIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Af/+/fz7+vn49/b19PPy8fDv7u3s6+rp6Ofm5eTj4uHg397d3Nva2djX1tXU09LR0M/OzczLysnIx8bFxMPCwcC/vr28u7q5uLe2tbSzsrGwr66trKuqqainpqWko6KhoJ+enZybmpmYl5aVlJOSkZCPjo2Mi4qJiIeGhYSDgoGAf359fHt6eXh3dnV0c3JxcG9ubWxramloZ2ZlZGNiYWBfXl1cW1pZWFdWVVRTUlFQT05NTEtKSUhHRkVEQ0JBQD8+PTw7Ojk4NzY1NDMyMTAvLi0sKyopKCcmJSQjIiEgHx4dHBsaGRgXFhUUExIREA8ODQwLCgkIBwYFBAMCAQAAIfkECQoA0AAsAAAAAGQAwgAACP8AoQkcSLCgwYMIEypcyLChw4cQI0qcSLGixYsYM2rcyLGjx48gQ4ocSbKkyZMoU6pcybKly5cwY8qcSbOmzZs4c+rcybOnz59AgwodSrSo0aNIkypdyrSp06dQo0qdSrWq1atYs2rdyrWr169gw4odS7as2bNo06pdy7at27dw48qdS7eu3bt48+rdy7ev37+AAwseTLiw4cOIEytezLix48eQI0ueTLmy5cuYM2vezLmz5895n4keTbq06aWmU6tObXS169ejg8KeDbsn7du1ceLenZsm79+uZwIfHvwl8eOqWyJfzlol8+elU0KfHtsk9evPSmLHTnI795Det4P/DO/9I3nxHc+X38jbBgcF8OPHZyCKtqUJ8vNzoHCb/W44FUAg4IACYrDCILS1EgMGBBJYART9acRbBxMwYOGFFhKgBgK0RaEIARhiOEELuGVEnQ8czmYAFs+ZOJ0DKcJmwAEtXnQdjLTNCJ2N1OGoIo01VnRjjK/pGCRFQ+YI5JERYeejjEsyJ2SSP043ZY9EumYkkxA5meVqW0qJJJVQWjkmlkqaOZGXae545otfqhbmclfC2SaXD7FZpZtrkllklHS+Cd2Tf6opEXaQlEHbKCMY2uR1VKRA2waTONrldQ88QNsFmvJ5qHqgZidoqOuNSip1PJ6KnkWqfpdqq56yHwornnXOOpxHthIHXq4lWsdrcjGdCtqwxBZr7LGYBQQAIfkECRQA0AAsAAAAAGQAwgAACP8AoQkcSLCgwYMIEypcyLChw4cQI0qcSLGixYsYM2rcyLGjx48gQ4ocSbKkyZMoU6pcybKly5cwY8qcSbOmzZs4c+rcybOnz59AgwodSrSo0aNIkypdyrSp06dQo0qdSrWq1atYs2rdyrWr169gw4odS7as2bNo06pdy7at27dw48qdS7euXYrP8urdy7fvs6V+AwveW3Sw4cN/fyJebLgn48eDc0KeHJlmYAmFKAcG0eTRBb8zBZe48SYTCc3PJtAAVASHFguBYw6m8EEOjgbKmvRgzGJGnCNRaKGC3ZglYw2vJGGg8yTV4BZkDBwJg6IL5JWULyQggmvwADdwJqD/Ton6mRQqgyPg6FA+ccn2Y2ikb7CgvfuR5S9g+DC/vn2S7dnQwCH92ZeXSPZxcMMUBRoYkoE5rAJCgw5+ZOAHNWhAYYUcGfiMCgEYFgF9Hh7YkYdX+CEiiSXeh1GJPiCwon8ldughMCnM2KKJL5YYSRU67qhRiyE0EWSLGbUoQQMJHInkRS0uUAELhnXxBY1PWtSiDCEQYBgLNeixI494KTmHC4ZpQAiaY7oYUZtwMqZlnHRWVmadePI1Z558uglRn33uCWidgg4aZ6GGtolookJWxCidiz7qYaSS/udopWNSiul4l25aY6eecjhRqJ/eSWp7mp66GJSqltdjq5S9UgrrY0POSmutth52Yq527sorYXcFK+ywxBZr7LHIJqvsssw26+yz0EYr7bTUVmvttdhmq+223Hbr7bfghivuuOSWa+656Kar7rrstuvuu/AeFBAAIfkECRQA0AAsAAAAAGQAwgAACP8AoQkcSLCgwYMIEypcyLChw4cQI0qcSLGixYsYM2rcyLGjx48gQ4ocSbKkyZMoU6o8+ayly5cwYa4MGbOmzZozM97cydNlToo9gwb96VCo0aFEEx5dyjOpQaZQmzqFFrXqzaRWs16dqbUrTpVew8pEKbasT5Nm0z4rqVbtyLZtaRrV1OuBWRkyln4UagHKmyV+JJgFcyYWlAtC9/LkUQrDFyS+WqR1cQjRESIzFiDduJMBil2kdKjoANcliTUBViBx0pNjTQpoYKwwdmVC6ZoXSlwycYwJaZuca4ogwieH3ds7rVD5YUTFVow3NSA3KoESs+cWp0+Hrv32xe7Iv4P/915xPPmJ5s9LTK8eIvvS6OGKyfCSAuKWC55YcbsebpA6LnVgQCUuDbCCbWnF15YUWrikigChuMRKBYIl2F9bQoTg0hACIHMcL8LEdaFaegAwRA5DzHJACFIkcIAbO4gY0W2C1FBBAII8MwEgRRQxA1wKwiWBZi+BsAd8I75n4YxKyuhek/wxCaVZQU4ZVpVWdoVlllltyWVVXn4JVZhi6pVkmVEBhSaYaq45ZnlumglnnEZxR2drOt25k2t6ftVRny9NJeighBZq6KGIJqrooow26uijkEYq6aSUVmrppZhmqummnHbq6aeghirqqKSWauqpqKaq6qqsturqq7DGWirrrLTWauutuOaq66689urrr8AGK+ywxBZr7LHIJqvsssw26+yz0EYr7bTUVmvttdhmq+223Hbr7bfghivuuOSWa+656Kar7rrstuvuu/DGK++89NZrr68BAQAh+QQJCgDQACwAAAAAZADCAAAI/wChCRxIsKDBgwgTKlzIsKHDhxAjSpxIsaLFixgzatzIsaPHjyBDihxJsqTJkyhTqlzJsqXLlw6fyZxJs+ZMmB5t6txZE6dFnkCDyvQJUajRoEQVHl0qNKlBplCROo1KVSrMqliBXs3KdWfLrmB1qgxL1ibKsmhpmkzLdujItnDfwm0bcu7cj1CBVIFVKK0FO20oLO24VMIBGB6iCCGWVoKQG4H4DDjKUegDJ7U29fkzee6DDBs8uBphwSrGoCLu0DGEJMMDuzW3YOoDKgUDrRl5cmmmJJkKwbB3uvhkRwkeL6/Nnub5oM6C4EcJ+TjDwutF6GVLW6+IHfvP7sG/g/+HTXE89PLmyU9MH14ie/VF7fYgAHQLF7oRYTNiQ/PECZobmIJffHPdEgZNyzxBkxmcDPgQbB8skdwDFVQwYRIfOBiTXS2ksYNMiphgQiMyJZIGcGm5BxsYSbywwSIZZLDIBp0kwUhc+QWHRi4viCDTFC+IkcVdOb5HJIFGathQkkc+yKSSDD0J5UJSsqVilWVdiWVYWm7ZVZdeYoVemFmNSWZV3J1J1XVqMrVcm5S9CSduGs3JE1523lQSmUl559SfgAYq6KCEFmrooYgmquiijDbq6KOQRirppJRWaumlmGaq6aacdurpp6CGKuqopJZq6qmopqrqqqy26uqrsMZRKuustNZq66245qrrrrz26uuvwAYr7LDEFmvsscgmq+yyzDbr7LPQRivttNRWa+212Gar7bbcduvtt+CGK+645JZr7rnopqvuuuy26+672gYEACH5BAkKANAALAAAAABkAMIAAAj/AKEJHEiwoMGDCBMqXMiwocOHECNKnEixosWLGDNq3Mixo8ePIEOKHEmypMmTKFOqXMmypcuXMGPKnEmzps2bOHPq3Mmzp8+fQIMKHUq0qNGjSJMqXcq0qdOnUKNKnUq1qtWrWLNq3cq1q9evYMOKHUu2rNmzaNOqXcu2rdu3cOPKnUu37slnePPq3ZvXKd+/gPceDUy4MF6hhhMX9qm48eKcjiM/pim58mSYljMHxqy581+XnkN/Vim6tGCUplP3Nam69bOSrhUDkeB4pOMSxaaEFoEijpJfkUNGzqDDQxBPAyQ/OJHihwdbVSZIFi6ZBA08ujA442FYg5dTJvIE/8tiQ/PHzsNGsDE0qHCMGHISaRDdsXQZMoUBJFDNsbQZJvntl9pGpv2wQ4CtaWRaINwRpl+CGJkmgQAEIAihRaYpIIAFFvJ3kWmOLGHYg65haBoWQYwo4IUTpdaGDirGZmJpd6gRY4kVpYbIHzfiKJFqMKDQI4sQqTbGCEN6+GNqRpSQ5IAtmvaAB3M8aRpFqQEhAAlWloalaRwYkVgDJ8T2WpRmprkZmmq2qdeXbsZ55pJyuglnnWreiaeZeu7pY0R+5slmoEQ+RCifgx7qZY6KQtlno519CGloEU7qWUaWmqdgptPVx6liIH16GUmf1hSnXaimquqqrLbq6quwxjIq66y01mrrrbjmquuuvPbq66/ABivssMQWa+yxyCar7LLMNuvss9BGK+201FZrra4BAQAh+QQFCgDQACwAAAAAZADCAAAI/wChCRxIsKDBgwgTKlzIsKHDhxAjSpxIsaLFixgzatzIsaPHjyBDihxJsqTJkyhTqlzJsqXLlzBjypxJs6bNmzhz6tzJs6fPn0CDCh1KtKjRo0iTKl3KtKnTp1CjSp1KtarVq1izat3KtavXr2DDih1LtqzZs2jTql3Ltq3bt3Djyp1Lt67du3jz6t3Lt6/fv4ADCx5MuLDhw4gTK17MuLHjx5AjS55MubLly5gza97MufPiZ6BDix4d2inp06hHH03NujVooa5jt/Ypu/bsnLZz36apu/dumL6DpwYuvPhpl8aTH1epvLlqlM6jlzYpvfqzktatj8yePST37iC/g/bvKJ47+fLmN6JPn3H9d43u2VuM//5ibycB8uvfn182B/4ABtCDbRj1BkIBCCaooCwCyDZAHgpGiKAEuc0nHQENxjYAANFZGB2GDnLonIfOgaihiM2R2JyJrm0oHUXWsdiaix1OFGOGLaKYoo3VycgajSPyeCGOM+qoHIw9EvmjkckhOWSILwr5oZKpAbmjRDdCWSOWSWoZJJdPnhglmFN6eWVEWYq5JZpdqvklm2HmOCacZbp5JkRpyrkmntVRsIZsezCxJ530aVdRofUdimh1BS46p6KOHglfpMZ5RGlw4V1K4EmaPjfTep6FKuqopJZq6qklBQQAOw==);
    }

    .v-loading-full {
        z-index: 2147483649;
    }

    .v-waiting {
        display: none;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -30px;
        margin-top: -30px;
        width: 60px;
        height: 60px;
        border-radius: 5px;
        background-color: rgba(0, 0, 0, 0.8);

        &:after {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            content: '';
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEhElEQVR4Xu1bjVEUUQxOKlAqECoQKhAqUCoQKxArUCtQKxAqQCoQKhAqECoQK4jzzeQ577J5f3t3u3u3lxlGZ2733sv3ki/JS45p5sIz1592AOwsYAAERGSfiF4REf49JKLnuiz+/0BE75j5boCtdJZYmwuICJR7S0RvVPGcfk/MvLcVAIgIlP5UofSCvsy8tsPIAbuyRfsqrpuDC1xspAWoqX8houOCArdEdKM+D7+HwPRH8f2w16UsQETeE9HXjOLXRPQDf8z8NMYJl9bsBYCIgMW/K8F5a1yCB5g5nHRpH6N93gyAKv9Tw5ndOE78fEjFRQSu9xHupOG0ydKaAMgo/5eIzpgZ5j6oiMifKK8An5y0uFs1ABnl7+EKQ556QFj3BABiaQKhBYArx+eh/HEL4qs2DxFB+ETuEcsNM5/UrFUFgIicExFCXSyjKx9ZggfCN2bGvrNSBEDj/K+pKh+BANN/afYJPkDukZQaAMD4cZIDwjscw+dziigfIOw+i557YOaD3gCIyJnG+/g7Tsdg+5Ip43MNiTiwWD4zM2oTV7IWICK/TVFzy8yllLdmr2t7xiFF5AUHKaJOApA4fXzRpLO7hCskrSAHAIgPNX2QS2aGS0xeRAQmj+wwSJILXAASzD/50w/aJqzA5a4UAKjwUOkFuWZm3OxsjDhc4FpwCgBr/qNdWPRFXERwYMheg7jXbh0AEvn13pjp7hIgiHn3yF7AeABY5O6ZOSbDvvsZ/D0RQXX6Olr4AzMvXOB4AFgGrcqpB9euYkEnGnTCoQeALSw6qFWsPYlHHB7oJHIeACge0MQIUiwoJqGtswknNZ4dAOCuuJLtJESeBdgQuLEWAKMQkYVIYBswHgC2rp4dANvEAdYFHpkZDdr/siNBS541ycNUWd/RxSZ1VVFg9omQRe2OmY825dTjfYqI5bOqVBgkgauwWOZTDGnstKFwG8rhTgSArrsLEc+3t+RKzPYM3YQudylq3WCTL0Vd80+6gPKA1xSZ/MWo3miBxMMoHtRpvxZXENADeBG5CUZdTqccEp3LULTy9psbIxkrmE9rTEGwyQRaTbhcnFSHKGH6Sd8PVlzTHbYVFd5tmsJYt8tkpleKpXwRALUCb0BiMimyiGBizbbtsl3hagsIDzpV4uiWoCePyRWrfHUXu8oC1AoQVsAHdgoD7gBiHJQTCkNb1XNL1QAUQAgzeoOMyeltL9pecazHFpvnlpoAKICAjwEASs61WEPG5Hspn80Ec8ytG0EDJW47hVdgDfgMHaWVAKHroVsNMranjnUxiI1ZxaYp0d4ARMToRYcYO1jEBTNjhLZZRAQA44ImN5hRxfapxZtdwH6RVo44cUuO9lEQqB2Xh89Cwru4jMEf5pBKs0h4F3PJ2TG4EupLAxBZA04J94lx7VBav8/nyO0xiZ4b06/+3pUBMAAQj/rbBLhUs6+vzQVSX6yuAY6AKfe1CigNE4fSS5n64ADEC+rP5gCE/dlc6EKDxYMEnsDA80qiSM4fVu4C1c43kQd3AEzkIEbbxuwt4B+9hiBf8rBjrAAAAABJRU5ErkJggg==);
            background-repeat: no-repeat;
            background-size: 40px;
            background-position: center;
            -webkit-animation: gogogo 1s infinite linear;
        }
    }

    @-webkit-keyframes gogogo {
        0%{
            -webkit-transform: rotate(0deg);
        }
        50%{
            -webkit-transform: rotate(180deg);
        }
        100%{
            -webkit-transform: rotate(360deg);
        }
    }
</style>

<template>
    <div id="vue-video" ref="box">
        <div class="v-mask" ref="mask" @click="play" @dblclick="screen" @mousemove="tool">
            <video preload="auto" ref="video">
                <source v-for="data in source" :src="data.src" :type="data.type">
            </video>
            <div class="v-load" ref="load"></div>
            <div class="v-waiting" ref="waiting"></div>
        </div>
        <transition name="fade">
            <div v-show="ctrl.show" :class="[ 'v-tool', ctrl.isFull ? 'v-tool-full' : '' ]">
                <button :class="[ ctrl.playing ? 'v-btn-playing' : 'v-btn-paused' ]" @click="play"></button>
                <div class="v-progress-bar">
                    <div class="v-range" @click="jump">
                        <span class="v-loading" :style="{ width : datas.loading + '%' }"></span>
                        <span class="v-current" :style="{ width : datas.playing + '%' }">
                        <em class="v-dot"></em>
                    </span>
                    </div>
                </div>
                <div class="v-tool-time">
                    <span>{{ time.cur }}</span>/<span>{{ time.all }}</span>
                </div>
                <button :class="[ 'v-btn-voice', ctrl.isMuted ? 'v-btn-silent' : 'v-btn-volume' ]" @click="muted"></button>
                <div class="v-voice-bar">
                    <div class="v-range" @click="volume">
                    <span class="v-current" :style="{ height : voice + '%' }">
                        <em class="v-dot"></em>
                    </span>
                    </div>
                </div>
                <button class="v-screen" @click="screen"></button>
            </div>
        </transition>
    </div>
</template>

<script>

    export default {
        props: {
            voice : {
                default : 60,
                type : String
            },
            source : {
                default : null,
                required : true
            }
        },
        watch: {
            'voice' (val) {
                this.ctrl.isMuted = val === 0;
            }
        },
        data () {
            return {
                time : {
                    cur : "00:00",
                    all : "00:00"
                },
                ctrl : {
                    playing : false,
                    isMuted : false,
                    isFull : false,
                    timer : null,
                    show : true
                },
                datas : {
                    loading : 0,
                    playing : 0,
                    voiceTemp : 0
                },
            }
        },
        methods: {
            play () {
                if (this.ctrl.playing) {
                    this.$refs.video.pause();
                    this.ctrl.playing = false;
                } else {
                    this.$refs.video.play();
                    this.ctrl.playing = true;
                }
            },
            clickBar (e, vertical) {
                let cur, ret;
                let ele = e.currentTarget;
                if (vertical) {
                    let size = ele.offsetHeight;
                    cur = e.clientY;
                    ret = (size - cur + ele.getBoundingClientRect().top) / size * 100;
                } else {
                    cur = e.clientX;
                    ret = (cur - ele.getBoundingClientRect().left) / ele.offsetWidth * 100;
                }
                if (ret > 100) {
                    return 100;
                } else if (ret < 0) {
                    return 0;
                } else {
                    return ret;
                }
            },
            volume (e) {
                let ret = this.clickBar(e, true);
                this.voice = ret;
                this.$refs.video.volume = ret / 100;
            },
            muted () {
                if (this.ctrl.isMuted) {
                    this.$refs.video.muted = false;
                    this.voice = this.datas.voiceTemp;
                    this.$refs.video.volume = this.voice / 100;
                } else {
                    this.$refs.video.muted = true;
                    this.datas.voiceTemp = this.voice;
                    this.voice = 0;
                }
            },
            jump (e) {
                let ret = this.clickBar(e, false);
                this.datas.playing = ret;
                this.$refs.video.currentTime = ret * this.$refs.video.duration / 100;
                if (!this.ctrl.playing) {
                    this.play()
                }
            },
            tool () {
                if (this.ctrl.isFull) {
                    var vm = this;
                    this.ctrl.show = true;
                    this.ctrl.timer = setTimeout(function () {
                        if (vm.ctrl.isFull) {
                            vm.ctrl.show = false;
                        }
                        clearTimeout(vm.ctrl.timer);
                    }, 5000)
                }
            },
            screen () {
                if(this.checkIsFullScreen()) {
                    this.exitFullScreen();
                } else {
                    this.launchFullScreen(this.$refs.mask);
                }
            },
            screenToggle() {
                var vm = this;
                this.ctrl.isFull = this.checkIsFullScreen() === true;
                this.ctrl.show = true;
                this.$refs.box.style.width = "100%";
                this.$refs.box.style.height = "100%";
                this.$refs.mask.style.width = "100%";
                if (this.ctrl.isFull) {
                    this.ctrl.timer = setTimeout(function () {
                        if (vm.ctrl.isFull) {
                            vm.ctrl.show = false;
                        }
                    }, 5000)
                } else {
                    clearTimeout(vm.ctrl.timer);
                    vm.ctrl.show = true;
                }
            },
            exitFullScreen() {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.oRequestFullscreen) {
                    document.oCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else {
                    document.IsFullScreen = false;
                }
            },
            launchFullScreen(e) {
                if (e.requestFullscreen) {
                    e.requestFullscreen();
                } else if (e.mozRequestFullScreen) {
                    e.mozRequestFullScreen();
                } else if (e.msRequestFullscreen) {
                    e.msRequestFullscreen();
                } else if (e.oRequestFullscreen) {
                    e.oRequestFullscreen();
                } else if (e.webkitRequestFullscreen) {
                    e.webkitRequestFullScreen();
                } else {
                    document.IsFullScreen = true;
                }
            },
            checkIsFullScreen () {
                return this.invokeFieldOrMethod(document,'FullScreen') || this.invokeFieldOrMethod(document,'IsFullScreen') || document.IsFullScreen
            },
            invokeFieldOrMethod (ele, method) {
                let usablePrefixMethod;

                ["webkit", "moz", "ms", "o", ""].forEach(function(prefix) {
                    if (usablePrefixMethod) return;
                    if (prefix === "") {
                        method = method.slice(0,1).toLowerCase() + method.slice(1);
                    }
                    let typePrefixMethod = typeof ele[prefix + method];
                    if (typePrefixMethod + "" !== "undefined") {
                        if (typePrefixMethod === "function") {
                            usablePrefixMethod = ele[prefix + method]();
                        } else {
                            usablePrefixMethod = ele[prefix + method];
                        }
                    }
                });

                return usablePrefixMethod;
            },
            formatSeconds (second) {
                let minute = 0;
                let hour = 0;
                if (second > 60) {
                    minute = parseInt(second / 60);
                    second = (second % 60).toFixed(0);
                    if (minute > 60) {
                        hour = parseInt(minute / 60);
                        minute = parseInt(minute % 60);
                    }
                } else {
                    second = parseInt(second);
                }
                second = second < 10 ? '0' + second : second;
                minute = minute < 10 ? '0' + minute : minute;
                return [hour, minute, second];
            }
        },
        mounted () {
            let vm = this;
            let video = vm.$refs.video;
            video.volume = vm.voice / 100;

            video.ondurationchange = function () {
                // console.log('ondurationchange : 视频/音频（audio/video）的时长发生变化');
                let time = vm.formatSeconds(this.duration);
                vm.time.all = time[1] + ":" + time[2];
            };

            video.oncanplay = function () {
                // console.log('oncanplay : 缓冲已足够开始时');
                vm.$refs.load.style.display = "none";
                vm.$refs.waiting.style.display = "none";
            };

            video.onwaiting = function () {
                // console.log("onwaiting : 播放过程中开始缓冲");
                vm.$refs.waiting.style.display = "block";
            };

            video.ontimeupdate = function () {
                // console.log('ontimeupdate : 当播放位置改变时');
                let current = this.currentTime;
                let time = vm.formatSeconds(current);
                vm.datas.playing = current / this.duration * 100;
                vm.time.cur = time[1] + ":" + time[2];
            };

            video.onprogress = function() {
                // console.log('onprogress : 正在下载视频');
                let bf = this.buffered;
                if (this.duration > 0) {
                    vm.datas.loading = bf.end(bf.length - 1) / this.duration * 100
                }
            };

            video.onended = function () {
                // console.log("onended : 播放完毕");
                vm.datas.playing = 0;
                vm.ctrl.playing = false;
            };

            // 监听键盘事件
            document.addEventListener("keydown", function(e) {
                if (e.keyCode == 32) {
                    e.preventDefault();
                    vm.play();
                } else if (e.keyCode == 40 && vm.checkIsFullScreen()) {
                    let down = vm.voice - 10;
                    video.volume = down >= 0 ? down / 100 : 0;
                    vm.voice = down >= 0 ? down : 0;
                } else if (e.keyCode == 38 && vm.checkIsFullScreen()) {
                    let up = vm.voice + 10;
                    video.volume = up >= 100 ? 1 : up / 100;
                    vm.voice = up >= 100 ? 100 : up;
                } else if (e.keyCode == 39) {
                    video.currentTime += 5;
                } else if (e.keyCode == 37) {
                    video.currentTime -= 5;
                }
            });

            document.addEventListener("fullscreenchange", function() {
                vm.screenToggle();
            });
            document.addEventListener("mozfullscreenchange", function() {
                vm.screenToggle();
            });
            document.addEventListener("webkitfullscreenchange", function() {
                vm.screenToggle();
            });
            document.addEventListener("msfullscreenchange", function() {
                vm.screenToggle();
            });
        }
    }
</script>