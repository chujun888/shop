<?php
#实例化模型工厂类
class Factory{
	static function M($name){
		#实例化的模型集合
		$name=ucfirst($name);
		static $m_list=array();
		#不存在实例化对象
		if(!isset($m_list[$name])){
			$m_list[$name]=new $name();
		}
		return $m_list[$name];

	}
		
}
