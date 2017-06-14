<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<button type="button" class="bt"  onclick="click()">点我你就会变帅</button>
</body>
<script type="text/javascript" src="{{URL::asset('js/jquery.js')}}">
    function click()
    {
        alert('666')
    }
    $(document).ready(function(){
        alert('1234');
        $(".bt").on('click',function(){
            alert('12345');
        })
    })
</script>
</html>