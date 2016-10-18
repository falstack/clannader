<style lang="sass" rel="scss">

    .nav-more {
        height: 48px;
        line-height: 48px;
        width: 48px;
        background-size: contain;
        background-repeat: no-repeat;
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABKElEQVR4Xu2V0W3CUBAE9zogFZIOoASnAqCDlAgVXGSJ/IAhWsmOrbvx98r2zc2+F2r+RPP5BQAMaE6ACjQXgEOQClCB5gSoQHMBuAWoABVoToAKNBeAW4AKUIHmBKhAcwG4BagAFWhOYJYKZOZO0knS553nWdJXRFyn+C6dd3Y6F4BvSfuHD18i4vgCwKL5NQDkxEevEfHxAsCi+a0AuEXEWI2nJzOnAMyWXwPAokpnpvX+NQCMmx4Pvt9z4CJp+OMQdPODpMN9uLfv/3cAzge3lp3lFtjaUM7/AMChVTGLARW36syEAQ6tilkMqLhVZyYMcGhVzGJAxa06M2GAQ6tiFgMqbtWZCQMcWhWzGFBxq85MGODQqpjFgIpbdWbCAIdWxWx7A34Ala5gQRdnYE0AAAAASUVORK5CYII=);
        display: block;
        position: relative;

        &:hover {
            & + #box {
                opacity: 1;
                visibility: visible;
            }
        }

        .count {
            background: #bf1031;
            border: 1px solid #b11331;
            box-shadow: 0 1px 2px rgba(0,0,0,.1),inset 0 1px 0 rgba(255,255,255,.15);
            color: #fff;
            font-size: 11px;
            font-weight: 700;
            padding: 0 5px;
            height: 16px;
            line-height: 16px;
            border-radius: 16px;
            text-align: center;
            position: absolute;
            right: -2px;
            top: 10px;
        }
    }
</style>

<style lang="sass" rel="scss" scoped>
    @import "../../static/sass/variables";

    #warp {
        position: relative;
        margin: 0 8px;
    }

    #box {
        opacity: 0;
        visibility: hidden;
        width: 320px;
        height: 370px;
        background-color: #fff;
        box-shadow: 0 1px 4px rgba(0,0,0,.3);
        border-radius: 5px;
        position: absolute;
        left: -136px;
        top: 56px;
        cursor: default;
        display: flex;
        flex-direction: column;

        &:hover {
            opacity: 1;
            visibility: visible;
        }
    }

    .arrow {
        position: absolute;
        top: -16px;
        width: 100%;
        height: 16px;

        i {
            position: absolute;
            top: -16px;
            left: 144px;
            border-width: 16px;
            border-color: transparent;
            border-bottom-color: rgba(0,0,0,.05);
            border-style: dashed dashed solid;
            cursor: pointer;
        }

        em {
            display: block;
            position: absolute;
            top: -14px;
            left: -15px;
            border-width: 15px;
            border-color: transparent;
            border-bottom-color: #fff;
            border-style: dashed dashed solid;
        }
    }

    .menu-header {
        height: 34px;
        padding: 0 10px;

        button {
            width: 100px;
            height: 100%;
            float: left;
            background-repeat: no-repeat;
            background-size: 22px;
            background-position: 39px;
            border-left: 1px solid $color-gray-light;

            &:first-child {
                border-left: none;
            }
        }

        .btn-msg {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACvUlEQVR4Xu1aS3LTQBB9LWVBVpgTEDaAvAgeIq+TnCDhBIQTYE6AjhBuYE4APgHO2i5GlYUF2cScALEiVFlqSqSSCtJIoihCu+zWViP1573pHj01Yc0vWvP4oQlQBqx5BnQLrDkBtAjqFnBtAWvPeuxnd133KMMXY4J509b5eJrsLtvWosz/ZszDuOxXhQETm0REeF0fAKc+b+y7XlY8M41n7wA6XLYEFP4Q86sd0z2+6VslAdN49hWgTmMAzG9C0x2U1xTMySizyxj8pU+chr3uvZYEJNwWADNO+ibYK6+b2GSPCB/anpe8H/aC30B3MEAToAxopSjzKDTdSqFbiS0wscmYCI1tzFVNi6RZe97JcDEHwdlCWxN72wscwFVqgLXJVgZEDGzV+DPumyCq8/UXC8ADbusktx1s6f0EzH3cGRjzIG3sAv/ZL3FzehQWh0DYAWWAMADi5pUB4hAIO6AMEAZA3LyTAZPTTwcec8/lnZf7ozox5Po47F0cUP1JUiTonCjubz8elY1XP4ft7BhELxu9ZO9ZaB69d62ZxDNLIGfyRCK/adQh5PyVHgDG29AER+WAVBFSRUglsfXQBLHKitDUJkMQnjdVbGK82DHB0LVmamdzEN0Xr/guBxzF26EInXdyfD/KaxQdghfXtcDLc0CytQAqHUI6IR449bA5VEWoKpVJYyNrXz+GZPMvb10ZII+BrAfKANn8y1tXBrgwKGZ8mFEZgGBQ6uc8apoRKn6QLvwfu3WKkhTmRBg/3Q5O/okixIz9vgnGK6oI/cmMkCpCOiOkQ1I6JbaqY3I2iUF40qwIVScur3+KLPGMkGu+0aEInfUyLKK6GR8Cxz42o7KycpWwqf18yMgrU6RS/f/KLoFTHxtR+a+WngSlkZG2rwyQRkDavjJAGgFp+8oAaQSk7SsDpBGQtv8TqQppUOjTwr0AAAAASUVORK5CYII=);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACxElEQVR4Xu1aS1LbQBDtHhNnGXKCcINwA+AEwMJypVJIeIPsVZwTREcgK2w2tkSlUhIL4hPEnAAfgZwgyjIEqVOTAJVoRjKVStHGam09cn/e6+nRm0ao+YM1jx8kAcKAmmdASqDmBJBNUErAVgLHH5J1yOCZ7bcsy770Oq8uq0rnOEo2Fq60GvDt4LUzK/plMGAYxgEgvisNgCDFFdiy/Zl+ZxjFZwC4s3AJ+OUQvvXd1uGfvlkSkHwFhNWqAIjgfddz+sU1mjmUwcViBg8ABKnvOc+rExAldI8Azn3X2SyuOzo53VREn+/xPtsS33X+At1kgCRAGDC3BAhg0nUdY6NblhKYAsCcNmbuprqoR6Oz1avGD90irS2UrfBvDNuAM/aAo9HHNaWUboVrVoeJpr7XDsqC0SxAoj5CdSd58GQQXTbzZr/T2U0ru8CDO8ZsUI7CzACwmxcGsEPA7IAwgBkAdvPCAHYImB2wMmAQnm6jgnWbb6hoUiaG3B2H1dU2KGU/STIFTDnMul5rUjRvJGAQJoeI8KbST6Rdf6/9ybZmGCYXgPbkMcV+Z9Ym5PybHkAU+l57XxShQgaW5XN4rh4AACKJ1VoTXG5FKIzHgOhV7dg5QKfnOmNrF4gSrQi94N7xS8QcY/M2usBvWet6Hyi33w0omJW1QG30RlEyOgR7QlClzWxlLIpQAQn5FmCnJrMDwgBmANjNCwPYIWB2QBjADAC7eSsD9IwPIRoDEJRTSnk2qZoR0ifJ7+p6o0xR4ooYiaYHrnP+XxShHHGrt9fSt8jG8/gVoXD+jBCIIiSCiChCtVaElloTHETxDAFfVrerxzkjZAPOOAfoac88g6BsxocIZk/zJ0FRWblN2PAk3gFCY4qUq//f2iWAVDUgKN5qyVGYGxlu+8IAbgS47QsDuBHgti8M4EaA274wgBsBbvs/AcMFZ1DSQ8cFAAAAAElFTkSuQmCC);
            }
        }

        .btn-msg-click {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACkElEQVR4Xu1azXXTQBD+xidyIlRAJBdAOkhSQZIbEgdCBZgKohKSDsIBiVtwBTgVxA1YMhVgToGLhrfKC49od2U/HtHss0ZXrzx/3+yOvv0IA39o4PFDE6AIGHgGtAUGDgDdBLUFnC3wqdoH4bnzN8I3JNGys3Xy6iC41mL8wJto3vbLRkCxyAA69wbAWIHpyPVnzTv54hpEJ8ElwDjE/AHp+OJv3+wE5OV3EHY7A2C+RDqeWGsMckZ8G2TwTQKwQhq/6E5AUfLaABg3SONDa11RHQL8de37kguS+FHRHS2gCVAEbIDQKZLY3ui2ogXycgZC9zHm2E2bpF1Xu/hZLwFyH6EbZPaJl1iFc+wB1R7AGRh77jmAZ0jGmdfRexRMwGtOkieO1Pp7whLPaILTaNV9CvTtmLA9HYWFCyBuXhEgXgJhBxQBwgUQN68IEC+BsANuBHyujsHYd/pWY+olQx7G4TscgzyTpFTAhDleR9O2eQchsrgA0ftOP5lOkUZfnGvy8hbkSZ5U8A92HUTOv/EBwEck8ZkVjzJCyggpJTYMThDYYkaoKK8AvO3esOkdksiss5+8XILwUnrD99i3Nm/7FDC01l195r0b4NHcewQaq4VhlGr7hJDOiLkT2BldKSPUKoR+C0gjU9q+IkC6AtL2FQHSFZC2rwiQroC0fTcCjMaHYAsgyMhjzHdAh0bITJK/cOBllKQiZsyQRjf/hxECHSGJZtvJCG2iEVJGSDVCKpJSldgWy+SMnPRV972Arbhs1oeuEXLoG+054J7bNxohj1qU59gZZW1m5U/C8uqk0QiF9pgZpqasfaulo3BoherbH0VA3xkPzZ4iILSK9O2PIqDvjIdmTxEQWkX69uc3lwMZUB5ikX0AAAAASUVORK5CYII=);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACkElEQVR4Xu1azXXTQBD+xidyIlRAJBdAOkhSQZIbEgdCBZgKohKSDsIBiVtwBTgVxA1YMhVgToGLhrfKC49od2U/HtHss0ZXrzx/3+yOvv0IA39o4PFDE6AIGHgGtAUGDgDdBLUFnC3wqdoH4bnzN8I3JNGys3Xy6iC41mL8wJto3vbLRkCxyAA69wbAWIHpyPVnzTv54hpEJ8ElwDjE/AHp+OJv3+wE5OV3EHY7A2C+RDqeWGsMckZ8G2TwTQKwQhq/6E5AUfLaABg3SONDa11RHQL8de37kguS+FHRHS2gCVAEbIDQKZLY3ui2ogXycgZC9zHm2E2bpF1Xu/hZLwFyH6EbZPaJl1iFc+wB1R7AGRh77jmAZ0jGmdfRexRMwGtOkieO1Pp7whLPaILTaNV9CvTtmLA9HYWFCyBuXhEgXgJhBxQBwgUQN68IEC+BsANuBHyujsHYd/pWY+olQx7G4TscgzyTpFTAhDleR9O2eQchsrgA0ftOP5lOkUZfnGvy8hbkSZ5U8A92HUTOv/EBwEck8ZkVjzJCyggpJTYMThDYYkaoKK8AvO3esOkdksiss5+8XILwUnrD99i3Nm/7FDC01l195r0b4NHcewQaq4VhlGr7hJDOiLkT2BldKSPUKoR+C0gjU9q+IkC6AtL2FQHSFZC2rwiQroC0fTcCjMaHYAsgyMhjzHdAh0bITJK/cOBllKQiZsyQRjf/hxECHSGJZtvJCG2iEVJGSDVCKpJSldgWy+SMnPRV972Arbhs1oeuEXLoG+054J7bNxohj1qU59gZZW1m5U/C8uqk0QiF9pgZpqasfaulo3BoherbH0VA3xkPzZ4iILSK9O2PIqDvjIdmTxEQWkX69uc3lwMZUB5ikX0AAAAASUVORK5CYII=);
            }
        }

        .btn-fri {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEbElEQVR4Xu2aTXbbNhDHZ0i/V2fV5ARJNm2pRSw01NruCaKeIM4JYp/A8gmqnCDKCWKfIPLa8oO0MV+yiXSCKit7EenfB0lU/cEPEARJvSdyS8wA88NgMBiAacs/3nL7qQZQe8CWE6iXwJY7QB0ErS4BKYMXcOn5Xa/685V3sclelguAlN+fzpzbNwS0ibgdbyimRHwGh89ar/443yQgRgAWhvPtP0R0aGDMmJg6/p73yUDWukhmAFej4ATAERE/zTmavgv3WIjfhjn15BLXBrCc9ZuPya6edSyYMvj4tfB6WSVttdcCoIz/yTdfmLhpq+O7ehj0rioIqQCKNj4EwcDxa9HoFgE4SWcqgMEw+GgY7DLb4sIVZceERABX8voIzCral/WNXewKIV5Oy+owFsAq6H23EO0z2QLQaUt4nUxCORrHAriUQYeZTnLoNhZ1QS+F8MbGCjIIRgKoavbX4wZ98oWXmGSpMcK93ctg67opz2gSAo4EUMHaf2AHpn6z8SzOuEsZHDDjc57lGS61SACXMugz074JXWsycP72xe9nUfpsLE+ALlrCO3gEYJXn/2vNEFNFwAdfNI6ixBdjpJse8qXjnZbw+o8ALN2LvpiO25YcCMNWsyFs6YvTEwWgsuj/cJB+00tN1PICqgE8JDiQ111ifp+XrA35MlLjKA+ofgdY0QPoLxWobMDUjgGb5QHFZ4R1DHjoGlcyOASTOgJX+4F++MLLW3ZLtSEiEfrWnPFMpkoW3CDM1JK6WRRrnJsTRrZKFRjDnTl/UOeByH12IIMpMf1asI2J6nWOxQN5fUbMb4zGCZz7otGOA9AjprdGii0J6RyJcwXs1YkzBsDXNvH8syVbsqsBjXzhaRVgVeqevQOicHuNTTUH8npMzPeuuUw6MpEps0ocC6Cy3QCY+KLxwgSciUziYaOSukBCHcDEwDSZRADqtndGNCxtR9AohaUZlPV/6nGztKUAGrm0e1BmSVzBSgWgGhUOoSLjtQEUCgGYuLTTLvtGKFwqWh4QNh7Ir22iuUqS7GSJwLlLTw7Ldvu7cSITACW4CoydXJkiMGHijs6N8KpIq5Iyo4QnOij+fy2fGUCoUErDQ1PGWS+qSBtbFtfZRhbGO/N9Akyus/twuLsz++VCx/WXJfDbPjEZ3QLF2RNmm9oesJpxVStUrmgrU1OG9dz57rkODJ3JydomFcBgFLxVb4LuvQ4BJkQ0BNNzO69Glq/IXNBpWZeiqbvAau2pytBytheBi7ogdwxnts9QL8RyP5R6NGFgdHfmT07L8oi4q7F11FXBwiHqzR3sMRZvAW25/9J40I/H22p5j6fuAbh36woaEZMEoWnHzRNX55hAzyLyi56L3eMivWENYJHkrIsgak0uEsXCi5JpQavoO8I7AHLU19KsyPlfpzxm2sUagNrmftLMZF837VtLjgnDuGtyLQUpjVK3QRudbLKOGsAmz04ZY6s9oAzKm9xH7QGbPDtljK32gDIob3IfW+8B/wHiNN1QqjPIFQAAAABJRU5ErkJggg==);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEiUlEQVR4Xu2aTVbbSBDH/2Ul9jLJCZI5QeAEMCeIs0B+efMiwyaCVeAEmBPEWYGz8Qdv3jzMAjhB4ATxnGDwCYYsg0eqvLZlRsT6aLVast6zvHVXdddP1dXVVU1Y8R+tuP0oAZQesOIEyi2w4g5QBkGtW+C4+9crwzBe+r3qg2XeFNnLUgHodi+e31fu34BQB6geaijjjgmXYLrcbW5dFQmIEgBh+A9j8omA7aTGMPMtAS272egnlc1ifGIAndPzQ7i8D8LzNAti4Lpi4ODDH+YojZ60stIApu5u3HcjXT3pahh3LuFgzzJ7SUV1jZcCMNvrk68grOma2K/HBXaWBSEWQNbG/w+CDmxrq50F4CidsQBOBsOuSrBTMYQMrOcdEyIBdAbn+wB/UjFGRUacEDW3ur6z8/ZORV5FJhSA5/r/pI32iRfFfGQ3G63EcooCoQA6/bMWiA4V9aYScx3nt72dd7eplEgKBwJY2tefL5q5bzcbkUmWWOPEmLyWtPPRMMdxxnPAgQDy3vsLRjDu7Kb5Isy449PzzYrLF6m2p7fVQgAMrwFsqNDVJkP81n7fuAzSp2l73tiWubkAYJbxTf7VZoiiImZ83m2a+0Hi3l2kR1BPx12i1t77resFAFP3Yv6quG59YoyR3TTX9SkM1rQAQJN7aVm3bZmxiVraiUoAvxI86Q/bRPiYlqwO+TxS40UPGBTgBPDouUS/i0ClA2aYjgUARfKAPDLCMgb86hrHg+F2Behm6XaSur/blpmq7CYzz4IHfPlzuMYOvskIZzxmmqlFzeGV6Q4ZlKhSReCR67ifxX0gLBUW9/FnGRsYrV7iWnwyGF4S8EZlnQxc7VpmPRhA/6wHoqaKYl0yMgEwVcD2bpzBAE7P6mC60GVMUj0M/nvXaki5tUjdk+oX4+fHa3hBZDAUBYlHbS6ViVRk8qwShwJY4mkwti3zlQo4FZmYougSssKIOoCKgXEykQBEt7diGKJ1lc+JIFEKizMo6f+x1828toIIfDWnuplnSVzAigUgBmUNYVnGSwPIGMKYDNTz7gjNt4qUB8wHd2b5gejkaokJIhurOU+383Z7f5xIBGDqCSIwViqiaZImUxy7QEumI+wVQC8IUEp4AoOiry2fGMBcoeqlKelXz7BIG1wWlzlGhPHuf9ggQuJ2tngZAqZ2zX1yI+P6Mw+4vyaQUhcozJ55tintAVOjHXwE8yYRacnUBAxi7lXd6pUMDJmPk3RMLIBO/6wJkHgT5L+cjBkYEeOlllcj3isydpyjvJqisaeA2Hvkul3f1x4D1Aa5t2BsgGk7VW8u9FNxu+pUj/LyiMDW2A9j4o+6Ny7Qq4BfM6Ouy/199n9fOFZzfDz1CIC/6yqyM4C+EWNNi5tHbM7p20Ei0Q1+lF8w0Ks5Tw+y9IYHAF6SMyuCMGZPVFK+BUwakELO7Ex7hA8A0tTXtBgaoUSmPKa6hgcAXmKT+FxXnVhWjhmjsDa5rI6ocbHHoI5JiqyjBFDkr5PH2koPyINykecoPaDIXyePtZUekAflIs+x8h7wEzmJ4VDymPrQAAAAAElFTkSuQmCC);
            }
        }

        .btn-fri-click {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEKklEQVR4Xu1azVnbQBB94xxiToEKguwCgAogFWBukXKAVACuAFMBUAHmEPsIrgBTAaYAW6aCkFNy0uRbycYY/exqtZL1fZbOO7M7b9/8aGYJa/7RmtuPCoCKAWuOQOUCa06AKgiadYG+uw3G1yVWOdZjmVmWDYA7dxN/cQh4LRC1Yg1lvIL4HlS7x3drUCZA9AAQhv/zLgE60TBmCqYOHOtWQ9a4SHoA+u45mM9A2Mx4miE8auOHNcqoJ5O4OgA+3b2bRKqnPYrvGtSGbXXTipparwaAbzw/gLBrauNlPfRzVSDIAcjd+BkUzG04zat8AI7XKgegP77RDHbpbfFor+iYkAxAb3wGosv0lmhLTFGnPRxZr9oaUgrGAxBQ3zUQ7VMeiS9gNzsphbSXxwPQH3cAOtfWnEmQLNjWNJMKReFoAFZ2+2+nvoXdSC6ygip0R9HOD0kHL3OAowEo3veXDyjqA6exFWtc3z0A81029wxcLQaAyRCEfS10TQkxHcGx7iPVmXBPxiOcxkEYAL/O59+m7NDWw3wNp3kWKR+csQvOUI4TdWBbwzAAgl7gB+2DmxJkjOA09kypi9MTAcAqo/+HY9oNeaGWEaEKgBCAvfEViE4zAmtGvIDSOMyAXgkywBt89E0EKjNoRmuJAKBEDED+FWEVA0LE6LsnAN/kSTs13fwHdjNr2026VZgBv9xd1PhJKpn3glmllrhN0KY7B1G6ThXzCFS7Fv8D0Xm2P34F6EveNibrV/gt7k9EqXyoec4B7EYrBoCJaFIeayo2JKYQALOlbP+PM+ZnyG2B+M6QJTpqnmE31Gjtl+4a3yy9xpeavckU9GHMpbGPnkhxXeKEjtCKsgHjBU5jWw+49FKSpugKqsKkPkB6+6QSyQCIaS+8UYEZQd4Kk5qUboH8d7O4wugZdToosiUuoJIDIFblD8JKjFcHIE8QRNBjahU9EZo7ihoD5qt7oj7wugZjwgB1Oima9u+jRDoAAiZsAywmN/qVorj1oCkpH4sHDVBRlOkVPFEx8d1YPj0Ac4X6P03pbj2vJm1sW1wliwjjP2EfzDrj7CGIrvAZj0rUDxggukJ6U6BYe4JqU50B/o17pwAJKpqq1IZg6mIDAyUwVC4n5Ro5AD33GPDfBC1+Tnwfxsh/Emfi1cj8FRlqF0UNReVZIPA90RkKblsYDUH52hTw9v1HE9kfSoXvS7jVRu2iKEbEjcYWUVcEC6Iu2NuZPZAyRf+Z8fwnlFYLfDy1DMDy1PUZ4Ccw7RqhebJvTgHeCtcX3EW91s6TDQsA/CJn1gQRNxDUibk3JaUxK+cZ4QKAbP01qR3ZFii0xzQ3WAAg0hxp5XXNrVXFeBQ7JldVkbBOngYNbFJmFRUAZb6dIs5WMaAIlMu8R8WAMt9OEWerGFAEymXeY+0Z8B8z62xQzyPkfgAAAABJRU5ErkJggg==);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAEKklEQVR4Xu1azVnbQBB94xxiToEKguwCgAogFWBukXKAVACuAFMBUAHmEPsIrgBTAaYAW6aCkFNy0uRbycYY/exqtZL1fZbOO7M7b9/8aGYJa/7RmtuPCoCKAWuOQOUCa06AKgiadYG+uw3G1yVWOdZjmVmWDYA7dxN/cQh4LRC1Yg1lvIL4HlS7x3drUCZA9AAQhv/zLgE60TBmCqYOHOtWQ9a4SHoA+u45mM9A2Mx4miE8auOHNcqoJ5O4OgA+3b2bRKqnPYrvGtSGbXXTipparwaAbzw/gLBrauNlPfRzVSDIAcjd+BkUzG04zat8AI7XKgegP77RDHbpbfFor+iYkAxAb3wGosv0lmhLTFGnPRxZr9oaUgrGAxBQ3zUQ7VMeiS9gNzsphbSXxwPQH3cAOtfWnEmQLNjWNJMKReFoAFZ2+2+nvoXdSC6ygip0R9HOD0kHL3OAowEo3veXDyjqA6exFWtc3z0A81029wxcLQaAyRCEfS10TQkxHcGx7iPVmXBPxiOcxkEYAL/O59+m7NDWw3wNp3kWKR+csQvOUI4TdWBbwzAAgl7gB+2DmxJkjOA09kypi9MTAcAqo/+HY9oNeaGWEaEKgBCAvfEViE4zAmtGvIDSOMyAXgkywBt89E0EKjNoRmuJAKBEDED+FWEVA0LE6LsnAN/kSTs13fwHdjNr2026VZgBv9xd1PhJKpn3glmllrhN0KY7B1G6ThXzCFS7Fv8D0Xm2P34F6EveNibrV/gt7k9EqXyoec4B7EYrBoCJaFIeayo2JKYQALOlbP+PM+ZnyG2B+M6QJTpqnmE31Gjtl+4a3yy9xpeavckU9GHMpbGPnkhxXeKEjtCKsgHjBU5jWw+49FKSpugKqsKkPkB6+6QSyQCIaS+8UYEZQd4Kk5qUboH8d7O4wugZdToosiUuoJIDIFblD8JKjFcHIE8QRNBjahU9EZo7ihoD5qt7oj7wugZjwgB1Oima9u+jRDoAAiZsAywmN/qVorj1oCkpH4sHDVBRlOkVPFEx8d1YPj0Ac4X6P03pbj2vJm1sW1wliwjjP2EfzDrj7CGIrvAZj0rUDxggukJ6U6BYe4JqU50B/o17pwAJKpqq1IZg6mIDAyUwVC4n5Ro5AD33GPDfBC1+Tnwfxsh/Emfi1cj8FRlqF0UNReVZIPA90RkKblsYDUH52hTw9v1HE9kfSoXvS7jVRu2iKEbEjcYWUVcEC6Iu2NuZPZAyRf+Z8fwnlFYLfDy1DMDy1PUZ4Ccw7RqhebJvTgHeCtcX3EW91s6TDQsA/CJn1gQRNxDUibk3JaUxK+cZ4QKAbP01qR3ZFii0xzQ3WAAg0hxp5XXNrVXFeBQ7JldVkbBOngYNbFJmFRUAZb6dIs5WMaAIlMu8R8WAMt9OEWerGFAEymXeY+0Z8B8z62xQzyPkfgAAAABJRU5ErkJggg==);
            }
        }

        .btn-like {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADr0lEQVR4Xu2aTVYaQRDH/8W4kFXMCaKbJMMioZ+wjpxAcgL1BCEniDlB8ATBE0ROIFmDrzELJ8kmeILgShdC5TVfIhGme2YahjfTO990V1f9+l/VH0hIeKOEx48UQKqAhBNIUyDhAkiLYJoCaQoknEAkKdD88XM/w5zvg7eIKc/E7Qyom+k7dSFetsMwlvJ3vp/p7c/a7hO1i29e18PYVmMDA5Dyz1Y/c/eBmSsAbS1wpEOEWqa/eSLETlfH4QfbOASwPX8Md4moamJ71lYgAGpVetT7tti52am4C3aOCuLV2SIIrUvvAMxVH6izJjoOO++DqM0YwDD4+3NDB6cdrhXy7tFsBGrVe3T3BRiseoDGXYc3SqYQjABI6W33iGWI4AeBMbi9wdnSOCVU8Pd0e06gfIDIp4YoCNkd3VQzrgGttncOYC+ck5PRjULeLam/mu0rGT74/+3q+KmtgKb09oigAETZaiNjAWX/tCvMKBWF29BxVBtAxKuv41uYPhN1+RnRAjAqUH/9jMXpu8Obz3VqgRaAlvxVBvXVtrc+jTPv/bZc7SLYlN4xET6tT/QAMz4XhXvs57OmArwaCAd+xmL1nfmkIHIVP5+0ADSl1yDCOz9jcfrOjO9F4fpu2SkAnVVryXVMAZwWhOt7vtBVQNKLYMK3wcQfhFSdaMmrMxDt69SMlfdhrhdErqzjh1YNGAJYnzSwchkaqaADohc6ZFfWh/m6IHILntEee6atgLVRgeYdYIzBCIAaFOdToe7pb1oDxgBGD6JyZRJfMLHDjrD6JjieO463Q2L+uCtyVdOFMVbAFITYXJCCSD9wDRgPHByOcNcB4Zkp9Uj7M187yOZ1Xn+emjewApSxQT1Ar7EyCIwbB86ead6HKoKzFC+kd8iEr5GuqqYxYhztCnf8sqw5KsQ5YN4Mq4AQRfAqnlApMA1kmRCiCj5SAMrYMiBEGXzkAGxDiDp4KwBsQbARvDUAEwhANfQWybghoBK22s8r4JEVwacmCH1OiGCf99sbrQIYHpa87R5wBsJbP2cefWdcOkBZCLdjNM6ws3UAQwiDY7NKB71flxinDjYrQY+3JgyWAmDs0IW8qjCR+jeYuS3orc4k6Om+SwUwVIO6P9yrB9bHT2uDS81GOcy5PgiEpQN4SInb2uSVmbnuIHu4DMnPQloJgLETg5dmADq/4wdZXZ0xKwWg46DtPikA24Tjbj9VQNxXyLZ/qQJsE467/VQBcV8h2/6lCrBNOO72/wF/+4hQZuJ2igAAAABJRU5ErkJggg==);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADx0lEQVR4Xu2aXVLaUBTHz0mAPtauoHYFpSuorEB8ME6nY4CXgk+lK6hdgfik9IUPp+MQH9QVYFcg3YGuoPioQE7npsRhopBzk1yIk/DG5Obc//3d/zn3AxAS/sGEjx9SAKkDEk4gTYGEGyAtgmkKpCmQcAKRpMBx52wTNcgD2WsEmEegAaA2RI0uv3w2BmEY//xl5cnGTW9ssmFQK21fhokt3g0MoNU6X3vIjL+CTXVAWJsnhIhuUNPauXHmsFLZGnIEu7HJtsuIuD73HYIhaNiQie2NFQiAmBV7TOcLxXl7csRSpbq7c7EIQrPTKwFgYxHUJ6GJbrQMbgVxmzQAx5Jj6MsInBVMAO2aaVS8gxCzfq+PDhCgzHHJkzYEQ8xAQRaCFICj1um6punXQQf/KJpgkLOzBTclHMtrIwE1H2jw7ksEw5ydfcdNNekacNy1+giwEUrk9GUCuKqZRkF8bXYsATXc4J+Jy9HJdsDRydmGRtTnBOW2EekwnYVgtp/TkY1Y2NvdvuLoYAOIcvY5wsK0mXWXXxwWACdH9dFfv2Bxep6bZN9wagELQPOkVwTC8zgN0FcL0pbfkssugs1Obx8Qv/t2GqcGRD+qpZ19P0k8B3R6bUAs+QWL03MiOKyVjLqfJh6AriUq6ke/YDF7/rtqGr5LdgqAM2vNF5gCQNSplnZ89xc8ByS+CCZ9GUz8RkjUieOudYEAm5yaseo2BHBZM40iRwerBjgntheUBkoOQw6ErnUDAG85ZFfY5rZqGvOv0TzC2A54MS5gngFcDlIApi6I866QtfubNYE0AOdOcALXK7T43K5Rhw9K7wTdnuN5OsRvVXO7ITsx0g54hBCvA5K09QPXAPfF6eZIrAqvZalH3P42N8nmObc/z/Ub2AEi2LQeiKK4Kgh3qMOGbN6HKoJeikddq6wBtCKeVVY4G6CyZxrOzXLQTygHuJ2uAkIUgxf6IwEgAi0TQlSDjxTAsiBEOfjIAaiGEPXglQBQBUHF4JUBmIEgdmZhl8g7G6AettrPWyUiK4LPdRDBPiH0Ou+3PCoF4DihdbqOunaBgO/9xMw+J6A/NLGLe5VPYrep7KMcgFD+/w8QDw32r0tEnZydqwfd3srQWgoAV1Cze1YHoIPFAoOd6mQGPdt2qQBEx9O6IP4o5b1au0UdimH29UEgLB2AmxL3+qjt3jKLW9xXk2x5GZb3QloJgMeUEDfNAMD5HT/I7HLeWSkAjkDVbVIAqgnHPX7qgLjPkGp9qQNUE457/NQBcZ8h1fpSB6gmHPf4/wDkYHRQbpLaFQAAAABJRU5ErkJggg==);
            }
        }

        .btn-like-click {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADfklEQVR4Xu2aQXbaMBCGf3nVZNP0BE2WMYvSEzScIOQCMT5B6QmaniDkBOBeIOEESU8QugCWJSco3SRdafKkPFNKAI8sy8bP1hLk0cynf0bygEDFh6h4/KgB1AqoOIE6BSougLoI1ilQp0DFCWSTAtH4FPCaIDoA0AQwghBzSDlE2BhZMe6Pm/C801e2IUcIGkMr24BFEez/OoD39zNIdiGECnz9IMwgxADyzRXCoznL4YVt6kDgcLNtmkN4PSPbK8bSKUDtihDXW51b9ZpoDhIhQv9mK4RoGoBkbyvUV7YxA9FZGrWZA9DB49bIwWWHiQboNMJXENSui8dLCNFhqWQtYLRMIZgB6E8PIeR96uBjp4lGoP3WIiVegldQVf1IP7TK9o/YqWZcAwaTWwicpPdw6UnCHTp+S38yGCuodsEv4C7ZZTjKV0B/egKPbhk2+VNUOqiRVvabVpKihfD4juMIH0CWu8/xzGbOsroS7PAA6GPp6beNT7k/K/fecWoBE8CkDQ/XuQdhs6DEWeKRyy6C0fgCEF9t/Mn/WfqGoHGRtC5PAdFEFasgydiOfX+FwO8m+cQFoCrqpyRjO/b9DwR+4pFdA2DtWjlTIELgJ16rmQqoehHsV/0YrPxFSBWKaHwDiFNWzSh8Eg0RNNocN3g1QFkqUxo4eRnSKpjMALznkC1wzgMCf3MbbcUxvgLKogLmO0DMwQzAiwp2+VbIuv0ti8AcgG5Ti/sCJb55aUkf3fYE46V38e1Q4AvO/Z7pxpgrYAFhp1LBWPrpa0D8pO7kPs0g8NaUesbzHyD3mpzuz7p10ytAnwr6B5K7wiAQ/oDoxDTv7YrgKsbv0w6I+hnvKs+cECHOj186yymHnQLiRYuAkEHwyv1sAChLeULIKPhsAeQFIcPgswfgGkLGwbsB4AqCg+DdAYghSOpZH5HqqPNE17babzoksiuC61awvSdkcM4nnY5uAejL0vQQnlTdpA9Jzvz/Pf2E9NoIj1UPwtlwD0BD0D+uqhcV7q9LEeReN+311oRWPgAWF6ZJF4TLrQ6mfKszCXp5br4AtBp0P0H9UWq1tfYASW2be30aCPkDWKTE4+Bfl5mGkPudPCS/CqkYALEXqtOsRtJf59JsLfOZYgEwnXQ5rQbgkm4ZbNcKKMMuufSxVoBLumWwXSugDLvk0sdaAS7plsH2M4BxM1DayRZ+AAAAAElFTkSuQmCC);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADfklEQVR4Xu2aQXbaMBCGf3nVZNP0BE2WMYvSEzScIOQCMT5B6QmaniDkBOBeIOEESU8QugCWJSco3SRdafKkPFNKAI8sy8bP1hLk0cynf0bygEDFh6h4/KgB1AqoOIE6BSougLoI1ilQp0DFCWSTAtH4FPCaIDoA0AQwghBzSDlE2BhZMe6Pm/C801e2IUcIGkMr24BFEez/OoD39zNIdiGECnz9IMwgxADyzRXCoznL4YVt6kDgcLNtmkN4PSPbK8bSKUDtihDXW51b9ZpoDhIhQv9mK4RoGoBkbyvUV7YxA9FZGrWZA9DB49bIwWWHiQboNMJXENSui8dLCNFhqWQtYLRMIZgB6E8PIeR96uBjp4lGoP3WIiVegldQVf1IP7TK9o/YqWZcAwaTWwicpPdw6UnCHTp+S38yGCuodsEv4C7ZZTjKV0B/egKPbhk2+VNUOqiRVvabVpKihfD4juMIH0CWu8/xzGbOsroS7PAA6GPp6beNT7k/K/fecWoBE8CkDQ/XuQdhs6DEWeKRyy6C0fgCEF9t/Mn/WfqGoHGRtC5PAdFEFasgydiOfX+FwO8m+cQFoCrqpyRjO/b9DwR+4pFdA2DtWjlTIELgJ16rmQqoehHsV/0YrPxFSBWKaHwDiFNWzSh8Eg0RNNocN3g1QFkqUxo4eRnSKpjMALznkC1wzgMCf3MbbcUxvgLKogLmO0DMwQzAiwp2+VbIuv0ti8AcgG5Ti/sCJb55aUkf3fYE46V38e1Q4AvO/Z7pxpgrYAFhp1LBWPrpa0D8pO7kPs0g8NaUesbzHyD3mpzuz7p10ytAnwr6B5K7wiAQ/oDoxDTv7YrgKsbv0w6I+hnvKs+cECHOj186yymHnQLiRYuAkEHwyv1sAChLeULIKPhsAeQFIcPgswfgGkLGwbsB4AqCg+DdAYghSOpZH5HqqPNE17babzoksiuC61awvSdkcM4nnY5uAejL0vQQnlTdpA9Jzvz/Pf2E9NoIj1UPwtlwD0BD0D+uqhcV7q9LEeReN+311oRWPgAWF6ZJF4TLrQ6mfKszCXp5br4AtBp0P0H9UWq1tfYASW2be30aCPkDWKTE4+Bfl5mGkPudPCS/CqkYALEXqtOsRtJf59JsLfOZYgEwnXQ5rQbgkm4ZbNcKKMMuufSxVoBLumWwXSugDLvk0sdaAS7plsH2M4BxM1DayRZ+AAAAAElFTkSuQmCC);
            }
        }
    }

    .menu-line {
        height: 1px;
        background: linear-gradient(90deg,rgba(229,233,239,.1) 0,rgba(204,208,215,.8) 1%,$color-gray-deep 4%,$color-gray-deep 96%,rgba(204,208,215,.8) 99%,rgba(229,233,239,.1));
    }

    .menu-body {
        overflow-y: auto;
        flex: 1;

        li {
            box-sizing: border-box;
            font-size: 13px;
            width: 100%;
            max-height: 50px;
            line-height: 20px;
            padding: 5px 20px;
            background-color: $color-gray-light;
            border-top: 1px solid #eee;

            &:first-child {
                border-top: none;
            }

            &:last-child {
                border-bottom: 1px solid #eee;;
            }

            &:hover {
                background-color: $color-gray-deep;
            }
        }
    }

    .menu-foot {
        height: 34px;
    }
</style>

<template>
    <div>
        <div id="warp" v-if="$store.getters.isLogin && !$root.$data.isMobile">
            <button class="nav-more">
                <span class="count" v-show="count">{{ count }}</span>
            </button>
            <div id="box">
                <div class="arrow"><i><em></em></i></div>
                <div class="menu-header">
                    <button v-for="(btn, index) in menu" :class="[btn.style, btn.show ? btn.click : '']" @click="menuSwitch(index)"></button>
                </div>
                <div class="menu-line"></div>
                <ul class="menu-body" v-show="menu[0].show">
                    <li v-for="msg in orderInbox">
                    <span @click="readit(msg)">
                        <router-link class="blue-link" :to="'/people/' + msg.uHome">{{ msg.uName }}</router-link>
                    </span>
                        <span>{{ msg.method }}了{{ msg.from_type === null ? '你的' : '你在' }}{{ msg.from_type === null ? msg.about_type : msg.from_type }}</span>
                        <span @click="readit(msg)">
                        <router-link class="blue-link" :to="'/post/' + msg.url">{{ msg.content }}</router-link>
                    </span>
                        <span v-if="msg.from_type">下面的{{ msg.about_type }}</span>
                    </li>
                </ul>
                <ul class="menu-body" v-show="menu[1].show">
                    <li>暂无通知</li>
                </ul>
                <ul class="menu-body" v-show="menu[2].show">
                    <li v-for="msg in notice">
                    <span @click="readit(msg)">
                        <router-link class="blue-link" :to="'/people/' + msg.uHome">{{ msg.uName }}</router-link>
                    </span>
                        <span>{{ msg.method }}了你</span>
                    </li>
                </ul>
                <div class="menu-line"></div>
                <div class="menu-foot">

                </div>
            </div>
        </div>
        <div v-if="$root.$data.isMobile">

        </div>
    </div>
</template>

<script lang="babel">

    export default {
        watch: {
            '$store.getters.isLogin' (val) {
                this.makeWebSocket(val);
                if (val) {
                    this.getUserMessage()
                }
            }
        },
        computed: {
            orderInbox: function () {
                return _.orderBy(this.inbox, 'id', 'desc')
            }
        },
        data () {
            return {
                socket : undefined,
                menu : [
                    {
                        style : "btn-msg",
                        click : "btn-msg-click",
                        show : true
                    },
                    {
                        style : "btn-fri",
                        click : "btn-fri-click",
                        show : false
                    },
                    {
                        style : "btn-like",
                        click : "btn-like-click",
                        show : false
                    }
                ],
                inbox : [],
                notice : [],
                count : 0
            }
        },
        created () {
            this.getUserMessage();
            this.makeWebSocket(this.$store.getters.isLogin);
        },
        methods: {
            menuSwitch (index) {
                if (!this.menu[index].show) {
                    for (var i=0; i<this.menu.length; i++) {
                        this.menu[i].show = false;
                    }
                    this.menu[index].show = true;
                }
            },
            makeWebSocket (bool) {
                var vm = this;

                if (typeof this.socket === 'undefined' && bool) {
                    this.socket = io("http://" + window.location.host + ":3001");
                }
                if (bool) {

                    this.socket.on('connection',function(data) {
                        console.log('connection is ok');
                    });

                    this.socket.on(this.$getUserInfo('zone') + ':msg',function(data) {
                        data.url = data.from_type === null ? data.about_id : data.from_id + '#' + data.about_id;
                        vm.msgEmit(data);
                        if (!data.read) {
                            vm.count++
                        }
                    });

                } else {
                    if (typeof this.socket !== 'undefined') {
                        this.socket.disconnect();
                        this.socket = undefined;
                    }
                }
            },
            getUserMessage() {
                if (this.inbox.length === 0 && this.$store.getters.isLogin) {
                    this.$http.post('/api/people/message').then((res) => {
                        var i;
                        for (i in res.body.data) {
                            res.body.data[i].url = res.body.data[i].from_type === null ? res.body.data[i].about_id : res.body.data[i].from_id + '#' + res.body.data[i].about_id;
                            if (!res.body.data[i].read) {
                                this.count++
                            }
                            this.msgEmit(res.body.data[i]);
                        }
                    });
                }
            },
            msgEmit (data) {
                if (data.method === '关注') {
                    this.notice.push(data)
                } else {
                    this.inbox.push(data)
                }
            },
            readit (item) {
                if (!item.read) {
                    this.$http.post('/api/people/message/read', {
                        id : item.id
                    }).then(() => {
                        item.read = true;
                        this.count--;
                    });
                }
            }
        }
    }
</script>