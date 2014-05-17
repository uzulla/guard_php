Guard for PHP
==============

Like a Perl Scope::Guard

# SYNOPSIS

```
<?php
require "vendor/autoload.php";

use \Uzulla\Guard as Guard;

chdir('/usr'); # カレントディレクトリを/tmpに変更
echo getcwd().PHP_EOL; # カレントディレクトリを表示

call_user_func(function(){
    $g = new Guard(function(){ # Guardにコードを登録
        chdir('/usr');
    });
    chdir('/'); # カレントディレクトリを/に変更
    echo getcwd().PHP_EOL; # カレントディレクトリを表示
    # ここでscopeがおわるので、上で登録したコードが実行される
});

echo getcwd().PHP_EOL; # カレントディレクトリを表示
```

# DESCRIPTION

Guardは特定のスコープを抜けたときに実行する関数を登録する事ができます。

スコープを抜けたときに変数が開放されることを利用しているので、関数スコープのPHPでは無名関数などを使うとよいでしょう。

変数名を変えれば、いくつでも作る事が可能ですが、実行順序は保証去れません。

# LICENSE

MIT
