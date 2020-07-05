<?php

namespace Ubiquity\cache\database;

/**
 * Ubiquity\cache\database$QueryCache
 * This class is part of Ubiquity
 *
 * @author jcheron <myaddressmail@gmail.com>
 * @version 1.0.1
 *
 */
class QueryCache extends DbCache {

	public function fetch($tableName, $condition) {
		$key = $tableName . '.' . $this->getKey ( $condition );
		if ($this->cache->exists ( $key ))
			return $this->cache->fetch ( $key );
		return false;
	}

	public function store($tableName, $condition, $result) {
		$this->cache->store ( $tableName . '.' . $this->getKey ( $condition ), 'return ' . $this->asPhpArray ( $result ) . ';' );
	}

	public function delete($tableName, $condition) {
		$key = $tableName . '.' . $this->getKey ( $condition );
		if ($this->cache->exists ( $key ))
			return $this->cache->remove ( $key );
		return false;
	}
}
