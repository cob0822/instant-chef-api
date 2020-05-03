▪️バックエンド環境構築手順

・適宜ローカル環境にDocker for macをインストールする<br>
　手順は割愛するが、docker -v と docker-compose -v  でそれぞれバージョンが表示されればOK

・/user/projects　など適当なプロジェクト用のディレクトリを作成する

・作成したディレクトリに移動し、Gitに挙げた環境をCloneする<br>
 git clone https://github.com/cob0822/instant-chef-api

・ls コマンドで、instant-chef-apiディレクトリが作成されていることを確認

・instant-chef-apiディレクトリに移動

・dockerのコンテナを立ち上げる<br>
 $ docker-compose up -d

 ※今回はPHP、Nginx（Webサーバー）、MYSQL用のコンテナを作成した

・コンテナが立ち上がったか確認<br>
 $ docker ps
　→３つのコンテナ名が表示されればOK

・WebでURL　http://localhost:8080/　を叩いてLaravelのTop画面が表示されれば、dockerの設定はOK

・mysqlのコンテナに入る<br>
 $ docker exec -it mysql bash

・管理者権限でmysql接続<br>
 $ mysql -u root -p<br>
 パスワード：blahblah

・mysql接続用のユーザーを自分の開発環境DBに作成する（以降、管理者権限でログインはしないこと）<br>
 $ CREATE USER ‘任意のユーザー名’ IDENTIFIED BY ‘任意のパスワード’;

 ※以降、以下の手順でmysqlにログインする<br>
 ①docker exec -it mysql bash<br>
 ②mysql -u ‘作成したユーザー名’ -p<br>
 ③’作成したパスワード’

・作成したユーザーでmysqlにログイン

・作成したユーザーにCRUD権限を付与<br>
 GRANT SELECT,INSERT,UPDATE,DELETE ON laravel.* TO ‘作成したユーザー名’@‘%’;

・権限を確認<br>
 show grants for 作成したユーザー名’;<br>
 （GRANT SELECT, INSERT, UPDATE, DELETE ON `laravel`.* TO 'ssy’@‘%’　　が表示されていればOK）

 ※mysqlをCUIで使う場合のコマンド<br>
  show databases; で表示されるDBの内、 ‘laravel’ が今回開発で使用するDB<br>
  use laravel; でlaravelDBに接続<br>
  laravelDBに接続した状態で　show tables;　でDB内のテーブル一覧が見れる
