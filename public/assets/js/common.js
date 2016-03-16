/**
 * Created by ryutaro on 16/03/16.
 */

// フォームを削除する
function delCheck(){
    // セレクトボックスの数を取得
    var getNumbers = document.getElementById("hidden").innerHTML;
    // キャストしてインクリメント
    var numbers = parseInt(getNumbers) - 1;

    // 1個しかない場合は処理を終わる
    if (numbers == 0) {
        return;
    }

    // 値を更新
    document.getElementById("hidden").innerHTML = numbers;

    // フォームを1つ削除する
    numbers++;
    var atk = "atk" + numbers;
    document.getElementById(atk).innerHTML = "";
}
