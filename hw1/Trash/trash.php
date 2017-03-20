<?php

//    function listener(){
//        var buttons = $(".buttons :button");
//        addEventListener('click', function() {
//            console.log('listener' + 'this=' + this.value + 'pg' + pg);
//            request(this.value, pg);
//        }, false);
//    }

//$(this).slideUp();

//        next.addEventListener('click', function() {
//            request('next', pg, script1);
//        }, false);
//        prev.addEventListener('click', function() {
////            var pgs = document.getElementById('number');
//            request('prev', pg, script1);
//        }, false);
//        b1.addEventListener('click', function() {
//            request('b1', 0, script1);
//        }, false);
//        b2.addEventListener('click', function() {
//            request('b2', 20, script1);
//        }, false);
//        b3.addEventListener('click', function() {
//            request('b3', 40, script1);
//        }, false);
//        b4.addEventListener('click', function() {
//            request('b4', 60, script1);
//        }, false);
//        b5.addEventListener('click', function() {
//            request('b5', 80, script1);
//        }, false);
//        b6.addEventListener('click', function() {
//            request('b6', 100, script1);
//        }, false);
//        b7.addEventListener('click', function() {
//            request('b7', 120, script1);
//        }, false);
//        b8.addEventListener('click', function() {
//            request('b8', 140, script1);
//        }, false);
//    });

//<!--<input name="login" type="text" /><br />-->
//    <!--<input name="number" id="number" type="number" label="input number" /><br />-->
//    <!--<input type="button" id="prev" value="prev">-->
//    <!--<input type="button" id="b1" value="1">-->
//    <!--<input type="button" id="b2" value="2">-->
//    <!--<input type="button" id="b3" value="3">-->
//    <!--<input type="button" id="b4" value="4">-->
//    <!--<input type="button" id="b5" value="5">-->
//    <!--<input type="button" id="b6" value="6">-->
//    <!--<input type="button" id="b7" value="7">-->
//    <!--<input type="button" id="b8" value="8">-->
//    <!--<input type="button" id="next" value="next" /><br />-->

// var div = $('div').text();
//console.log(div);
//$('div').text('New message');
//$('div').html('<img src="http://htmlbook.ru/themes/hb/img/logo.png" />');

//if ($('div').hasClass('hide')) {
//                $('div').show(1000);
//                $('div').removeClass('hide');
//            } else {
//                $('div').hide(1000);
//                $('div').addClass('hide');
//            }

//            $.ajax({
//                method: "POST",
//                url: "http://noname1974.webandyou.ru/ajax/file.php",
//                url: 'script.php',
//                dataType: "json",
//                dataType: "text",
//                beforeSend: function () {
//                    console.log('Sending request');
//                },
//                success: function (data) {
//                    console.log('Response aquired');
//                    console.log(data);
//                    $('div#feedback').text(data)
//                },

//                contents: $('form').serialize()
//                contents: $('#number').serialize
//                contents:{number: 10}
//            });

//function success(data) {
////        var news = jQuery.parseJSON(data);
////        var news = JSON.parse( data );
//    console.log(data);
////        foo(data);
////        newsArrange(data);
////        $("div#res1").html(data);
//    jsonParse(data);
////        $('#res').html(data)
////        console.log(data);
////        data.forEach(myFunction)
//}

//            document.write("value.id = " + value.id +
//                " value.author = " + value.author +
//                " value.header = " + value.header +
//                " value.body = " + value.body +
//                " value.date = " + value.date);

//function foo(data) {
//    for (var key in data) {
//        $('table.dataoutput').append(' \
//        <tr id="id' + key + '> \
//          <td>' + data[key].id + '</td> \
//          <td>' + data[key].author + '</td> \
//          <td>' + data[key].title + '</td> \
//          <td>' + data[key].text + '</td> \
//          <td>' + data[key].date + '</td> \
//        </tr>');
//    }
//    }
//
//function newsArrange(item, index) {
//    $(table).each(function (i, n, data) {
//        //alert(n);
//        //$(n).width(50);
//        $(n).html(data(i));
//    })
//    };