<!doctype html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>星火话</title>
    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 400;
            background-color: #000000;
            color: RGB(104, 253, 254);
            font-family: -apple-system,Helvetica Neue,Arial,PingFang SC,Hiragino Sans GB,Microsoft YaHei,WenQuanYi Micro Hei,sans-serif;
        }

        .light {
            animation: breath .75s linear infinite;
        }

        @keyframes breath
        {
            0% {
                opacity: 0;
            }
            50% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
    </style>
</head>
<body>
{ do something }<span class="light">&nbsp;_</span>
</body>
</html>