<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/15/2016
 * Time: 10:12 PM
 */

?>
<?php
ob_start();
?>
        <!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('CSS/Stylesheet.css') }}" >
    <style type="text/css">
        #table_col{
            border:1px solid black;
        }


    </style>
</head>
<body>
<a href="{{ route('htmltopdfview',['download'=>'pdf']) }}">Download PDF</a>
<div class="row">

    <div class="container">

        <div class="logo" >

            <img src="{{ URL::to('images/sust.png') }}" alt="" style="width:3.543em;height:3.543em;">
        </div>

        <div style="float: left; margin-right: 5.5%">
            <h2 style="font-size: 1.625em"> শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়, সিলেট </h2>

            <table cellspacing="0" style="margin-left: 12.5%" >
                <tbody>
                <tr>

                    <td style="width:7.813em">রেজিস্ট্রেশন নম্বর</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                    <td style="width:1.563em;border:1px solid black;">&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <p  style="white-space: pre">...............................শিক্ষাবর্ষ..............................................সেমিস্টার পরীক্ষা-২০১......... </p>
            <p  style="white-space: pre;line-height: 20%">      কোর্স ও পরীক্ষা রেজিস্ট্রেশনের আবেদন</p>

        </div>
        <div style="float: left; margin-left: 2.5%; margin-top: 2.5%;">
            <div style="width: 9em; height: 9em; border: 1px solid black;">

            </div>
        </div>

    </div>


</div>

<div class="row">
    <div class="container">

        <div align="left" class="row2">
            <p>বরাবর</p>
            <p>পরীক্ষা নিয়ন্ত্রক</p>
            <p>শাবিপ্রবি, সিলেট ।</p>
        </div>

        <div align="left" style="width: 50%;line-height: 50%;float: left;margin-top: 1%">
            <div class="table_bank">

            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="container">
        <div style="width:77.6%">
            <p style="clear: both;padding: 0em .10em 0em 0em; ">জনাব <br>আমি ..............................বিভাগ ...   .......... শিক্ষাবর্ষ ....................বর্ষ      ...........সেমিস্টার     ...........      (    )  স্নাতক   (     )  স্নাতকোত্তর পরীক্ষায় অংশ গ্রহণের জন্য আপনার
                কাছে আবেদন করছি। এই আবেদনপত্রে দেয়া তথ্য যদি অসত্য প্রমাণিত হয়; বা যদি দেখা যায় যে আমি পরীক্ষা সংক্রান্ত আইন কানুনের পরিপন্থী কোন কাজ করেছি , তবে আমার এই আবেদন বাতিল হয়ে যাবে।  আমি আরও অঙ্গীকার করছি যে, আমার এই পরীক্ষায় অংশগ্রহণে বৈধতা নিয়ে ভবিষ্যতে যদি কোন প্রশ্ন
                ওঠে তবে বিশ্ববিদ্যালয়ের যে কোনো কর্তৃপক্ষ বা সিন্ডিকেট দ্বারা  ক্ষমতা দেয়া যে কোন কর্মকর্তার সিদ্ধান্ত চূড়ান্ত বলে মেনে নেব।   </p>
        </div>
    </div>

</div>

<div class="row">
    <div class="container">
        <div style="float: left;margin-right: 15%">
            <p>তারিখ :............../................/............... </p>
        </div>
        <div style="float: left;margin-left: 10%">
            <p>স্বাক্ষর : </p>
        </div>
    </div>
</div>

<div class="row">
    <div class="container">
        <div style="clear : both;margin-left: 10%">
            <p> যে সকল বিষয়ে রেজিস্ট্রেশন করে পরীক্ষা দেবে তার কোর্সনম্বর ও ক্রেডিট :</p>
        </div>
    </div>

</div>

<div class="row">
    <div class="container">
        <div class="table1" style="float : left;width: 25.5% ; margin-right:.5%;height: 50%">

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 1%; height: 1.5em; text-align: center">মেজর কোর্স</td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 0.5%; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 0.5%; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>

            @for($i=1;$i<=11;$i++)

                <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                    <tbody>
                    <tr>
                        <td style="width: 5.8em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 4.3em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 5.8em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 4.3em; height: 1.5em;">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            @endfor


        </div>

        <div class="table1" style="float :left;width: 25.5% ; margin-right: .5%; height: 50%">

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 1%; height: 1.5em;text-align: center">নন মেজর কোর্স</td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 0.5%; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 0.5%; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>

            @for($i=1;$i<=11;$i++)

                <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                    <tbody>
                    <tr>
                        <td style="width: 5.8em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 4.3em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 5.8em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 4.3em; height: 1.5em;">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            @endfor
        </div>
        <div class="table1" style="float: left; width: 25.5% ; height: 50%">

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style=" width: 1%; height: 1.5em;text-align: center;">ড্রপ কোর্স / আডভান্স কোর্স </td>
                </tr>
                </tbody>
            </table>

            <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                <tbody>
                <tr>
                    <td style="width: 0.5%; height: 1.5em; text-align: center">থিওরি</td>
                    <td style="text-align: center;width: 0.5%; height: 1.5em;">ল্যাব</td>
                </tr>
                </tbody>
            </table>

            @for($i=1;$i<=11;$i++)

                <table border="1" bordercolor="#888" cellspacing="0" style="border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;">
                    <tbody>
                    <tr>
                        <td style="width: 5.8em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 4.3em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 5.8em; height: 1.5em;">&nbsp;</td>
                        <td style="width: 4.3em; height: 1.5em;">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            @endfor
        </div>
    </div>

</div>
<div class="row">
    <div class="container" style="clear: both;">
        {{--<h1>tapos</h1>--}}

    </div>

</div>

{{--{!! Form::open(['route' => ['createpdf','tapos' ]]) !!}--}}
{{--{!! Form::submit('Click Me!') !!}--}}
{{--{!! Form::close() !!}--}}

<div>


    <button onclick="myFunction()">Print this page</button>



</div>

<script>
    function myFunction() {
        window.print();
    }
</script>

</body>
</html>


