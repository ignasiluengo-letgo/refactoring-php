<?php

/*
 First of all, let’s remember, what does the composition mean in object-oriented programming. Composition combines different simple, transparent and independent objects into one complex whole thing.

With composition, we have two options here. We can replace conditional with Strategy or with State. These two patterns are closely related. In both patterns, we inject some encapsulated behavior in the original object. In State in choose behavior according to an object’s internal state (one or many property values). And in Strategy, we make a decision what kind of behavior we need according to how we want things to be processed.
*/

// strategy pattern

interface FormatStrategy
{
    public function formatData(array $data);
}

class JsonFormatStrategy implements FormatStrategy
{
    public function formatData(array $data)
    {
        return json_encode($data);
    }
}

class CsvFormatStrategy implements FormatStrategy
{
    public function formatData(array $data)
    {
        $lines = [];

        foreach ($this->data as $row) {
            $lines = implode(",", $row);
        }

        return implode("\n", $lines);
    }
}

class PdfFormatStrategy implements FormatStrategy
{
    public function formatData(array $data)
    {
        // build and return pdf document
    }
}

class HtmlFormatStrategy implements FormatStrategy
{
    public function formatData(array $data)
    {
        // make and return html
    }
}

class FormatStrategiesFactory
{
    public static function makeFor($format)
    {
        switch ($format) {
            case 'csv':
                return new CsvFormatStrategy();
            case 'html':
                return new HtmlFormatStrategy();
            case 'pdf':
                return new PdfFormatStrategy();
            case 'json':
                return new JsonFormatStrategy();
        }
    }
}

class StatisticsReport
{
    /**
     * @var FormatStrategy
     */
    protected $formatter;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var FormatStrategy $formatter
     * @return $this
     */
    public function formatWith(FormatStrategy $formatter)
    {
        $this->formatter = $formatter;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        if (isset($this->formatter)) {
            return $this->formatter->formatData($this->data);
        }

        return $this->data;
    }
}


// call
$strategy = FormatStrategiesFactory::makeFor('json');
$report = new StatisticsReport();

$formattedData = $report->formatWith($strategy)->getData();