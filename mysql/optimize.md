* 针对频繁查询字段以及更新条件字段加索引。
* 加冗余字段减少join，空间换时间。
* 缓存常用搜索结果，需要允许一定数据的滞后。
* 内存数据库缓存: memcached,redis。
* 主从复制，读写分离。
* 集中高并发请求转化成消息队列处理。
* partition。
* 垂直拆分。
* 水平切分。