<?php

interface Application_Model_Interface_MapperInterface {
    public function getAllRecords();
    public function getRecord($id);
    public function create();
    public function delete($id);
    public function edit($id);
}