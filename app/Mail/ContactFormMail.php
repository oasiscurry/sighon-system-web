<?php
/**
 * *****************************************************************************
 * Lalavel フォーム用メール送信処理のファイル
 *
 * @package   Mail\Form
 * @author    shingo.yoshioka / https://www.sighon-system.jp
 * @copyright 2020 shingo.yoshioka
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * *****************************************************************************
 */
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

/**
 * *****************************************************************************
 * Lalavel フォーム用メール送信処理クラス
 *
 * @package Mail\Form
 * @author  shingo.yoshioka / https://www.sighon-system.jp
 * *****************************************************************************
 */
class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    protected $name;
    protected $phonetic;
    protected $tel;
    protected $email;
    protected $message;

    /**
     * *************************************************************************
     * メッセージ整形などの初期化
     *
     * @param array $form_data フォームの入力データ
     *
     * @return void
     * @author shingo.yoshioka / https://www.sighon-system.jp
     * *************************************************************************
     */
    public function __construct($form_data)
    {
        Log::info('メッセージの整形');

        // メール件名
        $this->subject = 'ContactForm：'. $form_data['input_subject'];

        // メール本文用パラメータをセット
        $this->name = $form_data['input_name'];
        $this->phonetic = $form_data['input_phonetic'];
        $this->tel = $form_data['input_tel'];
        $this->email = $form_data['input_email'];
        $this->message = $form_data['input_message'];
    }

    /**
     * *************************************************************************
     * メッセージをビューへ反映
     *
     * @return message
     * @author shingo.yoshioka / https://www.sighon-system.jp
     * *************************************************************************
     */
    public function build()
    {
        Log::info('メール本文にフォーム内容を反映');
        return $this->text('mail.index.#40_contact')->subject($this->subject)->with([
            'mail_name' => $this->name,
            'mail_phonetic' => $this->phonetic,
            'mail_tel' => $this->tel,
            'mail_email' => $this->email,
            'mail_message' => $this->message
            ]);
    }
}
