<?php

// With this hierarchy, our StatisticsReport class now is open for extension.
class StatisticsReport
{
    protected $data;

    protected function initData() {
        // ...
    }

    public function getData()
    {
        return $this->data;
    }
}

class CvsStatisticsReport extends StatisticsReport
{
    public function getData()
    {
        // return report as csv string
    }
}

class HtmlStatisticsReport extends StatisticsReport
{
    public function getData()
    {
        // return report as HTML string
    }
}

class PdfStatisticsReport extends StatisticsReport
{
    public function getData()
    {
        // return report as pdf
    }
}