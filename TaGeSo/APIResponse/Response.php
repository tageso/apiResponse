<?php
namespace TaGeSo\APIResponse;

class Response extends \Illuminate\Http\Response
{
    public $data = [];

    public function withData($data) {
        $this->data = $data;
        return $this;
    }

    public function getData() {
        return $this->data;
    }
}