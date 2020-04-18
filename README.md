## 抽象化ゲーム

アイディアが全然でない、、、

そんな時はこれ。
アイディアを出す能力を根本から鍛えるゲーム。

(前田裕二さん の「メモの魔力」に記載のあった「抽象化ゲーム」をランダムで出題します)

どんなゲーム？
全く関係ない二つの事を無理やり共通点を見つけてアウトプットするゲーム。。

・・・・よくわからない

例えば、、、

ex) 人生 とは 納豆 である

* 甘いものではない

* 粘り強さが大事

* 少しのスパイスで良いものとなる（美味しくなる）

Let's try!

#### [抽象化ゲーム](https://taskapp.marumouken.com "抽象化ゲーム")

* テストユーザー　amiba
* password　11111111

適当に登録していただいても、大丈夫です。

## アプリ機能

### 1. 一覧画面

ログインユーザーまた、自分以外のユーザーの問題が一覧で表示できます。

<img width="1440" alt="スクリーンショット 2020-04-09 10 39 42" src="https://user-images.githubusercontent.com/54348732/79634964-cce0e100-81a8-11ea-8e41-d51cbe9146c2.png">

### 2. 問題画面

ランダムに問題が表示されます。また、登録したお気に入りの問題も表示できます。

 <img width="1440" alt="スクリーンショット 2020-04-09 10 39 54" src="https://user-images.githubusercontent.com/54348732/79634750-7c1cb880-81a7-11ea-8e9b-5dc4fcd53d57.png">

### 3. その他

+ CRUD機能の実装

+ ログイン機能

+ ページネーション機能

## こだわり、がんばったっこと

* 全体としては、ストイックに問題に取り組めるように、シンプルに実装しました。

* シンプルな実装の中にも、問題をランダムに表示させるといったゲーム性を追加しました。

* お気に入り機能の実装。自己満足??? 本当に必要だったか微妙ですが、ヘビーユーザーには必要な機能ですww

## ER図

<img width="823" alt="スクリーンショット 2020-04-09 15 16 19" src="https://user-images.githubusercontent.com/54348732/78864190-1e38f400-7a76-11ea-80da-c5abaaf9f9f5.png">


## 開発環境
 
* Laravel Framework 6.12.0

* sqlite3 3.28.0

* VSCode（Visual Studio Code）

## 使用方法

**1, ```git clone https://github.com/amiba2018/taskapp.git```**

**2, QuestionsController.php の `$this->next_question_id = Question::get(['id'])->random(1);` をコメントアウト。**

**3, ログインユーザーを作成後、`https://taskapp.marumouken.com/question/create` で問題を作成**

**4, QuestionsController.php の `$this->next_question_id = Question::get(['id'])->random(1);` をコメントアウトを外す**

## 作者

* SHINYA
 
## License

* MIT



