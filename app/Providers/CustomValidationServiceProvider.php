<?php
/**
 * *****************************************************************************
 * Lalavel フォーム用カスタムバリデーションのファイル
 *
 * @package   Provaiders\Validation
 * @author    shingo.yoshioka / https://www.sighon-system.jp
 * @copyright 2020 shingo.yoshioka
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * *****************************************************************************
 */
namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class CustomValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 全角カタカナと全角スペースのみのバリデーション
        Validator::extend('katakana', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[ァ-ヶー　]+$/u', $value) === 0;
        });

        // 数字とハイフンのみのバリデーション
        Validator::extend('tel', function ($attribute, $value, $parameters, $validator) {
            return preg_match('^[0-9\-]+$/u', $value) === 0;
        });

        // 全角のみのバリデーション
        Validator::extend('full-size', function ($attribute, $value, $parameters, $validator) {
            return preg_match('~ /^[^ -~｡-ﾟ]*$/u', $value) === 0;
        });

        // 半角のみのバリデーション
        Validator::extend('half-size', function ($attribute, $value, $parameters, $validator) {
            return preg_match('~ /^[ -~｡-ﾟ]*$/u', $value) === 0;
        });
    }
}
