# LinkSharing(Linkboard)
WebサイトのURLを共有するためのSNSです。
フォローフォロワー関係でWebサイトのURLとその感想を共有することができます。

## 名前について
LinkSharing(Linkboard)について多くの人がとっつ混まれると思います。  
リリース時のアプリ名とプロジェクトのパッケージ名を別にすることにより、万が一予定していた名前が既に商標登録されていたり、既存のサービスがあったりした場合にすぐ対応できるようにするため、パケージ名には抽象的な機能名をつけました。  
アプリには後からLinkboardという名前をつけました。  
そのため、
> LinkSharing(Linkboard)  

と表記されています。

## 投稿
共有したいURLとその感想と特徴づけたいことについてのタグをつけることができます。  
またサイトの情報がOGPなどから取得され、自動的に表示されます。  

## タグの自動補完
Linkboardはページの情報をogpなどから取得するようにしています。  
そこから得られる名詞を利用してタグを自動的に補完するようにしました。
このためユーザーの手間を削減することに成功しました。

## 数字のない(Webページの)レビュー
LinkboardはWebページのレビュー機能も兼ねています。  
しかしあえてそこにはレーティングを実装しませんでした。  
理由として評価は好みによっても分かれる場合があり、その理由を知ることなく数値だけで見られることを避けるためあえて実装しませんでした。 

## 画面間の矛盾
Vuexを利用し、状態を効果的に管理しています。  
このことにより、詳細画面でお気に入りを押したのに、  
別の画面では反映されていないなどの矛盾を最小にするようにしました。

## サーバと同期
WebSocket(Broadcast)で変更イベントを効果的に、  
クライアントへ伝播するようにしました。
