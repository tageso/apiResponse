<?php
namespace TaGeSo\APIResponse;

class Response extends \Illuminate\Http\Response
{
    public $data = [];
    protected $paginationData = null;

    public function withData($data) {
        $this->data = $data;
        return $this;
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

    public function getCache() {
        return [
            "data" => $this->data,
            "paginationData" => $this->paginationData
        ];
    }

    public function setCache($cache) {
        $this->data = $cache["data"];
        $this->paginationData = $cache["paginationData"];
        return $this;
    }
}