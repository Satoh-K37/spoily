@csrf
<div class="md-form">
  <label>レシピタイトル</label>
  <input type="text" name="recipe_title" class="form-control" required value="{{ $recipe->recipe_title ?? old('recipe_title') }}">
</div>
<div class="form-group">
  <label></label>
  <textarea name="content" required class="form-control" rows="16" placeholder="本文">{{ $recipe->content ?? old('content') }}</textarea>
</div>

<div class="md-form">
  <p>材料:</p>
  
  <input placeholder="数値を入力してください" type="text" name="serving" class="form-control" required value="{{ $recipe->serving ?? old('serving') }}">
  <input type="text" name="ingredient" class="form-control" required value="{{ $recipe->ingredient ?? old('ingredient') }}">
</div>
<div class="md-form">
  <label>調味料</label>
  <input type="text" name="seasoning" class="form-control" required value="{{ $recipe->seasoning ?? old('seasoning') }}">
</div>
<div class="md-form">
  <label>Step1</label>
  <input type="text" name="step_content" class="form-control" required value="{{ $recipe->step_content ?? old('step_content') }}">
</div>
<div class="md-form">
  <label>Step2</label>
  <input type="text" name="step_content2" class="form-control" required value="{{ $recipe->step_content2 ?? old('step_content2') }}">
</div>
<div class="md-form">
  <label>Step3</label>
  <input type="text" name="step_content3" class="form-control" required value="{{ $recipe->step_content3 ?? old('step_content3') }}">
</div>
<div class="md-form">
  <label>Step4</label>
  <input type="text" name="step_content4" class="form-control" required value="{{ $recipe->step_content4 ?? old('step_content4') }}">
</div>
<div class="md-form">
  <label>Step5</label>
  <input type="text" name="step_content5" class="form-control" required value="{{ $recipe->step_content5 ?? old('step_content5') }}">
</div>
<div class="md-form">
  <label>Step6</label>
  <input type="text" name="step_content6" class="form-control" required value="{{ $recipe->step_content6 ?? old('step_content6') }}">
</div>
<div class="md-form">
  <label>コツ・ポイント</label>
  <input type="text" name="cooking_point" class="form-control" required value="{{ $recipe->cooking_point ?? old('cooking_point') }}">
</div>
<div class="form-group">
  <recipe-tags-input
  :initial-tags='@json($tagNames ?? [])'
  :autocomplete-items='@json($allTagNames ?? [])'
  >
  </recipe-tags-input>
</div>



<div class="form-group col-sm-6">
  <label for="category">カテゴリ</label>
  <select class="form-control" name="category_id" id="main" required value="{{ $recipe->category_id ?? old('category_id') }}" >
    <option value="" style="display: none;">選択してください</option>
    @foreach ($allCategoryNames as $category => $name)
      <option value="{{ $category }}">{{ $name }}</option>
    @endforeach
  </select>
</div>

<!-- <div class="form-group col-sm-6">
    {!! Form::label('カテゴリー：') !!}
    {!! Form::select('category', $allCategoryNames, NULL, ['id' => 'category'] ) !!}  
</div> -->

  
