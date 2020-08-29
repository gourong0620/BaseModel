<?php

namespace BaseModel\Library;

use think\Model;

class Loader extends Model
{
    /**
     * 获取单条数据
     * @ $map 查询条件
     * @ $field 所需字段
     */
    public function getInfo($map, $field = '*')
    {
        return self::where($map)->field($field)->find();
    }


    /**
     * 获取单条数据
     * @ with 预加载模型  arr
     * @ $map 查询条件
     * @ $field 所需字段
     */
    public function getWithInfo($with, $map, $field = '*')
    {
        return self::with($with)->where($map)->field($field)->find();
    }

    /**
     * 获取多条数据
     * @ $map 查询条件
     * @ $field 所需字段
     * @ $order 排序
     * @ $group 分组
     */
    public function getListInfo($map = [], $field = [], $order = null, $group = null)
    {
        return self::where($map)->field($field)->order($order)->group($group)->select();
    }

    /**
     * 获取多条数据
     * @ $map 查询条件
     * @ $with 关联模型
     * @ $field 所需字段
     * @ $order 排序
     * @ $group 分组
     */
    public function getWithListInfo($with = [], $map = [], $field = [], $order = null, $group = null)
    {
        return self::with($with)->where($map)->field($field)->order($order)->group($group)->select();
    }

    /**
     * 获取多条数据
     * @ with 关联模型
     * @ $map 查询条件
     * @ $field 所需字段
     * @ $order 排序
     * @ $group 分组
     */
    public function withListInfo($with = [], $map = [], $field = [], $order = null, $list_rows = 10, $page = 1, $group = null)
    {
        return self::with($with)->where($map)->field($field)->order($order)->limit(($page - 1) * $list_rows, $list_rows)->group($group)->select();
    }

    /**
     * 获取分页数据
     * @ $map 查询条件
     * @ $field 所需字段
     * @ $order 排序
     * @ $group 分组
     * @ $list_rows 每页数量
     * @ $page 当前页
     */
    public function getPaginate($map = [], $field = [], $order = null, $group = null, $list_rows = 10, $page = 1)
    {
        return  self::where($map)->field($field)->order($order)->group($group)
        ->paginate([
            'list_rows' => $list_rows,
            'page' => $page
        ]);
    }

    /**
     * 获取分页数据
     * @ $with 关联模型
     * @ $map 查询条件
     * @ $field 所需字段
     * @ $order 排序
     * @ $group 分组
     * @ $list_rows 每页数量
     * @ $page 当前页
     */
    public function withPaginate($with = [], $map = [], $field = [], $order = null, $group = null, $list_rows = 10, $page = 1)
    {
        return  self::with($with)->where($map)->field($field)->order($order)->group($group)
        ->paginate([
            'list_rows' => $list_rows,
            'page' => $page
        ]);
    }

        /**
     * 获取分页数据
     * @ $with 关联模型
     * @ $map 查询条件
     * @ $field 所需字段
     * @ $order 排序
     * @ $group 分组
     * @ $list_rows 每页数量
     * @ $page 当前页
     */
    public function haswithPaginate($hastable = '', $haswhere = [], $with = [], $map = [], $field = [], $order = null, $group = null, $list_rows = 10, $page = 1)
    {
        return  self::haswhere($hastable, $haswhere)->with($with)->where($map)->field($field)->order($order)->group($group)
        ->paginate([
            'list_rows' => $list_rows,
            'page' => $page
        ]);
    }
}