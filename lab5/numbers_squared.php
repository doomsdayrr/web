<?php
class NumbersSquared implements Iterator {
    private $start;
    private $end;
    private $current;

    public function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
        $this->current = $start;
    }

    public function rewind() {
        $this->current = $this->start;
    }

    public function valid() {
        return $this->current <= $this->end;
    }

    public function next() {
        $this->current++;
    }

    public function key() {
        return $this->current;
    }

    public function current() {
        return $this->current * $this->current;
    }
}

$obj = new NumbersSquared(3, 7);
foreach($obj as $num => $square){
    echo "Квадрат числа $num = $square\n";
}
?>