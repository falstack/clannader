<style lang="sass" rel="scss" scoped>
    $search-input-height: 40px;
    $search-input-width: 550px;
    $query-padding: 10px;

    #searchBox {
        width:$search-input-width;
        height:$search-input-height;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -$search-input-width / 2;
        margin-top: -$search-input-height / 2;

        &:hover {
            input {
                border: 1px solid #fff;
                background: rgba(0,0,0,0.3);
            }
        }

        input {
            width: $search-input-width;
            height: 100%;
            margin: 0;
            padding: 0 $query-padding;
            border: 1px solid rgba(255,255,255,.8);
            background: rgba(0,0,0,.15);
            border-radius: 2px;
            color: #fff;
            position: relative;
            font-size: 14px;
            line-height: 40px;
        }

        a {
            display: block;
            width: $search-input-height;
            height: $search-input-height;
            position: absolute;
            right: 0;
            top: 0;
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCFET0NUWVBFIHN2ZyBQVUJMSUMgIi0vL1czQy8vRFREIFNWRyAxLjEvL0VOIiAiaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkIj4KPHN2ZyBzdHlsZT0id2lkdGg6MzA4cHg7aGVpZ2h0OjMwOHB4OyIgdmVyc2lvbj0iMS4xIiBpZD0i5Zu+5b2iIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCIgd2lkdGg9IjEwMjRweCIgaGVpZ2h0PSIxMDI0cHgiIHZpZXdCb3g9IjAgMCAxMDI0IDEwMjQiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDEwMjQgMTAyNCIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CiAgPHBhdGggY2xhc3M9InN2Z3BhdGgiIGRhdGEtaW5kZXg9InBhdGhfMCIgZmlsbD0iI2ZmZmZmZiIgZD0iTTk2MS4yMTk1ODQgOTE2LjMxNjE2IDY4OC44NTA5NDQgNjQzLjk0NjQ5NmM1My40NzAyMDgtNjIuMjE3MjE2IDg2LjAxMTkwNC0xNDIuODkxMDA4IDg2LjAxMTkwNC0yMzEuMTY5MDI0IDAtMTk1Ljk3MzEyLTE1OS40Mjc1ODQtMzU1LjQwMDcwNC0zNTUuNDAwNzA0LTM1NS40MDA3MDQtMTk1Ljk3MzEyIDAtMzU1LjQwMDcwNCAxNTkuNDI3NTg0LTM1NS40MDA3MDQgMzU1LjQwMDcwNCAwIDE5NS45NzMxMiAxNTkuNDI3NTg0IDM1NS40MDA3MDQgMzU1LjQwMDcwNCAzNTUuNDAwNzA0IDc3LjYwMTc5MiAwIDE0OS4yMjAzNTItMjUuMjc2NDE2IDIwNy43MzE3MTItNjcuNjM4MjcybDI3NC45MDA5OTIgMjc0LjkwMDk5Mkw5NjEuMjE5NTg0IDkxNi4zMTYxNnpNMTA1Ljg3MzQwOCA0MTIuNzc3NDcyYzAtMTcyLjkxNDY4OCAxNDAuNjg2MzM2LTMxMy41ODg3MzYgMzEzLjU4ODczNi0zMTMuNTg4NzM2IDE3Mi45MDI0IDAgMzEzLjU4ODczNiAxNDAuNjc0MDQ4IDMxMy41ODg3MzYgMzEzLjU4ODczNiAwIDE3Mi45MTI2NC0xNDAuNjg3MzYgMzEzLjU4ODczNi0zMTMuNTg4NzM2IDMxMy41ODg3MzZDMjQ2LjU1ODcyIDcyNi4zNjYyMDggMTA1Ljg3MzQwOCA1ODUuNjkwMTEyIDEwNS44NzM0MDggNDEyLjc3NzQ3MnoiIC8+Cgo8L3N2Zz4K) no-repeat;
            background-position: center;
            background-size: 24px 24px;
        }
    }

    $m-input-height: 40px;
    $m-input-width: 240px;

    #m-search {
        width:$m-input-width;
        height:$m-input-height;
        position: absolute;
        left: 50%;
        top: 50%;
        margin-left: -$m-input-width / 2;
        margin-top: -$m-input-height / 2;

        input {
            width: $m-input-width;
            height: 100%;
            font-size: 13px;
            line-height: 40px;
        }

        a {
            display: block;
            width: $m-input-height;
            height: $m-input-height;
            position: absolute;
            right: 0;
            top: 0;
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAC+klEQVRYR8WXTVIaURDH/z0TSXaaE0RPoJ4geAJ14VCplANsHFxlPIF4gpCVkg2ClUqBC/EE4gk0J4g5QXSXiG861fOlwMzwIH50FZup6e7f9Ov374bwwkYvnB/aAPWj9hozrQKYJyAfgTPzFREuwejmvNxpubx+PclHjQXYb3VKxLxLRPNDgc8BLAGYHXzOtZzK7emCpAI0Gidzt0b/DOQnAZibHlHvjZrpDgf/+q2z5N2hRISSD8S49gxa397c6I2rRiKABOQ7SPI5Bv9gMlydYAL91+hXifBJEntAedu2DrMgRgCCILcXfsmZm06xIF81kcmxGUDNrwbxurNZ6KYFGAGotzpStvfTJo8SSdOC6cQ/Dk8tb5c/XCVBDABETlL2il0Izv4/rN5sV0G0m/UxgwCtjlC+84hWdM5ch60exiQTy1sfrcthnxjAbzyFCwDnjm3F91wnSdY7YT80mPGlUrTcVICDZqcWdC/tOPaGNNCj2H7j+7xhmj9FsCrFwkIqQNR8nlILaQ0zLdFBq31JoEXHtkaaPn4QASS9NG3i+EaENyupDx4CsDg8CUCzfQiiYlJzxwBZZXqsCmQCPGUPRLFzaubt8By5r0B4C3T0e5KK+EPN7P8G8MuxreGJer8P7B8d5w3mMwZOK7a1NkkSHR1IU8NEJUxTrWmgIiVMU9cBgFi1gF7FtlamSfjQp946dgH+nKWuI8IQ3YY06dSFeiDtN2QinzQHJNYIQCidMjRmQVR1Njf2dJNG7/n95PGJLDRg3nOKhWpajPSNSEH2glmAu57ydnTlOR7BUUbGNb3CinYFIj9/z1N8KBoePOMagbpbtiXL6IBJ1cgwVwF2w+X1BsxdUb/ANR0icysOFtNbF0QyRuPtl+FXxzdiLPmlDk2uMSvlSsWips6CGLuWi7OA/DH7awTIT/4bDJhsUGDqsadqw0c1DkILIKmBpOy6fZEFMTXAxDcj2JQboV+8dT0bgCT2/2WB3dcql4+G0rMCJFXtxQH+AXZ/jTDWgq1RAAAAAElFTkSuQmCC);
            background-repeat: no-repeat;
            background-position: center;
            background-size: 20px;
        }
    }
</style>

<template>
    <div>
        <div id="m-search" v-if="$root.$data.isMobile">
            <input autofocus="autofocus" type="text" v-model="q" placeholder="搜索二次元的一切" @keyup.enter="query">
            <a @click="query"></a>
        </div>
        <div id="searchBox" v-else>
            <input autofocus="autofocus" type="text" v-model="q" placeholder="搜索二次元的一切" @keyup.enter="query">
            <a @click="query"></a>
        </div>
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
            query () {
                if (this.q.length !== 0) {
                    this.$http.get('/api/query/index', { params : {
                        q : this.q
                    }}).then((res) => {
                        this.$router.push({ path: '/bangumi/' + res.body.data });
                    }, (res) => {
                        if (res.status === 404) {
                            this.$root.$refs.toast.open({
                                theme: "info",
                                content: "没有找到数据！"
                            });
                        } else {
                            this.$root.$refs.toast.open({
                                theme: "error",
                                content: "服务器异常，获取数据失败！"
                            });
                        }
                    });
                }
            }
        }
    }

</script>