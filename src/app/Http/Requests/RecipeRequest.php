<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'recipe_title' => 'required|max:50',
          'content' => 'max:300',
          // 画像の最大サイズを10MBに設定
          'image_path' => 'file|mimes:jpeg,png,jpg,gif|max:10240',
          'ingredient' => 'max:200',
          'seasoning' => 'max:200',
          'step_content' => 'max:100',
          'step_content2' => 'max:100',
          'step_content3' => 'max:100',
          'step_content4' => 'max:100',
          'step_content5' => 'max:100',
          'step_content6' => 'max:100',
          'cooking_point' => 'max:100',
          // 半角スペースと「/」がないかをチェックする正規表現
          'tags' => 'json|regex:/^(?!.*\s).+$/u|regex:/^(?!.*\/).*$/u',
          'category_id' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'recipe_title' => 'レシピタイトル',
            'content' => '本文',
            'image_path' => '画像',
            'ingredient' => '材料',
            'seasoning' => '調味料',
            'step_content' => 'Step1',
            'step_content2' => 'Step2',
            'step_content3' => 'Step3',
            'step_content4' => 'Step4',
            'step_content5' => 'Step5',
            'step_content6' => 'Step6',
            'cooking_point' => 'コツ・ポイント',
            'tags' => 'タグ',
            'category_id' => 'カテゴリー',
        ];
    }

    // タグの個数を制限する
    public function passedValidation()
    {
        $this->tags = collect(json_decode($this->tags))
            ->slice(0, 3)
            ->map(function ($requestTag) {
                return $requestTag->text;
            });

        // $this->categories = collect(json_decode($this->categories))
        // ->slice(0, 1)
        // ->map(function ($requestCategory) {
        //     return $requestCategory->text;
        // });
    }

}
