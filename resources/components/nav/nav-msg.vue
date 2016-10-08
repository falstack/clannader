<style lang="sass" rel="scss">
    .nav-more {
        height: 48px;
        line-height: 48px;
        width: 48px;
        background-size: contain;
        background-repeat: no-repeat;
        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAABKElEQVR4Xu2V0W3CUBAE9zogFZIOoASnAqCDlAgVXGSJ/IAhWsmOrbvx98r2zc2+F2r+RPP5BQAMaE6ACjQXgEOQClCB5gSoQHMBuAWoABVoToAKNBeAW4AKUIHmBKhAcwG4BagAFWhOYJYKZOZO0knS553nWdJXRFyn+C6dd3Y6F4BvSfuHD18i4vgCwKL5NQDkxEevEfHxAsCi+a0AuEXEWI2nJzOnAMyWXwPAokpnpvX+NQCMmx4Pvt9z4CJp+OMQdPODpMN9uLfv/3cAzge3lp3lFtjaUM7/AMChVTGLARW36syEAQ6tilkMqLhVZyYMcGhVzGJAxa06M2GAQ6tiFgMqbtWZCQMcWhWzGFBxq85MGODQqpjFgIpbdWbCAIdWxWx7A34Ala5gQRdnYE0AAAAASUVORK5CYII=);
        display: block;

        &:hover {
            & + #box {
                visibility: visible;
                opacity: 1;
                height: 370px;
            }
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
        visibility: hidden;
        opacity: 0;
        width: 320px;
        height: 0;
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
            visibility: visible;
            opacity: 1;
            height: 370px;
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
            border: 15px dashed transparent;
            border-bottom-color: #fff;
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

        .btn-set {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFQElEQVR4Xu1aTVbbSBD+SmLhrIacYMJmZuTF4H6R14ETBE4wcIKYEwxzAswJYk4Qc4KQtZUneRbWTDbACeKsYIFV81q2H45s465uiSEPa6vu6uqv6+er6iY884+e+f6xBmBtAc8cgcpcoPf3P29pRBSqX7suGEfxv3vsMzd//+3cRc6yuaUCEMeXm5l3+44ZBwBeATz0+cWWUltDG+W1vBHdXAK0CeCKCB0vq53aylukQykA3G+cWxNlZ9bibtio79sAECWDDwDtfT+Xh0TULgsIZwB6cbpDhPfjE1/6dcJGcCgBIUpSLVNb0rLvihmHTRVcSOQWxzoB0OsPToipZaIAg5MN3jhU6pfkofEaUBCfEKhhJJe43dyuH5mMLc0FtMnf0c1HUyULC1+AqOsRJzSq9fU/9m+3M6YGmLW570g3Mwb3xa5NbLCygF6cXhDhjVTRSscz+qEKjKxmVg8rAHRqAmUfKt2QUDgxH71W9bZwmj0VjuI0AWFbumAl45mvQ1V/KAgvXdbKArS0XpweE+HPSjYkFcp8Gqq6UTAuLQtM0t9Hqa5VjCfG4WsVdGxku1iAzv9PAgBm7NrygTUANmaj5zylTGCbAfQ+rC0gitMOCH/YApjPY+REyDmbMM5CFTxEm8vNAuMq7farePPM5wTqeqh1i6wtL6hwu8fgPRC9lcr2ufbyMZmgKAUy49MG/NaqOmC66Tj+0rjDqC1hm8z4q6mCYylwYhfQyo1oFJsu5OKfn+NBi4lOTNfy2VemIE9ligCI4/TVaJz6jFiXS36eKvg5Tg94XG6bfFc+15TEFYwBGEf90fv5hsdivVxOvihRZgk8ZKZ9U16wEoC8t5fpTo95map9vqkCcVn70BFbVKAdZpytAmIOgEl+fzcxcyNTLyruwsyWgWBPvXkI0LgJw95psUk7B4BzkcN8Hqp6oY9n4r6rx0TxoGuTIqeSF2WKRQA4NTvKCHzLoJDFgnkpi1yzdAB8xpZSwdXq85SPmGShS/nM8QwzAJJBbNnryxcJG8HKwGq7AT0vSlK2na97h81GXc3Onw+CDguA8S1Ugb7EqOyL4nQIwk+2CxQPqFwAwMOwUX9pq5zJvCgZfDXlIovkrQbAsdf3pF1gAT9ZB8GimVgwru9ElEmBi7o9VhoUlbpzLHBBpDXxbZMxPccMZUSEhNXXQr2fFhWeUZG9/ZVUOL/3w22D4G0yMn3VpLu/0muwi7AR7JqcqumYKEl1GS4rsJivGdTxwMMMlGyglhRLZSPSkjdBMNI9QPObIIfLiiIoUTxog0gXaGYfo89Aa1UlqIUZATBdVapIGXWB2CWFDVIRADkVFXaD2eH+XvL+ID8k4ebFFnBvCbKLUc3BwXRkYpJ6Dekjicnm+z5qO5J2mDUAts0JDQSR1/Ez71OxeZnHGS97w5wd2BRjtplH7AIz8eAKRD+bRaWKRz3363HbOwFrF9ATxdG5QiOwNX8nAGzjQBU4rAH4n94HOBVNZVqCC+FyyAIlXI+XhYID7bYCwLU7W9a+7+XYP8q2AkBaE5S/4XmJto0YKwDyBxK46bjc0ujXIQzkz+gJ2BRVmsX9M8581FpSGuyUBiecXRQI9cWEB3SWPWnLuQXQkoDhQoKcAdACTHsFkkhtRLIYfR/+gfRBRNF4rFxgkU+PT4+P5+oDxjcG9kwrwanspUSL+ZpAx7YPIysDYCq4aMa2wWnOxRh9AtplbXyqb2kWUERWu0aGux2bF9yzsnQr3MPGhaupL8tElQHwGKmvjDXWAJSB4o8sY20BP/LplaH7f7nUtl/pE8VkAAAAAElFTkSuQmCC);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFa0lEQVR4Xu1aTVIbVxDuHv3Yu+ATBJ/AcALDCQwLRpVKeYQ2HrFCnCDkBMAKTTaShkqlNCyQTwCcwPIJDCewvEss9Nr1BgRopEGv+42CElAVK7r79fum/18jPPEfPvH7wzMAzxbwxBGYmQvUW8fv0FHovy91bDAOjtprpByqljc+2shJ480UgEbjZOF7/mqblNpExEUg6BVV4XWlst6TKB/Lc/pfAGGBiC7QcZrFq/yBVN4kHTIBYHhxUFTTyo4eRB3fK61LAAjC9gkAro3wEvTAwf2sgLAG4PDoeAWVasRfPOVHAM2q51Y4INTDqIEAm6kyiS7IcSpb7zfOOHKTtFYABGF7DwBrRgoQdDEPlQ+/ut2H6DWgjqI9QFgykgu073ulHTPacSoRADe+eWqu5N3BBHAGBB0HoVsYFD7r//Rz/TeKYAkQ1hBghX0Zgm5RFVYlsUEEQBBG2uzeshWdIQMBfa56JUOruVNEBsBRew0IT2Z4H4Fo3PG9jX0uowgAfUg9bHcR8A33wBnRX/qemxqEHzpTDEDQau8C4m8zuhBLLBEcVMuuWTBOSBYDEEdrolOWpjMiVgCVLc9tSsT/PwBAXJXWA88ASMxG8+gmZX4ygSwD6HuILSBotZuAWJYCqPl07r5WwjKbELX8cim1bM48C8SVYK7/lXt5AvhIAJ2Xg0InWbVpmX/n+roS1H/vuLKLg8Krf68S5KfAc8xBbVofMLz0H39GSzQAXdSYV5tEv/vl0i4XOLYL3Cj3yfwguX8G4XENgPZMz8IcLJuCPJTJAuCw8dciOs7pQ63vfWVt8vNQzmEYbToADRMQ9NDkhSouc1zBGIA46itsjA880lSTf/mkRJYlEPSUg+umdcFUAPRsD5BqzDb13Pdcflv7wGfmdqB6CEOIrWlAjAEQDyEJt4Fo0dTUk3ori8osDQNx6U3QI4R4CINIB8kh7TgA/Ag/orNOdVXPHZ3jmTiwAU09jDqSFHkrekKmGAfActiRReBLw4IVCyYLGXPN7AEYDF5vVX65MPigbBKdhZxc7gub8Y7BAIBW9Eky6xue4Xvu1MBqcQEIwojE/ARdv+wu3+efZAHyAwC++Z6beBcQqzuRMQgj/cjyk1Rq8gNlCwBBzy+7r6TKmfAFreireS0yLnEqALazvrl2AQCDGGCbBf7zQdASAIDsSmCrklicBi0LIZgQaU1824QmsMxQYFIIcbqvNKXnqhQeyXm0PrUUjicz+aslB9QCKP1eh7qpMR9MxKMuOKt67qrJVzWlqYfRKbMh06IvgagJ6PQUQvflVb6bbJWNihY9BFEDanJmdzaPFUlQ6q1oHxG2TcHSs0ZCpzatE4wbJFOhmo6rSBZ9AdslmQNSFgAaBP40WP5+z9o/0MoxL8+2gKG1sIslgq5ycMfEJPUZ/CWJ6xH7i0FxhTMOEwNgMZzo6kmNk4fz5PAyjjNX8DZeizHeDrlzYGnmYbvA8MggjHTL+zMnhsyQ9mk/j08qcEzBFlsAOzqbaiSgk5q/OAbcBqp52Q+wGMLKLWCeFiQeA4B5WpGxKbjEFsAviATObchiU3aLAMhgOmt4NUMyi6VsEQDcnsDwGpZkskGMCADdMv+T6zdtXml06YqA8Ro9AS1wOs0xpIhaRVWscctgqzR40xhxdwXPFUAzbaVN1xYI+iGWsTIjXIwYgiiygPtfwHRWwInUJkWWtiAnh5vchYik9VgDMBR4o7ReUUn2B98U4pppJ3grL73OuFQAu9LFyJkBcB+IUTOWBaeki8VTHsD9rC6emQukhe7rXSJckWxw35epX4QxR2e2pp6mZ2YuYJnDHo39GYBHg35ODn62gDn5EI+mxg+7YaRfAJhQVAAAAABJRU5ErkJggg==);
            }
        }

        .btn-set-click {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFAUlEQVR4Xu1aTXoaRxB9hTdoFfkEMXAAoxMYncBoF8gi6ARGJ4h8AqETGC3CZCd0AuMTGA4Ao5zA8srZhMrX0yAhZkZUVQ8W3yfY0l1d9aZ+Xzfhhf/ohduPPQB7D3jhCGwvBP6O32MOQrsyDMJ4EDdRAuO3yk2QnJzNxQJwHR/iX3wAuAPgDRh3OKAKTip3JuWdvB8cg3AI4BagPsq4NMvLUKIYAJaGM3cXyj4cxTxEu3ZiAmAwvQZR89FeBypRryggwgGI4gbAn5IvnvvjPlq1UxUI0fQTQM6T8n7OI07RqoxUctcWhwEwmF6AqCtSgDEG0yl+r4yfXO8AZb4AoS6Tyz20a2eitYWFgI/Nz2IlHx88AtEQc4xxgEny1w+8RQl1MDt3b6iNceAe0LElN9g8YDAbgfBOreh2N0zQqsq8ZkUPIwBxE8TX27VHKZ35DO1aT7kroBWOZi6W32oP3Mp6xj9oV59Iwvmn2jzAyYum5wD9uRWDtEKZL9GuyZJxYVXAl7/PWl23sz4ph32L7AAP2CkAjq39wB4Ai9ske9yQsiuVwFgBnBkBHjBzMfeHGUC/0TdC4dXkCq3qU21zrpo2AJLhh78ZjL8BaIgyhqmuzQ9UTSDpBt+rZZfp9c/rBLUlkPEFTN2Nc8DS6r/iOoh7um6TP6JVO9cCp/cAp1yJv4oPCohPDKZdEF2Iz5rTkRjkhVAdAFH8ZlH7hV2XvT7fGx3FncW4LcHhFmU60oSCHACX9d3c79mZzb+QL78uXeMJnjA5kfYFmwFw3J5jejRjqov5dlU/1j4Fq3oC5T5QutoERBoAX98/LBgeoauva07mziwXA2vrnXgEPAnDdLlO0qYB0Gb4tMY3aFUf83ibA0a2Ipo5hllfIu+lpytFhgeEkh0FJL48ODS5IEtGRmhuA4AKWpVb2SdVrvJVKFbuelguBOCrkevzB7WqmxOr2QLHQ8zYvN1xh+3q0er+jBwQcAD4O1o1WZm0WhFN7wD6xbp9/QMVC4DLuO3qa7Nyko2D2TdxL5Ilb81DswAI4/p2OwRS/ck+Caa8RN1xrUkosgUOaYnNZTC0EcrItJLQFq0ZzMIqFCSNkG76ytF7h1rhVQ2ZTja3wp6ZqYNxCJrXwdTQERPJiSO0qseirypdFM0cBa8bsNyFCXE/eadApTHKGK+PyrKmxZMgjgOU3wQFXFak89K0ByI3oEl/E4C6myZBJ0wGwPLYgVaRAuYCfUiqCFIdAA6ISMkGc8D9veb9gf9IKuP1HrD0BO3FqKsMRGcSl0yO0D6S8HpNUKaGhg4LAMB4LeaAKFEf/+FLirx0eeYV3mHOHdswZqs8+hC4zwezWxB+lWalra578dfjGQ2OFHC7B+izs1Qnwzqb+9tzwDJR7c77ADMJG+IBu/RA4jkA2KEnMv7B5M9+IaJsiAyRLd4S0HbbQiCUnRVbJlwY8CjbBoB6JhAaErLMSMTYAPAPJFzMBdzSYJKMqb4WOSZZPmmmgbpCmbraNjisDCalUJkI3cUEUT83Yfnewl3EKsCwPYxYYmjzgNUvIOYKFJla1mRNMKeO9kHEuvOEA3A/IcYdMJ+n5wP+DpSa4knwQV52n5GwPHRuLXvbA2AViFU3NiYnPxY/CjHH8vSKMry4EMjL3MlDp3nD8oL7kUh3I8ylUair56lZXAiElLBn3LsH4BnB34mj9x6wE5/hGZX4H4P2B18ux0FWAAAAAElFTkSuQmCC);

            &:hover {
                background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFAUlEQVR4Xu1aTXoaRxB9hTdoFfkEMXAAoxMYncBoF8gi6ARGJ4h8AqETGC3CZCd0AuMTGA4Ao5zA8srZhMrX0yAhZkZUVQ8W3yfY0l1d9aZ+Xzfhhf/ohduPPQB7D3jhCGwvBP6O32MOQrsyDMJ4EDdRAuO3yk2QnJzNxQJwHR/iX3wAuAPgDRh3OKAKTip3JuWdvB8cg3AI4BagPsq4NMvLUKIYAJaGM3cXyj4cxTxEu3ZiAmAwvQZR89FeBypRryggwgGI4gbAn5IvnvvjPlq1UxUI0fQTQM6T8n7OI07RqoxUctcWhwEwmF6AqCtSgDEG0yl+r4yfXO8AZb4AoS6Tyz20a2eitYWFgI/Nz2IlHx88AtEQc4xxgEny1w+8RQl1MDt3b6iNceAe0LElN9g8YDAbgfBOreh2N0zQqsq8ZkUPIwBxE8TX27VHKZ35DO1aT7kroBWOZi6W32oP3Mp6xj9oV59Iwvmn2jzAyYum5wD9uRWDtEKZL9GuyZJxYVXAl7/PWl23sz4ph32L7AAP2CkAjq39wB4Ai9ske9yQsiuVwFgBnBkBHjBzMfeHGUC/0TdC4dXkCq3qU21zrpo2AJLhh78ZjL8BaIgyhqmuzQ9UTSDpBt+rZZfp9c/rBLUlkPEFTN2Nc8DS6r/iOoh7um6TP6JVO9cCp/cAp1yJv4oPCohPDKZdEF2Iz5rTkRjkhVAdAFH8ZlH7hV2XvT7fGx3FncW4LcHhFmU60oSCHACX9d3c79mZzb+QL78uXeMJnjA5kfYFmwFw3J5jejRjqov5dlU/1j4Fq3oC5T5QutoERBoAX98/LBgeoauva07mziwXA2vrnXgEPAnDdLlO0qYB0Gb4tMY3aFUf83ibA0a2Ipo5hllfIu+lpytFhgeEkh0FJL48ODS5IEtGRmhuA4AKWpVb2SdVrvJVKFbuelguBOCrkevzB7WqmxOr2QLHQ8zYvN1xh+3q0er+jBwQcAD4O1o1WZm0WhFN7wD6xbp9/QMVC4DLuO3qa7Nyko2D2TdxL5Ilb81DswAI4/p2OwRS/ck+Caa8RN1xrUkosgUOaYnNZTC0EcrItJLQFq0ZzMIqFCSNkG76ytF7h1rhVQ2ZTja3wp6ZqYNxCJrXwdTQERPJiSO0qseirypdFM0cBa8bsNyFCXE/eadApTHKGK+PyrKmxZMgjgOU3wQFXFak89K0ByI3oEl/E4C6myZBJ0wGwPLYgVaRAuYCfUiqCFIdAA6ISMkGc8D9veb9gf9IKuP1HrD0BO3FqKsMRGcSl0yO0D6S8HpNUKaGhg4LAMB4LeaAKFEf/+FLirx0eeYV3mHOHdswZqs8+hC4zwezWxB+lWalra578dfjGQ2OFHC7B+izs1Qnwzqb+9tzwDJR7c77ADMJG+IBu/RA4jkA2KEnMv7B5M9+IaJsiAyRLd4S0HbbQiCUnRVbJlwY8CjbBoB6JhAaErLMSMTYAPAPJFzMBdzSYJKMqb4WOSZZPmmmgbpCmbraNjisDCalUJkI3cUEUT83Yfnewl3EKsCwPYxYYmjzgNUvIOYKFJla1mRNMKeO9kHEuvOEA3A/IcYdMJ+n5wP+DpSa4knwQV52n5GwPHRuLXvbA2AViFU3NiYnPxY/CjHH8vSKMry4EMjL3MlDp3nD8oL7kUh3I8ylUair56lZXAiElLBn3LsH4BnB34mj9x6wE5/hGZX4H4P2B18ux0FWAAAAAElFTkSuQmCC);
            }
        }
    }

    .menu-line {
        height: 1px;
        background: linear-gradient(90deg,rgba(229,233,239,.1) 0,rgba(204,208,215,.8) 1%,$color-gray-deep 4%,$color-gray-deep 96%,rgba(204,208,215,.8) 99%,rgba(229,233,239,.1));
    }
</style>

<template>
    <div id="warp" v-if="$store.getters.isLogin">
        <a class="nav-more"></a>
        <div id="box">
            <div class="arrow"><i><em></em></i></div>
            <div class="menu-header">
                <button v-for="(btn, index) in menu" :class="[btn.style, btn.show ? btn.click : '']" @click="menuSwitch(index)"></button>
            </div>
            <div class="menu-line"></div>
            <ul class="menu-body" v-show="menu[0].show">
                <li>页面1</li>
            </ul>
            <ul class="menu-body" v-show="menu[1].show">
                <li>页面2</li>
            </ul>
            <ul class="menu-body" v-show="menu[2].show">
                <li>页面3</li>
            </ul>
        </div>
    </div>
</template>

<script>

    export default {
        watch: {
            '$store.getters.isLogin' (val) {
                this.makeWebSocket(val);
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
                        style : "btn-set",
                        click : "btn-set-click",
                        show : false
                    }
                ]
            }
        },
        created () {
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
                if (typeof this.socket === 'undefined' && bool) {
                    this.socket = io("http://" + window.location.host + ":3001");
                }
                if (bool) {

                    this.socket.on('connection',function(data) {
                        console.log('connection is ok');
                    });

                    this.socket.on(this.$getUserInfo('zone') + ':msg',function(data) {
                        console.log(data);
                    });

                } else {
                    if (typeof this.socket !== 'undefined') {
                        this.socket.disconnect();
                        this.socket = undefined;
                    }
                }
            }
        }
    }
</script>