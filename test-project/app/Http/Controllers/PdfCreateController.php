<?php
/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/6/2016
 * Time: 12:33 AM
 */
namespace App\Http\Controllers;
use App\Http\Requests\Request;
use PDF;
use Illuminate\Support\Facades\App;




class PdfCreateController extends Controller{

    public function makePdf()
    {


     //$html=PDF::loadView('printFile');



        $doc = new \DOMDocument();
        $doc->loadHTML("<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset=\"utf-8\">
    <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ URL::to('CSS/Stylesheet.css') }}\" media=\"print\">

    <style type=\"text/css\" media=\"print\">
        #table_col{
            border:1px solid black;
        }


    </style>
</head>
<body>


<div class=\"row\">

    <div class=\"col-sm-1\">
        <p> </p>
    </div>
    <div class=\"col-sm-10\">
        <div  class=\"logo\" style=\"margin-top: 3.5%\">

            <img src=\"{{ URL::to('images/sust.png') }}\" alt=\"\" style=\"width:2.5em;height:2.5em\">
        </div>
        <div style=\"float: left; margin-right: 1.5%\">
            <h2 style=\"font-size: 1.625em\"> শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়, সিলেট </h2>

            <table cellspacing=\"0\" style=\"margin-left: 12.5%\" >
                <tbody>
                <tr>

                    <td style=\"width:7.813em\">রেজিস্ট্রেশন নম্বর</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <p  style=\"white-space: pre\">...............................শিক্ষাবর্ষ..............................................সেমিস্টার পরীক্ষা-২০১......... </p>
            <p  align=\"center\" style=\"white-space: pre;line-height: 20%\">      কোর্স ও পরীক্ষা রেজিস্ট্রেশনের আবেদন</p>

        </div>
        <div  style=\"float: left; margin-left: 0.5%; margin-top: 3.5%;\">
            <div style=\"width: 7em; height: 7em; border: 1px solid black;\">

            </div>
        </div>

    </div>
    <div class=\"col-sm-1\" style=\"background-color: #d9534f;\">
     <p> </p>
    </div>
</div>


<div class=\"row\" >

    <div class=\"col-sm-1\">
      <p> </p>
    </div>
    <div class=\"col-sm-10\">
        <div style=\"float: left\">
            <p>বরাবর</p>
            <p>পরীক্ষা নিয়ন্ত্রক</p>
            <p>শাবিপ্রবি, সিলেট ।</p>
        </div>
        <div  class=\"col-sm-4\" style=\"width: 50%;line-height: 50%;float: left;margin-top: 1%;margin-left: 30%\">
                <div  class=\"table_bank\">
                       <p>tapos data</P>
                </div>
        </div>

    </div>
    <div class=\"col-sm-1\">
       <p> </p>
    </div>

</div>

<div class=\"row\" >
    <div class=\"col-sm-1\" style=\"float:left;\">
            <p> </p>
    </div>
    <div class=\"col-sm-10\" style=\"float:left;\">
        <p style=\"clear: both;padding: 0em .10em 0em 0em; \">জনাব <br>আমি ..............................বিভাগ ...   .......... শিক্ষাবর্ষ ....................বর্ষ      ...........সেমিস্টার     ...........      (    )  স্নাতক   (     )  স্নাতকোত্তর পরীক্ষায় অংশ গ্রহণের জন্য আপনার
            কাছে আবেদন করছি। এই আবেদনপত্রে দেয়া তথ্য যদি অসত্য প্রমাণিত হয়; বা যদি দেখা যায় যে আমি পরীক্ষা সংক্রান্ত আইন কানুনের পরিপন্থী কোন কাজ করেছি , তবে আমার এই আবেদন বাতিল হয়ে যাবে।  আমি আরও অঙ্গীকার করছি যে, আমার এই পরীক্ষায় অংশগ্রহণে বৈধতা নিয়ে ভবিষ্যতে যদি কোন প্রশ্ন
            ওঠে তবে বিশ্ববিদ্যালয়ের যে কোনো কর্তৃপক্ষ বা সিন্ডিকেট দ্বারা  ক্ষমতা দেয়া যে কোন কর্মকর্তার সিদ্ধান্ত চূড়ান্ত বলে মেনে নেব।   </p>
    </div>
    <div class=\"col-sm-1\" style=\"float:left;\">
           <p> </p>
    </div>
</div>

<div class=\"row\" >
    <div class=\"col-sm-1\" style=\"float:left;\">
        <p> </p>
    </div>
    <div class=\"col-sm-10\" style=\"float:left;\">
        <div class=\"col-sm-7\" style=\"float:left;\">
            <p>তারিখ :............../................/............... </p>
        </div>
        <div class=\"col-sm-5\" style=\"float:left;\">
            <p>স্বাক্ষর : </p>
        </div>
    </div>
    <div class=\"col-sm-1\" style=\"float:left;\">
    </div>
</div>

<div class=\"row\" style=\"clear:both;\">
    <div class=\"col-sm-1\" style=\"float: left;\">
     <p></p>
    </div>
    <div align=\"center\" class=\"col-sm-10\" style=\"float:left;\">
        <p> যে সকল বিষয়ে রেজিস্ট্রেশন করে পরীক্ষা দেবে তার কোর্সনম্বর ও ক্রেডিট :</p>
    </div>
    <div class=\"col-sm-1\" style=\"float: left;\">

    </div>
</div>

<div class=\"row\" >
    <div class=\"col-sm-1\" style=\"float: left;\">
        <p></p>
    </div>
    <div class=\"col-sm-10\" style=\"float:left;\">
       <div class=\"col-sm-4\" style=\"float:left;\">

           <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
               <tbody>
               <tr>
                   <td style=\" width: 16.1em; height: 1.5em; text-align: center\">মেজর কোর্স</td>
               </tr>
               </tbody>
           </table>

           <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
               <tbody>
               <tr>
                   <td style=\"width: 8em; height: 1.5em; text-align: center\">থিওরি</td>
                   <td style=\"text-align: center;width: 7.9em; height: 1.5em;\">ল্যাব</td>
               </tr>
               </tbody>
           </table>
           <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
               <tbody>
                
                   <tr>
                       <td style=\"width: 4.45em; height: 1.5em;\">&nbsp;</td>
                       <td style=\"width: 3.3em; height: 1.5em;\">&nbsp;</td>
                       <td style=\"width: 4.43em; height: 1.5em;\">&nbsp;</td>
                       <td style=\"width: 3.3em; height: 1.5em;\">&nbsp;</td>
                   </tr>
                </tbody>
                
           </table>


       </div>
        <div class=\"col-sm-4\" style=\"float:left;\">
            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                <tr>
                    <td style=\" width: 16.1em; height: 1.5em; text-align: center\">নন মেজর কোর্স</td>
                </tr>
                </tbody>
            </table>

            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                <tr>
                    <td style=\"width: 8em; height: 1.5em; text-align: center\">থিওরি</td>
                    <td style=\"text-align: center;width: 7.9em; height: 1.5em;\">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                
                    <tr>
                        <td style=\"width: 4.45em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 3.3em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 4.43em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 3.3em; height: 1.5em;\">&nbsp;</td>
                    </tr>
                </tbody>
               
            </table>
        </div>
        <div class=\"col-sm-4\" style=\"float:left;\">
            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                <tr>
                    <td style=\" width: 16.1em; height: 1.5em; text-align: center\">ড্রপ কোর্স / আডভান্স কোর্স </td>
                </tr>
                </tbody>
            </table>

            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                <tr>
                    <td style=\"width: 8em; height: 1.5em; text-align: center\">থিওরি</td>
                    <td style=\"text-align: center;width: 7.9em; height: 1.5em;\">ল্যাব</td>
                </tr>
                </tbody>
            </table>
            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                
                    <tr>
                        <td style=\"width: 4.45em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 3.3em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 4.43em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 3.3em; height: 1.5em;\">&nbsp;</td>
                    </tr>
                </tbody>
                
            </table>
        </div>


    </div>
    <div class=\"col-sm-1\" style=\"float: left;\">
        <p></p>
    </div>
</div>

<div  class=\"row\" style=\"clear: both;\">
   <div class=\"col-sm-1\" style=\"float:left;\">
       <p></p>
   </div>
    <div  class=\"col-sm-10\" style=\"float:left;\">
        <div align=\"right\" class=\"col-sm-6\" style=\"float:left;\">
            <p>সর্বমোট ক্রেডিট</p>
        </div>
        <div align=\"left\" class=\"col-sm-5\" style=\"margin-left: 1%; margin-top: 1.5%;float:left;\">
            <div style=\"width: 7em; height: 2em; border: 1px solid black; float:left;\" >
                <p> </p>
            </div>
        </div>
    </div>
    <div class=\"col-sm-1\">
        <p> </p>
    </div>

</div>


<div class=\"row\">
    <div class=\"col-sm-1\" style=\"float: left;\">
        <p> </p>
    </div>
    <div class=\"col-sm-10\">
        <p> ( প্রয়োজনীয় ফি সহ এ আবেদনপত্র শাহজালাল বিজ্ঞান ও প্রযুক্তি বিশ্ববিদ্যালয়ের পরীক্ষা নিয়ন্ত্রকের কার্যালয়ে
            নির্দিষ্ট তারিখের ভিতরে পৌঁছাতে হবে।  এ আবেদনপত্র যদি যথাযথভাবে পূরণ করা না হয় , পরীক্ষার্থীদের দ্বারা
            স্বাক্ষরিত না হয় সংশ্লিষ্ট বিভাগীয় প্রধান এবং যেখানে প্রযোজ্য সেখানে হল প্রাধ্যক্ষের দ্বারা সুপারিশকৃত না হয়
            তবে আবেদনপত্রটি সরাসরি বাতিল হয়ে যাবে)
        </p>
    </div>
    <div class=\"col-sm-1\">
        <p> </p>
    </div>
</div>
<div class=\"row\">
    <div class=\"col-sm-1\" style=\"float:left;\">
        <p></p>
    </div>
    <div class=\"col-sm-10\" style=\"float: left;\">

        <div class=\"col-sm-6\">

        </div>

    </div>
    <div class=\"col-sm-1\" style=\"float: left;\">
         <p></p>
    </div>
</div>


<div class=\"row\" style=\"clear: both;\">
    <div class=\"col-sm-1\">
        <p></p>
    </div>
    <div class=\"col-sm-10\">
        <div class=\"col-sm-5\" style=\"float: left;\">
            <p>যে সকল বিষয়ে রেজিস্ট্রেশন করে পরীক্ষা দেবে তার কোর্স নম্বর ও ক্রেডিট : </p>

            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                <tr>
                    <td style=\"width: 10em; height: 1.5em; text-align: center\">মূল কোর্স</td>
                    <td style=\"text-align: center;width: 10em; height: 1.5em;\">ড্রপ / এডভান্স</td>
                </tr>
                </tbody>
            </table>
            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                
                    <tr>
                        <td style=\"width: 6.7em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 3.1em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 6.6em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 3.1em; height: 1.5em\">&nbsp;</td>
                    </tr>
                    
                    <tr>
                        <td style=\"width: 6.7em; height: 1.5em;\">মোট ক্রেডিট</td>
                        <td style=\"width: 3.1em; height: 1.5em;\">&nbsp;</td>
                        <td style=\"width: 6.6em; height: 1.5em;\">মোট ক্রেডিট</td>
                        <td style=\"width: 3.1em; height: 1.5em\">&nbsp;</td>
                    </tr>
                </tbody>
            </table>
            <table border=\"1\" bordercolor=\"#888\" cellspacing=\"0\" style=\"border-collapse: collapse; border-color: rgb(136, 136, 136); border-width: 1px;\">
                <tbody>
                <tr>
                    <td style=\"width: 10em; height: 1.5em; text-align: center\">সর্বমোট ক্রেডিট</td>
                    <td style=\"text-align: center;width: 10em; height: 1.5em;\"></td>
                </tr>
                </tbody>
            </table>


        </div>
        <div class=\"col-sm-6\" style=\"float: left;margin-left: 4.8%\">
            <div class=\"col-sm-4\">
                <p>স্নাতক</p>
                <p>স্নাতকোত্তর</p>
                <p>অন্যান্য</p>
                <br>
                <p> শিক্ষাবর্ষ &nbsp;</p>
                <p> ব্ষ &nbsp;</p>
                <p> সেমিস্টার &nbsp;</p>
                <p> বিভাগ </p>
            </div>
            <div class=\"col-sm-4\" style=\"float: left;\">
                <p></p>
            </div>
            <div class=\"col-sm-4\" style=\"float: left;\" >
                <div  style=\"width: 10em; height: 10em; border: 1px solid black ; margin-top: 25%;\">

                </div>
            </div>

            <table cellspacing=\"0\" style=\" clear:both;\" >
                <tbody>
                <tr>

                    <td style=\"width:7.813em\">রেজিস্ট্রেশন নম্বর</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                    <td style=\"width:1.563em;border:1px solid black;\">&nbsp;</td>
                </tr>
                </tbody>
            </table>
            <br>
            <p>নাম : &nbsp;<br>
                (ইংরেজি বড় বর্ণে লিখুন)</p>

        </div>

    </div>
    <div class=\"col-sm-1\">
        <p> tapos data </p>
    </div>
</div>






</body>
");

        $dompdf = App::make('dompdf.wrapper');

        // Get the style section out of the HTML
        $styles = $doc->getElementsByTagName('style');
        $style = $styles->item(0);

        // Get all the divs with class page (separate pages)
        $xpath = new \DOMXPath($doc);
        $pages = $xpath->query('//div[contains(@class, "page")]');

        // insert each page individually
        foreach($pages as $page) {
            $html =  $doc->saveXML($page);
            $dompdf->insert_html($html);
        }

        $dompdf->stream('archive.pdf');

        //return $pdf->download('archive.pdf');
    }
}