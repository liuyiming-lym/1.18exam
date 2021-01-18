<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 实例</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/lib/jquery.js"></script>
    <script src="http://static.runoob.com/assets/jquery-validation-1.14.0/dist/jquery.validate.min.js"></script>
    <script src="https://static.runoob.com/assets/jquery-validation-1.14.0/dist/localization/messages_zh.js"></script>
    <!--引入CSS-->
    <link rel="stylesheet" type="text/css" href="/webuploader/webuploader.css">
    <!--引入JS-->
    <script type="text/javascript" src="/webuploader/webuploader.js"></script>
    <script>
        // $.validator.setDefaults({
        //     submitHandler: function() {
        //         alert("提交事件!");
        //     }
        // });
        $().ready(function() {
            $("#commentForm").validate({
                rules:{
                    title:{
                        required:true,
                        minlength: 3
                    }
                },
                messages:{
                    title:{
                        required:"请填写标题",
                        minlength:"标题最少三个字"
                    }
                }
            });
        });
    </script>
    <style>
        .error{
            color:red;
        }
        img{
            width: 100px;
        }
    </style>
</head>
<body>
​
<div class="container">
    <h2>图片添加</h2>
    <form class="cmxform" id="commentForm" method="post" action="{{route('save')}}" enctype="multipart/form-data">
        @csrf
        <fieldset>
            <p>
                <label for="cname">标题</label>
                <input id="title" name="title" minlength="2" type="text" required>
            </p>
            <p>
                <label for="cemail">图片</label>
{{--                <input id="img" type="file" name="img" required>--}}
                <input type="hidden" id="pic" name="pic" value="">
                <div id="picker">选择文件</div>
                <img src="" alt="" id="src">
            </p>
            <p>
                <input class="submit" type="submit" value="提交">
            </p>
        </fieldset>
    </form>
</div>
</body>
</html>
<script>
    $().ready(function() {
        $("#from").validate();
    });
    $("#from").validate({
        rules:{
            title:{
                required:true,
                minlength: 3
            }
        },
        messages:{
            title:{
                required:"请填写标题",
                minlength:"标题不能小于三个字"
            }
        }
    })
    var uploader = WebUploader.create({
        auto:true,
        // swf文件路径
        swf:'/webuploader/Uploader.swf',
        //限制上传的类型
        extensions: 'jpg,jpeg,png',
        // 文件接收服务端。
        server: '{{route('upload')}}',
        formData:{
            _token:"{{csrf_token()}}"
        },
        fileVal:"pic",
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#picker',

        // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
        resize: false
    });
    uploader.on("uploadSuccess",function (file,ret) {
        $("#src").attr('src',ret.path)
        $("#pic").val(ret.path)
        // console.log(ret)
    })
</script>
