<?php

class Home extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        $data['title']="MPE Calcultor - All MPE";
        $this->load->view('index',$data);
    }

    function pdf() {
        $pdfFilePath = FCPATH . "assets\demo-" . date('His') . ".pdf";
        $data['page_title'] = "Create PDF";

        if (file_exists($pdfFilePath) == FALSE) {
            ini_set('memory_limit', '32M');
            $this->load->library('pdf');
            $pdf = $this->pdf->load();
            $pdf->useGraphs = true;
            $pdf->SetFooter($_SERVER['HTTP_HOST'] . '|{PAGENO}|' . date(DATE_RFC822));
            $graph = '
                    <table id="tbl_1"><tbody>
                    <tr><td></td><td><b>Female</b></td><td><b>Male</b></td></tr>
                    <tr><td>35 - 44</td><td><b>4</b></td><td><b>2</b></td></tr>
                    <tr><td>45 - 54</td><td><b>5</b></td><td><b>7</b></td></tr>
                    <tr><td>55 - 64</td><td><b>21</b></td><td><b>18</b></td></tr>
                    <tr><td>65 - 74</td><td><b>11</b></td><td><b>14</b></td></tr>
                    <tr><td>75 - 84</td><td><b>10</b></td><td><b>10</b></td></tr>
                    <tr><td>85 - 94</td><td><b>2</b></td><td><b>1</b></td></tr>
                    <tr><td>95 - 104</td><td><b>1</b></td><td><b></b></td></tr>
                    <tr><td>TOTAL</td><td>54</td><td>52</td></tr>
                    </tbody></table>

                    <jpgraph table="tbl_1" type="bar" title="New subscriptions" label-y="% patients" label-x="Age group" series="cols" data-row-end="-1" show-values="1" width="600" legend-overlap="1" hide-grid="1" hide-y-axis="1" />
                    ';
            $html = "<html>
            <head>
                <style>
                    .page{width: 210mm;height: 297mm; margin: 2cm 2cm; }
                </style>
            </head>
            <body class=''>
                <div class='page'><h1>Hello, how are you?</h1></div>
                <div class='page-break'></div>
                <div class='page'><h1>Hello, how are you guys?</h1></div>
                <div class='page-break'></div>
                <div class='page'>".$graph."</div></div>
            </body>
            </html>";


            $pdf->WriteHTML($html);
            $pdf->Output($pdfFilePath, 'F');
        }
    }

}
