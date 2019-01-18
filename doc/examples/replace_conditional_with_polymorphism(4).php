<?php

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

class JsonStatisticsReport extends StatisticsReport
{
    public function getData()
    {
        // return report as json string
    }
}


class StatisticsReportFactory
{
    public static function makeFor($format): StatisticsReport
    {
        switch ($format) {
            case 'csv':
                return new CvsStatisticsReport();
            case 'array':
                return new StatisticsReport();
            case 'html':
                return new HtmlStatisticsReport();
            case 'pdf':
                return new PdfStatisticsReport();
            case 'json':
                return new JsonStatisticsReport();
        }
    }
}


class Request {}

// call
function getReport(Request $request)
{
    $jsonReport = StatisticsReportFactory::makeFor('json');
    // set report parameters from request
    return $jsonReport->getData();
}
