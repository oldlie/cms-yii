# Design Document

> Design roadmap

## Administrator

### System
|field|type|note|
|:----|:----|:----|
|website_name|string||
|website_summary|string||
|website_keys|string||
|icp|string||
|upload_url|string||
|upload_path|string||
|satic_path|string||

### Navigation

### posts

|field|type|note|
|:----|:----|:----|
|id|integer|auto_increment|
|title|string|标题|
|author|string|作者|
|post_date|datetime|发表日期|
|is_visible|boolean|是否可见|
|content|string|内容|
|agreed|int|点赞|
|liked|int|喜欢|
|views|int|浏览次数|
|picture|string|标题图片|

### categoies

|field|type|note|
|:----|:----|:----|
|id|integer|auto_increment|
|title|string|栏目标题|
|parent|int|上级栏目|
|comment|string|备注|
|picture|string|栏目默认图片|

