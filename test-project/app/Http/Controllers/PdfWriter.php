<?php

/**
 * Created by PhpStorm.
 * User: Tapos
 * Date: 12/27/2016
 * Time: 8:25 PM
 */

use Knp\Snappy\Pdf;



class PdfWriter
{
    private $binaryPath;

    public function __construct()
    {
        $this->binaryPath = __DIR__ . '/vendor/bin/wkhtmltopdf-amd64-osx';
    }

    public function write($template)
    {
        $generatedPdfFilename = sprintf('export-%s.pdf', time());

        $generatedPdfFilePath = __DIR__ . DIRECTORY_SEPARATOR . $generatedPdfFilename;

        $snappy = new Pdf($this->binaryPath);

        $snappy->generateFromHtml(file_get_contents($template), $generatedPdfFilePath);

        return $generatedPdfFilePath;
    }
}