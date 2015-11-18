<?php

/**
 * User: ZhangLi
 * Date: 2015/11/9
 * Time: 16:06
 */
class Model {
    public $db;
    public $tableName;
    public $options;
    public $lastSql;

    function __construct($tableName) {
        $this->db = Db::getDb();
        $this->options['field'] = "*";
        $this->options['where'] = "";
        $this->tableName = $tableName;
    }

    /**
     * 查询数据
     * @return array
     */
    function select() {
        $this->lastSql = "select " . $this->options['field'] . " from " . $this->tableName . " " . $this->options['join'] . $this->options['where'] . $this->options['group'] . $this->options['order'] . $this->options['limit'];
        return $this->db->querySelect($this->lastSql);
    }

    /**
     * 插入数据
     * @param $data
     * @return bool|int
     */
    function insert($data) {
        if (is_array($data)) {
            $sql = "insert into " . $this->tableName;
            $fieldStr = "";
            $valueStr = "";
            foreach ($data as $key => $val) {
                $fieldStr .= "," . $key;
                $valueStr .= ",'" . $val . "'";
            }
            $sql .= " (" . ltrim($fieldStr, ",") . ") ";
            $sql .= " values (" . ltrim($valueStr, ",") . ") ";
            $this->lastSql = $sql;
            return $this->db->queryInsert($sql);
        } else {
            return false;
        }
    }

    /**
     * 更新数据
     * @param $data
     * @return bool|int
     */
    function update($data) {
        if (is_array($data)) {
            if (empty($this->options['where'])) {
                return false;
            } else {
                $sql = "update " . $this->tableName . " set ";
                $setStr = "";
                foreach ($data as $key => $val) {
                    $setStr .= $key . "= '" . $val . "',";
                }
                $sql .= rtrim($setStr, ',') . " " . $this->options['where'];
                $this->lastSql = $sql;
                return $this->db->queryUpdate($sql);
            }
        } else {
            return false;
        }
    }

    /**
     * 删除数据
     * @return bool|int
     */
    function delete() {
        if (empty($this->options['where'])) {
            return false;
        } else {
            $sql = "delete from  " . $this->tableName . " " . $this->options['where'];
            $this->lastSql = $sql;
            return $this->db->queryDelete($sql);
        }
    }

    /**
     * 指定查询的数据表
     * @param $str
     * @return $this
     */
    function table($str) {
        if (!empty($str)) {
            $this->tableName = $str;
        }
        return $this;
    }

    /**
     * 设置查询字段
     * @param $data
     * @return $this
     */
    function field($data) {
        if (is_array($data)) {
            $str = implode(",", $data);
        } else if (is_string($data)) {
            $str = $data;
        } else {
            $str = "*";
        }
        $this->options['field'] = $str;
        return $this;
    }

    /**
     * 设置排序参数
     * @param $string
     * @return $this
     */
    function order($string) {
        if (!empty($string)) {
            $this->options['order'] = " order by " . $string;
        }
        return $this;
    }

    /**
     * 设置limit查询数据
     * @param $string
     * @return $this
     */
    function limit($string) {
        if (empty($string)) {
            $this->options['limit'] = "";
        } else {
            $temp = explode(",", $string);
            if (count($temp) == 1) {
                $this->options['limit'] = " limit 0, " . $temp[0];
            } else {
                $this->options['limit'] = " limit " . $temp[0] . ", " . $temp[1];
            }
        }
        return $this;
    }

    /**
     * 设置连接查询
     * @param $string
     * @param string $type
     * @return $this
     */
    function join($string, $type = 'inner') {
        $str = $type . " join " . $string;
        $this->options['join'] = $str;
        return $this;
    }

    /**
     * 设置分组参数
     * @param $string
     * @return $this
     */
    function group($string) {
        if (!empty($string)) {
            $this->options['group'] = " group by " . $string;
        }
        return $this;
    }

    /**
     * 设置where查询条件
     * @param $data
     * @return $this
     */
    function where($data) {
        if (is_array($data)) {
            $str = " ";
        } else if (is_string($data)) {
            $str = " where " . $data;
        } else {
            $str = " ";
        }
        $this->options['where'] = $str;
        return $this;
    }

    /**
     * 获取最后执行的最后一条SQL语句
     * @return mixed
     */
    public function getLastSql() {
        return $this->lastSql;
    }

}