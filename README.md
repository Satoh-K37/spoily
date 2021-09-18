## SPOILY - スポイリー 
**頑張った自分を甘やかすご褒美ごはんを共有するSNSアプリ**

### アプリ概要
他の人のご褒美ご飯を見るのは自分へのご褒美の幅がめちゃくちゃに広がっていいとされており、
自分では思いつかないような発見が得られ、ご褒美ご飯の満足度がぶち上がりし、QOLがマッハになることが間違いなし。

I should spoil myself! 自分にご褒美あげなくちゃ！って英文のspoilを伸ばして、「**SPOILY**」というアプリを開発しました。

### 想定されたユーザー
ご褒美ご飯にマンネリが出てきてるユーザー。他の人がどんなご褒美ご飯を食べているのか知りたいユーザー。

### ユーザーが持つ課題
ご褒美ご飯に刺激が欲しいんじゃ！！！新しいご褒美ご飯を開拓じゃ！！！

### 課題の解決方法（このサービスでどうやって解決するか）
自分だけのご褒美ご飯を共有するサイトを使うことで新しいご褒美ご飯を知り、食べることができる

### 使用技術
- フロントエンド
  - HTML / CSS / Sass / MDBootstrap
  - Vue.js
  - jQuery

- バックエンド
  - PHP 7.4.1-fpm
  - Laravel
  - Composer 2.0.14
  - PHPUnit

- インフラ
  - CircleCi
  - Docker 20.10.8/docker-compose 1.29.2
  - nginx 1.18-alpine
  - MySQL 8.0
  - AWS(EC2, ALB, ACM, S3, RDS, CodeDeploy, SNS, Chatbot, CloudFormation, Route53, VPC, EIP, IAM)


## AWS構成図


## 機能一覧
- **アカウント**
  - アカウント登録
  - アカウント編集
  - アカウント退会
  - ログイン・ログアウト
  - フォロー・フォロワー機能（最悪なくてもいい）

- **投稿機能**
  - ご褒美ご飯登録
  - ご褒美ご飯編集
  - ご褒美ご飯削除
  - ご褒美ご飯詳細
  - ご褒美ご飯一覧（全一覧、My投稿一覧）
  - いいね機能
  - 投稿に対するコメント機能
  - コメントに対するコメント機能
  - コメント削除
  - コメント一覧
  - 投稿に対するタグ付け機能（なくても良いかも）
  - お気に入り機能


- **検索機能**
  - 投稿に対する部分検索機能
  - タグ検索機能（できれば欲しい）


## DB設計


**ER図**

[pampaER図](https://viewer.diagrams.net/?highlight=0000ff&edit=_blank&layers=1&nav=1&page-id=UBpYk48M15_Obz66FB8Y&title=pamper.drawio#R%3Cmxfile%20pages%3D%224%22%3E%3Cdiagram%20name%3D%22%E3%83%AC%E3%82%A4%E3%82%A2%E3%82%A6%E3%83%88%22%20id%3D%2203018318-947c-dd8e-b7a3-06fadd420f32%22%3E7VzbdqM2FP0aP04Wd%2FDj5DLTrpV2ulam7bMsZFsNIAIicfr1PUeAuQh7MheMi8cPtnUkdNl7SzpHcrKwb%2BLdx4yk299EyKKFZYS7hX27sCzTs234QMtraQmWXmnYZDysCjWGB%2F4vq4xGZS14yPJOQSlEJHnaNVKRJIzKjo1kmXjpFluLqNtqSjZMMzxQEunWv3kot5XVNIwm4xfGN9uq6cCtMlaEPm4yUSRVewvLXqtXmR2Tuq6qfL4loXhpmey7hX2TCSHLb%2FHuhkWIbQ1b%2BdyHA7n7fmcskW95wPP9lb8Kls7SNV1z6b6rangmUcHqIaiOytcanJctl%2BwhJRTTLyCAhX29lXEEKRO%2BqtEzrN%2BA1H6AmIjIikXXe4huRCQyyEpEwrCozMQjq42AnKFe%2B5yaCWxkzaOo9%2FhaJPIDiXmEmvuLZSFJSGWuBGZaVXqoDRLxTQI2CsgxyLymIua0ak6HtcaJZZLtWqYK5o9MxExmr1Ckyq0Zf%2B0mX1ryMrzKuG1Lq54TpNL0Zl91wyt8qah9I82WRvP9p4%2BfTkx1h9AvsmcFJ2DJ6bLkDbC0HCDJHYMjW%2BPogZGMbjWWdDQ7VIQk3%2B5J0gBs0QlPpVhlvNvgsn4VC%2FpYpFdrkcX5Va7avha7oZm6VC%2FIiQlPPrOdgqVTzqqnW0BhMdSmoadevenqt%2FobsbXEGkGLPNncq9StrWnwuOx%2BsFiCnlqWrqaW%2FTxvq8UeQy2OppbPIoXRWoapCUYqhtrUp4InUnXHvV64tzrwiAqHDfJ9ZZYibej4jIlb6EKXP%2BfQvP5%2B6P2gC72jT9ShxdQaA3n3IPL63vn%2FRz7wzgd57yDy9gyRX9rng7x%2FEHlnhsibhnE%2B0Aca9FO6bd%2Fsh4%2FtyfUmyz7d3pyNIVduOQZpyy%2BTFvEDGP8I5r6Np3pKnUG8ZA5MueGAaZR4qa7056z7qllnDgVQhnOqCMrUTzMeGJVcJDN1i%2B0%2B%2Fr4ekpxsozL1Q4YG%2FTm6xo7vnxH6Q8cHNfpzdI89yz4j9PVwvEF%2Fji6y75%2FTyqOH5AvLixC2kD93oPeeCjxrv0YG3lUQv4cS%2FxS55OvXpgB821SfUXUSldS2e5GxGDuU5gV%2Bhmpvhma4xKHBgBYWjAKvK3JQAZMF5pKQpzznyBekWMSrUjk4CVgHGnmRxwKTksWpqpMnlIc8LBKsusA38B6gfSwt67YxFZMNMmvAoJ4KcgXf%2FsR8lvBYNY5FeJl4BiOJy9afCp7DRyLA7SiwENuxjHJJKvEWUURiKup2y8IwjLo3qjmeqgfxjahxxzAKUSMA3ZHYn9uyKVJI7C%2FPCtXvGjyOrWUszdiWgeOUKSyV8VlERQodYqrrCjeD5TkmKXhGDQUKlALe1sWGEyyWYPdLrYOhyLAbdzvKUsmKkjGFq6CUMKqeoEXKQyLLpxUCaSZ4iDOlZKtkQnWMFlFKSgyxkvUayMV0yHKWleViEZUdJiX0XEGc73ks4qtaYSD7tshaZiXirnUUXT8oJSpaU5blKQ5HKs7QlcUhxolK8lyRkQCkmGRZ1tL%2Fni6lO0qLnCSSt1iKnwqmxl%2BEdQ4iK4VEURrl3CLQg71IGSkfgQlX4k0wRVZoiiKh%2BABRy1ICzyiequNqjkB5JVg80QafnUp8YsWAZVWcl58hp5I0DLNdGsGCuxKomd9ZLJrJhN2I%2ByMFEZDGljfLQQ4jQaSyUvsIY1jmqARqtbMSVBVVUwc6o57E6c33EKqhiXyvvUxNV9bvE1aA2QnLKYeaUGskxo0jWeVpV2Rv0d4cIqCjGyk%2BZYwQ3Lrd3dIbiG7dYCi4DUbZL%2FWDVI3bGqZ7ZOoPAVrG%2FcC%2BXQkpRdzn8813TgfQH7rRGrqbUglO86ucx2nEfqXYpyP3U19zW%2FSdByQjS2boQGtQMo4xhmSsIRdrDsvByHeEg%2BeQ9uloe8NM%2F0mbTtvQAj1I2zgLtKXft8z7IKs%2Fa9yBc0T%2FVOGkpV%2B5zPwgq4d%2B4E2Jvn53Mu%2BDrB76dl3DJOjXa9zFHGT10Xf9KdE%2FdoHhzx99x3OmRP%2FYBUYwf%2FRdY8pd1z52gbG8APTtKXdd%2B9gFRn0bPmv4%2FUm3XT28bsF%2FAR6%2FZ0y67%2Bphcgv%2BC3D5PceeEv6j4e4F%2BPyev5wS%2FmPxrnkBTr9vTup2Hgt43fmjby%2BnXHvqzgyi780ffceaculxjv5i7wLE70960unoEe%2FdTuJ1NT52z5PHfIYU9P%2BkxXMnXYD0yOsDw58L4G3%2BHD3%2FPvzTHvY7euTVwD9Hz1%2BDP9B%2FuXdC%2BPXIq4F%2Fjp5%2FH3576C%2FDTwe%2FHnk18M%2FR89fgdydVvx55NfDP0fvR4F9Oqn498mrgn6Pvr%2F0xrzWe%2BiHZ%2FF8Tldf65zH23X8%3D%3C%2Fdiagram%3E%3Cdiagram%20id%3D%22UBpYk48M15_Obz66FB8Y%22%20name%3D%22ER%E5%9B%B3%22%3E7V1dl9o4Ev01%2FUgOtjGGx3QnmZ3dzmw2yezOPPVxgxq8MZg17nT3%2FPqV8QfgEiBhyyrZmpNzBty2sXVVV9KtKtWNc7d6%2FSX2N8vP0ZyEN%2FZw%2FnrjfLix7dHUGtL%2FpUfesiPOaDjNjiziYJ4ds%2FYHvgV%2FkfxgfuHiOZiT7dGJSRSFSbA5PjiL1msyS46O%2BXEcvRyf9hSFx7%2B68RcEHPg280N49D%2FBPFlmRye2tz%2F%2BNxIslsUvW%2BP8%2FVZ%2BcXL%2BJtulP49eDg45H2%2BcuziKkuzT6vWOhGnrFe3y73%2FO%2Fvr1y6cvL38uF%2BHn%2BGG58f41yG72SeSS8hVisk6uvvWvnz4sl7O3TfL38HEwCrd%2FfIvngwKln374nDfYb1ESPAUzPwmi9TZ%2F8%2BStaE7aCJv0Y%2BI%2Fpodut4kfJznqzpAeoDgmfrAmMT1g7b6Hob%2FZBrvTsyPLIJzf%2B2%2FRc1LcqPh2%2BxS8kvnXDPT0XIr%2FPb1Z%2BjW9%2BRO9%2Bbf8YdI%2F%2B2GwWNPPM9ow6S%2FexmRLn%2BXe3yblDZ7XczLPv3E2ZN7gP0mckNeDbpQ37C8kWpEkfqOn5H8tukhuJHkPetn3N3ucn7E86GtO0fp%2B3scX5Y33ONIPOZQisFoA1pNI0tZIAj%2F8So3PXy92oB5jljb8PI423%2F14QZL8wCYK0ib%2F%2BJO2ZIlOEIZ3URil0K%2BjNSlO272de0v%2F0fe9G75zb1z6AHf0u7X%2FTv%2Blp8fJHe12SUy7UPpThCL5QlI0b5Nok%2F9OSJ6Kx4jz1kw%2FP0ZJEq1OIn2%2B%2F1%2BGuiDAISe40rC1AbZf%2FiGCbkRf9incMdkymM%2FJOrPalH39PeIMMJkIlK1ehaNqq7yI8BvfAQROqwg4AIH0%2FPfpdfTd8EFR0GR27u1248%2BC9eI%2Bu3JcwcqVgtXraetpF7tRn5lxKJMZx5zMOJKGrQuw%2FYSRGXkRGHEjcIEJ5bX4GLT4z2AbJFH8oDkjNo%2BRIAPKw8wzDCiJAa2h8snhpFsU6HFDoGwyOGVTIJn3hQL5McIyCSyW64YCm6dA5etjG2ofOlOgzQ%2BBKgosrOegxTfRNukJ%2FwkAhIb%2FoIBh%2BK8h%2FuNdBcsDFyocWvOfww2BMv6DusMsWq3oe%2FWFAvkxQkOBULkwFNgQBU6VU2A9iQMZAY65AVBGgFB18Gep%2FzgjP9pZKa0gRKAx%2FuOHCA3%2FQdnC8F8z%2FFdGAyjjv%2BLG3eC%2FKTcAqvjPgZLDbElmP0g%2B%2B3uMopD4a4QYNMaA%2FCBhYUAHqhaGARtiQFc5A9ZTOHAxYNlTETMgFB1mMfFTL4hPV77DOf2YBCtyc2ffvB%2F%2B9s%2Fv9Nhvv9%2FfIwSlKUoUQA0NJUIhw1BiQ5Q4UU6J9RQPZJTocgOgjBKhCPG8SXmwv4zIDxoaRoTKxlcSZrHxy2BzEiwTHn8I48AroplyNhxYIwayHgNZayIN2l4rIAIR2aUN1IqRZ4ErzWyL3tXRGHkHvyQygpKI5r6wK2PkBbA6M%2BiNWsXOKCOymJEVHdAuM0JhROfogLKrImZCKI08UQuJXkhfguQFQEJDgUYJkUWBrOiAdikQCiFaUyB%2BKWQEpZCcAklfKLAR6aNdCoTSh6HAZijQYkUItMuB9cQPZAzID4AqBnShINF3%2F5gAalgo0e31thpyKZEVMtAqJbr1VA9clOjya%2FTKKBEqET33jwmAhoYRobhxH%2FwgJ0EyfrEjv1jh3CrcYmNWArnLAFSeW8zttfIh4IRx%2Bbd%2BOOMWY4Erz1qh8tElt5iLXwlxoRKiuQBypVtMAKszY53dKnZGEJHFjCy3WLvMCPUQnTVhF78iMoaKyPO2Ny4xAYCw0N%2FYiB%2By6I%2FlEmuV%2FsZQ%2B9CZ%2Fsb41Y8xVD96tGeKAEBo6M9sHCqL%2FpjusHb5r57ogYz9Gts3VF57QyGi7%2B4wAdTQUKLZSVQaJbLcYe1SYj21Axkl4t9HdAwViJ67wwRAw8KIHgTxC53VnwRJF3cYRKwZB5hbJNKWeWG8Owe4riwMC89aP0c1AXdL2dn1qZ0ygRpWlxxgZdfFO8xNoNJEz8%2F1jqNxbYgQF1neMAHgsGRGT8wesrJoUvkWspNubSE7wb%2BF7AQKUD3yhgkAhIX%2BpiYYQBb9Kd8%2Bdtql5Igp%2FlCAsmwO7gZviu0EEMHCdtbQeL9k0R3T%2B9Vu0ahhl9xf%2B76KmfG02IytsRJRApBgobxJr7eHkst4yreHnWox4eAEYMIPgCq%2Bm9aLHdSM7gQAQcN2phyKNLZTvvPrpEvlUCb4y6FMoDb0GM3fMiWPPnSnpTz9SqFMe53xKJX7bEs19021WGhxAjDFn%2BA4hWPNNiGbhzSgZfdyvSgIJQAUFha0hia%2FRxoNsna7blniszvEg%2Fu%2BipcIraEWJWiak%2FgaSelpGSITwC6N8jz1lNelCPZ9X8VMeVo4zpujvEYC1NuFqGZ0M16ImglIr9YpsYs6BspSCixGxCxCxGQBMihbtoCEER7UsgnBid3vWxJvT6LS9yyPgVPFkFn%2Bxx2%2BGx7%2B5zBAnZ5BNf%2F9fec%2F%2BD1GSC3P5pJ%2BSJtq7SfkNt0Pbgv6TvmudbpTr0NrBLIbLIEw0bM7rl3uZvK4A2rNXUpA2XdmxLNUhq%2BTXrDLq7zJIq2Lz3qnWV6ZiyKC4dm8S4VmVjO%2BQ3NOFVlWinMqe682lWBrEVzCC0jZdREz6BQuSdb%2Bihw7dzRnTwl4oWVLk8onjS3ZW7upBLvecgMbW%2BJP7bMY8SVk5QfhEV32Z1sPEczQMqYJl5TGmCd2g1OJdpfiJ%2Fd9FzNlQtfdxt9uX6J43lvWbCSwUi1rmpQaeazJ3jBOHdq2Hkm93OaHP8nGZkTwbeKINhF5CFb%2BgkDqRAhIc4TZSBaOSsK0awbtGcIUTctRS5haBAxyIrLvu5gJE2ohWxI%2BPdBOG0fz51kSROueRKyL4IWVLq1ee9Ll0iUzk0cpXVpd2rRi33cR06UFVa%2FHIE6Wm9CfHRVyJwsSI8SiMa4UAAsrV9r1VmeGK0XTfZRypd0lF%2Fm%2B7yLmyqKBTYWLq3BDS5vGVS6PNlkpQ2pps0u%2B8n3fxUybjH1w%2B10FQwQ2tKxp3OXSWNNhl4xXiXaX3OX7vouZNaG73J%2BvgjU99BhFIfHXZUj7nDz5z2GSLdWfQn%2FbLy7V3olu28aJLo9LseULlXfuCJdq4ER3oFSyq8SwTfzkeXvAqFUu9cNtmnLYEyLV37nuQIXGEGlTRIotSYhSe5eItOy7mIkUiicxWZHVIyXTJPpBmxBf%2BzfGjwIAYeVHRoX6u2i1ImcqEbE2OrCHN%2Bg2OojTbH4yL86PZ%2Fmzsk2woZ1FvFzaKvYkGBV5i0cWyjDRMq5PAsa9jpgQSGzfWwO%2FnM3ap6RVBmZUte%2FSZgO2BoXubUale81rul25rYAIWmeGRJ5dWxpEz2wQKI0fGQkLbfMjlE11LnNpa1Dl3maVue9PoUsRiNCQoFdPgzQkeIYEGUkILZOgB%2FVOrUmw7K2ISdCD0uMm2iZ9IUEBiPCQoAn8kkaCFiO3oG0W7FSkl6dBpJcHxYl%2B1QgRQQkPDZpILnk0yEgbaJsGOxW65WkQuuVBDaL3eQICuOEhRhOWJY8YGYkBLROjHmUTuA1MgzisCSMOq%2BeZAAKwoeFFRvWKPIrgISab8O0kXnrGEkAoJUUPeLycWAY0SsC215qIiKe6tAKNogcYdSk6FT0gENWobhCEIonmGvG10QMCaOEZ%2B4xYIo0f1UcPTKBWorXjTKByuzo%2BhGpJn6IHBCDCQ4JGGJFGguqjBxiFdvQmQQ2UEUa9mz5FDwhAhIYEGQVzDAk2RIL80QPShJCaBXSQceCUH4JLHCivxaE4MctlxZ7QoABKojQoD7V6W3YaGjwbPcCZTiZxlKund2CjQZcbAnVTQahB9CyISgAlPLNBqGIYGmyKBj31NFhP8cBGgxNuCFTRoMMoNdP7ICoB3LAQo1Nzd1VlltOMj98qnb6Fk7%2BQOpQZFmMD1P4E4TSDqjusRG64Y4hq27DCdZgmqq2kaJqxO1FtaXDtNKPWtYhiEyLFS59uhT5ZcaNl%2BfpDWMvIewm49noHAYF4HEdgb87TMVJMeCVaLVzJdSlGat97EU%2F%2BGRuiai4BXxkjJYLWmSl%2Fu%2BjV3OBUc34UWIhfwY%2BskrDt8iNjM1WEBsmLQNlXEbMhY1fTtU9XaP2Qg0UgwkOBJkJKGgWyiry2S4GjegMcNgrEHx%2FljOCg03c1WAQ3NLw4gkOZ4cWGeJEVNNU2MWoq9l%2ForJiJsc9qfm3Y0PCiywj66M%2F41pBXppiWlZVfXOWwMnJbemOdklAdq0cVLu62Cdk85GFadvcW5nKgnCqn3TFcyB0i6Rgk%2BZC0WG6blqGEK8RDKEcGSk4oWQpzy1DCReIhlK6BkhNKllLWMpRwQTij9y6SOtLIhtypRxYkNmCemfewasK2DCZcawYrf5FGkRiD5MFwwDt3teVhCMPEEn9hbFEMR8aunm3bIowtC4MfxAApBiRLMm3ZIKFEQNsiJvOgzPihL6dlzEtbKNq8KEo0R4YkQPxttE5HRAMiD4jqOZVRFGUWRT9oe%2BxEOjPJ4QOSFaHbMpBwAdmrWHjXujzvbHeUY5Ta6DcizugdHybWVBomPc8YAZhYrDTTVq0ETup3uwCZrBEhYKfDKrDcSSOePGxN0giA%2B4IVaJQ0wij50KmkEU%2BDpBFGuYaeJo0IoIUmAqZmNQbN%2BZE9z2mKH9UnjTAqPyA0SF4Eyr6KmA0ZRRqKaWRPtlMTgQkPDfa6%2FoJcGlSfOMKov4DQALntC3%2B1BYdRbeF4Y905QgCaY8BGKiy0jJipsCCNARGkiDBKLCC0QG4Dw19gwWEVWOhNEHpt2PDwIpQ3TIqIqDJcwFO6YVqE9eX14X%2Fr1UPw%2FnlLPnqjePXf74syAOUcHZL5ghQyEB1kltEiWvvhx%2F3RTCjKZH%2BLvv7tMlmFN5nCR9bz93G8g%2FTjVwrW9%2Bizv37b%2FYE%2B%2Fx85Irsvf6Zf3rnF1w%2Bvh3%2F88FZ8ew2SP4qb088HV9Fv%2B4vSL8U12Sul73GAEj%2FA2%2Bg5npEzxmEVE%2BukGOdPnWmPvYv0bLH2Fi0PxiT0k%2BDn8Zuw%2BkX%2BG1%2Bi3TK76IKle3zvdXKP75G9bX7ZvnuBO7nVO42dyp2y1gB3ov3Bfzs4LZ%2FonHzkMo64%2BKF8g95TDwbOH%2BXJrHtDyR5hbzYlEDUsiUNikmxJlv6WVEB32ZCy3qfOkCbAfVslaW5Dqm4yV2YmNWxIE%2BCYtM9bErjAmbZhSRwqxaEl0Z4XJG9fd3BG69rWdIVVXGuBsq3JHnOPS1ntB3Xm5E1cdt8UNqdpdXfUMs3ugjk11n85lphmTtXcnCpTmRROqcYVlpxc2XOdUaXnjqyxlIFgUJ0heUfjgCRa5yhRgNMshojMgn%2BClC3YVTJ6UysNMDaUAkrDdgFD8vLQnlNPNgL7A4teMG7F9Di2g5NkehhNyOE2obHikaXaW6bXjixV4ckbylmrAwuanrcHUJ9A9PziRaTaT%2FGj%2Bg1dmGZ03EOXo3pGp%2BHQBeWIS2v76gVtDES2epGsA4bk8FuSrVhubs6SpqeSippWm21gScMLejO8wmnBllwokyHOnwFOMl57OOlMq041YAmcVj1pLoz0OQx43GXFa58SLwHF6qZcAMWWYUSnUozH3qUxKv32hcQBbYJdqlUDgxDHJE2xA8ar%2BB%2BreXG8A4s1rO7K4Fbu1NDI4k2ZD3xy6lg5vdj14%2BSEruqPFT2%2FAEbuqKWVFIHVscM9ARxfjgaTaqTOCd%2B9sJWCOZYryUnKSMu9IEnAiArBC0bTFqaLjL0mdTA8weWabMPj90plEwmF2mHVdW9dOz5W7zSq3qkpr5RTNYwLgT7wAtduw5Js1ZZ0VWyCtpaUxYOos6RBxb9b3lfUkqolISXHITD2SzT9VGY%2FVay1DapseG0cQmUGZFVXVo3xvSjdV59r1ALZc6QDIZw26bpesRWLCna1T1Y5%2B1qPq1VUSpG%2BXBmeX32UlbqvvcBy2zA7dTF0CCMWyhXjZftR7Dl1wLJjcqUBAUu0qk%2FTkAU5F4KcL15QzBCkGgRjc8iWDaILk7miNtPludxE9aIDRopVduLjNaSBU7mTJUnfHoxARtD0%2FJONqqYnfEEbyhljo8K2Te%2Fd0HKOzM%2BaSLG%2F9CYNO5Iu26Srj01WI73dK1dYAzBOVtdqjdlk9ZFHlxZZIHtO9IJ6Nkm%2FxlGUHJ4e%2B5vl52hO0jP%2BDw%3D%3D%3C%2Fdiagram%3E%3Cdiagram%20id%3D%22D2vnDhReHn6m-ZMaWL7I%22%20name%3D%22%E7%94%BB%E9%9D%A2%E9%81%B7%E7%A7%BB%E5%9B%B3%22%3E7V1bc5s4FP41PHYHcdcjxHZ3Z7eXaWcn7dMOtYnNlhiXkNv%2B%2BpVA4iLkWHHAEjZ5iRACwznfuepIaObV7dP7LNxtPqSrKNEMffWkmTPNMIBjmugf7nkuewzdscuedRavyKi642v8X0Q6ddJ7H6%2Biu9bAPE2TPN61O5fpdhst81ZfmGXpY3vYTZq0f3UXrqNOx9dlmHR7r%2BNVvil7PcOt%2B3%2BP4vWG%2FjJwYHnmNqSDyZvcbcJV%2BtjoMueaeZWlaV62bp%2BuogRTj9LlJv719e85vPvx6cH%2BZ2tce78%2B%2FvGuvNniNZdUr5BF2%2FzoW6821992X2bP28cvi6ef8Uf38%2B7hnUVeLX%2Bm9IpWiHzkMM3yTbpOt2Eyr3uDLL3friJ8Vx0d1WP%2BStMd6gSo898oz58JFsL7PEVdm%2Fw2IWfRW2TP38j1xcF3fPCbTQ9nT82Ts2dyJEgGQq679D5bRi%2B8O2FrHmbrKH9hHLkfJkwDUoTI76P0NkIPiQZkURLm8UMbdyGB77oaV7MINQiXXsExe%2BLYQY4ZSnGMPPVDmNyTX7qOkmV622FkzSZM88dNnEdfd2FBkUekndsseR1pH6Isj55eJAY5a5HHJfoeUO33WCvPqm%2FTUJyOPhD5XLmArzH%2BvQXxkwCeGsxDgDf7Bjy59HMao%2FeosGHCNjhchuflc5KLGLZXT3E8EqhLMUFhNLqPqp9a92lzU%2FMMza8aAW04RcPUApM0PE%2BbW1ow0%2BCVNnfwIewiQAmlaehtwbBkK02nS3cJotOzCBijdNigSkoLnFZpiXKsd%2Fv1Jo4ZfKVlav6M6KpAp0rLqpXWKDRTdSxNNYEupS4ngjFFVZhaOgxccp5AmGdquV7mJWcKRHlmWmrxzJt4dphnjlo82%2BctwDnrJECfegtX1JHoMlwJt8F0VEsDGVKC%2F54hDkSjeOAphXF644vUS%2BJMg2ox7ZKNiTDT6ESgIkwDwJm4JhIfqeW40Qc%2FPtHpab5XJBhszZ9jT0FJv8A22n7BO%2Bl%2BgSV5UkCuvAgn2NQyTfS5W%2BLiaZ6r%2BT6WACQQXiklAEsDTv77GrS1uYulJFgU8wJojF7IjaP53UlCJcVF%2FsQA0DmkPwPH2hM1HDT%2FqYokeHzDYWo%2BaAeLZsOC0DEepKeqgJL2BMHn68KYWMUoR4OBFnTTeEqIieOpZlWAzgnrz0BMoLCYKJaAhvvEBLrtyRmzsBOlmJg8CXIKwbEL2dC1AD2xkyBSBD8y1Frj1ljFxpMuNcA9R6mhIaJAVGIrJTUGhx1ziN0m7DlZWC5IShJoEBKp8YJxoB1RWzberUtOi9Gpk7HFHvS5OaaEBuaeSS3Iop3Lb2Tu0SklxYQNOUxTupScpStFZ6EOwt8y1II%2FpzSME187WBoCGl97i7FU4rHwt6Fs%2BNsXPQ8vGnDYapWA2ZechRdnmlq5FEeKXRkb0xy1Inu63G5i2otMU6sewOSlY7pOBPIdYDHL5eIcSqCoy8AGlvLzKNZZplGoIzy2gNG95OJXYab1r6GKS%2F0sC58bA3Z4cdld487MEjXXbQuzBXUGAOUdazj0sDDNveRKG2GEuL3XbR6HELuNENc4AUIokQ4YzHHMarMGU36Mbe2ZRTXqGpt6OpVZXjgCgkNLNQ%2FF5hB8%2FB4K1QyHA1%2B1Yij63Ae0C%2FLCi%2FYc4llNr5viUBLspisb7FDuijUg1bxTqEvIcx9l3gG7g4WlM%2FviHLrAOYVDQMn6WpEVLF9AA%2FxiDL5hgO8DkakLivvMcP2QkqIPdKia7NtnGYrbomutbLXKrO09i60mP28ogu%2BZLH9VXfsIcoAdzSOf9A6H9OPXPI6oO%2BGoNSHo8Ox1UTjlWWyDVCICWpuIGguemS71VSU1VQlvs2ecigtIzwg4ey3FmSsu%2BaSHUgoe%2BtZTw6SzBcIVyPBl4E3VHF7qrBuI2LgcGnXiAALi6mglpYHVQ5YjWxioG3FeVtwVLX5zFZvK4xe%2FITjjwrZC0Vdra%2BplBLBtoU0ceCsJ%2F2pXY5rJkG4LKP8PEHwcXg7Qmc205NPXsznqpfQ0b9LCzizTJM2KM86v%2B7RwPA3z5sZBf82uhk8q7iK52BaUWSXvSgsqyak82UX7KoCHlcaFyBKoxcyjV%2BEFCOUrIJKUb0GejkUF4lveZv1dnqU%2Foyvyztt0i7XnTZwkTFeYxOstOlwiiESoP8AoiJdh4pMTt%2FFqVaheHtba6ngouHW24uWAzeKAzRwMbLxdJd8ItkOb6okgihNaTRg7EmOiCdfhQMZLuJ5Mo3V2YZjwNyj%2BLKYYo5rKbOLPPin%2BeDPbb8Eft8qjvZJicJA1rppgx4GdTRdpyIMdx1HuGXbducQJdqeFXae0gZeeOCnsYN8unUDmaIKdZNhZvF1oTgu7vp28CXYT7ARg179vx08dTiA7Fcg8tnhLvknt25ODRZbEa%2ByL1oHdBA4hcNBSf3ngAPpZ1pNVu6oJbCzVe0XZcWWiOrNRADhQJcqOd05QJFqRdaDd4Tq1pKOtHPVoAK%2FQDnJnuUSi2hhuxJKupqjvKTAbbIe7kQo682EC6WWaFczP6wMQ6LWYXJV8QvftWFs4PoPlZM9MQ8HhNNkzrDvO7uAnmhAwBsMU4DhYE6ZGjCnR8H9ASHEM%2BSBVEtWUdrVt4QnQNqUYmLXwJqPTDNEcw4AINPpF4MR6Pust1pwJTiIPx%2Fkz%2BUjWMIFjJ9CDgGEgOPUHzcHe2EFQ33N0%2BQIr8gOmoBzT3XlNidCD8zUA6bEH7zMNRLGOXdiI0jqYz9EHEcrXZnM6MksrGPdnc16%2BYKB0DuAUZnO2Xu%2FOUo8kDcPW7cnfjB0YPTveVLceWUoqwNrS3fYDgoyA9hBdjRpz6pJD6r9TDQ%2FpGL8sWy0bLv6hwN%2FjyOu4s2MyPv1JRkGjEwnAhqv3Y3IIXxYKl1U13K%2Bmntgj5G2%2BrpJQ7PdS%2BCumJ5i%2BuS6nA1NebrcnmKLDLMUQqq0retfNh3QV4RH%2FAw%3D%3D%3C%2Fdiagram%3E%3Cdiagram%20id%3D%22CxKqlU_F8uLXXoPAHshB%22%20name%3D%22Page-4%22%3ElZG7DoIwFIafpqOJtlFgFVEHjQMYXRtaS5PCIbWGy9MLKYgNi049%2Fc5%2F7oiEeX3QtMzOwLhCeMlqRHYI49XS973u7VFj0TrwiCVCSzbIJhDLlo%2BxA31Jxp%2BO0AAoI0sXplAUPDUOo1pD5coeoNyqJRV8BuKUqjm9SWYyS33sTfzIpcjGyqtNYD05HcXDJM%2BMMqi%2BEIkQCTWAsVZeh1z16xv3gotym1xOWjT3KqFX0cYsWthk%2B39CPiNoXphfU3fG1Fr3cU5Mojc%3D%3C%2Fdiagram%3E%3C%2Fmxfile%3E)


## 各テーブルについて
| テーブル名 | 説明 |
|:-:|:-:|
| users  | 一般ユーザー情報  |
| admins  | 管理者ユーザー情報  |
|  relationship | フォロー中/フォロワーのユーザー情報  |
| articles  | ユーザー投稿の情報  |
| tags  | ユーザー投稿のタグ情報  |
| article_tags  | articleとtagsの中間テーブル  |
| likes  | 投稿への、いいねの情報  |
| comments  | ユーザー投稿への、コメントの情報  |
