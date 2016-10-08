<style lang="sass" rel="scss" scoped>
    #search {
        border-radius: 16px;
        padding-right: 32px;
        height: 32px;
        overflow: hidden;
        background-color: rgba(0,0,0,.15);
        position: relative;

        &:hover {
            background-color: rgba(0, 0, 0, 0.3);
        }

        input {
            font-size: 12px;
            float: left;
            height: 32px;
            transition: .2s;
            background-color: transparent;
            line-height: 24px;
            padding: 4px 10px 4px 15px;
            border: none;
            border-radius: 0;
            width: 88px;
            color: #fff;

            &:focus {
                background-color: #fff;
                width: 158px;
                color: #222;

                & + button {
                    background-color: #fff;
                    background-image: url(data:image/png;base64,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);

                    &:hover {
                        background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFVUlEQVR4Xu1bi3XbNhS9nCBFF4g9QZ0JYmiB2hPUmaDuBHEmqDNB7QkqLyA6E9SdoO4ChTsBcq4ghCAICABJSaQcnKMjWQYpvPv+H1bYxVqp96hwDuBk8zoD8IP3U88A+HravH+BFPy811WN9mu1+gXAxebV97YvAJbQWGIhHvrepOS6YQDUihwm4dcBDpecI7SX0nEH4DOkIDA7Wf0AqBXF+eOG8PDBNP5di3aFx80G+84/eb1RC813fYaqehOhkMTfQIrPu0CgHIBaUcz/CHJc429UuAXwCCnIwfxVKwJyAY0rVHgbuJD24TdI4QKZf//IznwADNd/B3AVuNf9hktlRMeOX6tzaNygwvvAFkrDp8GUb26QB4DhDrnOd3fRUF0Xczv39HEgKAWXY9iGNACG+Lol8tTvCldji2MUl1pdQ+sbz05QJeRQELYDECIeINdJ/M4scxAInkXjDhV+cv4/GIQ4AGHi7yFFyAbkCvWwfbRDGo9jghAGwBg8ir2r858gxc0wCka6ulaMDxh/2LWEFJd97h4DgAbP5fRhOR+ibKWePEmgi6QLLlpdAIyf/9O5ywOk4HfTWkYdCIIbM7wrzSfaABjR/+ebxTfW/mzvBi8XamOn/nK2MwCTuZdznw8ARehX5wZ0M6NGXiWHy9pbK9olhuV2fYAUtBFZqwHAJDbkvl3TFP2wPWDOYVXhGVKcZlHfkoAukqc7i/ByT5e7jxGj8VrFUuBKgHKivelZ/RQYK+VKwROkeJe6pLEBtaLLo+uzaz7ctyfuSYORgFotAfy8/syUdiH8pCcHzMPuWbtF/ezkC1lxgQVA99Gfw1Ic+HU3QtT4goWgbdi6KnQNyPzEP6YGUiSzXQLQ+FEGPgtBdzjP1XXlyTiGADSJRabYTBqd1X8vJXagwkoxvbSlp+lkfH1RLqSHEuD6//kDUKsmnM+QaALgeoCkzvRlzN6ua9u0pCf4DsB3CWirAEvNjArnu4pVoJ1EHIMRLHLrvhtkI5KNzvmuHm6wyG1MHpm2SierQ/QC5Dh7flwvkEJMnsjYAbs1wqRbJwB+YbG4sjoZwFxmav0/Fj/6Uymdo5psqR0/z9cQunUNtvAyyvm2HuB2WoqKihPiPrnNsN6upP5zowXAb4YkdWcyhNuDtG0ZvxU5/YymYNCOB4obDAcHpFYs6dtaRpb4NxLAT92y+HykoFsQzT67Wxb3i4rzkIJuOy+ZAbrS6rfG/DZTVmX1oOLv5v/mINncb6uApaLdduYUCG+49wnOLFC7nezihk6oPe63mQaPoWQRU7rJn2Bh4FNVJzmWP64CjUvxVWFa9sDoPdvibgW7SPQtqfG6eTur4v47SPGhlFGj7x95fGfbkNToA0mDwTBiz+mVhvM9RT8tASY2CIHAaVBWjvZrGLeN6JqR+14zg8nWUQQEwjPqyGpUOmKD2Ybz7oB1LxDSAFhJMKPrpoPcLEoDk47djNGYZxBYsPHTWs4K344xM5gHQOMd3OKJDwQ9B2PwYROkhuP2GYR2n9Jw/eIb4CMMTpYBYKSBI6u3kUlu88QHx+UBPgKTNz1ujBvbc4xBYiN5nEjnYHYb4IEglAPQSMPVZqQ9NNtvd/Gw1E2+fMmwzxNt7+GzvVWt7U1czQaA0B+ANhDX3tTmYI+3Vifqea596QnCcAAaIMhRPvFxEVGP7aAY/SaX+WLQVW5LeoAwHgA+eWbyxD4XFBZz8zyReXwul9Mp2SoEYXcApA66y/8XgHCcAMSj2E6wdLwAZIJw3ABkgHD8ACRAeB0AhEAwbvf89QDgggB9QuKZ0r8uAJrMlrXDdT3jK8TMXPuJy/pjAAAAAElFTkSuQmCC);
                    }
                }
            }
        }

        button {
            width: 32px;
            height: 32px;
            position: absolute;
            top: 0;
            right: 0;
            background-size: 16px;
            background-position: 8px;
            background-repeat: no-repeat;
            border-radius: 0 16px 16px 0;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAFIUlEQVR4Xu2bi5EUOQyGpQg4IjiIAIiAJYKDCIAIDiIAIjiI4NgIgAiACIAIDiI4iEDUtyVvCWOP7X7M9Ayoqmv24e6xf/16WFarrCBmdltEzkTkml83ReSP7Ks+iwjXR/98r6r8vFfRpb7NzO6LyF2/pj72q4i85lLVN1MfMnLfLADMDA2z8EcFDY/MozQWdrwUkReqCjCryCQAzAw6P/GF1yb2xan9zgekT37l/mQWfHJdqTyIxT9V1RdrIDAMgJlB838rGv8kIs9F5J2qosFuMTNA4NkPROTPwo34h8eqGoHsfn5tYDcArvV/fIL5885dS0OLrk3KzHCgT0UEZ5oLbHg2e+X+gC4AXDtoHS1FwVE9GtV27+R3AAEL7i3hG5oA+OLfZpTHvh8sTccdjMDJwojoJzCJO3NB2AlAZfFoncWv5plLQPhciAo3wv9ng1AFoLL4c1XFSR1E3A9B/8VAKALgXwTto80/U1VoeHAxM5hA/pGExOnelInVAMDhRU0fVPMVk4D+kQmESELwkPwEgMf5V+Epb1SV+LwpcZYCQswZbo3uJ34AwB/6X/D4ePub+3Z4vUi7n/oQxpOA3em9n3E5AFDo7/AAwsyimdfI5HrGmhl+ibQ8yUNVxUd0ySUAvrFB+0k2Sf2KPyADTabwWVWvd60+MqCA5PW1MrzeyfWO84yRqDXMgsiA/4Ptb87rt8Aws8iCj6p6q3XPpQ8wM0IeoS/J0Wg/TXjqGi4YYGZUYf7yh31S1XzT0wPmQcd4BIMFab/QlRckAGyK/Rx0xYUvzzJEaoxsq3eKFhzI0dG/Zgaq2tztAkCMo19UlTrfUUohlDfzGACIG4su2mwZHTNjm97tBwCATC+Vnjaz45sK8uh6ACDG/1MAIKbzTUYDQIwATZuZqpl93Zf5tN8AtELhbwZkJkCpmazwaGWKCcRNxCk4waGwnodBDiKpwR+tTAmDQ2Fj68hkJt2sDsEANM6ZH/JVVa9ufZG1+RVqhM2wDgBsfWNhcbiyuhXAMmV+U9W8K+WnqabtcMyfj9YRZnWNrppmAiB6zqGi4oa0j7ZJ65M07Z+BCQAOPuJhSNN2trLwNI+M/vz5as95RiyKxnxg+IDh0ICYGSX9VMvoov8lA/ihUBY/GhYUCqLdc48MwIZiUfEoWFA4zmvuACNb86Ox/Jipq7J6SPqb2azjvNLpcDx2JjxCp713cPaAWjjJHj7QKQFAKTkeM81uQ+lZzOiYQgfLN5xgj+evmkAIKbkpbMofuN2TvcYKdrfjawLgUSEWS/nTS1V9OKqppccv3b6zq0mKqLBoQ9JcMJz2JGxR85Oon+bSapMrgUCopHK0V8fYaNGd7KeaR0eV1jQAXLRldccWt9aYjeZnN042AXB/wCTYMKUT5DRf2MCmY5U2Gn8HgTifb2vpFb5oyp7bM9gFwI4NRwSCyEEOPquD1BmX3kHIzynR+t0E+BKNk0MAOBsooIB+qZM7vfGBZkhJu7rH3bml12xqLXl0pNOY/QPAc0EYBiCwga4StF7q7U/DmCwOiitnRnqfqHWG/979TdXM5oAwGYAMCOqKsWtzbsTjfpqyn/f6l6kgzAYgAIFG00tTJfNogYJ9o2Uukq5hXzIFhMUAyFfnnSfpvaAazVnsxetzvZpuoTgKwmoAtCa65v9HQDhJAELu0swTThaAXhBOGoAeEE4egCYIazqjLT274BgJu2e/BANCrpK29+QsZ2zpfykAgjlQO7yoZ3wH7dqOmbi3c6YAAAAASUVORK5CYII=);
            transition: .2s;
        }
    }
</style>

<template>
    <div id="search">
        <input type="text" placeholder="搜索" v-model="q">
        <button></button>
    </div>
</template>

<script>

    export default {
        data () {
            return {
                q : ""
            }
        },
        methods: {

        }
    }
</script>