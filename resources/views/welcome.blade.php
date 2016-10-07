<!doctype html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="http://cdn.clannader.com/favicon.ico">
    <meta id="_auth" content="{{ Auth::check() }}">
    <title>CLANNADer - 天下漫友是一家</title>
</head>
<body>
    <div id="app"></div>
    <script src="http://cdn.bootcss.com/vue/2.0.1/vue.min.js"></script>
    <script src="http://cdn.bootcss.com/vue-router/2.0.0/vue-router.min.js"></script>
    <script src="http://cdn.bootcss.com/vuex/2.0.0/vuex.min.js"></script>
    <script src="http://cdn.bootcss.com/vue-resource/1.0.3/vue-resource.min.js"></script>
    <script src="http://cdn.bootcss.com/socket.io/1.4.8/socket.io.min.js"></script>
    <script src="{{ asset('dev/js/entry.js') }}"></script>
</body>
</html>