<?php
namespace Traits;

trait rwTrait {
    public function slug($str = null){
			/*$str = strtolower(trim($str));
			$str = preg_replace('/[^a-z0-9-]/', '-', $str);
			$str = preg_replace('/-+/', "-", $str);*/
			return $str;
		}
}