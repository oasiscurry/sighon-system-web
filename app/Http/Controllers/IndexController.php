<?php
/**
 * *****************************************************************************
 * Lalavel indexページ用コントローラーのファイル
 *
 * @package   Controllers\Index
 * @author    shingo.yoshioka / https://www.sighon-system.jp
 * @copyright 2020 shingo.yoshioka
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * *****************************************************************************
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;
use App\Http\Requests\ContactFormRequest;

// reCAPTCHA v3 シークレットキー
define('V3_SECRETKEY', 'シークレットキー');

/**
 * *****************************************************************************
 * Lalavel indexページ用コントローラークラス
 *
 * @package Controllers\Index
 * @author  shingo.yoshioka / https://www.sighon-system.jp
 * *****************************************************************************
 */
class IndexController extends Controller
{
    /**
     * *************************************************************************
     * Indexのビューを表示
     *
     * @return view
     * @author shingo.yoshioka / https://www.sighon-system.jp
     * *************************************************************************
     */
    public function index()
    {
        Log::info('indexビュー表示');
        return view('html.index.#01_index');
    }

    /**
     * *************************************************************************
     * フォーム送信処理
     *
     * 1.フォーム入力内容をバリデーション
     * 2.フォーム内容をメールで送信
     * 3.フォーム送信結果画面へリダイレクト
     *
     * @param Request $request POST GETデータ
     *
     * @return RedirectResponse
     * @author shingo.yoshioka / https://www.sighon-system.jp
     * *************************************************************************
     */
    public function sendForm(ContactFormRequest $request)
    {
        // reCAPTCHA シークレットキー
        $secretKey = V3_SECRETKEY;

        // reCAPTCHA アクション名
        $action = isset($request['action']) ? $request['action'] : null;

        // reCAPTCHA トークン
        $token = isset($request['g-recaptcha-response']) ? $request['g-recaptcha-response'] : null;

        if ($token && $action) {
            // cURL セッションを初期化（API のレスポンスの取得）
            $ch = curl_init();

            // curl_setopt() により転送時のオプションを設定
            // URL の指定
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");

            // HTTP POST メソッドを使う
            curl_setopt($ch, CURLOPT_POST, true);

            // APIパラメータの指定
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => $secretKey, 'response' => $token)));

            // curl_execの返り値を文字列にする
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // 転送を実行してレスポンスを $api_response に格納
            $api_response = curl_exec($ch);

            // セッションを終了
            curl_close($ch);

            // レスポンスの$json(JSON形式)をデコード
            $result = json_decode($api_response);

            // reCapchaからのレスポンスを判定
            // 0.5以上であればOKとする
            if ($result->success && $result->action === $action && $result->score >= 0.5) {
                // フォームデータ
                $form_data = $request->only('input_name', 'input_phonetic', 'input_email', 'input_tel', 'input_subject', 'input_message');

                Log::info('メール送信');

                // 送信先セット
                $to = [['email' => 'メールアドレス', 'name' => '氏名']];

                // フォーム送信処理
                Mail::to($to)->send(new ContactFormMail($form_data));

                // フォーム送信結果画面へリダイレクト
                return redirect()->route('send_result');
            } else {
                Log::info('reCapcha失敗');

                // フォーム画面へリダイレクト
                return redirect()->route('/#contact');
            }
        }
    }

    /**
     * *************************************************************************
     * フォームの送信結果を表示
     *
     * @return view
     * @author shingo.yoshioka / https://www.sighon-system.jp
     * *************************************************************************
     */
    public function sendResult()
    {
        return view('html.index.#01_index');
    }
}
