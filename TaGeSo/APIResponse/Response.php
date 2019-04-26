<?php
namespace TaGeSo\APIResponse;

class Response extends \Illuminate\Http\Response
{
    public $data = [];
    public $success = true;
    public $msg = null;
    protected $paginationData = null;

    public function withData($data) {
        $this->data = $data;
        return $this;
    }
    
    public function setStatus($status) {
        $this->success = (bool)$status;
    }
    
    public function getStatus() {
        return $this->success;
    }
    
    public function setMessage($msg) {
        $this->msg = $msg;
    }
    
    public function getMessage() {
        return $this->msg;
    }

    public function getData() {
        return $this->data;
    }

    public function setPagination($currentPage, $pageCount, $itemsPerPage) {
        $this->paginationData = [
            "currentPage" => $currentPage,
            "pageCount" => $pageCount,
            "itemsPerPage" => $itemsPerPage
            ];
    }

    public function removePagination() {
        $this->paginationData = null;
    }

    public function getPagination() {
        return $this->paginationData;
    }

    public function getCacheData() {
        return [
            "data" => $this->data,
            "success" => $this->success,
            "msg" => $this->msg,
            "paginationData" => $this->paginationData
        ];
    }

    public function setCacheData($cache) {
        $this->header("X-Application-Cache", 1);
        $this->data = $cache["data"];
        $this->paginationData = $cache["paginationData"];
        $this->success = $cache["success"];
        $this->msg = $cache["msg"];
        return $this;
    }
}
