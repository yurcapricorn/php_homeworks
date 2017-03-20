<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>NEWS_ADMIN</title>
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>-->
    <script type="text/javascript" src="/jquery-3.1.1.min.js"></script>
</head>
<body>

<!--main buttons-->
<form class="choseaction">
    <input type="button" name="add" value="add" checked>
    <input type="button" name="remove" value="remove"> <br>
    <input type="button" name="edit" value="edit">
    <input type="button" name="showall" value="showall">
</form>

<!--edit form-->
<div class="allforms" id="edit" style="display:none;">
    <form class="edit">
        <p><input class="id" id="id" name="id" type="number" value="" size="30" tabindex="1" /><strong> ID</strong></p>
        <p><input class="author" id="author" name="author" type="text" value="" size="30" tabindex="1" /><strong> Author</strong></p>
        <p><input class="header" id="title" name="header" type="text" value="" size="30"  tabindex="2" /><strong> Title</strong></p>
        <p><input class="date" id="date" name="date" type="date" value="" size="30"  tabindex="3" /><strong> Date</strong></p>
        <p><textarea class="body" name="body" id="text" rows="10" cols="70" tabindex="4"></textarea></p>
        <p class="form-submit">
            <input type="button" value="Edit Article" />
        </p>
    </form>
</div>

<!--add form-->
<div class="allforms" id="add" style="display:none;">
    <form class="add">
<!--        <p><input class="id" id="id" name="id" type="number" value="" size="30" tabindex="1" /><strong> ID</strong></p>-->
        <p><input class="author" id="author" name="author" type="text" value="" size="30" tabindex="1" />Author</strong></p>
        <p><input class="header" id="header" name="header" type="text" value="" size="30"  tabindex="2" /><strong> Title</strong></p>
        <p><input class="date" id="date" name="date" type="date" value="" size="30"  tabindex="3" /><strong> date</strong></p>
        <p><textarea class="body" name="body" rows="10" cols="70" tabindex="4"></textarea></p>
        <p class="form-submit">
            <input type="button" value="Add Article" />
        </p>
    </form>
</div>

<!--remove form-->
<div class="allforms" id="remove" style="display:none;">
    <form class="remove">
        <p><input class="id" id="id" name="id" type="number" value="" size="30" tabindex="1" /><strong> ID</strong></p>
        <p><input class="author" id="author" name="author" type="text" value="" size="30" tabindex="1" />Author</strong></p>
        <p><input class="header" id="title" name="header" type="text" value="" size="30"  tabindex="2" /><strong> Title</strong></p>
        <p><input class="date" id="date" name="date" type="date" value="" size="30"  tabindex="3" /><strong> date</strong></p>
        <p><textarea class="body" name="body" id="text" rows="10" cols="70" tabindex="4"></textarea></p>
        <p>
            <input type="button" value="REMOVE" />
        </p>
    </form>
</div>

<!--all news output table-->
<div id='dataoutput' class='allforms' style="display:none;">
<table>
    <caption>News</caption>
    <thead>
    <th>id</th>
    <th>author</th>
    <th>title</th>
    <th>text</th>
    <th>date</th>
    </thead>
    <tbody>
    </tbody>
</table>

<!--all news buttons-->
<form class="buttons"></form>
</div>

<div class="result allforms"></div>

<script>

//all news request variables
    var btn;
    var pg;
    var size;
//all news request before function
    function before(){
    }

//find by id request success function
    function successById(data, form) {
        data=data[0];
        $.each( data, function( key, value ) {
            $("." + form + " ." + key).val( value);
        })
    }

//all news ajax response handling&nursing
    function success(data) {
        $("#dataoutput tbody tr,td").remove();
        $("form.buttons :button").remove();
        //all news table forming
        $.each( data, function( key, value ) {
            if(key==0){pg = value.id} //current page variable assignment
            if(key==20){size = parseInt(value);return;} //database volume variable assignment
            $( "#dataoutput tbody" ).append('\
            <tr> \
                <td>' + value.id + '</td> \
                <td>' + value.author + '</td> \
                <td>' + value.header + '</td> \
                <td>' + value.body + '</td> \
                <td>' + value.date + '</td> \
            </tr>');
        });
//all news bottom buttons forming
        $( "form.buttons" ).append('\<input type="button" value=prev>');
        var j=1;
        for (var i=0;i<=size;i+=20){
            $( "form.buttons" ).append('\<input type="button" value=' + j + '>');
            j++;
        }
        $( "form.buttons" ).append('\<input type="button" value=next>');

        return pg; //returning current page for further handling
    }
// ajax request for all news scope
    function request(btn, pg) {
        $.ajax({
            url: '/Js/script.php',
            type: "POST",
            data: ({btn: btn, pg: pg}),
            dataType: 'json',
            beforeSend: before(btn, pg),
            success: success
        });
    }
// ajax request for getting one article by id
function requestById(id, form) {
    $.ajax({
        url: '/Js/script.php',
        type: "POST",
        data: ({id: id}),
        dataType: 'json',
        success: (function(data){successById(data, form);})
    });
}
// ajax request for removing/editing/adding
function requestForAction(inputdata, action) {
    $.ajax({
        url: '/Js/script.php',
        type: "POST",
        data: ({article: inputdata, action: action}),
        dataType: 'json',
        success: (function(data)
        {
        hide('.allforms');
        show(".result");
        $(".result").text(data);
        })
    });
}
//enter point
    $(document).ready(function() {
        //console.log('document_ready');
        onClickMain();
    });
//all news navigation buttons functionality
    function onClickNews() {
        $(".buttons").on('click', ":button", function () {
            request(this.value, pg);
        })
    }
//main 4 buttons functionality
    function onClickMain() {
        $(".choseaction").on('click', ":button", function () {
            var bt=this.value;
            switch(bt){

                case 'showall':
                    hide('.allforms');
                    $("#dataoutput").css("display", "");
                    request(1,0);
                    onClickNews();
                    break;

                case 'edit':
                    hide('.allforms');
                    $("#edit").css("display", "");
                    $("#edit .id").keyup(function(){
                        requestById(this.value, bt);
                    });
                    $(".edit").on('click', ":button", function () {
                        var editdata = $('.edit').serializeArray();
                        requestForAction(editdata, bt);
                    });
                    break;

                case 'remove':
                    hide('.allforms');
                    $("#remove").css("display", "");
                    $("#remove .id").keyup(function(){
                        requestById(this.value, bt);
                });
                    $(".remove").on('click', ":button", function () {
                        var removedata = $('.remove').serializeArray();
                        requestForAction(removedata, bt);
                    });
                    break;

                case 'add':
                    hide('.allforms');
                    $("#add").css("display", "");
                    $(".add").on('click', ":button", function () {
                        var adddata = $('.add').serializeArray();
                        requestForAction(adddata, bt);
                    });
                    break;
            }
        })
    }
    //elements hider
    function hide(classname) {
            $(classname).hide(1000);
            $(classname).addClass('hide');
        }
    //elements revealer
    function show(classname) {
        $(classname).show(1000);
        $(classname).removeClass('hide');
    }

</script>

</body>
</html>
