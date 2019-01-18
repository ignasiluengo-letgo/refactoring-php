<?php
// open - close principle
class StatisticsReport
{

    protected $data;

    protected function initData()
    {
        // ...
    }

    public function getData($format = 'csv')
    {
        switch($format) {
            case 'csv':
                $lines = [];
                foreach ($this->data as $row) {
                    $lines = implode(",", $row);
                }

                return implode("\n", $lines);

            case 'array':
                return $this->data;

            case 'html':
                $html = '';
                // format as HTML ...
                return $html;
        }
    }
}

// --------------------------------------------------------------------------------------------

class StatisticsReport2
{

    protected $data;

    protected function initData() {
        // ...
    }

    public function getData($format = 'csv')
    {
        switch($format) {
            case 'csv':
                return $this->getDataAsCsv();

            case 'array':
                return $this->data;

            case 'html':
                return $this->getDataAsHtml();

            case 'pdf':
                return $this->getDataAsPdf();
        }
    }
}

