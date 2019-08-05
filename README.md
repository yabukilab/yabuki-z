# 本番サーバへのデプロイ方法

本番サーバにデプロイする手順は以下のとおり。

1. メンバ全員のGitHubアカウントをPMがまとめて矢吹に報告する。
1. （矢吹の作業）リポジトリへのアクセス権限をメンバに付与する。
1. 自分のチームのGitHubリポジトリ（例：https://github.com/yabukilab/yabuki-z ）をクローンする。
1. phpMyAdminで作業中のデータベースを選択する。
1. 「エクスポート」をクリックし，作業用のデータベースをダンプする。その結果できるファイル`mydb.sql`を保存する。（データベースの仕様を変えたり，サーバ上のデータを削除したい場合については後述）
1. データベースへのアクセス方法を確認する。データベース名を`$_SERVER['MYSQL_DB']`，ユーザ名を`$_SERVER['MYSQL_USER']`，パスワードを`$_SERVER['MYSQL_PASSWORD']`にする（[htdocs/database_conf.php](htdocs/database_conf.php)を参照）。
1. フォルダ`htdocs`を作り，公開するファイルを保存する。このフォルダがドキュメントルートになる。（ここまでで，クローンしたフォルダ内に`mydb.sql`と`htdocs`ができる。）
1. コミットし，プッシュする。（GitHubのWebhooksという仕組みを使い，リポジトリが更新されると，公開用サーバに通知が行くようにしてある。公開サーバは，その通知に応答し，GitHubからファイルを取得，データベースを更新するようになっている。）
1. 動作を確認する。（本番サーバのURLは別に連絡する。）

### データベースの仕様を変えたり，サーバ上のデータを削除したい場合

phpMyAdminでエクスポートする際に，Export methodで「詳細」を選び，追加コマンドの「DROP TABLE / VIEW / PROCEDURE / FUNCTION / EVENT / TRIGGER コマンドを追加する」を有効にする。

補足：`mydb.sql`に直接SQLを書けば，権限の範囲内で何でもできる。このファイルに間違いがあるとデータベースを作れない。うまく行かないときは，このファイルの中身をローカルで実行してみるといいだろう。

### うなくいかないとき

以下を確認する。

* リポジトリのファイル構成（最上位に`mydb.sql`と`htdocs`）
* `mydb.sql`にデータベースの内容が書かれているか
* フォルダ`htdocs`に必要なファイルがあるか
* データベースへの接続方法が正しいか（[htdocs/database_conf.php](htdocs/database_conf.php)を参照）
* ログファイルを見る。（ログファイルの閲覧方法はここには書かない。教員に確認すること。）

ちなみに，ここにある[Twitterもどき](htdocs)も一つの教材である。

別の教材：[名簿アプリ](https://github.com/taroyabuki/pmpractice)

セキュリティの話：[コード](htdocs/security)（[動かしてみる](http://yabukiz.pm-chiba.tech/security/step1.html)）
