<?php

class Employee
{
    /** @var string  */
    private $name;
    /** @var Department */
    private $department;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function assignDepartment(Department $department): void
    {
        $this->department = $department;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function manager(): Employee
    {
        return $this->department->manager();
    }
    public function code()
    {
        return $this->department->code();
    }
}

class Department
{
    /** @var string */
    private $name;
    /** @var string */
    private $code;
    /** @var Employee */
    private $manager;
    public function __construct(string $name, string $code)
    {
        $this->name = $name;
        $this->code = $code;
    }
    public function assignManager(Employee $employee)
    {
        $this->manager = $employee;
        $employee->assignDepartment($this);
    }
    public function manager(): Employee
    {
        return $this->manager;
    }
    public function name(): string
    {
        return $this->name;
    }
    public function code(): string
    {
        return $this->code;
    }
}

$emp = new Employee("Juan");
$dept = new Department("history", "001-23");
$dept->assignManager($emp);
echo $emp->code();                  echo PHP_EOL;
echo $emp->manager()->name();       echo PHP_EOL;