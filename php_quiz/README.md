# 1. 2次元連想配列
	下記の配列を実行結果の通り表示してください。
		1 for文で表示する
		2 foreach文で表示する
		3 while文で表示する
		4 配列の数が増えた場合でも対応できるようにする。
		　array('id'=>4,'name'=>'d')を追加

```php
//配列
$list = array(
	array(
		'id'=>1,
		'name'=>'a'
	),
	array(
		'id'=>2,
		'name'=>'b'
	),
	array(
		'id'=>3,
		'name'=>'c'
	)
);
```
## 実行結果

### for文
	ID:1 名前:a
	ID:2 名前:b
	ID:3 名前:c
	ID:4 名前:d
### foreach文
	ID:1 名前:a
	ID:2 名前:b
	ID:3 名前:c
	ID:4 名前:d
### while文
	ID:1 名前:a
	ID:2 名前:b
	ID:3 名前:c
	ID:4 名前:d

# 2. 多次元連想配列
	下記の配列を実行結果の通り表示してください。
			1 for文で表示する
			2 foreach文で表示する
			3 while文で表示する
			4 メールの数が増えた場合でも対応できるようにする。
			array('a1@mail.com','a2@mail.com') →　array('a1@mail.com','a2@mail.com','a3@mail.com')

```php
//配列
$list = array(
	array(
		'id'=>1,
		'name'=>'a',
		'mail'=> array('a1@mail.com','a2@mail.com')
	),
	array(
		'id'=>2,
		'name'=>'b',
		'mail'=> array('b1@mail.com','b2@mail.com')
	),
	array(
		'id'=>3,
		'name'=>'c',
		'mail'=> array('c1@mail.com','c2@mail.com')
	),
	array(
		'id'=>4,
		'name'=>'d',
		'mail'=> array('d1@mail.com','d2@mail.com')
	)
);
```
## 実行結果

### for文
	ID:1 名前:a mail1:a1@mail.com mail2:a2@mail.com
	ID:2 名前:b mail1:b1@mail.com mail2:b2@mail.com
	ID:3 名前:c mail1:c1@mail.com mail2:c2@mail.com
	ID:4 名前:d mail1:d1@mail.com mail2:d2@mail.com
### foreach文
	ID:1 名前:a mail1:a1@mail.com mail2:a2@mail.com
	ID:2 名前:b mail1:b1@mail.com mail2:b2@mail.com
	ID:3 名前:c mail1:c1@mail.com mail2:c2@mail.com
	ID:4 名前:d mail1:d1@mail.com mail2:d2@mail.com
### while文
	ID:1 名前:a mail1:a1@mail.com mail2:a2@mail.com
	ID:2 名前:b mail1:b1@mail.com mail2:b2@mail.com
	ID:3 名前:c mail1:c1@mail.com mail2:c2@mail.com
	ID:4 名前:d mail1:d1@mail.com mail2:d2@mail.com

# Playground
https://paiza.io/ja/projects/new