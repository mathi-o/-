@extends('layout')

@section('contents')
<div class="box">
    <div class="HowTotitle-Box">
        <h1 class="HowTotitle">me-tripの使い方</h1><h3 class="HowTotitle2">～旅の思い出をこれひとつに～</h3>
    </div><br>
    <div class="section">
        <h2 class="HowTotitle">1.都道府県一覧ページ</h2><br>
        <p><strong>概要:</strong></p>
        <p>都道府県一覧ページでは、各都道府県のボタンまたはGoogle Mapに表示されたマーカーをクリックすることで、各都道府県のページに遷移できます。</p><br>
        <p><strong>使い方:</strong></p>
            <ul>
                <li>ページ上部の都道府県リストから目的の都道府県を選択します。</li>
                <li>地図上のマーカーをクリックして、目的の都道府県を選択することもできます。</li>
                <li>選択した都道府県の専用ページに遷移します。</li>
            </ul>
    </div><br>

    <div class="section">
        <h2 class="HowTotitle">2. 都道府県専用ページ</h2><br>
        <p><strong>概要:</strong></p>
        <p>選択された都道府県に関連する旅行記録が一覧表示され、新しい旅行記録を追加するためのフォームがあります。さらに、searchBox付きの地図が表示され、ストリートビューも利用可能です。記録を追加すると、地図上に行った場所としてマーカーが表示されます。</p><br>
        <p><strong>使い方:</strong></p>
        <ul>
            <li>選択した都道府県の旅行記録が一覧表示されます。</li>
            <li>「新しい記録を追加する」の下の、日付、場所、タイトル、写真、感想を入力します。</li>
            <li>場所を入力すると候補地が下に表示されますので、選択してください。</li>
            <li>「追加する」ボタンを押すと、旅行記録が追加され、地図上にマーカーが表示されます。</li>
            <li>「今までの記録」は地図の下に一覧で表示されます。</li>
            <li>地図のsearchBoxを利用して、特定の場所を検索し、ストリートビューで詳細を確認することができます。</li>
        </ul>
    </div><br>

    <div class="section">
        <h2 class="HowTotitle">3. 旅行記録編集ページ</h2><br>
        <p><strong>概要:</strong></p>
        <p>旅行記録の編集ページでは、記録の編集や削除が可能です。</p><br>
        <p><strong>使い方:</strong></p>
        <ul>
            <li>「今までの記録」の一覧から特定の旅行記録の「編集画面」ボタンクリックして、編集ページに遷移します。</li>
            <li>「編集完了」ボタンをクリックして、記録の内容を変更できます。</li>
            <li>記録を削除したい場合は、「削除」ボタンをクリックします。</li>
        </ul>
    </div><br>

    <div class="section">
        <h2 class="HowTotitle">4. 写真一覧ページ</h2><br>
        <p><strong>概要:</strong></p>
        <p>都道府県ごとのページで記録された写真を一覧で閲覧できます。都道府県別や、日付の昇順・降順で条件を絞って表示することが可能です。</p><br>
        <p><strong>使い方:</strong></p>
        <ul>
            <li>右上の「写真一覧」ボタンをクリックします。</li>
            <li>記録された写真が一覧表示されます。</li>
            <li>フィルターボックスを使って、都道府県別や日付の昇順・降順で写真を絞り込めます。</li>
        </ul>
    </div>
</div>
@endsection

