<?php
class A{
    protected $action = 'aaaa';
    function __construct(){
        $this->action = "donkey";
    }

    function show(){
        echo $this->action."<hr>";
    }
}
class B extends A{
    protected $action = "FUCK";
    function show()
    {
        echo $this->action."<hr>";
        parent::show(); // TODO: Change the autogenerated stub
    }
}
$a = new B();
$a->show();


$b = new A();
$b->show();

