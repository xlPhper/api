<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.2.4/jquery.js"></script>
</head>
<body>

<select id="optionSelect">
    <option disabled="disabled" selected="selected">请选择xx</option>
</select>

<div id="subOptionChildren"></div>



<script type="text/javascript">

    $.ajax({
        'url':'show',
        'type':'get',
        async:false,
        data: null,
        success:function(data){
            if (data) {
//                eval('var result = ' + data);
                var $select   = $('#optionSelect'),
                        optionStr = '',
                        dataCount = data.category.length;

                for(var i = 0; i < dataCount; i++){
                    var tmpItem = data.category[i];

                    var childrenVal = JSON.stringify(tmpItem.children).replace(/"/g, '\'').replace(/"/g, '\'');

                    optionStr += '<option value="'+ tmpItem.id + '" data-children="' + childrenVal + '">' +
                            tmpItem.name +
                            '</option>';
                }

                $select.append(optionStr);
            }
            else {
                alert(456)
            }
        }
    })

</script>

<script type="text/javascript">
    $('#optionSelect').on('change',function(){
        var select=$(this).val();


        eval('var childrenList = ' + $(this).find("option:selected").attr('data-children'));
        var childrenCount = childrenList.length;

        var childrenStr = '<ul>';

        for (var i = 0; i < childrenCount; i ++) {
            var child = childrenList[i];
            childrenStr += '<a href="#")"><li data-id="' + child.id + '">' + child.name + '</li></a>';
        }

        childrenStr += '</ul>';

        $('#subOptionChildren').empty().append(childrenStr);

        alert(select)
    });

    $('#subOptionChildren').on('click', 'li', function() {
        console.info($(this).attr('data-id'));
    });
</script>


<!--<script type="text/javascript">-->
<!--console.info($);-->
<!--var data = [-->
<!--{-->
<!--name : 'option1',-->
<!--value: 'val1'-->
<!--},-->
<!--{-->
<!--name : 'option2',-->
<!--value: 'val2'-->
<!--},-->
<!--{-->
<!--name : 'option3',-->
<!--value: 'val3'-->
<!--}-->
<!--];-->

<!--setTimeout(function() {-->
<!--var $optionSelect = $('#optionSelect'),-->
<!--optionsStr    = '',-->
<!--dataCount     = data.length;-->

<!--for (var i = 0; i < dataCount; i ++) {-->
<!--var tmpItem = data[i];-->

<!--optionsStr += '<option value="' + tmpItem.value + '">' +-->
<!--tmpItem.name +-->
<!--'</option>';-->
<!--}-->

<!--$optionSelect.append(optionsStr);-->
<!--}, 3000)-->
<!--</script>-->
</body>
</html>