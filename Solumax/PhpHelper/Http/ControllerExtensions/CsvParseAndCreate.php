<?php

namespace Solumax\PhpHelper\Http\ControllerExtensions;

// use Solumax\PhpHelper\Http\ControllerExtensions\CsvParseAndCreate;

trait CsvParseAndCreate {

    protected $delimiter = ',';
    protected $enclosure = '"';
    protected $extension = '.csv';

    public function parseCsv($file) {

        $firstRow = true;

        if (($handle = fopen($file, "r")) !== FALSE) {

            $all = [];
            while (($data = fgetcsv($handle)) !== FALSE) {

                if ($firstRow) {
                    $title = $data;
                    $firstRow = false;
                    $length = sizeof($title);
                } else {


                    for ($i = 0; $i < $length; $i++) {
                        if ($data[$i] === "") {
                            $data[$i] = null;
                        }
                    }

                    $all[] = array_combine($title, $data);
                }
            }
            fclose($handle);
        }

        return $all;
    }

    public function createCsv(Array $data, $filename = 'data', $header = true) {

        if (count($data) == '0') {
            return 'NO DATA FOUND';
        }

        $outputBuffer = $this->initializeCsv($filename);

        if ($header) {
            $this->createHeader($data[0], $outputBuffer);
        }

        $this->pushData($data, $outputBuffer);

        $this->getCsv($outputBuffer);
    }

    public function initializeCsv($filename = 'data') {

        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Description: File Transfer');
        header('Content-Disposition: attachment; filename="' . $filename . $this->extension . '"');

        $outputBuffer = fopen("php://output", 'w');

        return $outputBuffer;
    }

    public function createHeader($data, $outputBuffer) {
        $this->pushCsvLine(array_keys($data), $outputBuffer);
    }

    public function pushData($data, $outputBuffer) {
        foreach ($data as $val) {
            $this->pushCsvLine($val, $outputBuffer);
        }
    }

    public function pushCsvLine($val, $outputBuffer) {
        fputcsv($outputBuffer, $val, $this->delimiter, $this->enclosure);
    }

    public function getCsv($outputBuffer) {
        fclose($outputBuffer);
    }

    public function setCsvDelimiter($delimiter) {
        $this->delimiter = $delimiter;
    }

    public function setCsvEnclosure($enclosure) {
        $this->enclosure = $enclosure;
    }

    public function setFileExtension($extension) {
        $this->extension = $extension;
    }

}
