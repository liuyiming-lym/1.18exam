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
</head>
<body>
​
<div class="container">
    <h2>文章表格</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>图片</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
        <tr>
            <td>{{$val->id}}</td>
            <td>{{$val->title}}</td>
            <td>
                <img width="100px" src="{{$val->pic}}" alt="">
            </td>
            <td>{{$val->created_at}}</td>
            <td>
                <a href="{{route('delete',$val->id)}}" onclick="del()" id="delete">删除</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
​
</body>
</html>
<script>
    $("#delete").click(function () {
        var url = $("#delete").attr("href")
        var _token = "{{csrf_token()}}"
        if (confirm("确认删除吗")){
            $.ajax({
                url,
                type:"DELETE",
                data:{
                    _token
                },
            }).then((res)=>{
                if (res.code==200){
                    location.href = '{{route('show')}}'
                }
            })
        }
        return false;
    })

</script>
