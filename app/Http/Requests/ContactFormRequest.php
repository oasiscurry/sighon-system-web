<?php
/**
 * *****************************************************************************
 * Lalavel ContactFormのリクエストクラス用ファイル
 *
 * @package   Requests\Form
 * @author    shingo.yoshioka / https://www.sighon-system.jp
 * @copyright 2020 shingo.yoshioka
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * *****************************************************************************
 */
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    // バリデーションエラー時のリダイレクト先URLをオーバーライド
    protected $redirect = '/#contact';

    /**
     * *************************************************************************
     * リクエストでユーザー認証の判断
     *
     * @return bool
     * @author shingo.yoshioka / https://www.sighon-system.jp
     * *************************************************************************
     */
    public function authorize()
    {
        return true;
    }

    /**
     * *************************************************************************
     * バリデーションルール
     *
     * @return array
     * @author shingo.yoshioka / https://www.sighon-system.jp
     * *************************************************************************
     */
    public function rules()
    {
        return [
            'input_name' => 'required|string',
            'input_phonetic' => 'required|string',
            'input_email' => 'required|email',
            'input_tel' => 'required|string',
            'input_subject' => 'required|string',
            'input_message' => 'required|string'
        ];
    }
}
