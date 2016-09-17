<?php
Interface I_DAO{
    static function getNew($config=array());
    function getOne($sql);
    function getRow($sql);
    function getAll($sql);
}