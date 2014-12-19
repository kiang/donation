捐款表單
=========

這個表單是過去實際參與選舉時匆匆製作而成，實際付款部份已經移除，需要加工後才能夠使用

安裝方式
=========

下載：

```
$ cd /var/www
$ git clone https://github.com/kiang/donation.git
$ cd donation
```

環境設定：

```
$ cp -R tmp_default/ tmp
$ cp .htaccess.default .htaccess
$ cp webroot/.htaccess.default webroot/.htaccess
$ cp Config/core.php.default Config/core.php
$ cp Config/database.php.default Config/database.php
```

資料庫處理：

1. 在 MySQL 建立資料庫
2. 將資料庫的設定寫入 Config/database.php
3. 匯入 Config/schema/schema.sql ，例如：
  1. `cd Config/schema`
  2. `mysql -uroot -p your_db < schema.sql`
4. 透過瀏覽器開啟網頁，進入登入畫面時會引導建立新的帳號、密碼
